@extends('layouts.app')

@section('title', '404 Page Not Found — BUGS Wireless & Smoke Shop')
@section('meta_description', 'The requested page could not be found on BUGS Wireless & Smoke Shop.')

@section('content')
<section class="py-5 d-flex align-items-center justify-content-center" style="min-height: 60vh; background-color: var(--bugs-bg);">
    <div class="container px-3 px-lg-5 text-center py-5" style="max-width: 600px;">
        <div class="d-inline-flex align-items-center justify-content-center rounded-circle border mb-4" style="width: 72px; height: 72px; border-color: var(--bugs-border); background-color: var(--bugs-surface-2); color: var(--bugs-primary);">
            <i class="ph ph-warning-circle fs-2"></i>
        </div>
        
        <h1 class="heading-2 text-white mb-2">Page Not Found</h1>
        <p class="body-2 text-secondary mb-4" style="text-wrap: balance;">
            The page you are looking for has been moved, renamed, or is currently unavailable.
        </p>

        <div class="d-flex flex-wrap align-items-center justify-content-center gap-3">
            <a href="{{ route('home') }}" class="btn btn-bugs-primary">
                <i class="ph ph-house"></i> Back to Homepage
            </a>
            <a href="{{ route('shop.index') }}" class="btn btn-bugs-outline">
                <i class="ph ph-squares-four"></i> Browse Shop
            </a>
        </div>
    </div>
</section>
@endsection

