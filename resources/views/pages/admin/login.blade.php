@extends('layouts.app')

@section('title', 'Staff & Admin Login — Bugs Wireless & Smoke Shop')

@section('content')
<div class="container py-5 my-4" style="max-width: 460px;">
    <div class="text-center mb-4">
        <p class="font-display fs-2 fw-bold text-white mb-0">BUGS<span style="color: var(--bugs-primary)">.</span></p>
        <p class="eyebrow text-secondary">Internal Store Management</p>
    </div>

    @if(session('error'))
        <div class="alert alert-danger border-0 small mb-4" role="alert">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success border-0 small mb-4" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="p-4 p-md-5 rounded-4 border" style="background-color: var(--bugs-card); border-color: var(--bugs-border) !important;">
        <h4 class="text-white fw-bold mb-3">Admin Login</h4>
        <p class="text-secondary small mb-4">Authorized store managers and staff only.</p>

        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label text-secondary small">Email Address</label>
                <input type="email" name="email" id="email" value="{{ old('email', 'admin@bugswireless.com') }}" required autofocus class="form-control bg-dark text-white border-secondary">
                @error('email')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label text-secondary small">Password</label>
                <input type="password" name="password" id="password" required class="form-control bg-dark text-white border-secondary" placeholder="••••••••">
                @error('password')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label text-secondary small" for="remember">
                    Remember my session
                </label>
            </div>

            <button type="submit" class="btn btn-bugs-primary w-100 py-3">
                Sign In to Dashboard
            </button>
        </form>
    </div>
</div>
@endsection
