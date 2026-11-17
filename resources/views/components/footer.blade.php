<footer class="bugs-footer mt-auto border-top border-white border-opacity-10 py-4 py-lg-5" style="background-color: hsl(var(--surface-deep));">
    <div class="container-fluid px-3 px-sm-4 px-lg-5" style="max-width: 1400px;">
        <!-- Top Main Footer Grid (Exact Reference Columns & Content) -->
        <div class="row g-3 g-md-4 g-lg-5 justify-content-between pb-3 pb-lg-5">
            <!-- Brand & Identity Column -->
            <div class="col-lg-4 col-xl-4">
                <p class="font-display fs-4 fw-semibold tracking-tight text-white mb-1">BUGS<span class="text-steel">.</span></p>
                <p class="eyebrow text-secondary mb-2 mb-sm-3" style="font-size: 0.72rem; letter-spacing: 0.08em;">
                    Wireless &amp; Repair · <span style="color: rgba(229, 169, 59, 0.85);">Smoke shop inside</span>
                </p>
                <p class="text-secondary mb-3 mb-lg-4 pe-xl-3" style="max-width: 340px; font-size: 0.8125rem; line-height: 1.55;">
                    A phone and tablet repair bench on Halls Ferry — screens, batteries, charging ports and carrier activation, all done at the counter. Devices, accessories and a 21+ tobacco counter alongside.
                </p>
                <a href="https://www.instagram.com/bugs_wirless_and_smoke_shop/" 
                   target="_blank" 
                   rel="noreferrer" 
                   class="d-inline-flex align-items-center gap-2 text-secondary text-decoration-none hover-steel" style="font-size: 0.8125rem;">
                    <i data-lucide="instagram" class="w-4 h-4 text-steel"></i>
                    <span>@bugs_wirless_and_smoke_shop</span>
                </a>
            </div>

            <!-- Column 2: Repairs -->
            <div class="col-6 col-md-3 col-lg-2">
                <p class="eyebrow text-secondary mb-2 mb-sm-3" style="font-size: 0.75rem; letter-spacing: 0.15em;">Repairs</p>
                <ul class="list-unstyled d-flex flex-column gap-1.5 gap-sm-2 mb-0" style="font-size: 0.8125rem;">
                    <li>
                        <a href="{{ route('repairs') }}" class="text-secondary text-decoration-none hover-steel">Phone &amp; tablet repair</a>
                    </li>
                    <li><a href="{{ route('repairs') }}" class="text-secondary text-decoration-none hover-steel">Carrier activation</a></li>
                    <li><a href="{{ route('repairs') }}" class="text-secondary text-decoration-none hover-steel">Data transfer &amp; backup</a></li>
                    <li><a href="{{ route('orders.lookup') }}" class="text-secondary text-decoration-none hover-steel">Your orders</a></li>
                </ul>
            </div>

            <!-- Column 3: Shop -->
            <div class="col-6 col-md-3 col-lg-2">
                <p class="eyebrow text-secondary mb-2 mb-sm-3" style="font-size: 0.75rem; letter-spacing: 0.15em;">Shop</p>
                <ul class="list-unstyled d-flex flex-column gap-1.5 gap-sm-2 mb-0" style="font-size: 0.8125rem;">
                    <li><a href="{{ route('shop.index', ['category' => 'Phone Accessories']) }}" class="text-secondary text-decoration-none hover-steel">Cases, glass &amp; audio</a></li>
                    <li><a href="{{ route('shop.index', ['category' => 'Vapes']) }}" class="text-secondary text-decoration-none hover-steel">Vapes &amp; disposables</a></li>
                    <li><a href="{{ route('shop.index', ['category' => 'Glass & Pipes']) }}" class="text-secondary text-decoration-none hover-steel">Glass &amp; pipes</a></li>
                    <li><a href="{{ route('gallery') }}" class="text-secondary text-decoration-none hover-steel">Store gallery</a></li>
                </ul>
            </div>

            <!-- Column 4: Visit -->
            <div class="col-lg-4 col-xl-3">
                <p class="eyebrow text-secondary mb-2 mb-sm-3" style="font-size: 0.75rem; letter-spacing: 0.15em;">Visit</p>
                <div class="d-flex flex-column gap-1.5 gap-sm-2" style="font-size: 0.8125rem;">
                    <a href="https://www.google.com/maps/search/?api=1&query=Bugs+Wireless+%26+Smoke+Shop+10010+Halls+Ferry+Rd+St+Louis+MO+63136" 
                       target="_blank" 
                       rel="noreferrer" 
                       class="d-flex align-items-start gap-2 text-secondary text-decoration-none hover-steel">
                        <i data-lucide="map-pin" class="w-4 h-4 mt-1 text-steel flex-shrink-0"></i>
                        <span>10010 Halls Ferry Rd, St. Louis, MO 63136</span>
                    </a>

                    <a href="tel:+13144412851" class="d-flex align-items-center gap-2 text-secondary text-decoration-none hover-steel">
                        <i data-lucide="phone" class="w-4 h-2 text-steel flex-shrink-0"></i>
                        <span class="num text-white">314-441-2851</span>
                    </a>

                    <p class="text-secondary mb-0 mt-1 d-flex align-items-center gap-2">
                        <i data-lucide="clock" class="w-4 h-4 text-steel flex-shrink-0"></i>
                        <span>Mon – Sun · 10:00 AM – 8:00 PM</span>
                    </p>
                </div>
            </div>
        </div>

        <!-- Bottom Copyright, Policies & Statutory Notice (Exact Reference Match) -->
        <div class="mt-3 mt-lg-4 pt-3 pt-lg-4 border-top border-white border-opacity-10 d-flex flex-column gap-2 gap-sm-3" style="font-size: 0.72rem;">
            <nav class="d-flex flex-wrap align-items-center gap-3 gap-sm-4">
                <a href="/policies#shipping" class="text-secondary text-decoration-none hover-white">Delivery &amp; pickup</a>
                <a href="/policies#returns" class="text-secondary text-decoration-none hover-white">Returns</a>
                <a href="/policies#age" class="text-secondary text-decoration-none hover-white">21+ age policy</a>
                <a href="/policies#privacy" class="text-secondary text-decoration-none hover-white">Privacy</a>
            </nav>
            <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between gap-2 gap-sm-3 text-secondary">
                <div class="d-flex flex-wrap align-items-center gap-2">
                    <p class="mb-0">&copy; {{ date('Y') }} Bugs Wireless &amp; Smoke Shop. All rights reserved.</p>
                    <span class="d-none d-sm-inline opacity-50">·</span>
                    <p class="mb-0">
                        <a href="https://azorasolution.com" target="_blank" rel="noopener noreferrer" class="text-secondary text-decoration-none hover-steel">Designed By Azora Solution</a>
                    </p>
                </div>
                <p class="mb-0 num text-uppercase" style="letter-spacing: 0.15em; font-size: 11px;">Tobacco &amp; vape products for adults 21+ · Nicotine is addictive</p>
            </div>
        </div>
    </div>
</footer>
