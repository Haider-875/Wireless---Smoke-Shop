@extends('layouts.app')

@section('title', 'Bugs Wireless & Smoke Shop — Vapes, Glass & Phone Repair in St. Louis')

@section('content')
<!-- Section 1: Hero -->
<section class="position-relative overflow-hidden border-bottom py-5 py-lg-5" style="border-color: var(--bugs-border) !important;">
    <div class="glow-gold" style="top: 0; right: -120px; width: 480px; height: 480px;"></div>
    <div class="container-fluid px-3 px-lg-5 py-4 py-lg-5" style="max-width: 1400px;">
        <div class="row align-items-center g-5 py-lg-3">
            <div class="col-lg-6 col-xl-6">
                <p class="eyebrow mb-3 d-inline-flex align-items-center gap-2" style="color: var(--bugs-primary)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    Halls Ferry · St. Louis
                </p>
                <h1 class="bugs-hero-title text-white">
                    Your smoke shop<br>
                    <span class="font-serif-display">&amp; phone doctor</span><br>
                    on Halls Ferry.
                </h1>
                <p class="text-secondary fs-5 mt-4 leading-relaxed" style="max-width: 540px; font-size: 1.05rem !important;">
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

                <!-- Reference Exact Stats Row -->
                <div class="row g-4 mt-4 pt-4 border-top" style="border-color: var(--bugs-border) !important; max-width: 480px;">
                    <div class="col-4">
                        <div class="num text-white fs-4 fw-bold">30 min</div>
                        <div class="text-secondary small mt-1" style="font-size: 0.75rem;">Most screen repairs</div>
                    </div>
                    <div class="col-4">
                        <div class="num text-white fs-4 fw-bold">21+</div>
                        <div class="text-secondary small mt-1" style="font-size: 0.75rem;">ID checked in store</div>
                    </div>
                    <div class="col-4">
                        <div class="num text-white fs-4 fw-bold">7 days</div>
                        <div class="text-secondary small mt-1" style="font-size: 0.75rem;">Open 10 – 8 daily</div>
                    </div>
                </div>
            </div>

            <!-- Reference Exact Hero Image with Floating Desk Card -->
            <div class="col-lg-6 col-xl-6 position-relative mt-5 mt-lg-0 pb-4 pb-sm-0">
                <div class="overflow-hidden border position-relative" style="background-color: var(--bugs-card); border-color: rgba(255, 255, 255, 0.08) !important; border-radius: 28px;">
                    <div class="ratio ratio-4x3" style="min-height: 380px;">
                        <img src="{{ asset('assets/images/lifestyle/hero-display.png') }}" 
                             alt="Bugs Wireless and Smoke Shop Store Counter" 
                             class="w-100 h-100 object-fit-cover">
                    </div>
                    <div class="position-absolute w-100 h-100 top-0 start-0 pointer-events-none" style="background: linear-gradient(to top, rgba(10, 10, 11, 0.75) 0%, transparent 60%);"></div>
                </div>

                <!-- Overlaid Floating Repair Desk Card -->
                <div class="position-absolute p-3 rounded-4 border" style="bottom: -15px; left: 24px; right: 24px; background: rgba(10, 10, 11, 0.88); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); border-color: rgba(255, 255, 255, 0.12) !important; z-index: 2;">
                    <div class="d-flex align-items-center justify-content-between gap-3">
                        <div>
                            <p class="eyebrow text-primary mb-1" style="font-size: 0.7rem;">Walk-in repair desk</p>
                            <p class="text-white small mb-0" style="font-size: 0.85rem;">Cracked screen? Bring it in — free quote, no appointment.</p>
                        </div>
                        <a href="tel:+13144412851" aria-label="Call the shop" class="d-flex align-items-center justify-content-center rounded-circle flex-shrink-0" style="width: 44px; height: 44px; background-color: var(--bugs-primary); color: var(--bugs-primary-fg); transition: transform 0.2s ease;">
                            <i class="bi bi-arrow-up-right fs-5"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Reference Marquee Strip -->
<div class="overflow-hidden border-bottom py-3" style="background-color: #0c0c0e; border-color: var(--bugs-border) !important;">
    <div class="d-flex w-100 overflow-x-hidden" style="white-space: nowrap;">
        <div class="d-flex align-items-center gap-4 text-secondary small eyebrow" style="font-size: 0.72rem; letter-spacing: 0.1em; animation: marquee 35s linear infinite;">
            <span>Same-day screen repair</span> &bull;
            <span>21+ age verified</span> &bull;
            <span>Walk-ins welcome</span> &bull;
            <span>Free local delivery over $50</span> &bull;
            <span>Clean glass guaranteed</span> &bull;
            <span>Direct carrier unlocking</span> &bull;
            <span>Same-day screen repair</span> &bull;
            <span>21+ age verified</span> &bull;
            <span>Walk-ins welcome</span> &bull;
            <span>Free local delivery over $50</span> &bull;
            <span>Clean glass guaranteed</span> &bull;
            <span>Direct carrier unlocking</span>
        </div>
    </div>
</div>

<!-- Section 2: Five Aisles, One Counter — Exact Reference Clone (No Blue Font) -->
<section id="shelves" class="py-5 py-lg-5">
    <div class="container-fluid px-3 px-lg-5 py-4 py-lg-5" style="max-width: 1400px;">
        <div class="row align-items-end justify-content-between g-4 mb-4 mb-lg-5">
            <div class="col-lg-7">
                <p class="eyebrow mb-2" style="color: var(--bugs-primary) !important;">What's on the shelves</p>
                <h2 class="text-white fw-semibold mb-0" style="font-size: clamp(2rem, 4vw, 3.2rem); letter-spacing: -0.02em;">
                    Five aisles, one<span class="font-serif-display fw-normal" style="color: var(--bugs-primary) !important;"> counter</span>.
                </h2>
            </div>
            <div class="col-lg-5 col-xl-4">
                <p class="text-secondary small mb-0" style="font-size: 0.875rem; line-height: 1.6;">
                    Everything in the store is stocked online too. Reserve for pickup or have it delivered across the neighbourhood.
                </p>
            </div>
        </div>

        <div class="row g-3 row-cols-1 row-cols-sm-2 row-cols-lg-5">
            @php
                $aisles = [
                    ['slug' => 'vapes', 'name' => 'Vapes', 'desc' => 'Disposables, pods and rechargeables'],
                    ['slug' => 'e-liquids', 'name' => 'E-Liquids', 'desc' => 'Nic salts and freebase, 0–50mg'],
                    ['slug' => 'glass-pipes', 'name' => 'Glass & Pipes', 'desc' => 'Beakers, spoons and hand-blown pieces'],
                    ['slug' => 'hookah', 'name' => 'Hookah', 'desc' => 'Stems, hoses, bowls and shisha'],
                    ['slug' => 'phone-accessories', 'name' => 'Phone Accessories', 'desc' => 'Cases, glass, audio and power'],
                ];
            @endphp
            @foreach($aisles as $index => $aisle)
                <div class="col">
                    <a href="{{ route('shop.index', ['category' => $aisle['slug']]) }}" class="bugs-aisle-card h-100">
                        <div class="glow-gold"></div>
                        <span class="bugs-aisle-num">0{{ $index + 1 }}</span>
                        <div class="position-relative" style="z-index: 2;">
                            <h3 class="bugs-aisle-title">{{ $aisle['name'] }}</h3>
                            <p class="bugs-aisle-desc">{{ $aisle['desc'] }}</p>
                            <span class="bugs-aisle-browse">
                                Browse 
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M7 7h10v10"></path>
                                    <path d="M7 17 17 7"></path>
                                </svg>
                            </span>
                        </div>
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
                        <img src="{{ asset('assets/images/lifestyle/repair-bench.png') }}" 
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
                    <img src="{{ asset('assets/images/lifestyle/store-counter.png') }}" 
                         alt="Inside Bugs Wireless and Smoke Shop Store Counter" 
                         loading="lazy"
                         class="w-100 h-100 object-fit-cover">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
