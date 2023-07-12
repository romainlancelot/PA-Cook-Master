@extends('layouts.home-master')

@section('title', 'Home')
@section('content')
<style>
    .img-crop {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

  .line {
    width: 100%;
    text-align: center;
    border-bottom: 2px solid #888;
    line-height: 0.1em;
    margin: 50px 0 30px; /* Ajout d'un espace supplémentaire en bas */
  }
  .line .title {
    background: #fff;
    font-size: 1.5em;
    color: #666; /* Text color for paragraph text within the card body */
    text-shadow: 1px 1px 1px #ccc;
    font-weight: bold;
  }

</style>
      <h1 class='text-center' style="background-size: cover; padding: 100px 0; text-align: center;" >{{ __('index.title') }}</h1>

    <!-- Bannière ou diaporama -->
    <!-- ... -->
    <div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ul class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ul>
    
    <!-- The slideshow -->
    <div class="carousel-inner" style="border-radius: 10px;">
  <div class="carousel-item">
    <img src="{{ asset('images/cookmaster_photo3.jpg') }}" alt="Image 1" width="1920" height="420">
    <div class="carousel-caption">
      <h1>Diplôme de Cuisine en Parcours Professionnel</h1>
    </div>
  </div>
  <div class="carousel-item active">
    <img src="{{ asset('images/cookmaster_photo2.jpg') }}" alt="Image 2" width="1920" height="420">
    <div class="carousel-caption">
      <h1>Diplôme de Pâtisserie et Diplôme de Pâtisserie Innovation et Santé</h1>
    </div>
  </div>
  <div class="carousel-item">
    <img src="{{ asset('images/cookmaster_photo1.jpg') }}" alt="Image 3" width="1920" height="420">
    <div class="carousel-caption">
      <h1>Formations de Cuisine</h1>
    </div>
  </div>
</div>
    
    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>
</div>

    <!-- Introduction à Cook Master -->
    <section class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <h1 class="text-center">Bienvenue chez Cook Master</h1>
          <p>Nous sommes une entreprise passionnée par la cuisine et la gastronomie, offrant une expérience culinaire exceptionnelle à nos clients.</p>
          <p>Notre équipe d'experts culinaires est composée de chefs talentueux et expérimentés qui sont prêts à vous guider dans un voyage culinaire inoubliable.</p>
          <p>Nous proposons une large gamme de services pour satisfaire tous les amateurs de cuisine:</p>
          <ul>
            <li>Des ateliers de cuisine interactifs pour apprendre de nouvelles recettes et techniques.</li>
            <li>Des dégustations de produits bio et locaux pour découvrir des saveurs uniques.</li>
            <li>La vente de matériel de cuisine de haute qualité pour équiper votre propre cuisine.</li>
            <li>Des événements spéciaux et des formations professionnelles pour les passionnés de gastronomie.</li>
          </ul>
          <p>Nous mettons un point d'honneur à offrir un accueil chaleureux à nos clients et à garantir la satisfaction de chaque visiteur.</p>
          <p>Rejoignez-nous chez Cook Master pour une expérience culinaire inoubliable !</p>
        </div>
      </div>
    </section>

    <!-- Section "Nos services" -->
    <section class="container">
    <div class="row">

        <div class="line">
            <span class="title">Nos services</span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="service-item">
                <img src="{{ asset('images/ateliers.jpeg') }}" alt="Ateliers de cuisine" class="img-crop">
                <h3>Ateliers de cuisine</h3>
                <p>Participez à nos ateliers de cuisine interactifs et apprenez de nouvelles recettes excitantes.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="service-item">
                <img src="{{ asset('images/cours-domicile.jpg') }}" alt="Cours animés à domicile" class="img-crop">
                <h3>Cours animés à domicile</h3>
                <p>Nous venons chez vous ! Bénéficiez de cours de cuisine personnalisés dans le confort de votre foyer.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="service-item">
                <img src="{{ asset('images/ventes-materiel.jpg') }}" alt="Ventes de matériel de cuisine" class="img-crop">
                <h3>Ventes de matériel de cuisine</h3>
                <p>Parcourez notre sélection d'ustensiles de cuisine haut de gamme pour enrichir votre expérience culinaire.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="service-item">
                <img src="{{ asset('images/formations.jpg') }}" alt="Formations professionnelles" class="img-crop">
                <h3>Formations professionnelles</h3>
                <p>Rejoignez nos formations professionnelles pour développer vos compétences et devenir un expert en cuisine.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="service-item">
                <img src="{{ asset('images/livraison.jpg') }}" alt="Repas commandés et livrés à domicile" class="img-crop">
                <h3>Repas commandés et livrés à domicile</h3>
                <p>Profitez de nos repas fraîchement préparés et livrés directement à votre porte.</p>
            </div>
        </div>
    </div>
</section>

    <!-- Mise en avant des ateliers et événements -->
    <section class="container">
  <div class="row">
    <div class="line">
            <span class="title">Ateliers à venir</span>
        </div>
  </div>

  <section class="container">
    <div class="col-md-12">
        <div class="row">
        @foreach ($workshops as $workshop)
            @php
                $photos = json_decode($workshop->photos)
            @endphp
                <div class="col-md-4 mb-4">
                        <a href="{{ route('workshops.show', $workshop->id) }}" class="card">
                            <div class="card shadow-sm h-100">
                                <div style="position: relative;">
                                    <img id="main-image" class="img-fluid" style="border-radius: 10px; width: 100%; height: auto; object-fit: cover;" src="{{ asset('storage/workshops/'.$workshop->photos) }}" alt="Equipment Name">
                                    <div style="position: absolute; bottom: 0; left: 0; background-color: rgba(0,0,0,0.6); color: white; padding: 5px;"> {{ $workshop->price }} €</div>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title"> {{ $workshop->name }}</h5>
                                    <div class="mt-auto">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group row">
                                                <div class="col-md-12">
                                                    <p> <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#b0b2b5}</style><path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg>  Durée : {{ $workshops->first()->sessions->first()->duration }}</p>
                                                    <p> <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#959ca7}</style><path d="M159.3 5.4c7.8-7.3 19.9-7.2 27.7 .1c27.6 25.9 53.5 53.8 77.7 84c11-14.4 23.5-30.1 37-42.9c7.9-7.4 20.1-7.4 28 .1c34.6 33 63.9 76.6 84.5 118c20.3 40.8 33.8 82.5 33.8 111.9C448 404.2 348.2 512 224 512C98.4 512 0 404.1 0 276.5c0-38.4 17.8-85.3 45.4-131.7C73.3 97.7 112.7 48.6 159.3 5.4zM225.7 416c25.3 0 47.7-7 68.8-21c42.1-29.4 53.4-88.2 28.1-134.4c-4.5-9-16-9.6-22.5-2l-25.2 29.3c-6.6 7.6-18.5 7.4-24.7-.5c-16.5-21-46-58.5-62.8-79.8c-6.3-8-18.3-8.1-24.7-.1c-33.8 42.5-50.8 69.3-50.8 99.4C112 375.4 162.6 416 225.7 416z"/></svg>Prochain cours :  {{  $workshops->first()->sessions->first()->start }} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
            @endforeach
        </div>
    </div>
</section>

    </section>

    <!-- Témoignages de clients satisfaits -->
    <section class="container">
  <div class="row">

    <div class="line">
            <span class="title">Témoignages de nos clients</span>
        </div>
    
  </div>
  <div class="row">
        @foreach ($comments as $comment)  
            <div class="col-md-4">
                <div class="testimonial-item">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                    <div class="rating">
                        @for ($i = 0; $i < $comment->rating; $i++)
                            <span>&#9733;</span>
                        @endfor
                    </div>
                    <blockquote>
                        {{ $comment->body }}
                    </blockquote>
                    <cite>- {{ $comment->lastname }} {{ $comment->firstname }} </cite>
                </div>
            </div>
        @endforeach
    </div>
  </div>

    </section>

    <!-- Appel à l'action (CTA) -->
    <section class="container">
      <div class="row">
        <div class="col-md-12 text-center">
 
          <div class="line">
            <span class="title">Prêt à explorer Cook Master ?</span>
        </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 text-center">
          <a href="{{  route('workshops.index') }}" class="btn btn-primary btn-lg">Inscrivez-vous à un atelier</a>
        </div>
        <div class="col-md-3 text-center">
          <a href="{{  route('rooms.index') }}" class="btn btn-primary btn-lg">Réservez une salle</a>
        </div>
        <div class="col-md-3 text-center">
          <a href="{{  route('cooking-recipes.index') }}" class="btn btn-primary btn-lg">Explorez nos recettes</a>
        </div>
        <div class="col-md-3 text-center">
          <a href="{{  route('boutique.index') }}" class="btn btn-primary btn-lg">Parcourez notre boutique</a>
        </div>
      </div>
     
        
      </div>
    </section>

    <!-- Section "À propos de nous" -->
  <section class="container">
    <div class="row">


        <div class="line">
            <span class="title">À propos de nous</span>
        </div>
    
      </div>
      <div class="row">
        <div class="col-md-6">
          <img src="{{ asset('images/history.png') }}" class="img-crop" alt="À propos de nous">
        </div>
        <div class="col-md-6">
          <h3>Notre histoire</h3>
          <p>Cook Master a été fondé avec une passion profonde pour la cuisine et la gastronomie. Depuis notre ouverture en 2016, nous nous sommes engagés à offrir des expériences culinaires exceptionnelles à nos clients.</p>
          <p>Nous sommes fiers de notre équipe de chefs talentueux, qui apportent leur expertise et leur créativité dans chaque atelier et événement que nous organisons. Leur passion pour la cuisine se reflète dans chaque plat préparé et dans chaque conseil donné à nos clients.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <h3>Nos valeurs</h3>
          <ul>
            <li>Qualité : Nous nous engageons à offrir une cuisine de qualité supérieure, en utilisant les meilleurs ingrédients et techniques.</li>
            <li>Créativité : Nous encourageons l'innovation culinaire et la découverte de nouvelles saveurs et combinaisons de goûts.</li>
            <li>Service client : Nous mettons nos clients au cœur de tout ce que nous faisons, en offrant une expérience chaleureuse et accueillante.</li>
            <li>Passion : Nous sommes passionnés par la cuisine et nous souhaitons transmettre cette passion à nos clients.</li>
          </ul>
        </div>
        <div class="col-md-6">
          <h3>Notre engagement</h3>
          <p>Chez Cook Master, nous sommes déterminés à offrir à nos clients une expérience culinaire inoubliable. Nous nous efforçons de dépasser leurs attentes à chaque étape, en offrant des ateliers de qualité, des produits exceptionnels et un service client attentif.</p>
          <p>Nous croyons en l'importance de partager nos connaissances et notre amour de la cuisine avec les autres, que ce soit à travers nos ateliers, nos événements spéciaux ou notre boutique en ligne. Nous sommes heureux de jouer un rôle dans l'inspiration et la transformation des amateurs de cuisine en véritables maîtres culinaires.</p>
        </div>
      </div>
    </section>

    <!-- Foire aux questions (FAQ) -->
    <section class="container">
      <div class="row">
        <div class="line">
            <span class="title">Foire aux questions</span>
        </div>

      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="faq-item">
            <h3>Quels types d'ateliers de cuisine proposez-vous ?</h3>
            <p>Nous proposons une variété d'ateliers de cuisine, allant des cuisines du monde à la pâtisserie, en passant par les techniques de base et les recettes spéciales.</p>
          </div>
          <div class="faq-item">
            <h3>Comment puis-je réserver un atelier de cuisine ?</h3>
            <p>La réservation d'un atelier de cuisine peut être effectuée en ligne sur notre site web. Il vous suffit de sélectionner l'atelier souhaité, de choisir la date et de suivre les étapes de paiement.</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="faq-item">
            <h3>Quelles méthodes de paiement acceptez-vous ?</h3>
            <p>Nous acceptons les paiements par carte de crédit (Visa, Mastercard) ainsi que les paiements en ligne sécurisés tels que PayPal.</p>
          </div>
          <div class="faq-item">
            <h3>Offrez-vous des options végétariennes ou sans gluten ?</h3>
            <p>Oui, nous proposons des options végétariennes et sans gluten pour nos ateliers de cuisine. Veuillez nous en informer lors de votre réservation afin que nous puissions vous accommoder.</p>
          </div>
        </div>
      </div>
    </section>
    <!-- Ajoutez la bibliothèque JavaScript de Bootstrap via un CDN -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
@endsection