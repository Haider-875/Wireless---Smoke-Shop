@extends('layouts.app')

@section('title', 'Order ' . $order->order_number . ' — Bugs Wireless & Smoke Shop')

@section('content')
<div class="container-fluid px-3 px-lg-5 py-5" style="max-width: 900px;">
    <!-- Success Banner -->
    <div class="text-center mb-5">
        <div class="d-inline-flex align-items-center justify-content-center rounded-circle border mb-3" style="width: 70px; height: 70px; border-color: var(--bugs-border-gold) !important; color: var(--bugs-primary); background-color: var(--bugs-card);">
            <i class="bi bi-check-lg fs-1"></i>
        </div>
        <p class="eyebrow mb-1" style="color: var(--bugs-primary) !important;">Order Confirmed</p>
        <h1 class="display-6 fw-bold text-white mb-2">Thank you, {{ $order->customer_name }}!</h1>
        <p class="text-secondary">We've received your order and our counter team is preparing it now.</p>
        <div class="d-inline-block px-3 py-1 rounded-pill border" style="border-color: var(--bugs-border) !important; background-color: var(--bugs-card);">
            <span class="small text-secondary">Order Number: </span>
            <span class="num fw-bold" style="color: var(--bugs-primary) !important;">{{ $order->order_number }}</span>
        </div>
    </div>

    <!-- Order Details Box -->
    <div class="p-4 p-md-5 rounded-4 border mb-4" style="background-color: var(--bugs-card); border-color: var(--bugs-border) !important;">
        <div class="row g-4 border-bottom pb-4 mb-4" style="border-color: var(--bugs-border) !important;">
            <div class="col-sm-6">
                <p class="eyebrow text-secondary mb-1" style="font-size: 0.65rem;">Fulfillment Method</p>
                <p class="text-white fw-medium mb-0">
                    @if($order->fulfillment_type === 'pickup')
                        <i class="bi bi-shop me-1" style="color: var(--bugs-primary) !important;"></i> Store Pickup (10010 Halls Ferry Rd)
                    @elseif($order->fulfillment_type === 'delivery')
                        <i class="bi bi-truck me-1" style="color: var(--bugs-primary) !important;"></i> Local Delivery
                    @else
                        <i class="bi bi-box-seam me-1" style="color: var(--bugs-primary) !important;"></i> Standard Shipping
                    @endif
                </p>
                @if($order->delivery_address)
                    <p class="text-secondary small mt-1 mb-0">{{ $order->delivery_address }}</p>
                @endif
            </div>
            <div class="col-sm-6 text-sm-end">
                <p class="eyebrow text-secondary mb-1" style="font-size: 0.65rem;">Order Status</p>
                <span class="badge rounded-pill bg-warning bg-opacity-25 text-warning border border-warning px-3 py-1 small fw-semibold">
                    {{ strtoupper($order->status) }}
                </span>
                <p class="text-secondary small mt-1 mb-0">{{ $order->created_at->format('M d, Y · g:i A') }}</p>
            </div>
        </div>

        <!-- Items -->
        <h5 class="text-white fw-semibold mb-3">Items Ordered</h5>
        <div class="d-flex flex-column gap-3 border-bottom pb-4 mb-4" style="border-color: var(--bugs-border) !important;">
            @foreach($order->items as $item)
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-3 overflow-hidden border" style="width: 44px; height: 44px; border-color: var(--bugs-border) !important; background-color: #0d0d0f;">
                            @if($item->product)
                                <img src="{{ $item->product->image_url }}" alt="{{ $item->product_name }}" class="w-100 h-100 object-fit-cover">
                            @else
                                <i class="bi bi-box text-secondary fs-5 d-flex align-items-center justify-content-center h-100"></i>
                            @endif
                        </div>
                        <div>
                            <span class="text-white small fw-medium d-block">{{ $item->product_name }}</span>
                            <span class="text-secondary small">${{ number_format($item->price, 2) }} × {{ $item->quantity }}</span>
                        </div>
                    </div>
                    <span class="num text-white fw-semibold small">${{ number_format($item->total, 2) }}</span>
                </div>
            @endforeach
        </div>

        <!-- Totals -->
        <div class="d-flex flex-column gap-2 mb-4">
            <div class="d-flex justify-content-between small text-secondary">
                <span>Subtotal</span>
                <span class="num text-white">${{ number_format($order->subtotal, 2) }}</span>
            </div>
            <div class="d-flex justify-content-between small text-secondary">
                <span>Tax (8.61%)</span>
                <span class="num text-white">${{ number_format($order->tax, 2) }}</span>
            </div>
            @if($order->delivery_fee > 0)
                <div class="d-flex justify-content-between small text-secondary">
                    <span>Delivery / Shipping</span>
                    <span class="num text-white">${{ number_format($order->delivery_fee, 2) }}</span>
                </div>
            @endif
            <div class="d-flex justify-content-between border-top pt-2 mt-1">
                <span class="fs-5 text-white fw-bold">Total</span>
                <span class="num fs-4 fw-bold" style="color: var(--bugs-primary)">${{ number_format($order->total, 2) }}</span>
            </div>
        </div>

        <!-- Instructions -->
        <div class="p-3 rounded-3" style="background-color: var(--bugs-card-alt); border: 1px solid var(--bugs-border);">
            <h6 class="text-white fw-semibold mb-1"><i class="bi bi-info-circle me-1" style="color: var(--bugs-primary) !important;"></i> Pickup &amp; Age Check Reminder</h6>
            <p class="text-secondary small mb-0">
                Please have your order number <strong>{{ $order->order_number }}</strong> and a valid government photo ID ready. We card everyone at pickup to comply with Missouri state age requirements for smoke and vape products.
            </p>
        </div>
    </div>

    <div class="text-center d-flex justify-content-center gap-3">
        <a href="{{ route('shop.index') }}" class="btn btn-bugs-primary px-4 py-2">
            Continue Shopping
        </a>
        <a href="tel:+13144412851" class="btn btn-bugs-outline px-4 py-2">
            <i class="bi bi-telephone me-1"></i> Call Store (314-441-2851)
        </a>
    </div>
</div>
@endsection

