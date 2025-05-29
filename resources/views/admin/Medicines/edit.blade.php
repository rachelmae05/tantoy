@extends('layouts.app')

@section('title', 'Edit Medicine')

@section('content')
<div class="container mt-5">
    <h2>Edit Medicine</h2>

    <form action="{{ route('admin.medicines.update', $medicine->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Medicine Name</label>
            <input type="text" name="name" class="form-control" value="{{ $medicine->name }}" required>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" class="form-control" value="{{ $medicine->quantity }}" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" class="form-control" value="{{ $medicine->price }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
       <a href="{{ route('admin.medicines.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
