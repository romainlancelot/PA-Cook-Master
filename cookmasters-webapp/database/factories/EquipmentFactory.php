<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipment>
 */
class EquipmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $photos = [
            "frigo.jpeg",
            "frigo1.jpeg",
            "frigo2.jpeg",
            "frigo3.jpeg",
            "frigo4.jpeg",
        ];

        $caracteristiques = array(
            "Intérieur de couleur platine avec accents métalliques",
            "Finition PrintShield™",
            "Système de gestion de température ExtendFresh™",
            "Plateau coulissant",
            "Étagère coulissante"
        );
        
        return [
            'name' => "Refrigerator",
            'category' => "Electroménager",
            'marque' => "Samsung",
            'key_features' => json_encode($caracteristiques),
            'colors' => json_encode(["black", "white", "grey", "red", "blue", "green", "yellow", "orange", "purple", "pink", "brown", "beige", "turquoise", "gold", "silver"]),
            'simple_description' => "Réfrigérateur à portes françaises standard d'une capacité de 26,8 pieds cubes avec distributeur d'eau et de glaçons externe.",
            'warranty_url' => "https://www.kitchenaid.com/content/dam/global/documents/202302/warranty-w11655296-revA.pdf",
            'height' => "70 pouces",
            'width' => "35 pouces",
            'depth' => "34 pouces",
            'dimensional_guide_url' => "https://www.kitchenaid.com/content/dam/global/documents/202304/repair-parts-list-w11659217-revb.pdf",
            'name_3d' => "https://www.kitchenaid.com/content/dam/global/documents/202203/owners-manual-w11502338-revc.pdf",
            'manual_url' => "https://www.kitchenaid.com/content/dam/global/documents/202203/owners-manual-w11502338-revc.pdf",
            'photos' => json_encode($photos),
            'description' => "26.8 Cu. Ft. Standard-Depth French Door Refrigerator with Exterior Ice and Water Dispenser
            This standard-depth french door refrigerator keeps ingredients fresh and in easy reach with specialized spaces that make room for everything from salmon to sangria. A full-width Pull Out Tray fits platters and casserole dishes without stacking, while a Slide-Away Shelf adjusts to accommodate tall pitchers and carafes. The ExtendFresh™ Temperature Management System maintains optimal temperatures for fresh and frozen foods.",
            'price' => 2000,
            'availablequantity' => 10,
        ];
    }
}
