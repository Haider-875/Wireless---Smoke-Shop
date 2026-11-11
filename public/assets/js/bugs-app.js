/**
 * BUGS Wireless & Smoke Shop - Vanilla JavaScript Utilities & Interactive Logic
 * Reference: https://fanatic-luxe-mart-go.base44.app/repairs
 */

document.addEventListener('DOMContentLoaded', () => {
    // 1. Dynamic Sticky Navbar Glassmorphism Scroll Effect
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

    // 3. Simple Client-Side Bag / Cart Drawer Manager
    const cartState = {
        items: [],
        addItem(item) {
            const existing = this.items.find(i => i.id === item.id);
            if (existing) {
                existing.quantity += item.quantity || 1;
            } else {
                this.items.push({ ...item, quantity: item.quantity || 1 });
            }
            this.render();
        },
        removeItem(id) {
            this.items = this.items.filter(i => i.id !== id);
            this.render();
        },
        clear() {
            this.items = [];
            this.render();
        },
        get count() {
            return this.items.reduce((sum, item) => sum + item.quantity, 0);
        },
        get subtotal() {
            return this.items.reduce((sum, item) => sum + (item.price * item.quantity), 0);
        },
        render() {
            const badge = document.getElementById('navCartCount');
            const drawerBadge = document.getElementById('cartItemBadge');
            const emptyState = document.getElementById('cartEmptyState');
            const itemsList = document.getElementById('cartItemsList');
            const subtotalText = document.getElementById('cartSubtotalText');
            const checkoutBtn = document.getElementById('btnCartCheckout');

            if (badge) {
                badge.textContent = this.count;
                badge.classList.toggle('d-none', this.count === 0);
            }
            if (drawerBadge) {
                drawerBadge.textContent = this.count;
            }
            if (subtotalText) {
                subtotalText.textContent = `$${this.subtotal.toFixed(2)}`;
            }

            if (emptyState && itemsList) {
                if (this.items.length === 0) {
                    emptyState.classList.remove('d-none');
                    itemsList.classList.add('d-none');
                    itemsList.innerHTML = '';
                    if (checkoutBtn) checkoutBtn.classList.add('disabled');
                } else {
                    emptyState.classList.add('d-none');
                    itemsList.classList.remove('d-none');
                    if (checkoutBtn) checkoutBtn.classList.remove('disabled');

                    itemsList.innerHTML = this.items.map(item => `
                        <div class="d-flex align-items-center gap-3 py-3 border-bottom" style="border-color: var(--bugs-border) !important;">
                            <div class="rounded border p-1" style="width: 50px; height: 50px; border-color: var(--bugs-border) !important;">
                                <i class="bi bi-box text-secondary fs-4 d-flex align-items-center justify-content-center h-100"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="text-white mb-0 small">${item.name}</h6>
                                <span class="num text-primary small">$${item.price.toFixed(2)}</span>
                            </div>
                            <span class="num text-secondary small">x${item.quantity}</span>
                            <button type="button" class="btn btn-link text-danger p-0 ms-2" onclick="window.bugsCart.removeItem('${item.id}')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    `).join('');
                }
            }
        }
    };

    window.bugsCart = cartState;
    cartState.render();

    const emptyBtn = document.getElementById('btnEmptyCart');
    if (emptyBtn) {
        emptyBtn.addEventListener('click', () => {
            cartState.clear();
        });
    }
});
