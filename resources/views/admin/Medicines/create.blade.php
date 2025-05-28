@extends('layouts.app')

@section('title', 'Add Medicine')

@section('content')
<div class="container mt-5">
    <h2>Add New Medicine</h2>

    <form action="{{ route('admin.medicines.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Medicine Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" class="form-control" min="1" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" class="form-control" step="0.01" min="0" required>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('admin.medicines.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
