<div class="d-flex flex-wrap justify-content-between align-items-center pb-3 mb-4 border-bottom" style="border-color: var(--bugs-border) !important;">
    <div class="d-flex align-items-center gap-3">
        <span class="fs-4 fw-bold font-display text-white">BUGS<span style="color: var(--bugs-primary)">.</span> Admin</span>
        <span class="badge rounded-pill {{ (Auth::user() && method_exists(Auth::user(), 'isSuperAdmin') && Auth::user()->isSuperAdmin()) ? 'bg-warning text-black' : 'bg-primary text-black' }} px-2 py-1 small fw-bold">
            {{ (Auth::user() && method_exists(Auth::user(), 'isSuperAdmin') && Auth::user()->isSuperAdmin()) ? 'SUPER ADMIN' : 'STAFF PORTAL' }}
        </span>
    </div>
    <div class="d-flex align-items-center gap-2 mt-2 mt-sm-0">
        <span class="text-secondary small me-2">{{ Auth::user()->name ?? 'Admin' }}</span>
        <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-sm btn-bugs-outline py-1 px-3">
                <i class="bi bi-box-arrow-right me-1"></i> Logout
            </button>
        </form>
    </div>
</div>

<ul class="nav nav-pills gap-2 mb-4">
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active bg-primary text-black fw-semibold' : 'text-secondary' }}" href="{{ route('admin.dashboard') }}">
            <i class="bi bi-speedometer2 me-1"></i> Dashboard
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.products*') ? 'active bg-primary text-black fw-semibold' : 'text-secondary' }}" href="{{ route('admin.products') }}">
            <i class="bi bi-box-seam me-1"></i> Products
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.orders*') ? 'active bg-primary text-black fw-semibold' : 'text-secondary' }}" href="{{ route('admin.orders') }}">
            <i class="bi bi-bag-check me-1"></i> Orders
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.inquiries*') ? 'active bg-primary text-black fw-semibold' : 'text-secondary' }} d-inline-flex align-items-center" href="{{ route('admin.inquiries') }}">
            <i class="bi bi-chat-left-dots me-1"></i> Inquiries
            @if(isset($pendingInquiriesCount) && $pendingInquiriesCount > 0)
                <span class="badge rounded-pill bg-warning text-black ms-2 px-2 py-0.5" style="font-size: 11px;">{{ $pendingInquiriesCount }}</span>
            @endif
        </a>
    </li>
    <li class="nav-item ms-auto">
        <a class="nav-link text-secondary" href="{{ route('home') }}" target="_blank">
            <i class="bi bi-box-arrow-up-right me-1"></i> View Live Store
        </a>
    </li>
</ul>

@if(session('success'))
    <div class="alert alert-success border-0 text-white alert-dismissible fade show mb-4" style="background-color: #198754;" role="alert">
        <i class="bi bi-check-circle-fill me-1"></i> {{ session('success') }}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

