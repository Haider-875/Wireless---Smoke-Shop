@extends('layouts.app')

@section('title', 'Manage Repair Inquiries — BUGS Admin')

@section('content')
<div class="container py-5">
    @include('pages.admin.nav')

    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-2">
        <div>
            <h3 class="font-display text-white mb-1">Repair Inquiries</h3>
            <p class="text-secondary small mb-0">Track device repair requests, customer quotes, and repair work statuses.</p>
        </div>
    </div>

    <div class="bugs-card border p-3">
        <div class="table-responsive">
            <table class="table table-dark table-hover align-middle mb-0 small">
                <thead>
                    <tr class="text-secondary">
                        <th>Date</th>
                        <th>Customer</th>
                        <th>Device Model</th>
                        <th>Repair Needed</th>
                        <th>Description / Notes</th>
                        <th>Status</th>
                        <th class="text-end">Update Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($inquiries as $inq)
                    <tr>
                        <td class="text-muted text-nowrap">
                            {{ $inq->created_at->format('M d, Y') }}<br>
                            <span class="small">{{ $inq->created_at->format('g:i A') }}</span>
                        </td>
                        <td>
                            <div class="fw-semibold text-white">{{ $inq->name }}</div>
                            <div class="text-secondary small"><i class="bi bi-telephone me-1"></i>{{ $inq->phone }}</div>
                        </td>
                        <td>
                            <span class="badge bg-dark border text-white font-mono">{{ $inq->device_model }}</span>
                        </td>
                        <td>
                            <span class="fw-semibold text-primary">{{ $inq->repair_needed }}</span>
                        </td>
                        <td>
                            <div class="text-secondary small" style="max-width: 250px;">
                                {{ $inq->notes ?: 'No extra notes provided.' }}
                            </div>
                        </td>
                        <td>
                            <span class="badge {{ $inq->status === 'completed' ? 'bg-success' : ($inq->status === 'cancelled' ? 'bg-danger' : ($inq->status === 'in_progress' ? 'bg-info text-black' : ($inq->status === 'contacted' ? 'bg-primary text-black' : 'bg-warning text-black'))) }}">
                                {{ ucfirst(str_replace('_', ' ', $inq->status)) }}
                            </span>
                        </td>
                        <td class="text-end">
                            <form action="{{ route('admin.inquiries.status', $inq) }}" method="POST" class="d-inline-flex gap-1 align-items-center">
                                @csrf
                                @method('PATCH')
                                <select name="status" class="form-select form-select-sm bugs-input py-1" style="width: 130px; font-size: 0.8rem;">
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
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-secondary">
                            No repair inquiries submitted yet.
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
