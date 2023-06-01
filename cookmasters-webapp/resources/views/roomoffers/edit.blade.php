@extends('layouts.app-master')

@section('title', 'Edit Room Offer')

@section('content')
    <div class="bg-light p-5 rounded">
        <div class="container">
            <h1>Edit Room Offer</h1>
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('roomoffers.update', $roomoffer->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $roomoffer->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" id="description" class="form-control" required>{{ $roomoffer->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="availabilities">Availabilities:</label>
                            <input type="text" name="availabilities" id="availabilities" class="form-control" value="{{ $roomoffer->availabilities }}" required>
                        </div>
                        <div class="form-group">
                            <label for="duration">Duration:</label>
                            <input type="text" name="duration" id="duration" class="form-control" value="{{ $roomoffer->duration }}" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="text" name="price" id="price" class="form-control" value="{{ $roomoffer->price }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
