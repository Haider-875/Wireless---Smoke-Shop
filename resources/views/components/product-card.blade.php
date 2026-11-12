@props(['product'])

<article class="bugs-product-card h-100 d-flex flex-column rounded-4 border overflow-hidden position-relative group">
    <!-- Product Image -->
    <a href="{{ route('shop.show', $product->slug) }}" class="d-block position-relative ratio ratio-1x1 overflow-hidden bugs-card-img-wrap" style="background-color: #0e0e11;">
        <img src="{{ $product->image_url }}" 
             alt="{{ $product->name }}" 
             loading="lazy" 
             class="object-fit-cover w-100 h-100 bugs-card-img">
        <div class="bugs-card-img-gradient"></div>
    </a>

    <!-- Card Body -->
    <div class="p-2 p-sm-3 p-md-3 d-flex flex-column flex-grow-1">
        <p class="eyebrow text-secondary mb-1" style="font-size: 0.6rem; letter-spacing: 0.16em;">
            {{ $product->category->name ?? 'Shop' }}
        </p>

        <h3 class="fw-medium text-white mb-2 leading-snug" style="font-size: clamp(0.8125rem, 2.5vw, 0.9375rem); min-height: 2.5em; line-height: 1.25; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
            <a href="{{ route('shop.show', $product->slug) }}" class="text-white text-decoration-none hover-primary">
                {{ $product->name }}
            </a>
        </h3>

        <div class="mt-auto pt-2 d-flex align-items-end justify-content-between gap-1">
            <div class="d-flex flex-column">
                @if($product->formatted_compare_at_price)
                    <span class="num text-secondary text-decoration-line-through leading-none" style="font-size: 0.7rem; line-height: 1.1;">
                        {{ $product->formatted_compare_at_price }}
                    </span>
                @endif
                <span class="num fw-bold leading-none" style="color: var(--bugs-primary); font-size: clamp(0.875rem, 2.6vw, 1rem); line-height: 1.2;">
                    {{ $product->formatted_price }}
                </span>
            </div>

            <!-- Quick Add to Bag Button (100% Round Luxury Circle) -->
            <button type="button" 
                    class="btn btn-bugs-add-bag flex-shrink-0" 
                    title="Add to Bag"
                    aria-label="Add {{ $product->name }} to bag"
                    data-add-to-cart="{{ $product->id }}">
                <i class="bi bi-bag-plus"></i>
            </button>
        </div>
    </div>
</article>
