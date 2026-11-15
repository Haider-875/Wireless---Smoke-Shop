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
                    Cracked screen, tired battery, dead charging port — our technicians work the bench in front of you, with the price agreed before a single screw comes out. Phones, tablets and wireless service, plus the tobacco counter in the back.
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

                <!-- Proof Signals Strip (Exact Reference Match) -->
                <dl class="row g-4 pt-4 border-top border-white border-opacity-10 mb-0" style="max-width: 520px; border-color: rgba(255, 255, 255, 0.07) !important;">
                    <div class="col-4">
                        <dt class="num text-white fs-5 fw-semibold mb-1">30 min</dt>
                        <dd class="text-secondary small mb-0" style="font-size: 11.5px; line-height: 1.35;">Most screen repairs</dd>
                    </div>
                    <div class="col-4">
                        <dt class="num text-white fs-5 fw-semibold mb-1">90 days</dt>
                        <dd class="text-secondary small mb-0" style="font-size: 11.5px; line-height: 1.35;">Parts &amp; labour warranty</dd>
                    </div>
                    <div class="col-4">
                        <dt class="num text-white fs-5 fw-semibold mb-1">All carriers</dt>
                        <dd class="text-secondary small mb-0" style="font-size: 11.5px; line-height: 1.35;">Activation &amp; data transfer</dd>
                    </div>
                </dl>
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

                <!-- Overlaid Floating Free Diagnostics Card (Exact Reference Match) -->
                <div class="position-absolute p-3 p-sm-4 border rounded-4 shadow-lg" 
                     style="background-color: rgba(9, 10, 12, 0.88); border-color: rgba(255, 255, 255, 0.09) !important; bottom: -24px; left: 16px; right: 16px; backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px); box-shadow: 0 20px 50px -20px rgba(0,0,0,0.9) !important;">
                    <div class="d-flex align-items-center justify-content-between gap-3">
                        <div>
                            <p class="eyebrow mb-1 text-steel" style="font-size: 0.6875rem; letter-spacing: 0.15em;">Free diagnostics</p>
                            <p class="text-white small mb-0">Bring it in — we quote the repair before we start.</p>
                        </div>
                        <a href="tel:+13144412851" class="btn btn-bugs-primary rounded-circle p-0 flex-shrink-0 d-flex align-items-center justify-content-center text-dark" title="Call the repair bench" aria-label="Call the repair bench" style="width: 44px; height: 44px;">
                            <i data-lucide="phone" class="w-4 h-4"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     Section 2: Infinite Marquee Ticker (Exact Reference Placement Between Hero & Repair Bench)
     ========================================================================== -->
@include('components.announcement-bar')

<!-- ==========================================================================
     Section 3: Repair Bench ("Broken today, fixed by tonight.")
     ========================================================================== -->
<section id="repairs" class="position-relative overflow-hidden py-5 border-top border-white border-opacity-10" style="background-color: hsl(var(--background));">
    <div class="pointer-events-none position-absolute glow-steel" style="top: 40px; left: -100px; width: 420px; height: 420px; z-index: 1;"></div>

    <div class="container-fluid px-4 px-lg-5 py-5 position-relative" style="max-width: 1400px; z-index: 2;">
        <div class="row align-items-center g-5">
            <!-- Left: Bench Imagery -->
            <div class="col-lg-6 order-2 order-lg-1">
                <div class="overflow-hidden rounded-4 border border-white border-opacity-10 shadow-lg position-relative" style="background-color: hsl(var(--surface-raised));">
                    <div class="ratio ratio-4x3">
                        <img src="{{ asset('assets/images/lifestyle/repair-bench.png') }}" 
                             alt="A technician repairing a phone at the bench" 
                             class="w-100 h-100 object-fit-cover"
                             loading="lazy">
                    </div>
                    <!-- Floating 90-day warranty badge (Exact Reference Match) -->
                    <div class="position-absolute p-3 rounded-3 border" style="bottom: 16px; left: 16px; background-color: rgba(9, 10, 12, 0.85); border-color: rgba(255, 255, 255, 0.1) !important; backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);">
                        <p class="eyebrow text-steel d-flex align-items-center gap-1 mb-1" style="font-size: 0.72rem;">
                            <i data-lucide="shield-check" class="w-3.5 h-3.5"></i>
                            <span>90-day warranty</span>
                        </p>
                        <p class="text-white small mb-0" style="font-size: 0.8125rem;">Parts and labour, every repair.</p>
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
                    Our technicians work on the counter in front of you. Most screen and battery jobs are finished the same afternoon — genuine-grade parts, a 90-day warranty and no fee if we can't fix it.
                </p>

                <!-- 6 Capabilities Grid with Starting Prices (Exact Reference Match) -->
                <ul class="row row-cols-1 row-cols-sm-2 g-4 list-unstyled mb-4 pb-2">
                    <li class="col d-flex align-items-start gap-3">
                        <span class="rounded-circle d-inline-flex align-items-center justify-content-center flex-shrink-0" style="width: 36px; height: 36px; border: 1px solid rgba(86, 172, 230, 0.25); background: rgba(86, 172, 230, 0.06); color: hsl(var(--steel));">
                            <i data-lucide="smartphone" style="width: 16px; height: 16px;"></i>
                        </span>
                        <div class="min-w-0 flex-grow-1">
                            <span class="d-block text-white fw-semibold" style="font-size: 14px; line-height: 1.4;">Screen &amp; glass replacement</span>
                            <div class="d-flex flex-wrap align-items-baseline gap-2 mt-1" style="font-size: 12px; color: hsl(var(--muted-foreground));">
                                <span>iPhone, Galaxy, Pixel</span>
                                <span class="num fw-semibold" style="font-size: 11px; color: rgba(86, 172, 230, 0.95);">from $79</span>
                            </div>
                        </div>
                    </li>
                    <li class="col d-flex align-items-start gap-3">
                        <span class="rounded-circle d-inline-flex align-items-center justify-content-center flex-shrink-0" style="width: 36px; height: 36px; border: 1px solid rgba(86, 172, 230, 0.25); background: rgba(86, 172, 230, 0.06); color: hsl(var(--steel));">
                            <i data-lucide="battery-charging" style="width: 16px; height: 16px;"></i>
                        </span>
                        <div class="min-w-0 flex-grow-1">
                            <span class="d-block text-white fw-semibold" style="font-size: 14px; line-height: 1.4;">Battery replacement</span>
                            <div class="d-flex flex-wrap align-items-baseline gap-2 mt-1" style="font-size: 12px; color: hsl(var(--muted-foreground));">
                                <span>Holds a charge again</span>
                                <span class="num fw-semibold" style="font-size: 11px; color: rgba(86, 172, 230, 0.95);">from $59</span>
                            </div>
                        </div>
                    </li>
                    <li class="col d-flex align-items-start gap-3">
                        <span class="rounded-circle d-inline-flex align-items-center justify-content-center flex-shrink-0" style="width: 36px; height: 36px; border: 1px solid rgba(86, 172, 230, 0.25); background: rgba(86, 172, 230, 0.06); color: hsl(var(--steel));">
                            <i data-lucide="plug" style="width: 16px; height: 16px;"></i>
                        </span>
                        <div class="min-w-0 flex-grow-1">
                            <span class="d-block text-white fw-semibold" style="font-size: 14px; line-height: 1.4;">Charging port repair</span>
                            <div class="d-flex flex-wrap align-items-baseline gap-2 mt-1" style="font-size: 12px; color: hsl(var(--muted-foreground));">
                                <span>Loose cable, no charge</span>
                                <span class="num fw-semibold" style="font-size: 11px; color: rgba(86, 172, 230, 0.95);">from $49</span>
                            </div>
                        </div>
                    </li>
                    <li class="col d-flex align-items-start gap-3">
                        <span class="rounded-circle d-inline-flex align-items-center justify-content-center flex-shrink-0" style="width: 36px; height: 36px; border: 1px solid rgba(86, 172, 230, 0.25); background: rgba(86, 172, 230, 0.06); color: hsl(var(--steel));">
                            <i data-lucide="droplets" style="width: 16px; height: 16px;"></i>
                        </span>
                        <div class="min-w-0 flex-grow-1">
                            <span class="d-block text-white fw-semibold" style="font-size: 14px; line-height: 1.4;">Liquid damage service</span>
                            <div class="d-flex flex-wrap align-items-baseline gap-2 mt-1" style="font-size: 12px; color: hsl(var(--muted-foreground));">
                                <span>Cleaned and assessed</span>
                                <span class="num fw-semibold" style="font-size: 11px; color: rgba(86, 172, 230, 0.95);">from $39</span>
                            </div>
                        </div>
                    </li>
                    <li class="col d-flex align-items-start gap-3">
                        <span class="rounded-circle d-inline-flex align-items-center justify-content-center flex-shrink-0" style="width: 36px; height: 36px; border: 1px solid rgba(86, 172, 230, 0.25); background: rgba(86, 172, 230, 0.06); color: hsl(var(--steel));">
                            <i data-lucide="hard-drive" style="width: 16px; height: 16px;"></i>
                        </span>
                        <div class="min-w-0 flex-grow-1">
                            <span class="d-block text-white fw-semibold" style="font-size: 14px; line-height: 1.4;">Data transfer &amp; backup</span>
                            <div class="d-flex flex-wrap align-items-baseline gap-2 mt-1" style="font-size: 12px; color: hsl(var(--muted-foreground));">
                                <span>Move to your new phone</span>
                                <span class="num fw-semibold" style="font-size: 11px; color: rgba(86, 172, 230, 0.95);">from $29</span>
                            </div>
                        </div>
                    </li>
                    <li class="col d-flex align-items-start gap-3">
                        <span class="rounded-circle d-inline-flex align-items-center justify-content-center flex-shrink-0" style="width: 36px; height: 36px; border: 1px solid rgba(86, 172, 230, 0.25); background: rgba(86, 172, 230, 0.06); color: hsl(var(--steel));">
                            <i data-lucide="wifi" style="width: 16px; height: 16px;"></i>
                        </span>
                        <div class="min-w-0 flex-grow-1">
                            <span class="d-block text-white fw-semibold" style="font-size: 14px; line-height: 1.4;">Carrier activation</span>
                            <div class="d-flex flex-wrap align-items-baseline gap-2 mt-1" style="font-size: 12px; color: hsl(var(--muted-foreground));">
                                <span>Prepaid &amp; postpaid</span>
                                <span class="num fw-semibold" style="font-size: 11px; color: rgba(86, 172, 230, 0.95);">no charge</span>
                            </div>
                        </div>
                    </li>
                </ul>

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
@php
$counterRepairCards = [
    [
        'title' => 'Screen & Glass Replacement',
        'icon' => 'smartphone',
        'badge' => '30 Min Turnaround',
        'price' => 'from $79',
        'warranty' => '90-Day Warranty · OEM-Spec',
        'description' => 'Cracked glass, dead touch, or vertical lines. Factory-grade OLED & LCD panels fitted on the bench while you wait.',
        'whatsapp_msg' => 'Hello BUGS Wireless, I need a quote for Screen & Glass Replacement at 10010 Halls Ferry Rd.'
    ],
    [
        'title' => 'Battery Replacement',
        'icon' => 'battery-charging',
        'badge' => 'Same-Day Swap',
        'price' => 'from $59',
        'warranty' => '90-Day Warranty · Fresh Cells',
        'description' => 'Rapid battery drain, swelling, or sudden shutdowns. Fresh high-capacity cells installed to restore 100% all-day health.',
        'whatsapp_msg' => 'Hello BUGS Wireless, I need a quote for Battery Replacement at 10010 Halls Ferry Rd.'
    ],
    [
        'title' => 'Charging Port Repair',
        'icon' => 'zap',
        'badge' => 'Quick Bench Fix',
        'price' => 'from $49',
        'warranty' => '90-Day Warranty · Fast-Charge',
        'description' => 'Loose cord, intermittent connection, or zero charge. Thoroughly cleaned, micro-soldered, or flex port replaced.',
        'whatsapp_msg' => 'Hello BUGS Wireless, I need a quote for Charging Port Repair at 10010 Halls Ferry Rd.'
    ],
    [
        'title' => 'Liquid Damage & Diagnostics',
        'icon' => 'droplet',
        'badge' => 'Free Diagnostic',
        'price' => 'from $39',
        'warranty' => '90-Day Warranty · No-Fix No-Fee',
        'description' => 'Water drop, pool immersion, or dead board. Ultrasonic chemical cleaning, board inspection, and honest quotes.',
        'whatsapp_msg' => 'Hello BUGS Wireless, I need a quote for Liquid Damage & Diagnostics at 10010 Halls Ferry Rd.'
    ],
];
@endphp

<section class="py-5 border-top border-white border-opacity-10" style="background-color: hsl(var(--surface));">
    <div class="container-fluid px-4 px-lg-5 py-5" style="max-width: 1400px;">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-3 mb-5">
            <div>
                <p class="eyebrow text-steel mb-2" style="font-size: 0.75rem; letter-spacing: 0.15em;">The wireless counter</p>
                <h2 class="display-6 fw-semibold text-white tracking-tight mb-0">
                    Gear for the phone<span class="font-serif-display text-steel"> you just fixed</span>.
                </h2>
                <p class="text-secondary small mt-2 mb-0">What everybody gets with a new screen — cases, tempered glass, audio, and fast chargers.</p>
            </div>
            <div>
                <a href="{{ route('repairs') }}" class="btn btn-sm btn-bugs-outline rounded-pill px-4 py-2 text-white fw-semibold d-inline-flex align-items-center gap-2">
                    <span>View all repair services</span>
                    <i data-lucide="arrow-right" style="width: 14px; height: 14px;"></i>
                </a>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4">
            @foreach($counterRepairCards as $card)
                <div class="col">
                    <article class="repair-bench-card p-4 rounded-4 border border-white border-opacity-10 h-100 d-flex flex-column transition-all duration-300" style="background-color: hsl(var(--card));">
                        <div class="d-flex align-items-center justify-content-between gap-2 mb-3">
                            <span class="rounded-circle d-inline-flex align-items-center justify-content-center flex-shrink-0" style="width: 44px; height: 44px; border: 1px solid rgba(86, 172, 230, 0.35); background: rgba(86, 172, 230, 0.08); color: hsl(var(--steel));">
                                <i data-lucide="{{ $card['icon'] }}" style="width: 20px; height: 20px;"></i>
                            </span>
                            <span class="badge rounded-pill fw-semibold" style="font-size: 11px; padding: 4px 10px; background: rgba(86, 172, 230, 0.12); border: 1px solid rgba(86, 172, 230, 0.3); color: hsl(var(--steel));">
                                {{ $card['badge'] }}
                            </span>
                        </div>

                        <h3 class="fs-5 fw-semibold text-white mb-1" style="line-height: 1.35;">{{ $card['title'] }}</h3>
                        <div class="d-flex align-items-baseline gap-2 mb-2">
                            <span class="fs-5 fw-bold text-steel num">{{ $card['price'] }}</span>
                            <span class="badge bg-white bg-opacity-5 text-secondary border border-white border-opacity-10 fw-normal" style="font-size: 10.5px;">{{ $card['warranty'] }}</span>
                        </div>

                        <p class="text-secondary small leading-relaxed mb-4 flex-grow-1" style="font-size: 13px; line-height: 1.55;">{{ $card['description'] }}</p>

                        <div class="d-flex align-items-center gap-2 pt-3 border-top border-white border-opacity-10 mt-auto">
                            <a href="{{ route('repairs') }}" class="btn btn-sm btn-bugs-outline rounded-pill px-3 py-2 text-white fw-semibold flex-grow-1 text-center d-inline-flex align-items-center justify-content-center gap-1" style="font-size: 13px;">
                                <span>Book repair</span>
                                <i data-lucide="arrow-up-right" style="width: 14px; height: 14px;"></i>
                            </a>
                            <a href="https://wa.me/13144412851?text={{ urlencode($card['whatsapp_msg']) }}" 
                               target="_blank" 
                               rel="noopener noreferrer" 
                               class="btn-product-whatsapp" 
                               aria-label="Inquire about {{ $card['title'] }} on WhatsApp"
                               title="Inquire on WhatsApp (+1 314-441-2851)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.82 9.82 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.23 8.23 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.2 8.2 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.54 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.16.25-.64.81-.78.98-.15.17-.29.19-.54.06-.25-.13-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.38-1.72-.15-.25-.02-.38.11-.51.11-.11.25-.29.37-.44.13-.15.17-.25.25-.42.08-.17.04-.31-.02-.44-.06-.13-.56-1.35-.77-1.85-.2-.49-.41-.42-.56-.43h-.48c-.16 0-.43.06-.66.31-.23.25-.87.85-.87 2.08 0 1.23.89 2.41 1.02 2.58.12.16 1.76 2.68 4.25 3.76.59.26 1.06.41 1.42.52.6.19 1.14.16 1.57.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.08.15-1.18-.06-.1-.23-.17-.48-.29z"/>
                                </svg>
                            </a>
                        </div>
                    </article>
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
                Vapes, nic salts, hand-blown glass and hookah — stocked online too, ready for pickup or local delivery. Adults 21+ with valid ID, always.
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
            <!-- Left: Location Info & Details -->
            <div class="col-lg-6">
                <p class="eyebrow text-steel mb-2" style="font-size: 0.75rem; letter-spacing: 0.15em;">Visit the counter</p>
                <h2 class="display-5 fw-semibold text-white tracking-tight mb-4" style="line-height: 1.15; letter-spacing: -0.025em;">
                    Repairs, activation<br>
                    <span class="font-serif-display text-steel" style="font-size: 1.05em;">and a look around</span>.
                </h2>
                <p class="text-secondary mb-4 pb-2" style="max-width: 480px; font-size: 1.0625rem; line-height: 1.6;">
                    We're on Halls Ferry Road with parking right out front. Walk in for a repair quote, pick up an online order, or browse the counter — bring your ID for anything 21+.
                </p>

                <div class="d-flex flex-column gap-4 mb-2">
                    <a href="https://www.google.com/maps/search/?api=1&query=Bugs+Wireless+%26+Smoke+Shop+10010+Halls+Ferry+Rd+St+Louis+MO+63136" 
                       target="_blank" 
                       rel="noreferrer" 
                       class="group d-flex align-items-start gap-3 text-decoration-none">
                        <i data-lucide="map-pin" class="text-steel mt-1 flex-shrink-0" style="width: 18px; height: 18px;"></i>
                        <div>
                            <span class="eyebrow d-block text-secondary mb-1" style="font-size: 0.6875rem; letter-spacing: 0.12em;">Address</span>
                            <span class="d-block text-white group-hover:text-steel transition-colors" style="font-size: 15px;">10010 Halls Ferry Rd, St. Louis, MO 63136</span>
                        </div>
                    </a>

                    <a href="tel:+13144412851" class="group d-flex align-items-start gap-3 text-decoration-none">
                        <i data-lucide="phone" class="text-steel mt-1 flex-shrink-0" style="width: 18px; height: 18px;"></i>
                        <div>
                            <span class="eyebrow d-block text-secondary mb-1" style="font-size: 0.6875rem; letter-spacing: 0.12em;">Call the counter</span>
                            <span class="num d-block text-white group-hover:text-steel transition-colors" style="font-size: 15px;">314-441-2851</span>
                        </div>
                    </a>

                    <div class="d-flex align-items-start gap-3">
                        <i data-lucide="clock" class="text-steel mt-1 flex-shrink-0" style="width: 18px; height: 18px;"></i>
                        <div>
                            <span class="eyebrow d-block text-secondary mb-1" style="font-size: 0.6875rem; letter-spacing: 0.12em;">Hours</span>
                            <span class="d-block text-white" style="font-size: 15px;">Mon – Sun · 10:00 AM – 8:00 PM</span>
                        </div>
                    </div>

                    <div class="d-flex align-items-start gap-3">
                        <i data-lucide="shield-check" class="text-steel mt-1 flex-shrink-0" style="width: 18px; height: 18px;"></i>
                        <div>
                            <span class="eyebrow d-block text-secondary mb-1" style="font-size: 0.6875rem; letter-spacing: 0.12em;">Every repair</span>
                            <span class="d-block text-white" style="font-size: 15px;">90-day parts &amp; labour warranty</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Interactive Google Map with Overlay Direction Button -->
            <div class="col-lg-6">
                <div class="bugs-map-container">
                    <iframe 
                        src="https://maps.google.com/maps?q=10010+Halls+Ferry+Rd,+St.+Louis,+MO+63136&t=&z=15&ie=UTF8&iwloc=&output=embed"
                        class="bugs-map-iframe"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        title="BUGS Wireless &amp; Smoke Shop Location Map"
                        aria-label="Google Map showing 10010 Halls Ferry Rd, St. Louis, MO 63136">
                    </iframe>

                    <a href="https://www.google.com/maps/search/?api=1&query=Bugs+Wireless+%26+Smoke+Shop+10010+Halls+Ferry+Rd+St+Louis+MO+63136" 
                       target="_blank" 
                       rel="noreferrer" 
                       class="bugs-map-btn"
                       aria-label="Get directions in Google Maps">
                        <i data-lucide="map-pin" style="width: 14px; height: 14px;"></i>
                        <span>Get directions</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
