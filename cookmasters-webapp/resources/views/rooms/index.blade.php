@extends('layouts.app-master')

@section('title', 'Home')
@section('content')
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <div class="bg-light p-5 rounded">
        <h1>Rooms</h1>
        <div class="d-flex justify-content-center">
            <a href="{{ route('rooms.create') }}" class="btn btn-primary">Add Room</a>
        </div>
        <div class="card room-card-container row animate__animated animate__slideInLeft">

            @foreach ($rooms as $room)
                <div class="col-md-4 mb-4">
                    <div class="card animate__animated animate__fadeInLeft">
                        <div class="card-body">
                            <h5 class="card-title">{{ $room->name }}</h5>
                            <p class="card-text">Description: {{ $room->description }}</p>
                            <p class="card-text">Capacity: {{ $room->capacity }}</p>
                            <p class="card-text">Facilities: {{ $room->facilities }}</p>
                            <p class="card-text">Availability: {{ $room->availabilities }}</p>
                            <p class="card-text">Price: {{ $room->price }}</p>
                            <div class="row justify-content-center">
                                <div class="col-auto">
                                    <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                                <div class="col-auto">
                                    <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-primary">Edit</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
