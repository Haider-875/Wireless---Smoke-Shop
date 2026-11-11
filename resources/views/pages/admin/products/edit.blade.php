@extends('layouts.app')

@section('title', 'Edit Product — BUGS Admin')

@section('content')
<div class="container py-5">
    @include('pages.admin.nav')

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="bugs-card border p-4 p-md-5">
                <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom" style="border-color: var(--bugs-border) !important;">
                    <div>
                        <h4 class="font-display text-white mb-1">Edit Product: {{ $product->name }}</h4>
                        <p class="text-secondary small mb-0">Update pricing, inventory levels, or product details.</p>
                    </div>
                    <a href="{{ route('admin.products') }}" class="btn btn-sm btn-bugs-outline">
                        <i class="bi bi-arrow-left me-1"></i> Back to Products
                    </a>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger bg-danger text-white border-0 mb-4" role="alert">
                        <div class="fw-semibold mb-1"><i class="bi bi-exclamation-triangle-fill me-1"></i> Please fix the errors below:</div>
                        <ul class="mb-0 small ps-3">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.products.update', $product) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row g-3 mb-4">
                        <div class="col-md-8">
                            <label class="form-label text-secondary small">Product Name *</label>
                            <input type="text" name="name" class="form-control bugs-input" value="{{ old('name', $product->name) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-secondary small">Category *</label>
                            <select name="category_id" class="form-select bugs-input" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label text-secondary small">Price ($ USD) *</label>
                            <input type="number" step="0.01" min="0" name="price" class="form-control bugs-input" value="{{ old('price', $product->price) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-secondary small">Compare-At Price ($ USD)</label>
                            <input type="number" step="0.01" min="0" name="compare_at_price" class="form-control bugs-input" value="{{ old('compare_at_price', $product->compare_at_price) }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-secondary small">Stock Quantity *</label>
                            <input type="number" min="0" name="stock" class="form-control bugs-input" value="{{ old('stock', $product->stock) }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-secondary small">Badge / Highlight</label>
                            <input type="text" name="badge" class="form-control bugs-input" value="{{ old('badge', $product->badge) }}" placeholder="e.g. Best Seller, Staff Pick">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-secondary small">Image Filename</label>
                            <input type="text" name="image" class="form-control bugs-input" value="{{ old('image', $product->image) }}">
                            <div class="form-text text-muted small">Path: public/assets/images/products/{{ $product->image }}</div>
                        </div>

                        <div class="col-12">
                            <label class="form-label text-secondary small">Description</label>
                            <textarea name="description" rows="4" class="form-control bugs-input">{{ old('description', $product->description) }}</textarea>
                        </div>

                        <div class="col-12">
                            <div class="d-flex flex-wrap gap-4 pt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $product->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label text-white small" for="is_active">
                                        Active in Store
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="featured" id="featured" value="1" {{ old('featured', $product->featured) ? 'checked' : '' }}>
                                    <label class="form-check-label text-white small" for="featured">
                                        Featured on Homepage
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2 pt-3 border-top" style="border-color: var(--bugs-border) !important;">
                        <a href="{{ route('admin.products') }}" class="btn btn-bugs-outline">Cancel</a>
                        <button type="submit" class="btn btn-bugs-gold px-4">
                            <i class="bi bi-check-lg me-1"></i> Update Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
