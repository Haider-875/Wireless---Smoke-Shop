@extends('layouts.app')

@section('title', 'Add New Product — BUGS Admin')

@section('content')
<div class="container py-5">
    @include('pages.admin.nav')

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="bugs-card border p-4 p-md-5">
                <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom" style="border-color: var(--bugs-border) !important;">
                    <div>
                        <h4 class="font-display text-white mb-1">Add New Product</h4>
                        <p class="text-secondary small mb-0">Create a new item in the BUGS catalog.</p>
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

                <form action="{{ route('admin.products.store') }}" method="POST">
                    @csrf

                    <div class="row g-3 mb-4">
                        <div class="col-md-8">
                            <label class="form-label text-secondary small">Product Name *</label>
                            <input type="text" name="name" class="form-control bugs-input" value="{{ old('name') }}" placeholder="e.g. Geek Bar Pulse 15000" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-secondary small">Category *</label>
                            <select name="category_id" class="form-select bugs-input" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label text-secondary small">Price ($ USD) *</label>
                            <input type="number" step="0.01" min="0" name="price" class="form-control bugs-input" value="{{ old('price') }}" placeholder="19.99" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-secondary small">Compare-At Price ($ USD)</label>
                            <input type="number" step="0.01" min="0" name="compare_at_price" class="form-control bugs-input" value="{{ old('compare_at_price') }}" placeholder="24.99">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-secondary small">Stock Quantity *</label>
                            <input type="number" min="0" name="stock" class="form-control bugs-input" value="{{ old('stock', 25) }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-secondary small">Badge / Highlight</label>
                            <input type="text" name="badge" class="form-control bugs-input" value="{{ old('badge') }}" placeholder="e.g. Best Seller, Staff Pick, New">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-secondary small">Image Filename</label>
                            <input type="text" name="image" class="form-control bugs-input" value="{{ old('image') }}" placeholder="e.g. vape-midnight-ice.jpg">
                            <div class="form-text text-muted small">Place in public/assets/images/products/ or use one of the existing files.</div>
                        </div>

                        <div class="col-12">
                            <label class="form-label text-secondary small">Description</label>
                            <textarea name="description" rows="4" class="form-control bugs-input" placeholder="Detailed product specifications, flavor profile, or compatibility notes...">{{ old('description') }}</textarea>
                        </div>

                        <div class="col-12">
                            <div class="d-flex flex-wrap gap-4 pt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', '1') ? 'checked' : '' }}>
                                    <label class="form-check-label text-white small" for="is_active">
                                        Active in Store (Visible to customers)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="featured" id="featured" value="1" {{ old('featured') ? 'checked' : '' }}>
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
                            <i class="bi bi-check-lg me-1"></i> Save Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
