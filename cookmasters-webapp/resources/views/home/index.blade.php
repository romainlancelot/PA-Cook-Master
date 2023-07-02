@extends('layouts.home-master')

@section('title', 'Home')
@section('content')
    <div id="carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselHome" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselHome" data-bs-slide-to="1" aria-label="Slide 1"></button>
        </div>
        <div class="carousel-inner">
            <style> 
                .ad-1 {
                    background: linear-gradient(to bottom,rgba(0,0,0, 0),
                    rgba(0,0,0, 100)),
                    url({{ asset('images/index/index1.jpg') }}) no-repeat center center fixed;
                }
                .ad-2 {
                    background: linear-gradient(to bottom,rgba(0,0,0, 0),
                    rgba(0,0,0, 100)),
                    url({{ asset('images/index/index2.jpg') }}) no-repeat center center fixed;
                }
            </style>
            <div class="carousel-item active ad-1">
                <div class="carousel-caption">
                    <h4>Cookmasters</h4>
                    <p>Learn to cook with the best chefs in the world.</p>
                </div>
            </div>
            <div class="carousel-item ad-2">
                <div class="carousel-caption">
                    <h4>Discover our events</h4>
                    <p>Find an event in your city and enjoy it with your friends.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="bg-light p-5 rounded">
        @auth
        <h1>{{ __('index.title') }}</h1>
        <p class="lead">Only authenticated users can access this section.</p>
        @endauth

        @guest
        <h1>{{ __('index.title') }}</h1>
        <p class="lead">{{ __('index.description') }}</p>
        @endguest

    <!-- Témoignages de clients satisfaits -->
    <section class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="text-center">Témoignages de nos clients</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="testimonial-item">
        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
        <blockquote>
          "J'ai participé à l'atelier de cuisine italienne et j'ai adoré ! Les chefs étaient passionnés et les recettes délicieuses. Je recommande Cook Master à tous les amateurs de bonne cuisine."
        </blockquote>
        <cite>- Sophie Martin</cite>
      </div>
    </div>
    <div class="col-md-4">
      <div class="testimonial-item">
        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
        <blockquote>
          "Les dégustations de produits bio sont incroyables chez Cook Master. J'ai découvert de nouvelles saveurs et j'ai été impressionné par la qualité des produits. Une expérience gastronomique inoubliable !"
        </blockquote>
        <cite>- David Dupont</cite>
      </div>
    </div>
    <div class="col-md-4">
      <div class="testimonial-item">
        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
        <blockquote>
          "Je suis très satisfait des formations professionnelles de Cook Master. J'ai acquis de nouvelles compétences et je me sens prêt à me lancer dans une carrière culinaire. Merci à toute l'équipe !"
        </blockquote>
        <cite>- Laura Tremblay</cite>
      </div>
    </div>
@endsection