@props(['product'])

<article class="h-100 product-card">
    <div class="card h-100 border border-white border-opacity-10 overflow-hidden d-flex flex-column position-relative group transition-all duration-300" style="background-color: hsl(var(--card)); border-radius: 1rem;">
        <!-- Product Image (Aspect Square) -->
        <a href="{{ route('shop.show', $product->slug) }}" class="d-block position-relative ratio ratio-1x1 overflow-hidden" style="background-color: hsl(var(--surface-deep));">
            <img src="{{ $product->image_url }}" 
                 alt="{{ $product->name }}" 
                 loading="lazy" 
                 class="w-100 h-100 object-fit-cover transition-transform duration-500 group-hover:scale-105">
            
            @if($product->badge)
                <div class="position-absolute top-0 start-0 m-2 m-sm-3 z-2">
                    <span class="badge rounded-pill px-2 px-sm-2.5 py-0.5 py-sm-1 text-white border border-white border-opacity-10" style="background-color: rgba(9, 11, 14, 0.85); backdrop-filter: blur(8px); font-size: 0.625rem; letter-spacing: 0.05em;">
                        {{ $product->badge }}
                    </span>
                </div>
            @endif
        </a>

        <!-- Card Body -->
        <div class="p-2.5 p-sm-3 p-md-4 d-flex flex-column flex-grow-1">
            <p class="eyebrow text-secondary mb-1 text-truncate" style="font-size: 0.6875rem; letter-spacing: 0.15em;">
                {{ $product->category->name ?? 'Phone Accessories' }}
            </p>

            <h3 class="fs-6 fw-medium text-white mb-2 product-card-title" style="font-size: 14px; line-height: 1.35; min-height: 2.7em; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                <a href="{{ route('shop.show', $product->slug) }}" class="text-white text-decoration-none hover-steel">
                    {{ $product->name }}
                </a>
            </h3>

            <div class="mt-auto pt-2 pt-md-3 border-top border-white border-opacity-10 d-flex align-items-center justify-content-between gap-1 flex-wrap product-card-footer">
                <div class="d-flex flex-column flex-sm-row align-items-baseline gap-0.5 gap-sm-2 min-w-0">
                    <span class="fw-semibold text-white num product-price-val" style="font-size: 14px;">
                        {{ $product->formatted_price }}
                    </span>
                    @if($product->formatted_compare_at_price)
                        <span class="text-secondary text-decoration-line-through small num product-compare-val" style="font-size: 11px;">
                            {{ $product->formatted_compare_at_price }}
                        </span>
                    @endif
                </div>

                <div class="d-flex align-items-center gap-1.5 flex-shrink-0 ms-auto">
                    <!-- Add to Bag Quick Button -->
                    <button type="button" 
                            class="btn-product-cart" 
                            data-add-to-cart="{{ $product->id }}"
                            aria-label="Add {{ $product->name }} to bag"
                            title="Add to bag">
                        <i data-lucide="plus" style="width: 14px; height: 14px;"></i>
                    </button>

                    <!-- WhatsApp Inquiry Link (+1 314-441-2851) -->
                    <a href="https://wa.me/13144412851?text={{ urlencode('Hello BUGS Wireless, I am inquiring about ' . $product->name . ' (' . $product->formatted_price . ')') }}" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       class="btn-product-whatsapp" 
                       aria-label="Chat on WhatsApp about {{ $product->name }}"
                       title="Inquire on WhatsApp (+1 314-441-2851)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.82 9.82 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.23 8.23 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.2 8.2 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.54 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.16.25-.64.81-.78.98-.15.17-.29.19-.54.06-.25-.13-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.38-1.72-.15-.25-.02-.38.11-.51.11-.11.25-.29.37-.44.13-.15.17-.25.25-.42.08-.17.04-.31-.02-.44-.06-.13-.56-1.35-.77-1.85-.2-.49-.41-.42-.56-.43h-.48c-.16 0-.43.06-.66.31-.23.25-.87.85-.87 2.08 0 1.23.89 2.41 1.02 2.58.12.16 1.76 2.68 4.25 3.76.59.26 1.06.41 1.42.52.6.19 1.14.16 1.57.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.08.15-1.18-.06-.1-.23-.17-.48-.29z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</article>
