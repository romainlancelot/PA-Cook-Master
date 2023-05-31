@extends('layouts.app-master')

@section('title', 'Services')
@section('content')
<link href="{{ asset('assets/css/services.css') }}" rel="stylesheet">

<div class="bg-light p-5 rounded">

    <h1>Services</h1>
    <div class="d-flex justify-content-center">
        <a href="{{ route('service.create') }}" class="btn btn-primary">Add Service</a>
    </div>

    <div class="row justify-content-center">
    <div class="service-card-container row col-auto w-50">
        @foreach ($services as $service)
        <div class="services-cards">
            <div class="card service-card">
                <div class="card-body">
                    <h5>{{ $service->name }}</h5>
                    <p>{{ $service->description }}</p>
                    <p class="card-text">Capacity: {{ $service->capacity }}</p>
                    <p class="card-text">Facilities: {{ $service->facilities }}</p>
                    <p class="card-text">Availability: {{ $service->availabilities }}</p>
                    <p class="card-text">Price: {{ $service->price }}</p>
                    
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <form action="{{ route('service.destroy', $service->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                        <div class="col-auto">
                                <a href="{{ route('services.show', $service->id) }}" class="btn btn-primary">View Details</a>
                        </div>
                        <div class="col-auto">
                                <a href="{{ route('services.edit', $service->id) }}" class="btn btn-primary">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="service-card-container row col-auto w-50">
        @foreach ($services as $service)
        <div class="services-cards">
            <div class="card service-card">
                <div class="card-body">
                    <h5>{{ $service->name }}</h5>
                    <p>{{ $service->description }}</p>
                    <p class="card-text">Capacity: {{ $service->capacity }}</p>
                    <p class="card-text">Facilities: {{ $service->facilities }}</p>
                    <p class="card-text">Availability: {{ $service->availabilities }}</p>
                    <p class="card-text">Price: {{ $service->price }}</p>
                    
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <form action="{{ route('service.destroy', $service->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                        <div class="col-auto">
                                <a href="{{ route('services.show', $service->id) }}" class="btn btn-primary">View Details</a>
                        </div>
                        <div class="col-auto">
                                <a href="{{ route('services.edit', $service->id) }}" class="btn btn-primary">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    </div>

</div>
@endsection