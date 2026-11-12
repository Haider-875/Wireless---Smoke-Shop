<footer class="border-top pt-5 pb-4 mt-auto" style="background-color: #08080a; border-color: rgba(255, 255, 255, 0.07) !important;">
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
                <p class="text-secondary small leading-relaxed mb-4 pe-xl-3" style="max-width: 340px;">
                    One counter on Halls Ferry for vapes, glass, hookah and phone gear — plus the repair bench that keeps your phone alive.
                </p>

                <!-- Instagram Social Link -->
                <a href="https://www.instagram.com/bugs_wirless_and_smoke_shop/" 
                   target="_blank" 
                   rel="noreferrer" 
                   class="bugs-footer-link d-inline-flex align-items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-instagram flex-shrink-0">
                        <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                        <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
                    </svg>
                    <span>@bugs_wirless_and_smoke_shop</span>
                </a>
            </div>

            <!-- The Shelves (Shop Links) -->
            <div class="col-6 col-md-3 col-lg-2">
                <p class="eyebrow text-secondary mb-3" style="font-size: 0.72rem; letter-spacing: 0.18em; text-transform: uppercase;">The Shelves</p>
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
                <p class="eyebrow text-secondary mb-3" style="font-size: 0.72rem; letter-spacing: 0.18em; text-transform: uppercase;">Repair Bench</p>
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
                <p class="eyebrow text-secondary mb-3" style="font-size: 0.72rem; letter-spacing: 0.18em; text-transform: uppercase;">Visit The Counter</p>
                <div class="d-flex flex-column gap-2">
                    <a href="https://www.google.com/maps/search/?api=1&query=Bugs+Wireless+%26+Smoke+Shop+10010+Halls+Ferry+Rd+St+Louis+MO+63136" 
                       target="_blank" 
                       rel="noreferrer" 
                       class="bugs-footer-link d-flex align-items-start gap-2 text-decoration-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin mt-1 flex-shrink-0">
                            <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <span>10010 Halls Ferry Rd, St. Louis, MO 63136</span>
                    </a>

                    <a href="tel:+13144412851" class="bugs-footer-link d-flex align-items-center gap-2 text-decoration-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone flex-shrink-0">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        <span class="num">314-441-2851</span>
                    </a>

                    <p class="text-secondary small mb-0 mt-1">
                        Mon – Sun · 10:00 AM – 8:00 PM
                    </p>
                </div>
            </div>
        </div>

        <!-- Compliance & Legal Text Bar (Clean - No Badges) -->
        <div class="py-3 border-top border-bottom mb-4" style="border-color: rgba(255, 255, 255, 0.07) !important;">
            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-3 text-center text-md-start">
                <span class="text-secondary small" style="font-size: 0.8rem;">
                    21+ Only. Valid government-issued photo ID required for all tobacco, vapor, and nicotine purchases in store and upon pickup or delivery.
                </span>
                <span class="num text-uppercase text-secondary small" style="letter-spacing: 0.18em; font-size: 0.72rem;">
                    Nicotine is addictive
                </span>
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
