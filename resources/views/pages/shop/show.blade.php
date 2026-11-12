@extends('layouts.app')

@section('title', $product->name . ' — Bugs Wireless & Smoke Shop')

@section('content')
<div class="container-fluid px-3 px-sm-4 px-lg-5 py-4 py-lg-5" style="max-width: 1300px;">
    <!-- Breadcrumb / Back Link -->
    <div class="mb-3 mb-md-4">
        <a href="{{ route('shop.index', ['category' => $product->category?->slug]) }}" class="text-secondary text-decoration-none small d-inline-flex align-items-center gap-1 hover-white">
            <i class="bi bi-arrow-left"></i> Back to {{ $product->category?->name ?? 'Shop' }}
        </a>
    </div>

    <!-- Product Details Section -->
    <div class="row g-4 g-lg-5 align-items-start">
        <!-- Product Realistic Image -->
        <div class="col-lg-6">
            <div class="rounded-4 overflow-hidden border position-relative ratio ratio-1x1 bugs-card-surface" style="border-color: rgba(255, 255, 255, 0.08) !important;">
                <img src="{{ $product->image_url }}" 
                     alt="{{ $product->name }}" 
                     class="w-100 h-100 object-fit-cover bugs-card-img">
                <div class="bugs-card-img-gradient"></div>
            </div>
        </div>

        <!-- Product Purchase Information -->
        <div class="col-lg-6">
            <div class="d-flex align-items-center gap-2 mb-2">
                <span class="eyebrow text-secondary" style="font-size: 0.7rem;">
                    {{ $product->category?->name ?? 'Shop' }}
                </span>
                <span class="text-secondary">·</span>
                <span class="small text-secondary">In Stock ({{ $product->stock }} available)</span>
            </div>

            <h1 class="fw-semibold text-white mb-3 leading-tight" style="font-size: clamp(1.4rem, 4.5vw, 2.25rem); letter-spacing: -0.02em;">
                {{ $product->name }}
            </h1>

            <div class="d-flex align-items-baseline gap-3 mb-3 mb-md-4">
                <span class="num fw-bold" style="color: var(--bugs-primary); font-size: clamp(1.35rem, 4vw, 1.85rem);">
                    {{ $product->formatted_price }}
                </span>
                @if($product->formatted_compare_at_price)
                    <span class="num text-secondary text-decoration-line-through" style="font-size: clamp(1rem, 3vw, 1.25rem);">
                        {{ $product->formatted_compare_at_price }}
                    </span>
                @endif
            </div>

            <p class="text-secondary leading-relaxed mb-4" style="font-size: clamp(0.9rem, 2.5vw, 1rem);">
                {{ $product->description }}
            </p>

            <!-- Quantity & Add to Cart Controls (Fully Responsive across 360px+) -->
            <div class="d-flex flex-wrap flex-sm-nowrap align-items-center gap-2 gap-sm-3 mb-4 pb-2">
                <div class="d-flex align-items-center border rounded-pill px-3 py-2 flex-shrink-0" style="border-color: rgba(255,255,255,0.2) !important;">
                    <button type="button" class="btn btn-sm text-secondary p-0 border-0" aria-label="Decrease quantity" onclick="const el = document.getElementById('productQuantityInput'); el.value = Math.max(1, parseInt(el.value, 10) - 1);">
                        <i class="bi bi-dash fs-5"></i>
                    </button>
                    <input type="number" id="productQuantityInput" value="1" min="1" max="50" class="form-control form-control-sm bg-transparent border-0 text-white text-center num fw-bold" style="width: 44px;">
                    <button type="button" class="btn btn-sm text-secondary p-0 border-0" aria-label="Increase quantity" onclick="const el = document.getElementById('productQuantityInput'); el.value = Math.min(50, parseInt(el.value, 10) + 1);">
                        <i class="bi bi-plus fs-5"></i>
                    </button>
                </div>

                <button type="button" 
                        class="btn btn-bugs-primary flex-grow-1 py-3 gap-2" 
                        style="min-width: 170px;"
                        data-add-to-cart="{{ $product->id }}">
                    <i class="bi bi-bag-plus"></i> Add to Bag
                </button>
            </div>

            <!-- Compliance & Store Guarantee List (Luxury Guarantee Card) -->
            <div class="bugs-card-surface p-3 p-sm-4 rounded-4 mt-4">
                <ul class="list-unstyled d-flex flex-column gap-3 small text-secondary mb-0">
                    <li class="d-flex align-items-start gap-3">
                        <div class="bugs-icon-badge flex-shrink-0" style="width: 32px; height: 32px; font-size: 0.9rem;">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <div>
                            <span class="text-white fw-medium d-block mb-0.5">21+ Age Verification Required</span>
                            <span>Valid government photo ID strictly checked upon collection or delivery.</span>
                        </div>
                    </li>
                    <li class="d-flex align-items-start gap-3">
                        <div class="bugs-icon-badge flex-shrink-0" style="width: 32px; height: 32px; font-size: 0.9rem;">
                            <i class="bi bi-truck"></i>
                        </div>
                        <div>
                            <span class="text-white fw-medium d-block mb-0.5">Same-Day Counter Pickup &amp; Local Delivery</span>
                            <span>Free local delivery on orders over $50 within St. Louis.</span>
                        </div>
                    </li>
                    <li class="d-flex align-items-start gap-3">
                        <div class="bugs-icon-badge flex-shrink-0" style="width: 32px; height: 32px; font-size: 0.9rem;">
                            <i class="bi bi-shop"></i>
                        </div>
                        <div>
                            <span class="text-white fw-medium d-block mb-0.5">Straight from the Counter</span>
                            <span>Have questions? Call the shop directly at <a href="tel:+13144412851" class="text-primary text-decoration-none fw-medium">314-441-2851</a>.</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Related Products -->
    @if($relatedProducts->count() > 0)
        <div class="mt-5 pt-4 pt-md-5 border-top" style="border-color: var(--bugs-border) !important;">
            <div class="d-flex justify-content-between align-items-baseline mb-3 mb-md-4">
                <h2 class="fs-4 fw-semibold text-white mb-0">
                    More in <span class="font-serif-display">{{ $product->category?->name ?? 'Shop' }}</span>
                </h2>
                <a href="{{ route('shop.index', ['category' => $product->category?->slug]) }}" class="text-secondary text-decoration-none small hover-white">
                    See all <i class="bi bi-arrow-right"></i>
                </a>
            </div>
            <div class="row g-2 g-sm-3 g-md-4">
                @foreach($relatedProducts as $related)
                    <div class="col-6 col-md-3">
                        <x-product-card :product="$related" />
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
