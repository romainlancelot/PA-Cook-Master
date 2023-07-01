@extends('layouts.app-master')

@section('title', 'Create Equipment')

@section('content')
    <div class="bg-light p-5 rounded">
        <div class="container">
            <h1>Create Equipment</h1>
            <form action="{{ route('equipment.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="availabilities">Availabilities:</label>
                    <input type="text" name="availabilities" id="availabilities" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="availablequantity">Available Quantity:</label>
                    <input type="number" name="availablequantity" id="availablequantity" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="text" name="price" id="price" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
