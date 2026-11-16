<header class="bugs-header sticky-top z-40">
    <!-- Top Utility Bar (Exact Reference Match) -->
    <div class="d-none d-sm-block bg-surface-deep bugs-header-topbar border-bottom" style="border-color: rgba(255, 255, 255, 0.06) !important;">
        <div class="mx-auto d-flex align-items-center justify-content-between px-4 px-lg-5 py-2" style="max-width: 1400px;">
            <p class="eyebrow d-flex align-items-center gap-2 mb-0 text-steel" style="font-size: 0.75rem;">
                <i data-lucide="wrench" style="width: 12px; height: 12px;"></i>
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
                    <i data-lucide="wrench" style="width: 14px; height: 14px;"></i>
                    <span>Fix my phone</span>
                </a>

                <!-- Shopping Bag Trigger Button -->
                <button type="button" class="position-relative d-inline-flex align-items-center justify-content-center gap-1.5 rounded-pill border border-white border-opacity-10 px-2.5 px-sm-3 py-1.5 text-white bg-transparent transition-colors hover-steel flex-shrink-0" data-bs-toggle="offcanvas" data-bs-target="#bugsCartOffcanvas" aria-controls="bugsCartOffcanvas" aria-label="View shopping bag" title="Shopping Bag" style="font-size: 13px; height: 38px;">
                    <i data-lucide="shopping-bag" style="width: 16px; height: 16px;"></i>
                    <span class="d-none d-sm-inline">Bag</span>
                    <span class="bugs-badge-count d-none" id="navCartCount">0</span>
                </button>

                <!-- Mobile Hamburger Toggle Button -->
                <button class="bugs-hamburger-btn d-inline-flex d-lg-none rounded-circle border border-white border-opacity-10 text-white bg-transparent p-0 align-items-center justify-content-center hover-white flex-shrink-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#bugsMobileMenu" aria-controls="bugsMobileMenu" aria-label="Open mobile menu" style="width: 38px; height: 38px;">
                    <i data-lucide="menu" style="width: 20px; height: 20px;"></i>
                </button>
            </div>
        </div>
    </div>
</header>

<!-- Full-Height Animated Mobile Navigation Drawer -->
<div class="offcanvas offcanvas-start bugs-mobile-menu" tabindex="-1" id="bugsMobileMenu" aria-labelledby="bugsMobileMenuLabel">
    <div class="offcanvas-header border-bottom py-3 px-4" style="border-color: var(--bugs-border) !important;">
        <div class="d-flex align-items-center gap-2">
            <img src="{{ asset('assets/images/logo.png') }}" alt="BUGS" width="28" height="28" class="rounded-circle">
            <span class="fs-4 fw-bold font-display text-white">BUGS<span class="text-steel">.</span></span>
        </div>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column p-4">
        <ul class="nav flex-column gap-2 mb-4" id="bugsMobileNavList">
            <li class="nav-item bugs-mobile-nav-item">
                <a class="bugs-nav-link fs-6 w-100 py-2 {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                    <i data-lucide="home" class="w-4 h-4 me-2"></i> Home
                </a>
            </li>
            <li class="nav-item bugs-mobile-nav-item">
                <a class="bugs-nav-link fs-6 w-100 py-2 {{ request()->routeIs('repairs') ? 'active' : '' }}" href="{{ route('repairs') }}">
                    <i data-lucide="wrench" class="w-4 h-4 me-2 text-steel"></i> Phone &amp; Tablet Repairs
                </a>
            </li>
            <li class="nav-item bugs-mobile-nav-item">
                <a class="bugs-nav-link fs-6 w-100 py-2 {{ request('category') === 'Phone Accessories' || request('category') === 'phone-accessories' ? 'active' : '' }}" href="{{ route('shop.index', ['category' => 'Phone Accessories']) }}">
                    <i data-lucide="smartphone" class="w-4 h-4 me-2"></i> Phone Accessories
                </a>
            </li>
            <li class="nav-item bugs-mobile-nav-item">
                <a class="bugs-nav-link fs-6 w-100 py-2 {{ request('category') === 'vapes' ? 'active' : '' }}" href="{{ route('shop.index', ['category' => 'vapes']) }}">
                    <i data-lucide="wind" class="w-4 h-4 me-2"></i> Vapes &amp; Pods
                </a>
            </li>
            <li class="nav-item bugs-mobile-nav-item">
                <a class="bugs-nav-link fs-6 w-100 py-2 {{ request('category') === 'e-liquids' ? 'active' : '' }}" href="{{ route('shop.index', ['category' => 'e-liquids']) }}">
                    <i data-lucide="droplet" class="w-4 h-4 me-2"></i> E-Liquids
                </a>
            </li>
            <li class="nav-item bugs-mobile-nav-item">
                <a class="bugs-nav-link fs-6 w-100 py-2 {{ request('category') === 'glass-pipes' ? 'active' : '' }}" href="{{ route('shop.index', ['category' => 'glass-pipes']) }}">
                    <i data-lucide="flame" class="w-4 h-4 me-2"></i> Glass &amp; Pipes
                </a>
            </li>
            <li class="nav-item bugs-mobile-nav-item">
                <a class="bugs-nav-link fs-6 w-100 py-2 {{ request('category') === 'hookah' ? 'active' : '' }}" href="{{ route('shop.index', ['category' => 'hookah']) }}">
                    <i data-lucide="sparkles" class="w-4 h-4 me-2"></i> Hookah &amp; Shisha
                </a>
            </li>
            <li class="nav-item bugs-mobile-nav-item">
                <a class="bugs-nav-link fs-6 w-100 py-2 {{ request()->routeIs('gallery') ? 'active' : '' }}" href="{{ route('gallery') }}">
                    <i data-lucide="image" class="w-4 h-4 me-2 text-steel"></i> Store Gallery
                </a>
            </li>
            <li class="nav-item bugs-mobile-nav-item">
                <a class="bugs-nav-link fs-6 w-100 py-2" href="{{ route('home') }}#visit">
                    <i data-lucide="map-pin" class="w-4 h-4 me-2"></i> Visit Us (10010 Halls Ferry)
                </a>
            </li>
            <li class="nav-item bugs-mobile-nav-item">
                <a class="bugs-nav-link fs-6 w-100 py-2 {{ request()->routeIs('orders.lookup') ? 'active' : '' }}" href="{{ route('orders.lookup') }}">
                    <i data-lucide="receipt" class="w-4 h-4 me-2"></i> Track Your Orders
                </a>
            </li>
        </ul>

        <div class="mt-auto border-top pt-4" style="border-color: var(--bugs-border) !important;">
            <a href="tel:+13144412851" class="btn btn-bugs-primary w-100 py-3 mb-2 gap-2 text-dark fw-semibold d-flex align-items-center justify-content-center">
                <i data-lucide="phone" class="w-4 h-4"></i> Call 314-441-2851
            </a>
            <p class="caption-5 text-secondary text-center mb-0 mt-3" style="font-size: 0.75rem;">10010 Halls Ferry Rd, St. Louis, MO 63136 &bull; Open daily 10 &ndash; 8</p>
        </div>
    </div>
</div>
