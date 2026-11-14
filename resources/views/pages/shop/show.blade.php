@extends('layouts.app')

@section('title', $product->name . ' — BUGS Wireless & Smoke Shop')
@section('meta_description', $product->description)

@section('content')
<div class="container-fluid px-3 px-sm-4 px-lg-5 py-4 py-lg-5" style="max-width: 1300px;">
    <!-- Breadcrumb / Back Link -->
    <div class="mb-3 mb-md-4">
        <a href="{{ route('shop.index', ['category' => $product->category?->slug]) }}" class="text-secondary text-decoration-none small d-inline-flex align-items-center gap-1 hover-white">
            <i class="ph ph-arrow-left"></i> Back to {{ $product->category?->name ?? 'Shop' }}
        </a>
    </div>

    <!-- Product Details Section -->
    <div class="row g-4 g-lg-5 align-items-start">
        <!-- Product Realistic Image (Nested radius: 24px outer - 8px gap = 16px) -->
        <div class="col-lg-6">
            <div class="bugs-card-outer-24 p-2 overflow-hidden position-relative ratio ratio-1x1" style="background-color: var(--bugs-surface-2);">
                <img src="{{ $product->image_url }}" 
                     alt="{{ $product->name }}" 
                     class="w-100 h-100 object-fit-cover rounded-3 bugs-card-img">
            </div>
        </div>

        <!-- Product Purchase Information -->
        <div class="col-lg-6">
            <div class="d-flex align-items-center gap-2 mb-2">
                <span class="eyebrow" style="color: var(--bugs-primary); font-size: 11px;">
                    {{ $product->category?->name ?? 'Shop' }}
                </span>
                <span class="text-secondary">&bull;</span>
                <span class="caption-4 text-secondary">In Stock ({{ $product->stock }} available)</span>
            </div>

            <h1 class="heading-3 text-white mb-3" style="text-wrap: balance;">
                {{ $product->name }}
            </h1>

            <div class="d-flex align-items-baseline gap-3 mb-3 mb-md-4">
                <span class="num fw-bold heading-4" style="color: var(--bugs-primary);">
                    {{ $product->formatted_price }}
                </span>
                @if($product->formatted_compare_at_price)
                    <span class="num text-secondary text-decoration-line-through title-2">
                        {{ $product->formatted_compare_at_price }}
                    </span>
                @endif
            </div>

            <p class="body-2 text-secondary mb-4 pb-2">
                {{ $product->description }}
            </p>

            <!-- Quantity & Add to Cart Controls -->
            <div class="d-flex flex-wrap flex-sm-nowrap align-items-center gap-2 gap-sm-3 mb-4 pb-2">
                <div class="d-flex align-items-center border rounded-pill px-3 py-2 flex-shrink-0" style="border-color: var(--bugs-border) !important; background-color: var(--bugs-surface-3);">
                    <button type="button" class="btn btn-sm text-secondary p-0 border-0" aria-label="Decrease quantity" onclick="const el = document.getElementById('productQuantityInput'); el.value = Math.max(1, parseInt(el.value, 10) - 1);">
                        <i class="ph ph-minus fs-5"></i>
                    </button>
                    <input type="number" id="productQuantityInput" value="1" min="1" max="50" class="form-control form-control-sm bg-transparent border-0 text-white text-center num fw-bold" style="width: 44px;">
                    <button type="button" class="btn btn-sm text-secondary p-0 border-0" aria-label="Increase quantity" onclick="const el = document.getElementById('productQuantityInput'); el.value = Math.min(50, parseInt(el.value, 10) + 1);">
                        <i class="ph ph-plus fs-5"></i>
                    </button>
                </div>

                <button type="button" 
                        class="btn btn-bugs-primary flex-grow-1 py-3 gap-2" 
                        style="min-width: 170px;"
                        data-add-to-cart="{{ $product->id }}">
                    <i class="ph ph-bag-plus fs-5"></i>
                    <span>Add to Bag</span>
                </button>

                <button type="button" 
                        class="btn btn-bugs-outline py-3 px-4 gap-2 d-inline-flex align-items-center"
                        data-bs-toggle="modal" 
                        data-bs-target="#inquiryModal"
                        data-device-model="{{ $product->name }}"
                        data-product-id="{{ $product->id }}"
                        data-inquiry-type="device_inquiry">
                    <i class="ph ph-chat-circle-dots fs-5"></i>
                    <span>Inquire / Hold</span>
                </button>
            </div>

            <!-- Compliance & Store Guarantee List -->
            <div class="bugs-card p-3 p-sm-4 mt-4">
                <ul class="list-unstyled d-flex flex-column gap-3 body-4 text-secondary mb-0">
                    <li class="d-flex align-items-start gap-3">
                        <div class="bugs-icon-badge flex-shrink-0" style="width: 36px; height: 36px;">
                            <i class="ph ph-shield-check fs-5"></i>
                        </div>
                        <div>
                            <span class="text-white fw-medium d-block mb-1">21+ Age Verification Required</span>
                            <span class="caption-4 text-secondary">Valid government photo ID strictly checked upon collection or delivery.</span>
                        </div>
                    </li>
                    <li class="d-flex align-items-start gap-3">
                        <div class="bugs-icon-badge flex-shrink-0" style="width: 36px; height: 36px;">
                            <i class="ph ph-truck fs-5"></i>
                        </div>
                        <div>
                            <span class="text-white fw-medium d-block mb-1">Same-Day Counter Pickup &amp; Local Delivery</span>
                            <span class="caption-4 text-secondary">Free local delivery on orders over $50 within St. Louis.</span>
                        </div>
                    </li>
                    <li class="d-flex align-items-start gap-3">
                        <div class="bugs-icon-badge flex-shrink-0" style="width: 36px; height: 36px;">
                            <i class="ph ph-storefront fs-5"></i>
                        </div>
                        <div>
                            <span class="text-white fw-medium d-block mb-1">Straight from the Counter</span>
                            <span class="caption-4 text-secondary">Have questions? Call the shop directly at <a href="tel:+13144412851" class="text-primary text-decoration-none fw-medium">314-441-2851</a>.</span>
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
                <h2 class="title-1 text-white mb-0">
                    More in <span style="color: var(--bugs-primary);">{{ $product->category?->name ?? 'Shop' }}</span>
                </h2>
                <a href="{{ route('shop.index', ['category' => $product->category?->slug]) }}" class="btn btn-bugs-outline btn-bugs-pill-sm">
                    <span>See all</span>
                    <i class="ph ph-arrow-right fs-6"></i>
                </a>
            </div>
            <div class="row g-3 row-cols-2 row-cols-md-4">
                @foreach($relatedProducts as $related)
                    <div class="col">
                        <x-product-card :product="$related" />
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>

@push('schema')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Product',
    'name' => $product->name,
    'image' => $product->image_url,
    'description' => $product->description,
    'sku' => $product->sku ?? ('BUGS-PROD-' . $product->id),
    'category' => $product->category?->name ?? 'Accessories',
    'offers' => [
        '@type' => 'Offer',
        'url' => route('shop.show', $product->slug),
        'priceCurrency' => 'USD',
        'price' => number_format($product->price, 2, '.', ''),
        'availability' => $product->stock > 0 ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock',
        'itemCondition' => 'https://schema.org/NewCondition',
    ],
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endpush
@endsection
