@extends('layouts.app')

@section('title', 'Manage Orders — BUGS Admin')

@section('content')
<div class="container py-5">
    @include('pages.admin.nav')

    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-2">
        <div>
            <h3 class="font-display text-white mb-1">Customer Orders</h3>
            <p class="text-secondary small mb-0">View customer orders, delivery requests, and update order statuses.</p>
        </div>
    </div>

    <div class="bugs-card border p-3">
        <div class="table-responsive">
            <table class="table table-dark table-hover align-middle mb-0 small">
                <thead>
                    <tr class="text-secondary">
                        <th>Order #</th>
                        <th>Date</th>
                        <th>Customer</th>
                        <th>Fulfillment</th>
                        <th>Items</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th class="text-end">Update Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                    <tr>
                        <td>
                            <a href="{{ route('orders.show', $order->order_number) }}" target="_blank" class="font-mono fw-semibold text-primary text-decoration-none">
                                {{ $order->order_number }}
                            </a>
                        </td>
                        <td class="text-muted text-nowrap">
                            {{ $order->created_at->format('M d, Y') }}<br>
                            <span class="small">{{ $order->created_at->format('g:i A') }}</span>
                        </td>
                        <td>
                            <div class="fw-semibold text-white">{{ $order->customer_name }}</div>
                            <div class="text-secondary small"><i class="bi bi-telephone me-1"></i>{{ $order->customer_phone }}</div>
                            @if($order->customer_email)
                                <div class="text-muted small"><i class="bi bi-envelope me-1"></i>{{ $order->customer_email }}</div>
                            @endif
                        </td>
                        <td>
                            <span class="badge bg-dark border text-capitalize">{{ str_replace('_', ' ', $order->fulfillment_type) }}</span>
                            @if($order->fulfillment_type === 'delivery' && $order->delivery_address)
                                <div class="text-muted small mt-1" style="max-width: 180px;">{{ $order->delivery_address }}, {{ $order->delivery_city }} {{ $order->delivery_zip }}</div>
                            @endif
                        </td>
                        <td>
                            <div class="text-white">{{ $order->items->count() }} item(s)</div>
                            <div class="text-muted small">
                                @foreach($order->items->take(2) as $item)
                                    <div>{{ $item->quantity }}x {{ Str::limit($item->product_name, 20) }}</div>
                                @endforeach
                                @if($order->items->count() > 2)
                                    <div class="fst-italic">+{{ $order->items->count() - 2 }} more</div>
                                @endif
                            </div>
                        </td>
                        <td>
                            <div class="fw-bold text-primary font-mono fs-6">${{ number_format($order->total, 2) }}</div>
                            <div class="text-muted small font-mono">Tax: ${{ number_format($order->tax, 2) }}</div>
                        </td>
                        <td>
                            <span class="badge {{ $order->status === 'completed' ? 'bg-success' : ($order->status === 'cancelled' ? 'bg-danger' : ($order->status === 'ready_for_pickup' ? 'bg-info text-black' : 'bg-warning text-black')) }}">
                                {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                            </span>
                        </td>
                        <td class="text-end">
                            <form action="{{ route('admin.orders.status', $order) }}" method="POST" class="d-inline-flex gap-1 align-items-center">
                                @csrf
                                @method('PATCH')
                                <select name="status" class="form-select form-select-sm bugs-input py-1" style="width: 140px; font-size: 0.8rem;">
                                    <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="confirmed" {{ $order->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                    <option value="ready_for_pickup" {{ $order->status === 'ready_for_pickup' ? 'selected' : '' }}>Ready for Pickup</option>
                                    <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                                <button type="submit" class="btn btn-sm btn-bugs-outline py-1 px-2" title="Save Status">
                                    <i class="bi bi-check2"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-5 text-secondary">
                            No customer orders received yet.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($orders->hasPages())
            <div class="p-3 border-top" style="border-color: var(--bugs-border) !important;">
                {{ $orders->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
