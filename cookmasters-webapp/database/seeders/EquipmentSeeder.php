<?php

namespace Database\Seeders;

use App\Models\Equipment;
use App\Models\User;
use App\Models\Comments;
use Illuminate\Database\Seeder;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = User::all();
        $len_users = count($users);

        $equipments = [
            [
                'id' => 1,
                'name' => "Refrigerator",
                'saleable' => true,
                'reservable' => false, 
                'category' => "Electroménager",
                'marque' => "Samsung",
                'key_features' => json_encode(["Intérieur de couleur platine avec accents métalliques","Finition PrintShield™","Système de gestion de température ExtendFresh™","Plateau coulissant","Étagère coulissante"]),
                'colors' => json_encode(["black", "white", "grey", "red", "blue", "green", "yellow", "orange", "purple", "pink", "brown", "beige", "turquoise", "gold", "silver"]),
                'simple_description' => "Réfrigérateur à portes françaises standard d'une capacité de 26,8 pieds cubes avec distributeur d'eau et de glaçons externe.",
                'warranty_url' => "https://www.kitchenaid.com/content/dam/global/documents/202302/warranty-w11655296-revA.pdf",
                'height' => "70 pouces",
                'width' => "35 pouces",
                'depth' => "34 pouces",
                'dimensional_guide_url' => "https://www.kitchenaid.com/content/dam/global/documents/202304/repair-parts-list-w11659217-revb.pdf",
                'name_3d' => "https://www.kitchenaid.com/content/dam/global/documents/202203/owners-manual-w11502338-revc.pdf",
                'manual_url' => "https://www.kitchenaid.com/content/dam/global/documents/202203/owners-manual-w11502338-revc.pdf",
                'photos' => json_encode(["frigo.jpeg","frigo1.jpeg","frigo2.jpeg","frigo3.jpeg","frigo4.jpeg",]),
                'description' => "26.8 Cu. Ft. Standard-Depth French Door Refrigerator with Exterior Ice and Water Dispenser
                This standard-depth french door refrigerator keeps ingredients fresh and in easy reach with specialized spaces that make room for everything from salmon to sangria. A full-width Pull Out Tray fits platters and casserole dishes without stacking, while a Slide-Away Shelf adjusts to accommodate tall pitchers and carafes. The ExtendFresh™ Temperature Management System maintains optimal temperatures for fresh and frozen foods.",
                'availablequantity' => 10,
            ],
            [
                'id' => 2,
                'name' => "Oven",
                'saleable' => true,
                'reservable' => false,
                'category' => "Electroménager",
                'marque' => "Samsung",
                'key_features' => json_encode(["Intérieur de couleur platine avec accents métalliques","Finition PrintShield™","Système de gestion de température ExtendFresh™","Plateau coulissant","Étagère coulissante"]),
                'colors' => json_encode(["black", "white", "grey", "red", "blue", "green", "yellow", "orange", "purple", "pink", "brown", "beige", "turquoise", "gold", "silver"]),
                'simple_description' => "Four mural simple à convection véritable de 30 po avec technologie Even-Heat™",
                'warranty_url' => "https://www.kitchenaid.com/content/dam/global/documents/202302/warranty-w11655296-revA.pdf",
                'height' => "30 pouces",
                'width' => "30 pouces",
                'depth' => "24 pouces",
                'dimensional_guide_url' => "https://www.kitchenaid.com/content/dam/global/documents/202304/repair-parts-list-w11659217-revb.pdf",
                'name_3d' => "https://www.kitchenaid.com/content/dam/global/documents/202203/owners-manual-w11502338-revc.pdf",
                'manual_url' => "https://www.kitchenaid.com/content/dam/global/documents/202203/owners-manual-w11502338-revc.pdf",
                'photos' => json_encode(["2023_Color_of_the_Year_Hibiscus_Stand_Mixer1.jpeg","2023_Color_of_the_Year_Hibiscus_Stand_Mixer2.jpeg","2023_Color_of_the_Year_Hibiscus_Stand_Mixer3.jpeg","2023_Color_of_the_Year_Hibiscus_Stand_Mixer4.jpeg","2023_Color_of_the_Year_Hibiscus_Stand_Mixer.jpeg",]),
                'description' => "30-Inch Single Wall Oven with Even-Heat™ True Convection
                This 30-inch single wall oven with Even-Heat™ true convection provides consistent heating and even cooking. A unique bow-tie shaped design and convection fan helps ensure there are no burnt edges or undercooked centers. The Temperature Probe delivers accurate measurement of internal temperatures of meats, poultry, and casseroles without opening the oven. Bold design details are the perfect balance of elegance and functionality.",
                'availablequantity' => 10,
            ],
            [
                'id' => 3,
                'name' => "Oven",
                'saleable' => true,
                'reservable' => false,
                'category' => "Electroménager",
                'marque' => "Samsung",
                'key_features' => json_encode(["Intérieur de couleur platine avec accents métalliques","Finition PrintShield™","Système de gestion de température ExtendFresh™","Plateau coulissant","Étagère coulissante"]),
                'colors' => json_encode(["black", "white", "grey", "red", "blue", "green", "yellow", "orange", "purple", "pink", "brown", "beige", "turquoise", "gold", "silver"]),
                'simple_description' => "Four mural simple à convection véritable de 30 po avec technologie Even-Heat™",
                'warranty_url' => "https://www.kitchenaid.com/content/dam/global/documents/202302/warranty-w11655296-revA.pdf",
                'height' => "30 pouces",
                'width' => "30 pouces",
                'depth' => "24 pouces",
                'dimensional_guide_url' => "https://www.kitchenaid.com/content/dam/global/documents/202304/repair-parts-list-w11659217-revb.pdf",
                'name_3d' => "https://www.kitchenaid.com/content/dam/global/documents/202203/owners-manual-w11502338-revc.pdf",
                'manual_url' => "https://www.kitchenaid.com/content/dam/global/documents/202203/owners-manual-w11502338-revc.pdf",
                'photos' => json_encode(["24_Beverage_Center_with_Glass_Door_and_Metal-Front_Racks1.jpeg", "24_Beverage_Center_with_Glass_Door_and_Metal-Front_Racks2.jpeg", "24_Beverage_Center_with_Glass_Door_and_Metal-Front_Racks3.jpeg", "24_Beverage_Center_with_Glass_Door_and_Metal-Front_Racks4.jpeg", "24_Beverage_Center_with_Glass_Door_and_Metal-Front_Racks.jpeg"]),
                'description' => "30-Inch Single Wall Oven with Even-Heat™ True Convection
                This 30-inch single wall oven with Even-Heat™ true convection provides consistent heating and even cooking. A unique bow-tie shaped design and convection fan helps ensure there are no burnt edges or undercooked centers. The Temperature Probe delivers accurate measurement of internal temperatures of meats, poultry, and casseroles without opening the oven. Bold design details are the perfect balance of elegance and functionality.",
                'availablequantity' => 10,
            ],
            [
                'id' => 4,
                'name' => "Oven",
                'saleable' => true,
                'reservable' => false,
                'category' => "Electroménager",
                'marque' => "Samsung",
                'key_features' => json_encode(["Intérieur de couleur platine avec accents métalliques","Finition PrintShield™","Système de gestion de température ExtendFresh™","Plateau coulissant","Étagère coulissante"]),
                'colors' => json_encode(["black", "white", "grey", "red", "blue", "green", "yellow", "orange", "purple", "pink", "brown", "beige", "turquoise", "gold", "silver"]),
                'simple_description' => "Four mural simple à convection véritable de 30 po avec technologie Even-Heat™",
                'warranty_url' => "https://www.kitchenaid.com/content/dam/global/documents/202302/warranty-w11655296-revA.pdf",
                'height' => "30 pouces",
                'width' => "30 pouces",
                'depth' => "24 pouces",
                'dimensional_guide_url' => "https://www.kitchenaid.com/content/dam/global/documents/202304/repair-parts-list-w11659217-revb.pdf",
                'name_3d' => "https://www.kitchenaid.com/content/dam/global/documents/202203/owners-manual-w11502338-revc.pdf",
                'manual_url' => "https://www.kitchenaid.com/content/dam/global/documents/202203/owners-manual-w11502338-revc.pdf",
                'photos' => json_encode(["26.8_Cu._Ft._Standard-Depth_French_Door_Refrigerator_with_Exterior_Ice_and_Water_Dispenser1.jpeg", "26.8_Cu._Ft._Standard-Depth_French_Door_Refrigerator_with_Exterior_Ice_and_Water_Dispenser2.jpeg", "26.8_Cu._Ft._Standard-Depth_French_Door_Refrigerator_with_Exterior_Ice_and_Water_Dispenser3.jpeg", "26.8_Cu._Ft._Standard-Depth_French_Door_Refrigerator_with_Exterior_Ice_and_Water_Dispenser4.jpeg", "26.8_Cu._Ft._Standard-Depth_French_Door_Refrigerator_with_Exterior_Ice_and_Water_Dispenser.jpeg"]),
                'description' => "30-Inch Single Wall Oven with Even-Heat™ True Convection
                This 30-inch single wall oven with Even-Heat™ true convection provides consistent heating and even cooking. A unique bow-tie shaped design and convection fan helps ensure there are no burnt edges or undercooked centers. The Temperature Probe delivers accurate measurement of internal temperatures of meats, poultry, and casseroles without opening the oven. Bold design details are the perfect balance of elegance and functionality.",
                'availablequantity' => 10,
            ],
            [
                'id' => 5,
                'name' => "Oven",
                'saleable' => true,
                'reservable' => false,
                'category' => "Electroménager",
                'marque' => "Samsung",
                'key_features' => json_encode(["Intérieur de couleur platine avec accents métalliques","Finition PrintShield™","Système de gestion de température ExtendFresh™","Plateau coulissant","Étagère coulissante"]),
                'colors' => json_encode(["black", "white", "grey", "red", "blue", "green", "yellow", "orange", "purple", "pink", "brown", "beige", "turquoise", "gold", "silver"]),
                'simple_description' => "Four mural simple à convection véritable de 30 po avec technologie Even-Heat™",
                'warranty_url' => "https://www.kitchenaid.com/content/dam/global/documents/202302/warranty-w11655296-revA.pdf",
                'height' => "30 pouces",
                'width' => "30 pouces",
                'depth' => "24 pouces",
                'dimensional_guide_url' => "https://www.kitchenaid.com/content/dam/global/documents/202304/repair-parts-list-w11659217-revb.pdf",
                'name_3d' => "https://www.kitchenaid.com/content/dam/global/documents/202203/owners-manual-w11502338-revc.pdf",
                'manual_url' => "https://www.kitchenaid.com/content/dam/global/documents/202203/owners-manual-w11502338-revc.pdf",
                'photos' => json_encode(["26.8_Cu._Ft._Standard-Depth_French_Door_Refrigerator_with_Exterior_Ice_and_Water_Dispenser1.jpeg", "26.8_Cu._Ft._Standard-Depth_French_Door_Refrigerator_with_Exterior_Ice_and_Water_Dispenser2.jpeg", "26.8_Cu._Ft._Standard-Depth_French_Door_Refrigerator_with_Exterior_Ice_and_Water_Dispenser3.jpeg", "26.8_Cu._Ft._Standard-Depth_French_Door_Refrigerator_with_Exterior_Ice_and_Water_Dispenser4.jpeg", "26.8_Cu._Ft._Standard-Depth_French_Door_Refrigerator_with_Exterior_Ice_and_Water_Dispenser.jpeg"]),
                'description' => "30-Inch Single Wall Oven with Even-Heat™ True Convection
                This 30-inch single wall oven with Even-Heat™ true convection provides consistent heating and even cooking. A unique bow-tie shaped design and convection fan helps ensure there are no burnt edges or undercooked centers. The Temperature Probe delivers accurate measurement of internal temperatures of meats, poultry, and casseroles without opening the oven. Bold design details are the perfect balance of elegance and functionality.",
                'availablequantity' => 10,
            ],
            [
                'id' => 6,
                'name' => "Oven",
                'saleable' => true,
                'reservable' => false,
                'category' => "Electroménager",
                'marque' => "Samsung",
                'key_features' => json_encode(["Intérieur de couleur platine avec accents métalliques","Finition PrintShield™","Système de gestion de température ExtendFresh™","Plateau coulissant","Étagère coulissante"]),
                'colors' => json_encode(["black", "white", "grey", "red", "blue", "green", "yellow", "orange", "purple", "pink", "brown", "beige", "turquoise", "gold", "silver"]),
                'simple_description' => "Four mural simple à convection véritable de 30 po avec technologie Even-Heat™",
                'warranty_url' => "https://www.kitchenaid.com/content/dam/global/documents/202302/warranty-w11655296-revA.pdf",
                'height' => "30 pouces",
                'width' => "30 pouces",
                'depth' => "24 pouces",
                'dimensional_guide_url' => "https://www.kitchenaid.com/content/dam/global/documents/202304/repair-parts-list-w11659217-revb.pdf",
                'name_3d' => "https://www.kitchenaid.com/content/dam/global/documents/202203/owners-manual-w11502338-revc.pdf",
                'manual_url' => "https://www.kitchenaid.com/content/dam/global/documents/202203/owners-manual-w11502338-revc.pdf",
                'photos' => json_encode(["Over-The-Range_Microwave_with_Flush_Built-In_Design1.jpeg","Over-The-Range_Microwave_with_Flush_Built-In_Design2.jpeg","Over-The-Range_Microwave_with_Flush_Built-In_Design3.jpeg","Over-The-Range_Microwave_with_Flush_Built-In_Design4.jpeg","Over-The-Range_Microwave_with_Flush_Built-In_Design.jpeg"]),
                'description' => "30-Inch Single Wall Oven with Even-Heat™ True Convection
                This 30-inch single wall oven with Even-Heat™ true convection provides consistent heating and even cooking. A unique bow-tie shaped design and convection fan helps ensure there are no burnt edges or undercooked centers. The Temperature Probe delivers accurate measurement of internal temperatures of meats, poultry, and casseroles without opening the oven. Bold design details are the perfect balance of elegance and functionality.",
                'availablequantity' => 10,
            ],
            [
                'id' => 7,
                'name' => "Oven",
                'saleable' => true,
                'reservable' => false,
                'category' => "Electroménager",
                'marque' => "Samsung",
                'key_features' => json_encode(["Intérieur de couleur platine avec accents métalliques","Finition PrintShield™","Système de gestion de température ExtendFresh™","Plateau coulissant","Étagère coulissante"]),
                'colors' => json_encode(["black", "white", "grey", "red", "blue", "green", "yellow", "orange", "purple", "pink", "brown", "beige", "turquoise", "gold", "silver"]),
                'simple_description' => "Four mural simple à convection véritable de 30 po avec technologie Even-Heat™",
                'warranty_url' => "https://www.kitchenaid.com/content/dam/global/documents/202302/warranty-w11655296-revA.pdf",
                'height' => "30 pouces",
                'width' => "30 pouces",
                'depth' => "24 pouces",
                'dimensional_guide_url' => "https://www.kitchenaid.com/content/dam/global/documents/202304/repair-parts-list-w11659217-revb.pdf",
                'name_3d' => "https://www.kitchenaid.com/content/dam/global/documents/202203/owners-manual-w11502338-revc.pdf",
                'manual_url' => "https://www.kitchenaid.com/content/dam/global/documents/202203/owners-manual-w11502338-revc.pdf",
                'photos' => json_encode(["Semi-Automatic_Espresso_Machine1.jpeg","Semi-Automatic_Espresso_Machine2.jpeg","Semi-Automatic_Espresso_Machine3.jpeg","Semi-Automatic_Espresso_Machine.jpeg"]),
                'description' => "30-Inch Single Wall Oven with Even-Heat™ True Convection
                This 30-inch single wall oven with Even-Heat™ true convection provides consistent heating and even cooking. A unique bow-tie shaped design and convection fan helps ensure there are no burnt edges or undercooked centers. The Temperature Probe delivers accurate measurement of internal temperatures of meats, poultry, and casseroles without opening the oven. Bold design details are the perfect balance of elegance and functionality.",
                'availablequantity' => 10,
            ],
            [
                'id' => 8,
                'name' => "Oven",
                'saleable' => true,
                'reservable' => false,
                'category' => "Electroménager",
                'marque' => "Samsung",
                'key_features' => json_encode(["Intérieur de couleur platine avec accents métalliques","Finition PrintShield™","Système de gestion de température ExtendFresh™","Plateau coulissant","Étagère coulissante"]),
                'colors' => json_encode(["black", "white", "grey", "red", "blue", "green", "yellow", "orange", "purple", "pink", "brown", "beige", "turquoise", "gold", "silver"]),
                'simple_description' => "Four mural simple à convection véritable de 30 po avec technologie Even-Heat™",
                'warranty_url' => "https://www.kitchenaid.com/content/dam/global/documents/202302/warranty-w11655296-revA.pdf",
                'height' => "30 pouces",
                'width' => "30 pouces",
                'depth' => "24 pouces",
                'dimensional_guide_url' => "https://www.kitchenaid.com/content/dam/global/documents/202304/repair-parts-list-w11659217-revb.pdf",
                'name_3d' => "https://www.kitchenaid.com/content/dam/global/documents/202203/owners-manual-w11502338-revc.pdf",
                'manual_url' => "https://www.kitchenaid.com/content/dam/global/documents/202203/owners-manual-w11502338-revc.pdf",
                'photos' => json_encode(["Shave_Ice_Attachment1.jpeg","Shave_Ice_Attachment2.jpeg","Shave_Ice_Attachment3.jpeg","Shave_Ice_Attachment.jpeg"]),
                'description' => "30-Inch Single Wall Oven with Even-Heat™ True Convection
                This 30-inch single wall oven with Even-Heat™ true convection provides consistent heating and even cooking. A unique bow-tie shaped design and convection fan helps ensure there are no burnt edges or undercooked centers. The Temperature Probe delivers accurate measurement of internal temperatures of meats, poultry, and casseroles without opening the oven. Bold design details are the perfect balance of elegance and functionality.",
                'availablequantity' => 10,
            ],
            [
                'id' => 9,
                'name' => "Oven",
                'saleable' => true,
                'reservable' => false,
                'category' => "Electroménager",
                'marque' => "Samsung",
                'key_features' => json_encode(["Intérieur de couleur platine avec accents métalliques","Finition PrintShield™","Système de gestion de température ExtendFresh™","Plateau coulissant","Étagère coulissante"]),
                'colors' => json_encode(["black", "white", "grey", "red", "blue", "green", "yellow", "orange", "purple", "pink", "brown", "beige", "turquoise", "gold", "silver"]),
                'simple_description' => "Four mural simple à convection véritable de 30 po avec technologie Even-Heat™",
                'warranty_url' => "https://www.kitchenaid.com/content/dam/global/documents/202302/warranty-w11655296-revA.pdf",
                'height' => "30 pouces",
                'width' => "30 pouces",
                'depth' => "24 pouces",
                'dimensional_guide_url' => "https://www.kitchenaid.com/content/dam/global/documents/202304/repair-parts-list-w11659217-revb.pdf",
                'name_3d' => "https://www.kitchenaid.com/content/dam/global/documents/202203/owners-manual-w11502338-revc.pdf",
                'manual_url' => "https://www.kitchenaid.com/content/dam/global/documents/202203/owners-manual-w11502338-revc.pdf",
                'photos' => json_encode(["3Double_Wall_Oven_with_Even-Heat_True_Convection1.jpeg","3Double_Wall_Oven_with_Even-Heat_True_Convection2.jpeg","3Double_Wall_Oven_with_Even-Heat_True_Convection3.jpeg"]),
                'description' => "30-Inch Single Wall Oven with Even-Heat™ True Convection
                This 30-inch single wall oven with Even-Heat™ true convection provides consistent heating and even cooking. A unique bow-tie shaped design and convection fan helps ensure there are no burnt edges or undercooked centers. The Temperature Probe delivers accurate measurement of internal temperatures of meats, poultry, and casseroles without opening the oven. Bold design details are the perfect balance of elegance and functionality.",
                'availablequantity' => 10,
            ],
            [
                'id' => 10,
                'name' => "Oven",
                'saleable' => false,
                'reservable' => true,
                'category' => "Electroménager",
                'marque' => "Samsung",
                'key_features' => json_encode(["Intérieur de couleur platine avec accents métalliques","Finition PrintShield™","Système de gestion de température ExtendFresh™","Plateau coulissant","Étagère coulissante"]),
                'colors' => json_encode(["black", "white", "grey", "red", "blue", "green", "yellow", "orange", "purple", "pink", "brown", "beige", "turquoise", "gold", "silver"]),
                'simple_description' => "Four mural simple à convection véritable de 30 po avec technologie Even-Heat™",
                'warranty_url' => "https://www.kitchenaid.com/content/dam/global/documents/202302/warranty-w11655296-revA.pdf",
                'height' => "30 pouces",
                'width' => "30 pouces",
                'depth' => "24 pouces",
                'dimensional_guide_url' => "https://www.kitchenaid.com/content/dam/global/documents/202304/repair-parts-list-w11659217-revb.pdf",
                'name_3d' => "https://www.kitchenaid.com/content/dam/global/documents/202203/owners-manual-w11502338-revc.pdf",
                'manual_url' => "https://www.kitchenaid.com/content/dam/global/documents/202203/owners-manual-w11502338-revc.pdf",
                'photos' => json_encode(["3Double_Wall_Oven_with_Even-Heat_True_Convection1.jpeg","3Double_Wall_Oven_with_Even-Heat_True_Convection2.jpeg","3Double_Wall_Oven_with_Even-Heat_True_Convection3.jpeg"]),
                'description' => "30-Inch Single Wall Oven with Even-Heat™ True Convection
                This 30-inch single wall oven with Even-Heat™ true convection provides consistent heating and even cooking. A unique bow-tie shaped design and convection fan helps ensure there are no burnt edges or undercooked centers. The Temperature Probe delivers accurate measurement of internal temperatures of meats, poultry, and casseroles without opening the oven. Bold design details are the perfect balance of elegance and functionality.",
                'availablequantity' => 10,
            ],
            [
                'id' => 11,
                'name' => "Oven",
                'saleable' => false,
                'reservable' => true,
                'category' => "Electroménager",
                'marque' => "Samsung",
                'key_features' => json_encode(["Intérieur de couleur platine avec accents métalliques","Finition PrintShield™","Système de gestion de température ExtendFresh™","Plateau coulissant","Étagère coulissante"]),
                'colors' => json_encode(["black", "white", "grey", "red", "blue", "green", "yellow", "orange", "purple", "pink", "brown", "beige", "turquoise", "gold", "silver"]),
                'simple_description' => "Four mural simple à convection véritable de 30 po avec technologie Even-Heat™",
                'warranty_url' => "https://www.kitchenaid.com/content/dam/global/documents/202302/warranty-w11655296-revA.pdf",
                'height' => "30 pouces",
                'width' => "30 pouces",
                'depth' => "24 pouces",
                'dimensional_guide_url' => "https://www.kitchenaid.com/content/dam/global/documents/202304/repair-parts-list-w11659217-revb.pdf",
                'name_3d' => "https://www.kitchenaid.com/content/dam/global/documents/202203/owners-manual-w11502338-revc.pdf",
                'manual_url' => "https://www.kitchenaid.com/content/dam/global/documents/202203/owners-manual-w11502338-revc.pdf",
                'photos' => json_encode(["3Double_Wall_Oven_with_Even-Heat_True_Convection1.jpeg","3Double_Wall_Oven_with_Even-Heat_True_Convection2.jpeg","3Double_Wall_Oven_with_Even-Heat_True_Convection3.jpeg"]),
                'description' => "30-Inch Single Wall Oven with Even-Heat™ True Convection
                This 30-inch single wall oven with Even-Heat™ true convection provides consistent heating and even cooking. A unique bow-tie shaped design and convection fan helps ensure there are no burnt edges or undercooked centers. The Temperature Probe delivers accurate measurement of internal temperatures of meats, poultry, and casseroles without opening the oven. Bold design details are the perfect balance of elegance and functionality.",
                'availablequantity' => 10,
            ]
        ];

        $equipment_len = count($equipments);

        for ($i = 0; $i < $equipment_len; $i++) {
            $equipments[$i] = new Equipment($equipments[$i]);
            $equipments[$i]->price = rand(20, 500);
            $equipments[$i]->save();
        }

        $comments = [
            [
                'user_id' =>  rand(2,$len_users),
                'firstname' => 'John',
                'lastname' => 'Doe',
                'rating' => 5,
                'body' => "Design moderne et élégant. Finition résistante aux traces de doigts. Maintient les aliments frais plus longtemps."
            ],
            [
                'user_id' => rand(2,$len_users),
                'firstname' => 'Jane',
                'lastname' => 'Doe',
                'rating' => 4,
                'body'=> "Très bon produit. Je recommande. Aspect haut de gamme avec des accents métalliques.Maintient des températures optimales.Fonctionnalités pratiques pour une utilisation quotidienne."
            ],
            [
                'user_id' => rand(2,$len_users),
                'firstname' => 'Tom',
                'lastname' => 'Smith',
                'rating' => 4,
                'body'=> "Très satisfait de cet achat. Facile à utiliser et maintient parfaitement le froid."
            ],
            [
                'user_id' => rand(2,$len_users),
                'firstname' => 'Sarah',
                'lastname' => 'Johnson',
                'rating' => 5,
                'body'=> "Un excellent produit qui vaut chaque centime. Je suis impressionné par sa capacité de stockage."
            ],
            [
                'user_id' => rand(2,$len_users),
                'firstname' => 'Robert',
                'lastname' => 'Brown',
                'rating' => 4,
                'body'=> "Bon produit avec une finition de qualité. Je recommande fortement."
            ],
            [
                'user_id' => rand(2,$len_users),
                'firstname' => 'Emily',
                'lastname' => 'Williams',
                'rating' => 5,
                'body'=> "Un produit très efficace avec un grand espace de stockage. L'option de distribution de glaçons est très pratique."
            ],
            [
                'user_id' => rand(2,$len_users),
                'firstname' => 'David',
                'lastname' => 'Davis',
                'rating' => 5,
                'body'=> "Très content de cet achat. Ce produit répond à tous mes besoins."
            ],
            [
                'user_id' => rand(2,$len_users),
                'firstname' => 'Jessica',
                'lastname' => 'Miller',
                'rating' => 4,
                'body'=> "Un excellent ajout à ma cuisine. Il a une belle allure et fonctionne très bien."
            ],
            [
                'user_id' => rand(2,$len_users),
                'firstname' => 'Mark',
                'lastname' => 'Wilson',
                'rating' => 5,
                'body'=> "Le meilleur produit que j'ai jamais possédé. Je suis très satisfait de mon achat."
            ],
            [
                'user_id' => rand(2,$len_users),
                'firstname' => 'Laura',
                'lastname' => 'Moore',
                'rating' => 4,
                'body'=> "Un excellent produit avec beaucoup d'espace de rangement. Je suis impressionné par sa performance."
            ]
            
        ];

        foreach ($comments as $comment) {
            $comment1 = Comments::create($comment);
            $random_index = rand(0, ($equipment_len - 1));
            $comment1->commentable()->associate($equipments[$random_index])->save();

            
            $random_index = rand(0, ($equipment_len - 1));
            $comment2 = Comments::create($comment);
            $comment2->commentable()->associate($equipments[$random_index])->save();
            
            $random_index = rand(0, ($equipment_len - 1));
            $comment3 = Comments::create($comment);
            $comment3->commentable()->associate($equipments[$random_index])->save();
        }
    }
}
