@extends('layouts.app')

@section('title', 'BUGS Wireless & Smoke Shop — Vapes, Glass & Phone Repair in St. Louis, MO')
@section('meta_description', 'Bugs Wireless & Smoke Shop on Halls Ferry Rd, St. Louis. Phone repair, screen replacement, vapes, glass, hookah, and phone accessories. Walk-ins welcome.')

@section('content')
<!-- ==========================================================================
     Section 1: Cinematic Hero Section (Apple-Style Entrance & Ambient Depth)
     ========================================================================== -->
<section class="position-relative overflow-hidden py-4 py-lg-5" style="background-color: var(--bugs-bg); min-height: 88vh; display: flex; align-items: center;">
    <!-- Three.js Ambient Particle & Depth Canvas -->
    <canvas id="heroThreeCanvas" style="position: absolute; inset: 0; width: 100%; height: 100%; pointer-events: none; z-index: 0; opacity: 0.65;"></canvas>

    <div class="glow-gold" style="top: -60px; right: -80px; width: 480px; height: 480px; z-index: 1;"></div>
    <div class="container-fluid px-3 px-lg-5 py-3 py-lg-4 position-relative" style="max-width: 1400px; z-index: 2;">
        <div class="row align-items-center g-5">
            <!-- Left: Hero Messaging & CTAs -->
            <div class="col-lg-6 hero-content-col">
                <p class="eyebrow mb-3 d-inline-flex align-items-center gap-2" style="color: var(--bugs-primary);">
                    <i class="ph ph-map-pin fs-6"></i>
                    Halls Ferry &bull; St. Louis, MO
                </p>

                <!-- Hero Heading with dark theme gradient: #FFFFFF -> #9B9B9B (B5) -->
                <h1 class="bugs-hero-title mb-3">
                    <span class="hero-gradient-text">Your smoke shop.<br>Your phone doctor.</span>
                </h1>

                <!-- Subheadline capped at 680px (B5) -->
                <p class="hero-subhead body-2 mb-4">
                    Everything you need, from premium accessories to expert phone repairs, all in one place on Halls Ferry Road. Same counter, same afternoon.
                </p>

                <!-- Clear CTAs -->
                <div class="d-flex flex-wrap align-items-center gap-3 mb-4 pb-2">
                    <a href="{{ route('shop.index') }}" class="btn btn-bugs-primary">
                        <span>Shop the shelves</span>
                        <i class="ph ph-arrow-right fs-5"></i>
                    </a>
                    <a href="{{ route('repairs') }}" class="btn btn-bugs-outline">
                        <i class="ph ph-wrench fs-5"></i>
                        <span>Fix my phone</span>
                    </a>
                </div>

                <!-- Proof Signals Strip -->
                <div class="row g-3 pt-3 border-top" style="border-color: var(--bugs-border) !important; max-width: 520px;">
                    <div class="col-4">
                        <div class="num text-white title-1 fw-bold">30 min</div>
                        <div class="caption-4 text-secondary mt-1">Most screen repairs</div>
                    </div>
                    <div class="col-4">
                        <div class="num text-white title-1 fw-bold">21+</div>
                        <div class="caption-4 text-secondary mt-1">ID checked in store</div>
                    </div>
                    <div class="col-4">
                        <div class="num text-white title-1 fw-bold">7 days</div>
                        <div class="caption-4 text-secondary mt-1">Open 10 &ndash; 8 daily</div>
                    </div>
                </div>
            </div>

            <!-- Right: Hero Visual with Animated Mask & Overlaid Floating Desk Card -->
            <div class="col-lg-6 position-relative mt-5 mt-lg-0 pb-4 pb-sm-0">
                <div class="bugs-card-outer-24 overflow-hidden position-relative p-2" style="background-color: var(--bugs-surface-2);">
                    <div class="ratio ratio-4x3 mask-reveal-wrap" style="min-height: 380px; border-radius: 16px; overflow: hidden;">
                        <img src="{{ asset('assets/images/lifestyle/hero-display.png') }}" 
                             alt="Bugs Wireless and Smoke Shop Store Counter" 
                             class="w-100 h-100 object-fit-cover hero-visual-img mask-reveal-img"
                             loading="eager">
                    </div>
                </div>

                <!-- Overlaid Floating Repair Desk Card with Parallax Depth -->
                <div class="bugs-hero-floating-card position-absolute p-3 p-sm-4 border" data-parallax="0.12">
                    <div class="d-flex align-items-center justify-content-between gap-3">
                        <div>
                            <p class="eyebrow mb-1" style="color: var(--bugs-primary) !important; font-size: 11px;">Walk-in repair desk</p>
                            <p class="body-4 text-white mb-0">Cracked screen? Bring it in &mdash; free quote, no appointment.</p>
                        </div>
                        <a href="tel:+13144412851" aria-label="Call 314-441-2851" class="bugs-hero-call-btn flex-shrink-0" title="Call the counter">
                            <i class="ph ph-phone-call fs-5"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     Marquee Strip
     ========================================================================== -->
<div class="bugs-marquee-wrapper" aria-label="Store highlights ticker">
    <div class="bugs-marquee-track">
        <div class="bugs-marquee-content">
            <span>Same-day screen repair</span>
            <span class="bugs-marquee-dot"></span>
            <span>21+ age verified</span>
            <span class="bugs-marquee-dot"></span>
            <span>Walk-ins welcome</span>
            <span class="bugs-marquee-dot"></span>
            <span>Free local delivery over $50</span>
            <span class="bugs-marquee-dot"></span>
            <span>Clean glass guaranteed</span>
            <span class="bugs-marquee-dot"></span>
            <span>Direct carrier unlocking</span>
            <span class="bugs-marquee-dot"></span>
        </div>
        <div class="bugs-marquee-content" aria-hidden="true">
            <span>Same-day screen repair</span>
            <span class="bugs-marquee-dot"></span>
            <span>21+ age verified</span>
            <span class="bugs-marquee-dot"></span>
            <span>Walk-ins welcome</span>
            <span class="bugs-marquee-dot"></span>
            <span>Free local delivery over $50</span>
            <span class="bugs-marquee-dot"></span>
            <span>Clean glass guaranteed</span>
            <span class="bugs-marquee-dot"></span>
            <span>Direct carrier unlocking</span>
            <span class="bugs-marquee-dot"></span>
        </div>
    </div>
</div>

<!-- ==========================================================================
     Section 2: Brand Experience Section (Editorial Asymmetric Layout)
     ========================================================================== -->
<section class="py-5 gsap-reveal-section" style="background-color: var(--bugs-surface-1);">
    <div class="container-fluid px-3 px-lg-5 py-4" style="max-width: 1400px;">
        <div class="row align-items-center g-4 g-lg-5">
            <div class="col-lg-5">
                <span class="eyebrow" style="color: var(--bugs-primary);">The BUGS Standard</span>
                <h2 class="heading-2 text-white mt-2 mb-3">Two worlds, one counter.</h2>
                <p class="body-2 text-secondary mb-4">
                    BUGS was built on a simple premise: why drive across town for premium vape and smoking essentials, then visit a detached mall kiosk for phone diagnostics?
                </p>
                <p class="body-3 text-secondary mb-4">
                    On one side, you find curated vapor devices, premium freebase and nic salts, hand-blown borosilicate glass, and authentic hookah setups. On the other side, an open workbench staffed by certified repair technicians who test, quote, and fix your device right before your eyes.
                </p>

                <div class="d-flex flex-column gap-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="d-flex align-items-center justify-content-center rounded-circle border" style="width: 36px; height: 36px; border-color: var(--bugs-border); background-color: var(--bugs-surface-3); color: var(--bugs-primary);">
                            <i class="ph ph-check-circle fs-5"></i>
                        </div>
                        <span class="body-2 text-white">100% genuine hardware and authentic liquids</span>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <div class="d-flex align-items-center justify-content-center rounded-circle border" style="width: 36px; height: 36px; border-color: var(--bugs-border); background-color: var(--bugs-surface-3); color: var(--bugs-primary);">
                            <i class="ph ph-check-circle fs-5"></i>
                        </div>
                        <span class="body-2 text-white">Upfront quotes before opening a single screw</span>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <div class="d-flex align-items-center justify-content-center rounded-circle border" style="width: 36px; height: 36px; border-color: var(--bugs-border); background-color: var(--bugs-surface-3); color: var(--bugs-primary);">
                            <i class="ph ph-check-circle fs-5"></i>
                        </div>
                        <span class="body-2 text-white">Strict 21+ compliance for complete peace of mind</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="row g-3">
                    <div class="col-sm-6" data-parallax="0.08">
                        <div class="bugs-card-outer-16 p-2 h-100">
                            <div class="ratio ratio-4x3 rounded-3 overflow-hidden mb-3 mask-reveal-wrap">
                                <img src="{{ asset('assets/images/lifestyle/store-counter.png') }}" 
                                     alt="Inside BUGS Wireless & Smoke Shop Counter" 
                                     loading="lazy" 
                                     class="w-100 h-100 object-fit-cover mask-reveal-img">
                            </div>
                            <div class="px-2 pb-2">
                                <span class="eyebrow" style="color: var(--bugs-primary);">Storefront</span>
                                <h3 class="title-3 text-white mt-1 mb-1">10010 Halls Ferry Rd</h3>
                                <p class="caption-4 text-secondary mb-0">Easy access with dedicated storefront parking.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6" data-parallax="-0.08">
                        <div class="bugs-card-outer-16 p-2 h-100">
                            <div class="ratio ratio-4x3 rounded-3 overflow-hidden mb-3 mask-reveal-wrap">
                                <img src="{{ asset('assets/images/lifestyle/repair-bench.png') }}" 
                                     alt="Certified phone repair bench at BUGS" 
                                     loading="lazy" 
                                     class="w-100 h-100 object-fit-cover mask-reveal-img">
                            </div>
                            <div class="px-2 pb-2">
                                <span class="eyebrow" style="color: var(--bugs-primary);">Workbench</span>
                                <h3 class="title-3 text-white mt-1 mb-1">Open Diagnostic Counter</h3>
                                <p class="caption-4 text-secondary mb-0">Repairs completed in front of you with full transparency.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     Section 3: Cinematic Product Storytelling Showcase
     Interactive Chapter Navigation & Smooth Morphing Showcase
     ========================================================================== -->
<section id="cinematicStorytelling" class="bugs-pinned-storytelling position-relative">
    <div class="container-fluid px-3 px-lg-5" style="max-width: 1400px;">
        <!-- Interactive Chapter Navigation Bar -->
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4 pb-2 border-bottom" style="border-color: var(--bugs-border) !important;">
            <div class="bugs-chapter-nav" role="tablist" aria-label="Story chapters">
                <button type="button" class="bugs-chapter-btn active" data-chapter="0" role="tab" aria-selected="true">
                    <span class="num me-2 text-gold">01</span> Smoke Craft
                </button>
                <button type="button" class="bugs-chapter-btn" data-chapter="1" role="tab" aria-selected="false">
                    <span class="num me-2 text-gold">02</span> Vapor Engineering
                </button>
                <button type="button" class="bugs-chapter-btn" data-chapter="2" role="tab" aria-selected="false">
                    <span class="num me-2 text-gold">03</span> Phone Doctor
                </button>
            </div>
            <div class="caption-4 text-secondary d-none d-md-block">
                <i class="ph ph-sliders-horizontal me-1 text-warning"></i> Click or scroll to explore our three counter specialties
            </div>
        </div>

        <div class="story-pin-container row align-items-center g-5">
            <!-- Left: Dynamic Interactive Story Copy (Crossfades on Scroll/Click) -->
            <div class="col-lg-6">
                <div class="story-steps-container position-relative">
                    <!-- Step 1: Smoke Shop & Pure Glass -->
                    <div class="story-step active" data-story-step="0">
                        <span class="eyebrow mb-2 d-inline-block" style="color: var(--bugs-primary);">Chapter 01 &bull; Smoke Craft</span>
                        <h2 class="heading-1 text-white mb-3">Pure borosilicate glass &amp; smoking craft.</h2>
                        <p class="body-2 text-secondary mb-4">
                            Hand-selected beakers, heady glass, quartz bangers, and thick-wall rigs built to withstand everyday sessions. Thermal shock resistant, crystal clear, and inspected piece by piece.
                        </p>
                        <div class="d-flex flex-wrap align-items-center gap-3">
                            <a href="{{ route('shop.index', ['category' => 'glass-pipes']) }}" class="btn btn-bugs-primary btn-bugs-pill-sm">
                                <span>Browse glass collection</span>
                                <i class="ph ph-arrow-right fs-6"></i>
                            </a>
                            <span class="caption-4 text-secondary border-start ps-3" style="border-color: var(--bugs-border) !important;">
                                Lab-grade borosilicate &bull; 21+ only
                            </span>
                        </div>
                    </div>

                    <!-- Step 2: Vapor Engineering -->
                    <div class="story-step" data-story-step="1">
                        <span class="eyebrow mb-2 d-inline-block" style="color: var(--bugs-primary);">Chapter 02 &bull; Vapor Engineering</span>
                        <h2 class="heading-1 text-white mb-3">Curated disposables, mods &amp; premium salts.</h2>
                        <p class="body-2 text-secondary mb-4">
                            From high-capacity smart disposables with HD battery displays to refillable pod mods and clean nicotine salts. Fresh stock rotated weekly directly from verified distributors.
                        </p>
                        <div class="d-flex flex-wrap align-items-center gap-3">
                            <a href="{{ route('shop.index', ['category' => 'vapes']) }}" class="btn btn-bugs-primary btn-bugs-pill-sm">
                                <span>Explore vapor collection</span>
                                <i class="ph ph-arrow-right fs-6"></i>
                            </a>
                            <span class="caption-4 text-secondary border-start ps-3" style="border-color: var(--bugs-border) !important;">
                                0mg to 50mg nic salts &bull; Leak-tested
                            </span>
                        </div>
                    </div>

                    <!-- Step 3: Phone Doctor Bench -->
                    <div class="story-step" data-story-step="2">
                        <span class="eyebrow mb-2 d-inline-block" style="color: var(--bugs-primary);">Chapter 03 &bull; Phone Doctor</span>
                        <h2 class="heading-1 text-white mb-3">Precision micro-soldering &amp; same-day restoration.</h2>
                        <p class="body-2 text-secondary mb-4">
                            Shattered OLED? Degraded battery? Charging port failing to make contact? Our master bench technician fixes your phone right on the front counter in 30 to 45 minutes with zero surprise fees.
                        </p>
                        <div class="d-flex flex-wrap align-items-center gap-3">
                            <a href="{{ route('repairs') }}" class="btn btn-bugs-primary btn-bugs-pill-sm">
                                <span>Get free diagnosis</span>
                                <i class="ph ph-wrench fs-6"></i>
                            </a>
                            <span class="caption-4 text-secondary border-start ps-3" style="border-color: var(--bugs-border) !important;">
                                30-minute average turn-around
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Layered Visual Stage with 3D Rotation & Smooth Morph -->
            <div class="col-lg-6">
                <div class="story-visual-stage position-relative">
                    <!-- Layer 1: Glassware -->
                    <div class="story-visual-layer active" data-visual-layer="0">
                        <img src="{{ asset('assets/images/products/glass-ember-beaker.png') }}" 
                             alt="Ember Heavy Wall Beaker Bong" 
                             class="w-100 h-100 object-fit-contain p-4">
                        <div class="position-absolute bottom-0 start-0 m-3 px-3 py-1.5 rounded-pill border" style="background: rgba(19, 18, 9, 0.9); backdrop-filter: blur(12px); border-color: var(--bugs-border-gold) !important;">
                            <span class="caption-4 text-white"><i class="ph ph-sparkle text-warning me-1"></i> Borosilicate Beaker 9mm</span>
                        </div>
                    </div>

                    <!-- Layer 2: Vapor Hardware -->
                    <div class="story-visual-layer" data-visual-layer="1">
                        <img src="{{ asset('assets/images/products/vape-midnight-ice.png') }}" 
                             alt="Midnight Ice Vapor Device" 
                             class="w-100 h-100 object-fit-contain p-4">
                        <div class="position-absolute bottom-0 start-0 m-3 px-3 py-1.5 rounded-pill border" style="background: rgba(19, 18, 9, 0.9); backdrop-filter: blur(12px); border-color: var(--bugs-border-gold) !important;">
                            <span class="caption-4 text-white"><i class="ph ph-wind text-info me-1"></i> Dual-Mesh 15K Rechargeable</span>
                        </div>
                    </div>

                    <!-- Layer 3: Tech Workbench -->
                    <div class="story-visual-layer" data-visual-layer="2">
                        <img src="{{ asset('assets/images/lifestyle/repair-bench.png') }}" 
                             alt="BUGS Certified Tech Workbench" 
                             class="w-100 h-100 object-fit-cover">
                        <div class="position-absolute bottom-0 start-0 m-3 px-3 py-1.5 rounded-pill border" style="background: rgba(19, 18, 9, 0.9); backdrop-filter: blur(12px); border-color: var(--bugs-border-gold) !important;">
                            <span class="caption-4 text-white"><i class="ph ph-cpu text-success me-1"></i> Live Bench Diagnostic</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     Section 4: Shop Categories (The Five Aisles)
     Responsive Shelf Layout & Touch-Swipe on Mobile
     ========================================================================== -->
<section id="shelves" class="bugs-horizontal-section py-5">
    <div id="horizontalAislesSection"></div>
    <div class="container-fluid px-3 px-lg-5 mb-4" style="max-width: 1400px;">
        <div class="row align-items-end justify-content-between g-4">
            <div class="col-lg-7">
                <p class="eyebrow mb-2" style="color: var(--bugs-primary);">What's on the shelves</p>
                <h2 class="heading-2 text-white mb-0">
                    Five aisles, one <span style="color: var(--bugs-primary);">counter</span>.
                </h2>
            </div>
            <div class="col-lg-5 col-xl-4 text-lg-end">
                <p class="body-3 text-secondary mb-0">
                    Everything in the store is stocked online too. Reserve for pickup or have it delivered across St. Louis.
                </p>
            </div>
        </div>
    </div>

    <!-- Controlled Horizontal Scrolling Track -->
    <div class="container-fluid px-3 px-lg-5" style="max-width: 1400px; overflow: visible;">
        <div class="bugs-horizontal-track" id="horizontalTrack">
            @php
                $aisles = [
                    ['slug' => 'vapes', 'name' => 'Vapes', 'desc' => 'Disposables, pods and rechargeables', 'img' => 'cat-vapes.jpg', 'icon' => 'ph-wind', 'tag' => '15K+ Puffs'],
                    ['slug' => 'e-liquids', 'name' => 'E-Liquids', 'desc' => 'Nic salts and freebase, 0–50mg', 'img' => 'cat-eliquid.jpg', 'icon' => 'ph-drop', 'tag' => 'Premium Blends'],
                    ['slug' => 'glass-pipes', 'name' => 'Glass & Pipes', 'desc' => 'Beakers, spoons and hand-blown pieces', 'img' => 'cat-glass.jpg', 'icon' => 'ph-flame', 'tag' => 'Heavy Borosilicate'],
                    ['slug' => 'hookah', 'name' => 'Hookah', 'desc' => 'Stems, hoses, bowls and shisha', 'img' => 'cat-hookah.jpg', 'icon' => 'ph-sparkle', 'tag' => 'Authentic Shisha'],
                    ['slug' => 'phone-accessories', 'name' => 'Phone Accessories', 'desc' => 'Cases, glass, audio and power', 'img' => 'cat-accessories.jpg', 'icon' => 'ph-device-mobile', 'tag' => 'Tough Armor'],
                ];
            @endphp
            @foreach($aisles as $index => $aisle)
                <a href="{{ route('shop.index', ['category' => $aisle['slug']]) }}" class="bugs-horizontal-card">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="num text-secondary body-4 fw-bold">Aisle 0{{ $index + 1 }}</span>
                            <span class="caption-5 text-white px-2 py-0.5 rounded-pill border" style="border-color: var(--bugs-border); background-color: var(--bugs-surface-3);">
                                {{ $aisle['tag'] }}
                            </span>
                        </div>

                        <div class="ratio ratio-16x9 rounded-3 overflow-hidden mb-3" style="background-color: var(--bugs-surface-3);">
                            <img src="{{ asset('assets/images/categories/' . $aisle['img']) }}" 
                                 alt="{{ $aisle['name'] }}" 
                                 loading="lazy" 
                                 class="w-100 h-100 object-fit-cover">
                        </div>

                        <h3 class="title-2 text-white mb-2">{{ $aisle['name'] }}</h3>
                        <p class="body-4 text-secondary mb-0">{{ $aisle['desc'] }}</p>
                    </div>

                    <div class="d-flex align-items-center justify-content-between pt-3 mt-3 border-top" style="border-color: var(--bugs-border) !important;">
                        <span class="caption-3 fw-medium text-white">Browse aisle</span>
                        <div class="d-flex align-items-center justify-content-center rounded-circle border" style="width: 32px; height: 32px; border-color: var(--bugs-border); background-color: var(--bugs-surface-3); color: var(--bugs-primary);">
                            <i class="ph ph-arrow-up-right fs-6"></i>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

<!-- ==========================================================================
     Section 5: Featured Products ("What everybody grabs.")
     Dynamic products from Laravel database with 3D Tilt Hover and Staggered Entrance
     ========================================================================== -->
<section class="py-5 border-top gsap-reveal-section" style="background-color: var(--bugs-surface-1); border-color: var(--bugs-border) !important;">
    <div class="container-fluid px-3 px-lg-5 py-4" style="max-width: 1400px;">
        <div class="d-flex flex-wrap justify-content-between align-items-end mb-4 pb-2">
            <div>
                <p class="eyebrow mb-2" style="color: var(--bugs-primary);">Moving fastest</p>
                <h2 class="heading-2 text-white mb-0">
                    What everybody <span style="color: var(--bugs-primary);">grabs</span>.
                </h2>
            </div>
            <a href="{{ route('shop.index') }}" class="btn btn-bugs-outline btn-bugs-pill-sm mt-3 mt-sm-0">
                <span>Shop all products</span>
                <i class="ph ph-arrow-right fs-6"></i>
            </a>
        </div>

        <div class="row g-3 row-cols-2 row-cols-md-3 row-cols-xl-4 bugs-product-grid">
            @foreach($featuredProducts as $prod)
                <div class="col product-card-wrapper">
                    <x-product-card :product="$prod" />
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ==========================================================================
     Section 6: The Repair Bench Highlight
     ========================================================================== -->
<section id="repairs" class="py-5 gsap-reveal-section" style="background-color: var(--bugs-bg);">
    <div class="container-fluid px-3 px-lg-5 py-4" style="max-width: 1400px;">
        <div class="row align-items-center g-5">
            <!-- Left: Workbench Photo Card with Floating Diagnosis Badge -->
            <div class="col-lg-6 order-2 order-lg-1" data-parallax="0.08">
                <div class="bugs-card-outer-24 overflow-hidden position-relative p-2" style="background-color: var(--bugs-surface-2);">
                    <div class="ratio ratio-4x3 mask-reveal-wrap" style="min-height: 360px; border-radius: 16px; overflow: hidden;">
                        <img src="{{ asset('assets/images/lifestyle/repair-bench.png') }}" 
                             alt="Phone Repair Workbench at Bugs Wireless" 
                             loading="lazy"
                             class="w-100 h-100 object-fit-cover mask-reveal-img">
                    </div>
                    <!-- Overlaid Floating Diagnosis Card on Bottom-Left -->
                    <div class="position-absolute bottom-0 start-0 m-3 m-sm-4 p-3 border" style="background: rgba(24, 24, 24, 0.92); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); border-color: var(--bugs-border) !important; border-radius: 12px; z-index: 2;">
                        <p class="eyebrow mb-1" style="color: var(--bugs-primary) !important; font-size: 11px;">Free diagnosis</p>
                        <p class="body-4 text-white mb-0">Walk in, we'll quote it first.</p>
                    </div>
                </div>
            </div>

            <!-- Right: Repair Details & Capabilities -->
            <div class="col-lg-6 order-1 order-lg-2">
                <p class="eyebrow mb-2" style="color: var(--bugs-primary) !important;">The repair bench</p>
                <h2 class="heading-2 text-white mb-3">
                    Broken today,<br>
                    <span style="color: var(--bugs-primary);">fixed by tonight</span>.
                </h2>
                <p class="body-2 text-secondary mb-4 pb-2" style="max-width: 520px;">
                    Our technicians work on the counter in front of you. Most screen and battery jobs are finished the same day, and you will always hear the price before we open a single screw.
                </p>

                <!-- 6 Capabilities with Phosphor Icons -->
                <div class="row g-2 g-sm-3 mb-4 pb-2">
                    <div class="col-sm-6">
                        <a href="{{ route('repairs') }}#quote" class="bugs-repair-point">
                            <span class="bugs-repair-point-icon">
                                <i class="ph ph-device-mobile fs-5"></i>
                            </span>
                            <div>
                                <span class="bugs-repair-point-title d-block">Screen &amp; glass replacement</span>
                                <span class="bugs-repair-point-sub d-block">iPhone, Galaxy, Pixel</span>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6">
                        <a href="{{ route('repairs') }}#quote" class="bugs-repair-point">
                            <span class="bugs-repair-point-icon">
                                <i class="ph ph-battery-charging fs-5"></i>
                            </span>
                            <div>
                                <span class="bugs-repair-point-title d-block">Battery replacement</span>
                                <span class="bugs-repair-point-sub d-block">Holds a charge again</span>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6">
                        <a href="{{ route('repairs') }}#quote" class="bugs-repair-point">
                            <span class="bugs-repair-point-icon">
                                <i class="ph ph-plug fs-5"></i>
                            </span>
                            <div>
                                <span class="bugs-repair-point-title d-block">Charging port repair</span>
                                <span class="bugs-repair-point-sub d-block">Loose cable, no charge</span>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6">
                        <a href="{{ route('repairs') }}#quote" class="bugs-repair-point">
                            <span class="bugs-repair-point-icon">
                                <i class="ph ph-drop fs-5"></i>
                            </span>
                            <div>
                                <span class="bugs-repair-point-title d-block">Liquid damage service</span>
                                <span class="bugs-repair-point-sub d-block">Cleaned and assessed</span>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6">
                        <a href="{{ route('repairs') }}#quote" class="bugs-repair-point">
                            <span class="bugs-repair-point-icon">
                                <i class="ph ph-arrows-left-right fs-5"></i>
                            </span>
                            <div>
                                <span class="bugs-repair-point-title d-block">Data transfer &amp; backup</span>
                                <span class="bugs-repair-point-sub d-block">Move to your new phone</span>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6">
                        <a href="{{ route('repairs') }}#quote" class="bugs-repair-point">
                            <span class="bugs-repair-point-icon">
                                <i class="ph ph-broadcast fs-5"></i>
                            </span>
                            <div>
                                <span class="bugs-repair-point-title d-block">Carrier activation</span>
                                <span class="bugs-repair-point-sub d-block">Prepaid &amp; postpaid</span>
                            </div>
                        </a>
                    </div>
                </div>

                <a href="{{ route('repairs') }}" class="btn btn-bugs-outline">
                    <span>Explore Repair Services</span>
                    <i class="ph ph-arrow-right fs-5"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     Section 7: Mandatory Tagline Reveal Section (SKILL.md B11)
     Word-by-word scroll reveal animation with GSAP ScrollTrigger
     ========================================================================== -->
<section class="bugs-tagline-section" id="brandTaglineSection">
    <div class="container px-3 px-lg-5 text-center">
        <span class="eyebrow mb-3 d-inline-block" style="color: var(--bugs-primary);">Our Commitment</span>
        <h2 class="bugs-tagline-heading text-white">
            <span class="tagline-word">From</span>
            <span class="tagline-word">the</span>
            <span class="tagline-word">purest</span>
            <span class="tagline-word">glass</span>
            <span class="tagline-word">and</span>
            <span class="tagline-word">smoothest</span>
            <span class="tagline-word">vapor</span>
            <span class="tagline-word">to</span>
            <span class="tagline-word">precision</span>
            <span class="tagline-word">screen</span>
            <span class="tagline-word">restoration,</span>
            <span class="tagline-word">we</span>
            <span class="tagline-word">bring</span>
            <span class="tagline-word">genuine</span>
            <span class="tagline-word">care</span>
            <span class="tagline-word">and</span>
            <span class="tagline-word">honest</span>
            <span class="tagline-word">pricing</span>
            <span class="tagline-word">to</span>
            <span class="tagline-word">every</span>
            <span class="tagline-word">visit</span>
            <span class="tagline-word">on</span>
            <span class="tagline-word">Halls</span>
            <span class="tagline-word">Ferry.</span>
        </h2>
    </div>
</section>

<!-- ==========================================================================
     Section 8: Why Choose BUGS (Outcome & Proof Benefits)
     ========================================================================== -->
<section class="py-5 gsap-reveal-section" style="background-color: var(--bugs-bg);">
    <div class="container-fluid px-3 px-lg-5 py-4" style="max-width: 1400px;">
        <div class="text-center mb-5" style="max-width: 680px; margin-left: auto; margin-right: auto;">
            <span class="eyebrow" style="color: var(--bugs-primary);">Why Customers Return</span>
            <h2 class="heading-2 text-white mt-2 mb-2">Built on speed, honesty, and local care.</h2>
            <p class="body-3 text-secondary">
                We know your phone is your lifeline and your smoke session is your wind down. Here is how we make every visit seamless.
            </p>
        </div>

        <div class="row g-4 row-cols-1 row-cols-md-2 row-cols-lg-3">
            <div class="col">
                <div class="bugs-feature-card">
                    <div class="bugs-feature-icon">
                        <i class="ph ph-lightning"></i>
                    </div>
                    <h3 class="title-2 text-white mb-2">Same-day repairs</h3>
                    <p class="body-3 text-secondary mb-0">
                        Most screen and battery swaps take 30 to 45 minutes right in front of you. Walk in with a damaged screen, leave with a pristine display.
                    </p>
                </div>
            </div>

            <div class="col">
                <div class="bugs-feature-card">
                    <div class="bugs-feature-icon">
                        <i class="ph ph-door-open"></i>
                    </div>
                    <h3 class="title-2 text-white mb-2">Walk-in service</h3>
                    <p class="body-3 text-secondary mb-0">
                        No appointments or booking queues. Step in anytime Monday through Sunday between 10:00 AM and 8:00 PM.
                    </p>
                </div>
            </div>

            <div class="col">
                <div class="bugs-feature-card">
                    <div class="bugs-feature-icon">
                        <i class="ph ph-shield-check"></i>
                    </div>
                    <h3 class="title-2 text-white mb-2">Free diagnosis</h3>
                    <p class="body-3 text-secondary mb-0">
                        Zero bench fees. We inspect your device, pinpoint the issue, and provide an accurate quote before you spend a single dollar.
                    </p>
                </div>
            </div>

            <div class="col">
                <div class="bugs-feature-card">
                    <div class="bugs-feature-icon">
                        <i class="ph ph-identification-card"></i>
                    </div>
                    <h3 class="title-2 text-white mb-2">Strict 21+ verification</h3>
                    <p class="body-3 text-secondary mb-0">
                        We check valid photo identification for every tobacco and vapor transaction, ensuring fully compliant and responsible adult retail.
                    </p>
                </div>
            </div>

            <div class="col">
                <div class="bugs-feature-card">
                    <div class="bugs-feature-icon">
                        <i class="ph ph-truck"></i>
                    </div>
                    <h3 class="title-2 text-white mb-2">Local delivery</h3>
                    <p class="body-3 text-secondary mb-0">
                        Free delivery on orders over $50 within the St. Louis delivery zone. Order online and receive it discreetly at your door.
                    </p>
                </div>
            </div>

            <div class="col">
                <div class="bugs-feature-card">
                    <div class="bugs-feature-icon">
                        <i class="ph ph-clock-countdown"></i>
                    </div>
                    <h3 class="title-2 text-white mb-2">Open 7 days a week</h3>
                    <p class="body-3 text-secondary mb-0">
                        Open from 10:00 AM until 8:00 PM every single day of the week, including weekends and most holidays.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     Section 9: Store Location & Visit Section (`#visit`)
     ========================================================================== -->
<section class="py-5 gsap-reveal-section" id="visit" style="background-color: var(--bugs-surface-1);">
    <div class="container-fluid px-3 px-lg-5 py-4" style="max-width: 1400px;">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6">
                <p class="eyebrow mb-2" style="color: var(--bugs-primary);">Come through</p>
                <h2 class="heading-2 text-white mb-3">
                    Ten minutes from <span style="color: var(--bugs-primary);">wherever you are</span>.
                </h2>
                <p class="body-2 text-secondary mb-4" style="max-width: 540px;">
                    We are located on Halls Ferry Road in St. Louis with easy parking right outside our front door. Bring your ID &mdash; we card everyone, every time.
                </p>

                <div class="d-flex flex-column gap-3 mb-4">
                    <a href="https://www.google.com/maps/search/?api=1&query=Bugs+Wireless+%26+Smoke+Shop+10010+Halls+Ferry+Rd+St+Louis+MO+63136" target="_blank" rel="noreferrer" class="bugs-service-card text-decoration-none d-flex align-items-center gap-3">
                        <div class="bugs-icon-badge flex-shrink-0">
                            <i class="ph ph-map-pin fs-5"></i>
                        </div>
                        <div>
                            <span class="eyebrow text-secondary d-block" style="font-size: 11px;">Address</span>
                            <span class="text-white body-2 fw-medium">10010 Halls Ferry Rd, St. Louis, MO 63136</span>
                        </div>
                    </a>

                    <a href="tel:+13144412851" class="bugs-service-card text-decoration-none d-flex align-items-center gap-3">
                        <div class="bugs-icon-badge flex-shrink-0">
                            <i class="ph ph-phone fs-5"></i>
                        </div>
                        <div>
                            <span class="eyebrow text-secondary d-block" style="font-size: 11px;">Call the counter</span>
                            <span class="num text-white body-2 fw-medium">314-441-2851</span>
                        </div>
                    </a>

                    <div class="bugs-service-card d-flex align-items-center gap-3">
                        <div class="bugs-icon-badge flex-shrink-0">
                            <i class="ph ph-clock fs-5"></i>
                        </div>
                        <div>
                            <span class="eyebrow text-secondary d-block" style="font-size: 11px;">Hours</span>
                            <span class="text-white body-2 fw-medium">Mon &ndash; Sun &bull; 10:00 AM &ndash; 8:00 PM</span>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-wrap gap-3">
                    <a href="https://www.google.com/maps/search/?api=1&query=Bugs+Wireless+%26+Smoke+Shop+10010+Halls+Ferry+Rd+St+Louis+MO+63136" target="_blank" rel="noreferrer" class="btn btn-bugs-primary">
                        <i class="ph ph-navigation-arrow fs-5"></i>
                        <span>Get directions</span>
                    </a>
                    <a href="tel:+13144412851" class="btn btn-bugs-outline">
                        <i class="ph ph-phone fs-5"></i>
                        <span>Call 314-441-2851</span>
                    </a>
                </div>
            </div>

            <!-- Right: Retail Store Counter Photo with Mask -->
            <div class="col-lg-6" data-parallax="-0.06">
                <div class="bugs-card-outer-24 overflow-hidden p-2" style="background-color: var(--bugs-surface-2);">
                    <div class="ratio ratio-4x3 rounded-3 overflow-hidden mask-reveal-wrap">
                        <img src="{{ asset('assets/images/lifestyle/store-counter.png') }}" 
                             alt="Inside Bugs Wireless and Smoke Shop Store Counter" 
                             loading="lazy"
                             class="w-100 h-100 object-fit-cover mask-reveal-img">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     Section 10: Clean Modern FAQ Accordion
     ========================================================================== -->
<section class="py-5 gsap-reveal-section" style="background-color: var(--bugs-bg);">
    <div class="container px-3 px-lg-5 py-4" style="max-width: 960px;">
        <div class="text-center mb-5">
            <span class="eyebrow" style="color: var(--bugs-primary);">Frequently Asked Questions</span>
            <h2 class="heading-2 text-white mt-2 mb-2">Got questions? We have answers.</h2>
            <p class="body-3 text-secondary">
                Everything you need to know about our repair bench, shopping experience, and store policies.
            </p>
        </div>

        <div class="accordion bugs-accordion" id="bugsFaqAccordion">
            <!-- Question 1: Phone Repairs -->
            <div class="accordion-item">
                <h3 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        How fast can my phone screen or battery be replaced?
                    </button>
                </h3>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#bugsFaqAccordion">
                    <div class="accordion-body">
                        Most common screen and battery replacements for iPhone and Samsung Galaxy models are completed within 30 to 45 minutes on our front counter. You can wait comfortably in our store while our technician restores your device.
                    </div>
                </div>
            </div>

            <!-- Question 2: Free Diagnosis & Estimates -->
            <div class="accordion-item">
                <h3 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Do I have to pay for a phone diagnosis?
                    </button>
                </h3>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#bugsFaqAccordion">
                    <div class="accordion-body">
                        No. All diagnostics at BUGS Wireless are 100% free with zero bench fee. We inspect your device, test its functionality, and provide a firm, transparent quote before you decide whether to proceed with the repair.
                    </div>
                </div>
            </div>

            <!-- Question 3: Walk-in vs Appointment -->
            <div class="accordion-item">
                <h3 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Do I need an appointment for phone repair or shopping?
                    </button>
                </h3>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#bugsFaqAccordion">
                    <div class="accordion-body">
                        No appointment is ever needed. Walk-ins are always welcome seven days a week between 10:00 AM and 8:00 PM. Just bring your device or browse our smoke shop shelves at your convenience.
                    </div>
                </div>
            </div>

            <!-- Question 4: Store Hours -->
            <div class="accordion-item">
                <h3 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        What are your operating hours and location?
                    </button>
                </h3>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#bugsFaqAccordion">
                    <div class="accordion-body">
                        We are open Monday through Sunday, 10:00 AM to 8:00 PM. Our storefront is located at 10010 Halls Ferry Rd, St. Louis, MO 63136 with ample free parking directly in front of the counter.
                    </div>
                </div>
            </div>

            <!-- Question 5: Order Pickup & Local Delivery -->
            <div class="accordion-item">
                <h3 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        How does in-store pickup and local delivery work?
                    </button>
                </h3>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#bugsFaqAccordion">
                    <div class="accordion-body">
                        You can reserve items online through our website. For in-store pickup, items are set aside at the counter for immediate collection. For local delivery, orders over $50 qualify for free delivery within our St. Louis delivery zone.
                    </div>
                </div>
            </div>

            <!-- Question 6: 21+ Age Verification -->
            <div class="accordion-item">
                <h3 class="accordion-header" id="headingSix">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        What identification is required for purchasing?
                    </button>
                </h3>
                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#bugsFaqAccordion">
                    <div class="accordion-body">
                        In accordance with federal and Missouri state laws, all vapor, tobacco, nicotine, and smoking accessory purchases require proof of age (21+). A valid government-issued photo ID (driver's license, passport, or state ID) must be presented in person at the counter or upon delivery.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     Section 11: Cinematic Final Brand Statement & Call-To-Action
     Large Editorial Typography with Cinematic Entrance & Dual CTAs
     ========================================================================== -->
<section id="cinematicFinalCta" class="py-5 position-relative overflow-hidden" style="background-color: var(--bugs-surface-1); border-top: 1px solid var(--bugs-border);">
    <div class="glow-gold" style="bottom: -100px; left: 50%; transform: translateX(-50%); width: 600px; height: 350px;"></div>
    <div class="container px-3 px-lg-5 py-5 text-center position-relative" style="max-width: 980px; z-index: 2;">
        <span class="eyebrow mb-3 d-inline-flex align-items-center gap-2" style="color: var(--bugs-primary);">
            <i class="ph ph-crown fs-5"></i>
            St. Louis Destination
        </span>
        <h2 class="display-3 fw-bold text-white mb-4" style="letter-spacing: -0.03em; line-height: 1.08;">
            Step up to the counter.<br>
            <span style="color: var(--bugs-primary);">We'll take care of the rest.</span>
        </h2>
        <p class="body-1 text-secondary mb-5 mx-auto" style="max-width: 640px;">
            Whether you need emergency screen restoration before dinner or fresh vapor accessories for the weekend, BUGS on Halls Ferry Road has you covered.
        </p>

        <div class="d-flex flex-wrap justify-content-center align-items-center gap-3">
            <a href="{{ route('shop.index') }}" class="btn btn-bugs-primary btn-lg px-4 py-3">
                <span>Explore all products</span>
                <i class="ph ph-arrow-right fs-5"></i>
            </a>
            <a href="tel:+13144412851" class="btn btn-bugs-outline btn-lg px-4 py-3">
                <i class="ph ph-phone-call fs-5"></i>
                <span>Call the counter: 314-441-2851</span>
            </a>
        </div>
    </div>
</section>
@endsection
