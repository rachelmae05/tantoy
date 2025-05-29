@extends('layouts.app')

@section('title', 'View Medicine')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">View Medicine Details</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $medicine->id }}</p>
            <p><strong>Name:</strong> {{ $medicine->name }}</p>
            <p><strong>Quantity:</strong> {{ $medicine->quantity }}</p>
            <p><strong>Price:</strong> ${{ number_format($medicine->price, 2) }}</p>
        </div>
    </div>
<a href="{{ url('/admin/medicines') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
