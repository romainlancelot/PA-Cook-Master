@extends('layouts.app-master')

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
<div id="homeCarousel" class="carousel slide mb-5">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner" style="border-radius: 10px;">
        <div class="carousel-item active">
            <img src="{{ secure_asset('images/cookmaster_photo1.jpg') }}" class="d-block" width="1920" height="420" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h2>Formations de Cuisine</h2>
                <p>Rejoignez nos formations de cuisine pour apprendre de nouvelles recettes et techniques.</p>  
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ secure_asset('images/cookmaster_photo2.jpg') }}" class="d-block" width="1920" height="420" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h2>Diplôme de Pâtisserie et Diplôme de Pâtisserie Innovation et Santé</h2>
                <p>Apprenez les techniques de pâtisserie et découvrez les secrets des desserts les plus délicieux.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ secure_asset('images/cookmaster_photo3.jpg') }}" class="d-block" width="1920" height="420" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h2>Diplôme de Cuisine en Parcours Professionnel</h2>
                <p>Inscrivez-vous à notre formation de cuisine professionnelle et devenez un expert culinaire.</p>
                
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#homeCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#homeCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<hr>
<!-- Introduction à Cook Master -->
<section class="container mb-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="text-center">{{ __('index.subtitle') }}</h1>
            <p>{{ __('index.div1_p1') }}</p>
            <p>{{ __('index.div1_p2') }}</p>
            <p>{{ __('index.div1_p3') }}</p>
            <ul>
                <li>{{ __('index.div1_li1') }}</li>
                <li>{{ __('index.div1_li2') }}</li>
                <li>{{ __('index.div1_li3') }}</li>
                <li>{{ __('index.div1_li4') }}</li>
            </ul>
            <p>{{ __('index.div1_p4') }}</p>
            <p>{{ __('index.div1_p5') }}</p>
        </div>
    </div>
</section>

<hr>
<!-- Section "Nos services" -->
<section class="container text-center mb-5">
    <div class="row">

        <div class="line">
            <span class="title">{{ __('index.div2_span1') }}</span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="service-item">
                <img src="{{ secure_asset('images/ateliers.jpeg') }}" alt="Ateliers de cuisine" class="img-crop">
                <h3>{{ __('index.div2_h3_1') }}</h3>
                <p>{{ __('index.div2_p1') }}</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="service-item">
                <img src="{{ secure_asset('images/cours-domicile.jpg') }}" alt="Cours animés à domicile" class="img-crop">
                <h3>{{ __('index.div2_h3_2') }}</h3>
                <p>{{ __('index.div2_p2') }}</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="service-item">
                <img src="{{ secure_asset('images/ventes-materiel.jpg') }}" alt="Ventes de matériel de cuisine" class="img-crop">
                <h3>{{ __('index.div2_h3_3') }}</h3>
                <p>{{ __('index.div2_p3') }}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="service-item">
                <img src="{{ secure_asset('images/formations.jpg') }}" alt="Formations professionnelles" class="img-crop">
                <h3>{{ __('index.div2_h3_4') }}</h3>
                <p>{{ __('index.div2_p4') }}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="service-item">
                <img src="{{ secure_asset('images/livraison.jpg') }}" alt="Repas commandés et livrés à domicile" class="img-crop">
                <h3>{{ __('index.div2_h3_5') }}</h3>
                <p>{{ __('index.div2_p5') }}</p>
            </div>
        </div>
    </div>
</section>

<hr>
<!-- Mise en avant des ateliers et événements -->
<section class="container mb-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">{{ __('index.div3_h2_1') }}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="event-item">
                <img src="images/atelier1.jpg" alt="Atelier de cuisine">
                <h3>{{ __('index.div3_h3_1') }}</h3>
                <p>{{ __('index.div3_p1_1') }}</p>
                <p>{{ __('index.div3_p2_1') }}</p>
                <p>{{ __('index.div3_p3_1') }}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="event-item">
                <img src="images/atelier2.jpg" alt="Atelier de pâtisserie">
                <h3>{{ __('index.div3_h3_2') }}</h3>
                <p>{{ __('index.div3_p1_2') }}</p>
                <p>{{ __('index.div3_p2_2') }}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="event-item">
                <img src="images/evenement1.jpg" alt="Dîner gastronomique">
                <p>{{ __('index.div3_p1_3') }}</p>
                <p>{{ __('index.div3_p2_3') }}</p>
                <p>{{ __('index.div3_p3_3') }}</p>
            </div>
        </div>
    </div>
    
</section>

<hr>
<!-- Témoignages de clients satisfaits -->
<section class="container mb-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">{{ __('index.div4_h2_1') }}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="testimonial-item">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                <blockquote>
                    {{ __('index.div4_blockquote1') }}}
                </blockquote>
                <cite>{{ __('index.div4_author1') }}</cite>
            </div>
        </div>
        <div class="col-md-4">
            <div class="testimonial-item">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                <blockquote>
                    {{ __('index.div4_blockquote2') }}
                </blockquote>
                <cite>{{ __('index.div4_author2') }}</cite>
            </div>
        </div>
        <div class="col-md-4">
            <div class="testimonial-item">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                <blockquote>
                    {{ __('index.div4_blockquote3') }}
                </blockquote>
                <cite>{{ __('index.div4_author3') }}</cite>
            </div>
        </div>
    </div>
    
</section>

<hr>
<!-- Appel à l'action (CTA) -->
<section class="container mb-5">
    <div class="row">
        <div class="col-md-12 text-center">
            <h2>{{ __('index.div5_h2_1') }}</h2>
            <p>{{ __('index.div5_p1_1') }}</p>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4 text-center">
            <a href="#" class="btn btn-primary btn-lg">{{ __('index.div5_btn1') }}</a>
        </div>
        <div class="col-md-4 text-center">
            <a href="#" class="btn btn-primary btn-lg">{{ __('index.div5_btn2') }}</a>
        </div>
        <div class="col-md-4 text-center">
            <a href="{{ route('cooking-recipes.index') }}" class="btn btn-primary btn-lg">{{ __('index.div5_btn3') }}</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <a href="{{ route('boutique.index') }}" class="btn btn-secondary btn-lg">{{ __('index.div5_btn4') }}</a>
        </div>
    </div>
</section>

<hr>
<!-- Section "À propos de nous" -->
<section class="container mb-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">{{ __('index.div6_h2_1') }}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <img src="images/about-us.jpg" alt="À propos de nous">
        </div>
        <div class="col-md-6">
            <h3>{{ __('index.div6_h3_1') }}</h3>
            <p>{{ __('index.div6_p1_1') }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h3></h3>
            <ul>
                <li>{{ __('index.div6_li1') }}</li>
                <li>{{ __('index.div6_li2') }}</li>
                <li>{{ __('index.div6_li3') }}</li>
                <li>{{ __('index.div6_li4') }}</li>
            </ul>
        </div>
        <div class="col-md-6">
            <h3>{{ __('index.div6_h2_3') }}</h3>
            <p>{{ __('index.div6_p1_3') }}</p>
            <p>{{ __('index.div6_p2_3') }}</p>
        </div>
    </div>
</section>

<hr>
<!-- Foire aux questions (FAQ) -->
<section class="container mb-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">{{ __('index.div7_h2_1') }}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="faq-item">
                <h3>{{ __('index.div7_h3_1') }}</h3>
                <p>{{ __('index.div7_p1_1') }}</p>
            </div>
            <div class="faq-item">
                <h3>{{ __('index.div7_h3_2') }}</h3>
                <p>{{ __('index.div7_p1_2') }}</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="faq-item">
                <h3>{{ __('index.div7_h3_3') }}</h3>
                <p>{{ __('index.div7_p1_3') }}</p>
            </div>
            <div class="faq-item">
                <h3>{{ __('index.div7_h3_4') }}</h3>
                <p>{{ __('index.div7_p1_4') }}</p>
            </div>
        </div>
    </div>
</section>
<!-- Ajoutez la bibliothèque JavaScript de Bootstrap via un CDN -->
{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> --}}
@endsection