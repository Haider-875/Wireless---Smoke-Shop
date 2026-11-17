<header class="bugs-header sticky-top z-40">
    <!-- Top Utility / Announcement Bar (Visible across all viewports) -->
    <div class="bg-surface-deep bugs-header-topbar border-bottom" style="border-color: rgba(255, 255, 255, 0.06) !important;">
        <div class="mx-auto d-flex align-items-center justify-content-center justify-content-md-between px-3 px-sm-4 px-lg-5 py-1.5 py-sm-2" style="max-width: 1400px;">
            <p class="eyebrow d-flex align-items-center justify-content-center gap-2 mb-0 text-steel text-center" style="font-size: 0.72rem; letter-spacing: 0.03em;">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink: 0;">
                    <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                </svg>
                <span>Same-day phone repair · walk-ins welcome</span>
            </p>
            <p class="eyebrow d-none d-md-block text-secondary mb-0" style="font-size: 0.75rem;">90-day warranty · free diagnostics</p>
            <p class="eyebrow d-none d-lg-block text-secondary mb-0" style="font-size: 0.75rem;">Open daily 10 – 8</p>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <div class="bugs-header-main bugs-navbar-scroll border-bottom" style="border-color: rgba(255, 255, 255, 0.06) !important;">
        <div class="mx-auto d-flex align-items-center justify-content-between gap-2 gap-sm-3 px-3 px-sm-4 px-lg-5 py-2.5 py-sm-3" style="max-width: 1400px;">
            <!-- Brand Logo & Identity -->
            <a class="d-flex align-items-center gap-2 gap-sm-3 text-white text-decoration-none" href="{{ route('home') }}">
                <span class="font-display fw-semibold text-white tracking-tight" style="font-size: 24px; line-height: 1;">BUGS<span class="text-steel">.</span></span>
                <span class="eyebrow d-none d-sm-block text-secondary" style="font-size: 0.72rem; line-height: 1.45; letter-spacing: 0.08em;">
                    Wireless &amp; Repair<br><span style="color: rgba(229, 169, 59, 0.85);">Smoke shop inside</span>
                </span>
            </a>

            <!-- Center Navigation Links -->
            <nav class="d-none d-lg-flex align-items-center gap-4">
                <a class="bugs-nav-link text-decoration-none {{ request()->routeIs('repairs') ? 'active text-white' : 'text-secondary' }}" href="{{ route('repairs') }}" style="font-size: 13.5px; transition: color 0.2s;">Repairs</a>
                <a class="bugs-nav-link text-decoration-none {{ request('category') === 'Phone Accessories' || request('category') === 'phone-accessories' ? 'active text-white' : 'text-secondary' }}" href="{{ route('shop.index', ['category' => 'Phone Accessories']) }}" style="font-size: 13.5px; transition: color 0.2s;">Phone gear</a>
                <a class="bugs-nav-link text-decoration-none {{ in_array(request('category'), ['Vapes', 'vapes', 'e-liquids', 'glass-pipes', 'hookah']) ? 'active text-white' : 'text-secondary' }}" href="{{ route('shop.index', ['category' => 'Vapes']) }}" style="font-size: 13.5px; transition: color 0.2s;">Smoke shop</a>
                <a class="bugs-nav-link text-decoration-none {{ request()->routeIs('gallery') ? 'active text-white' : 'text-secondary' }}" href="{{ route('gallery') }}" style="font-size: 13.5px; transition: color 0.2s;">Gallery</a>
                <a class="bugs-nav-link text-decoration-none text-secondary" href="{{ route('home') }}#visit" style="font-size: 13.5px; transition: color 0.2s;">Visit us</a>
                <a class="bugs-nav-link text-decoration-none {{ request()->routeIs('orders.lookup') ? 'active text-white' : 'text-secondary' }}" href="{{ route('orders.lookup') }}" style="font-size: 13.5px; transition: color 0.2s;">Your orders</a>
            </nav>

            <!-- Right Actions -->
            <div class="d-flex align-items-center gap-2">
                <!-- Phone Hotline Pill -->
                <a href="tel:+13144412851" class="d-none d-xl-flex align-items-center gap-2 rounded-pill border border-white border-opacity-10 px-3 py-2 text-decoration-none text-secondary hover-white transition-colors" style="font-size: 13px;">
                    <i data-lucide="phone" style="width: 14px; height: 14px;" class="text-steel"></i>
                    <span class="num text-white">314-441-2851</span>
                </a>

                <!-- Primary Fix My Phone Action Button -->
                <a href="{{ route('repairs') }}" class="d-none d-sm-flex align-items-center gap-2 rounded-pill px-4 py-2 text-decoration-none fw-semibold transition-transform" style="background-color: hsl(var(--primary)); color: hsl(var(--primary-foreground)); font-size: 13px;">
                    <!-- <i data-lucide="wrench" style="width: 14px; height: 14px;"></i> -->
                    <span>Fix my phone</span>
                </a>

                <!-- Shopping Bag Trigger Button -->
                <button type="button" class="position-relative d-inline-flex align-items-center justify-content-center gap-1.5 border border-white border-opacity-10 px-2.5 px-sm-3 py-1.5 text-white bg-transparent transition-colors hover-steel flex-shrink-0" data-bs-toggle="offcanvas" data-bs-target="#bugsCartOffcanvas" aria-controls="bugsCartOffcanvas" aria-label="View shopping bag" title="Shopping Bag" style="font-size: 13px; height: 38px; border-radius: 8px !important;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="flex-shrink-0">
                        <path d="M6 9V7a6 6 0 0 1 12 0v2"></path>
                        <path d="M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    <span class="d-inline">Bag</span>
                    <span class="bugs-badge-count d-none" id="navCartCount">0</span>
                </button>

                <!-- Mobile Hamburger Toggle Button -->
                <button class="bugs-hamburger-btn d-inline-flex d-lg-none border border-white border-opacity-10 text-white bg-transparent p-0 align-items-center justify-content-center hover-white flex-shrink-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#bugsMobileMenu" aria-controls="bugsMobileMenu" aria-label="Open mobile menu" style="width: 38px; height: 38px; border-radius: 8px !important;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="4" x2="20" y1="12" y2="12"></line>
                        <line x1="4" x2="20" y1="6" y2="6"></line>
                        <line x1="4" x2="20" y1="18" y2="18"></line>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</header>

<!-- Full-Height Animated Mobile Navigation Drawer -->
<div class="offcanvas offcanvas-start bugs-mobile-menu" tabindex="-1" id="bugsMobileMenu" aria-labelledby="bugsMobileMenuLabel">
    <div class="offcanvas-header border-bottom py-3 px-3.5" style="border-color: rgba(255, 255, 255, 0.08) !important;">
        <div class="d-flex align-items-center gap-2">
            <span class="fs-4 fw-bold font-display text-white tracking-tight" id="bugsMobileMenuLabel">BUGS<span class="text-steel">.</span></span>
            <span class="badge rounded-pill fw-normal text-secondary border border-white border-opacity-10 px-2 py-0.5" style="font-size: 10px; letter-spacing: 0.04em;">Wireless &amp; Smoke</span>
        </div>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close" style="font-size: 12px;"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column px-3 py-3">
        <ul class="nav flex-column gap-1 mb-3" id="bugsMobileNavList">
            <li class="nav-item bugs-mobile-nav-item">
                <a class="bugs-mobile-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                    <span class="d-flex align-items-center gap-2.5">
                        <span class="nav-icon-box">
                            <i data-lucide="home" style="width: 14px; height: 14px;"></i>
                        </span>
                        <span>Home</span>
                    </span>
                    <i data-lucide="chevron-right" class="nav-arrow" style="width: 13px; height: 13px;"></i>
                </a>
            </li>
            <li class="nav-item bugs-mobile-nav-item">
                <a class="bugs-mobile-link {{ request()->routeIs('repairs') ? 'active' : '' }}" href="{{ route('repairs') }}">
                    <span class="d-flex align-items-center gap-2.5">
                        <span class="nav-icon-box">
                            <i data-lucide="wrench" style="width: 14px; height: 14px;"></i>
                        </span>
                        <span>Phone &amp; Tablet Repairs</span>
                    </span>
                    <i data-lucide="chevron-right" class="nav-arrow" style="width: 13px; height: 13px;"></i>
                </a>
            </li>
            <li class="nav-item bugs-mobile-nav-item">
                <a class="bugs-mobile-link {{ request('category') === 'Phone Accessories' || request('category') === 'phone-accessories' ? 'active' : '' }}" href="{{ route('shop.index', ['category' => 'Phone Accessories']) }}">
                    <span class="d-flex align-items-center gap-2.5">
                        <span class="nav-icon-box">
                            <i data-lucide="smartphone" style="width: 14px; height: 14px;"></i>
                        </span>
                        <span>Phone Accessories</span>
                    </span>
                    <i data-lucide="chevron-right" class="nav-arrow" style="width: 13px; height: 13px;"></i>
                </a>
            </li>
            <li class="nav-item bugs-mobile-nav-item">
                <a class="bugs-mobile-link {{ request('category') === 'vapes' ? 'active' : '' }}" href="{{ route('shop.index', ['category' => 'vapes']) }}">
                    <span class="d-flex align-items-center gap-2.5">
                        <span class="nav-icon-box">
                            <i data-lucide="wind" style="width: 14px; height: 14px;"></i>
                        </span>
                        <span>Vapes &amp; Pods</span>
                    </span>
                    <i data-lucide="chevron-right" class="nav-arrow" style="width: 13px; height: 13px;"></i>
                </a>
            </li>
            <li class="nav-item bugs-mobile-nav-item">
                <a class="bugs-mobile-link {{ request('category') === 'e-liquids' ? 'active' : '' }}" href="{{ route('shop.index', ['category' => 'e-liquids']) }}">
                    <span class="d-flex align-items-center gap-2.5">
                        <span class="nav-icon-box">
                            <i data-lucide="droplet" style="width: 14px; height: 14px;"></i>
                        </span>
                        <span>E-Liquids</span>
                    </span>
                    <i data-lucide="chevron-right" class="nav-arrow" style="width: 13px; height: 13px;"></i>
                </a>
            </li>
            <li class="nav-item bugs-mobile-nav-item">
                <a class="bugs-mobile-link {{ request('category') === 'glass-pipes' ? 'active' : '' }}" href="{{ route('shop.index', ['category' => 'glass-pipes']) }}">
                    <span class="d-flex align-items-center gap-2.5">
                        <span class="nav-icon-box">
                            <i data-lucide="flame" style="width: 14px; height: 14px;"></i>
                        </span>
                        <span>Glass &amp; Pipes</span>
                    </span>
                    <i data-lucide="chevron-right" class="nav-arrow" style="width: 13px; height: 13px;"></i>
                </a>
            </li>
            <li class="nav-item bugs-mobile-nav-item">
                <a class="bugs-mobile-link {{ request('category') === 'hookah' ? 'active' : '' }}" href="{{ route('shop.index', ['category' => 'hookah']) }}">
                    <span class="d-flex align-items-center gap-2.5">
                        <span class="nav-icon-box">
                            <i data-lucide="sparkles" style="width: 14px; height: 14px;"></i>
                        </span>
                        <span>Hookah &amp; Shisha</span>
                    </span>
                    <i data-lucide="chevron-right" class="nav-arrow" style="width: 13px; height: 13px;"></i>
                </a>
            </li>
            <li class="nav-item bugs-mobile-nav-item">
                <a class="bugs-mobile-link {{ request()->routeIs('gallery') ? 'active' : '' }}" href="{{ route('gallery') }}">
                    <span class="d-flex align-items-center gap-2.5">
                        <span class="nav-icon-box">
                            <i data-lucide="image" style="width: 14px; height: 14px;"></i>
                        </span>
                        <span>Store Gallery</span>
                    </span>
                    <i data-lucide="chevron-right" class="nav-arrow" style="width: 13px; height: 13px;"></i>
                </a>
            </li>
            <li class="nav-item bugs-mobile-nav-item">
                <a class="bugs-mobile-link" href="{{ route('home') }}#visit">
                    <span class="d-flex align-items-center gap-2.5">
                        <span class="nav-icon-box">
                            <i data-lucide="map-pin" style="width: 14px; height: 14px;"></i>
                        </span>
                        <span>Visit Us (10010 Halls Ferry)</span>
                    </span>
                    <i data-lucide="chevron-right" class="nav-arrow" style="width: 13px; height: 13px;"></i>
                </a>
            </li>
            <li class="nav-item bugs-mobile-nav-item">
                <a class="bugs-mobile-link {{ request()->routeIs('orders.lookup') ? 'active' : '' }}" href="{{ route('orders.lookup') }}">
                    <span class="d-flex align-items-center gap-2.5">
                        <span class="nav-icon-box">
                            <i data-lucide="receipt" style="width: 14px; height: 14px;"></i>
                        </span>
                        <span>Track Your Orders</span>
                    </span>
                    <i data-lucide="chevron-right" class="nav-arrow" style="width: 13px; height: 13px;"></i>
                </a>
            </li>
        </ul>

        <div class="mt-auto border-top pt-3" style="border-color: rgba(255, 255, 255, 0.08) !important;">
            <a href="tel:+13144412851" class="btn btn-bugs-primary w-100 py-2.5 rounded-pill mb-2 gap-2 text-dark fw-semibold d-flex align-items-center justify-content-center" style="font-size: 13.5px;">
                <i data-lucide="phone" style="width: 14px; height: 14px;"></i>
                <span>Call 314-441-2851</span>
            </a>
            <p class="caption-5 text-secondary text-center mb-1" style="font-size: 0.72rem; line-height: 1.45;">
                10010 Halls Ferry Rd, St. Louis &bull; Open daily 10 &ndash; 8
            </p>

            <!-- Brand watermark at the foot of menu with fade-out at bottom ("paon wali side se opacity kam ho") -->
            <div class="bugs-mobile-menu-brand">
                <div class="bugs-mobile-menu-brand-name">
                    BUGS<span>.</span>
                </div>
                <div class="bugs-mobile-menu-brand-sub">
                    Wireless &amp; Smoke Shop
                </div>
            </div>
        </div>
    </div>
</div>
