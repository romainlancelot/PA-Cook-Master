@extends('layouts.app-master')

@section('title', 'Create Room')
@section('content')
    <div class="bg-light p-5 rounded">
    <div class="container">
        <h1>Create Room</h1>
        
        <form action="{{ route('rooms.store') }}" method="POST">
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
                <label for="capacity">Capacity:</label>
                <input type="number" name="capacity" id="capacity" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="facilities">Facilities:</label>
                <input type="text" name="facilities" id="facilities" class="form-control">
            </div>

            <div class="form-group">
                <label for="availabilities">Availabilities:</label>
                <input type="text" name="availabilities" id="availabilities" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" name="price" id="price" class="form-control" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create Room</button>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    </div>
@endsection
