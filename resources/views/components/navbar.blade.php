<header class="bugs-floating-header">
    @include('components.announcement-bar')
    <nav class="bugs-navbar-pill bugs-navbar-scroll d-flex align-items-center justify-content-between">
        <!-- Left: Brand Logo -->
        <div class="d-flex align-items-center flex-shrink-0">
            <a class="d-flex align-items-center gap-2 text-white text-decoration-none" href="{{ route('home') }}">
                <span class="fs-4 fw-bold font-display tracking-tight">BUGS<span style="color: var(--bugs-primary)">.</span></span>
                <span class="eyebrow d-none d-sm-block text-secondary leading-tight ms-1" style="font-size: 0.65rem;">
                    Wireless &amp;<br>Smoke Shop
                </span>
            </a>
        </div>

        <!-- Center: Desktop Navigation Links (Editorial 2026 Layout) -->
        <div class="d-none d-xl-flex align-items-center justify-content-center gap-1 mx-2">
            <a class="bugs-nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
            
            <!-- Shop Dropdown -->
            <div class="dropdown">
                <a class="bugs-nav-link dropdown-toggle {{ request()->routeIs('shop.*') && request('category') !== 'smartphones' ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Shop
                </a>
                <ul class="dropdown-menu dropdown-menu-dark border shadow-lg p-2" style="background-color: var(--bugs-surface-3); border-color: var(--bugs-border) !important; border-radius: 14px; min-width: 200px;">
                    <li><a class="dropdown-item py-2 px-3 rounded-2 text-white small" href="{{ route('shop.index') }}"><i class="ph ph-squares-four me-2 text-warning"></i> Shop All Stock</a></li>
                    <li><hr class="dropdown-divider border-secondary border-opacity-25 my-1"></li>
                    <li><a class="dropdown-item py-2 px-3 rounded-2 text-white small hover-white" href="{{ route('shop.index', ['category' => 'smartphones']) }}"><i class="ph ph-device-mobile me-2 text-warning"></i> Smartphones &amp; Stock</a></li>
                    <li><a class="dropdown-item py-2 px-3 rounded-2 text-white-50 small hover-white" href="{{ route('shop.index', ['category' => 'vapes']) }}">Vapes &amp; Pods</a></li>
                    <li><a class="dropdown-item py-2 px-3 rounded-2 text-white-50 small hover-white" href="{{ route('shop.index', ['category' => 'e-liquids']) }}">E-Liquids</a></li>
                    <li><a class="dropdown-item py-2 px-3 rounded-2 text-white-50 small hover-white" href="{{ route('shop.index', ['category' => 'glass-pipes']) }}">Glass &amp; Pipes</a></li>
                    <li><a class="dropdown-item py-2 px-3 rounded-2 text-white-50 small hover-white" href="{{ route('shop.index', ['category' => 'hookah']) }}">Hookah &amp; Shisha</a></li>
                    <li><a class="dropdown-item py-2 px-3 rounded-2 text-white-50 small hover-white" href="{{ route('shop.index', ['category' => 'phone-accessories']) }}">Phone Accessories</a></li>
                </ul>
            </div>

            <a class="bugs-nav-link {{ request('category') === 'smartphones' ? 'active' : '' }}" href="{{ route('shop.index', ['category' => 'smartphones']) }}">Smartphones</a>
            <a class="bugs-nav-link {{ request()->routeIs('repairs') ? 'active' : '' }}" href="{{ route('repairs') }}">Phone Repair</a>
            <button type="button" class="bugs-nav-link bg-transparent border-0 d-inline-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#inquiryModal" data-inquiry-type="general_inquiry" style="cursor: pointer;">
                <span>Inquiry</span>
            </button>
            <a class="bugs-nav-link" href="{{ route('home') }}#visit">Contact</a>
        </div>

        <!-- Right: Actions (Search, Phone, Account, Cart Bag, Mobile Toggle) -->
        <div class="d-flex align-items-center justify-content-end gap-2 flex-shrink-0">
            <!-- Fast Inquiry Trigger Icon Button -->
            <button type="button" 
                    class="bugs-nav-icon-btn d-none d-md-inline-flex" 
                    data-bs-toggle="modal" 
                    data-bs-target="#inquiryModal"
                    data-inquiry-type="general_inquiry"
                    title="Send Counter or Repair Inquiry"
                    aria-label="Send Inquiry">
                <i class="ph ph-chat-circle-dots fs-5" style="color: var(--bugs-primary);"></i>
            </button>

            <!-- Phone Hotline Pill -->
            <a href="tel:+13144412851" class="btn btn-bugs-outline d-none d-lg-inline-flex align-items-center gap-2 py-1 px-3" style="font-size: 0.8125rem;">
                <i class="ph ph-phone" style="color: var(--bugs-primary);"></i>
                <span class="num">314-441-2851</span>
            </a>

            <!-- Search Modal Trigger Button -->
            <button type="button" class="bugs-nav-icon-btn" data-bs-toggle="modal" data-bs-target="#bugsSearchModal" aria-label="Search store">
                <i class="ph ph-magnifying-glass fs-5"></i>
            </button>

            <!-- Account / Order Lookup Icon Button -->
            <a href="{{ route('orders.lookup') }}" class="bugs-nav-icon-btn {{ request()->routeIs('orders.lookup') ? 'text-warning border-warning' : '' }}" aria-label="Account and orders" title="Track Your Orders">
                <i class="ph ph-user fs-5"></i>
            </a>

            <!-- Shopping Bag Trigger Button -->
            <button type="button" class="bugs-nav-icon-btn" data-bs-toggle="offcanvas" data-bs-target="#bugsCartOffcanvas" aria-controls="bugsCartOffcanvas" aria-label="View shopping bag" title="Shopping Bag">
                <i class="ph ph-shopping-bag fs-5"></i>
                <span class="bugs-badge-count d-none" id="navCartCount">0</span>
            </button>

            <!-- Mobile Hamburger Toggle Button -->
            <button class="bugs-nav-icon-btn d-xl-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#bugsMobileMenu" aria-controls="bugsMobileMenu" aria-label="Open mobile menu">
                <i class="ph ph-list fs-5"></i>
            </button>
        </div>
    </nav>
</header>

<!-- Full-Height Animated Mobile Navigation Drawer -->
<div class="offcanvas offcanvas-start bugs-mobile-menu" tabindex="-1" id="bugsMobileMenu" aria-labelledby="bugsMobileMenuLabel">
    <div class="offcanvas-header border-bottom py-3 px-4" style="border-color: var(--bugs-border) !important;">
        <span class="fs-4 fw-bold font-display text-white">BUGS<span style="color: var(--bugs-primary)">.</span></span>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column p-4">
        <ul class="nav flex-column gap-2 mb-4" id="bugsMobileNavList">
            <li class="nav-item bugs-mobile-nav-item">
                <a class="bugs-nav-link fs-6 w-100 py-2 {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                    <i class="ph ph-house me-2"></i> Home
                </a>
            </li>
            <li class="nav-item bugs-mobile-nav-item">
                <a class="bugs-nav-link fs-6 w-100 py-2 {{ request()->routeIs('shop.index') && !request('category') ? 'active' : '' }}" href="{{ route('shop.index') }}">
                    <i class="ph ph-squares-four me-2"></i> Shop All Stock
                </a>
            </li>
            <li class="nav-item bugs-mobile-nav-item">
                <a class="bugs-nav-link fs-6 w-100 py-2 {{ request('category') === 'smartphones' ? 'active' : '' }}" href="{{ route('shop.index', ['category' => 'smartphones']) }}">
                    <i class="ph ph-device-mobile me-2 text-warning"></i> Smartphones &amp; Counter Stock
                </a>
            </li>
            <li class="nav-item bugs-mobile-nav-item">
                <a class="bugs-nav-link fs-6 w-100 py-2 {{ request('category') === 'vapes' ? 'active' : '' }}" href="{{ route('shop.index', ['category' => 'vapes']) }}">
                    <i class="ph ph-wind me-2"></i> Vapes &amp; Pods
                </a>
            </li>
            <li class="nav-item bugs-mobile-nav-item">
                <a class="bugs-nav-link fs-6 w-100 py-2 {{ request('category') === 'e-liquids' ? 'active' : '' }}" href="{{ route('shop.index', ['category' => 'e-liquids']) }}">
                    <i class="ph ph-drop me-2"></i> E-Liquids
                </a>
            </li>
            <li class="nav-item bugs-mobile-nav-item">
                <a class="bugs-nav-link fs-6 w-100 py-2 {{ request('category') === 'glass-pipes' ? 'active' : '' }}" href="{{ route('shop.index', ['category' => 'glass-pipes']) }}">
                    <i class="ph ph-flame me-2"></i> Glass &amp; Pipes
                </a>
            </li>
            <li class="nav-item bugs-mobile-nav-item">
                <a class="bugs-nav-link fs-6 w-100 py-2 {{ request('category') === 'hookah' ? 'active' : '' }}" href="{{ route('shop.index', ['category' => 'hookah']) }}">
                    <i class="ph ph-sparkle me-2"></i> Hookah &amp; Shisha
                </a>
            </li>
            <li class="nav-item bugs-mobile-nav-item">
                <a class="bugs-nav-link fs-6 w-100 py-2 {{ request('category') === 'phone-accessories' ? 'active' : '' }}" href="{{ route('shop.index', ['category' => 'phone-accessories']) }}">
                    <i class="ph ph-headphones me-2"></i> Phone Accessories
                </a>
            </li>
            <li class="nav-item bugs-mobile-nav-item">
                <a class="bugs-nav-link fs-6 w-100 py-2 {{ request()->routeIs('repairs') ? 'active' : '' }}" href="{{ route('repairs') }}">
                    <i class="ph ph-wrench me-2"></i> Phone Repair
                </a>
            </li>
            <li class="nav-item bugs-mobile-nav-item">
                <a class="bugs-nav-link fs-6 w-100 py-2" href="{{ route('home') }}#visit">
                    <i class="ph ph-map-pin me-2"></i> Contact &amp; Hours
                </a>
            </li>
            <li class="nav-item bugs-mobile-nav-item">
                <a class="bugs-nav-link fs-6 w-100 py-2 {{ request()->routeIs('orders.lookup') ? 'active' : '' }}" href="{{ route('orders.lookup') }}">
                    <i class="ph ph-receipt me-2"></i> Your Orders
                </a>
            </li>
        </ul>

        <div class="mt-auto border-top pt-4" style="border-color: var(--bugs-border) !important;">
            <button type="button" 
                    class="btn btn-bugs-outline w-100 py-3 mb-2 gap-2 d-flex align-items-center justify-content-center"
                    data-bs-toggle="modal" 
                    data-bs-target="#inquiryModal"
                    data-inquiry-type="general_inquiry"
                    style="border-color: var(--bugs-primary); color: var(--bugs-primary);">
                <i class="ph ph-chat-circle-dots fs-5"></i> Send Counter Inquiry
            </button>
            <a href="tel:+13144412851" class="btn btn-bugs-primary w-100 py-3 mb-2 gap-2">
                <i class="ph ph-phone-call fs-5"></i> Call 314-441-2851
            </a>
            <p class="caption-5 text-secondary text-center mb-0 mt-3">10010 Halls Ferry Rd, St. Louis, MO 63136</p>
        </div>
    </div>
</div>
