@extends('layouts.app-master')

@section('title', 'Edit Equipment')
@section('content')
    <div class="bg-light p-5 rounded">
        <div class="container">
            <h1>Edit Equipment</h1>
            <form action="{{ route('equipment.update', $equipment->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $equipment->name }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" class="form-control" required>{{ $equipment->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="availabilities">Availability:</label>
                    <input type="text" name="availabilities" id="availabilities" class="form-control" value="{{ $equipment->availabilities }}" required>
                </div>
                <div class="form-group">
                    <label for="availablequantity">Available Quantity:</label>
                    <input type="number" name="availablequantity" id="availablequantity" class="form-control" value="{{ $equipment->availablequantity }}" required>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="text" name="price" id="price" class="form-control" value="{{ $equipment->price }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
