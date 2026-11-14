@props(['product'])

<article class="bugs-product-card h-100 d-flex flex-column position-relative group">
    <!-- Product Image (Nested radius: 16px outer - 8px gap = 8px) -->
    <a href="{{ route('shop.show', $product->slug) }}" class="d-block position-relative ratio ratio-1x1 overflow-hidden bugs-card-img-wrap" style="background-color: #0e0e11;">
        <img src="{{ $product->image_url }}" 
             alt="{{ $product->name }}" 
             loading="lazy" 
             class="bugs-card-img w-100 h-100 object-fit-cover">
        
        @if($product->badge)
            <div class="position-absolute top-0 start-0 m-2">
                <span class="caption-5 py-1 px-2 rounded-pill" style="background-color: rgba(0, 0, 0, 0.75); backdrop-filter: blur(8px); border: 1px solid var(--bugs-border); color: var(--bugs-primary);">
                    {{ $product->badge }}
                </span>
            </div>
        @endif
    </a>

    <!-- Card Body -->
    <div class="p-3 d-flex flex-column flex-grow-1">
        <p class="eyebrow text-secondary mb-1" style="font-size: 11px; letter-spacing: 0.12em;">
            {{ $product->category->name ?? 'Shop' }}
        </p>

        <h3 class="title-3 text-white mb-2 leading-snug" style="min-height: 2.8em; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
            <a href="{{ route('shop.show', $product->slug) }}" class="text-white text-decoration-none hover-primary">
                {{ $product->name }}
            </a>
        </h3>

        <div class="mt-auto pt-3 border-top d-flex flex-column gap-2" style="border-color: var(--bugs-border) !important;">
            <div class="d-flex align-items-baseline justify-content-between">
                <div class="d-flex align-items-baseline gap-2">
                    <span class="num fw-bold title-2" style="color: var(--bugs-primary); line-height: 1.2;">
                        {{ $product->formatted_price }}
                    </span>
                    @if($product->formatted_compare_at_price)
                        <span class="num text-secondary text-decoration-line-through caption-5" style="line-height: 1;">
                            {{ $product->formatted_compare_at_price }}
                        </span>
                    @endif
                </div>
                <span class="caption-5 text-secondary">In Stock</span>
            </div>

            <!-- Action Buttons: Inquiry active, Add to Cart commented out -->
            <div class="mt-1">
                {{-- Add to Cart temporarily commented out
                <button type="button" 
                        class="btn btn-bugs-primary btn-sm flex-grow-1 py-2 px-2 d-inline-flex align-items-center justify-content-center gap-1.5 fw-bold" 
                        title="Add {{ $product->name }} to Cart"
                        aria-label="Add {{ $product->name }} to cart"
                        data-add-to-cart="{{ $product->id }}"
                        style="font-size: 0.8125rem;">
                    <i class="ph ph-bag-plus fs-5"></i>
                    <span>Add to Cart</span>
                </button>
                --}}

                <button type="button" 
                        class="btn btn-bugs-outline btn-sm w-100 py-2 px-3 d-inline-flex align-items-center justify-content-center gap-2" 
                        title="Inquire about {{ $product->name }}"
                        aria-label="Inquire about {{ $product->name }}"
                        data-bs-toggle="modal" 
                        data-bs-target="#inquiryModal"
                        data-device-model="{{ $product->name }}"
                        data-product-id="{{ $product->id }}"
                        data-inquiry-type="device_inquiry"
                        style="border-color: var(--bugs-primary); color: var(--bugs-primary); font-size: 0.8125rem; font-weight: 600;">
                    <i class="ph ph-chat-circle-dots fs-5"></i>
                    <span>Inquire Now</span>
                </button>
            </div>
        </div>
    </div>
</article>
