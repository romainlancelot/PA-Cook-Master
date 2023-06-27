@extends('layouts.app-master')

@section('title', 'Nous contacter')

@section('content')
  <style>

    .contact-form .form-control {
      border-radius: 10px;
      border: 1px solid #ccc;
    }
    
    .contact-form .form-control:focus {
      /* border-color: #FF4500; */
      box-shadow: none;
    }
    
    .contact-form .btn-primary {
      /* background-color: #FF4500; */
      /* border-color: #FF4500; */
    }
    
    .contact-form .btn-primary:hover {
      /* background-color: #FF6347; */
      /* border-color: #FF6347; */
    }
    
    h3 {
      /* color: #FF4500; */
    }

  </style>
  <div class="container">

    <section class="hero" style="background-size: cover; padding: 100px 0; text-align: center;">
        <div class="container">
            <h1 class="display-4">Nous contacter</h1>
            <p class="lead">N'hésitez pas à nous contacter pour toute question, demande d'information ou réservation. Notre équipe est là pour vous aider et répondre à vos besoins culinaires.</p>
        </div>
    </section>

    <div class="row">
      <div class="col-lg-6">
        <form action="{{ route('contact.send') }}" method="POST" class="contact-form">
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
          <button type="submit" class="btn btn-primary mt-3">Envoyer</button>
        </form>
      </div>
      <div class="col-lg-6">
        <h3 class="mb-3">Coordonnées</h3>
        <p><i class="fas fa-map-marker-alt"></i> 18, rue des Blancs Manteaux, 4ème arrondissement, Paris.</p>
        <p><i class="fas fa-map-marker-alt"></i> 42, rue de la Gastronomie, 2ème arrondissement, Paris.</p>
        <p><i class="fas fa-map-marker-alt"></i> 76, avenue Culinaire, 3ème arrondissement, Paris.</p>
        <p><i class="fas fa-map-marker-alt"></i> 15, rue du Goût, 5ème arrondissement, Paris.</p>
        <p><i class="fas fa-phone"></i> Téléphone : +33 123 456 789</p>
        <p><i class="fas fa-envelope"></i> Email : info@cookmasters.com</p>
      </div>
    </div>
  </div>
@endsection
