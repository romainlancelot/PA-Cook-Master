@extends('layouts.app-master')

@section('title', 'Romes')
@section('content')
<link href="{{ asset('assets/css/rooms.css') }}" rel="stylesheet">

<div class="bg-light p-5 rounded">
    <div class="container">
        <ul class="cards">
            @foreach ($rooms as $room)
            <li class="card">

                    <div id="carouselExampleIndicators" class="carousel slide">
                        <div class="carousel-indicators">
                            @foreach (preg_replace('/public/', '', $room->json2array($room->photos)) as $photo)
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}" aria-current="{{ $loop->first ? 'true' : '' }}" aria-label="Slide {{ $loop->index }}"></button>
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @foreach (preg_replace('/public/', '', $room->json2array($room->photos)) as $photo)
                                <div class="carousel-item active">
                                    <img src="{{ asset($photo) }}" class="d-block w-100" alt="...">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
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
