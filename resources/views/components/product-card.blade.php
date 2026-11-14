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

        <div class="mt-auto pt-2 d-flex align-items-center justify-content-between gap-2">
            <div class="d-flex flex-column">
                @if($product->formatted_compare_at_price)
                    <span class="num text-secondary text-decoration-line-through caption-5" style="line-height: 1;">
                        {{ $product->formatted_compare_at_price }}
                    </span>
                @endif
                <span class="num fw-bold title-2" style="color: var(--bugs-primary); line-height: 1.2;">
                    {{ $product->formatted_price }}
                </span>
            </div>

            <div class="d-flex align-items-center gap-1">
                <!-- Inquiry Option -->
                <button type="button" 
                        class="btn btn-sm btn-bugs-outline p-2 d-inline-flex align-items-center justify-content-center" 
                        title="Inquire about {{ $product->name }}"
                        aria-label="Inquire about {{ $product->name }}"
                        data-bs-toggle="modal" 
                        data-bs-target="#inquiryModal"
                        data-device-model="{{ $product->name }}"
                        data-product-id="{{ $product->id }}"
                        data-inquiry-type="device_inquiry"
                        style="width: 36px; height: 36px; border-radius: 8px;">
                    <i class="ph ph-chat-circle-dots fs-5"></i>
                </button>

                <!-- Quick Add to Bag Button -->
                <button type="button" 
                        class="btn-bugs-add-bag" 
                        title="Add to Bag"
                        aria-label="Add {{ $product->name }} to bag"
                        data-add-to-cart="{{ $product->id }}">
                    <i class="ph ph-bag-plus fs-5"></i>
                </button>
            </div>
        </div>
    </div>
</article>
