@extends('layouts.app')

@section('title', 'Manage Products — BUGS Admin')

@section('content')
<div class="container py-5">
    @include('pages.admin.nav')

    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-2">
        <div>
            <h3 class="font-display text-white mb-1">Products Catalog</h3>
            <p class="text-secondary small mb-0">Manage product inventory, pricing, images, and store availability.</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="btn btn-bugs-gold">
            <i class="bi bi-plus-lg me-1"></i> Add Product
        </a>
    </div>

    <div class="bugs-card border p-3">
        <div class="table-responsive">
            <table class="table table-dark table-hover align-middle mb-0 small">
                <thead>
                    <tr class="text-secondary">
                        <th style="width: 60px;">Image</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Badge</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr>
                        <td>
                            <img src="{{ asset('assets/images/products/' . ($product->image ?: 'screen-armor-glass.jpg')) }}" 
                                 alt="{{ $product->name }}" 
                                 class="rounded border" 
                                 style="width: 48px; height: 48px; object-fit: cover; border-color: var(--bugs-border) !important;">
                        </td>
                        <td>
                            <div class="fw-semibold text-white">{{ $product->name }}</div>
                            <div class="text-muted small font-mono">{{ $product->slug }}</div>
                        </td>
                        <td>
                            <span class="badge bg-dark border text-secondary">{{ $product->category->name ?? 'Uncategorized' }}</span>
                        </td>
                        <td>
                            <div class="fw-semibold text-primary font-mono">${{ number_format($product->price, 2) }}</div>
                            @if($product->compare_at_price)
                                <div class="text-muted text-decoration-line-through small font-mono">${{ number_format($product->compare_at_price, 2) }}</div>
                            @endif
                        </td>
                        <td>
                            <span class="{{ $product->stock > 5 ? 'text-success' : ($product->stock > 0 ? 'text-warning' : 'text-danger') }} fw-semibold">
                                {{ $product->stock }}
                            </span>
                        </td>
                        <td>
                            @if($product->badge)
                                <span class="badge bg-warning text-black">{{ $product->badge }}</span>
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                        <td>
                            @if($product->is_active)
                                <span class="badge bg-success-subtle text-success border border-success-subtle">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                            @if($product->featured)
                                <span class="badge bg-primary text-black ms-1">Featured</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('shop.show', $product->slug) }}" target="_blank" class="btn btn-outline-secondary" title="View in Store">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-outline-light" title="Edit Product">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.products.delete', $product) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger" title="Delete Product">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-5 text-secondary">
                            No products found in the catalog.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($products->hasPages())
            <div class="p-3 border-top" style="border-color: var(--bugs-border) !important;">
                {{ $products->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
