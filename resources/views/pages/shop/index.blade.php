@extends('layouts.app')

@php
    $isPhoneCategory = $activeCategory && (
        str_contains(strtolower($activeCategory->slug), 'phone') || 
        str_contains(strtolower($activeCategory->name), 'phone') ||
        str_contains(strtolower($activeCategory->slug), 'mobile')
    );
@endphp

@if($isPhoneCategory)
    @section('title', 'Phone Accessories & Mobile Gear — BUGS Wireless & Smoke Shop')
    @section('meta_description', 'Cases, screen protectors, wireless audio, chargers, and power banks in stock at BUGS Wireless on Halls Ferry Rd, St. Louis.')
@elseif($activeCategory)
    @section('title', $activeCategory->name . ' — BUGS Wireless & Smoke Shop')
    @section('meta_description', ($activeCategory->description ?? $activeCategory->name) . ' in stock at BUGS Wireless & Smoke Shop on Halls Ferry Rd, St. Louis.')
@else
    @section('title', 'Everything in stock — BUGS Wireless & Smoke Shop')
    @section('meta_description', 'Everything in stock at BUGS Wireless & Smoke Shop on Halls Ferry Rd, St. Louis. Phone accessories, chargers, vapes, glass, and hookah.')
@endif

@section('content')
<div class="container-fluid px-4 px-lg-5 py-5" style="max-width: 1400px;">
    <!-- Page Header (Exact Reference Match) -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-4 mb-4 pb-2">
        <div>
            @if($isPhoneCategory)
                <p class="eyebrow text-steel mb-2" style="font-size: 0.75rem; letter-spacing: 0.15em;">The wireless counter</p>
                <h1 class="display-5 fw-semibold text-white tracking-tight mb-2">
                    Phone accessories.
                </h1>
                <p class="text-secondary small mb-0" style="max-width: 520px; line-height: 1.6;">
                    Cases, tempered glass shields, audio, and fast chargers. Pick up at 10010 Halls Ferry Rd or walk in today.
                </p>
            @elseif($activeCategory)
                <p class="eyebrow text-steel mb-2" style="font-size: 0.75rem; letter-spacing: 0.15em;">The shelves</p>
                <h1 class="display-5 fw-semibold text-white tracking-tight mb-2">
                    {{ $activeCategory->name }}.
                </h1>
                <p class="text-secondary small mb-0" style="max-width: 520px; line-height: 1.6;">
                    {{ $activeCategory->description ?? 'In stock at 10010 Halls Ferry Rd. Age verified in store for 21+ items.' }}
                </p>
            @else
                <p class="eyebrow text-steel mb-2" style="font-size: 0.75rem; letter-spacing: 0.15em;">The shelves</p>
                <h1 class="display-5 fw-semibold text-white tracking-tight mb-2">
                    Everything in stock.
                </h1>
                <p class="text-secondary small mb-0" style="max-width: 520px; line-height: 1.6;">
                    Pick up at 10010 Halls Ferry Rd or get local delivery over $50. Age verified in store for 21+ items.
                </p>
            @endif
        </div>

        <!-- Search Bar -->
        <form action="{{ route('shop.index') }}" method="GET" class="position-relative" style="min-width: 280px; max-width: 380px;">
            @if(request('category'))
                <input type="hidden" name="category" value="{{ $activeCategory ? $activeCategory->slug : request('category') }}">
            @endif
            <div class="d-flex align-items-center rounded-pill border border-white border-opacity-10 px-3 py-2" style="background-color: hsl(var(--surface));">
                <i data-lucide="search" class="w-4 h-4 text-secondary me-2 flex-shrink-0"></i>
                <input type="text" 
                       name="search" 
                       value="{{ request('search') }}" 
                       placeholder="{{ $isPhoneCategory ? 'Search phone cases, glass, audio...' : 'Search products...' }}" 
                       aria-label="Search products" 
                       class="bg-transparent border-0 text-white w-100 p-0" 
                       style="outline: none; font-size: 0.875rem;">
                @if(request('search'))
                    <a href="{{ route('shop.index', request('category') ? ['category' => request('category')] : []) }}" class="text-secondary text-decoration-none ms-2">
                        <i data-lucide="x" class="w-4 h-4"></i>
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Category Filter Pills -->
    <div class="d-flex flex-wrap gap-2 mb-5 pb-3 border-bottom border-white border-opacity-10">
        <a href="{{ route('shop.index', request('search') ? ['search' => request('search')] : []) }}" 
           class="btn btn-sm rounded-pill px-3 py-1.5 {{ !$activeCategory ? 'btn-bugs-primary text-dark fw-semibold' : 'btn-bugs-outline text-secondary' }}" style="font-size: 0.8125rem;">
            All Products
        </a>
        @foreach($categories as $category)
            @php
                $isActive = $activeCategory && ($activeCategory->id === $category->id || $activeCategory->slug === $category->slug);
            @endphp
            <a href="{{ route('shop.index', array_merge(['category' => $category->slug], request('search') ? ['search' => request('search')] : [])) }}" 
               class="btn btn-sm rounded-pill px-3 py-1.5 {{ $isActive ? 'btn-bugs-primary text-dark fw-semibold' : 'btn-bugs-outline text-secondary' }}" style="font-size: 0.8125rem;">
                {{ $category->name }}
            </a>
        @endforeach
    </div>

    <!-- Products Grid -->
    @if($products->count() > 0)
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3 g-md-4">
            @foreach($products as $product)
                <div class="col">
                    <x-product-card :product="$product" />
                </div>
            @endforeach
        </div>

        @if($products->hasPages())
            <div class="pagination-wrapper my-5 py-3 d-flex justify-content-center">
                {{ $products->links() }}
            </div>
        @endif
    @else
        <!-- Empty State -->
        <div class="py-5 text-center my-4 p-5 rounded-4 border border-white border-opacity-10" style="background-color: hsl(var(--card)); max-width: 540px; margin: 0 auto;">
            <div class="d-flex align-items-center justify-content-center rounded-circle border border-white border-opacity-10 mx-auto mb-3" style="width: 56px; height: 56px; background-color: hsl(var(--surface)); color: hsl(var(--foreground));">
                <i data-lucide="search" class="w-6 h-6"></i>
            </div>
            <h3 class="fs-5 text-white fw-semibold mb-2">No matching products found</h3>
            @if($isPhoneCategory)
                <p class="text-secondary small mb-4">No phone accessories matched your search. Check back soon or call the counter at 314-441-2851.</p>
                <a href="{{ route('shop.index', ['category' => 'Phone Accessories']) }}" class="btn btn-bugs-primary px-4 py-2 rounded-pill fw-semibold text-dark" style="font-size: 0.875rem;">
                    View All Phone Accessories
                </a>
            @else
                <p class="text-secondary small mb-4">Try checking your search terms or selecting another category.</p>
                <a href="{{ route('shop.index') }}" class="btn btn-bugs-primary px-4 py-2 rounded-pill fw-semibold text-dark" style="font-size: 0.875rem;">
                    View All In-Stock Products
                </a>
            @endif
        </div>
    @endif
</div>
@endsection
