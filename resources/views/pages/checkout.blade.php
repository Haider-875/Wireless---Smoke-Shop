@extends('layouts.app')

@section('title', 'Checkout — Bugs Wireless & Smoke Shop')

@section('content')
<div class="container-fluid px-3 px-lg-5 py-4 py-lg-5" style="max-width: 1300px;">
    <!-- Header -->
    <div class="mb-4">
        <a href="{{ route('shop.index') }}" class="text-secondary text-decoration-none small d-inline-flex align-items-center gap-1 hover-white">
            <i class="bi bi-arrow-left"></i> Continue Shopping
        </a>
        <h1 class="display-6 fw-semibold text-white mt-2 mb-1">Checkout</h1>
        <p class="text-secondary small mb-0">Review your bag, select collection or delivery, and complete your order.</p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger border-0 text-white p-3 mb-4" style="background-color: #dc3545;" role="alert">
            <h6 class="fw-bold mb-1"><i class="bi bi-exclamation-triangle-fill me-1"></i> Please check the required fields:</h6>
            <ul class="mb-0 small ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row g-4 g-lg-5">
        <!-- Left: Form -->
        <div class="col-lg-7">
            <form action="{{ route('checkout.store') }}" method="POST" id="checkoutForm">
                @csrf

                <!-- Fulfillment Selection -->
                <div class="p-4 rounded-4 border mb-4" style="background-color: var(--bugs-card); border-color: var(--bugs-border) !important;">
                    <p class="eyebrow text-primary mb-2">Step 1 · Fulfillment</p>
                    <h5 class="text-white fw-semibold mb-3">How would you like to receive your order?</h5>

                    <div class="d-flex flex-column gap-3">
                        <label class="d-flex align-items-center justify-content-between p-3 rounded-3 border cursor-pointer" style="border-color: rgba(255,255,255,0.15) !important;">
                            <div class="d-flex align-items-center gap-3">
                                <input type="radio" name="fulfillment_type" value="pickup" checked class="form-check-input mt-0" onchange="toggleDeliveryAddress(false)">
                                <div>
                                    <span class="text-white fw-medium d-block">Pick up in store</span>
                                    <span class="text-secondary small">Ready in about an hour · 10010 Halls Ferry Rd</span>
                                </div>
                            </div>
                            <span class="num text-primary fw-medium small">FREE</span>
                        </label>

                        <label class="d-flex align-items-center justify-content-between p-3 rounded-3 border cursor-pointer" style="border-color: rgba(255,255,255,0.15) !important;">
                            <div class="d-flex align-items-center gap-3">
                                <input type="radio" name="fulfillment_type" value="delivery" class="form-check-input mt-0" onchange="toggleDeliveryAddress(true)">
                                <div>
                                    <span class="text-white fw-medium d-block">Local delivery</span>
                                    <span class="text-secondary small">Same day within St. Louis · Free on orders $50+</span>
                                </div>
                            </div>
                            <span class="num text-primary fw-medium small">{{ $subtotal >= 50 ? 'FREE' : '$4.99' }}</span>
                        </label>

                        <label class="d-flex align-items-center justify-content-between p-3 rounded-3 border cursor-pointer" style="border-color: rgba(255,255,255,0.15) !important;">
                            <div class="d-flex align-items-center gap-3">
                                <input type="radio" name="fulfillment_type" value="shipping" class="form-check-input mt-0" onchange="toggleDeliveryAddress(true)">
                                <div>
                                    <span class="text-white fw-medium d-block">Ship it</span>
                                    <span class="text-secondary small">Non-restricted accessories only, 2–4 business days</span>
                                </div>
                            </div>
                            <span class="num text-primary fw-medium small">$5.99</span>
                        </label>
                    </div>
                </div>

                <!-- Customer Contact Details -->
                <div class="p-4 rounded-4 border mb-4" style="background-color: var(--bugs-card); border-color: var(--bugs-border) !important;">
                    <p class="eyebrow text-primary mb-2">Step 2 · Contact Information</p>
                    <h5 class="text-white fw-semibold mb-3">Your Details</h5>

                    <div class="row g-3">
                        <div class="col-12">
                            <label for="customer_name" class="form-label text-secondary small">Full Name (as on ID) *</label>
                            <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name') }}" required class="form-control bg-dark text-white border-secondary" placeholder="e.g. Michael Smith">
                        </div>
                        <div class="col-md-6">
                            <label for="customer_email" class="form-label text-secondary small">Email Address *</label>
                            <input type="email" name="customer_email" id="customer_email" value="{{ old('customer_email') }}" required class="form-control bg-dark text-white border-secondary" placeholder="name@example.com">
                        </div>
                        <div class="col-md-6">
                            <label for="customer_phone" class="form-label text-secondary small">Mobile Phone (for order updates) *</label>
                            <input type="tel" name="customer_phone" id="customer_phone" value="{{ old('customer_phone') }}" required class="form-control bg-dark text-white border-secondary" placeholder="314-555-0199">
                        </div>
                    </div>

                    <!-- Delivery Address Box (Toggled) -->
                    <div id="deliveryAddressSection" class="mt-3 d-none">
                        <label for="delivery_address" class="form-label text-secondary small">Delivery / Shipping Street Address *</label>
                        <textarea name="delivery_address" id="delivery_address" rows="2" class="form-control bg-dark text-white border-secondary" placeholder="Street address, apartment/suite, city, state, zip">{{ old('delivery_address') }}</textarea>
                    </div>

                    <div class="mt-3">
                        <label for="notes" class="form-label text-secondary small">Order Notes / Instructions (Optional)</label>
                        <input type="text" name="notes" id="notes" value="{{ old('notes') }}" class="form-control bg-dark text-white border-secondary" placeholder="Any special requests or instructions">
                    </div>
                </div>

                <!-- Payment & Age Terms -->
                <div class="p-4 rounded-4 border mb-4" style="background-color: var(--bugs-card); border-color: var(--bugs-border) !important;">
                    <p class="eyebrow text-primary mb-2">Step 3 · Payment &amp; Compliance</p>
                    <h5 class="text-white fw-semibold mb-2">Payment Terms</h5>
                    <p class="text-secondary small leading-relaxed mb-3">
                        <i class="bi bi-info-circle text-primary me-1"></i>
                        <strong>Pay at Counter or Upon Delivery:</strong> In compliance with card processing rules for specialty smoke &amp; vape merchandise, payment is completed safely in person via Cash, Debit, or Credit Card when picking up or receiving your delivery.
                    </p>

                    <!-- Mandatory Age Checkbox -->
                    <div class="form-check p-3 rounded-3 border" style="background-color: #08080a; border-color: rgba(255,255,255,0.15) !important;">
                        <input class="form-check-input ms-0 me-2" type="checkbox" name="age_confirmed" id="age_confirmed" value="1" required>
                        <label class="form-check-label text-white small" for="age_confirmed">
                            <strong>I am 21 years of age or older.</strong> I understand that a valid government-issued photo ID is legally required upon pickup or delivery, and no age-restricted products will be released without verification.
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-bugs-primary w-100 py-3 fs-6">
                    <i class="bi bi-bag-check-fill me-2"></i> Place Order Now
                </button>
            </form>
        </div>

        <!-- Right: Order Summary -->
        <div class="col-lg-5">
            <div class="p-4 rounded-4 border sticky-top" style="top: 100px; background-color: var(--bugs-card); border-color: var(--bugs-border) !important;">
                <h5 class="text-white fw-semibold mb-3 border-bottom pb-3" style="border-color: var(--bugs-border) !important;">
                    Order Summary ({{ count($items) }} {{ count($items) === 1 ? 'item' : 'items' }})
                </h5>

                <!-- Items List -->
                <div class="d-flex flex-column gap-3 mb-4 pe-1 overflow-y-auto" style="max-height: 320px;">
                    @foreach($items as $item)
                        <div class="d-flex align-items-center gap-3 pb-2 border-bottom" style="border-color: rgba(255,255,255,0.06) !important;">
                            <div class="flex-shrink-0 rounded-3 overflow-hidden border" style="width: 50px; height: 50px; border-color: var(--bugs-border) !important; background-color: #0d0d0f;">
                                <img src="{{ $item['product']->image_url }}" alt="{{ $item['product']->name }}" class="w-100 h-100 object-fit-cover">
                            </div>
                            <div class="flex-grow-1 min-w-0">
                                <h6 class="text-white text-truncate mb-0 small">{{ $item['product']->name }}</h6>
                                <span class="text-secondary small">Qty: {{ $item['quantity'] }}</span>
                            </div>
                            <div class="num text-primary fw-medium small">
                                ${{ number_format($item['total'], 2) }}
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Price Breakdown -->
                <div class="d-flex flex-column gap-2 border-bottom pb-3 mb-3" style="border-color: var(--bugs-border) !important;">
                    <div class="d-flex justify-content-between small">
                        <span class="text-secondary">Subtotal</span>
                        <span class="num text-white">${{ number_format($subtotal, 2) }}</span>
                    </div>
                    <div class="d-flex justify-content-between small">
                        <span class="text-secondary">Estimated Tax (8.61% St. Louis)</span>
                        <span class="num text-white">${{ number_format($tax, 2) }}</span>
                    </div>
                    <div class="d-flex justify-content-between small">
                        <span class="text-secondary">Pickup in Store</span>
                        <span class="num text-primary">FREE</span>
                    </div>
                </div>

                <!-- Total -->
                <div class="d-flex justify-content-between align-items-baseline mb-4">
                    <span class="fs-5 text-white fw-bold">Total Due</span>
                    <span class="num fs-4 fw-bold" style="color: var(--bugs-primary)">
                        ${{ number_format($subtotal + $tax, 2) }}
                    </span>
                </div>

                <div class="p-3 rounded-3" style="background-color: var(--bugs-card-alt);">
                    <p class="eyebrow text-secondary mb-1" style="font-size: 0.65rem;">Pickup Location</p>
                    <p class="text-white small mb-1">10010 Halls Ferry Rd, St. Louis, MO 63136</p>
                    <p class="text-secondary small mb-0"><i class="bi bi-clock me-1"></i> Open Daily: 10:00 AM – 8:00 PM</p>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function toggleDeliveryAddress(show) {
    const el = document.getElementById('deliveryAddressSection');
    const input = document.getElementById('delivery_address');
    if (el) {
        if (show) {
            el.classList.remove('d-none');
            if (input) input.setAttribute('required', 'required');
        } else {
            el.classList.add('d-none');
            if (input) input.removeAttribute('required');
        }
    }
}
</script>
@endpush
@endsection

