@extends('layouts.app')

@section('title', 'Admin Medicine Dashboard')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 fw-bold text-primary">Medicine Inventory Dashboard</h2>

    {{-- Flash Message --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Search + Create --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <form action="{{ route('admin.dashboard') }}" method="GET" class="d-flex flex-wrap align-items-center mb-2 mb-md-0" role="search">
            <input type="text" name="search" class="form-control me-2 mb-2 mb-sm-0" placeholder="Search by name or brand" value="{{ request('search') }}">
            <button type="submit" class="btn btn-outline-primary me-2 mb-2 mb-sm-0">Search</button>
            @if(request('search'))
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary mb-2 mb-sm-0">Clear</a>
            @endif
        </form>

        <a href="{{ route('admin.medicines.create') }}" class="btn btn-success btn-lg">
            <i class="bi bi-plus-circle me-1"></i> Add New Medicine
        </a>
    </div>

    {{-- Table --}}
    <div class="card shadow-sm">
        <div class="card-body">
            @if ($medicines->isEmpty())
                <p class="text-muted text-center">No medicines found.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($medicines as $medicine)
                                <tr>
                                    <td>{{ $loop->iteration + ($medicines->firstItem() - 1) }}</td>
                                    <td>{{ $medicine->name }}</td>
                                    <td>{{ $medicine->quantity }}</td>
                                    <td>${{ number_format($medicine->price, 2) }}</td>
                                    <td>
                                        <a href="{{ route('admin.medicines.show', $medicine->id) }}" class="btn btn-info btn-sm me-1" title="View Medicine">
                                            <i class="bi bi-eye"></i> View
                                        </a>
                                        <a href="{{ route('admin.medicines.edit', $medicine->id) }}" class="btn btn-warning btn-sm me-1" title="Edit Medicine">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.medicines.destroy', $medicine->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this medicine?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Medicine">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="mt-4">
                    {{ $medicines->withQueryString()->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
