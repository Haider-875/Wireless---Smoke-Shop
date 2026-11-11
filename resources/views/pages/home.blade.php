@extends('layouts.app')

@section('title', 'Bugs Wireless & Smoke Shop — Vapes, Glass & Phone Repair in St. Louis')

@section('content')
<!-- Storefront Hero -->
<section class="position-relative overflow-hidden border-bottom py-5 py-lg-5" style="border-color: var(--bugs-border) !important;">
    <div class="glow-gold" style="top: 0; right: -120px; width: 460px; height: 460px;"></div>
    <div class="container-fluid px-3 px-lg-5 py-4 py-lg-5" style="max-width: 1280px;">
        <div class="row">
            <div class="col-lg-10 col-xl-9">
                <p class="eyebrow mb-3" style="color: var(--bugs-primary)">10010 Halls Ferry Rd · St. Louis, MO</p>
                <h1 class="bugs-hero-title text-white">
                    Your smoke shop<br>
                    <span class="font-serif-display">&amp; phone doctor</span><br>
                    on Halls Ferry.
                </h1>
                <p class="text-secondary fs-5 mt-4 leading-relaxed" style="max-width: 580px; font-size: 1.05rem !important;">
                    Premium disposable vapes, e-liquids, heady glass, hookah essentials, and same-day phone &amp; tablet repairs. Everything under one roof in North County.
                </p>
                <div class="d-flex flex-wrap align-items-center gap-3 mt-4 pt-2">
                    <a href="{{ route('repairs') }}" class="btn btn-bugs-primary gap-2">
                        <i class="bi bi-tools"></i> Explore Repairs Bench
                    </a>
                    <a href="tel:+13144412851" class="btn btn-bugs-outline gap-2">
                        <i class="bi bi-telephone"></i> Call 314-441-2851
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Store Categories Quick Grid -->
<section class="py-5">
    <div class="container-fluid px-3 px-lg-5 py-4" style="max-width: 1280px;">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="bugs-service-card h-100">
                    <span class="bugs-icon-badge"><i class="bi bi-lightning-charge fs-5"></i></span>
                    <h3 class="fs-5 fw-medium text-white mt-4">Vapes &amp; E-Liquids</h3>
                    <p class="text-secondary small leading-relaxed mt-2 mb-0">Top disposable brands, pod systems, coils, and premium salt nicotine selections.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bugs-service-card h-100">
                    <span class="bugs-icon-badge"><i class="bi bi-fire fs-5"></i></span>
                    <h3 class="fs-5 fw-medium text-white mt-4">Glass &amp; Hookah</h3>
                    <p class="text-secondary small leading-relaxed mt-2 mb-0">Heady water pipes, hand pipes, rolling accessories, shisha flavors, and coals.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bugs-service-card h-100">
                    <span class="bugs-icon-badge"><i class="bi bi-phone fs-5"></i></span>
                    <h3 class="fs-5 fw-medium text-white mt-4">Phone Doctor</h3>
                    <p class="text-secondary small leading-relaxed mt-2 mb-0">Screen swaps, battery replacements, and carrier unlocks while you wait at the counter.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
