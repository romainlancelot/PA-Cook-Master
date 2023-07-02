@extends('layouts.app-master')

@section('title', 'Salles en location')

@section('content')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
<style>
    .pagination {
        justify-content: center;
    }

    .pagination .page-item:first-child .page-link {
        margin-left: 0;
        border-top-left-radius: .25rem;
        border-bottom-left-radius: .25rem;
    }

    .pagination .page-item:last-child .page-link {
        border-top-right-radius: .25rem;
        border-bottom-right-radius: .25rem;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        @foreach($rooms as $room)
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <div class="position-relative">
                    <img src="{{ asset('images/ateliers.jpeg') }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $room->name }}">
                    <div class="card-img-overlay d-flex justify-content-start align-items-end">
                        <h5 class="text-white bg-dark px-2" style="opacity: 0.8;">Prix: {{ $room->price }} €</h5>
                    </div>
                </div>
                <div class="card-body bg-light">
                    <h2 class="card-title text-dark">{{ $room->name }}</h2>
                    <p class="mb-2 text-secondary">
                        <i class="fas fa-map-marker-alt text-danger"></i>
                        {{ $room->address }}
                    </p>
                    <p class="text-secondary">
                        <i class="fas fa-users text-primary"></i>
                        Capacité : {{ $room->capacity }} personnes
                    </p>
                    <p class="text-secondary">
                        <i class="fas fa-clock text-primary"></i>
                        Disponibilité : Du lundi au vendredi
                    </p>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('rooms.show', $room) }}" class="btn btn-outline-dark">Voir les détails</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center py-4">
        {{ $rooms->links() }}
    </div>
</div>
@endsection
