@extends('layouts.app')

@section('title', 'Terms and Conditions — BUGS Wireless & Smoke Shop')
@section('meta_description', 'Terms and conditions for in-store purchases, device repairs, and online orders at BUGS Wireless & Smoke Shop.')

@section('content')
<section class="py-5" style="background-color: var(--bugs-bg);">
    <div class="container px-3 px-lg-5 py-4" style="max-width: 900px;">
        <div class="mb-4">
            <span class="eyebrow" style="color: var(--bugs-primary);">Terms of Service</span>
            <h1 class="heading-2 text-white mt-2 mb-3">Terms and Conditions</h1>
            <p class="body-3 text-secondary">Effective date: November 2026</p>
        </div>

        <div class="bugs-card p-4 p-md-5 mb-4">
            <h2 class="title-1 text-white mb-3">1. Age Requirement &amp; Eligibility</h2>
            <p class="body-3 text-secondary mb-4">
                You must be at least 21 years of age to purchase any vapor products, electronic cigarettes, e-liquids, glass pipes, or hookah products from BUGS Wireless &amp; Smoke Shop. By entering our store or placing an order through this website, you certify that you meet this legal age threshold. Photo ID verification is strictly enforced.
            </p>

            <h2 class="title-1 text-white mb-3">2. Phone Repair Services &amp; Estimates</h2>
            <p class="body-3 text-secondary mb-4">
                All device diagnostics are provided free of charge before any work begins. Repair quotes are based on device model, damage extent, and part availability. While our technicians take utmost care, customers are advised to back up personal device data prior to repair service.
            </p>

            <h2 class="title-1 text-white mb-3">3. Store Pickup &amp; Local Delivery</h2>
            <p class="body-3 text-secondary mb-4">
                Orders placed for counter pickup will be held at 10010 Halls Ferry Rd during regular business hours (10:00 AM – 8:00 PM daily). Local delivery is available for eligible addresses in the St. Louis metropolitan area. The recipient must present valid photo identification matching the order upon delivery.
            </p>

            <h2 class="title-1 text-white mb-3">4. Limitation of Liability</h2>
            <p class="body-3 text-secondary mb-0">
                BUGS Wireless &amp; Smoke Shop provides services and goods under standard Missouri commercial warranties. For questions or disputes, visit our customer counter or call <strong>314-441-2851</strong>.
            </p>
        </div>

        <div class="text-center pt-2">
            <a href="{{ route('home') }}" class="btn btn-bugs-outline">
                &larr; Return to Home
            </a>
        </div>
    </div>
</section>
@endsection

