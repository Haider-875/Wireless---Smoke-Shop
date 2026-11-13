<footer class="bugs-footer mt-auto">
    <div class="container-fluid px-3 px-lg-5" style="max-width: 1400px;">
        <!-- Top Main Footer Grid -->
        <div class="row g-4 g-lg-5 justify-content-between pb-5">
            <!-- Brand & Identity Column -->
            <div class="col-lg-4 col-xl-4">
                <a class="d-inline-flex align-items-center gap-2 text-white text-decoration-none mb-3" href="{{ route('home') }}">
                    <span class="fs-3 fw-bold font-display tracking-tight">BUGS<span style="color: var(--bugs-primary)">.</span></span>
                    <span class="eyebrow text-secondary leading-tight ms-1" style="font-size: 0.65rem;">
                        Wireless &amp;<br>Smoke Shop
                    </span>
                </a>
                <p class="body-3 text-secondary mb-4 pe-xl-3" style="max-width: 360px;">
                    One counter on Halls Ferry for premium vapes, glass, hookah, and phone gear — plus an expert repair bench that restores your phone while you wait.
                </p>

                <!-- Instagram Social Link -->
                <a href="https://www.instagram.com/bugs_wirless_and_smoke_shop/" 
                   target="_blank" 
                   rel="noreferrer" 
                   class="bugs-footer-link d-inline-flex align-items-center gap-2">
                    <i class="ph ph-instagram-logo fs-5" style="color: var(--bugs-primary);"></i>
                    <span>@bugs_wirless_and_smoke_shop</span>
                </a>
            </div>

            <!-- The Shelves (Shop Links) -->
            <div class="col-6 col-md-3 col-lg-2">
                <p class="eyebrow text-secondary mb-3" style="color: var(--bugs-primary) !important;">The Shelves</p>
                <ul class="list-unstyled d-flex flex-column gap-2 mb-0">
                    <li>
                        <a href="{{ route('shop.index') }}" class="bugs-footer-link">
                            Shop All Stock
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('shop.index', ['category' => 'vapes']) }}" class="bugs-footer-link">
                            Vapes &amp; Pods
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('shop.index', ['category' => 'glass-pipes']) }}" class="bugs-footer-link">
                            Glass &amp; Pipes
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('shop.index', ['category' => 'hookah']) }}" class="bugs-footer-link">
                            Hookah &amp; Shisha
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('shop.index', ['category' => 'phone-accessories']) }}" class="bugs-footer-link">
                            Phone Accessories
                        </a>
                    </li>
                </ul>
            </div>

            <!-- The Repair Bench -->
            <div class="col-6 col-md-3 col-lg-2">
                <p class="eyebrow text-secondary mb-3" style="color: var(--bugs-primary) !important;">Repair Bench</p>
                <ul class="list-unstyled d-flex flex-column gap-2 mb-0">
                    <li>
                        <a href="{{ route('repairs') }}" class="bugs-footer-link">
                            Screen Replacement
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('repairs') }}" class="bugs-footer-link">
                            Battery Swaps
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('repairs') }}" class="bugs-footer-link">
                            Charging Port Fix
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('repairs') }}" class="bugs-footer-link">
                            Liquid Diagnostic
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('repairs') }}#quote" class="bugs-footer-link" style="color: var(--bugs-primary) !important;">
                            Get Free Quote
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Visit Information & Store Details -->
            <div class="col-lg-4 col-xl-3">
                <p class="eyebrow text-secondary mb-3" style="color: var(--bugs-primary) !important;">Visit The Counter</p>
                <div class="d-flex flex-column gap-2">
                    <a href="https://www.google.com/maps/search/?api=1&query=Bugs+Wireless+%26+Smoke+Shop+10010+Halls+Ferry+Rd+St+Louis+MO+63136" 
                       target="_blank" 
                       rel="noreferrer" 
                       class="bugs-footer-link d-flex align-items-start gap-2 text-decoration-none">
                        <i class="ph ph-map-pin fs-5 mt-1 flex-shrink-0" style="color: var(--bugs-primary);"></i>
                        <span>10010 Halls Ferry Rd, St. Louis, MO 63136</span>
                    </a>

                    <a href="tel:+13144412851" class="bugs-footer-link d-flex align-items-center gap-2 text-decoration-none">
                        <i class="ph ph-phone fs-5 flex-shrink-0" style="color: var(--bugs-primary);"></i>
                        <span class="num">314-441-2851</span>
                    </a>

                    <p class="body-3 text-secondary mb-0 mt-1 d-flex align-items-center gap-2">
                        <i class="ph ph-clock fs-5 flex-shrink-0" style="color: var(--bugs-primary);"></i>
                        <span>Mon – Sun · 10:00 AM – 8:00 PM</span>
                    </p>
                </div>
            </div>
        </div>

        <!-- Compliance & Legal Text Bar -->
        <div class="py-3 border-top border-bottom mb-4" style="border-color: var(--bugs-border) !important;">
            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-3 text-center text-md-start">
                <span class="caption-2 text-secondary">
                    21+ Only. Valid government-issued photo ID required for all tobacco, vapor, and nicotine purchases in store and upon pickup or delivery.
                </span>
                <span class="num text-uppercase caption-3" style="color: var(--bugs-primary); letter-spacing: 0.16em;">
                    Nicotine is addictive
                </span>
            </div>
        </div>

        <!-- Bottom Copyright, Policies & Back to Top -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 pt-2">
            <div class="d-flex flex-wrap align-items-center gap-3">
                <p class="caption-2 text-secondary mb-0">
                    &copy; {{ date('Y') }} Bugs Wireless &amp; Smoke Shop. All rights reserved.
                </p>
                <span class="text-secondary opacity-25 d-none d-sm-inline">&bull;</span>
                <a href="{{ route('privacy') }}" class="caption-2 text-secondary text-decoration-none hover-white">
                    Privacy Policy
                </a>
                <span class="text-secondary opacity-25 d-none d-sm-inline">&bull;</span>
                <a href="{{ route('terms') }}" class="caption-2 text-secondary text-decoration-none hover-white">
                    Terms and Conditions
                </a>
            </div>

            <a href="#" class="bugs-back-to-top" onclick="window.scrollTo({top: 0, behavior: 'smooth'}); return false;">
                Back to top <i class="ph ph-arrow-up fs-6 ms-1"></i>
            </a>
        </div>
    </div>
</footer>
