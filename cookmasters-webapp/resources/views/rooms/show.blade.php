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
    @php
        $photos = json_decode($room->photos);
    @endphp
    <div class="row">
    <div class="col-md-12">
        <div class="image-wrapper">
            @if(count($photos) > 0)
                <img src="{{ asset('storage/rooms/'.$photos[0]) }}" style="width: 1920px; height: 420px;" alt="Mon Image" class="img-fluid">
            @endif
            <div class="caption price">{{ $room->price }} € /heure.</div>
            <div class="caption address"> {{ $room->address }}, {{ $room->postal_code }} {{ $room->city }}</div>
            <div class="caption room"> {{ $room->name }} </div>
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
                                            <div class="info-item">Capacité max. de personnes : {{ $room->capacity }} </div>
                                            <div class="info-item">Superficie : {{ $room->surface }} m2</div>
                                            <div class="info-item">Type de cuisine : {{$room->type }} </div>
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
                                            <p> {{ $room->description }} </p>
                                            <button id="voirPlusBtn" class="btn" style="background-color: #666; color: #fff;">Voir plus</button>
                                            <button id="voirMoinsBtn" class="btn " style="display: none; background-color: #666; color: #fff;">Voir moins</button>
                                        </div>
                                        

                                        @if(count($photos) > 0)
                                            <div class="line">
                                              <span class="title">Photos</span>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <img src="{{ asset('storage/rooms/'.$photos[0]) }}" alt="Description de l'image 1" class="img-fluid">
                                                </div>
                                                <div class="col-md-6 image-container">
                                                    <img src="{{ asset('storage/rooms/'.$photos[1]) }}" alt="Description de l'image 2" class="img-fluid">
                                                    <div class="overlay">
                                                        <a href="#" id="voirPlus">Voir plus</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="additionalImages" style="display: none;">
                                                <div class="row">
                                                    @foreach($photos as $photo)
                                                        <div class="col-md-6 image-container">
                                                            <img src="{{ asset('storage/rooms/'.$photo) }}" alt="Description de l'image 4" class="img-fluid">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                        <div class="line">
                                          <span class="title">Prix</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p><strong>Prix à l'heure HT de la cuisine :</strong> {{ $room->price }} €</p>
                                                        <p><strong>Prix à l’heure (8h+) :</strong> {{$room->price - 10}} €</p>
                                                        <p><strong>Prix à l’heure (12h+) :</strong> {{$room->price - 15}} €</p>
                                                        <p><strong>Prix à l'heure le week-end (Samedi et Dimanche) :</strong> {{$room->price + 10}} €</p>
                                                        <p><strong>Nombre minimum d'heures réservables :</strong> {{ $room->minimum_reservation_hours }}</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><strong>Permettre plus de personnes que la capacité :</strong> {{ $room->allow_more_people }}</p>
                                                        <p><strong>Caution :</strong> 1500 €</p>
                                                        <p><strong>Jours disponibles :</strong> {{ $room->availability_days }}</p>
                                                        <p><strong>Heures réservables :</strong> {{$room->reservation_hours}}</p>
                                                        <p><strong>Maximum extra guests allowed :</strong> {{$room->max_people }}</p>
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
                                                        <p><strong>Ville :</strong> {{ $room->address }}</p>
                                                        <p><strong>Code postal :</strong> {{ $room->postal_code }}</p>
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
                                                        <p><strong>Statut du bien :</strong> {{ $room->type }}</p>
                                                        <p><strong>Surface :</strong> {{$room->surface }} m2</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><strong>MONTANT DE LA CAUTION en € (rendue à la sortie des lieux) :</strong> {{ $room->caution }}</p>
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
                                                        @php
                                                        $activites = json_decode($room->activities)
                                                        @endphp
                                                        @if (count($activites) > 0)
                                                            <p><strong>Activités acceptées :</strong></p>
                                                            <ul>
                                                                    @foreach ($activites as $activite)
                                                                        <li> {{ $activite }}</li>
                                                                    @endforeach
                                                            </ul>
                                                        @endif


                                    
                                                    </div>
                                                    <div class="col-md-6">
                                                        @php
                                                        $facilities = json_decode($room->facilities)
                                                        @endphp
                                                        @if(count($facilities) > 0)

                                                        <p><strong>Autres caractéristiques :</strong></p>
                                                        <ul>
                                                            @foreach($facilities as $facilitie)
                                                            <li> {{$facilitie }}</li>
                                                            @endforeach
                                                        </ul>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @php
                                        $rules = json_decode($room->rules)
                                        @endphp
                                        @if (count($rules) > 0)
                                        <div class="line">
                                          <span class="title">Conditions générales</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <ul>
                                                        @foreach ($rules as $rule)
                                                            @endforeach
                                                            <li><del> {{ $rule }} <del></li>
                                                            @endif
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
 