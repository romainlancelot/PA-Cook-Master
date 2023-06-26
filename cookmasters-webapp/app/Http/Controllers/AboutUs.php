<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUs extends Controller
{
    public function index()
    {
        // Votre logique de récupération des données pour la page "À propos de nous"
        $history = "Depuis nos modestes débuts en 2016, Cook Master s'est développé pour devenir un leader dans l'industrie de la cuisine et de la gastronomie à Paris. Notre passion pour la cuisine de qualité, associée à notre engagement envers l'excellence et l'innovation, nous a permis de créer des expériences culinaires uniques et mémorables pour nos clients.";

        $team = "Nous sommes fiers de notre équipe de chefs talentueux, passionnés par la cuisine et dévoués à offrir des prestations de qualité supérieure. Chaque membre de notre équipe apporte son expertise, sa créativité et son amour de la cuisine pour offrir des ateliers, des cours animés, des dégustations et bien d'autres services à nos clients.";

        $values = [
            "Qualité : Nous nous engageons à utiliser des ingrédients frais et de haute qualité pour préparer nos plats.",
            "Créativité : Nous croyons en l'innovation et en l'exploration de nouvelles saveurs et combinaisons de goûts.",
            "Service client : Nous plaçons nos clients au centre de nos préoccupations et nous nous efforçons de leur offrir une expérience chaleureuse et personnalisée.",
            "Passion : La passion pour la cuisine est notre moteur principal. Nous sommes constamment inspirés par les possibilités infinies qu'elle offre."
        ];

        // Passer les données à la vue
        return view('about-us', compact('history', 'team', 'values'));
    }
}
