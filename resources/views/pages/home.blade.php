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

<!-- Section 4: The Repair Bench Highlight — Exact Reference Clone -->
<section id="repairs" class="py-5 py-lg-5">
    <div class="container-fluid px-3 px-lg-5 py-4 py-lg-5" style="max-width: 1400px;">
        <div class="row align-items-center g-5">
            <!-- Left: Workbench Photo Card with Floating Diagnosis Badge -->
            <div class="col-lg-6 order-2 order-lg-1">
                <div class="overflow-hidden border position-relative" style="background-color: var(--bugs-card); border-color: rgba(255, 255, 255, 0.08) !important; border-radius: 28px;">
                    <div class="ratio ratio-4x3" style="min-height: 360px;">
                        <img src="{{ asset('assets/images/lifestyle/repair-bench.png') }}" 
                             alt="Phone Repair Workbench at Bugs Wireless" 
                             loading="lazy"
                             class="w-100 h-100 object-fit-cover">
                    </div>
                    <!-- Overlaid Floating Diagnosis Card on Bottom-Left -->
                    <div class="position-absolute bottom-0 start-0 m-3 m-sm-4 p-3 rounded-3 border" style="background: rgba(10, 10, 11, 0.85); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); border-color: rgba(255, 255, 255, 0.1) !important; z-index: 2;">
                        <p class="eyebrow mb-1" style="color: var(--bugs-primary) !important; font-size: 0.7rem;">Free diagnosis</p>
                        <p class="text-white small mb-0" style="font-size: 0.875rem;">Walk in, we'll quote it first.</p>
                    </div>
                </div>
            </div>

            <!-- Right: Repair Details & Capabilities -->
            <div class="col-lg-6 order-1 order-lg-2">
                <p class="eyebrow mb-2" style="color: var(--bugs-primary) !important;">The repair bench</p>
                <h2 class="text-white fw-semibold mb-3" style="font-size: clamp(2rem, 4vw, 3.2rem); letter-spacing: -0.02em;">
                    Broken today,<br>
                    <span class="font-serif-display fw-normal" style="color: var(--bugs-primary) !important;">fixed by tonight</span>.
                </h2>
                <p class="text-secondary leading-relaxed mb-4 pb-2" style="max-width: 520px; font-size: 1rem;">
                    Our technicians work on the counter in front of you. Most screen and battery jobs are finished the same day, and you'll always hear the price before we open a single screw.
                </p>

                <!-- 6 Capabilities Matching Reference SVG Icons & Typography -->
                <div class="row g-4 mb-4 pb-2">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-start gap-3">
                            <span class="d-flex align-items-center justify-content-center rounded-circle flex-shrink-0" style="width: 36px; height: 36px; border: 1px solid rgba(255, 255, 255, 0.1); color: var(--bugs-primary);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect width="14" height="20" x="5" y="2" rx="2" ry="2"></rect>
                                    <path d="M12 18h.01"></path>
                                </svg>
                            </span>
                            <div>
                                <span class="d-block text-white" style="font-size: 14px; font-weight: 500; line-height: 1.35;">Screen &amp; glass replacement</span>
                                <span class="d-block text-secondary" style="font-size: 12px; line-height: 1.35;">iPhone, Galaxy, Pixel</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="d-flex align-items-start gap-3">
                            <span class="d-flex align-items-center justify-content-center rounded-circle flex-shrink-0" style="width: 36px; height: 36px; border: 1px solid rgba(255, 255, 255, 0.1); color: var(--bugs-primary);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M15 7h1a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2h-2"></path>
                                    <path d="M6 7H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h1"></path>
                                    <path d="m11 7-3 5h4l-3 5"></path>
                                    <line x1="22" x2="22" y1="11" y2="13"></line>
                                </svg>
                            </span>
                            <div>
                                <span class="d-block text-white" style="font-size: 14px; font-weight: 500; line-height: 1.35;">Battery replacement</span>
                                <span class="d-block text-secondary" style="font-size: 12px; line-height: 1.35;">Holds a charge again</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="d-flex align-items-start gap-3">
                            <span class="d-flex align-items-center justify-content-center rounded-circle flex-shrink-0" style="width: 36px; height: 36px; border: 1px solid rgba(255, 255, 255, 0.1); color: var(--bugs-primary);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 22v-5"></path>
                                    <path d="M9 8V2"></path>
                                    <path d="M15 8V2"></path>
                                    <path d="M18 8v5a4 4 0 0 1-4 4h-4a4 4 0 0 1-4-4V8Z"></path>
                                </svg>
                            </span>
                            <div>
                                <span class="d-block text-white" style="font-size: 14px; font-weight: 500; line-height: 1.35;">Charging port repair</span>
                                <span class="d-block text-secondary" style="font-size: 12px; line-height: 1.35;">Loose cable, no charge</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="d-flex align-items-start gap-3">
                            <span class="d-flex align-items-center justify-content-center rounded-circle flex-shrink-0" style="width: 36px; height: 36px; border: 1px solid rgba(255, 255, 255, 0.1); color: var(--bugs-primary);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M7 16.3c2.2 0 4-1.83 4-4.05 0-1.16-.57-2.26-1.71-3.19S7.29 6.75 7 5.3c-.29 1.45-1.14 2.84-2.29 3.76S3 11.1 3 12.25c0 2.22 1.8 4.05 4 4.05z"></path>
                                    <path d="M12.56 6.6A10.97 10.97 0 0 0 14 3.02c.5 2.5 2 4.9 4 6.5s3 3.5 3 5.5a6.98 6.98 0 0 1-11.91 4.97"></path>
                                </svg>
                            </span>
                            <div>
                                <span class="d-block text-white" style="font-size: 14px; font-weight: 500; line-height: 1.35;">Liquid damage service</span>
                                <span class="d-block text-secondary" style="font-size: 12px; line-height: 1.35;">Cleaned and assessed</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="d-flex align-items-start gap-3">
                            <span class="d-flex align-items-center justify-content-center rounded-circle flex-shrink-0" style="width: 36px; height: 36px; border: 1px solid rgba(255, 255, 255, 0.1); color: var(--bugs-primary);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="22" x2="2" y1="12" y2="12"></line>
                                    <path d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path>
                                    <line x1="6" x2="6.01" y1="16" y2="16"></line>
                                    <line x1="10" x2="10.01" y1="16" y2="16"></line>
                                </svg>
                            </span>
                            <div>
                                <span class="d-block text-white" style="font-size: 14px; font-weight: 500; line-height: 1.35;">Data transfer &amp; backup</span>
                                <span class="d-block text-secondary" style="font-size: 12px; line-height: 1.35;">Move to your new phone</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="d-flex align-items-start gap-3">
                            <span class="d-flex align-items-center justify-content-center rounded-circle flex-shrink-0" style="width: 36px; height: 36px; border: 1px solid rgba(255, 255, 255, 0.1); color: var(--bugs-primary);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 20h.01"></path>
                                    <path d="M2 8.82a15 15 0 0 1 20 0"></path>
                                    <path d="M5 12.859a10 10 0 0 1 14 0"></path>
                                    <path d="M8.5 16.429a5 5 0 0 1 7 0"></path>
                                </svg>
                            </span>
                            <div>
                                <span class="d-block text-white" style="font-size: 14px; font-weight: 500; line-height: 1.35;">Carrier activation</span>
                                <span class="d-block text-secondary" style="font-size: 12px; line-height: 1.35;">Prepaid &amp; postpaid</span>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="{{ route('repairs') }}" class="btn btn-bugs-outline px-4 py-3" style="border-radius: 9999px; font-size: 0.875rem;">
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
