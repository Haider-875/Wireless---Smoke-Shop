@extends('layouts.app')

@section('title', 'Manage Inquiries — BUGS Admin')

@section('content')
<div class="container py-5">
    @include('pages.admin.nav')

    <!-- Page Header & Action -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <div>
            <div class="d-inline-flex align-items-center gap-2 mb-1">
                <span class="badge rounded-pill bg-primary text-black fw-bold px-2 py-1 small">Counter Desk</span>
                <span class="text-secondary small">Live Customer Requests</span>
            </div>
            <h2 class="font-display text-white mb-1">Device &amp; Repair Inquiries</h2>
            <p class="text-secondary small mb-0">Review incoming phone purchase requests, stock holds, trade-in valuations, and repair quotes.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="tel:+13144412851" class="btn btn-sm btn-bugs-outline py-2 px-3 gap-2 d-inline-flex align-items-center">
                <i class="bi bi-telephone text-warning"></i> Call Counter (314-441-2851)
            </a>
        </div>
    </div>

    <!-- Metrics Cards Strip -->
    <div class="row g-3 mb-4">
        <div class="col-6 col-lg-3">
            <div class="bugs-card p-3 p-md-4 h-100 border" style="border-color: var(--bugs-border) !important;">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="text-secondary small text-uppercase fw-semibold">Total Inquiries</span>
                    <i class="bi bi-chat-left-dots text-primary fs-5"></i>
                </div>
                <div class="fs-3 fw-bold text-white mb-1">{{ $counts['all'] ?? 0 }}</div>
                <div class="text-muted small">All-time submissions</div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="bugs-card p-3 p-md-4 h-100 border" style="border-color: rgba(255, 184, 0, 0.3) !important;">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="text-secondary small text-uppercase fw-semibold">Pending Review</span>
                    <i class="bi bi-hourglass-split text-warning fs-5"></i>
                </div>
                <div class="fs-3 fw-bold text-warning mb-1">{{ $counts['pending'] ?? 0 }}</div>
                <div class="text-warning small fw-medium">Requires customer follow-up</div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="bugs-card p-3 p-md-4 h-100 border" style="border-color: var(--bugs-border) !important;">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="text-secondary small text-uppercase fw-semibold">Device / Phones</span>
                    <i class="bi bi-phone text-info fs-5"></i>
                </div>
                <div class="fs-3 fw-bold text-white mb-1">{{ $counts['device_inquiries'] ?? 0 }}</div>
                <div class="text-muted small">Purchase &amp; stock holds</div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="bugs-card p-3 p-md-4 h-100 border" style="border-color: var(--bugs-border) !important;">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="text-secondary small text-uppercase fw-semibold">Repair Bench</span>
                    <i class="bi bi-tools text-primary fs-5"></i>
                </div>
                <div class="fs-3 fw-bold text-white mb-1">{{ $counts['repair_quotes'] ?? 0 }}</div>
                <div class="text-muted small">Diagnostics &amp; repairs</div>
            </div>
        </div>
    </div>

    <!-- Filter Tabs & Search Bar -->
    <div class="bugs-card border p-3 mb-4" style="border-color: var(--bugs-border) !important;">
        <div class="row g-3 align-items-center justify-content-between">
            <!-- Status Tabs -->
            <div class="col-xl-7 col-lg-8">
                <div class="d-flex flex-wrap gap-1">
                    <a href="{{ route('admin.inquiries', array_merge(request()->except('status', 'page'), [])) }}" 
                       class="btn btn-sm {{ !request('status') ? 'btn-bugs-primary text-black fw-bold' : 'btn-bugs-outline text-secondary' }} py-1.5 px-3 rounded-pill">
                        All ({{ $counts['all'] ?? 0 }})
                    </a>
                    <a href="{{ route('admin.inquiries', array_merge(request()->except('status', 'page'), ['status' => 'pending'])) }}" 
                       class="btn btn-sm {{ request('status') === 'pending' ? 'btn-warning text-black fw-bold' : 'btn-bugs-outline text-secondary' }} py-1.5 px-3 rounded-pill">
                        Pending ({{ $counts['pending'] ?? 0 }})
                    </a>
                    <a href="{{ route('admin.inquiries', array_merge(request()->except('status', 'page'), ['status' => 'contacted'])) }}" 
                       class="btn btn-sm {{ request('status') === 'contacted' ? 'btn-primary text-black fw-bold' : 'btn-bugs-outline text-secondary' }} py-1.5 px-3 rounded-pill">
                        Contacted ({{ $counts['contacted'] ?? 0 }})
                    </a>
                    <a href="{{ route('admin.inquiries', array_merge(request()->except('status', 'page'), ['status' => 'in_progress'])) }}" 
                       class="btn btn-sm {{ request('status') === 'in_progress' ? 'btn-info text-black fw-bold' : 'btn-bugs-outline text-secondary' }} py-1.5 px-3 rounded-pill">
                        In Progress ({{ $counts['in_progress'] ?? 0 }})
                    </a>
                    <a href="{{ route('admin.inquiries', array_merge(request()->except('status', 'page'), ['status' => 'completed'])) }}" 
                       class="btn btn-sm {{ request('status') === 'completed' ? 'btn-success text-white fw-bold' : 'btn-bugs-outline text-secondary' }} py-1.5 px-3 rounded-pill">
                        Completed ({{ $counts['completed'] ?? 0 }})
                    </a>
                    <a href="{{ route('admin.inquiries', array_merge(request()->except('status', 'page'), ['status' => 'cancelled'])) }}" 
                       class="btn btn-sm {{ request('status') === 'cancelled' ? 'btn-danger text-white fw-bold' : 'btn-bugs-outline text-secondary' }} py-1.5 px-3 rounded-pill">
                        Cancelled ({{ $counts['cancelled'] ?? 0 }})
                    </a>
                </div>
            </div>

            <!-- Search Form & Type Filter -->
            <div class="col-xl-5 col-lg-4">
                <form action="{{ route('admin.inquiries') }}" method="GET" class="d-flex gap-2">
                    @if(request('status'))
                        <input type="hidden" name="status" value="{{ request('status') }}">
                    @endif
                    <select name="type" class="form-select form-select-sm bg-dark text-white border-secondary rounded-3" style="width: 140px; border-color: var(--bugs-border) !important;" onchange="this.form.submit()">
                        <option value="">All Types</option>
                        <option value="device_inquiry" {{ request('type') === 'device_inquiry' ? 'selected' : '' }}>📱 Phones</option>
                        <option value="repair_quote" {{ request('type') === 'repair_quote' ? 'selected' : '' }}>🔧 Repairs</option>
                        <option value="trade_in" {{ request('type') === 'trade_in' ? 'selected' : '' }}>🔄 Trade-ins</option>
                        <option value="general_inquiry" {{ request('type') === 'general_inquiry' ? 'selected' : '' }}>💬 General</option>
                    </select>

                    <div class="input-group input-group-sm">
                        <input type="text" name="search" value="{{ request('search') }}" class="form-control bg-dark text-white border-secondary rounded-start-3" placeholder="Search name, phone, device..." style="border-color: var(--bugs-border) !important;">
                        <button class="btn btn-bugs-primary text-black" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Inquiries Table -->
    <div class="bugs-card border p-3" style="border-color: var(--bugs-border) !important;">
        <div class="table-responsive">
            <table class="table table-dark table-hover align-middle mb-0 small">
                <thead>
                    <tr class="text-secondary" style="border-color: var(--bugs-border) !important;">
                        <th style="width: 90px;">Date &amp; Time</th>
                        <th>Customer</th>
                        <th>Type</th>
                        <th>Device of Interest</th>
                        <th>Specific Request</th>
                        <th>Notes / Questions</th>
                        <th>Status</th>
                        <th class="text-end" style="width: 220px;">Manage Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($inquiries as $inq)
                    <tr style="border-color: var(--bugs-border) !important;">
                        <td class="text-muted text-nowrap">
                            <span class="text-white">{{ $inq->created_at->format('M d, Y') }}</span><br>
                            <span class="caption-4 text-secondary">{{ $inq->created_at->format('g:i A') }}</span>
                        </td>
                        <td>
                            <div class="fw-semibold text-white">{{ $inq->name }}</div>
                            <div class="d-flex align-items-center gap-2 mt-1">
                                <a href="tel:{{ preg_replace('/[^0-9+]/', '', $inq->phone) }}" class="text-decoration-none text-primary small d-inline-flex align-items-center gap-1" title="Click to call customer">
                                    <i class="bi bi-telephone-fill" style="font-size: 11px;"></i> {{ $inq->phone }}
                                </a>
                                @if($inq->email)
                                    <span class="text-secondary">&bull;</span>
                                    <a href="mailto:{{ $inq->email }}" class="text-decoration-none text-secondary small hover-white" title="{{ $inq->email }}">
                                        <i class="bi bi-envelope"></i>
                                    </a>
                                @endif
                            </div>
                        </td>
                        <td>
                            @if($inq->inquiry_type === 'device_inquiry')
                                <span class="badge rounded-pill bg-info text-black fw-bold px-2 py-1">
                                    <i class="bi bi-phone me-1"></i>Phone Stock
                                </span>
                            @elseif($inq->inquiry_type === 'trade_in')
                                <span class="badge rounded-pill bg-warning text-black fw-bold px-2 py-1">
                                    <i class="bi bi-arrow-repeat me-1"></i>Trade-In
                                </span>
                            @elseif($inq->inquiry_type === 'general_inquiry')
                                <span class="badge rounded-pill bg-secondary text-white fw-bold px-2 py-1">
                                    <i class="bi bi-chat me-1"></i>General
                                </span>
                            @else
                                <span class="badge rounded-pill bg-primary text-black fw-bold px-2 py-1">
                                    <i class="bi bi-wrench-adjustable me-1"></i>Repair Quote
                                </span>
                            @endif
                        </td>
                        <td>
                            <div class="fw-medium text-white">{{ $inq->device_model }}</div>
                            @if($inq->product_id && $inq->product)
                                <a href="{{ route('shop.show', $inq->product->slug) }}" class="caption-4 text-primary text-decoration-none" target="_blank">
                                    View linked product &rarr;
                                </a>
                            @endif
                        </td>
                        <td>
                            <span class="text-white-50">{{ $inq->service_needed ?? 'General Inquiry' }}</span>
                        </td>
                        <td>
                            <div class="text-secondary" style="max-width: 240px; word-break: break-word;">
                                {{ $inq->notes ?: 'No additional notes.' }}
                            </div>
                        </td>
                        <td>
                            <span class="badge {{ $inq->status === 'completed' ? 'bg-success' : ($inq->status === 'cancelled' ? 'bg-danger' : ($inq->status === 'in_progress' ? 'bg-info text-black' : ($inq->status === 'contacted' ? 'bg-primary text-black' : 'bg-warning text-black'))) }} px-2 py-1 rounded-pill">
                                {{ ucfirst(str_replace('_', ' ', $inq->status)) }}
                            </span>
                        </td>
                        <td class="text-end">
                            <div class="d-inline-flex gap-1 align-items-center">
                                <form action="{{ route('admin.inquiries.status', $inq) }}" method="POST" class="d-inline-flex gap-1 align-items-center">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" class="form-select form-select-sm bg-dark text-white border-secondary py-1" style="width: 120px; font-size: 0.8rem; border-color: var(--bugs-border) !important;">
                                        <option value="pending" {{ $inq->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="contacted" {{ $inq->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                                        <option value="in_progress" {{ $inq->status === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                        <option value="completed" {{ $inq->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="cancelled" {{ $inq->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                    <button type="submit" class="btn btn-sm btn-bugs-outline py-1 px-2" title="Save Status">
                                        <i class="bi bi-check2"></i>
                                    </button>
                                </form>

                                <form action="{{ route('admin.inquiries.delete', $inq) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete inquiry #{{ $inq->id }}?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger py-1 px-2" title="Delete Inquiry">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-5 text-secondary">
                            <i class="bi bi-inbox fs-2 d-block mb-2 text-muted"></i>
                            No inquiries found matching the selected criteria.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($inquiries->hasPages())
            <div class="p-3 border-top" style="border-color: var(--bugs-border) !important;">
                {{ $inquiries->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
