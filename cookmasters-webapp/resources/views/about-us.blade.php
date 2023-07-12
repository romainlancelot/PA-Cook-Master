@extends('layouts.app-master')

@section('title', 'AboutUs')
@section('content')

<style>
.member-img {
    width: 200px;
    height: 200px;
    object-fit: cover;
}
.valeur-img {
    width: 200px;
    height: 200px;
    object-fit: cover;
}

</style>
    <section class="hero" style="background-image: url('{{ secure_asset('images/about-hero.jpg') }}'); background-size: cover; padding: 100px 0; text-align: center;">
        <div class="container">
            <h1 class="display-4">À propos de nous</h1>
            <p class="lead">Cook Master a été fondé avec une passion profonde pour la cuisine et la gastronomie. Depuis notre ouverture en 2016, nous nous sommes engagés à offrir des expériences culinaires exceptionnelles à nos clients.</p>
        </div>
    </section>

    <section class="history">
        <div class="container">
            <h2>Notre histoire</h2>
            <div class="row">
                <div class="col-md-6">
                    <p>Chez Cook Master, notre histoire est ancrée dans l'appréciation de la gastronomie française. Reconnue mondialement pour sa qualité exceptionnelle et sa variété de saveurs, la cuisine française est une source d'inspiration pour notre équipe de chefs talentueux.</p>
                    <p>Nous avons pour philosophie d'intégrer la technique raffinée et l'attention aux détails qui caractérisent la cuisine française dans tous nos ateliers et événements. De la préparation de délicieuses baguettes au coq au vin traditionnel, chaque aspect de la cuisine française est célébré chez Cook Master.</p>
                    <p>Rejoignez-nous pour célébrer ensemble la beauté et les subtilités de la cuisine française.</p>
                </div>
                <div class="col-md-6">
                    <img src="{{ secure_asset('images/history.png') }}" alt="Notre histoire" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <section class="team bg-light py-5">
    <div class="container">
        <h2 class="mb-4">Notre équipe</h2>
        <div class="row">
            <!-- Member 1 -->
            <div class="col-lg-3 col-md-6">
                <div class="team-member">
                    <img src="{{ secure_asset('images/membres/membre1.png') }}" alt="John Doe" class="img-fluid  member-img">
                    <h3 class="mt-3">John Doe</h3>
                    <p>Chef exécutif</p>
                </div>
            </div>
            <!-- Member 2 -->
            <div class="col-lg-3 col-md-6">
                <div class="team-member">
                    <img src="{{ secure_asset('images/membres/membre2.png') }}" alt="Jane Smith" class="img-fluid  member-img">
                    <h3 class="mt-3">Jane Smith</h3>
                    <p>Chef de cuisine</p>
                </div>
            </div>
            <!-- Member 3 -->
            <div class="col-lg-3 col-md-6">
                <div class="team-member">
                    <img src="{{ secure_asset('images/membres/membre3.png') }}" alt="Robert Johnson" class="img-fluid  member-img">
                    <h3 class="mt-3">Robert Johnson</h3>
                    <p>Sous-chef</p>
                </div>
            </div>
            <!-- Member 4 -->
            <div class="col-lg-3 col-md-6">
                <div class="team-member">
                    <img src="{{ secure_asset('images/membres/membre4.png') }}" alt="Daniel Green" class="img-fluid  member-img">
                    <h3 class="mt-3">Daniel Green</h3>
                    <p>Head Sommelier</p>
                </div>
            </div>
            <!-- Member 5 -->
            <div class="col-lg-3 col-md-6">
                <div class="team-member">
                    <img src="{{ secure_asset('images/membres/membre5.png') }}" alt="Emily Davis" class="img-fluid  member-img">
                    <h3 class="mt-3">Emily Davis</h3>
                    <p>Pastry Chef</p>
                </div>
            </div>
            <!-- Member 6 -->
            <div class="col-lg-3 col-md-6">
                <div class="team-member">
                    <img src="{{ secure_asset('images/membres/membre6.png') }}" alt="Sarah Wilson" class="img-fluid  member-img">
                    <h3 class="mt-3">Sarah Wilson</h3>
                    <p>Head Server</p>
                </div>
            </div>
        </div>
    </div>
</section>

    <section class="values">
        <div class="container">
            <h2>Nos valeurs</h2>
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <img src="{{ secure_asset('icons/quality.jpg') }}" class="valeur-img" alt="Quality" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Qualité</h5>
                            <p class="card-text">Nous nous engageons à offrir une cuisine de qualité supérieure, en utilisant les meilleurs ingrédients et techniques.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img src="{{ secure_asset('icons/creativity.jpg') }}" class="valeur-img" alt="Creativity" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Créativité</h5>
                            <p class="card-text">Nous encourageons l'innovation culinaire et la découverte de nouvelles saveurs et combinaisons de goûts.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img src="{{ secure_asset('icons/service.jpg') }}" class="valeur-img" alt="Customer Service" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Service client</h5>
                            <p class="card-text">Nous mettons nos clients au cœur de tout ce que nous faisons, en offrant une expérience chaleureuse et accueillante.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img src="{{ secure_asset('icons/passion.jpg') }}" class="valeur-img" alt="Passion" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Passion</h5>
                            <p class="card-text">Nous sommes passionnés par la cuisine et nous souhaitons transmettre cette passion à nos clients.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="commitment bg-light py-5">
    <div class="container">
        <h2 class="mb-4">Notre engagement</h2>
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="{{ secure_asset('icons/enjoy-your-meal.jpg') }}" alt="Notre engagement" class="img-fluid rounded">
            </div>
            <div class="col-md-6">
                <p class="fs-5 mb-3">Chez Cook Master, nous sommes déterminés à offrir à nos clients une expérience culinaire inoubliable. Nous nous efforçons de dépasser leurs attentes à chaque étape, en offrant des ateliers de qualité, des produits exceptionnels et un service client attentif.</p>
                <p class="fs-5">Nous croyons en l'importance de partager nos connaissances et notre amour de la cuisine avec les autres, que ce soit à travers nos ateliers, nos événements spéciaux ou notre boutique en ligne. Nous sommes heureux de jouer un rôle dans l'inspiration et la transformation des amateurs de cuisine en véritables maîtres culinaires.</p>
            </div>
        </div>
    </div>
    </section>
@endsection
