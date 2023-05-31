@extends('layouts.app-master')

@section('title', 'Romes')
@section('content')
<link href="{{ asset('assets/css/rooms.css') }}" rel="stylesheet">

    <div class="bg-light p-5 rounded">
        <h1>Rooms</h1>
        <div class="d-flex justify-content-center">
            <a href="{{ route('rooms.create') }}" class="btn btn-primary">Add Room</a>
        </div>

        <div class="row rooms-container">
          <div class="slider-container">
            <div class="slider">
              @foreach ($rooms as $room)
                <div class="card room-card col-md-4 mb-4">
                  <!-- <div class="room-card"> -->
                  <div class="card-body">
                            <h5 class="card-title">{{ $room->name }}</h5>
                        
                            <div class="row justify-content-center">
                            @if (!empty($room->photos))
                                @foreach(json_decode($room->photos) as $photo)
                                    <div class="col-auto">
                                        <img src="{{ asset($photo) }}" alt="photo">
                                    </div>
                                @endforeach
                            @endif

                            </div>
                        
                            <p class="card-text">Address: {{ $room->address }}</p>
                            <p class="card-text">Description: {{ $room->description }}</p>
                            <div class="row justify-content-center">
                                <div class="col-auto">
                                    <p class="card-text">Capacity: {{ $room->capacity }}</p>
                                </div>
                                <div class="col-auto">
                                    <p class="card-text">Facilities: {{ $room->facilities }}</p>
                                </div>
                                <div class="col-auto">
                                    <p class="card-text">Availability: {{ $room->availabilities }}</p>
                                </div>
                            </div>
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
                                    <a href="{{ route('rooms.show', $room->id) }}" class="btn btn-primary">View Details</a>
                                </div>
                                <div class="col-auto">
                                    <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-primary">Edit</a>
                                </div>
                            <!-- </div> -->
                        </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/js/rooms.js') }}"></script>

@endsection
