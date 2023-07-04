<?php

namespace Database\Seeders;

use App\Models\CookingRecipes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CookingRecipesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recipes = [
            [
                'name' => 'Pancakes',
                'description' => 'Les pancakes sont des crêpes épaisses et moelleuses, originaires des États-Unis. Ils sont généralement servis au petit déjeuner ou au brunch, accompagnés de sirop d\'érable, de miel, de confiture, de fruits ou de pâte à tartiner.',
                'image' => 'images/recipes/pancakes.jpg',
                'cooking_time' => 20,
                'difficulty' => 1,
                'people' => 4,
                'user_id' => 1,
            ],
            [
                'name' => 'Poulet rôti aux herbes',
                'description' => 'Le poulet rôti aux herbes est un plat classique de la cuisine française. La volaille est assaisonnée avec un mélange d\'herbes aromatiques, puis rôtie au four jusqu\'à ce qu\'elle soit dorée et juteuse. Il est souvent accompagné de pommes de terre rôties ou de légumes grillés.',
                'image' => 'images/recipes/roasted_chicken.jpg',
                'cooking_time' => 90,
                'difficulty' => 2,
                'people' => 6,
                'user_id' => 1,
            ],
            [
                'name' => 'Salade Caprese',
                'description' => 'La salade Caprese est une salade italienne rafraîchissante et colorée. Elle est préparée avec des tomates, de la mozzarella et des feuilles de basilic frais, assaisonnée d\'huile d\'olive, de vinaigre balsamique, de sel et de poivre. C\'est un plat léger et estival, idéal en entrée ou en accompagnement.',
                'image' => 'images/recipes/caprese_salad.jpg',
                'cooking_time' => 15,
                'difficulty' => 1,
                'people' => 2,
                'user_id' => 1,
            ],
            [
                'name' => 'Tacos au poisson',
                'description' => 'Les tacos au poisson sont une spécialité mexicaine délicieuse. Les filets de poisson sont généralement marinés avec des épices, puis grillés ou frits. Ils sont servis dans des tortillas de maïs chaudes, garnis de légumes frais, de sauce crémeuse à base de yaourt et de citron vert. Les tacos au poisson sont un plat savoureux et léger, parfait pour un repas décontracté.',
                'image' => 'images/recipes/fish_tacos.jpg',
                'cooking_time' => 30,
                'difficulty' => 2,
                'people' => 4,
                'user_id' => 1,
            ],
            [
                'name' => 'Gâteau au chocolat fondant',
                'description' => 'Le gâteau au chocolat fondant est un dessert irrésistible pour les amateurs de chocolat. Ce gâteau moelleux est préparé avec du chocolat noir de qualité, du beurre, du sucre, des œufs et de la farine. Il est cuit jusqu\'à ce qu\'il soit légèrement croquant à l\'extérieur et délicieusement fondant à l\'intérieur. Le gâteau au chocolat fondant est souvent servi avec de la crème glacée à la vanille ou de la crème fouettée.',
                'image' => 'images/recipes/chocolate_cake.jpg',
                'cooking_time' => 60,
                'difficulty' => 3,
                'people' => 8,
                'user_id' => 1,
            ],
            [
                'name' => 'Spaghetti à la carbonara',
                'description' => 'Les spaghetti à la carbonara sont un plat classique de la cuisine italienne. Ils sont préparés avec des pâtes cuites al dente, du lard ou du pancetta, des œufs, du fromage pecorino romano ou parmesan, et du poivre noir. La sauce est crémeuse et délicieusement salée. Les spaghetti à la carbonara sont simples à réaliser et constituent un repas réconfortant.',
                'image' => 'images/recipes/carbonara_spaghetti.jpg',
                'cooking_time' => 25,
                'difficulty' => 2,
                'people' => 2,
                'user_id' => 1,
            ],
            [
                'name' => 'Salade de quinoa aux légumes',
                'description' => 'La salade de quinoa aux légumes est une recette saine et nourrissante. Le quinoa est cuit et mélangé avec des légumes colorés tels que les tomates, les concombres, les poivrons et les oignons rouges. On y ajoute souvent des herbes fraîches, une vinaigrette légère et des graines croquantes pour apporter de la texture. Cette salade est idéale comme plat principal végétarien ou comme accompagnement.',
                'image' => 'images/recipes/quinoa_salad.jpg',
                'cooking_time' => 30,
                'difficulty' => 1,
                'people' => 4,
                'user_id' => 1,
            ],
            [
                'name' => 'Curry de poulet',
                'description' => 'Le curry de poulet est un plat parfumé et épicé d\'origine indienne. Le poulet est mijoté dans une sauce épaisse et crémeuse à base de tomates, d\'oignons, d\'ail, de gingembre et d\'un mélange d\'épices tel que le curcuma, le cumin, la coriandre et le garam masala. Il est souvent accompagné de riz basmati ou de pain naan. Le curry de poulet est un délice pour les amateurs de saveurs exotiques.',
                'image' => 'images/recipes/chicken_curry.jpg',
                'cooking_time' => 45,
                'difficulty' => 3,
                'people' => 6,
                'user_id' => 1,
            ],
            [
                'name' => 'Tarte aux pommes',
                'description' => 'La tarte aux pommes est un grand classique des desserts. Elle est composée d\'une croûte croustillante remplie de tranches de pommes sucrées, saupoudrées de sucre et de cannelle. La tarte est ensuite cuite au four jusqu\'à ce que les pommes soient tendres et la croûte dorée. Servie tiède avec une boule de glace à la vanille, la tarte aux pommes est un véritable délice.',
                'image' => 'images/recipes/apple_pie.jpg',
                'cooking_time' => 60,
                'difficulty' => 2,
                'people' => 8,
                'user_id' => 1,
            ],
            [
                'name' => 'Risotto aux champignons',
                'description' => 'Le risotto aux champignons est un plat crémeux et savoureux d\'origine italienne. Le riz Arborio est cuit lentement dans un bouillon parfumé aux champignons, avec des oignons, de l\'ail et du vin blanc. On y ajoute ensuite du parmesan râpé et du beurre pour obtenir une texture onctueuse. Le risotto aux champignons est un plat réconfortant parfait en automne ou en hiver.',
                'image' => 'images/recipes/mushroom_risotto.jpg',
                'cooking_time' => 40,
                'difficulty' => 2,
                'people' => 4,
                'user_id' => 1,
            ],
            [
                'name' => 'Burger végétarien',
                'description' => 'Le burger végétarien est une alternative saine et délicieuse au burger traditionnel. Il est préparé avec un steak végétal à base de légumes, de céréales ou de légumineuses, assaisonné d\'épices et grillé ou cuit au four. Le burger est garni de légumes frais tels que la laitue, la tomate, l\'oignon et l\'avocat, et peut être accompagné de fromage végétalien et de sauces savoureuses. C\'est un choix idéal pour les personnes souhaitant réduire leur consommation de viande.',
                'image' => 'images/recipes/vegetarian_burger.jpg',
                'cooking_time' => 30,
                'difficulty' => 2,
                'people' => 2,
                'user_id' => 1,
            ],
            [
                'name' => 'Gazpacho',
                'description' => 'Le gazpacho est une soupe froide espagnole rafraîchissante et légère. Il est préparé à base de tomates mûres, de concombre, de poivron, d\'oignon, d\'ail, de pain trempé dans de l\'huile d\'olive et de vinaigre. Le tout est mixé jusqu\'à obtenir une consistance lisse et servi bien frais. Le gazpacho est parfait pour les journées chaudes d\'été et peut être agrémenté de garnitures comme des croutons, du concombre coupé en dés ou de l\'huile d\'olive supplémentaire.',
                'image' => 'images/recipes/gazpacho.jpg',
                'cooking_time' => 20,
                'difficulty' => 1,
                'people' => 4,
                'user_id' => 1,
            ],
            [
                'name' => 'Poulet au curry rouge',
                'description' => 'Le poulet au curry rouge est un plat épicé et parfumé d\'inspiration thaïlandaise. Le poulet est cuit dans une sauce au curry rouge à base de pâte de curry, de lait de coco, de citronnelle, de galanga et d\'autres épices. Des légumes croquants comme les poivrons, les carottes et les pois mange-tout sont souvent ajoutés pour plus de saveurs et de textures. Servi avec du riz jasmin, le poulet au curry rouge est un mélange de douceur et de piquant qui ravira vos papilles.',
                'image' => 'images/recipes/red_curry_chicken.jpg',
                'cooking_time' => 45,
                'difficulty' => 3,
                'people' => 4,
                'user_id' => 1,
            ],
        ];

        foreach ($recipes as $recipe) {
            CookingRecipes::create($recipe);
        }
    }
}
