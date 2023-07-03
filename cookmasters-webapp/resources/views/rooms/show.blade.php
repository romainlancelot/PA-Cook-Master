@extends('layouts.app-master')

@section('title', 'Détails de la salle')

@section('content')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
<div class="container">
    <div class="position-relative">
        <img src="{{ asset('images/ateliers.jpeg') }}" style="width: 100%; height: 80vh; object-fit: cover;" alt="Nom de la salle">
        <div class="position-absolute top-0 start-0 m-3">
            <h2 class="text-white bg-dark px-2" style="opacity: 0.8;">Nom de la salle</h2>
        </div>
        <div class="position-absolute bottom-0 end-0 m-3">
            <p class="text-white bg-dark px-2" style="opacity: 0.8;">Prix à l'heure : 100 €</p>
        </div>
    </div>
    <div class="d-flex justify-content-between">
        <p>Capacité max. de personnes : 40</p>
        <p>Superficie : 100 m2</p>
        <p>Type de cuisine : ATELIER CULINAIRE</p>
    </div>
    <div id="description" style="display: none;">Description complète...</div>
    <div id="short-description">Description abrégée...</div>
    <button id="more-button" onclick="toggleDescription('more')">Voir plus</button>
    <button id="less-button" style="display: none;" onclick="toggleDescription('less')">Voir moins</button>

    <h3>Autres photos</h3>
    <div class="d-flex flex-wrap">
        <img src="{{ asset('images/ateliers.jpeg') }}" style="width: 200px; height: 200px; object-fit: cover;">
        <img src="{{ asset('images/ateliers.jpeg') }}" style="width: 200px; height: 200px; object-fit: cover;">
    </div>

    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseprix" aria-expanded="false" aria-controls="collapseprix">
      Détails des prix
    </button>
    <div class="collapse" id="collapseprix">
      <div class="card card-body">
        <p>Prix à l'heure HT de la cuisine : 100 €</p>
        <p>Prix à l’heure (8h+): 90 €</p>
        <p>Prix à l’heure (12h+): 80 €</p>
        <p>Prix ​​à l'heure le week-end (Samedi et Dimanche) : 120 €</p>
        <p>Nombre minimum d'heures réservables : 5</p>
        <p>Permettre plus de personnes que la capacité : oui</p>
        <p>Caution: 1500 €</p>
        <p>Jours disponibles : Lundi, Mardi, Mercredi, Jeudi, Vendredi, Samedi, Dimanche</p>
        <p>Heures réservables : 9:00h à 18:00 h</p>
        <p>Nombre maximum de personnes supplémentaires autorisées : 45</p>
        <!-- Les détails des prix ici -->
      </div>
    </div>

    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseaddress" aria-expanded="false" aria-controls="collapseaddress">
        Détails de l'adresse
    </button>
    <div class="collapse" id="collapseaddress">
      <div class="card card-body">
      <p>ADRESSE COMPLÈTE: Les informations de localisation exactes sont fournies après la confirmation d'une réservation.</p>
    <p>Ville: Paris</p>
    <p>Code postal: 75018</p>
    <p>E-mail: Les informations exactes sont fournies après la confirmation d'une réservation.</p>
    <p>Téléphone: Les informations exactes sont fournies après la confirmation d'une réservation.</p>
    <p>Pays: France</p>
        <!-- Les détails des prix ici -->
      </div>
    </div>

    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseoptions" aria-expanded="false" aria-controls="collapseoptions">
    Détails et options
    </button>
    <div class="collapse" id="collapseoptions">
      <div class="card card-body">
      <p>Statut du bien: Adapté aux cours de cuisine</p>
    <p>Référence de la cuisine : 35909</p>
    <p>Surface: 100 m2</p>
    <p>MONTANT DE LA CAUTION en € (rendue à la sortie des lieux): 1500</p>
    <p>Café: 2</p>
        <!-- Les détails des prix ici -->
      </div>
    </div>

    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemateriel" aria-expanded="false" aria-controls="collapsemateriel">
    Matériel et commodités
    </button>
    <div class="collapse" id="collapsemateriel">
      <div class="card card-body">
      <p>Activités acceptées : Cours de cuisine, Cuissons grasses, fritures, Photos, shooting, vidéos</p>
    <p>Autres caractéristiques : Accès handicapés, Batteur mélangeur, Cafetière, Congélateur, Connexion wi-fi, Four classique ménager, Hotte aspirante, Lave-vaisselle, Micro-ondes, Mixeur plongeant, Plaque à induction, Sauteuse (min. 30L), Télévision ou écran numérique, Vaisselle (Verres, assiettes, couverts...)</p>

        <!-- Les détails des prix ici -->
      </div>
    </div>



    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseconditiongeneral" aria-expanded="false" aria-controls="collapseconditiongeneral">
    Conditions générales
    </button>
    <div class="collapse" id="collapseconditiongeneral">
      <div class="card card-body">
      <p>Activités acceptées : Cours de cuisine, Cuissons grasses, fritures, Photos, shooting, vidéos</p>
    <p>Autres caractéristiques : Accès handicapés, Batteur mélangeur, Cafetière, Congélateur, Connexion wi-fi, Four classique ménager, Hotte aspirante, Lave-vaisselle, Micro-ondes, Mixeur plongeant, Plaque à induction, Sauteuse (min. 30L), Télévision ou écran numérique, Vaisselle (Verres, assiettes, couverts...)</p>

    <h3>Conditions générales</h3>
    <p>Tabagisme autorisé: oui</p>
    <p>Animaux domestiques autorisés: non</p>
    <p>Fêtes autorisées: oui</p>
    <p>Consommation d'alcool autorisée: oui</p>
        <!-- Les détails des prix ici -->
      </div>
    </div>

    <!-- Faites de même pour les autres sections -->

</div>

<script>
function toggleDescription(action) {
    if (action === 'more') {
        document.getElementById('description').style.display = 'block';
        document.getElementById('short-description').style.display = 'none';
        document.getElementById('more-button').style.display = 'none';
        document.getElementById('less-button').style.display = 'inline';
    } else {
        document.getElementById('description').style.display = 'none';
        document.getElementById('short-description').style.display = 'block';
        document.getElementById('more-button').style.display = 'inline';
        document.getElementById('less-button').style.display = 'none';
    }
}
</script>
@endsection
