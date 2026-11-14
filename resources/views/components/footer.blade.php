<footer class="bugs-footer mt-auto border-top border-white border-opacity-10 py-5" style="background-color: hsl(var(--surface-deep));">
    <div class="container-fluid px-4 px-lg-5" style="max-width: 1400px;">
        <!-- Top Main Footer Grid -->
        <div class="row g-4 g-lg-5 justify-content-between pb-5">
            <!-- Brand & Identity Column -->
            <div class="col-lg-4 col-xl-4">
                <a class="d-inline-flex align-items-center gap-2 text-white text-decoration-none mb-3" href="{{ route('home') }}">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="BUGS" width="32" height="32" class="rounded-circle">
                    <span class="fs-4 fw-bold font-display tracking-tight">BUGS<span class="text-steel">.</span></span>
                </a>
                <p class="body-3 text-secondary mb-4 pe-xl-3" style="max-width: 360px; font-size: 0.9375rem; line-height: 1.6;">
                    Phone and tablet repairs while you wait, with honest upfront bench quotes, plus our curated smoke shop counter on Halls Ferry.
                </p>

                <!-- Instagram Social Link -->
                <a href="https://www.instagram.com/bugs_wirless_and_smoke_shop/" 
                   target="_blank" 
                   rel="noreferrer" 
                   class="d-inline-flex align-items-center gap-2 text-secondary text-decoration-none hover-white" style="font-size: 0.875rem;">
                    <i data-lucide="instagram" class="w-4 h-4 text-steel"></i>
                    <span>@bugs_wirless_and_smoke_shop</span>
                </a>
            </div>

            <!-- The Shelves (Shop Links) -->
            <div class="col-6 col-md-3 col-lg-2">
                <p class="eyebrow text-white mb-3" style="font-size: 0.75rem; letter-spacing: 0.15em;">The Shelves</p>
                <ul class="list-unstyled d-flex flex-column gap-2 mb-0" style="font-size: 0.875rem;">
                    <li><a href="{{ route('shop.index') }}" class="text-secondary text-decoration-none hover-white">All products</a></li>
                    <li><a href="{{ route('shop.index', ['category' => 'phone-accessories']) }}" class="text-secondary text-decoration-none hover-white">Cases, glass &amp; audio</a></li>
                    <li><a href="{{ route('shop.index', ['category' => 'vapes']) }}" class="text-secondary text-decoration-none hover-white">Vapes &amp; disposables</a></li>
                    <li><a href="{{ route('shop.index', ['category' => 'glass-pipes']) }}" class="text-secondary text-decoration-none hover-white">Glass &amp; pipes</a></li>
                    <li><a href="{{ route('shop.index', ['category' => 'hookah']) }}" class="text-secondary text-decoration-none hover-white">Hookah &amp; shisha</a></li>
                </ul>
            </div>

            <!-- The Repair Bench -->
            <div class="col-6 col-md-3 col-lg-2">
                <p class="eyebrow text-white mb-3" style="font-size: 0.75rem; letter-spacing: 0.15em;">Repair Bench</p>
                <ul class="list-unstyled d-flex flex-column gap-2 mb-0" style="font-size: 0.875rem;">
                    <li><a href="{{ route('repairs') }}" class="text-secondary text-decoration-none hover-white">Phone &amp; tablet repair</a></li>
                    <li><a href="{{ route('repairs') }}" class="text-secondary text-decoration-none hover-white">Screen replacement</a></li>
                    <li><a href="{{ route('repairs') }}" class="text-secondary text-decoration-none hover-white">Battery replacement</a></li>
                    <li><a href="{{ route('repairs') }}" class="text-secondary text-decoration-none hover-white">Carrier activation</a></li>
                    <li><a href="{{ route('repairs') }}" class="text-secondary text-decoration-none hover-white">Data transfer &amp; backup</a></li>
                </ul>
            </div>

            <!-- Visit Information & Store Details -->
            <div class="col-lg-4 col-xl-3">
                <p class="eyebrow text-white mb-3" style="font-size: 0.75rem; letter-spacing: 0.15em;">Visit The Counter</p>
                <div class="d-flex flex-column gap-2" style="font-size: 0.875rem;">
                    <a href="https://www.google.com/maps/search/?api=1&query=Bugs+Wireless+%26+Smoke+Shop+10010+Halls+Ferry+Rd+St+Louis+MO+63136" 
                       target="_blank" 
                       rel="noreferrer" 
                       class="d-flex align-items-start gap-2 text-secondary text-decoration-none hover-white">
                        <i data-lucide="map-pin" class="w-4 h-4 mt-1 text-steel flex-shrink-0"></i>
                        <span>10010 Halls Ferry Rd, St. Louis, MO 63136</span>
                    </a>

                    <a href="tel:+13144412851" class="d-flex align-items-center gap-2 text-secondary text-decoration-none hover-white">
                        <i data-lucide="phone" class="w-4 h-4 text-steel flex-shrink-0"></i>
                        <span>314-441-2851</span>
                    </a>

                    <p class="text-secondary mb-0 mt-1 d-flex align-items-center gap-2">
                        <i data-lucide="clock" class="w-4 h-4 text-steel flex-shrink-0"></i>
                        <span>Mon – Sun · 10:00 AM – 8:00 PM</span>
                    </p>
                </div>
            </div>
        </div>

        <!-- Compliance & Legal Text Bar -->
        <div class="py-3 border-top border-bottom border-white border-opacity-10 mb-4">
            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-3 text-center text-md-start">
                <span class="text-secondary small">
                    21+ Only. Valid government-issued photo ID required for all tobacco, vapor, and nicotine purchases in store and upon pickup or delivery.
                </span>
                <span class="eyebrow text-steel" style="letter-spacing: 0.15em;">
                    Nicotine is addictive
                </span>
            </div>
        </div>

        <!-- Bottom Copyright, Policies & Back to Top -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 pt-2">
            <div class="d-flex flex-wrap align-items-center gap-3" style="font-size: 0.8125rem;">
                <p class="text-secondary mb-0">
                    &copy; {{ date('Y') }} Bugs Wireless &amp; Smoke Shop. All rights reserved.
                </p>
                <span class="text-secondary opacity-25 d-none d-sm-inline">&bull;</span>
                <a href="/policies#shipping" class="text-secondary text-decoration-none hover-white">
                    Delivery &amp; pickup
                </a>
                <span class="text-secondary opacity-25 d-none d-sm-inline">&bull;</span>
                <a href="/policies#returns" class="text-secondary text-decoration-none hover-white">
                    Returns
                </a>
                <span class="text-secondary opacity-25 d-none d-sm-inline">&bull;</span>
                <a href="/policies#age" class="text-secondary text-decoration-none hover-white">
                    21+ age policy
                </a>
                <span class="text-secondary opacity-25 d-none d-sm-inline">&bull;</span>
                <a href="/policies#privacy" class="text-secondary text-decoration-none hover-white">
                    Privacy
                </a>
                <span class="text-secondary opacity-25 d-none d-sm-inline">&bull;</span>
                <a href="{{ route('terms') }}" class="text-secondary text-decoration-none hover-white">
                    Terms
                </a>
            </div>

            <a href="#" class="text-secondary text-decoration-none d-inline-flex align-items-center gap-1 hover-white small" onclick="window.scrollTo({top: 0, behavior: 'smooth'}); return false;">
                Back to top <i data-lucide="arrow-up" class="w-3.5 h-3.5 ms-1"></i>
            </a>
        </div>
    </div>
</footer>
