@extends('layouts.app')

@section('title', 'Policies & Terms — BUGS Wireless & Smoke Shop')
@section('meta_description', 'Plain answers to the questions we get at the counter most: pickup, delivery, returns, 21+ age verification policy, and privacy.')

@section('content')
<div class="py-5" style="background-color: hsl(var(--background));">
    <div class="container px-4 px-lg-5 py-4" style="max-width: 900px;">
        <p class="eyebrow text-gold mb-2">The fine print</p>
        <h1 class="display-5 fw-semibold text-white tracking-tight mb-4" style="line-height: 1.15; letter-spacing: -0.025em;">
            Pickup, returns<span class="font-serif-display text-gold"> &amp; the rules</span>.
        </h1>
        <p class="text-secondary mb-5" style="max-width: 600px; font-size: 15px; line-height: 1.6;">
            Plain answers to the questions we get at the counter most. Anything unclear, call <a href="tel:+13144412851" class="text-gold text-decoration-none">314-441-2851</a>.
        </p>

        <div class="d-flex flex-column gap-5">
            <!-- 1. Shipping & Pickup -->
            <section id="shipping" class="scroll-mt-32">
                <h2 class="fs-4 fw-semibold text-white mb-3">Pickup, delivery &amp; shipping</h2>
                <div class="d-flex flex-column gap-3">
                    <p class="text-secondary mb-0" style="font-size: 14px; line-height: 1.6;">
                        Pickup is free and ready in about an hour during opening hours (10:00 AM – 8:00 PM daily). Bring your ID and your order code.
                    </p>
                    <p class="text-secondary mb-0" style="font-size: 14px; line-height: 1.6;">
                        Local delivery runs same day within St. Louis. It's $5, and free on orders over $50. We'll call to confirm a window before we head out.
                    </p>
                    <p class="text-secondary mb-0" style="font-size: 14px; line-height: 1.6;">
                        Shipping is a flat $8 and available on phone accessories, glass and hookah parts. Nicotine products are pickup or local delivery only — we won't ship them.
                    </p>
                </div>
            </section>

            <!-- 2. Returns -->
            <section id="returns" class="scroll-mt-32">
                <h2 class="fs-4 fw-semibold text-white mb-3">Returns</h2>
                <div class="d-flex flex-column gap-3">
                    <p class="text-secondary mb-0" style="font-size: 14px; line-height: 1.6;">
                        Unopened items can come back within 14 days with your receipt for a refund or exchange.
                    </p>
                    <p class="text-secondary mb-0" style="font-size: 14px; line-height: 1.6;">
                        For safety and legal reasons we can't accept opened nicotine products, e-liquids, or used glass and smoking accessories.
                    </p>
                    <p class="text-secondary mb-0" style="font-size: 14px; line-height: 1.6;">
                        Phone accessories we install — screen protectors, cases — are covered instead by their fitting guarantee: if it lifts or bubbles, bring it back and we'll redo it.
                    </p>
                </div>
            </section>

            <!-- 3. Age Policy -->
            <section id="age" class="scroll-mt-32">
                <h2 class="fs-4 fw-semibold text-white mb-3">21+ age policy</h2>
                <div class="d-flex flex-column gap-3">
                    <p class="text-secondary mb-0" style="font-size: 14px; line-height: 1.6;">
                        You must be 21 or older to buy nicotine or smoking products, and we check a valid government ID on every pickup and delivery — no exceptions, no matter how old you look.
                    </p>
                    <p class="text-secondary mb-0" style="font-size: 14px; line-height: 1.6;">
                        Online orders containing age-restricted items can only be collected in store or handed over on delivery with ID. If you can't show ID we'll cancel the age-restricted part of the order and refund it.
                    </p>
                    <p class="text-secondary mb-0" style="font-size: 14px; line-height: 1.6;">
                        Nicotine is addictive. Products on this site are not intended for use by anyone under 21, by pregnant or nursing women, or by anyone with a heart condition.
                    </p>
                </div>
            </section>

            <!-- 4. Privacy -->
            <section id="privacy" class="scroll-mt-32">
                <h2 class="fs-4 fw-semibold text-white mb-3">Your details</h2>
                <div class="d-flex flex-column gap-3">
                    <p class="text-secondary mb-0" style="font-size: 14px; line-height: 1.6;">
                        We collect only what we need to fill your order: your name, contact details and delivery address. We don't sell or rent customer information.
                    </p>
                    <p class="text-secondary mb-0" style="font-size: 14px; line-height: 1.6;">
                        Order details stay with us until you ask us to delete them. Ask at the counter or call the shop and we'll sort it out.
                    </p>
                </div>
            </section>
        </div>

        <!-- Visit Info Box -->
        <div class="mt-5 p-4 rounded-4 border border-white border-opacity-10" style="background-color: hsl(var(--card));">
            <p class="eyebrow text-secondary mb-2" style="font-size: 0.75rem;">Visit</p>
            <p class="text-white mb-1" style="font-size: 15px;">10010 Halls Ferry Rd, St. Louis, MO 63136</p>
            <p class="text-secondary mb-0" style="font-size: 13px;">Mon – Sun · 10:00 AM – 8:00 PM</p>
        </div>
    </div>
</div>
@endsection

