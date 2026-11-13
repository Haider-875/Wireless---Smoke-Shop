/**
 * BUGS Wireless & Smoke Shop — Frontend Application & Cinematic Motion Design System
 * 2026 Edition — Pure JavaScript, Bootstrap 5.3, GSAP 3.12, ScrollTrigger & Three.js
 * Strictly compliant with SKILL.md Motion & Interaction Principles (ZERO Tailwind)
 */

document.addEventListener('DOMContentLoaded', () => {
    // 0. Motion Preference Detection (SKILL.md B7)
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // 1. Dynamic Sticky Navbar Glassmorphism
    const navbarPill = document.querySelector('.bugs-navbar-pill');
    const navbarScroll = document.querySelector('.bugs-navbar-scroll');
    const handleScroll = () => {
        const isScrolled = window.scrollY > 20;
        if (navbarPill) navbarPill.classList.toggle('scrolled', isScrolled);
        if (navbarScroll) navbarScroll.classList.toggle('scrolled', isScrolled);
    };
    handleScroll();
    window.addEventListener('scroll', handleScroll, { passive: true });

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

    // 3. Centralized Laravel-Backed Cart Client with Authoritative Server Pricing
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
            this.isLoading = true;
            try {
                const response = await fetch('/api/cart/add', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': getCsrfToken(),
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({ product_id: parseInt(productId, 10), quantity: parseInt(quantity, 10) })
                });

                if (response.ok) {
                    const data = await response.json();
                    this.updateState(data);
                    if (openDrawer) {
                        this.openCartDrawer();
                    }
                    this.animateBagIcon();
                }
            } catch (err) {
                console.error('Failed to add product to cart:', err);
            } finally {
                this.isLoading = false;
            }
        },

        async update(productId, quantity) {
            if (this.isLoading) return;
            this.isLoading = true;
            try {
                const response = await fetch('/api/cart/update', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': getCsrfToken(),
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({ product_id: parseInt(productId, 10), quantity: parseInt(quantity, 10) })
                });

                if (response.ok) {
                    const data = await response.json();
                    this.updateState(data);
                }
            } catch (err) {
                console.error('Failed to update cart:', err);
            } finally {
                this.isLoading = false;
            }
        },

        async remove(productId) {
            await this.update(productId, 0);
        },

        async clear() {
            if (this.isLoading) return;
            this.isLoading = true;
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
                console.error('Failed to clear cart:', err);
            } finally {
                this.isLoading = false;
            }
        },

        openCartDrawer() {
            const drawerEl = document.getElementById('bugsCartDrawer');
            if (drawerEl && typeof bootstrap !== 'undefined') {
                const bsOffcanvas = bootstrap.Offcanvas.getOrCreateInstance(drawerEl);
                bsOffcanvas.show();
            }
        },

        animateBagIcon() {
            const countBadges = document.querySelectorAll('#navCartCount, #mobileNavCartCount');
            countBadges.forEach(badge => {
                badge.style.transform = 'scale(1.35)';
                setTimeout(() => {
                    badge.style.transform = 'scale(1)';
                }, 220);
            });
        },

        updateState(data) {
            this.items = data.items || [];
            this.count = data.count || 0;
            this.subtotal = data.subtotal || 0;
            this.formatted_subtotal = data.formatted_subtotal || '$0.00';

            // Sync all cart badges
            const countBadges = document.querySelectorAll('#navCartCount, #mobileNavCartCount, #drawerCartCount');
            countBadges.forEach(badge => {
                badge.textContent = this.count;
                if (badge.id === 'navCartCount' || badge.id === 'mobileNavCartCount') {
                    badge.classList.toggle('d-none', this.count === 0);
                }
            });

            // Update Drawer Subtotals
            const subtotalEls = document.querySelectorAll('#drawerCartSubtotal, #drawerCartSubtotalBar');
            subtotalEls.forEach(el => {
                el.textContent = this.formatted_subtotal;
            });

            // Update Free Delivery Progress (Target: $50)
            const threshold = 50.0;
            const progressPct = Math.min(100, Math.round((this.subtotal / threshold) * 100));
            const progressBar = document.getElementById('drawerFreeDeliveryProgress');
            const deliveryMsg = document.getElementById('drawerFreeDeliveryText');

            if (progressBar) {
                progressBar.style.width = `${progressPct}%`;
            }
            if (deliveryMsg) {
                if (this.subtotal >= threshold) {
                    deliveryMsg.innerHTML = '<span class="text-success"><i class="ph ph-check-circle me-1"></i> You unlocked <strong>FREE St. Louis Delivery</strong>!</span>';
                } else {
                    const diff = (threshold - this.subtotal).toFixed(2);
                    deliveryMsg.innerHTML = `Add <strong>$${diff}</strong> more for free St. Louis local delivery`;
                }
            }

            // Render Items in Cart Drawer
            const itemsContainer = document.getElementById('drawerCartItems');
            const emptyState = document.getElementById('drawerCartEmpty');
            const checkoutBtn = document.getElementById('drawerCheckoutBtn');

            if (itemsContainer && emptyState) {
                if (this.items.length === 0) {
                    itemsContainer.innerHTML = '';
                    itemsContainer.classList.add('d-none');
                    emptyState.classList.remove('d-none');
                    if (checkoutBtn) checkoutBtn.classList.add('disabled');
                } else {
                    emptyState.classList.add('d-none');
                    itemsContainer.classList.remove('d-none');

                    itemsContainer.innerHTML = this.items.map(item => `
                        <div class="bugs-cart-item p-3 rounded-3 border d-flex gap-3 align-items-center mb-2" style="background-color: var(--bugs-surface-2); border-color: var(--bugs-border) !important;">
                            <div class="ratio ratio-1x1 rounded-2 overflow-hidden flex-shrink-0" style="width: 72px; height: 72px; background-color: var(--bugs-surface-3);">
                                <img src="${item.image_url}" alt="${item.name}" class="w-100 h-100 object-fit-contain p-1">
                            </div>
                            <div class="flex-grow-1 min-w-0 d-flex flex-column justify-content-between">
                                <div class="d-flex align-items-start justify-content-between gap-2">
                                    <div class="min-w-0 pe-1">
                                        <p class="caption-5 text-secondary mb-0.5" style="letter-spacing: 0.12em;">${item.category}</p>
                                        <h6 class="text-white text-truncate mb-0 title-4" title="${item.name}">${item.name}</h6>
                                    </div>
                                    <button type="button" 
                                            class="btn btn-sm text-secondary hover-danger p-1 border-0 flex-shrink-0" 
                                            aria-label="Remove ${item.name} from bag" 
                                            title="Remove item" 
                                            onclick="window.bugsCart.remove(${item.id})">
                                        <i class="ph ph-trash fs-6"></i>
                                    </button>
                                </div>

                                <div class="d-flex align-items-center justify-content-between gap-2 mt-2 pt-1">
                                    <span class="num fw-bold body-4" style="color: var(--bugs-primary);">${item.formatted_price}</span>
                                    <div class="d-flex align-items-center gap-1 border rounded-pill px-2 py-0.5" style="border-color: var(--bugs-border) !important; background-color: var(--bugs-surface-3);">
                                        <button type="button" class="btn btn-sm text-secondary p-0 border-0" aria-label="Decrease quantity" onclick="window.bugsCart.update(${item.id}, ${item.quantity - 1})">
                                            <i class="ph ph-minus fs-6"></i>
                                        </button>
                                        <span class="num text-white small px-2">${item.quantity}</span>
                                        <button type="button" class="btn btn-sm text-secondary p-0 border-0" aria-label="Increase quantity" onclick="window.bugsCart.update(${item.id}, ${item.quantity + 1})">
                                            <i class="ph ph-plus fs-6"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `).join('');
                    if (checkoutBtn) checkoutBtn.classList.remove('disabled');
                }
            }
        }
    };

    window.bugsCart = bugsCart;
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

    // ==========================================================================
    // 4. Three.js Ambient Particle & Depth Field (Hero Background)
    // ==========================================================================
    const heroCanvas = document.getElementById('heroThreeCanvas');
    if (heroCanvas && typeof THREE !== 'undefined' && !prefersReducedMotion) {
        try {
            const scene = new THREE.Scene();
            const camera = new THREE.PerspectiveCamera(60, heroCanvas.clientWidth / heroCanvas.clientHeight, 0.1, 1000);
            camera.position.z = 30;

            const renderer = new THREE.WebGLRenderer({ canvas: heroCanvas, alpha: true, antialias: true });
            renderer.setSize(heroCanvas.clientWidth, heroCanvas.clientHeight, false);
            renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));

            // Gold and champagne particle field
            const particleCount = 140;
            const positions = new Float32Array(particleCount * 3);
            const scales = new Float32Array(particleCount);

            for (let i = 0; i < particleCount * 3; i += 3) {
                positions[i] = (Math.random() - 0.5) * 60;
                positions[i + 1] = (Math.random() - 0.5) * 36;
                positions[i + 2] = (Math.random() - 0.5) * 40;
                scales[i / 3] = Math.random() * 0.8 + 0.3;
            }

            const geometry = new THREE.BufferGeometry();
            geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
            geometry.setAttribute('scale', new THREE.BufferAttribute(scales, 1));

            const material = new THREE.PointsMaterial({
                color: 0x0091ff,
                size: 0.35,
                transparent: true,
                opacity: 0.65,
                blending: THREE.AdditiveBlending
            });

            const particles = new THREE.Points(geometry, material);
            scene.add(particles);

            // Subtle mouse parallax response
            let mouseX = 0;
            let mouseY = 0;
            let targetMouseX = 0;
            let targetMouseY = 0;

            window.addEventListener('mousemove', (e) => {
                targetMouseX = (e.clientX / window.innerWidth - 0.5) * 2;
                targetMouseY = (e.clientY / window.innerHeight - 0.5) * 2;
            }, { passive: true });

            let isHeroVisible = true;
            if ('IntersectionObserver' in window) {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        isHeroVisible = entry.isIntersecting;
                    });
                });
                observer.observe(heroCanvas);
            }

            const handleResize = () => {
                if (!heroCanvas) return;
                const width = heroCanvas.clientWidth;
                const height = heroCanvas.clientHeight;
                camera.aspect = width / height;
                camera.updateProjectionMatrix();
                renderer.setSize(width, height, false);
            };
            window.addEventListener('resize', handleResize, { passive: true });

            const animateThree = () => {
                requestAnimationFrame(animateThree);
                if (!isHeroVisible) return;

                // Smooth lerping mouse
                mouseX += (targetMouseX - mouseX) * 0.05;
                mouseY += (targetMouseY - mouseY) * 0.05;

                particles.rotation.y += 0.0006;
                particles.rotation.x += 0.0003;

                camera.position.x = mouseX * 2.5;
                camera.position.y = -mouseY * 2.0;
                camera.lookAt(scene.position);

                renderer.render(scene, camera);
            };
            animateThree();
        } catch (e) {
            console.warn('Three.js initialization skipped:', e);
        }
    }

    // ==========================================================================
    // 5. GSAP 3 & ScrollTrigger Advanced Cinematic Motion System
    // ==========================================================================
    if (typeof gsap !== 'undefined') {
        if (typeof ScrollTrigger !== 'undefined') {
            gsap.registerPlugin(ScrollTrigger);
        }

        if (!prefersReducedMotion) {
            // A. Smooth Hero Entrance Animations
            const heroCol = document.querySelector('.hero-content-col');
            if (heroCol) {
                const heroTl = gsap.timeline({ defaults: { ease: 'power3.out', duration: 0.8 } });
                heroTl.from('.hero-content-col .eyebrow', { opacity: 0, y: 16, duration: 0.6 })
                      .from('.bugs-hero-title', { opacity: 0, y: 24, duration: 0.8 }, '-=0.4')
                      .from('.hero-subhead', { opacity: 0, y: 20, duration: 0.7 }, '-=0.5')
                      .from('.hero-content-col .btn', { opacity: 0, y: 16, stagger: 0.12, duration: 0.6 }, '-=0.4')
                      .from('.hero-content-col .row', { opacity: 0, y: 16, duration: 0.6 }, '-=0.4');
            }

            const heroImg = document.querySelector('.hero-visual-img');
            const heroCard = document.querySelector('.bugs-hero-floating-card');
            if (heroImg) {
                gsap.from(heroImg, { scale: 1.1, opacity: 0, duration: 1.3, ease: 'power2.out' });
            }
            if (heroCard) {
                gsap.from(heroCard, { y: 35, opacity: 0, duration: 0.9, delay: 0.4, ease: 'power3.out' });
            }

            // B. Clipping Mask Reveal for Lifestyle and Workbench Images
            const maskRevealWraps = document.querySelectorAll('.mask-reveal-wrap');
            maskRevealWraps.forEach((wrap) => {
                const img = wrap.querySelector('.mask-reveal-img');
                if (img && typeof ScrollTrigger !== 'undefined') {
                    gsap.fromTo(img,
                        { clipPath: 'polygon(0 100%, 100% 100%, 100% 100%, 0 100%)', scale: 1.1 },
                        {
                            clipPath: 'polygon(0 0, 100% 0, 100% 100%, 0 100%)',
                            scale: 1,
                            duration: 1.1,
                            ease: 'power3.inOut',
                            scrollTrigger: {
                                trigger: wrap,
                                start: 'top 85%',
                                once: true
                            }
                        }
                    );
                }
            });

            // C. Scroll-Triggered Section Entrances
            const revealSections = document.querySelectorAll('.gsap-reveal-section');
            revealSections.forEach((section) => {
                if (typeof ScrollTrigger !== 'undefined') {
                    gsap.fromTo(section, 
                        { opacity: 0, y: 32 },
                        {
                            opacity: 1,
                            y: 0,
                            duration: 0.75,
                            ease: 'power3.out',
                            scrollTrigger: {
                                trigger: section,
                                start: 'top 85%',
                                once: true
                            }
                        }
                    );
                } else {
                    section.style.opacity = '1';
                    section.style.transform = 'none';
                }
            });

            // D. Apple-Style Product Storytelling Showcase (#cinematicStorytelling)
            const pinnedStory = document.getElementById('cinematicStorytelling');
            if (pinnedStory) {
                let currentChapter = 0;
                const chapterBtns = pinnedStory.querySelectorAll('.bugs-chapter-btn');
                const steps = pinnedStory.querySelectorAll('.story-step');
                const visualLayers = pinnedStory.querySelectorAll('.story-visual-layer');

                const setChapter = (index) => {
                    if (index === currentChapter) return;
                    currentChapter = index;

                    chapterBtns.forEach((btn, idx) => {
                        const isActive = idx === index;
                        btn.classList.toggle('active', isActive);
                        btn.setAttribute('aria-selected', isActive ? 'true' : 'false');
                    });

                    steps.forEach((step, idx) => {
                        step.classList.toggle('active', idx === index);
                    });

                    visualLayers.forEach((layer, idx) => {
                        layer.classList.toggle('active', idx === index);
                    });
                };

                // Interactive click handlers for chapter tabs
                chapterBtns.forEach((btn) => {
                    btn.addEventListener('click', (e) => {
                        e.preventDefault();
                        const idx = parseInt(btn.getAttribute('data-chapter'), 10);
                        setChapter(idx);
                    });
                });

                // Desktop ScrollTrigger pinning without flicker
                if (typeof ScrollTrigger !== 'undefined' && window.innerWidth >= 992) {
                    ScrollTrigger.create({
                        trigger: pinnedStory,
                        start: 'top 12%',
                        end: '+=900',
                        pin: true,
                        anticipatePin: 1,
                        pinSpacing: true,
                        onUpdate: (self) => {
                            const p = self.progress;
                            const targetIdx = p < 0.33 ? 0 : p < 0.66 ? 1 : 2;
                            if (targetIdx !== currentChapter) {
                                setChapter(targetIdx);
                            }
                        }
                    });
                }
            }

            // E. Controlled Aisle Cards Entrance & Hover Interaction
            const horizontalSection = document.getElementById('horizontalAislesSection');
            const horizontalTrack = document.getElementById('horizontalTrack');
            if (horizontalTrack && typeof ScrollTrigger !== 'undefined') {
                const aisleCards = horizontalTrack.querySelectorAll('.bugs-horizontal-card');
                gsap.from(aisleCards, {
                    opacity: 0,
                    y: 30,
                    stagger: 0.1,
                    duration: 0.7,
                    ease: 'power2.out',
                    scrollTrigger: {
                        trigger: horizontalTrack,
                        start: 'top 85%',
                        once: true
                    }
                });
            }

            // F. Staggered Product Cards Entrance in Featured Grid
            const productGrid = document.querySelector('.bugs-product-grid');
            if (productGrid && typeof ScrollTrigger !== 'undefined') {
                const productCards = productGrid.querySelectorAll('.product-card-wrapper');
                gsap.from(productCards, {
                    opacity: 0,
                    y: 28,
                    stagger: 0.08,
                    duration: 0.6,
                    ease: 'power2.out',
                    scrollTrigger: {
                        trigger: productGrid,
                        start: 'top 85%',
                        once: true
                    }
                });
            }

            // G. Mandatory B11 Tagline Reveal (Word-by-word scroll reveal)
            const taglineWords = document.querySelectorAll('.tagline-word');
            if (taglineWords.length > 0 && typeof ScrollTrigger !== 'undefined') {
                gsap.to(taglineWords, {
                    opacity: 1,
                    color: '#FFFFFF',
                    stagger: 0.04,
                    duration: 0.5,
                    ease: 'power2.out',
                    scrollTrigger: {
                        trigger: '#brandTaglineSection',
                        start: 'top 75%',
                        end: 'bottom 40%',
                        scrub: 0.8
                    }
                });
            } else {
                taglineWords.forEach(w => w.classList.add('revealed'));
            }

            // H. Parallax Elements Movement
            const parallaxEls = document.querySelectorAll('[data-parallax]');
            parallaxEls.forEach((el) => {
                const speed = parseFloat(el.getAttribute('data-parallax') || 0.1);
                if (typeof ScrollTrigger !== 'undefined') {
                    gsap.to(el, {
                        y: () => speed * 80,
                        ease: 'none',
                        scrollTrigger: {
                            trigger: el,
                            start: 'top bottom',
                            end: 'bottom top',
                            scrub: true
                        }
                    });
                }
            });

            // I. Final Cinematic CTA Section Entrance
            const finalCta = document.getElementById('cinematicFinalCta');
            if (finalCta && typeof ScrollTrigger !== 'undefined') {
                gsap.from(finalCta.querySelectorAll('.eyebrow, h2, p, .btn'), {
                    opacity: 0,
                    y: 28,
                    stagger: 0.12,
                    duration: 0.7,
                    ease: 'power3.out',
                    scrollTrigger: {
                        trigger: finalCta,
                        start: 'top 80%',
                        once: true
                    }
                });
            }
        } else {
            // Reduced motion fallback: show all instantly without movement
            document.querySelectorAll('.gsap-reveal-section').forEach(s => {
                s.style.opacity = '1';
                s.style.transform = 'none';
            });
            document.querySelectorAll('.tagline-word').forEach(w => {
                w.classList.add('revealed');
            });
            document.querySelectorAll('.mask-reveal-img').forEach(img => {
                img.style.clipPath = 'polygon(0 0, 100% 0, 100% 100%, 0 100%)';
            });
        }
    }

    // ==========================================================================
    // 6. Interactive 3D Card Tilt Perspective & Radial Glow
    // ==========================================================================
    if (!prefersReducedMotion && window.matchMedia('(hover: hover)').matches) {
        const tiltCards = document.querySelectorAll('.bugs-product-card, .bugs-horizontal-card');
        tiltCards.forEach((card) => {
            card.addEventListener('pointermove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;

                // Set CSS variables for radial hover spotlight
                card.style.setProperty('--mouse-x', `${x}px`);
                card.style.setProperty('--mouse-y', `${y}px`);

                // Normalized offsets -0.5 to 0.5
                const normX = (x / rect.width) - 0.5;
                const normY = (y / rect.height) - 0.5;

                const rotateX = -normY * 8;
                const rotateY = normX * 8;

                card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-4px)`;
            });

            card.addEventListener('pointerleave', () => {
                card.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) translateY(0)';
            });
        });
    }

    // 7. Mobile Menu Drawer Link Stagger Animation (B7: 60ms step, max 400ms)
    const mobileMenuEl = document.getElementById('bugsMobileMenu');
    if (mobileMenuEl) {
        mobileMenuEl.addEventListener('shown.bs.offcanvas', () => {
            const navItems = mobileMenuEl.querySelectorAll('.bugs-mobile-nav-item');
            if (navItems.length > 0 && typeof gsap !== 'undefined' && !prefersReducedMotion) {
                gsap.fromTo(navItems,
                    { opacity: 0, y: 20 },
                    { opacity: 1, y: 0, stagger: 0.05, duration: 0.35, ease: 'power2.out' }
                );
            }
        });
    }
});
