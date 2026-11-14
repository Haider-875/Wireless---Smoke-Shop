<header class="bugs-floating-header">
    @include('components.announcement-bar')
    <nav class="bugs-navbar-pill bugs-navbar-scroll d-flex align-items-center justify-content-between">
        <!-- Left: Brand Logo & Identity -->
        <div class="d-flex align-items-center flex-shrink-0">
            <a class="d-flex align-items-center gap-3 text-white text-decoration-none" href="{{ route('home') }}">
                <img src="{{ asset('assets/images/logo.png') }}" alt="BUGS" width="36" height="36" class="rounded-circle border border-white border-opacity-10 object-fit-cover">
                <div class="d-flex flex-column">
                    <span class="fs-4 fw-bold font-display tracking-tight text-white leading-none">BUGS<span class="text-steel">.</span></span>
                    <span class="eyebrow text-secondary leading-tight mt-1" style="font-size: 0.65rem; letter-spacing: 0.08em;">
                        Wireless &amp; Repair <span class="d-none d-sm-inline">&bull; Smoke shop inside</span>
                    </span>
                </div>
            </a>
        </div>

        <!-- Center: Desktop Navigation Links (Exact Reference Matching) -->
        <div class="d-none d-xl-flex align-items-center justify-content-center gap-1 mx-2">
            <a class="bugs-nav-link {{ request()->routeIs('repairs') ? 'active' : '' }}" href="{{ route('repairs') }}">Repairs</a>
            <a class="bugs-nav-link {{ request('category') === 'phone-accessories' ? 'active' : '' }}" href="{{ route('shop.index', ['category' => 'phone-accessories']) }}">Phone gear</a>
            <a class="bugs-nav-link {{ request()->routeIs('shop.index') && !request('category') ? 'active' : '' }}" href="{{ route('shop.index') }}">Shop all</a>
            <a class="bugs-nav-link {{ in_array(request('category'), ['vapes', 'e-liquids', 'glass-pipes', 'hookah']) ? 'active' : '' }}" href="{{ route('shop.index', ['category' => 'vapes']) }}">Smoke shop</a>
            <a class="bugs-nav-link" href="{{ route('home') }}#visit">Visit us</a>
            <a class="bugs-nav-link {{ request()->routeIs('orders.lookup') ? 'active' : '' }}" href="{{ route('orders.lookup') }}">Your orders</a>
        </div>

        <!-- Right: Actions (Hotline, Fix CTA, Bag Trigger, Mobile Toggle) -->
        <div class="d-flex align-items-center justify-content-end gap-2 flex-shrink-0">
            <!-- Phone Hotline Pill -->
            <a href="tel:+13144412851" class="btn btn-bugs-outline d-none d-lg-inline-flex align-items-center gap-2 py-1 px-3" style="font-size: 0.8125rem;">
                <i data-lucide="phone" class="w-4 h-4 text-steel"></i>
                <span class="num">314-441-2851</span>
            </a>

            <!-- Search Modal Trigger Button -->
            <button type="button" class="bugs-nav-icon-btn d-none d-md-inline-flex" data-bs-toggle="modal" data-bs-target="#bugsSearchModal" aria-label="Search store" title="Search store">
                <i data-lucide="search" class="w-4 h-4"></i>
            </button>

            <!-- Primary Fix My Phone Action Button -->
            <a href="{{ route('repairs') }}" class="btn btn-bugs-primary d-none d-sm-inline-flex align-items-center gap-2 py-1 px-4 text-dark fw-semibold" style="font-size: 0.8125rem;">
                <i data-lucide="wrench" class="w-4 h-4"></i>
                <span>Fix my phone</span>
            </a>

            <!-- Shopping Bag Trigger Button -->
            <button type="button" class="bugs-nav-icon-btn position-relative" data-bs-toggle="offcanvas" data-bs-target="#bugsCartOffcanvas" aria-controls="bugsCartOffcanvas" aria-label="View shopping bag" title="Shopping Bag">
                <i data-lucide="shopping-bag" class="w-5 h-5"></i>
                <span class="bugs-badge-count d-none" id="navCartCount">0</span>
            </button>

            <!-- Mobile Hamburger Toggle Button -->
            <button class="bugs-nav-icon-btn d-xl-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#bugsMobileMenu" aria-controls="bugsMobileMenu" aria-label="Open mobile menu">
                <i data-lucide="menu" class="w-5 h-5"></i>
            </button>
        </div>
    </nav>
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
                <a class="bugs-nav-link fs-6 w-100 py-2 {{ request()->routeIs('shop.index') && !request('category') ? 'active' : '' }}" href="{{ route('shop.index') }}">
                    <i data-lucide="layout-grid" class="w-4 h-4 me-2"></i> Shop All Products
                </a>
            </li>
            <li class="nav-item bugs-mobile-nav-item">
                <a class="bugs-nav-link fs-6 w-100 py-2 {{ request('category') === 'phone-accessories' ? 'active' : '' }}" href="{{ route('shop.index', ['category' => 'phone-accessories']) }}">
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
