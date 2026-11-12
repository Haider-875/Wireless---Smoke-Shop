<footer class="bugs-footer pt-5 pb-4 mt-auto">
    <div class="container-fluid px-3 px-lg-5" style="max-width: 1400px;">
        <!-- Top Main Footer Grid -->
        <div class="row g-4 g-lg-5 justify-content-between pb-5">
            <!-- Brand & Identity Column -->
            <div class="col-lg-4 col-xl-4">
                <a class="d-inline-flex align-items-center gap-3 text-white text-decoration-none mb-3" href="{{ route('home') }}">
                    <span class="fs-3 fw-bold font-display">BUGS<span style="color: var(--bugs-primary)">.</span></span>
                    <span class="eyebrow text-secondary leading-tight" style="font-size: 0.65rem;">
                        Wireless &amp;<br>Smoke Shop
                    </span>
                </a>
                <p class="text-secondary small leading-relaxed mb-3 pe-xl-3" style="max-width: 360px;">
                    St. Louis's premier destination for certified vape hardware, artisan glass, premium hookah, and same-day certified mobile device repairs.
                </p>

                <!-- Live Store Status Badge -->
                <div class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded-pill mb-4" style="background-color: rgba(34, 197, 94, 0.08); border: 1px solid rgba(34, 197, 94, 0.25);">
                    <span class="bugs-pulse-dot"></span>
                    <span class="text-white small fw-medium" style="font-size: 0.78rem;">Open Today · Walk-Ins Always Welcome</span>
                </div>

                <!-- Connect & Social Actions -->
                <div class="d-flex flex-wrap gap-2">
                    <a href="https://www.google.com/maps/search/?api=1&query=Bugs+Wireless+%26+Smoke+Shop+10010+Halls+Ferry+Rd+St+Louis+MO+63136" 
                       target="_blank" 
                       rel="noreferrer" 
                       class="bugs-footer-pill">
                        <i class="bi bi-geo-alt-fill" style="color: var(--bugs-primary)"></i> Directions
                    </a>
                    <a href="https://www.instagram.com/bugs_wirless_and_smoke_shop/" 
                       target="_blank" 
                       rel="noreferrer" 
                       class="bugs-footer-pill">
                        <i class="bi bi-instagram" style="color: var(--bugs-primary)"></i> Instagram
                    </a>
                    <a href="tel:+13144412851" 
                       class="bugs-footer-pill">
                        <i class="bi bi-telephone-fill" style="color: var(--bugs-primary)"></i> 314-441-2851
                    </a>
                </div>
            </div>

            <!-- The Shelves (Shop Links) -->
            <div class="col-6 col-md-3 col-lg-2">
                <p class="bugs-footer-eyebrow">The Shelves</p>
                <ul class="list-unstyled d-flex flex-column gap-2 mb-0">
                    <li>
                        <a href="{{ route('shop.index') }}" class="bugs-footer-link">
                            <i class="bi bi-chevron-right"></i> Shop All Stock
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('shop.index', ['category' => 'vapes']) }}" class="bugs-footer-link">
                            <i class="bi bi-chevron-right"></i> Vapes &amp; Pods
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('shop.index', ['category' => 'e-liquids']) }}" class="bugs-footer-link">
                            <i class="bi bi-chevron-right"></i> E-Liquids &amp; Salts
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('shop.index', ['category' => 'glass-pipes']) }}" class="bugs-footer-link">
                            <i class="bi bi-chevron-right"></i> Glass &amp; Pipes
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('shop.index', ['category' => 'hookah']) }}" class="bugs-footer-link">
                            <i class="bi bi-chevron-right"></i> Hookah &amp; Shisha
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('shop.index', ['category' => 'phone-accessories']) }}" class="bugs-footer-link">
                            <i class="bi bi-chevron-right"></i> Phone Accessories
                        </a>
                    </li>
                </ul>
            </div>

            <!-- The Repair Bench -->
            <div class="col-6 col-md-3 col-lg-2">
                <p class="bugs-footer-eyebrow">Repair Bench</p>
                <ul class="list-unstyled d-flex flex-column gap-2 mb-0">
                    <li>
                        <a href="{{ route('repairs') }}" class="bugs-footer-link">
                            <i class="bi bi-chevron-right"></i> Screen Replacement
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('repairs') }}" class="bugs-footer-link">
                            <i class="bi bi-chevron-right"></i> Battery Swaps
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('repairs') }}" class="bugs-footer-link">
                            <i class="bi bi-chevron-right"></i> Charging Port Fix
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('repairs') }}" class="bugs-footer-link">
                            <i class="bi bi-chevron-right"></i> Liquid Diagnostic
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('repairs') }}" class="bugs-footer-link">
                            <i class="bi bi-chevron-right"></i> Carrier Unlocking
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('repairs') }}#quote" class="bugs-footer-link" style="color: var(--bugs-primary) !important;">
                            <i class="bi bi-chevron-right" style="opacity: 1 !important;"></i> Get Free Quote
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Storefront Information & Contact Card -->
            <div class="col-lg-4 col-xl-3">
                <p class="bugs-footer-eyebrow">Visit The Counter</p>
                <div class="bugs-footer-store-card">
                    <p class="text-white small fw-medium mb-2 d-flex align-items-center gap-2">
                        <i class="bi bi-geo-alt-fill" style="color: var(--bugs-primary)"></i>
                        10010 Halls Ferry Rd, St. Louis, MO 63136
                    </p>
                    <p class="text-secondary small mb-2 d-flex align-items-center gap-2">
                        <i class="bi bi-clock-fill" style="color: var(--bugs-primary)"></i>
                        Mon – Sun · 10:00 AM – 8:00 PM
                    </p>
                    <p class="text-secondary small mb-3 d-flex align-items-center gap-2">
                        <i class="bi bi-telephone-fill" style="color: var(--bugs-primary)"></i>
                        <a href="tel:+13144412851" class="text-decoration-none fw-medium" style="color: var(--bugs-primary)">
                            314-441-2851
                        </a>
                    </p>
                    <div class="border-top pt-2 mt-2" style="border-color: rgba(255, 255, 255, 0.08) !important;">
                        <span class="badge rounded-pill bg-black bg-opacity-75 text-secondary border border-secondary px-2 py-1" style="font-size: 0.68rem; font-weight: 400;">
                            Free local delivery over $50
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Compliance & Legal Middle Bar -->
        <div class="py-3 border-top border-bottom mb-4" style="border-color: var(--bugs-border) !important;">
            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-3 text-center text-md-start">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge rounded-pill bg-danger bg-opacity-10 text-danger border border-danger px-2 py-1 small fw-semibold" style="font-size: 0.7rem;">21+ RESTRICTED</span>
                    <span class="text-secondary small" style="font-size: 0.8rem;">
                        21+ Only. Valid government-issued photo ID required for all tobacco, vapor, and nicotine purchases in store and upon pickup or delivery.
                    </span>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <a href="{{ route('orders.lookup') }}" class="bugs-footer-link small text-nowrap">
                        Track Order
                    </a>
                    <span class="text-secondary opacity-25">&bull;</span>
                    <a href="{{ route('admin.login') }}" class="bugs-footer-link small text-nowrap">
                        Staff Portal
                    </a>
                </div>
            </div>
        </div>

        <!-- Bottom Copyright & Back to Top -->
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center gap-3 pt-2">
            <p class="text-secondary small mb-0" style="font-size: 0.8rem;">
                &copy; {{ date('Y') }} Bugs Wireless &amp; Smoke Shop. All rights reserved.
            </p>
            <a href="#" class="bugs-back-to-top" onclick="window.scrollTo({top: 0, behavior: 'smooth'}); return false;">
                Back to top <i class="bi bi-arrow-up-short fs-6"></i>
            </a>
        </div>
    </div>
</footer>
