<header class="sticky-top z-3">
    @include('components.announcement-bar')
    <nav class="navbar navbar-expand-lg bugs-navbar-scroll py-3">
        <div class="container-fluid px-3 px-lg-5 d-flex align-items-center justify-content-between">
            <!-- Left: Brand Logo -->
            <div class="bugs-navbar-left d-flex align-items-center">
                <a class="navbar-brand d-flex align-items-center gap-3 text-white text-decoration-none m-0" href="{{ route('home') }}">
                    <span class="fs-4 fw-bold font-display">BUGS<span style="color: var(--bugs-primary)">.</span></span>
                    <span class="eyebrow d-none d-sm-block text-secondary leading-tight" style="font-size: 0.65rem;">
                        Wireless &<br>Smoke Shop
                    </span>
                </a>
            </div>

            <!-- Center: Desktop Navigation Links (Center-Aligned) -->
            <div class="collapse navbar-collapse d-none d-lg-flex justify-content-center flex-grow-1" id="desktopNav">
                <ul class="navbar-nav mx-auto mb-0 gap-3 gap-xl-4 align-items-center justify-content-center">
                    <li class="nav-item">
                        <a class="bugs-nav-link {{ request()->routeIs('shop.index') && !request('category') ? 'active' : '' }}" href="{{ route('shop.index') }}">Shop all</a>
                    </li>
                    <li class="nav-item">
                        <a class="bugs-nav-link {{ request('category') === 'vapes' ? 'active' : '' }}" href="{{ route('shop.index', ['category' => 'vapes']) }}">Vapes</a>
                    </li>
                    <li class="nav-item">
                        <a class="bugs-nav-link {{ request('category') === 'glass-pipes' ? 'active' : '' }}" href="{{ route('shop.index', ['category' => 'glass-pipes']) }}">Glass &amp; Pipes</a>
                    </li>
                    <li class="nav-item">
                        <a class="bugs-nav-link {{ request()->routeIs('repairs') ? 'active' : '' }}" href="{{ route('repairs') }}">Repairs</a>
                    </li>
                    <li class="nav-item">
                        <a class="bugs-nav-link" href="{{ route('home') }}#visit">Visit us</a>
                    </li>
                    <li class="nav-item">
                        <a class="bugs-nav-link {{ request()->routeIs('orders.lookup') ? 'active' : '' }}" href="{{ route('orders.lookup') }}">Your orders</a>
                    </li>
                </ul>
            </div>

            <!-- Right: Actions (Phone, Cart, Mobile Toggle) -->
            <div class="bugs-navbar-right d-flex align-items-center justify-content-end gap-2">
                <!-- Phone Button -->
                <a href="tel:+13144412851" class="btn btn-bugs-outline d-none d-xl-inline-flex align-items-center gap-2 py-2 px-3 fs-6">
                    <i class="bi bi-telephone text-secondary"></i>
                    <span class="num" style="font-size: 0.85rem;">314-441-2851</span>
                </a>

                <!-- Cart Bag Offcanvas Trigger -->
                <button type="button" class="btn btn-bugs-outline position-relative py-2 px-3 d-inline-flex align-items-center gap-2" data-bs-toggle="offcanvas" data-bs-target="#bugsCartOffcanvas" aria-controls="bugsCartOffcanvas">
                    <i class="bi bi-bag"></i>
                    <span class="d-none d-sm-inline" style="font-size: 0.85rem;">Bag</span>
                    <span class="bugs-badge-count d-none" id="navCartCount">0</span>
                </button>

                <!-- Mobile Hamburger Trigger -->
                <button class="btn btn-bugs-outline py-2 px-3 d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#bugsMobileMenu" aria-controls="bugsMobileMenu" aria-label="Toggle navigation">
                    <i class="bi bi-list fs-5"></i>
                </button>
            </div>
        </div>
    </nav>
</header>

<!-- Mobile Navigation Menu Drawer -->
<div class="offcanvas offcanvas-start bugs-offcanvas d-lg-none" tabindex="-1" id="bugsMobileMenu" aria-labelledby="bugsMobileMenuLabel">
    <div class="offcanvas-header border-bottom py-3 px-4" style="border-color: var(--bugs-border) !important;">
        <span class="fs-4 fw-bold font-display text-white">BUGS<span style="color: var(--bugs-primary)">.</span></span>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column p-4">
        <ul class="nav flex-column gap-3 mb-4">
            <li class="nav-item">
                <a class="bugs-nav-link fs-5 {{ request()->routeIs('shop.index') && !request('category') ? 'active text-white' : '' }}" href="{{ route('shop.index') }}">Shop all</a>
            </li>
            <li class="nav-item">
                <a class="bugs-nav-link fs-5 {{ request('category') === 'vapes' ? 'active text-white' : '' }}" href="{{ route('shop.index', ['category' => 'vapes']) }}">Vapes</a>
            </li>
            <li class="nav-item">
                <a class="bugs-nav-link fs-5 {{ request('category') === 'glass-pipes' ? 'active text-white' : '' }}" href="{{ route('shop.index', ['category' => 'glass-pipes']) }}">Glass &amp; Pipes</a>
            </li>
            <li class="nav-item">
                <a class="bugs-nav-link fs-5 {{ request('category') === 'phone-accessories' ? 'active text-white' : '' }}" href="{{ route('shop.index', ['category' => 'phone-accessories']) }}">Phone Accessories</a>
            </li>
            <li class="nav-item">
                <a class="bugs-nav-link fs-5 {{ request()->routeIs('repairs') ? 'active text-white' : '' }}" href="{{ route('repairs') }}">Repairs</a>
            </li>
            <li class="nav-item">
                <a class="bugs-nav-link fs-5" href="{{ route('home') }}#visit">Visit us</a>
            </li>
            <li class="nav-item">
                <a class="bugs-nav-link fs-5 {{ request()->routeIs('orders.lookup') ? 'active text-white' : '' }}" href="{{ route('orders.lookup') }}">Your orders</a>
            </li>
        </ul>

        <div class="mt-auto border-top pt-4" style="border-color: var(--bugs-border) !important;">
            <a href="tel:+13144412851" class="btn btn-bugs-primary w-100 py-3 mb-2 gap-2">
                <i class="bi bi-telephone-fill"></i> Call 314-441-2851
            </a>
            <p class="text-secondary small text-center mb-0 mt-3">10010 Halls Ferry Rd, St. Louis, MO</p>
        </div>
    </div>
</div>
