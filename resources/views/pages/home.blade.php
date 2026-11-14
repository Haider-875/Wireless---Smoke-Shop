@extends('layouts.app')

@section('title', 'Bugs Wireless — Phone & Tablet Repair on Halls Ferry, St. Louis')
@section('meta_description', 'Phone and tablet repair while you wait on Halls Ferry Rd, St. Louis. Screen replacement, fresh batteries, charging ports, wireless gear and 21+ smoke shop inside.')

@section('content')
<!-- ==========================================================================
     Section 1: Hero Section (Exact Reference Layout & Typography)
     ========================================================================== -->
<section class="position-relative overflow-hidden py-5" style="background-color: hsl(var(--background)); min-height: 85vh; display: flex; align-items: center;">
    <!-- Radial Ambient Auras -->
    <div class="pointer-events-none position-absolute glow-platinum" style="top: -100px; left: -120px; width: 520px; height: 520px; z-index: 1;"></div>
    <div class="pointer-events-none position-absolute glow-steel" style="bottom: -80px; right: -100px; width: 460px; height: 460px; z-index: 1;"></div>

    <div class="container-fluid px-4 px-lg-5 position-relative" style="max-width: 1400px; z-index: 2;">
        <div class="row align-items-center g-5 py-4">
            <!-- Left: Hero Text & Actions -->
            <div class="col-lg-6 reveal">
                <p class="eyebrow d-inline-flex align-items-center gap-2 text-steel mb-3" style="font-size: 0.75rem; letter-spacing: 0.15em;">
                    <i data-lucide="shield-check" class="w-4 h-4"></i> Certified repair counter · St. Louis
                </p>

                <h1 class="display-3 fw-semibold text-white tracking-tight mb-4" style="line-height: 1.05; letter-spacing: -0.03em;">
                    Phone repair,<br>
                    <span class="font-serif-display text-steel" style="font-size: 1.05em;">the same day</span><br>
                    on Halls Ferry.
                </h1>

                <p class="text-secondary mb-4 pb-2" style="max-width: 480px; font-size: 1.0625rem; line-height: 1.6;">
                    Cracked screen, tired battery, dead charging port &mdash; our technicians work the bench in front of you, with the price agreed before a single screw comes out. Phones, tablets and wireless service, plus the tobacco counter in the back.
                </p>

                <div class="d-flex flex-wrap align-items-center gap-3 mb-5">
                    <a href="{{ route('repairs') }}" class="btn btn-bugs-primary px-4 py-3 rounded-pill fw-semibold text-dark d-inline-flex align-items-center gap-2">
                        <i data-lucide="wrench" class="w-4 h-4"></i>
                        <span>Fix my phone</span>
                        <i data-lucide="arrow-right" class="w-4 h-4 ms-1"></i>
                    </a>
                    <a href="{{ route('shop.index', ['category' => 'phone-accessories']) }}" class="btn btn-bugs-outline px-4 py-3 rounded-pill text-white d-inline-flex align-items-center gap-2">
                        <span>Shop phones &amp; accessories</span>
                    </a>
                </div>

                <!-- Proof Signals Strip -->
                <div class="row g-4 pt-4 border-top border-white border-opacity-10" style="max-width: 520px;">
                    <div class="col-4">
                        <div class="fw-bold text-white fs-4">30 min</div>
                        <div class="text-secondary small mt-1">Most screen repairs</div>
                    </div>
                    <div class="col-4">
                        <div class="fw-bold text-white fs-4">21+</div>
                        <div class="text-secondary small mt-1">ID checked in store</div>
                    </div>
                    <div class="col-4">
                        <div class="fw-bold text-white fs-4">7 days</div>
                        <div class="text-secondary small mt-1">Open 10 &ndash; 8 daily</div>
                    </div>
                </div>
            </div>

            <!-- Right: Hero Visual with Overlaid Floating Desk Card -->
            <div class="col-lg-6 position-relative">
                <div class="overflow-hidden rounded-4 border border-white border-opacity-10 shadow-lg" style="background-color: hsl(var(--surface-raised));">
                    <div class="ratio ratio-4x3">
                        <img src="{{ asset('assets/images/lifestyle/hero-display.png') }}" 
                             alt="A technician replacing a phone screen at a repair bench" 
                             class="w-100 h-100 object-fit-cover"
                             loading="eager">
                    </div>
                </div>

                <!-- Overlaid Floating Repair Desk Card -->
                <div class="position-absolute p-3 p-sm-4 border border-white border-opacity-10 rounded-4 shadow-lg" 
                     style="background-color: hsl(var(--surface)); bottom: -24px; left: 24px; right: 24px; max-width: 480px; box-shadow: 0 20px 50px -20px rgba(0,0,0,0.9) !important;">
                    <div class="d-flex align-items-center justify-content-between gap-3">
                        <div>
                            <p class="eyebrow mb-1 text-steel" style="font-size: 0.6875rem; letter-spacing: 0.15em;">Walk-in repair desk</p>
                            <p class="text-white small mb-0">Cracked screen? Bring it in &mdash; free quote, no appointment.</p>
                        </div>
                        <a href="tel:+13144412851" class="btn btn-sm btn-bugs-outline rounded-circle p-2 flex-shrink-0 d-flex align-items-center justify-content-center" title="Call the counter" style="width: 40px; height: 40px;">
                            <i data-lucide="phone" class="w-4 h-4 text-steel"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     Section 2: Repair Bench ("Broken today, fixed by tonight.")
     ========================================================================== -->
<section id="repairs" class="position-relative overflow-hidden py-5 border-top border-white border-opacity-10" style="background-color: hsl(var(--background));">
    <div class="pointer-events-none position-absolute glow-steel" style="top: 40px; left: -100px; width: 420px; height: 420px; z-index: 1;"></div>

    <div class="container-fluid px-4 px-lg-5 py-5 position-relative" style="max-width: 1400px; z-index: 2;">
        <div class="row align-items-center g-5">
            <!-- Left: Bench Imagery -->
            <div class="col-lg-6 order-2 order-lg-1">
                <div class="overflow-hidden rounded-4 border border-white border-opacity-10 shadow-lg" style="background-color: hsl(var(--surface-raised));">
                    <div class="ratio ratio-4x3">
                        <img src="{{ asset('assets/images/lifestyle/repair-bench.png') }}" 
                             alt="A technician repairing a phone at the bench" 
                             class="w-100 h-100 object-fit-cover"
                             loading="lazy">
                    </div>
                </div>
            </div>

            <!-- Right: Bench Messaging & Capabilities -->
            <div class="col-lg-6 order-1 order-lg-2">
                <p class="eyebrow text-steel mb-2" style="font-size: 0.75rem; letter-spacing: 0.15em;">The repair bench</p>
                <h2 class="display-5 fw-semibold text-white tracking-tight mb-4" style="line-height: 1.15; letter-spacing: -0.025em;">
                    Broken today,<br>
                    <span class="font-serif-display text-steel" style="font-size: 1.05em;">fixed by tonight</span>.
                </h2>
                <p class="text-secondary mb-4 pb-2" style="font-size: 1.0625rem; line-height: 1.6;">
                    Cracked screen, dead battery, bent charging port. Bring it to 10010 Halls Ferry Rd &mdash; we diagnose on the spot, give you the exact price up front, and hand it back fixed the same day.
                </p>

                <!-- 4 Capabilities Grid -->
                <div class="row g-3 mb-4 pb-2">
                    <div class="col-sm-6">
                        <div class="p-3 rounded-3 border border-white border-opacity-10 h-100" style="background-color: hsl(var(--card));">
                            <span class="text-steel d-block fw-semibold mb-1" style="font-size: 0.9375rem;">Screen replacement</span>
                            <span class="text-secondary small d-block">OLED, LCD &amp; glass for iPhone, Samsung &amp; Motorola</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 rounded-3 border border-white border-opacity-10 h-100" style="background-color: hsl(var(--card));">
                            <span class="text-steel d-block fw-semibold mb-1" style="font-size: 0.9375rem;">Battery replacement</span>
                            <span class="text-secondary small d-block">Fresh batteries with health calibrated and tested</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 rounded-3 border border-white border-opacity-10 h-100" style="background-color: hsl(var(--card));">
                            <span class="text-steel d-block fw-semibold mb-1" style="font-size: 0.9375rem;">Charging port repair</span>
                            <span class="text-secondary small d-block">Cleaned, re-soldered or replaced lightning/USB-C ports</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 rounded-3 border border-white border-opacity-10 h-100" style="background-color: hsl(var(--card));">
                            <span class="text-steel d-block fw-semibold mb-1" style="font-size: 0.9375rem;">Liquid damage service</span>
                            <span class="text-secondary small d-block">Cleaned, assessed and corrosion remediation</span>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-wrap align-items-center gap-3">
                    <a href="{{ route('repairs') }}" class="btn btn-bugs-primary px-4 py-3 rounded-pill fw-semibold text-dark d-inline-flex align-items-center gap-2">
                        <span>See repair services</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                    <a href="tel:+13144412851" class="btn btn-bugs-outline px-4 py-3 rounded-pill text-white d-inline-flex align-items-center gap-2">
                        <i data-lucide="phone" class="w-4 h-4 text-steel"></i>
                        <span>Call the bench</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     Section 3: Wireless Counter ("Gear for the phone you just fixed.")
     ========================================================================== -->
<section class="py-5 border-top border-white border-opacity-10" style="background-color: hsl(var(--surface));">
    <div class="container-fluid px-4 px-lg-5 py-5" style="max-width: 1400px;">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-3 mb-5">
            <div>
                <p class="eyebrow text-steel mb-2" style="font-size: 0.75rem; letter-spacing: 0.15em;">The wireless counter</p>
                <h2 class="display-6 fw-semibold text-white tracking-tight mb-0">
                    Gear for the phone<span class="font-serif-display text-steel"> you just fixed</span>.
                </h2>
                <p class="text-secondary small mt-2 mb-0">What everybody gets with a new screen &mdash; cases, tempered glass, audio, and fast chargers.</p>
            </div>
            <a href="{{ route('shop.index') }}" class="text-white text-decoration-none d-inline-flex align-items-center gap-2 hover-steel" style="font-size: 0.9375rem;">
                <span>Shop all products</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4">
            @foreach($featuredProducts->take(4) as $product)
                <div class="col">
                    @include('components.product-card', ['product' => $product])
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ==========================================================================
     Section 4: Smoke Shop ("The smoke shop side of the counter.")
     ========================================================================== -->
<section id="shelves" class="position-relative overflow-hidden py-5 border-top border-white border-opacity-10" style="background-color: hsl(var(--background));">
    <div class="pointer-events-none position-absolute glow-gold" style="top: 10%; right: -120px; width: 440px; height: 440px; z-index: 1;"></div>
    <div class="container-fluid px-4 px-lg-5 py-5 position-relative" style="max-width: 1400px; z-index: 2;">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-3 mb-5">
            <div>
                <p class="eyebrow text-gold mb-2" style="font-size: 0.75rem; letter-spacing: 0.15em;">Also in store · 21+ counter · Five aisles, one counter</p>
                <h2 class="display-6 fw-semibold text-white tracking-tight mb-0">
                    The smoke shop<span class="font-serif-display text-gold"> side</span> of the counter.
                </h2>
            </div>
            <p class="text-secondary small mb-0" style="max-width: 380px; line-height: 1.6;">
                Vapes, nic salts, hand-blown glass and hookah &mdash; stocked online too, ready for pickup or local delivery. Adults 21+ with valid ID, always.
            </p>
        </div>

        <!-- 5 Interactive Aisle Cards Grid -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-5 g-3">
            <!-- 01 Vapes -->
            <div class="col">
                <a href="{{ route('shop.index', ['category' => 'vapes']) }}" class="card h-100 p-4 border border-white border-opacity-10 text-decoration-none group transition-all duration-300" style="background-color: hsl(var(--card)); border-radius: 1rem; min-height: 190px; display: flex; flex-direction: column; justify-content: space-between;">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="eyebrow text-gold fw-bold" style="font-size: 0.8125rem;">01</span>
                        <i data-lucide="wind" class="w-5 h-5 text-secondary group-hover:text-gold transition-colors"></i>
                    </div>
                    <div>
                        <h3 class="fs-5 fw-semibold text-white mb-1">Vapes</h3>
                        <p class="text-secondary small mb-0">Disposables, pods and rechargeables</p>
                    </div>
                </a>
            </div>

            <!-- 02 E-Liquids -->
            <div class="col">
                <a href="{{ route('shop.index', ['category' => 'e-liquids']) }}" class="card h-100 p-4 border border-white border-opacity-10 text-decoration-none group transition-all duration-300" style="background-color: hsl(var(--card)); border-radius: 1rem; min-height: 190px; display: flex; flex-direction: column; justify-content: space-between;">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="eyebrow text-gold fw-bold" style="font-size: 0.8125rem;">02</span>
                        <i data-lucide="droplet" class="w-5 h-5 text-secondary group-hover:text-gold transition-colors"></i>
                    </div>
                    <div>
                        <h3 class="fs-5 fw-semibold text-white mb-1">E-Liquids</h3>
                        <p class="text-secondary small mb-0">Nic salts and freebase, 0–50mg</p>
                    </div>
                </a>
            </div>

            <!-- 03 Glass & Pipes -->
            <div class="col">
                <a href="{{ route('shop.index', ['category' => 'glass-pipes']) }}" class="card h-100 p-4 border border-white border-opacity-10 text-decoration-none group transition-all duration-300" style="background-color: hsl(var(--card)); border-radius: 1rem; min-height: 190px; display: flex; flex-direction: column; justify-content: space-between;">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="eyebrow text-gold fw-bold" style="font-size: 0.8125rem;">03</span>
                        <i data-lucide="flame" class="w-5 h-5 text-secondary group-hover:text-gold transition-colors"></i>
                    </div>
                    <div>
                        <h3 class="fs-5 fw-semibold text-white mb-1">Glass &amp; Pipes</h3>
                        <p class="text-secondary small mb-0">Beakers, spoons and hand-blown pieces</p>
                    </div>
                </a>
            </div>

            <!-- 04 Hookah -->
            <div class="col">
                <a href="{{ route('shop.index', ['category' => 'hookah']) }}" class="card h-100 p-4 border border-white border-opacity-10 text-decoration-none group transition-all duration-300" style="background-color: hsl(var(--card)); border-radius: 1rem; min-height: 190px; display: flex; flex-direction: column; justify-content: space-between;">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="eyebrow text-gold fw-bold" style="font-size: 0.8125rem;">04</span>
                        <i data-lucide="sparkles" class="w-5 h-5 text-secondary group-hover:text-gold transition-colors"></i>
                    </div>
                    <div>
                        <h3 class="fs-5 fw-semibold text-white mb-1">Hookah</h3>
                        <p class="text-secondary small mb-0">Stems, hoses, bowls and shisha</p>
                    </div>
                </a>
            </div>

            <!-- 05 Phone Accessories -->
            <div class="col">
                <a href="{{ route('shop.index', ['category' => 'phone-accessories']) }}" class="card h-100 p-4 border border-white border-opacity-10 text-decoration-none group transition-all duration-300" style="background-color: hsl(var(--card)); border-radius: 1rem; min-height: 190px; display: flex; flex-direction: column; justify-content: space-between;">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="eyebrow text-gold fw-bold" style="font-size: 0.8125rem;">05</span>
                        <i data-lucide="headphones" class="w-5 h-5 text-secondary group-hover:text-gold transition-colors"></i>
                    </div>
                    <div>
                        <h3 class="fs-5 fw-semibold text-white mb-1">Phone Accessories</h3>
                        <p class="text-secondary small mb-0">Cases, glass, audio and power</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     Section 5: Visit The Counter ("Repairs, activation and a look around.")
     ========================================================================== -->
<section id="visit" class="py-5 border-top border-white border-opacity-10" style="background-color: hsl(var(--surface-deep));">
    <div class="container-fluid px-4 px-lg-5 py-5" style="max-width: 1400px;">
        <div class="row align-items-center g-5">
            <!-- Left: Location Info & Actions -->
            <div class="col-lg-6">
                <p class="eyebrow text-steel mb-2" style="font-size: 0.75rem; letter-spacing: 0.15em;">Visit the counter</p>
                <h2 class="display-5 fw-semibold text-white tracking-tight mb-4" style="line-height: 1.15; letter-spacing: -0.025em;">
                    Repairs, activation<br>
                    <span class="font-serif-display text-steel" style="font-size: 1.05em;">and a look around</span>.
                </h2>
                <p class="text-secondary mb-4 pb-2" style="max-width: 480px; font-size: 1.0625rem; line-height: 1.6;">
                    We're on Halls Ferry Road with parking right out front. Walk in for a repair quote, pick up an online order, or browse the counter &mdash; bring your ID for anything 21+.
                </p>

                <div class="d-flex flex-column gap-3 mb-4">
                    <a href="https://www.google.com/maps/search/?api=1&query=Bugs+Wireless+%26+Smoke+Shop+10010+Halls+Ferry+Rd+St+Louis+MO+63136" 
                       target="_blank" 
                       rel="noreferrer" 
                       class="d-flex align-items-center gap-3 text-secondary text-decoration-none hover-white">
                        <i data-lucide="map-pin" class="w-5 h-5 text-steel flex-shrink-0"></i>
                        <span>10010 Halls Ferry Rd, St. Louis, MO 63136</span>
                    </a>

                    <a href="tel:+13144412851" class="d-flex align-items-center gap-3 text-secondary text-decoration-none hover-white">
                        <i data-lucide="phone" class="w-5 h-5 text-steel flex-shrink-0"></i>
                        <span>314-441-2851</span>
                    </a>

                    <div class="d-flex align-items-center gap-3 text-secondary">
                        <i data-lucide="clock" class="w-5 h-5 text-steel flex-shrink-0"></i>
                        <span>Mon – Sun · 10:00 AM – 8:00 PM</span>
                    </div>

                    <a href="https://www.instagram.com/bugs_wirless_and_smoke_shop/" 
                       target="_blank" 
                       rel="noreferrer" 
                       class="d-flex align-items-center gap-3 text-secondary text-decoration-none hover-white">
                        <i data-lucide="instagram" class="w-5 h-5 text-steel flex-shrink-0"></i>
                        <span>@bugs_wirless_and_smoke_shop</span>
                    </a>
                </div>

                <div class="d-flex flex-wrap align-items-center gap-3">
                    <a href="https://www.google.com/maps/search/?api=1&query=Bugs+Wireless+%26+Smoke+Shop+10010+Halls+Ferry+Rd+St+Louis+MO+63136" 
                       target="_blank" 
                       rel="noreferrer" 
                       class="btn btn-bugs-primary px-4 py-3 rounded-pill fw-semibold text-dark d-inline-flex align-items-center gap-2">
                        <i data-lucide="navigation" class="w-4 h-4"></i>
                        <span>Get directions</span>
                    </a>
                    <a href="tel:+13144412851" class="btn btn-bugs-outline px-4 py-3 rounded-pill text-white d-inline-flex align-items-center gap-2">
                        <i data-lucide="phone-call" class="w-4 h-4 text-steel"></i>
                        <span>Call the counter</span>
                    </a>
                </div>
            </div>

            <!-- Right: Storefront Photo -->
            <div class="col-lg-6">
                <div class="overflow-hidden rounded-4 border border-white border-opacity-10 shadow-lg" style="background-color: hsl(var(--surface-raised));">
                    <div class="ratio ratio-4x3">
                        <img src="{{ asset('assets/images/lifestyle/store-counter.png') }}" 
                             alt="Unlocked phones, cases and earbuds on display inside the shop" 
                             class="w-100 h-100 object-fit-cover"
                             loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
