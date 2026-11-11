<footer class="border-top py-5 mt-auto" style="border-color: var(--bugs-border) !important; background-color: var(--bugs-card-alt);">
    <div class="container-fluid px-3 px-lg-5">
        <div class="row g-4 justify-content-between">
            <!-- Brand & Location Details -->
            <div class="col-lg-4">
                <span class="fs-4 fw-bold font-display text-white">BUGS<span style="color: var(--bugs-primary)">.</span></span>
                <p class="eyebrow text-secondary mt-1">Wireless &amp; Smoke Shop</p>
                <p class="text-secondary small mt-3 mb-1">
                    <i class="bi bi-geo-alt me-1 text-secondary"></i>
                    10010 Halls Ferry Rd, St. Louis, MO 63136
                </p>
                <p class="text-secondary small mb-1">
                    <i class="bi bi-clock me-1 text-secondary"></i>
                    Mon – Sun · 10:00 AM – 8:00 PM
                </p>
                <p class="text-secondary small mb-3">
                    <i class="bi bi-telephone me-1 text-secondary"></i>
                    <a href="tel:+13144412851" class="text-decoration-none" style="color: var(--bugs-primary)">314-441-2851</a>
                </p>
                <div class="d-flex gap-2">
                    <a href="https://www.google.com/maps/search/?api=1&query=Bugs+Wireless+%26+Smoke+Shop+10010+Halls+Ferry+Rd+St+Louis+MO+63136" target="_blank" rel="noreferrer" class="btn btn-bugs-outline btn-bugs-pill-sm gap-2">
                        <i class="bi bi-map"></i> Directions
                    </a>
                    <a href="https://www.instagram.com/bugs_wirless_and_smoke_shop/" target="_blank" rel="noreferrer" class="btn btn-bugs-outline btn-bugs-pill-sm gap-2">
                        <i class="bi bi-instagram"></i> Instagram
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-6 col-md-3 col-lg-2">
                <p class="eyebrow text-secondary mb-3">Shop</p>
                <ul class="list-unstyled d-flex flex-column gap-2 small">
                    <li><a href="{{ route('home') }}" class="text-secondary text-decoration-none hover-white">Vapes</a></li>
                    <li><a href="{{ route('home') }}" class="text-secondary text-decoration-none hover-white">E-Liquids</a></li>
                    <li><a href="{{ route('home') }}" class="text-secondary text-decoration-none hover-white">Glass &amp; Pipes</a></li>
                    <li><a href="{{ route('home') }}" class="text-secondary text-decoration-none hover-white">Hookah</a></li>
                    <li><a href="{{ route('home') }}" class="text-secondary text-decoration-none hover-white">Phone Accessories</a></li>
                </ul>
            </div>

            <!-- Services & Information -->
            <div class="col-6 col-md-3 col-lg-2">
                <p class="eyebrow text-secondary mb-3">Repairs</p>
                <ul class="list-unstyled d-flex flex-column gap-2 small">
                    <li><a href="{{ route('repairs') }}" class="text-secondary text-decoration-none hover-white">Screen Repair</a></li>
                    <li><a href="{{ route('repairs') }}" class="text-secondary text-decoration-none hover-white">Battery Swap</a></li>
                    <li><a href="{{ route('repairs') }}" class="text-secondary text-decoration-none hover-white">Charging Port</a></li>
                    <li><a href="{{ route('repairs') }}" class="text-secondary text-decoration-none hover-white">Liquid Damage</a></li>
                    <li><a href="{{ route('repairs') }}" class="text-secondary text-decoration-none hover-white">Carrier Activation</a></li>
                </ul>
            </div>

            <!-- Legal & Compliance Notice -->
            <div class="col-lg-4 text-lg-end">
                <p class="eyebrow text-secondary mb-2">Age Verification &amp; Legal</p>
                <p class="text-secondary small leading-relaxed">
                    21+ Only. Valid government-issued photo ID required for all tobacco, vapor, and nicotine purchases in store and upon delivery.
                </p>
                <p class="text-secondary small mt-4 mb-0">&copy; {{ date('Y') }} Bugs Wireless &amp; Smoke Shop. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>
