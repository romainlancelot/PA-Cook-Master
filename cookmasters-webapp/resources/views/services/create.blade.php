@extends('layouts.app-master')

@section('title', 'Create Service')
@section('content')
<div class="bg-light p-5 rounded">
    <h1>Create Service</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('services.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                </div>

                <div class="form-group">
                    <label for="capacity">Capacity</label>
                    <input type="number" class="form-control" id="capacity" name="capacity" required>
                </div>

                <div class="form-group">
                    <label for="facilities">Facilities</label>
                    <input type="text" class="form-control" id="facilities" name="facilities" required>
                </div>

                <div class="form-group">
                    <label for="availabilities">Availability</label>
                    <input type="text" class="form-control" id="availabilities" name="availabilities" required>
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" step="0.01" class="form-control" id="price" name="price" required>
                </div>

                <button type="submit" class="btn btn-primary">Create Service</button>
            </form>
        </div>
    </div>
</div>
@endsection
