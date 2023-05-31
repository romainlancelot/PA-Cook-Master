@extends('layouts.app-master')

@section('title', 'Service Details')
@section('content')
<div class="bg-light p-5 rounded">
    <h1>Service Details</h1>
    <div class="card">
        <div class="card-body">
            <h5>{{ $service->name }}</h5>
            <p>{{ $service->description }}</p>
            <p class="card-text">Capacity: {{ $service->capacity }}</p>
            <p class="card-text">Facilities: {{ $service->facilities }}</p>
            <p class="card-text">Availability: {{ $service->availabilities }}</p>
            <p class="card-text">Price: {{ $service->price }}</p>

            <div class="row justify-content-center">
                <div class="col-auto">
                    <a href="{{ route('services.edit', $service->id) }}" class="btn btn-primary">Edit</a>
                </div>
                <div class="col-auto">
                    <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
