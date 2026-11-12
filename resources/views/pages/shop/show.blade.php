@extends('layouts.app')

@section('title', $product->name . ' — Bugs Wireless & Smoke Shop')

@section('content')
<div class="container-fluid px-3 px-lg-5 py-4 py-lg-5" style="max-width: 1300px;">
    <!-- Breadcrumb / Back Link -->
    <div class="mb-4">
        <a href="{{ route('shop.index', ['category' => $product->category?->slug]) }}" class="text-secondary text-decoration-none small d-inline-flex align-items-center gap-1 hover-white">
            <i class="bi bi-arrow-left"></i> Back to {{ $product->category?->name ?? 'Shop' }}
        </a>
    </div>

    <!-- Product Details Section -->
    <div class="row g-4 g-lg-5 align-items-start">
        <!-- Product Realistic Image -->
        <div class="col-lg-6">
            <div class="rounded-4 overflow-hidden border position-relative ratio ratio-1x1" style="background-color: var(--bugs-card); border-color: var(--bugs-border) !important;">
                <img src="{{ $product->image_url }}" 
                     alt="{{ $product->name }}" 
                     class="w-100 h-100 object-fit-cover">
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

            <h1 class="display-6 fw-semibold text-white mb-3 leading-tight">
                {{ $product->name }}
            </h1>

            <div class="d-flex align-items-baseline gap-3 mb-4">
                <span class="num fs-3 fw-bold" style="color: var(--bugs-primary)">
                    {{ $product->formatted_price }}
                </span>
                @if($product->formatted_compare_at_price)
                    <span class="num text-secondary fs-5 text-decoration-line-through">
                        {{ $product->formatted_compare_at_price }}
                    </span>
                @endif
            </div>

            <p class="text-secondary leading-relaxed mb-4">
                {{ $product->description }}
            </p>

            <!-- Quantity & Add to Cart Controls -->
            <div class="d-flex align-items-center gap-3 mb-4 pb-2">
                <div class="d-flex align-items-center border rounded-pill px-3 py-2" style="border-color: rgba(255,255,255,0.2) !important;">
                    <button type="button" class="btn btn-sm text-secondary p-0 border-0" onclick="const el = document.getElementById('productQuantityInput'); el.value = Math.max(1, parseInt(el.value, 10) - 1);">
                        <i class="bi bi-dash fs-5"></i>
                    </button>
                    <input type="number" id="productQuantityInput" value="1" min="1" max="50" class="form-control form-control-sm bg-transparent border-0 text-white text-center num fw-bold" style="width: 50px;">
                    <button type="button" class="btn btn-sm text-secondary p-0 border-0" onclick="const el = document.getElementById('productQuantityInput'); el.value = Math.min(50, parseInt(el.value, 10) + 1);">
                        <i class="bi bi-plus fs-5"></i>
                    </button>
                </div>

                <button type="button" 
                        class="btn btn-bugs-primary flex-grow-1 py-3 gap-2" 
                        data-add-to-cart="{{ $product->id }}">
                    <i class="bi bi-bag-plus"></i> Add to Bag
                </button>
            </div>

            <!-- Compliance & Store Guarantee List -->
            <div class="border-top pt-4 mt-2" style="border-color: var(--bugs-border) !important;">
                <ul class="list-unstyled d-flex flex-column gap-3 small text-secondary mb-0">
                    <li class="d-flex align-items-start gap-2">
                        <i class="bi bi-shield-check fs-5 mt-n1" style="color: var(--bugs-primary) !important;"></i>
                        <span><strong>21+ Age Verification Required</strong> — Valid government photo ID strictly checked upon collection or delivery.</span>
                    </li>
                    <li class="d-flex align-items-start gap-2">
                        <i class="bi bi-truck fs-5 mt-n1" style="color: var(--bugs-primary) !important;"></i>
                        <span><strong>Same-Day Counter Pickup &amp; Local Delivery</strong> — Free local delivery on orders over $50.</span>
                    </li>
                    <li class="d-flex align-items-start gap-2">
                        <i class="bi bi-shop fs-5 mt-n1" style="color: var(--bugs-primary) !important;"></i>
                        <span><strong>Straight from the Counter</strong> — Have questions? Call the shop at <a href="tel:+13144412851" class="text-white">314-441-2851</a>.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Related Products -->
    @if($relatedProducts->count() > 0)
        <div class="mt-5 pt-5 border-top" style="border-color: var(--bugs-border) !important;">
            <div class="d-flex justify-content-between align-items-baseline mb-4">
                <h2 class="fs-4 fw-semibold text-white mb-0">
                    More in <span class="font-serif-display">{{ $product->category?->name ?? 'Shop' }}</span>
                </h2>
                <a href="{{ route('shop.index', ['category' => $product->category?->slug]) }}" class="text-secondary text-decoration-none small hover-white">
                    See all <i class="bi bi-arrow-right"></i>
                </a>
            </div>
            <div class="row g-3 g-md-4">
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
