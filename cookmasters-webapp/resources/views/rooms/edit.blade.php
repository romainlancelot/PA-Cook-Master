@extends('layouts.app-master')

@section('title', 'Update Room')
@section('content')
    <div class="bg-light p-5 rounded">
        <h1>Update Room</h1>
        <form action="{{ route('rooms.update', $room->id) }}" method="POST">
            @csrf
            @method('PUT')
            <!-- Add form fields for updating the room details -->
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="{{ $room->name }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="name">Address:</label>
                <input type="text" name="address" id="address" value="{{ $room->address }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control">{{ $room->description }}</textarea>
            </div>
            <!-- Add other form fields for updating room details -->
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
