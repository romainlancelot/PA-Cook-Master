@extends('layouts.app-master')

@section('title', 'Room Offers')

@section('content')
<style>
.image-wrapper {
    position: relative;
}

.caption {
    position: absolute;
    color: #fff;
    padding: 10px;
    background-color: #666;
    font-family: Arial, sans-serif;
    font-size: 14px;
    line-height: 1.5;
}

.price {
    bottom: 0;
    right: 0;
}

.address {
    bottom: 0;
    left: 0;
}

.room {
    bottom: 40px;
    left: 0;
}
.info-line {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #f7f7f7;
    padding: 10px;
    border-radius: 5px;
    margin-top: 20px;
}

.info-item {
    margin-right: 20px;
}

.info-item:last-child {
    margin-right: 0;
}

</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="image-wrapper">
                <img src="{{ asset('images/cookmaster_photo1.jpg') }}" alt="Mon Image" class="img-fluid">
                <div class="caption price">100 € /heure.</div>
                <div class="caption address">12 rue michel goutier, 94380 bonneuil sur marne</div>
                <div class="caption room">Salle 201, Bâtiment A, 2ème étage.</div>
            </div>
        </div>
    </div>

    <div class="row">
    
        <div class="col-md-4">

        </div>
        <div class="col-md-8">
            <div class="info-line">
                <div class="info-item">Capacité max. de personnes : 40</div>
                <div class="info-item">Superficie : 100 m2</div>
                <div class="info-item">Type de cuisine : ATELIER CULINAIRE</div>
            </div>

            <style>
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
            <div class="line">
              <span class="title">Description</span>
            </div>

            <div id="description">
                <p class="description-content">Nous disposons d’un bel espace pour accueillir des entreprises et animer des ateliers de cuisine du monde dont le but est de permettre aux participants d’échanger dans un cadre informel, autour d’une scénarisation propice à la découverte, avec des défis et des anecdotes à partager.</p>
                <p class="description-content" style="display: none;">Il est possible de privatiser son espace « atelier » de pauses gourmandes pour vos journées de travail.</p>
                <p class="description-content" style="display: none;">Présentation espace...</p>
                <p class="description-content" style="display: none;">Un lieu parfaitement équipé pour votre journée de travail...</p>
                <button id="voirPlusBtn" class="btn btn-primary">Voir plus</button>
                <button id="voirMoinsBtn" class="btn btn-primary" style="display: none;">Voir moins</button>
            </div>


            <div class="line">
              <span class="title">Photos</span>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('images/ateliers.jpeg') }}" alt="Description de l'image 1" class="img-fluid">
                </div>
                <div class="col-md-6 image-container">
                    <img src="{{ asset('images/ateliers.jpeg') }}" alt="Description de l'image 2" class="img-fluid">
                    <div class="overlay">
                        <a href="#" id="voirPlus">Voir plus</a>
                    </div>
                </div>
            </div>

            <div id="additionalImages" style="display: none;">
                <div class="row">
                    <div class="col-md-6 image-container">
                        <img src="{{ asset('images/ateliers.jpeg') }}" alt="Description de l'image 3" class="img-fluid">
                    </div>
                    <div class="col-md-6 image-container">
                        <img src="{{ asset('images/ateliers.jpeg') }}" alt="Description de l'image 4" class="img-fluid">
                    </div>
                </div> <!-- Il manquait cette balise de fermeture -->
            </div>

            <div class="line">
              <span class="title">Prix</span>
            </div>

        </div>
    </div>
</div>

<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function() {
    $("#voirPlus").click(function(e) {
        e.preventDefault(); // empêche le comportement par défaut de l'élément 'a'

        var additionalImages = $("#additionalImages");

        if (additionalImages.is(":visible")) {
            additionalImages.hide();
            $(this).text("Voir plus");
        } else {
            additionalImages.show();
            $(this).text("Voir moins");
        }
    });
});
</script>

<style>
    .image-container {
    position: relative;
    text-align: center;
}

.overlay {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
}

.overlay a {
    background-color: rgba(0, 0, 0, 0.5); 
    color: white;
    padding: 10px;
    text-decoration: none;
}

    </style>
<script>
$(document).ready(function() {
    $("#voirPlusBtn").click(function() {
        $(".description-content").show();
        $("#voirPlusBtn").hide();
        $("#voirMoinsBtn").show();
    });
    
    $("#voirMoinsBtn").click(function() {
        $(".description-content:not(:first)").hide();
        $("#voirPlusBtn").show();
        $("#voirMoinsBtn").hide();
    });
});
</script>

<style>
    .description {
        overflow: hidden;
        position: relative;
        max-height: calc(5 * 1.5em);
        transition: max-height 0.3s;
    }

    .description.expanded {
        max-height: none;
    }
</style>
@endsection
