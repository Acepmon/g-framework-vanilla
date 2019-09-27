<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TermTaxonomyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        /* Car Type Table START */

        $CarType = ['Sedan', 'SUV', 'Sport', 'Trucks', 'Vans', 'Bus',];

        foreach($CarType as &$type){
            $term_id1 = DB::table('terms')->insertGetId([
                'name' => $type,
                'slug' => $type,
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id1,
                'taxonomy' => 'Car Type',
                'description' => $type,
                'count' => 0
            ]);
        }
        /* Car Type Table END */

        /* Manufacturer Table START */

        $Factory = ['Toyota', 'Lexus', 'Nissan', 'Mercedes-benz', 'Volkswagen', 'Mini', 'Audi', 'BMW', 'Ford', 'Land Rover', 'Daihatsu', 'Dodge', 'Honda', 'Hyundai', 'Kia', 
        'Jeep', 'Subaru', 'Suzuki'];

        foreach($Factory as &$manufacture){
            $term_id1 = DB::table('terms')->insertGetId([
                'name' => $manufacture,
                'slug' => $manufacture,
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id1,
                'taxonomy' => 'Manufacturer',
                'description' => $manufacture,
                'count' => 0
            ]);
        }

        /* Manufacturer Table END*/

        /* Fuel Table Start*/

        $FuelType = ['Gasoline', 'Diesel', 'LPG', 'Gasoline + Electricity', 'LPG + Electricity', 'Gasoline + CNG', 'Diesel + Electricity', 'Electricity', 'LNG'];

        foreach($FuelType as &$fuel){
            $term_id1 = DB::table('terms')->insertGetId([
                'name' => $fuel,
                'slug' => $fuel,
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id1,
                'taxonomy' => 'Fuel',
                'description' => $fuel,
                'count' => 0
            ]);
        }
        
        /* Fuel Table END*/

        /* Transmission Table START */

        $Transmission = ['Auto', 'Semi Auto', 'Manual', 'CVT'];

        foreach($Transmission as &$trans){
            $term_id1 = DB::table('terms')->insertGetId([
                'name' => $trans,
                'slug' => $trans,
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id1,
                'taxonomy' => 'Transmission',
                'description' => $trans,
                'count' => 0
            ]);
        }

        /* Transmission Table END */

        /* Area Table START */

        $location = ['Ulaanbaatar', 'Darkhan', 'Erdenet', 'Arkhangai', 'Bayan-Ulgii', 'Bayankhongor', 'Bulgan', 'Gobi-Altai', 'Gobisumber', 'Darkhan-Uul', 'Dornogobi', 'Dornod'
    , 'Dundgobi', 'Zavkhan', 'Orkhon', 'Uvurkhangai', 'Umnugobi', 'Sukhbaatar', 'Selenge', 'Tuv', 'Uvs', 'Khovd', 'Khuvsgul', 'Khentii'];

        foreach($location as &$area){
            $term_id1 = DB::table('terms')->insertGetId([
                'name' => $area,
                'slug' => $area,
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id1,
                'taxonomy' => 'Area',
                'description' => $area,
                'count' => 0
            ]);
        }

        /* Area Table END */

        /* Color Table START */

        $colour = ['White', 'Black', 'Rusty', 'Pearl gray', 'Silver', 'Aluminum', 'Beige', 'Blue', 'Brown', 'Bronze', 'Claret', 'Copper'
    , 'Cream', 'Gold', 'Gray', 'Green', 'Maroon', 'Metallic', 'Navy', 'Orange', 'Pink', 'Purple', 'Red', 'Rose', 'Tan', 'RoTurquoisese', 'Yellow'];

        foreach($colour as &$color){
            $term_id1 = DB::table('terms')->insertGetId([
                'name' => $color,
                'slug' => $color,
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id1,
                'taxonomy' => 'Color',
                'description' => $color,
                'count' => 0
            ]);
        }

        /* Color Table END */

        /* Steering Wheel Table START */

        $WheelPosition = ['Right', 'Left'];

        foreach($WheelPosition as &$position){
            $term_id1 = DB::table('terms')->insertGetId([
                'name' => $position,
                'slug' => $position,
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id1,
                'taxonomy' => 'Steering Wheel',
                'description' => $position,
                'count' => 0
            ]);
        }

        /* Steering Wheel Table END */

        /* An accident Table START */

        $accidents = ['Unassuming', 'Simple exchange', 'Simple accident'];

        foreach($accidents as &$accident){
            $term_id1 = DB::table('terms')->insertGetId([
                'name' => $accident,
                'slug' => $accident,
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id1,
                'taxonomy' => 'Accident',
                'description' => $accident,
                'count' => 0
            ]);
        }

        /* An accident Table END */

        /* Passenger Table START */

        $manCount = ['Four seater', '5 passengers', '7 passengers', '9 passengers', '11 passengers', '13 passengers', '15 passengers', 'Direct input'];

        foreach($manCount as &$seat){
            $term_id1 = DB::table('terms')->insertGetId([
                'name' => $seat,
                'slug' => $seat,
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id1,
                'taxonomy' => 'Passenger',
                'description' => $seat,
                'count' => 0
            ]);
        }

        /* Passenger Table END */

        /* Option Table START */

        $options = ['Exterior', 'Guts', 'Safety', 'Convenience', 'Clean'];

        foreach($options as &$option){
            $term_id1 = DB::table('terms')->insertGetId([
                'name' => $option,
                'slug' => $option,
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id1,
                'taxonomy' => 'Option',
                'description' => 'options',
                'count' => 0
            ]);
        }

        /* option table end*/

        /* exterior table start*/

        $Exteriors = ['Rear wiper', 'Electric folding side mirror', '4 season tire', 'Aluminum wheel', 'Sunroof'];

        foreach($Exteriors as &$Exterior){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $Exterior,
                'slug' => $Exterior,
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Exterior',
                'description' => 'exterior',
                'count' => 0
            ]);
        }

        /* exterior table end*/

        /* guts table start*/
        
        $Guts = ['Power Door lock', 'Memory seat : driver’s seat', 'Heated Seat: Rear Seat', 'Heated Seat: Driver’s Seat', 'Electric seat : Passenger seat', 'Electric seat : driver’s seat'
        , 'Leather seat', 'Power steering', 'Steering wheel remote control'];

        foreach($Guts as &$Gut){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $Gut,
                'slug' => $Gut,
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Gut',
                'description' => 'Gut',
                'count' => 0
            ]);
        }

        /* guts table end */

        /* safety table start */

        $safetys = ['Electric parking brake', 'ABS', 'Parking sense : Front', 'Parking Sense : rear', 'Camera : Side', 'Camera : Rear', 'Camera : Front', 'Airbag : Curtains'
        , 'Airbag : Side', 'Passenger’s seat', 'Airbag : Driver’s seat'];

        foreach($safetys as &$safety){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $safety,
                'slug' => $safety,
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Safety',
                'description' => 'safety',
                'count' => 0
            ]);
        }

        /* safety table end */

        /* convenience table start */

        $Convenience = ['Black box', 'Blinder : rear', 'AV monitor : Rear', 'AV monitor : Front', 'Rain senser', 'Auto light', 'Bluetooth', 'AUX terminal', 'USB Terminal'
        , 'Navigation', 'CD player', 'Power window', 'Auto air conditioner', 'Cruise control', 'Smart Key'];

        foreach($Convenience as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => $model,
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Convenience',
                'description' => 'model',
                'count' => 0
            ]);
        }

        /* convenience table end */

        /* clean table start */

        $clean = ['Woman driver', 'No smoking', 'One person drive'];

        foreach($clean as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => $model,
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Clean',
                'description' => $model,
                'count' => 0
            ]);
        }

        /* convenience Table END */

        /* Wheel Table START */

        $Wheels = ['Front', 'Back'];

        foreach($Wheels as &$Wheel){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $Wheel,
                'slug' => $Wheel,
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Wheel Drive',
                'description' => $Wheel,
                'count' => 0
            ]);
        }

        /* Wheel Table END */

        /* Model Table START */

        $toyota = ['4Runner', 'Allion', 'Alphard', 'Aqua', 'Auris', 'Avensis', 'Belta', 'Brevis', 'Camry', 'Carina', 'Chaser', 'Corolla', 'Corolla Axio', 'Corolla Fielder', 'Corolla Rumion', 
        'Corolla Runx','Corolla Spacio', 'Crown-150', 'Crown-170', 'Crown-180', 'Crown-200', 'Crown Majesta', 'Estima', 'Fortuner', 'Gaia', 'Harrier', 'Hiace', 'Highlander', 
        'Hilux', 'Ipsum', 'Isis', 'Ist', 'Kluger', 'Land Cruiser-100', 'Land Cruiser-105', 'Land Cruiser-200', 'Land Cruiser-70', 'Land Cruiser-80', 'Land Cruiser Cygnus', 
        'Land Cruiser Prado-120', 'Land Cruiser Prado-150', 'Land Cruiser Prado-95', 'Mark2-100', 'Mark2-110', 'Mark X', 'Mark X Zio', 'Noah', 'Passo', 'Passo Settle', 
        'Premio', 'Prius-10', 'Prius-11', 'Prius-20', 'Prius-30', 'Prius-41 Alpha', 'Probox', 'Progres', 'Ractis', 'Raum','Rav4', 'Rush', 'Sai', 'Sienta', 'Succeed', 'Tacoma', 
        'Tundra', 'Vanguard', 'Vellfire', 'Venza', 'Verossa', 'Vitz', 'Voxy', 'Wish'];

        foreach($toyota as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Toyota',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '7',
                'count' => 0
            ]);
        }

        $Nissan = ['Nissan Patrol/Safari ', 'Nissan Skyline ', 'Nissan Caravan', 'Nissan Pulsar', 'Nissan Maxima', 'Nissan Prairie', 'Nissan Atlas', 'Nissan Micra ', 'Nissan Sentra', 'Nissan Urvan', 'Nissan Pathfinder ',
        'Nissan Cima ', 'Nissan Serena ', 'Nissan Altima', 'Nissan Cube', 'Nissan Elgrand', 'Nissan Navara/Frontier', 'Nissan Sylphy', 'Nissan X-Trail', 'Nissan Murano', 'Nissan Teana', 'Nissan Armada ',
        'Nissan Fuga ', 'Nissan Lafesta', 'Nissan Titan', 'Nissan Note', 'Nissan Livina', 'Nissan Clipper', 'Nissan Latio', 'Nissan Qashqai', 'Nissan Rogue', 'Nissan Versa', 'Nissan GT-R', 'Nissan 370Z Z34 ',
        'Nissan Leaf', 'Nissan NV200', 'Nissan Juke', 'Nissan NV400 ', 'Nissan NV', 'Nissan NV100', 'Nissan NV350', 'Nissan Dayz ', 'Nissan Dayz Roox ', 'Nissan NV300 ', 'Nissan Kicks', 'Nissan Terra'];

        foreach($Nissan as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Nissan',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '9',
                'count' => 0
            ]);
        }
        
        /* Model Table END */

        /* Doctors Verified Table START */

        $doctors = ['Баталгаажсан', 'Баталгаажаагүй'];

        foreach($doctors as &$doctor){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $doctor,
                'slug' => $doctor,
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Doctors Verified',
                'description' => $doctor,
                'count' => 0
            ]);
        }

        /* Doctors Verified Table END */

    }
}
