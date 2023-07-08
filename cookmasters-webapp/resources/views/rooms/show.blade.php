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
                                        <div class="row">
                                            <div class="col-md-12 info-line">
                                                <form style="background-color:#f9f9f9; padding: 30px; border-radius: 10px;">
                                                    <div class="form-group info-line">
                                                        <input type="text" class="form-control info-item" id="name" placeholder="Votre nom" style="border-radius: 5px;">
                                                    </div>
                                                    <div class="form-group info-line">
                                                        <input type="email" class="form-control info-item" id="email" placeholder="Votre email" style="border-radius: 5px;">
                                                    </div>
                                                    <div class="form-group info-line">
                                                        <input type="tel" class="form-control info-item" id="phoneNumber" placeholder="Votre numéro de téléphone" style="border-radius: 5px;">
                                                    </div>
                                                    <div class="form-group info-line">
                                                        <input type="date" class="form-control info-item" id="startDate" placeholder="Date de début" style="border-radius: 5px;">
                                                    </div>
                                                    <div class="form-group info-line">
                                                        <input type="date" class="form-control info-item" id="endDate" placeholder="Date de fin" style="border-radius: 5px;">
                                                    </div>
                                                    <div class="form-group info-line">
                                                        <select class="form-control info-item" id="numberOfPeople" style="border-radius: 5px;">
                                                            @for ($i = 1; $i <= 50; $i++)
                                                                <option>{{ $i }} Nombres de personnes</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="form-group info-line">
                                                        <textarea class="form-control info-item" id="message" rows="3" placeholder="Votre message..." style="border-radius: 5px;"></textarea>
                                                    </div>
                                                    <div class="info-line" style="justify-content: center;">
                                                        <button type="submit" class="btn info-item" style="background-color: #666; color: #fff;">Valider</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="info-line col-md-12">
                                                <div class="testimonial-item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                                                    <blockquote>
                                                      "Les dégustations de produits bio sont incroyables chez Cook Master. J'ai découvert de nouvelles saveurs et j'ai été impressionné par la qualité des produits. Une expérience gastronomique inoubliable !"
                                                    </blockquote>
                                                    <cite>- David Dupont</cite>
                                                </div>
                                            </div>
                                            <div class="info-line col-md-12">
                                                <div class="testimonial-item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                                                    <blockquote>
                                                      "Les dégustations de produits bio sont incroyables chez Cook Master. J'ai découvert de nouvelles saveurs et j'ai été impressionné par la qualité des produits. Une expérience gastronomique inoubliable !"
                                                    </blockquote>
                                                    <cite>- David Dupont</cite>
                                                </div>
                                            </div>
                                            <div class="info-line col-md-12">
                                                <div class="testimonial-item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                                                    <blockquote>
                                                      "Les dégustations de produits bio sont incroyables chez Cook Master. J'ai découvert de nouvelles saveurs et j'ai été impressionné par la qualité des produits. Une expérience gastronomique inoubliable !"
                                                    </blockquote>
                                                    <cite>- David Dupont</cite>
                                                </div>
                                            </div>
                                        </div>
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
                                          <span class="title">Déscription</span>
                                        </div>
                                        <div id="description">
                                            <p class="description-content">Nous disposons d’un bel espace pour accueillir des entreprises et animer des ateliers de cuisine du monde dont le but est de permettre aux participants d’échanger dans un cadre informel, autour d’une scénarisation propice à la découverte, avec des défis et des anecdotes à partager.</p>
                                            <p class="description-content" style="display: none;">Il est possible de privatiser son espace « atelier » de pauses gourmandes pour vos journées de travail.</p>
                                            <p class="description-content" style="display: none;">Présentation espace...</p>
                                            <p class="description-content" style="display: none;">Un lieu parfaitement équipé pour votre journée de travail...</p>
                                            <button id="voirPlusBtn" class="btn" style="background-color: #666; color: #fff;">Voir plus</button>
                                            <button id="voirMoinsBtn" class="btn " style="display: none; background-color: #666; color: #fff;">Voir moins</button>
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
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p><strong>Prix à l'heure HT de la cuisine :</strong> 216 €</p>
                                                        <p><strong>Prix à l’heure (8h+) :</strong> 210 €</p>
                                                        <p><strong>Prix à l’heure (12h+) :</strong> 180 €</p>
                                                        <p><strong>Prix à l'heure le week-end (Samedi et Dimanche) :</strong> 216 €</p>
                                                        <p><strong>Nombre minimum d'heures réservables :</strong> 5</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><strong>Permettre plus de personnes que la capacité :</strong> Oui</p>
                                                        <p><strong>Caution :</strong> 1500 €</p>
                                                        <p><strong>Jours disponibles :</strong> Lundi, Mardi, Mercredi, Jeudi, Vendredi, Samedi, Dimanche</p>
                                                        <p><strong>Heures réservables :</strong> 9:00h à 18:00 h</p>
                                                        <p><strong>Maximum extra guests allowed :</strong> 45 Guests</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="line">
                                          <span class="title">Address</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p><strong>ADRESSE COMPLÈTE :</strong> Les informations de localisation exactes sont fournies après la confirmation d'une réservation.</p>
                                                        <p><strong>Ville :</strong> Paris</p>
                                                        <p><strong>Code postal :</strong> 75018</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><strong>E-mail :</strong> Les informations exactes sont fournies après la confirmation d'une réservation.</p>
                                                        <p><strong>Téléphone :</strong> Les informations exactes sont fournies après la confirmation d'une réservation.</p>
                                                        <p><strong>Pays :</strong> France</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="line">
                                          <span class="title">Détails et options</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p><strong>Statut du bien :</strong> Adapté aux cours de cuisine</p>
                                                        <p><strong>Référence de la cuisine :</strong> 35909</p>
                                                        <p><strong>Surface :</strong> 100 m2</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><strong>MONTANT DE LA CAUTION en € (rendue à la sortie des lieux) :</strong> 1500</p>
                                                        <p><strong>Café :</strong> 2</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="line">
                                          <span class="title">Matériels et commdités</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p><strong>Activités acceptées :</strong></p>
                                                        <ul>
                                                            <li>Cours de cuisine</li>
                                                            <li>Cuissons grasses, fritures</li>
                                                            <li>Photos, shooting, vidéos</li>
                                                        </ul>
                                                        <p><strong>Autres caractéristiques :</strong></p>
                                                        <ul>
                                                            <li>Accès handicapés</li>
                                                            <li>Batteur mélangeur</li>
                                                            <li>Cafetière</li>
                                                            <li>Congélateur</li>
                                                            <li>Connexion wi-fi</li>
                                                            <li>Four classique ménager</li>
                                                            <li>Hotte aspirante</li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <ul>
                                                            <li>Lave-vaisselle</li>
                                                            <li>Micro-ondes</li>
                                                            <li>Mixeur plongeant</li>
                                                            <li>Plaque à induction</li>
                                                            <li>Sauteuse (min. 30L)</li>
                                                            <li>Télévision ou écran numérique</li>
                                                            <li>Vaisselle (Verres, assiettes, couverts...)</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="line">
                                          <span class="title">Conditions générales</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <ul>
                                                            <li><del>Tabagisme autorisé<del></li>
                                                            <li><del>Animaux domestiques autorisés</del></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <ul>
                                                            <li><del>Fêtes autorisées</del></li>
                                                            <li><del>Consommation d'alcool autorisée<del></li>
                                                        </ul>
                                                    </div>
                                                </div>
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
 