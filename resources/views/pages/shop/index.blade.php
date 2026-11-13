@extends('layouts.app')

@section('title', 'Shop All Stock — BUGS Wireless & Smoke Shop')
@section('meta_description', 'Browse vapes, e-liquids, glass pipes, hookah, and phone accessories at BUGS Wireless & Smoke Shop in St. Louis, MO.')

@section('content')
<div class="container-fluid px-3 px-lg-5 py-4 py-lg-5" style="max-width: 1400px;">
    <!-- Page Header -->
    <div class="row align-items-end mb-4 pb-2 g-3">
        <div class="col-lg-6">
            <span class="eyebrow mb-2 d-block" style="color: var(--bugs-primary);">The Inventory</span>
            <h1 class="heading-2 text-white mb-2">
                Everything in <span style="color: var(--bugs-primary);">stock</span>.
            </h1>
            <p class="body-3 text-secondary mb-0">
                Reserve online for same-day counter pickup or local St. Louis delivery. Valid 21+ photo ID required.
            </p>
        </div>
        <div class="col-lg-6 d-flex justify-content-lg-end">
            <!-- Search Form -->
            <form action="{{ route('shop.index') }}" method="GET" class="bugs-search-container" style="max-width: 440px;">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <span class="bugs-search-icon">
                    <i class="ph ph-magnifying-glass fs-5" style="color: var(--bugs-primary);"></i>
                </span>
                <input type="text" 
                       name="search" 
                       value="{{ request('search') }}" 
                       placeholder="Search vapes, glass, chargers..." 
                       aria-label="Search products" 
                       class="bugs-search-input">
                @if(request('search'))
                    <a href="{{ route('shop.index', request('category') ? ['category' => request('category')] : []) }}" 
                       class="position-absolute end-0 top-50 translate-middle-y me-3 text-secondary text-decoration-none" 
                       title="Clear Search" style="z-index: 3;">
                        <i class="ph ph-x-circle fs-5"></i>
                    </a>
                @endif
            </form>
        </div>
    </div>

    <!-- Category Filter Pills -->
    <div class="d-flex flex-wrap gap-2 mb-4 pb-3 border-bottom" style="border-color: var(--bugs-border) !important;">
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
        <div class="row g-3 row-cols-2 row-cols-md-3 row-cols-xl-4">
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
        <!-- Composed Empty State (SKILL.md B9) -->
        <div class="py-5 text-center my-4 bugs-card p-5" style="max-width: 600px; margin: 0 auto;">
            <div class="d-flex align-items-center justify-content-center rounded-circle border mx-auto mb-3" style="width: 64px; height: 64px; border-color: var(--bugs-border) !important; background-color: var(--bugs-surface-3); color: var(--bugs-primary);">
                <i class="ph ph-magnifying-glass fs-2"></i>
            </div>
            <h3 class="title-2 text-white mb-2">No matching products found</h3>
            <p class="body-3 text-secondary mb-4">Try checking your search terms or selecting another category.</p>
            <a href="{{ route('shop.index') }}" class="btn btn-bugs-primary btn-bugs-pill-sm px-4">
                View All In-Stock Products
            </a>
        </div>
    @endif
</div>
@endsection
