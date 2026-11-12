@extends('layouts.app')

@section('title', 'Phone & Tablet Repair — Bugs Wireless & Smoke Shop, St. Louis')

@section('content')
<!-- Flash Messages -->
@if(session('success'))
<div class="container-fluid px-3 px-lg-5 pt-3" style="max-width: 1280px;">
    <div class="alert alert-success alert-dismissible fade show border-0 text-white" style="background-color: #198754;" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

<!-- Hero Section with Ambient Gold Glow -->
<section class="position-relative overflow-hidden border-bottom py-5 py-lg-5" style="border-color: var(--bugs-border) !important;">
    <div class="glow-gold" style="top: 0; right: -120px; width: 460px; height: 460px;"></div>
    <div class="container-fluid px-3 px-lg-5 py-4 py-lg-5" style="max-width: 1280px;">
        <div class="row">
            <div class="col-lg-10 col-xl-9">
                <p class="eyebrow mb-3" style="color: var(--bugs-primary)">The repair bench</p>
                <h1 class="bugs-hero-title text-white">
                    We fix all phones<br>
                    <span class="font-serif-display">while you wait</span>.
                </h1>
                <p class="text-secondary fs-5 mt-4 leading-relaxed" style="max-width: 580px; font-size: 1.05rem !important;">
                    iPhone, Samsung, Pixel, Motorola, tablets — if it has a screen and a battery, it's been across our bench. Honest quotes, no appointment, and most repairs finished the same day.
                </p>
                <div class="d-flex flex-wrap align-items-center gap-3 mt-4 pt-2">
                    <a href="tel:+13144412851" class="btn btn-bugs-primary gap-2">
                        <i class="bi bi-telephone-fill"></i> Call 314-441-2851
                    </a>
                    <button type="button" class="btn btn-bugs-primary gap-2" data-bs-toggle="modal" data-bs-target="#repairQuoteModal" style="background-color: var(--bugs-card); border: 1px solid var(--bugs-primary); color: var(--bugs-primary);">
                        <i class="bi bi-chat-left-dots"></i> Request a Quote
                    </button>
                    <a href="https://www.google.com/maps/search/?api=1&query=Bugs+Wireless+%26+Smoke+Shop+10010+Halls+Ferry+Rd+St+Louis+MO+63136" target="_blank" rel="noreferrer" class="btn btn-bugs-outline gap-2">
                        Walk in — 10010 Halls Ferry Rd, St. Louis, MO 63136
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- "What we fix" 6 Service Cards Grid -->
<section class="py-5 py-lg-5">
    <div class="container-fluid px-3 px-lg-5 py-4" style="max-width: 1280px;">
        <h2 class="bugs-section-title text-white mb-4 pb-2">
            What we <span class="font-serif-display">fix</span>
        </h2>
        <div class="row g-4">
            @foreach($services as $service)
                <div class="col-md-6 col-lg-4">
                    <article class="bugs-service-card h-100 d-flex flex-column">
                        <span class="bugs-icon-badge">
                            <i class="bi {{ $service['icon'] }} fs-5"></i>
                        </span>
                        <h3 class="fs-6 fw-medium text-white mt-4 pt-1 mb-2">{{ $service['title'] }}</h3>
                        <p class="text-secondary small leading-relaxed mb-0">{{ $service['body'] }}</p>
                    </article>
                </div>
            @endforeach
        </div>
        <p class="text-secondary small mt-4 pt-2 mb-0" style="font-size: 0.78rem;">
            Prices depend on your model and the part — you'll always get the number before we start.
        </p>
    </div>
</section>

<!-- 3-Step Process Section -->
<section class="border-top py-5 py-lg-5" style="background-color: var(--bugs-card-alt); border-color: var(--bugs-border) !important;">
    <div class="container-fluid px-3 px-lg-5 py-4" style="max-width: 1280px;">
        <div class="row g-4 g-lg-5">
            @foreach($steps as $step)
                <div class="col-lg-4">
                    <div class="bugs-step-card p-4 rounded-4 h-100 border">
                        <span class="bugs-step-num d-inline-flex align-items-center justify-content-center mb-3">{{ $step['number'] }}</span>
                        <h3 class="fs-5 fw-medium text-white mb-2">{{ $step['title'] }}</h3>
                        <p class="text-secondary small leading-relaxed mb-0">{{ $step['body'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Call-to-Action Shop Counter Banner -->
<section class="py-5 py-lg-5">
    <div class="container-fluid px-3 px-lg-5 py-4" style="max-width: 1280px;">
        <div class="bugs-cta-card d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-4">
            <div>
                <p class="eyebrow mb-2" style="color: var(--bugs-primary)">Open Mon – Sun · 10:00 AM – 8:00 PM</p>
                <h2 class="fs-2 fw-semibold text-white mb-2">Bring it by the counter.</h2>
                <p class="text-secondary small mb-0 d-flex align-items-center gap-2">
                    <i class="bi bi-clock"></i> Free diagnosis · no appointment needed
                </p>
            </div>
            <div class="flex-shrink-0 d-flex flex-wrap gap-2">
                <button type="button" class="btn btn-bugs-outline px-4 py-3" data-bs-toggle="modal" data-bs-target="#repairQuoteModal">
                    Get Free Quote
                </button>
                <a href="tel:+13144412851" class="btn btn-bugs-primary px-4 py-3">
                    Call the shop
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Repair Quote Inquiry Modal -->
<div class="modal fade" id="repairQuoteModal" tabindex="-1" aria-labelledby="repairQuoteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bugs-modal-content p-4">
            <div class="modal-header border-0 pb-0">
                <div>
                    <h5 class="modal-title text-white fw-bold" id="repairQuoteModalLabel">Request a Repair Quote</h5>
                    <p class="eyebrow text-secondary mb-0">Free diagnosis · Same-day turnaround</p>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-4">
                <form action="{{ route('repairs.quote') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label text-secondary small">Your Name</label>
                        <input type="text" class="form-control bg-dark text-white border-secondary" id="name" name="name" required placeholder="e.g. Alex Johnson">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label text-secondary small">Phone Number</label>
                        <input type="tel" class="form-control bg-dark text-white border-secondary" id="phone" name="phone" required placeholder="e.g. 314-555-0199">
                    </div>
                    <div class="mb-3">
                        <label for="device_model" class="form-label text-secondary small">Device Model</label>
                        <input type="text" class="form-control bg-dark text-white border-secondary" id="device_model" name="device_model" required placeholder="e.g. iPhone 14 Pro / Samsung S23">
                    </div>
                    <div class="mb-3">
                        <label for="service_needed" class="form-label text-secondary small">Service Needed</label>
                        <select class="form-select bg-dark text-white border-secondary" id="service_needed" name="service_needed" required>
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
                        <textarea class="form-control bg-dark text-white border-secondary" id="notes" name="notes" rows="3" placeholder="Tell us what happened..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-bugs-primary w-100 py-3">Submit Quote Request</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
