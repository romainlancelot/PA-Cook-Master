@extends('layouts.app-master')

@section('title', 'Rooms')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="text-center">Boutique - Matériel de cuisine</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="product-item">
        <div class="product-image">
          <img src="images/product1.jpg" alt="Produit 1">
        </div>
        <div class="product-details">
          <h3>Nom du produit 1</h3>
          <p>Description du produit 1</p>
          <p class="price">$99.99</p>
          <a href="#" class="btn btn-primary">Ajouter au panier</a>
        </div>
      </div>
<!--       
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
    </div> -->
    <div class="col-md-4">
      <div class="product-item">
        <div class="product-image">
          <img src="images/product2.jpg" alt="Produit 2">
        </div>
        <div class="product-details">
          <h3>Nom du produit 2</h3>
          <p>Description du produit 2</p>
          <p class="price">$49.99</p>
          <a href="#" class="btn btn-primary">Ajouter au panier</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="product-item">
        <div class="product-image">
          <img src="images/product3.jpg" alt="Produit 3">
        </div>
        <div class="product-details">
          <h3>Nom du produit 3</h3>
          <p>Description du produit 3</p>
          <p class="price">$79.99</p>
          <a href="#" class="btn btn-primary">Ajouter au panier</a>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="product-item">
        <div class="product-image">
          <img src="images/product4.jpg" alt="Produit 4">
        </div>
        <div class="product-details">
          <h3>Nom du produit 4</h3>
          <p>Description du produit 4</p>
          <p class="price">$29.99</p>
          <a href="#" class="btn btn-primary">Ajouter au panier</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="product-item">
        <div class="product-image">
          <img src="images/product5.jpg" alt="Produit 5">
        </div>
        <div class="product-details">
          <h3>Nom du produit 5</h3>
          <p>Description du produit 5</p>
          <p class="price">$149.99</p>
          <a href="#" class="btn btn-primary">Ajouter au panier</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="product-item">
        <div class="product-image">
          <img src="images/product6.jpg" alt="Produit 6">
        </div>
        <div class="product-details">
          <h3>Nom du produit 6</h3>
          <p>Description du produit 6</p>
          <p class="price">$39.99</p>
          <a href="#" class="btn btn-primary">Ajouter au panier</a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
    <div class="row">
    <div class="col-md-12">
      <h2 class="text-center">Salles en location</h2>
    </div>
  </div>
    <div class="row">
      <div class="col-md-4">
        <div class="card mb-4">
          <img src="path/to/image1.jpg" class="card-img-top" alt="Salle 1">
          <div class="card-body">
            <h5 class="card-title">Salle 1</h5>
            <p class="card-text">Description de la salle 1.</p>
            <ul class="list-group">
              <li class="list-group-item">Capacité : 50 personnes</li>
              <li class="list-group-item">Équipements : Cuisine, projecteur, tables, chaises</li>
              <li class="list-group-item">Disponibilité : Du lundi au vendredi</li>
            </ul>
            <a href="#" class="btn btn-primary">Réserver</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4">
          <img src="path/to/image1.jpg" class="card-img-top" alt="Salle 1">
          <div class="card-body">
            <h5 class="card-title">Salle 1</h5>
            <p class="card-text">Description de la salle 1.</p>
            <ul class="list-group">
              <li class="list-group-item">Capacité : 50 personnes</li>
              <li class="list-group-item">Équipements : Cuisine, projecteur, tables, chaises</li>
              <li class="list-group-item">Disponibilité : Du lundi au vendredi</li>
            </ul>
            <a href="#" class="btn btn-primary">Réserver</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4">
          <img src="path/to/image1.jpg" class="card-img-top" alt="Salle 1">
          <div class="card-body">
            <h5 class="card-title">Salle 1</h5>
            <p class="card-text">Description de la salle 1.</p>
            <ul class="list-group">
              <li class="list-group-item">Capacité : 50 personnes</li>
              <li class="list-group-item">Équipements : Cuisine, projecteur, tables, chaises</li>
              <li class="list-group-item">Disponibilité : Du lundi au vendredi</li>
            </ul>
            <a href="#" class="btn btn-primary">Réserver</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4">
          <img src="path/to/image1.jpg" class="card-img-top" alt="Salle 1">
          <div class="card-body">
            <h5 class="card-title">Salle 1</h5>
            <p class="card-text">Description de la salle 1.</p>
            <ul class="list-group">
              <li class="list-group-item">Capacité : 50 personnes</li>
              <li class="list-group-item">Équipements : Cuisine, projecteur, tables, chaises</li>
              <li class="list-group-item">Disponibilité : Du lundi au vendredi</li>
            </ul>
            <a href="#" class="btn btn-primary">Réserver</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4">
          <img src="path/to/image2.jpg" class="card-img-top" alt="Salle 2">
          <div class="card-body">
            <h5 class="card-title">Salle 2</h5>
            <p class="card-text">Description de la salle 2.</p>
            <ul class="list-group">
              <li class="list-group-item">Capacité : 30 personnes</li>
              <li class="list-group-item">Équipements : Cuisine, tables, chaises</li>
              <li class="list-group-item">Disponibilité : Tous les jours</li>
            </ul>
            <a href="#" class="btn btn-primary">Réserver</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4">
          <img src="path/to/image3.jpg" class="card-img-top" alt="Salle 3">
          <div class="card-body">
            <h5 class="card-title">Salle 3</h5>
            <p class="card-text">Description de la salle 3.</p>
            <ul class="list-group">
              <li class="list-group-item">Capacité : 20 personnes</li>
              <li class="list-group-item">Équipements : Tables, chaises</li>
              <li class="list-group-item">Disponibilité : Les week-ends</li>
            </ul>
            <a href="#" class="btn btn-primary">Réserver</a>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
