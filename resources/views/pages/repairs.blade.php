@extends('layouts.app')

@section('title', 'We fix all phones while you wait — BUGS Wireless & Smoke Shop, St. Louis')
@section('meta_description', 'Phone and tablet repair on Halls Ferry Rd, St. Louis. Screen & glass replacement, fresh batteries, charging ports, liquid damage, data transfer and carrier activation.')

@section('content')
<!-- Hero Section (Exact Reference Layout) -->
<section class="position-relative overflow-hidden py-5" style="background-color: hsl(var(--background)); min-height: 50vh; display: flex; align-items: center;">
    <div class="pointer-events-none position-absolute glow-gold glow-steel" style="top: 0; right: -100px; width: 460px; height: 460px; z-index: 1;"></div>
    
    <div class="container-fluid px-4 px-lg-5 py-5 position-relative" style="max-width: 1400px; z-index: 2;">
        <div class="row">
            <div class="col-lg-10 col-xl-9">
                <p class="eyebrow text-steel mb-3" style="font-size: 0.75rem; letter-spacing: 0.15em;">The repair bench</p>
                <h1 class="display-4 fw-semibold text-white tracking-tight mb-4" style="line-height: 1.1; letter-spacing: -0.03em;">
                    We fix all phones<br>
                    <span class="font-serif-display text-steel" style="font-size: 1.05em;">while you wait</span>.
                </h1>
                <p class="text-secondary fs-5 mt-3 mb-4" style="max-width: 600px; font-size: 1.0625rem !important; line-height: 1.6;">
                    iPhone, Samsung, Pixel, Motorola, tablets — if it has a screen and a battery, it's been across our bench. Honest quotes, no appointment, and most repairs finished the same day.
                </p>
                <div class="d-flex flex-wrap align-items-center gap-3 mt-4">
                    <a href="tel:+13144412851" class="btn btn-bugs-primary px-4 py-3 rounded-pill fw-semibold text-dark d-inline-flex align-items-center gap-2">
                        <i data-lucide="phone" class="w-4 h-4"></i> Call 314-441-2851
                    </a>
                    <button type="button" class="btn btn-bugs-outline px-4 py-3 rounded-pill text-white d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#repairQuoteModal">
                        <i data-lucide="message-square" class="w-4 h-4 text-steel"></i> Request a Repair Quote
                    </button>
                    <a href="https://www.google.com/maps/search/?api=1&query=Bugs+Wireless+%26+Smoke+Shop+10010+Halls+Ferry+Rd+St+Louis+MO+63136" target="_blank" rel="noreferrer" class="text-secondary text-decoration-none small d-inline-flex align-items-center gap-2 hover-white ms-md-2">
                        <i data-lucide="map-pin" class="w-4 h-4 text-steel"></i> Walk in — 10010 Halls Ferry Rd, St. Louis, MO 63136
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- "What we fix" 6 Service Cards Grid -->
<section class="py-5 border-top border-white border-opacity-10" style="background-color: hsl(var(--surface));">
    <div class="container-fluid px-4 px-lg-5 py-5" style="max-width: 1400px;">
        <div class="mb-5">
            <p class="eyebrow text-steel mb-2" style="font-size: 0.75rem; letter-spacing: 0.15em;">Full service capability</p>
            <h2 class="display-6 fw-semibold text-white tracking-tight mb-2">
                What we <span class="font-serif-display text-steel">fix</span>
            </h2>
            <p class="text-secondary small mb-0">Prices depend on your model and the part — you'll always get the number before we start.</p>
        </div>

        <div class="row g-4">
            @foreach($services as $service)
                <div class="col-md-6 col-lg-4">
                    <article class="bugs-service-card p-4 rounded-4 border border-white border-opacity-10 h-100 d-flex flex-column transition-all duration-300" style="background-color: hsl(var(--card));">
                        <div class="rounded-circle d-flex align-items-center justify-content-center border border-white border-opacity-10 mb-4" style="width: 44px; height: 44px; background-color: hsl(var(--surface)); color: hsl(var(--steel));">
                            @if(str_contains($service['title'], 'Screen'))
                                <i data-lucide="smartphone" class="w-5 h-5 text-steel"></i>
                            @elseif(str_contains($service['title'], 'Battery'))
                                <i data-lucide="battery-charging" class="w-5 h-5 text-steel"></i>
                            @elseif(str_contains($service['title'], 'Charging'))
                                <i data-lucide="zap" class="w-5 h-5 text-steel"></i>
                            @elseif(str_contains($service['title'], 'Liquid'))
                                <i data-lucide="droplet" class="w-5 h-5 text-steel"></i>
                            @elseif(str_contains($service['title'], 'Data'))
                                <i data-lucide="arrow-left-right" class="w-5 h-5 text-steel"></i>
                            @else
                                <i data-lucide="radio" class="w-5 h-5 text-steel"></i>
                            @endif
                        </div>
                        <h3 class="fs-5 fw-semibold text-white mb-2">{{ $service['title'] }}</h3>
                        <p class="text-secondary small leading-relaxed mb-0">{{ $service['body'] }}</p>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- 3-Step Process Section -->
<section class="py-5 border-top border-white border-opacity-10" style="background-color: hsl(var(--surface-deep));">
    <div class="container-fluid px-4 px-lg-5 py-5" style="max-width: 1400px;">
        <div class="row g-4 g-lg-5">
            @foreach($steps as $step)
                <div class="col-lg-4">
                    <div class="bugs-step-card p-4 p-md-5 rounded-4 border border-white border-opacity-10 h-100" style="background-color: hsl(var(--card));">
                        <span class="eyebrow text-steel fs-5 fw-bold d-block mb-3">{{ $step['number'] }}</span>
                        <h3 class="fs-4 fw-semibold text-white mb-2">{{ $step['title'] }}</h3>
                        <p class="text-secondary small leading-relaxed mb-0">{{ $step['body'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Call-to-Action Shop Counter Banner -->
<section class="py-5 border-top border-white border-opacity-10" style="background-color: hsl(var(--background));">
    <div class="container-fluid px-4 px-lg-5 py-5" style="max-width: 1400px;">
        <div class="bugs-cta-card p-4 p-md-5 rounded-4 border border-white border-opacity-10 d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-4" style="background-color: hsl(var(--surface));">
            <div>
                <p class="eyebrow text-steel mb-2" style="font-size: 0.75rem; letter-spacing: 0.15em;">Open Mon – Sun · 10:00 AM – 8:00 PM</p>
                <h2 class="display-6 fw-semibold text-white mb-2">Bring it by the counter.</h2>
                <p class="text-secondary small mb-0 d-flex align-items-center gap-2">
                    <i data-lucide="clock" class="w-4 h-4 text-steel"></i> Free diagnosis · no appointment needed
                </p>
            </div>
            <div class="flex-shrink-0 d-flex flex-wrap gap-3">
                <button type="button" class="btn btn-bugs-outline px-4 py-3 rounded-pill text-white" data-bs-toggle="modal" data-bs-target="#repairQuoteModal">
                    Request a Repair Quote
                </button>
                <a href="tel:+13144412851" class="btn btn-bugs-primary px-4 py-3 rounded-pill fw-semibold text-dark">
                    Call the shop
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Repair Quote Inquiry Modal -->
<div class="modal fade" id="repairQuoteModal" tabindex="-1" aria-labelledby="repairQuoteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 480px;">
        <div class="modal-content p-4 p-md-5 border border-white border-opacity-10 rounded-4" style="background-color: hsl(var(--surface));">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div>
                    <h5 class="fs-4 text-white fw-bold mb-1" id="repairQuoteModalLabel">Request a Repair Quote</h5>
                    <p class="eyebrow text-steel mb-0" style="font-size: 0.6875rem;">Free diagnosis · Same-day turnaround</p>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div>
                <form action="{{ route('repairs.quote') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label text-secondary small">Your Name</label>
                        <input type="text" class="form-control text-white border-white border-opacity-10" id="name" name="name" required placeholder="e.g. Alex Johnson" style="background-color: hsl(var(--card));">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label text-secondary small">Phone Number</label>
                        <input type="tel" class="form-control text-white border-white border-opacity-10" id="phone" name="phone" required placeholder="e.g. 314-555-0199" style="background-color: hsl(var(--card));">
                    </div>
                    <div class="mb-3">
                        <label for="device_model" class="form-label text-secondary small">Device Model</label>
                        <input type="text" class="form-control text-white border-white border-opacity-10" id="device_model" name="device_model" required placeholder="e.g. iPhone 15 Pro Max / Galaxy S24" style="background-color: hsl(var(--card));">
                    </div>
                    <div class="mb-3">
                        <label for="service_needed" class="form-label text-secondary small">Service Needed</label>
                        <select class="form-select text-white border-white border-opacity-10" id="service_needed" name="service_needed" required style="background-color: hsl(var(--card));">
                            <option value="">Select a repair...</option>
                            <option value="Screen Replacement">Screen Replacement</option>
                            <option value="Battery Replacement">Battery Replacement</option>
                            <option value="Charging Port Repair">Charging Port Repair</option>
                            <option value="Liquid Damage Service">Liquid Damage Service</option>
                            <option value="Data Transfer / Backup">Data Transfer / Backup</option>
                            <option value="Carrier Activation">Carrier Activation</option>
                            <option value="Other">Other / Not Sure</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="notes" class="form-label text-secondary small">Notes / Symptoms (Optional)</label>
                        <textarea class="form-control text-white border-white border-opacity-10" id="notes" name="notes" rows="3" placeholder="Tell us what happened..." style="background-color: hsl(var(--card));"></textarea>
                    </div>
                    <button type="submit" class="btn btn-bugs-primary w-100 py-3 rounded-pill fw-semibold text-dark">Submit Quote Request</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
