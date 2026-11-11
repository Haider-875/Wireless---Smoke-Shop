@extends('layouts.app')

@section('title', 'Shop — Bugs Wireless & Smoke Shop')

@section('content')
<div class="container-fluid px-3 px-lg-5 py-4 py-lg-5" style="max-width: 1400px;">
    <!-- Page Header -->
    <div class="row align-items-end mb-4 pb-2">
        <div class="col-lg-6">
            <p class="eyebrow mb-2" style="color: var(--bugs-primary)">The Inventory</p>
            <h1 class="display-5 fw-semibold text-white mb-2">
                Everything in <span class="font-serif-display">stock</span>.
            </h1>
            <p class="text-secondary small mb-0">
                Reserve online for same-day store pickup or local St. Louis delivery. 21+ ID required.
            </p>
        </div>
        <div class="col-lg-6 mt-4 mt-lg-0 d-flex justify-content-lg-end">
            <!-- Search Form — Exact Reference Design -->
            <form action="{{ route('shop.index') }}" method="GET" class="bugs-search-container" style="max-width: 420px;">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <span class="bugs-search-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                    </svg>
                </span>
                <input type="text" 
                       name="search" 
                       value="{{ request('search') }}" 
                       placeholder="Search the shelves" 
                       aria-label="Search products" 
                       class="bugs-search-input">
                @if(request('search'))
                    <a href="{{ route('shop.index', request('category') ? ['category' => request('category')] : []) }}" 
                       class="position-absolute end-0 top-50 translate-middle-y me-3 text-secondary text-decoration-none" 
                       title="Clear Search" style="z-index: 3;">
                        <i class="bi bi-x-circle-fill"></i>
                    </a>
                @endif
            </form>
        </div>
    </div>

    <!-- Category Filter Pills -->
    <div class="d-flex flex-wrap gap-2 mb-4 pb-2 border-bottom" style="border-color: var(--bugs-border) !important;">
        <a href="{{ route('shop.index', request('search') ? ['search' => request('search')] : []) }}" 
           class="btn btn-sm {{ !request('category') ? 'btn-bugs-primary' : 'btn-bugs-outline' }} btn-bugs-pill-sm px-3">
            All Products
        </a>
        @foreach($categories as $category)
            <a href="{{ route('shop.index', array_merge(['category' => $category->slug], request('search') ? ['search' => request('search')] : [])) }}" 
               class="btn btn-sm {{ request('category') === $category->slug ? 'btn-bugs-primary' : 'btn-bugs-outline' }} btn-bugs-pill-sm px-3">
                {{ $category->name }}
            </a>
        @endforeach
    </div>

    <!-- Products Grid -->
    @if($products->count() > 0)
        <div class="row g-3 g-md-4">
            @foreach($products as $product)
                <div class="col-6 col-md-4 col-lg-3">
                    <x-product-card :product="$product" />
                </div>
            @endforeach
        </div>

        @if($products->hasPages())
            <div class="mt-5 d-flex justify-content-center">
                {{ $products->links() }}
            </div>
        @endif
    @else
        <div class="py-5 text-center my-4">
            <div class="d-flex align-items-center justify-content-center rounded-circle border mx-auto mb-3" style="width: 60px; height: 60px; border-color: var(--bugs-border-light) !important; color: var(--bugs-primary);">
                <i class="bi bi-search fs-3"></i>
            </div>
            <h3 class="fs-5 text-white">No products found</h3>
            <p class="text-secondary small mb-4">Try checking your spelling or selecting a different category.</p>
            <a href="{{ route('shop.index') }}" class="btn btn-bugs-primary btn-bugs-pill-sm">
                View All In-Stock Products
            </a>
        </div>
    @endif
</div>
@endsection

