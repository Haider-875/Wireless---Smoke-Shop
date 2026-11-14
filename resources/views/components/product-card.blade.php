@props(['product'])

<article class="h-100">
    <div class="card h-100 border border-white border-opacity-10 overflow-hidden d-flex flex-column position-relative group transition-all duration-300" style="background-color: hsl(var(--card)); border-radius: 1rem;">
        <!-- Product Image (Aspect Square) -->
        <a href="{{ route('shop.show', $product->slug) }}" class="d-block position-relative ratio ratio-1x1 overflow-hidden" style="background-color: hsl(var(--surface-deep));">
            <img src="{{ $product->image_url }}" 
                 alt="{{ $product->name }}" 
                 loading="lazy" 
                 class="w-100 h-100 object-fit-cover transition-transform duration-500 group-hover:scale-105">
            
            @if($product->badge)
                <div class="position-absolute top-0 start-0 m-3 z-2">
                    <span class="badge rounded-pill px-2.5 py-1 text-white border border-white border-opacity-10" style="background-color: rgba(9, 11, 14, 0.85); backdrop-filter: blur(8px); font-size: 0.6875rem; letter-spacing: 0.05em;">
                        {{ $product->badge }}
                    </span>
                </div>
            @endif
        </a>

        <!-- Card Body -->
        <div class="p-3 p-md-4 d-flex flex-column flex-grow-1">
            <p class="eyebrow text-secondary mb-1" style="font-size: 0.6875rem; letter-spacing: 0.15em;">
                {{ $product->category->name ?? 'Phone Accessories' }}
            </p>

            <h3 class="fs-6 fw-medium text-white mb-2" style="font-size: 15px; line-height: 1.35; min-height: 2.7em; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                <a href="{{ route('shop.show', $product->slug) }}" class="text-white text-decoration-none hover-steel">
                    {{ $product->name }}
                </a>
            </h3>

            <div class="mt-auto pt-3 border-top border-white border-opacity-10 d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-baseline gap-2">
                    <span class="fw-semibold text-white" style="font-size: 15px;">
                        {{ $product->formatted_price }}
                    </span>
                    @if($product->formatted_compare_at_price)
                        <span class="text-secondary text-decoration-line-through small" style="font-size: 13px;">
                            {{ $product->formatted_compare_at_price }}
                        </span>
                    @endif
                </div>

                <div class="d-flex align-items-center gap-2">
                    <!-- Add to Bag Quick Button -->
                    <button type="button" 
                            class="btn btn-sm btn-bugs-outline rounded-circle p-0 d-flex align-items-center justify-content-center" 
                            data-add-to-cart="{{ $product->id }}"
                            aria-label="Add {{ $product->name }} to bag"
                            title="Add to bag"
                            style="width: 32px; height: 32px;">
                        <i data-lucide="plus" class="w-4 h-4 text-white"></i>
                    </button>

                    <!-- Fast Inquiry Button -->
                    <button type="button" 
                            class="btn btn-sm btn-bugs-outline rounded-circle p-0 d-flex align-items-center justify-content-center" 
                            data-bs-toggle="modal" 
                            data-bs-target="#inquiryModal"
                            data-device-model="{{ $product->name }}"
                            data-product-id="{{ $product->id }}"
                            data-inquiry-type="device_inquiry"
                            aria-label="Inquire about {{ $product->name }}"
                            title="Inquire"
                            style="width: 32px; height: 32px; border-color: rgba(92, 185, 234, 0.4);">
                        <i data-lucide="message-square" class="w-3.5 h-3.5 text-steel"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</article>
