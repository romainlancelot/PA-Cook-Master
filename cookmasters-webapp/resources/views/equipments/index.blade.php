@extends('layouts.app-master')

@section('title', 'Equipments')
@section('content')
<div class="container">
        <h1>Equipment Details</h1>
        @foreach ($equipments as $equipment)
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $equipment->name }}</h5>
            <div class="row justify-content-center">
                @foreach(json_decode($equipment->photos) as $photo)
                    <div class="col-auto">
                        <img src="{{ asset($photo) }}" alt="photo">
                    </div>
                @endforeach
            </div>
            <p class="card-text">Description: {{ $equipment->description }}</p>
            <p class="card-text">Availability: {{ $equipment->availabilities }}</p>
            <p class="card-text">Available Quantity: {{ $equipment->availablequantity }}</p>
            <p class="card-text">Price: {{ $equipment->price }}</p>
            <div class="row justify-content-center">
                <div class="col-auto">
                    <form action="{{ route('equipment.destroy', $equipment->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
                <div class="col-auto">
                    <a href="{{ route('equipment.show', $equipment->id) }}" class="btn btn-primary">View Details</a>
                </div>
                <div class="col-auto">
                    <a href="{{ route('equipment.edit', $equipment->id) }}" class="btn btn-primary">Edit</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    </div>
@endsection