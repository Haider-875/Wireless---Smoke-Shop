/**
 * BUGS Wireless & Smoke Shop - Frontend Application Logic
 * Integrates Laravel Session Cart API, 21+ Age Gate, and Dynamic Glassmorphic Navbar
 */

document.addEventListener('DOMContentLoaded', () => {
    // 1. Dynamic Sticky Navbar Glassmorphism
    const navbar = document.querySelector('.bugs-navbar-scroll');
    if (navbar) {
        const handleScroll = () => {
            if (window.scrollY > 16) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        };
        handleScroll();
        window.addEventListener('scroll', handleScroll, { passive: true });
    }

    // 2. 21+ Age Verification Gate Modal Persistence
    const AGE_CONFIRMATION_KEY = 'bugs-age-confirmed';
    const ageModalElement = document.getElementById('bugsAgeModal');
    const confirmAgeBtn = document.getElementById('btnConfirmAge');

    if (ageModalElement && typeof bootstrap !== 'undefined') {
        let isAgeConfirmed = false;
        try {
            isAgeConfirmed = localStorage.getItem(AGE_CONFIRMATION_KEY) === 'yes';
        } catch (e) {
            isAgeConfirmed = false;
        }

        if (!isAgeConfirmed) {
            const ageModal = new bootstrap.Modal(ageModalElement, {
                backdrop: 'static',
                keyboard: false
            });
            ageModal.show();

            if (confirmAgeBtn) {
                confirmAgeBtn.addEventListener('click', () => {
                    try {
                        localStorage.setItem(AGE_CONFIRMATION_KEY, 'yes');
                    } catch (e) {}
                    ageModal.hide();
                });
            }
        }
    }

    // 3. Centralized Laravel-Backed Cart Client
    const getCsrfToken = () => {
        const meta = document.querySelector('meta[name="csrf-token"]');
        return meta ? meta.getAttribute('content') : '';
    };

    const bugsCart = {
        isLoading: false,
        items: [],
        count: 0,
        subtotal: 0,
        formatted_subtotal: '$0.00',

        async fetchCart() {
            try {
                const response = await fetch('/api/cart', {
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                if (response.ok) {
                    const data = await response.json();
                    this.updateState(data);
                }
            } catch (err) {
                console.warn('Could not load cart:', err);
            }
        },

        async add(productId, quantity = 1, openDrawer = true) {
            if (this.isLoading) return;
            this.setLoading(true);

            try {
                const response = await fetch('/api/cart/add', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': getCsrfToken(),
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({
                        product_id: parseInt(productId, 10),
                        quantity: parseInt(quantity, 10) || 1
                    })
                });

                if (response.ok) {
                    const data = await response.json();
                    this.updateState(data);
                    if (openDrawer) {
                        this.openDrawer();
                    }
                } else {
                    const err = await response.json();
                    alert(err.message || 'Unable to add item to bag.');
                }
            } catch (err) {
                console.error('Error adding to cart:', err);
                alert('Network error while adding to bag.');
            } finally {
                this.setLoading(false);
            }
        },

        async update(productId, quantity) {
            if (this.isLoading) return;
            this.setLoading(true);

            try {
                const response = await fetch('/api/cart/update', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': getCsrfToken(),
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({
                        product_id: parseInt(productId, 10),
                        quantity: parseInt(quantity, 10)
                    })
                });

                if (response.ok) {
                    const data = await response.json();
                    this.updateState(data);
                }
            } catch (err) {
                console.error('Error updating quantity:', err);
            } finally {
                this.setLoading(false);
            }
        },

        async remove(productId) {
            if (this.isLoading) return;
            this.setLoading(true);

            try {
                const response = await fetch('/api/cart/remove', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': getCsrfToken(),
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({
                        product_id: parseInt(productId, 10)
                    })
                });

                if (response.ok) {
                    const data = await response.json();
                    this.updateState(data);
                }
            } catch (err) {
                console.error('Error removing product:', err);
            } finally {
                this.setLoading(false);
            }
        },

        async clear() {
            if (this.isLoading) return;
            if (!confirm('Are you sure you want to empty your bag?')) return;
            this.setLoading(true);

            try {
                const response = await fetch('/api/cart/clear', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': getCsrfToken(),
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                if (response.ok) {
                    const data = await response.json();
                    this.updateState(data);
                }
            } catch (err) {
                console.error('Error emptying cart:', err);
            } finally {
                this.setLoading(false);
            }
        },

        updateState(data) {
            this.items = data.items || [];
            this.count = data.count || 0;
            this.subtotal = data.subtotal || 0;
            this.formatted_subtotal = data.formatted_subtotal || '$0.00';
            this.render();
        },

        setLoading(loading) {
            this.isLoading = loading;
            const spinner = document.getElementById('cartLoadingState');
            const itemsList = document.getElementById('cartItemsList');
            const emptyState = document.getElementById('cartEmptyState');

            if (spinner) {
                if (loading) {
                    spinner.classList.remove('d-none');
                    if (itemsList) itemsList.classList.add('d-none');
                    if (emptyState) emptyState.classList.add('d-none');
                } else {
                    spinner.classList.add('d-none');
                }
            }
        },

        openDrawer() {
            const drawerEl = document.getElementById('bugsCartOffcanvas');
            if (drawerEl && typeof bootstrap !== 'undefined') {
                const bsOffcanvas = bootstrap.Offcanvas.getOrCreateInstance(drawerEl);
                bsOffcanvas.show();
            }
        },

        render() {
            // Update badges
            const navBadge = document.getElementById('navCartCount');
            const drawerBadge = document.getElementById('cartItemBadge');
            const subtotalText = document.getElementById('cartSubtotalText');
            const checkoutBtn = document.getElementById('btnCartCheckout');
            const emptyState = document.getElementById('cartEmptyState');
            const itemsList = document.getElementById('cartItemsList');
            const deliveryNotice = document.getElementById('deliveryNoticeText');

            if (navBadge) {
                navBadge.textContent = this.count;
                navBadge.classList.toggle('d-none', this.count === 0);
            }
            if (drawerBadge) {
                drawerBadge.textContent = this.count;
            }
            if (subtotalText) {
                subtotalText.textContent = this.formatted_subtotal;
            }

            // Free local delivery threshold progress (free over $50)
            if (deliveryNotice) {
                if (this.subtotal >= 50) {
                    deliveryNotice.innerHTML = `<i class="bi bi-check-circle-fill text-success me-1"></i> You unlocked <strong>Free Local Delivery</strong>!`;
                } else if (this.subtotal > 0) {
                    const diff = (50 - this.subtotal).toFixed(2);
                    deliveryNotice.innerHTML = `<i class="bi bi-truck me-1 text-primary"></i> Add <strong>$${diff}</strong> more for Free Local Delivery`;
                } else {
                    deliveryNotice.innerHTML = `<i class="bi bi-truck me-1 text-primary"></i> Free local delivery on orders over $50`;
                }
            }

            if (this.items.length === 0) {
                if (emptyState) emptyState.classList.remove('d-none');
                if (itemsList) {
                    itemsList.classList.add('d-none');
                    itemsList.innerHTML = '';
                }
                if (checkoutBtn) checkoutBtn.classList.add('disabled');
            } else {
                if (emptyState) emptyState.classList.add('d-none');
                if (itemsList) {
                    itemsList.classList.remove('d-none');
                    itemsList.innerHTML = this.items.map(item => `
                        <div class="d-flex align-items-center gap-2 gap-sm-3 py-2.5 my-1 border-bottom" style="border-color: rgba(255, 255, 255, 0.07) !important;">
                            <div class="flex-shrink-0 rounded-3 overflow-hidden border" style="width: 52px; height: 52px; border-color: var(--bugs-border) !important; background-color: var(--bugs-card);">
                                <img src="${item.image}" alt="${item.name}" class="w-100 h-100 object-fit-cover">
                            </div>
                            <div class="flex-grow-1 min-w-0 pe-1">
                                <p class="eyebrow text-secondary mb-0" style="font-size: 0.6rem; letter-spacing: 0.15em;">${item.category}</p>
                                <h6 class="text-white text-truncate mb-1" style="font-size: 0.85rem;" title="${item.name}">${item.name}</h6>
                                <span class="num text-primary fw-medium" style="font-size: 0.825rem;">${item.formatted_price}</span>
                            </div>
                            <div class="d-flex align-items-center gap-1 border rounded-pill px-2 py-0.5 flex-shrink-0" style="border-color: rgba(255,255,255,0.15) !important;">
                                <button type="button" class="btn btn-sm text-secondary p-0 border-0" aria-label="Decrease" onclick="window.bugsCart.update(${item.id}, ${item.quantity - 1})">
                                    <i class="bi bi-dash"></i>
                                </button>
                                <span class="num text-white small px-1">${item.quantity}</span>
                                <button type="button" class="btn btn-sm text-secondary p-0 border-0" aria-label="Increase" onclick="window.bugsCart.update(${item.id}, ${item.quantity + 1})">
                                    <i class="bi bi-plus"></i>
                                </button>
                            </div>
                            <button type="button" class="btn btn-sm text-secondary hover-danger p-1 border-0 flex-shrink-0" aria-label="Remove" title="Remove" onclick="window.bugsCart.remove(${item.id})">
                                <i class="bi bi-trash3 fs-6"></i>
                            </button>
                        </div>
                    `).join('');
                }
                if (checkoutBtn) checkoutBtn.classList.remove('disabled');
            }
        }
    };

    window.bugsCart = bugsCart;

    // Load server cart on startup
    bugsCart.fetchCart();

    // Delegate "Add to Bag" buttons across all pages
    document.addEventListener('click', (e) => {
        const addBtn = e.target.closest('[data-add-to-cart]');
        if (addBtn) {
            e.preventDefault();
            const productId = addBtn.getAttribute('data-add-to-cart');
            const qtyInput = document.getElementById('productQuantityInput');
            const qty = qtyInput ? parseInt(qtyInput.value, 10) : 1;
            bugsCart.add(productId, qty, true);
        }
    });

    const emptyBtn = document.getElementById('btnEmptyCart');
    if (emptyBtn) {
        emptyBtn.addEventListener('click', () => {
            bugsCart.clear();
        });
    }
});
