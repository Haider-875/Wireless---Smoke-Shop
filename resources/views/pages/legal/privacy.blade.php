@extends('layouts.app')

@section('title', 'Privacy Policy — BUGS Wireless & Smoke Shop')
@section('meta_description', 'Privacy Policy and data practices for BUGS Wireless & Smoke Shop in St. Louis, MO.')

@section('content')
<section class="py-5" style="background-color: var(--bugs-bg);">
    <div class="container px-3 px-lg-5 py-4" style="max-width: 900px;">
        <div class="mb-4">
            <span class="eyebrow" style="color: var(--bugs-primary);">Legal Information</span>
            <h1 class="heading-2 text-white mt-2 mb-3">Privacy Policy</h1>
            <p class="body-3 text-secondary">Effective date: November 2026</p>
        </div>

        <div class="bugs-card p-4 p-md-5 mb-4">
            <h2 class="title-1 text-white mb-3">1. Information We Collect</h2>
            <p class="body-3 text-secondary mb-4">
                BUGS Wireless &amp; Smoke Shop collects personal information necessary to fulfill customer orders, manage repair inquiries, and comply with state and federal age verification laws for nicotine and adult smoking products. This may include your full name, email address, telephone number, delivery address, and date of birth for age confirmation.
            </p>

            <h2 class="title-1 text-white mb-3">2. 21+ Age Verification</h2>
            <p class="body-3 text-secondary mb-4">
                In strict compliance with federal and Missouri state regulations, age verification is mandatory for all transactions involving tobacco, vapor, or smoking accessories. We do not knowingly collect personal data from anyone under the age of 21. A valid government-issued photo ID is checked in person at our Halls Ferry location and upon local delivery.
            </p>

            <h2 class="title-1 text-white mb-3">3. How We Use Your Data</h2>
            <p class="body-3 text-secondary mb-4">
                Your contact details are used solely to send order status updates, provide phone repair diagnostics, confirm pickup readiness, and coordinate local deliveries. We never sell, rent, or trade your personal information to third parties.
            </p>

            <h2 class="title-1 text-white mb-3">4. Security &amp; Contact</h2>
            <p class="body-3 text-secondary mb-0">
                We implement industry standard encryption and security headers to protect your data. If you have any questions regarding your data privacy, contact our store desk at <strong>314-441-2851</strong> or visit us at <strong>10010 Halls Ferry Rd, St. Louis, MO 63136</strong>.
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

