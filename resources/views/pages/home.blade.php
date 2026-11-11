@extends('layouts.app')

@section('title', 'Bugs Wireless & Smoke Shop — Vapes, Glass & Phone Repair in St. Louis')

@section('content')
<!-- Section 1: Hero -->
<section class="position-relative overflow-hidden border-bottom py-5 py-lg-5" style="border-color: var(--bugs-border) !important;">
    <div class="glow-gold" style="top: 0; right: -120px; width: 480px; height: 480px;"></div>
    <div class="container-fluid px-3 px-lg-5 py-4 py-lg-5" style="max-width: 1400px;">
        <div class="row align-items-center g-4">
            <div class="col-lg-7 col-xl-8">
                <p class="eyebrow mb-3 d-inline-flex align-items-center gap-1" style="color: var(--bugs-primary)">
                    <i class="bi bi-geo-alt-fill"></i> Halls Ferry · St. Louis
                </p>
                <h1 class="bugs-hero-title text-white">
                    Your smoke shop<br>
                    <span class="font-serif-display">&amp; phone doctor</span><br>
                    on Halls Ferry.
                </h1>
                <p class="text-secondary fs-5 mt-4 leading-relaxed" style="max-width: 600px; font-size: 1.05rem !important;">
                    Disposables, nic salts, hand-blown glass and hookah on one side. Screen repair, batteries and carrier activation on the other. Same counter, same afternoon.
                </p>
                <div class="d-flex flex-wrap align-items-center gap-3 mt-4 pt-2">
                    <a href="{{ route('shop.index') }}" class="btn btn-bugs-primary gap-2">
                        Shop the shelves <i class="bi bi-arrow-right"></i>
                    </a>
                    <a href="{{ route('repairs') }}" class="btn btn-bugs-outline gap-2">
                        Fix my phone
                    </a>
                </div>
            </div>

            <!-- Hero Stats Box -->
            <div class="col-lg-5 col-xl-4">
                <div class="p-4 rounded-4 border" style="background-color: var(--bugs-card); border-color: var(--bugs-border) !important;">
                    <div class="row g-3 text-center border-bottom pb-4 mb-3" style="border-color: var(--bugs-border) !important;">
                        <div class="col-4">
                            <span class="num text-primary fs-3 fw-bold d-block">30m</span>
                            <span class="text-secondary small" style="font-size: 0.75rem;">Screen repairs</span>
                        </div>
                        <div class="col-4 border-start border-end" style="border-color: var(--bugs-border) !important;">
                            <span class="num text-primary fs-3 fw-bold d-block">21+</span>
                            <span class="text-secondary small" style="font-size: 0.75rem;">ID required</span>
                        </div>
                        <div class="col-4">
                            <span class="num text-primary fs-3 fw-bold d-block">7d</span>
                            <span class="text-secondary small" style="font-size: 0.75rem;">Open 10 – 8</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-start gap-3 pt-1">
                        <div class="d-flex align-items-center justify-content-center rounded-circle border flex-shrink-0" style="width: 40px; height: 40px; border-color: var(--bugs-border-light) !important; color: var(--bugs-primary);">
                            <i class="bi bi-tools fs-6"></i>
                        </div>
                        <div>
                            <p class="eyebrow text-secondary mb-1" style="font-size: 0.65rem;">Walk-in repair desk</p>
                            <p class="text-white small mb-0">Cracked screen? Bring it in — free quote, no appointment.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 2: Five Aisles, One Counter -->
<section class="py-5 py-lg-5">
    <div class="container-fluid px-3 px-lg-5 py-4" style="max-width: 1400px;">
        <div class="row align-items-end mb-4 pb-2">
            <div class="col-lg-6">
                <p class="eyebrow mb-2" style="color: var(--bugs-primary)">What's on the shelves</p>
                <h2 class="bugs-section-title text-white mb-2">
                    Five aisles, one <span class="font-serif-display">counter</span>.
                </h2>
                <p class="text-secondary small mb-0">
                    Everything in the store is stocked online too. Reserve for pickup or have it delivered across the neighbourhood.
                </p>
            </div>
            <div class="col-lg-6 text-lg-end mt-3 mt-lg-0">
                <a href="{{ route('shop.index') }}" class="btn btn-bugs-outline btn-bugs-pill-sm gap-2">
                    Browse All Aisles <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="row g-3 g-md-4">
            @foreach($categories as $index => $cat)
                <div class="col-6 col-md-4 col-lg">
                    <a href="{{ route('shop.index', ['category' => $cat->slug]) }}" class="bugs-service-card text-decoration-none h-100 d-flex flex-column p-3 p-md-4">
                        <div class="ratio ratio-1x1 rounded-3 overflow-hidden mb-3" style="background-color: #0d0d0f;">
                            <img src="{{ asset('assets/images/categories/' . $cat->image) }}" 
                                 alt="{{ $cat->name }}" 
                                 loading="lazy"
                                 class="w-100 h-100 object-fit-cover transition-transform duration-300">
                        </div>
                        <p class="num text-primary mb-1 small" style="font-size: 0.75rem;">0{{ $index + 1 }}</p>
                        <h3 class="fs-6 fw-semibold text-white mb-1">{{ $cat->name }}</h3>
                        <p class="text-secondary small mb-3 flex-grow-1" style="font-size: 0.75rem;">{{ $cat->description }}</p>
                        <span class="small text-primary d-inline-flex align-items-center gap-1 mt-auto">
                            Browse <i class="bi bi-arrow-right"></i>
                        </span>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Section 3: Featured Products ("What everybody grabs.") -->
<section class="py-5 py-lg-5 border-top" style="border-color: var(--bugs-border) !important;">
    <div class="container-fluid px-3 px-lg-5 py-4" style="max-width: 1400px;">
        <div class="d-flex flex-wrap justify-content-between align-items-end mb-4 pb-2">
            <div>
                <p class="eyebrow mb-2" style="color: var(--bugs-primary)">Moving fastest</p>
                <h2 class="bugs-section-title text-white mb-0">
                    What everybody <span class="font-serif-display">grabs</span>.
                </h2>
            </div>
            <a href="{{ route('shop.index') }}" class="text-secondary text-decoration-none small hover-white mt-2 mt-sm-0">
                Shop all products <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="row g-3 g-md-4">
            @foreach($featuredProducts as $prod)
                <div class="col-6 col-md-3">
                    <x-product-card :product="$prod" />
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Section 4: The Repair Bench Highlight -->
<section class="py-5 py-lg-5 border-top" style="background-color: var(--bugs-card-alt); border-color: var(--bugs-border) !important;">
    <div class="container-fluid px-3 px-lg-5 py-4" style="max-width: 1400px;">
        <div class="row g-5 align-items-center">
            <!-- Left: Workbench Realistic Photo Card -->
            <div class="col-lg-5">
                <div class="rounded-4 overflow-hidden border position-relative" style="background-color: var(--bugs-card); border-color: var(--bugs-border) !important;">
                    <div class="ratio ratio-4x3">
                        <img src="{{ asset('assets/images/lifestyle/repair-bench.jpg') }}" 
                             alt="Phone Repair Workbench at Bugs Wireless" 
                             loading="lazy"
                             class="w-100 h-100 object-fit-cover">
                    </div>
                    <div class="p-4">
                        <p class="eyebrow text-primary mb-1">Free diagnosis</p>
                        <h4 class="fs-5 text-white mb-2">Walk in, we'll quote it first.</h4>
                        <p class="text-secondary small mb-0">No appointment necessary. Bring your iPhone, Galaxy, Pixel or tablet right up to the glass.</p>
                    </div>
                </div>
            </div>

            <!-- Right: Repair Details & Capabilities -->
            <div class="col-lg-7">
                <p class="eyebrow mb-2" style="color: var(--bugs-primary)">The repair bench</p>
                <h2 class="bugs-hero-title text-white mb-3" style="font-size: clamp(2rem, 4vw, 3.2rem);">
                    Broken today,<br>
                    <span class="font-serif-display">fixed by tonight</span>.
                </h2>
                <p class="text-secondary leading-relaxed mb-4" style="max-width: 580px;">
                    Our technicians work on the counter in front of you. Most screen and battery jobs are finished the same day, and you'll always hear the price before we open a single screw.
                </p>

                <!-- 6 Mini Repair Capabilities -->
                <div class="row g-3 mb-4">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-3 p-2 rounded-3 border" style="border-color: var(--bugs-border) !important; background-color: var(--bugs-card);">
                            <i class="bi bi-phone text-primary fs-5 ms-1"></i>
                            <div>
                                <span class="d-block text-white small fw-medium">Screen &amp; glass replacement</span>
                                <span class="text-secondary" style="font-size: 0.7rem;">iPhone, Galaxy, Pixel</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-3 p-2 rounded-3 border" style="border-color: var(--bugs-border) !important; background-color: var(--bugs-card);">
                            <i class="bi bi-battery-charging text-primary fs-5 ms-1"></i>
                            <div>
                                <span class="d-block text-white small fw-medium">Battery replacement</span>
                                <span class="text-secondary" style="font-size: 0.7rem;">Holds a charge again</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-3 p-2 rounded-3 border" style="border-color: var(--bugs-border) !important; background-color: var(--bugs-card);">
                            <i class="bi bi-plugin text-primary fs-5 ms-1"></i>
                            <div>
                                <span class="d-block text-white small fw-medium">Charging port repair</span>
                                <span class="text-secondary" style="font-size: 0.7rem;">Loose cable, no charge</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-3 p-2 rounded-3 border" style="border-color: var(--bugs-border) !important; background-color: var(--bugs-card);">
                            <i class="bi bi-droplet text-primary fs-5 ms-1"></i>
                            <div>
                                <span class="d-block text-white small fw-medium">Liquid damage service</span>
                                <span class="text-secondary" style="font-size: 0.7rem;">Cleaned and assessed</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-3 p-2 rounded-3 border" style="border-color: var(--bugs-border) !important; background-color: var(--bugs-card);">
                            <i class="bi bi-arrow-repeat text-primary fs-5 ms-1"></i>
                            <div>
                                <span class="d-block text-white small fw-medium">Data transfer &amp; backup</span>
                                <span class="text-secondary" style="font-size: 0.7rem;">Move to your new phone</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-3 p-2 rounded-3 border" style="border-color: var(--bugs-border) !important; background-color: var(--bugs-card);">
                            <i class="bi bi-broadcast-pin text-primary fs-5 ms-1"></i>
                            <div>
                                <span class="d-block text-white small fw-medium">Carrier activation</span>
                                <span class="text-secondary" style="font-size: 0.7rem;">Prepaid &amp; postpaid</span>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="{{ route('repairs') }}" class="btn btn-bugs-primary px-4 py-3">
                    See repair services
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Section 5: Visit Us (`#visit`) -->
<section class="py-5 py-lg-5" id="visit">
    <div class="container-fluid px-3 px-lg-5 py-4" style="max-width: 1400px;">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6">
                <p class="eyebrow mb-2" style="color: var(--bugs-primary)">Come through</p>
                <h2 class="bugs-section-title text-white mb-3">
                    Ten minutes from <span class="font-serif-display">wherever you are</span>.
                </h2>
                <p class="text-secondary leading-relaxed mb-4" style="max-width: 540px;">
                    We're on Halls Ferry Road with parking right out front. Bring your ID — we card everyone, every time.
                </p>

                <div class="d-flex flex-column gap-3 mb-4">
                    <a href="https://www.google.com/maps/search/?api=1&query=Bugs+Wireless+%26+Smoke+Shop+10010+Halls+Ferry+Rd+St+Louis+MO+63136" target="_blank" rel="noreferrer" class="bugs-service-card p-3 text-decoration-none d-flex align-items-center gap-3">
                        <div class="d-flex align-items-center justify-content-center rounded-circle border flex-shrink-0" style="width: 44px; height: 44px; border-color: var(--bugs-border-light) !important; color: var(--bugs-primary);">
                            <i class="bi bi-geo-alt fs-5"></i>
                        </div>
                        <div>
                            <span class="eyebrow text-secondary d-block" style="font-size: 0.65rem;">Address</span>
                            <span class="text-white small fw-medium">10010 Halls Ferry Rd, St. Louis, MO 63136</span>
                        </div>
                    </a>

                    <a href="tel:+13144412851" class="bugs-service-card p-3 text-decoration-none d-flex align-items-center gap-3">
                        <div class="d-flex align-items-center justify-content-center rounded-circle border flex-shrink-0" style="width: 44px; height: 44px; border-color: var(--bugs-border-light) !important; color: var(--bugs-primary);">
                            <i class="bi bi-telephone fs-5"></i>
                        </div>
                        <div>
                            <span class="eyebrow text-secondary d-block" style="font-size: 0.65rem;">Call the counter</span>
                            <span class="num text-white small fw-medium">314-441-2851</span>
                        </div>
                    </a>

                    <div class="bugs-service-card p-3 d-flex align-items-center gap-3">
                        <div class="d-flex align-items-center justify-content-center rounded-circle border flex-shrink-0" style="width: 44px; height: 44px; border-color: var(--bugs-border-light) !important; color: var(--bugs-primary);">
                            <i class="bi bi-clock fs-5"></i>
                        </div>
                        <div>
                            <span class="eyebrow text-secondary d-block" style="font-size: 0.65rem;">Hours</span>
                            <span class="text-white small fw-medium">Mon – Sun · 10:00 AM – 8:00 PM</span>
                        </div>
                    </div>
                </div>

                <a href="https://www.google.com/maps/search/?api=1&query=Bugs+Wireless+%26+Smoke+Shop+10010+Halls+Ferry+Rd+St+Louis+MO+63136" target="_blank" rel="noreferrer" class="btn btn-bugs-primary gap-2">
                    <i class="bi bi-map"></i> Get directions
                </a>
            </div>

            <!-- Right: Retail Store Counter Photo -->
            <div class="col-lg-6">
                <div class="rounded-4 overflow-hidden border ratio ratio-4x3" style="background-color: var(--bugs-card); border-color: var(--bugs-border) !important;">
                    <img src="{{ asset('assets/images/lifestyle/store-counter.jpg') }}" 
                         alt="Inside Bugs Wireless and Smoke Shop Store Counter" 
                         loading="lazy"
                         class="w-100 h-100 object-fit-cover">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
