@props(['product'])

<article class="bugs-product-card h-100 d-flex flex-column rounded-4 border overflow-hidden position-relative group" style="background-color: var(--bugs-card); border-color: var(--bugs-border) !important;">
    <!-- Product Image -->
    <a href="{{ route('shop.show', $product->slug) }}" class="d-block position-relative ratio ratio-1x1 overflow-hidden" style="background-color: #0e0e10;">
        <img src="{{ $product->image_url }}" 
             alt="{{ $product->name }}" 
             loading="lazy" 
             class="object-fit-cover w-100 h-100 bugs-card-img">
    </a>

    <!-- Card Body -->
    <div class="p-3 p-md-4 d-flex flex-column flex-grow-1">
        <p class="eyebrow text-secondary mb-1" style="font-size: 0.625rem;">
            {{ $product->category->name ?? 'Shop' }}
        </p>

        <h3 class="fs-6 fw-medium text-white mb-2 leading-snug">
            <a href="{{ route('shop.show', $product->slug) }}" class="text-white text-decoration-none hover-primary">
                {{ $product->name }}
            </a>
        </h3>

        <div class="mt-auto pt-2 d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-baseline gap-2">
                <span class="num fw-bold fs-6" style="color: var(--bugs-primary)">
                    {{ $product->formatted_price }}
                </span>
                @if($product->formatted_compare_at_price)
                    <span class="num text-secondary small text-decoration-line-through">
                        {{ $product->formatted_compare_at_price }}
                    </span>
                @endif
            </div>

            <!-- Quick Add to Bag Button (100% Round Luxury Circle) -->
            <button type="button" 
                    class="btn btn-bugs-add-bag" 
                    title="Add to Bag"
                    aria-label="Add {{ $product->name }} to bag"
                    data-add-to-cart="{{ $product->id }}">
                <i class="bi bi-bag-plus"></i>
            </button>
        </div>
    </div>
</article>

