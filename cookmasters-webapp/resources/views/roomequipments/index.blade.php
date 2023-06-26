@extends('layouts.app-master')

@section('title', 'Romes')
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
    </div>
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
