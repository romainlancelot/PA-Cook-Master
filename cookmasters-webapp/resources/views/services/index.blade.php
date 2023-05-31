@extends('layouts.app-master')

@section('styles')
    <link href="{{ asset('assets/css/services.css') }}" rel="stylesheet">
@endsection

@section('title', 'Services')
@section('content')
    <h1 class="mt-4">Services</h1>

    <div class="d-flex justify-content-center">
        <a href="{{ route('service.create') }}" class="btn btn-primary">Add Service</a>
    </div>

    <div class="row">
        <div class="col-3">
            @foreach ($services as $service)
                <div class="card text-bg-dark mb-3" onclick="more('{{ $service->id }}')">
                    <img src="{{ asset(preg_replace('/public/', '', $service->json2array($service->photos)[0])) }}" class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <h5 class="card-title">{{ $service->name }}</h5>
                        <p class="card-text">{{ $service->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-9">
            @if (isset($serviceInfos))
                <div class="card mb-3">
                    <img src="{{ asset(preg_replace('/public/', '', $serviceInfos->json2array($serviceInfos->photos)[0])) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $serviceInfos->name }}</h5>
                        <p class="card-text">
                            {{ $serviceInfos->description }}
                            <hr>
                            <ul>
                                <li>Capacity: {{ $serviceInfos->capacity }}</li>
                                <li>Facilities: {{ $serviceInfos->facilities }}</li>
                                <li>Availability: {{ $serviceInfos->availabilities }}</li>
                                <li>Price: {{ $serviceInfos->price }}</li>
                            </ul>
                        </p>
                    </div>
                    <div class="card-footer text-center">
                        <small class="text-body-secondary">
                            <a href="{{ route('service.show', $serviceInfos->id) }}" class="btn btn-primary">View Details</a>
                            <a href="{{ route('service.edit', $serviceInfos->id) }}" class="btn btn-primary">Edit</a>
                        </small>
                    </div>
                </div>
            @else
                <div class="text-center mt-5">
                    <h4>Click on a service to view more details</h4>
                </div>
            @endif
        </div>

    </div>
@endsection

<script>
    function more(id) {
        console.log(id);
        window.location.href = "/services/" + id;
    }
</script>