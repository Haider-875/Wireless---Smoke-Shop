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
        <div class="col-lg-6 mt-4 mt-lg-0">
            <!-- Search Form -->
            <form action="{{ route('shop.index') }}" method="GET" class="d-flex gap-2">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <div class="input-group">
                    <span class="input-group-text bg-dark border-secondary text-secondary">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" 
                           name="search" 
                           value="{{ request('search') }}" 
                           class="form-control bg-dark text-white border-secondary" 
                           placeholder="Search vapes, glass, chargers, e-liquids...">
                </div>
                <button type="submit" class="btn btn-bugs-primary px-3">Search</button>
                @if(request('search'))
                    <a href="{{ route('shop.index', request('category') ? ['category' => request('category')] : []) }}" class="btn btn-bugs-outline px-3" title="Clear Search">
                        <i class="bi bi-x-lg"></i>
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

        <div class="mt-5 d-flex justify-content-center">
            {{ $products->links() }}
        </div>
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
