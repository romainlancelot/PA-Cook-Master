@extends('layouts.home-master')

@section('title', 'Home')
@section('content')
<style>
    .img-crop {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
</style>
      <h1 class='text-center' style="background-size: cover; padding: 100px 0; text-align: center;" >{{ __('index.title') }}</h1>

        @auth
        @endauth

        @guest

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
        <div class="col-md-12">
            <h2 class="text-center">Nos services</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="service-item">
                <img src="{{ asset('images/ateliers.jpeg') }}" alt="Ateliers de cuisine" class="img-crop">
                <h3>Ateliers de cuisine</h3>
                <p>Participez à nos ateliers de cuisine interactifs et apprenez de nouvelles recettes excitantes.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="service-item">
                <img src="{{ asset('images/cours-domicile.jpg') }}" alt="Cours animés à domicile" class="img-crop">
                <h3>Cours animés à domicile</h3>
                <p>Nous venons chez vous ! Bénéficiez de cours de cuisine personnalisés dans le confort de votre foyer.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="service-item">
                <img src="{{ asset('images/degustations.jpg') }}" alt="Dégustations de produits bio" class="img-crop">
                <h3>Dégustations de produits bio</h3>
                <p>Découvrez la richesse des saveurs offertes par nos produits bio de haute qualité.</p>
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
    <div class="col-md-12">
      <h2 class="text-center">Ateliers et événements à venir</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="event-item">
        <img src="images/atelier1.jpg" alt="Atelier de cuisine">
        <h3>Atelier de cuisine italienne</h3>
        <p>Date : 10 septembre 2023</p>
        <p>Thème : Les secrets de la pasta</p>
        <p>Chef animateur : Giovanni Rossi</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="event-item">
        <img src="images/atelier2.jpg" alt="Atelier de pâtisserie">
        <h3>Atelier de pâtisserie française</h3>
        <p>Date : 15 septembre 2023</p>
        <p>Thème : Les délices sucrés de Paris</p>
        <p>Chef animateur : Marie Leclerc</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="event-item">
        <img src="images/evenement1.jpg" alt="Dîner gastronomique">
        <h3>Dîner gastronomique étoilé</h3>
        <p>Date : 20 septembre 2023</p>
        <p>Thème : La fusion des saveurs</p>
        <p>Chef invité : Michelin Dupont</p>
      </div>
    </div>
</div>

    </section>

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
        <img src="images/client1.jpg" alt="Client 1">
        <blockquote>
          "J'ai participé à l'atelier de cuisine italienne et j'ai adoré ! Les chefs étaient passionnés et les recettes délicieuses. Je recommande Cook Master à tous les amateurs de bonne cuisine."
        </blockquote>
        <cite>- Sophie Martin</cite>
      </div>
    </div>
    <div class="col-md-4">
      <div class="testimonial-item">
        <img src="images/client2.jpg" alt="Client 2">
        <blockquote>
          "Les dégustations de produits bio sont incroyables chez Cook Master. J'ai découvert de nouvelles saveurs et j'ai été impressionné par la qualité des produits. Une expérience gastronomique inoubliable !"
        </blockquote>
        <cite>- David Dupont</cite>
      </div>
    </div>
    <div class="col-md-4">
      <div class="testimonial-item">
        <img src="images/client3.jpg" alt="Client 3">
        <blockquote>
          "Je suis très satisfait des formations professionnelles de Cook Master. J'ai acquis de nouvelles compétences et je me sens prêt à me lancer dans une carrière culinaire. Merci à toute l'équipe !"
        </blockquote>
        <cite>- Laura Tremblay</cite>
      </div>
    </div>
  </div>

    </section>

    <!-- Appel à l'action (CTA) -->
    <section class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2>Prêt à explorer Cook Master ?</h2>
          <p>Choisissez votre prochaine expérience culinaire dès maintenant !</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 text-center">
          <a href="#" class="btn btn-primary btn-lg">Inscrivez-vous à un atelier</a>
        </div>
        <div class="col-md-4 text-center">
          <a href="#" class="btn btn-primary btn-lg">Réservez une salle</a>
        </div>
        <div class="col-md-4 text-center">
          <a href="#" class="btn btn-primary btn-lg">Explorez nos recettes</a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">
          <a href="#" class="btn btn-secondary btn-lg">Parcourez notre boutique en ligne</a>
        </div>
      </div>
    </section>

    <!-- Section "À propos de nous" -->
  <section class="container">
    <div class="row">
        <div class="col-md-12">
          <h2 class="text-center">À propos de nous</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <img src="images/about-us.jpg" alt="À propos de nous">
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
        <div class="col-md-12">
          <h2 class="text-center">Foire aux questions</h2>
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
        @endguest
@endsection