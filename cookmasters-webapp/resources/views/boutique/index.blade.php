@extends('layouts.home-master')

@section('title', 'Home')
@section('content')
<style>
.container {
    background-color: #f8f9fa;
}

.list-group-item {
    cursor: pointer;
}

.list-group-item:hover {
    background-color: #e9ecef;
}

.card {
    border-radius: 15px;
    transition: transform .2s;
}

.card:hover {
    transform: scale(1.03);
}

.card-img-top {
    border-radius: 15px 15px 0 0;
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
<a href="{{ route('equipment.create') }}" class="btn btn-success text-center">Ajouter</a>

<div class="container my-5">
    <div class="row">

        <!-- Sidebar pour les filtres -->
        <div class="col-md-3">
            <div class="list-group">
                <h3 class="my-4">Catégories</h3>
                <a href="#" class="list-group-item">Ustensiles de cuisine</a>
                <a href="#" class="list-group-item">Appareils électroménagers</a>
                <a href="#" class="list-group-item">Livres de recettes</a>
                <!-- Ajoutez plus de catégories si nécessaire -->
            </div>
            <div class="my-4">
                <h3 class="my-4">Prix</h3>
                <div class="row">
                    <div class="col-sm-6">
                        <input type="number" class="form-control" id="min-price" placeholder="Min Prix">
                    </div>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" id="max-price" placeholder="Max Prix">
                    </div>
                </div>
            </div>

            <!-- Ajoutez plus de filtres si nécessaire -->
        </div>

  <!-- Produits -->

<div class="col-md-9">
    <div class="row">
        @foreach ($equipments as $equipment)
        <div class="col-md-4 mb-4"> <!-- Ajout de la classe mb-4 pour donner de l'espace entre les lignes -->
            <div class="card shadow-sm h-100">
                @php
                    $photos = json_decode($equipment->photos);
                @endphp
                @if(count($photos) > 0)
                    <img id="main-image" class="img-fluid" style="width: 300px; height: 300px; object-fit: cover;" src="{{ asset('storage/images/'.$photos[0]) }}" alt="{{ $equipment->name }}">
                @endif
                <div class="card-body d-flex flex-column"> <!-- Utilisation de flexbox pour l'alignement des éléments -->
                    <h5 class="card-title">{{$equipment->name}}</h5>
                    <p class="card-text flex-grow-1">{{$equipment->description}}</p> <!-- Ajout de flex-grow-1 pour que le texte prenne tout l'espace disponible -->
                    <div class="mt-auto"> <!-- Ajout de mt-auto pour coller les éléments restants en bas -->
                    <a href="{{ route('equipment.show', $equipment->id) }}" type="button" class="btn btn-sm btn-outline-secondary">Voir plus de détails</a> <!-- Nouveau bouton -->
                    <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">Vue</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Ajouter au panier</button>
                            </div>
                            <small class="text-muted"> {{$equipment->price}}€ Prix</small>
                        </div>
                        <a href="{{ route('equipments.destroy', $equipment->id) }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $equipment->id }}').submit();">Delete</a>
                        <form id="delete-form-{{ $equipment->id }}" action="{{ route('equipments.destroy', $equipment->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                        <a href="{{ route('equipments.edit', $equipment->id) }}" class="btn btn-primary">Modifier</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

                    <!-- @auth -->
                        <!-- @if (auth()->user()->role_name() == 'admin') -->
                        <!-- @endif -->
                    <!-- @endauth -->

    </div>
</div>

@endsection