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

                <a href="https://wa.me/13144412851?text={{ urlencode('Hello BUGS Wireless, I am inquiring about ' . $product->name . ' ($' . number_format($product->price, 2) . ')') }}" 
                   target="_blank" 
                   rel="noopener noreferrer" 
                   class="btn py-3 px-4 rounded-pill d-inline-flex align-items-center justify-content-center gap-2 fw-semibold"
                   style="background-color: rgba(37, 211, 102, 0.14); border: 1px solid rgba(37, 211, 102, 0.4); color: #25D366; transition: all 0.2s ease;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.82 9.82 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.23 8.23 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.2 8.2 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.54 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.16.25-.64.81-.78.98-.15.17-.29.19-.54.06-.25-.13-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.38-1.72-.15-.25-.02-.38.11-.51.11-.11.25-.29.37-.44.13-.15.17-.25.25-.42.08-.17.04-.31-.02-.44-.06-.13-.56-1.35-.77-1.85-.2-.49-.41-.42-.56-.43h-.48c-.16 0-.43.06-.66.31-.23.25-.87.85-.87 2.08 0 1.23.89 2.41 1.02 2.58.12.16 1.76 2.68 4.25 3.76.59.26 1.06.41 1.42.52.6.19 1.14.16 1.57.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.08.15-1.18-.06-.1-.23-.17-.48-.29z"/>
                    </svg>
                    <span>WhatsApp Inquiry</span>
                </a>
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
