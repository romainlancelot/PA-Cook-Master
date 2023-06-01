@extends('layouts.app-master')

@section('title', 'Romes')
@section('content')
<link href="{{ asset('assets/css/rooms.css') }}" rel="stylesheet">

<div class="bg-light p-5 rounded">
    <div class="d-flex justify-content-center">
        <a href="{{ route('rooms.create') }}" class="btn btn-primary">Add Room</a>
    </div>
    <div class="container">
        <ul class="cards">
            @foreach ($rooms as $room)
            <li class="card">
                    <img class="card-img-top" src="{{ asset('storage/images/rooms/roomphoto.jpg') }}" alt="Room Photo">
                    <div>
                    <h3 class="card-title">{{$room->name}}</h3>
                    <div class="card-content">
                      <p>{{$room->description}}</p>
                    </div>
                  </div>
                  <div class="card-link-wrapper card-footer">
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
                  </div>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="container">
        <ul class="cards">
            @foreach ($rooms as $room)
            <li class="card">
                    <img class="card-img-top" src="{{ asset('storage/images/rooms/roomphoto.jpg') }}" alt="Room Photo">
                    <div>
                    <h3 class="card-title">{{$room->name}}</h3>
                    <div class="card-content">
                      <p>{{$room->description}}</p>
                    </div>
                  </div>
                  <div class="card-link-wrapper card-footer">
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
                  </div>
                </li>
            @endforeach
        </ul>
    </div>
    
</div>
@endsection
