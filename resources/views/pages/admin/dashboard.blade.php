@extends('layouts.app')

@section('title', 'Admin Dashboard — BUGS Wireless & Smoke Shop')

@section('content')
<div class="container py-5">
    @include('pages.admin.nav')

    <!-- Metrics Cards -->
    <div class="row g-3 mb-5">
        <div class="col-6 col-lg-3">
            <div class="bugs-card p-4 h-100 border">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="text-secondary small text-uppercase">Products</span>
                    <i class="bi bi-box-seam text-primary fs-4"></i>
                </div>
                <div class="fs-2 fw-bold text-white mb-1">{{ $totalProducts }}</div>
                <div class="text-muted small">{{ $activeProducts }} active in store</div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="bugs-card p-4 h-100 border">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="text-secondary small text-uppercase">Orders</span>
                    <i class="bi bi-bag-check text-primary fs-4"></i>
                </div>
                <div class="fs-2 fw-bold text-white mb-1">{{ $totalOrders }}</div>
                <div class="text-warning small"><i class="bi bi-hourglass-split me-1"></i>{{ $pendingOrders }} pending</div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="bugs-card p-4 h-100 border">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="text-secondary small text-uppercase">Revenue</span>
                    <i class="bi bi-currency-dollar text-primary fs-4"></i>
                </div>
                <div class="fs-2 fw-bold text-white mb-1">${{ number_format($totalRevenue, 2) }}</div>
                <div class="text-muted small">All-time order volume</div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="bugs-card p-4 h-100 border">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="text-secondary small text-uppercase">Repair Inquiries</span>
                    <i class="bi bi-tools text-primary fs-4"></i>
                </div>
                <div class="fs-2 fw-bold text-white mb-1">{{ $totalInquiries }}</div>
                <div class="text-warning small"><i class="bi bi-hourglass-split me-1"></i>{{ $pendingInquiries }} pending review</div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="d-flex flex-wrap gap-2 mb-4">
        <a href="{{ route('admin.products.create') }}" class="btn btn-bugs-gold">
            <i class="bi bi-plus-lg me-1"></i> Add New Product
        </a>
        <a href="{{ route('admin.orders') }}" class="btn btn-bugs-outline">
            <i class="bi bi-list-check me-1"></i> Manage Orders
        </a>
        <a href="{{ route('admin.inquiries') }}" class="btn btn-bugs-outline">
            <i class="bi bi-wrench-adjustable me-1"></i> View Repair Quotes
        </a>
    </div>

    <!-- Recent Tables -->
    <div class="row g-4">
        <!-- Recent Orders -->
        <div class="col-lg-7">
            <div class="bugs-card p-4 border h-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="font-display text-white mb-0">Recent Customer Orders</h5>
                    <a href="{{ route('admin.orders') }}" class="btn btn-link btn-sm text-primary text-decoration-none">View All &rarr;</a>
                </div>
                @if($recentOrders->isEmpty())
                    <p class="text-secondary small py-4 text-center mb-0">No orders placed yet.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-dark table-hover align-middle mb-0 small">
                            <thead>
                                <tr class="text-secondary">
                                    <th>Order #</th>
                                    <th>Customer</th>
                                    <th>Type</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentOrders as $order)
                                <tr>
                                    <td class="font-mono fw-semibold text-primary">{{ $order->order_number }}</td>
                                    <td>{{ $order->customer_name }}</td>
                                    <td class="text-capitalize">{{ str_replace('_', ' ', $order->fulfillment_type) }}</td>
                                    <td class="fw-semibold text-white">${{ number_format($order->total, 2) }}</td>
                                    <td>
                                        <span class="badge {{ $order->status === 'completed' ? 'bg-success' : ($order->status === 'cancelled' ? 'bg-danger' : 'bg-warning text-black') }}">
                                            {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

        <!-- Recent Repair Inquiries -->
        <div class="col-lg-5">
            <div class="bugs-card p-4 border h-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="font-display text-white mb-0">Latest Repair Inquiries</h5>
                    <a href="{{ route('admin.inquiries') }}" class="btn btn-link btn-sm text-primary text-decoration-none">View All &rarr;</a>
                </div>
                @if($recentInquiries->isEmpty())
                    <p class="text-secondary small py-4 text-center mb-0">No repair inquiries submitted yet.</p>
                @else
                    <div class="list-group list-group-flush bg-transparent">
                        @foreach($recentInquiries as $inq)
                        <div class="list-group-item bg-transparent text-white px-0 py-3 border-bottom" style="border-color: var(--bugs-border) !important;">
                            <div class="d-flex justify-content-between align-items-start mb-1">
                                <span class="fw-semibold">{{ $inq->name }}</span>
                                <span class="badge {{ $inq->status === 'completed' ? 'bg-success' : ($inq->status === 'contacted' ? 'bg-info text-black' : 'bg-warning text-black') }}">
                                    {{ ucfirst($inq->status) }}
                                </span>
                            </div>
                            <div class="text-secondary small mb-1">
                                <i class="bi bi-phone me-1"></i> {{ $inq->device_model }} &bull; {{ $inq->repair_needed }}
                            </div>
                            <div class="text-muted small">
                                <i class="bi bi-telephone me-1"></i> {{ $inq->phone }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

