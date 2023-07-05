@extends('layouts.home-master')

@section('title', 'Home')
@section('content')
<style>
    .list-group-item {
        cursor: pointer;
    }
    
    .list-group-item:hover {
        background-color: #e9ecef;
    }
    
    .card {
        border-radius: 10px;
        transition: transform .2s;
    }
    
    .card:hover {
        transform: scale(1.03);
    }
    
    .card-img-top {
        border-radius: 10px 10px 0 0;
    }
    
    .card-title {
        font-size: 1.25rem;
        color: #6c757d;
    }
    
    .btn-outline-secondary {
        border-color: #6c757d;
        color: #6c757d;
    }
    
    .btn-outline-secondary:hover {
        background-color: #6c757d;
        color: #f8f9fa;
    }
    
    .text-muted {
        font-size: 1rem;
        color: #343a40;
    }
</style>
@auth
    @if (auth()->user()->role_name() == 'admin')
        <a href="{{ route('equipment.create') }}" class="btn btn-success text-center">Ajouter</a>
    @endif
@endauth

<div class="container boutique my-5">
    <div class="row">
        <!-- Sidebar pour les filtres -->

            <div class="col-md-2">
                <form method="GET" action="{{ route('boutique.index') }}">
                    <div class="list-group">
                        <h3 class="my-4">Catégories</h3>
                        <div class="form-check list-group-item">
                            <input class="form-check-input" type="checkbox" value="Batteurs sur socle" id="Batteurs-sur-socle" name="categories[]">
                            <label class="form-check-label" for="Batteurs-sur-socle">Batteurs sur socle</label>
                        </div>
                        <div class="form-check list-group-item">
                            <input class="form-check-input" type="checkbox" value="Appareils électroménagers" id="Appareils-électroménagers" name="categories[]">
                            <label class="form-check-label" for="Appareils-électroménagers">Appareils électroménagers</label>
                        </div>
                        <div class="form-check list-group-item">
                            <input class="form-check-input" type="checkbox" value="Appareils de comptoirs" id="Appareils-de-comptoirs" name="categories[]">
                            <label class="form-check-label" for="Appareils-de-comptoirs">Appareils de comptoirs</label>
                        </div>
                        <!-- Ajoutez plus de catégories si nécessaire -->
                    </div>
                    <div>
                        <h3 class="my-4">Prix</h3>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="number" class="form-control" name="price_min" placeholder="Min Prix">
                            </div>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" name="price_max" placeholder="Max Prix">
                            </div>
                        </div>
                    </div>
                    <div class="my-4">
                        <h3 class="my-4">Rechercher</h3>
                        <input class="form-control mb-4" name="search" type="text" placeholder="Rechercher par nom">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Filtrer</button>
                    </div>
                </form>                
            </div>
        <!-- Produits -->
        
        <div class="col-md-10">
            <div class="row">
                @foreach ($equipments as $equipment)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        @php
                        $photos = json_decode($equipment->photos);
                        @endphp
                        @if(count($photos) > 0)
                            <img id="main-image" class="img-fluid" style="border-radius: 10px; width: auto; height: 120px; object-fit: cover;" src="{{ asset('storage/equipments/'.$photos[0]) }}" alt="{{ $equipment->name }}">
                        @endif
                        <div class="card-body d-flex flex-column"> <!-- Utilisation de flexbox pour l'alignement des éléments -->
                            <h5 class="card-title">{{$equipment->name}}</h5>
                            <div class="mt-auto"> <!-- Ajout de mt-auto pour coller les éléments restants en bas -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group row">
                                        <div class="col-md-6">
                                            <a href="{{ route('equipment.show', $equipment->id) }}" type="button" class="btn btn-sm btn-outline-secondary">Voir plus de détails</a> <!-- Nouveau bouton -->
                                        </div>
                                        <div class="col-md-6">
                                            <small class="text-muted"> {{$equipment->price}}€ Prix</small>
                                        </div>
                                    </div>
                                </div>
                                @auth
                                @if (auth()->user()->role_name() == 'admin')
                                <a href="{{ route('equipments.destroy', $equipment->id) }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $equipment->id }}').submit();">Delete</a>
                                <form id="delete-form-{{ $equipment->id }}" action="{{ route('equipments.destroy', $equipment->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <a href="{{ route('equipments.edit', $equipment->id) }}" class="btn btn-primary">Modifier</a>
                                @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection