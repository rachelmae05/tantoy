@extends('layouts.app')

@section('title', 'Manage Medicines')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Medicine Inventory Management</h2>

    <!-- Flash Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Search & Add -->
    <div class="d-flex justify-content-between mb-3">
        <form action="{{ route('admin.medicines.index') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control me-2" placeholder="Search by name or brand" value="{{ request('search') }}">
            <button type="submit" class="btn btn-outline-primary">Search</button>
            @if(request('search'))
                <a href="{{ route('admin.medicines.index') }}" class="btn btn-outline-secondary ms-2">Clear</a>
            @endif
        </form>
        <a href="{{ route('admin.medicines.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add New Medicine
        </a>
    </div>

    <!-- Medicine Table -->
    <div class="card">
        <div class="card-body">
            @if($medicines->isEmpty())
                <p class="text-muted">No medicines found.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Brand</th>
                                <th>Quantity</th>
                                <th>Expiry Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($medicines as $medicine)
                                <tr>
                                    <td>{{ $medicine->id }}</td>
                                    <td>{{ $medicine->name }}</td>
                                    <td>{{ $medicine->brand }}</td>
                                    <td>{{ $medicine->quantity }}</td>
                                    <td>{{ \Carbon\Carbon::parse($medicine->expiry_date)->format('M d, Y') }}</td>
                                    <td>
                                        <a href="{{ route('admin.medicines.edit', $medicine->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.medicines.destroy', $medicine->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this medicine?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-3">
                    {{ $medicines->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
