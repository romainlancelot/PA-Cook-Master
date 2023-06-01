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
                    <!-- <img class="card-img-top" src="{{ asset('') }}" alt="Room Photo"> -->
                    
                    <div class="row card-img-top justify-content-center">
                            @if (!empty($room->photos))
                                @foreach(json_decode($room->photos) as $photo)
                                    <div class="col-auto">
                                        <img src="{{ asset($photo) }}" alt="photo">
                                    </div>
                                @endforeach
                            @endif
                    </div>
                    
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
            @foreach ($equipments as $equipment)
            <li class="card">
                    <img class="card-img-top" src="{{ asset('storage/images/rooms/roomphoto.jpg') }}" alt="equipment Photo">
                    <div>
                    <h3 class="card-title">{{$equipment->name}}</h3>
                    <div class="card-content">
                      <p>{{$equipment->description}}</p>
                    </div>
                  </div>
                  <div class="card-link-wrapper card-footer">
                    <div class="row justify-content-center">
                            <div class="col-auto">
                                <p class="card-text">Capacity: {{ $equipment->capacity }}</p>
                            </div>
                            <div class="col-auto">
                                <p class="card-text">Facilities: {{ $equipment->facilities }}</p>
                            </div>
                            <div class="col-auto">
                                <p class="card-text">Availability: {{ $equipment->availabilities }}</p>
                            </div>
                        </div>    
                  </div>
                </li>
            @endforeach
        </ul>
    </div>
    
</div>
@endsection
