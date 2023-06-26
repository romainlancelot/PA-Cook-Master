@extends('layouts.app-master')

@section('title', 'Salles en location')

@section('content')
  <div class="container">
    <h1>Salles en location</h1>
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
