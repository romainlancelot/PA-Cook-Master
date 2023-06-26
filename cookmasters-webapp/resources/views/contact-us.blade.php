@extends('layouts.app-master')

@section('title', 'Nous contacter')

@section('content')
  <div class="container">
    <h1>Nous contacter</h1>
    <div class="row">
      <div class="col-md-6">
        <form action="{{ route('contact.send') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
      </div>
      <div class="col-md-6">
        <h3>Coordonnées</h3>
        <p>18, rue des Blancs Manteaux, 4ème arrondissement, Paris.</p>
        <p>42, rue de la Gastronomie, 2ème arrondissement, Paris.</p>
        <p>76, avenue Culinaire, 3ème arrondissement, Paris.</p>
        <p>15, rue du Goût, 5ème arrondissement, Paris.</p>
        <p>Téléphone : +33 123 456 789</p>
        <p>Email : info@cookmasters.com</p>
      </div>
    </div>
  </div>
@endsection
