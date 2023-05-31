@extends('layouts.app-master')

@section('title', 'Room Offer Details')

@section('content')
    <div class="bg-light p-5 rounded">
        <div class="container">
            <h1>Room Offer Details</h1>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $roomoffer->name }}</h5>
                    <p class="card-text">Description: {{ $roomoffer->description }}</p>
                    <p class="card-text">Availabilities: {{ $roomoffer->availabilities }}</p>
                    <p class="card-text">Duration: {{ $roomoffer->duration }}</p>
                    <p class="card-text">Price: {{ $roomoffer->price }}</p>
                    <a href="{{ route('roomoffers.edit', $roomoffer->id) }}" class="btn btn-primary">Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection
