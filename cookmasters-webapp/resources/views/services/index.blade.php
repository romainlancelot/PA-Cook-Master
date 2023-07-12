@extends('layouts.app-master')

@section('styles')
    <link href="{{ secure_asset('assets/css/services.css') }}" rel="stylesheet">
@endsection

@section('title', 'Services')
@section('content')
    <h1 class="mt-4">Services</h1>
<!-- 
    <div class="d-flex justify-content-center">
        <a href="{{ route('service.create') }}" class="btn btn-primary">Add Service</a>
    </div> -->

    <div class="row">
        <div class="col-3">
            @foreach ($services as $service)
                <div class="card text-bg-dark mb-3" onclick="more('{{ $service->id }}')">
                    <img src="{{ secure_asset(preg_replace('/public/', '', $service->json2array($service->photos)[0])) }}" class="card-img" alt="...">
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
                    <div id="carouselExampleIndicators" class="carousel slide">
                        <div class="carousel-indicators">
                            @foreach (preg_replace('/public/', '', $serviceInfos->json2array($serviceInfos->photos)) as $photo)
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}" aria-current="{{ $loop->first ? 'true' : '' }}" aria-label="Slide {{ $loop->index }}"></button>
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @foreach (preg_replace('/public/', '', $serviceInfos->json2array($serviceInfos->photos)) as $photo)
                                <div class="carousel-item active">
                                    <img src="{{ secure_asset($photo) }}" class="d-block w-100" alt="...">
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
                    <!-- <div class="card-footer text-center">
                        <small class="text-body-secondary">
                            <a href="{{ route('service.show', $serviceInfos->id) }}" class="btn btn-primary">View Details</a>
                            <a href="{{ route('service.edit', $serviceInfos->id) }}" class="btn btn-primary">Edit</a>
                        </small>
                    </div> -->
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