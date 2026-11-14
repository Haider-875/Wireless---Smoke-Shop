@extends('layouts.app')

@section('title', $product->name . ' — BUGS Wireless & Smoke Shop')
@section('meta_description', $product->description)

@section('content')
<div class="container-fluid px-4 px-lg-5 py-5" style="max-width: 1300px;">
    <!-- Breadcrumb / Back Link -->
    <div class="mb-4">
        <a href="{{ route('shop.index', ['category' => $product->category?->slug]) }}" class="text-secondary text-decoration-none small d-inline-flex align-items-center gap-2 hover-white">
            <i data-lucide="arrow-left" class="w-4 h-4"></i> Back to {{ $product->category?->name ?? 'Shop' }}
        </a>
    </div>

    <!-- Product Details Section -->
    <div class="row g-4 g-lg-5 align-items-start">
        <!-- Product Image (Aspect Square) -->
        <div class="col-lg-6">
            <div class="overflow-hidden rounded-4 border border-white border-opacity-10 ratio ratio-1x1" style="background-color: hsl(var(--surface-raised));">
                <img src="{{ $product->image_url }}" 
                     alt="{{ $product->name }}" 
                     class="w-100 h-100 object-fit-cover">
            </div>
        </div>

        <!-- Product Purchase Information -->
        <div class="col-lg-6">
            <div class="d-flex align-items-center gap-2 mb-2">
                <span class="eyebrow text-steel" style="font-size: 0.75rem; letter-spacing: 0.15em;">
                    {{ $product->category?->name ?? 'Shop' }}
                </span>
                <span class="text-secondary opacity-50">&bull;</span>
                <span class="text-secondary small">In Stock ({{ $product->stock }} available)</span>
            </div>

            <h1 class="display-6 fw-semibold text-white tracking-tight mb-3">
                {{ $product->name }}
            </h1>

            <div class="d-flex align-items-baseline gap-3 mb-4">
                <span class="fw-bold text-white fs-3">
                    {{ $product->formatted_price }}
                </span>
                @if($product->formatted_compare_at_price)
                    <span class="text-secondary text-decoration-line-through fs-5">
                        {{ $product->formatted_compare_at_price }}
                    </span>
                @endif
            </div>

            <p class="text-secondary mb-4 pb-2" style="font-size: 1.0625rem; line-height: 1.6;">
                {{ $product->description }}
            </p>

            <!-- Quantity & Add to Cart Controls -->
            <div class="d-flex flex-wrap flex-sm-nowrap align-items-center gap-3 mb-4 pb-2">
                <div class="d-flex align-items-center border border-white border-opacity-10 rounded-pill px-3 py-2 flex-shrink-0" style="background-color: hsl(var(--surface));">
                    <button type="button" class="btn btn-sm text-secondary p-0 border-0" aria-label="Decrease quantity" onclick="const el = document.getElementById('productQuantityInput'); el.value = Math.max(1, parseInt(el.value, 10) - 1);">
                        <i data-lucide="minus" class="w-4 h-4"></i>
                    </button>
                    <input type="number" id="productQuantityInput" value="1" min="1" max="50" class="form-control form-control-sm bg-transparent border-0 text-white text-center fw-bold" style="width: 44px; outline: none; box-shadow: none;">
                    <button type="button" class="btn btn-sm text-secondary p-0 border-0" aria-label="Increase quantity" onclick="const el = document.getElementById('productQuantityInput'); el.value = Math.min(50, parseInt(el.value, 10) + 1);">
                        <i data-lucide="plus" class="w-4 h-4"></i>
                    </button>
                </div>

                <button type="button" 
                        class="btn btn-bugs-primary flex-grow-1 py-3 px-4 rounded-pill fw-semibold text-dark d-inline-flex align-items-center justify-content-center gap-2" 
                        data-add-to-cart="{{ $product->id }}">
                    <i data-lucide="shopping-bag" class="w-4 h-4"></i>
                    <span>Add to Bag</span>
                </button>

                <button type="button" 
                        class="btn btn-bugs-outline py-3 px-4 rounded-pill d-inline-flex align-items-center justify-content-center gap-2 text-white"
                        data-bs-toggle="modal" 
                        data-bs-target="#inquiryModal"
                        data-device-model="{{ $product->name }}"
                        data-product-id="{{ $product->id }}"
                        data-inquiry-type="device_inquiry">
                    <i data-lucide="message-square" class="w-4 h-4 text-steel"></i>
                    <span>Inquire</span>
                </button>
            </div>

            <!-- Compliance & Store Guarantee List -->
            <div class="p-4 rounded-4 border border-white border-opacity-10 mt-4" style="background-color: hsl(var(--card));">
                <ul class="list-unstyled d-flex flex-column gap-3 text-secondary mb-0 small">
                    <li class="d-flex align-items-start gap-3">
                        <div class="rounded-circle d-flex align-items-center justify-content-center border border-white border-opacity-10 flex-shrink-0" style="width: 32px; height: 32px; background-color: hsl(var(--surface)); color: hsl(var(--steel));">
                            <i data-lucide="shield-check" class="w-4 h-4 text-steel"></i>
                        </div>
                        <div>
                            <span class="text-white fw-medium d-block mb-1">21+ Age Verification Required</span>
                            <span>Valid government photo ID strictly checked upon collection or delivery.</span>
                        </div>
                    </li>
                    <li class="d-flex align-items-start gap-3">
                        <div class="rounded-circle d-flex align-items-center justify-content-center border border-white border-opacity-10 flex-shrink-0" style="width: 32px; height: 32px; background-color: hsl(var(--surface)); color: hsl(var(--steel));">
                            <i data-lucide="truck" class="w-4 h-4 text-steel"></i>
                        </div>
                        <div>
                            <span class="text-white fw-medium d-block mb-1">Same-Day Counter Pickup &amp; Local Delivery</span>
                            <span>Free local delivery on orders over $50 within St. Louis.</span>
                        </div>
                    </li>
                    <li class="d-flex align-items-start gap-3">
                        <div class="rounded-circle d-flex align-items-center justify-content-center border border-white border-opacity-10 flex-shrink-0" style="width: 32px; height: 32px; background-color: hsl(var(--surface)); color: hsl(var(--steel));">
                            <i data-lucide="store" class="w-4 h-4 text-steel"></i>
                        </div>
                        <div>
                            <span class="text-white fw-medium d-block mb-1">Straight from the Counter</span>
                            <span>Have questions? Call the shop directly at <a href="tel:+13144412851" class="text-steel text-decoration-none fw-medium">314-441-2851</a>.</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Related Products -->
    @if($relatedProducts->count() > 0)
        <div class="mt-5 pt-5 border-top border-white border-opacity-10">
            <div class="d-flex justify-content-between align-items-baseline mb-4">
                <h2 class="fs-4 text-white fw-semibold mb-0">
                    More in <span class="text-steel">{{ $product->category?->name ?? 'Shop' }}</span>
                </h2>
                <a href="{{ route('shop.index', ['category' => $product->category?->slug]) }}" class="text-white text-decoration-none small hover-steel d-inline-flex align-items-center gap-1">
                    <span>See all</span>
                    <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                </a>
            </div>
            <div class="row row-cols-2 row-cols-md-4 g-3 g-md-4">
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
