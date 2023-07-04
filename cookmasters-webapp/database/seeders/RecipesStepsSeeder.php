<?php

namespace Database\Seeders;

use App\Models\RecipesSteps;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecipesStepsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $steps = [
            [
                'title' => 'Préparation de la pâte',
                'step' => 1,
                'description' => 'Dans un bol, mélanger la farine, le sucre, la levure chimique et le sel. Faire un puits au centre et y ajouter le lait, les œufs et le beurre fondu. Bien mélanger jusqu\'à obtenir une pâte lisse et homogène.',
                'recipe_id' => 1,
            ],
            [
                'title' => 'Cuisson des pancakes',
                'step' => 2,
                'description' => 'Faire chauffer une poêle antiadhésive à feu moyen. Verser une louche de pâte dans la poêle chaude et laisser cuire jusqu\'à ce que des bulles se forment à la surface du pancake. Retourner le pancake et laisser cuire encore quelques instants de l\'autre côté. Répéter l\'opération avec le reste de la pâte.',
                'recipe_id' => 1,
            ],
            [
                'title' => 'Servir les pancakes',
                'step' => 3,
                'description' => 'Empiler les pancakes cuits sur une assiette et les servir chauds avec du sirop d\'érable, du miel, de la confiture, des fruits ou de la pâte à tartiner selon vos préférences. Bon appétit !',
                'recipe_id' => 1,
            ],

            [
                'title' => 'Préparation du poulet',
                'step' => 1,
                'description' => 'Préchauffer le four à 180°C. Nettoyer le poulet et le sécher avec du papier absorbant. Assaisonner l\'intérieur et l\'extérieur du poulet avec du sel, du poivre et des herbes aromatiques de votre choix (thym, romarin, etc.).',
                'recipe_id' => 2,
            ],
            [
                'title' => 'Cuisson du poulet',
                'step' => 2,
                'description' => 'Placer le poulet dans un plat allant au four et enfourner pendant environ 1 heure et demie, en arrosant régulièrement le poulet avec son jus de cuisson. Vérifier la cuisson en piquant la cuisse : le jus qui s\'écoule doit être clair.',
                'recipe_id' => 2,
            ],
            [
                'title' => 'Dressage et service',
                'step' => 3,
                'description' => 'Sortir le poulet du four et le laisser reposer pendant quelques minutes avant de le découper. Servir le poulet rôti aux herbes avec des pommes de terre rôties, des légumes de saison et une sauce de votre choix. Bon appétit !',
                'recipe_id' => 2,
            ],

            [
                'title' => 'Préparation des ingrédients',
                'step' => 1,
                'description' => 'Laver les tomates et les couper en tranches. Couper également la mozzarella en tranches. Effeuiller les feuilles de basilic.',
                'recipe_id' => 3,
            ],
            [
                'title' => 'Assemblage de la salade',
                'step' => 2,
                'description' => 'Alterner les tranches de tomates et de mozzarella sur un plat de service. Insérer les feuilles de basilic entre chaque tranche. Saler, poivrer et arroser généreusement d\'huile d\'olive.',
                'recipe_id' => 3,
            ],
            [
                'title' => 'Finalisation et service',
                'step' => 3,
                'description' => 'Laisser reposer la salade Caprese pendant quelques minutes afin que les saveurs se mélangent. Servir la salade en accompagnement d\'un plat principal ou en entrée légère. Bon appétit !',
                'recipe_id' => 3,
            ],

            [
                'title' => 'Préparation de la marinade',
                'step' => 1,
                'description' => 'Dans un bol, mélanger le jus de citron vert, l\'huile d\'olive, l\'ail émincé, le paprika, le cumin, le sel et le poivre. Ajouter les filets de poisson dans la marinade et les laisser mariner pendant au moins 30 minutes au réfrigérateur.',
                'recipe_id' => 4,
            ],
            [
                'title' => 'Cuisson du poisson',
                'step' => 2,
                'description' => 'Faire chauffer une poêle à feu moyen. Retirer les filets de poisson de la marinade et les faire cuire dans la poêle préchauffée pendant environ 3 à 4 minutes de chaque côté, jusqu\'à ce qu\'ils soient bien cuits et légèrement dorés.',
                'recipe_id' => 4,
            ],
            [
                'title' => 'Assemblage des tacos',
                'step' => 3,
                'description' => 'Réchauffer les tortillas de maïs dans une poêle chaude. Garnir chaque tortilla avec des morceaux de poisson cuit, de la laitue déchiquetée, des tranches d\'avocat, de la salsa et de la coriandre fraîche. Plier les tortillas en forme de tacos et servir immédiatement. Bon appétit !',
                'recipe_id' => 4,
            ],

            [
                'title' => 'Préparation de la pâte',
                'step' => 1,
                'description' => 'Préchauffer le four à 180°C. Faire fondre le chocolat et le beurre au bain-marie ou au micro-ondes. Dans un bol, fouetter les œufs avec le sucre jusqu\'à obtenir un mélange mousseux. Incorporer le chocolat fondu et la farine tamisée. Bien mélanger.',
                'recipe_id' => 5,
            ],
            [
                'title' => 'Cuisson du gâteau',
                'step' => 2,
                'description' => 'Verser la pâte dans un moule beurré et fariné. Enfourner pendant environ 20 à 25 minutes, jusqu\'à ce que la surface du gâteau soit ferme mais le cœur encore fondant. Laisser refroidir légèrement avant de démouler.',
                'recipe_id' => 5,
            ],
            [
                'title' => 'Dressage et service',
                'step' => 3,
                'description' => 'Saupoudrer le gâteau au chocolat fondant de sucre glace avant de le servir. Accompagner d\'une boule de crème glacée à la vanille ou d\'une crème anglaise pour encore plus de gourmandise. Bon appétit !',
                'recipe_id' => 5,
            ],        
        ];

        foreach ($steps as $step) {
            RecipesSteps::create($step);
        }
    }
}
