@extends('layouts.app')

@section('title', 'Track Your Order — Bugs Wireless & Smoke Shop')

@section('content')
<div class="container-fluid px-3 px-lg-5 py-5" style="max-width: 800px;">
    <div class="text-center mb-4">
        <p class="eyebrow text-primary mb-1">Customer Service</p>
        <h1 class="display-6 fw-bold text-white mb-2">Track Your Order</h1>
        <p class="text-secondary small">Enter your BUGS order number and contact email or phone to check live fulfillment status.</p>
    </div>

    <!-- Lookup Form -->
    <div class="p-4 p-md-5 rounded-4 border mb-5" style="background-color: var(--bugs-card); border-color: var(--bugs-border) !important;">
        <form action="{{ route('orders.lookup') }}" method="GET">
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="order_number" class="form-label text-secondary small">Order Number *</label>
                    <input type="text" 
                           name="order_number" 
                           id="order_number" 
                           value="{{ request('order_number') }}" 
                           required 
                           class="form-control bg-dark text-white border-secondary" 
                           placeholder="e.g. BUGS-XXXXXX">
                </div>
                <div class="col-md-6">
                    <label for="contact" class="form-label text-secondary small">Email or Mobile Phone (Optional)</label>
                    <input type="text" 
                           name="contact" 
                           id="contact" 
                           value="{{ request('contact') }}" 
                           class="form-control bg-dark text-white border-secondary" 
                           placeholder="e.g. name@example.com or 314-555-0199">
                </div>
                <div class="col-12 mt-4">
                    <button type="submit" class="btn btn-bugs-primary w-100 py-3">
                        <i class="bi bi-search me-1"></i> Look Up Order
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Result -->
    @if($searched)
        @if($order)
            <div class="p-4 rounded-4 border" style="background-color: var(--bugs-card); border-color: var(--bugs-border-gold) !important;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <span class="eyebrow text-primary d-block">Order Found</span>
                        <h4 class="text-white fw-bold mb-0">{{ $order->order_number }}</h4>
                    </div>
                    <span class="badge rounded-pill bg-warning bg-opacity-25 text-warning border border-warning px-3 py-1">
                        {{ strtoupper($order->status) }}
                    </span>
                </div>

                <div class="row g-3 small text-secondary border-top pt-3" style="border-color: var(--bugs-border) !important;">
                    <div class="col-sm-6">
                        <p class="mb-1"><strong>Customer:</strong> {{ $order->customer_name }}</p>
                        <p class="mb-1"><strong>Placed:</strong> {{ $order->created_at->format('M d, Y · g:i A') }}</p>
                    </div>
                    <div class="col-sm-6 text-sm-end">
                        <p class="mb-1"><strong>Method:</strong> {{ ucfirst($order->fulfillment_type) }}</p>
                        <p class="mb-1"><strong>Total:</strong> <span class="num text-primary fw-bold">{{ $order->formatted_total }}</span></p>
                    </div>
                </div>

                <div class="mt-4 pt-2 text-center">
                    <a href="{{ route('orders.show', $order->order_number) }}" class="btn btn-bugs-outline btn-bugs-pill-sm px-4">
                        View Full Order Receipt &amp; Details <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        @else
            <div class="text-center py-4 p-4 rounded-4 border" style="background-color: var(--bugs-card); border-color: var(--bugs-border) !important;">
                <i class="bi bi-question-circle text-secondary fs-1 d-block mb-2"></i>
                <h5 class="text-white">No order matching that number was found</h5>
                <p class="text-secondary small mb-0">Please double check your order number or contact the store at <strong>314-441-2851</strong> for live counter assistance.</p>
            </div>
        @endif
    @endif
</div>
@endsection
