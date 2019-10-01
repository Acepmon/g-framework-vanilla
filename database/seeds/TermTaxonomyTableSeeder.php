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
                'taxonomy' => $type,
                'description' => $type,
                'count' => 0
            ]);
        }
        /* Car Type Table END */

        /* Manufacturer Table START */

        $Factory = ['Toyota', 'Lexus', 'Nissan', 'Mercedes-benz', 'Volkswagen', 'Mini', 'Audi', 'BMW', 'Ford', 'Land Rover', 'Daihatsu', 'Dodge', 'Honda', 'Hyundai', 'Kia' 
        ,'Jeep', 'Subaru', 'Suzuki', 'Mitsubishi', 'Infiniti', 'Mazda', 'Chevrolet', 'isuzu', 'Acura', 'Porsche', 'Tesla', 'Volvo', 'Daewoo', 'Mitsuoka', 'Eunos', 'CT T'
        , 'AM General', 'Alfa Romeo', 'Aston Martin', 'Bentley', 'Bugatti', 'Buick', 'Cadillac', 'Chrysler', 'Eagle', 'Jaguar', 'Lamborghini', 'Lincoln', 'Lotus', 'Maserati'
        , 'Maybach', 'McLaren', 'Panoz', 'Ram', 'Rolls-Royce', 'Saab', 'Scion', 'Smart', 'Spyker'];

        foreach($Factory as &$manufacture){
            $term_id1 = DB::table('terms')->insertGetId([
                'name' => $manufacture,
                'slug' => $manufacture,
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id1,
                'taxonomy' => $manufacture,
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
                'taxonomy' => $fuel,
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
                'taxonomy' => $trans,
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
                'taxonomy' => $area,
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
                'taxonomy' => $color,
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
                'taxonomy' => $position,
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
                'taxonomy' => $accident,
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
                'taxonomy' => $seat,
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
                'taxonomy' => $option,
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
                'taxonomy' => $Exterior,
                'description' => 'exterior',
                'parent_id' => '102',
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
                'taxonomy' => $Gut,
                'description' => 'Guts',
                'parent_id' => '103',
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
                'taxonomy' => $safety,
                'description' => 'safety',
                'parent_id' => '104',
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
                'taxonomy' => $model,
                'description' => 'model',
                'parent_id' => '105',
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
                'taxonomy' => $model,
                'description' => $model,
                'parent_id' => '106',
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
                'taxonomy' => $Wheel,
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

        $Lexus = ['2011 Lexus CT 200h', '2014 Lexus CT 200h', '2000 Lexus IS 200/IS 300', '2006 Lexus IS 250/IS 250 AWD/IS 300/IS 350/IS 220d', '2008 Lexus IS F', 
        '2010 Lexus IS 250 C/IS 300 C/IS 350 C/IS F', '2011 Lexus IS 220d', '2013 Lexus IS 250/IS 350/IS 300h', '2015 Lexus IS 200t'
        , '2017 Lexus IS 250/IS 300/IS 350/IS 300h', '2010 Lexus HS 250h', '2013 Lexus HS 250h', '1990 Lexus ES 250', '1992 Lexus ES 300', '1997 Lexus ES 300',
         '2004 Lexus ES 330', '2007 Lexus ES 350', '2010 Lexus ES 240', '2013 Lexus ES 250/ES 300h/ES 350', '2015 Lexus ES 200/ES 250/ES 300h/ES 350'
        , '1993 Lexus GS 300', '1998 Lexus GS 300/GS 400', '2001 Lexus GS 430', '2006 Lexus GS 300/GS 300 AWD/GS 430/GS 450h', '2008 Lexus GS 350/GS 350 AWD/GS 460', 
        '2013 Lexus GS 250/GS 350/GS 350 AWD/GS 450h', '2015 Lexus GS 200t/GS 250/GS 350/GS 350 AWD/GS 450h/GS F', '1990 Lexus LS 400', '2001 Lexus LS 430', '2007 Lexus LS 460/LS 460 L'
        , '2008 Lexus LS 600h/LS 600h L', '2009 Lexus LS 460/LS 460 AWD/LS 460 L/LS 460 L AWD', '2010 Lexus LS 460 SZ/Sport', '2013 Lexus LS 460/LS 460 AWD/LS 460 L/LS 460 L AWD/LS 600h L',
         '2017 Lexus LS 500/LS 500h', '1992 Lexus SC 300/SC 400', '2002 Lexus SC 430', '2006 Lexus SC 430', '2014 Lexus RC 300h/RC 350/RC F', '2016 Lexus RC 200t', '2016 Lexus LC 500/LC 500h'
         , '2011 Lexus LFA', '2012 Lexus LFA Nürburgring Package', '2014 Lexus NX 200t/NX 300h', '2018 Lexus UX 200/UX 250h', '1999 Lexus RX 300', '2004 Lexus RX 330'
         , '2006 Lexus RX 400h', '2007 Lexus RX 350', '2010 Lexus RX 350/RX 450h', '2011 Lexus RX 270', '2013 Lexus RX 270/RX 350/RX 450h', '2015 Lexus RX 200t/RX 350/RX 450h', 
         '2003 Lexus GX 470', '2011 Lexus GX 460', '2014 Lexus GX 460', '1997 Lexus LX 450', '1999 Lexus LX 470', '2008 Lexus LX 470/LX 570'
         , '2013 Lexus LX 460/LX 570', '2016 Lexus LX 570', '2020 Lexus LM 350', '2020 Lexus LM 300h', '2011 Lexus CT 200h F Sport'
         , '2014 Lexus CT 200h F Sport', '2011 Lexus IS 250/350/200d/250 C/350 C F Sport', '2013 Lexus IS 250/300h/350 F Sport', '2013 Lexus GS 350 F Sport', '2013 Lexus GS 450h F Sport'
         , '2013 Lexus LS 460 F Sport', '2013 Lexus LS 600h F Sport', '2013 Lexus RX 350 F Sport', '2013 Lexus RX 450h F Sport', '2014 Lexus NX 200t F Sport'
         , '2014 Lexus RC 350 F Sport', '2003 SportDesign IS 300', '2007 Limited Edition IS 250 X', '2007 Neiman Marcus Edition IS F', '2007 "Elegant White" IS 250/350'
         , '2009 Special Edition IS 250 SR', '2009 "Red-edge Black" IS 250/350', '2009 "Blazing Terracotta" IS F', '2010 "X-Edition" IS 250', '2010 IS 350 C F Sport Special Edition'
         , '2011 Stone Works "Sunrise" IS 250', '1996 Coach Edition ES 300', '1999 Coach Edition ES 300', '2000 Platinum Edition ES 300', '2004 SportDesign ES 330'
         , '2005 Black Diamond Edition ES 330', '2009 Pebble Beach Edition ES 350', '2000 Platinum Series GS 300/400', '2001 SportDesign GS 300', '2007 Neiman Marcus Edition GS 450h'
         , '2009 "Passionate Black" GS 350/460/450h', '2009 "Meteor Black" GS 350/460', '2011 Stone Works "Sunset" GS 350', '1997 Coach Edition LS 400', '2000 Platinum Series LS 400'
         , '2007 Neiman Marcus Launch Edition LS 600h L', '2009 Pebble Beach Edition LS 600h L', '2004 Pebble Beach Edition SC 430', '2005 Pebble Beach Edition SC 430'
         , '2006 Pebble Beach Edition SC 430', '2007, 2008, 2009 Pebble Beach SC 430', '2010 "Eternal Jewel" SC 430', '2012 LFA Special Edition', '2001 SilverSport Special Edition RX 300'
         , '2002 Coach Edition RX 300', '2005 Thundercloud Edition RX 330', '2009 Pebble Beach Edition RX 350', '2011 Stone Works "Sunlight" RX 350', '2007 Limited Edition LX 470'
         , '2003 LF-X: crossover', '2003 LF-S: luxury sedan', '2004 LF-C: convertible', '2005 LF-A: sports coupe', '2006 LF-Sh: hybrid luxury sedan', '2007 LF-Xh: hybrid crossover'
         , '2008 LF-AR: roadster', '2009 LF-Ch: compact hybrid', '2011 LF-Gh: hybrid touring sedan', '2012 LF-LC: hybrid coupe', '2013 LF-NX: small crossover SUV', '2013 LF-C2: RC convertible'
         , '2015 LF-SA: Compact car[1]', '2015 LF-FC: Fuel Cell concept[2]', '2018 LF-1: Limitless concept[3]', '2003 Lexus IS 430 sports sedan', '2004 Carolina Herrera SC 430 CH'
         , '2005 Milan Design Week "L-finesse" LF-A', '2006 Milan Design Week "Evolving Fiber" LS 460', '2007 Higashifuji Driving Simulator LS 460', '2007 Milan Design Week "Invisible Garden" LS 600h L'
         , '2008 Milan Design Week "Elastic Diamond" LF-Xh', '2008 IS F Racing concept', '2009 LS 460 ITS-Safety Concept', '2009 Crystallised Wind LFA', '2010 IS F CCS Concept'
         , '2010 CT Umbra', '2011 CT Racing concept', '1994 Italdesign Lexus Landau: hatchback', '1995 Lexus FLV: station wagon', '1997 Lexus Street Rod: roadster', '1997 Lexus SLV: sport luxury vehicle'
         , '1997 Lexus HPS: sports sedan', '1999 Lexus Sports Coupe: convertible', '2003 Lexus HPX: crossover', '2009 Lexus HB: hybrid sports motorbike', '2016 Lexus UX: crossover'
         , '2017 Lexus LS+: luxury sedan', '2019 Lexus LY-650 Yacht[4]', '2002 Lexus 2054'];

        foreach($Lexus as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Lexus',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '8',
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

        $Mercedesbenz = ['400 (1924-1929)', 'W103/Type G1 (1926)', '630 (1926–1929)', 'W02 (1926-1939)', 'W03 (1926-1930)', 'W06, roadster (1927–1932)[1]', '680S (1928)'
        , '460, large luxury car (1928-1939)', '350, grand tourer (1929–1934)', '200 (1929-1934)', 'W07, full-size luxury car (1930–1938)', 'W28, (1931–1932)', 'W19, grand tourer (1932–1933)'
        , 'W22, large luxury car (1933-1934)', 'W21, mid-size luxury car (1933-1936)', 'W18, full-size luxury car (1933-1937)', 'W23, (1934–1936)', '500K, roadster (1934–1936)'
        , 'W31 Type G4, (1934–1939)', 'W30, prototype sport racing car (1935–1936)', 'W136, mid-size car (1935-1942)', 'W138, full-size luxury car (1936–1940)', 'W139/170 VL (1936-1942)'
        , '540K, roadster (1936–1943)', 'W143, mid-size luxury car (1937-1941)', 'W152/Type G5 (1937-1941)', 'W142, large luxury car (1937-1942)', '170 VK (1938-1942)'
        , 'W150, full-size luxury car (1938–1943)', 'W153, mid-size luxury car (1938-1943)', 'W136, mid-size car (1946–1955)', 'W191, mid-size executive car (1949–1955)'
        , 'W187, full-size luxury car (1951–1955)', 'W186, grand tourer (1951–1957)', 'W188, luxury car (1951–1958)', 'W120, mid-size executive car (1953–1962)', 'W180, luxury car (1954–1959)'
        , 'W198 300SL, grand tourer (1954–1963)', 'R121 190SL, roadster (1955–1963)', 'L319, light commercial van (1955–1968)', 'W105, luxury car (1956–1959)', 'W121, mid-size executive car (1956-1961)'
        , 'W189, full-size luxury car (1957–1960)', 'W128, executive car (1958–1960)', 'W111, full-size luxury car (1959–1971)', 'W110, mid-size luxury car (1961–1968)', 'W112, full-size luxury car (1961–1967)'
        , 'W113, roadster (1963–1970)', 'W100, full-size luxury car (1963–1981)', 'W108, full-size luxury car (1965–1973)', 'W114, mid-size executive car (1968-1976)'
        , 'T2, light commercial van (1968–1996)', 'R107, roadster (1971–1989)', 'W116, full-size luxury car (1972–1980)', 'W123, mid-size executive car (1976–1986)', 'W126, full-size luxury car (1979–1992)'
        , 'W460 G-Class, off-road SUV (1979–1990)', 'MB100, light commercial van (1981–1995)', 'W201 190, compact executive car (1982–1993)', 'W124 E-Class, mid-size executive car (1985–1994)'
        , 'R129 SL-Class, grand tourer roadster (1989–2001)', 'W463 G-Class, luxury SUV (1990–2018)', 'W140 S-Class, full-size luxury car (1991–1998)', 'W202 C-Class, compact executive car (1993–2000)'
        , 'W901 Sprinter, light commercial van (1995–2006)', 'W210 E-Class, mid-size executive car (1996–2002)', 'R170 SLK-Class, compact roadster (1996–2003)', 'W638 Vito, light commercial van (1996–2003)'
        , 'W670 Vario, full-size commercial van (1996–2013)', 'C208 CLK-Class, mid-size luxury car (1997–2003)', 'W163 M-Class, mid-size SUV (1997–2004)', 'W168 A-Class, subcompact car (1997–2004)'
        , 'W220 S-Class, full-size luxury car (1998–2005)', 'C215 CL-Class, grand tourer (1998–2006)', 'W203 C-Class, compact executive car (2001–2007)', 'R230 SL-Class, grand tourer (2001–2011)'
        , 'W414 Vaneo, compact MPV (2002–2005)', 'C209 CLK-Class, mid-size luxury car (2002–2010)', 'W211 E-Class, mid-size executive car (2003–2008)', 'C199 SLR McLaren, grand tourer (2003–2010)'
        , 'W639 Vito, light commercial van (2003–2014)', 'W219 CLS-Class, mid-size luxury car (2004–2010)', 'R171 SLK-Class, compact roadster (2004–2010)', 'W169 A-Class, subcompact car (2005–2011)'
        , 'W221 S-Class, Full-Size Luxury Car (2006-2013)', 'W251 R-Class, luxury MPV (2005–2017)', 'W164 M-Class, mid-size luxury SUV (2005–2011)', 'W245 B-Class, subcompact MPV (2006–2011)'
        , 'X164 GL-Class, full-size luxury SUV (2006–2012)', 'NCV3 Sprinter, light commercial van (2006–2018)', 'C216 CL-Class, grand tourer (2006–2014)', 'W204 C-Class, compact executive car (2008–2013)'
        , 'X204 GLK-Class, compact luxury crossover (2008–2015)', 'W212 E-Class, mid-size executive car (2009–2016)', 'C197 SLS AMG, sports car (2010–2014)', 'W218 CLS-Class, mid-size luxury car (2011–2018)'
        , 'R172 SLK-Class, compact roadster (2011–present)', 'W246 B-Class, subcompact MPV (2012–2018)', 'X166 GL-Class, full-size luxury SUV (2012–present)', 'W415 Citan, MPV van (2012–present)'
        , 'W176 A-Class, subcompact car (2013–2018)', 'R231 SL-Class, grand tourer roadster (2013–present)', 'W222 S-Class, full-size luxury car (2013–present)', 'C117 CLA-Class, subcompact executive car (2013–2019)'
        , 'X156 GLA-Class, subcompact luxury crossover (2013–present)', 'W205 C-Class, compact executive car (2014–present)', 'W447 Vito, light commercial van (2014–present)', 'C190 AMG GT, sports car (2015–present)'
        , 'X253 GLC-Class, compact luxury SUV (2015–present)', 'W213 E-Class, mid-size executive car (2016–present)', 'BR470 X-Class, luxury pickup truck (2017–present)'
        , 'W177 A-Class, subcompact car (2018–present)', 'C257 CLS-Class, mid-size luxury car (2018–present)', '️Mercedes-AMG GT 4-Door Coupé, Executive Car, 5 door liftback (2019-present)'
        , 'W463 G-Class, mid-size luxury SUV (2018–present)', 'EQC, fully electric compact SUV (2019–present)', 'W167 GLE-Class, mid-size SUV (2019–present)'
        , 'W247 B-Class, subcompact MPV (2019–present)', 'C118 CLA-Class, subcompact executive car (2019–present)', 'X247 GLB-Class, compact luxury SUV (2019–present)'
        , 'Mercedes-amg project one hybrid sports car (2019-present)'];

        foreach($Mercedesbenz as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Mercedesbenz',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '10',
                'count' => 0
            ]);
        }

        $Volkswagen = ['Volkswagen Amarok (2009–present)', 'Volkswagen Ameo (2016–present)', 'Volkswagen Arteon (2017–present)', 'Volkswagen Atlas (2017–present, also sold as Volkswagen Teramont)'
        , 'Volkswagen Caddy (1980–present)', 'Volkswagen California (2003–present)', 'Volkswagen Fox (2005–present)', 'Volkswagen Gol G5 (2008–present, also sold as Pointer)'
        , 'Volkswagen Golf Mk7 (2012–present)', 'Volkswagen Jetta A7 (2019–present)', 'Volkswagen Lamando (2014-present)', 'Volkswagen Lavida (2008–present)'
        , 'Volkswagen Beetle A5 (2011–present)', 'Volkswagen Passat B8 (2014–present, also sold as Passat GT)', 'Volkswagen Passat "B7" (2012–present)'
        , 'Volkswagen Polo Mk5 (2009–present)', 'Volkswagen Polo Blue GT (2017-present)', 'Volkswagen Santana (1981–present, also sold as Volkswagen Quantum)'
        , 'Volkswagen Sharan (1995–present)', 'Volkswagen Tiguan (2009–present)', 'Volkswagen Touareg II (2010–present)', 'Volkswagen Touran (2003–present)'
        , 'Volkswagen Transporter T6 (2015–present)', 'Volkswagen Up (2011–present)', 'Volkswagen Vento known as Volkswagen Polo Sedan (2010–present)'
        , 'Volkswagen XL 1 (2013-present)', 'Volkswagen 181 (1961-1983, also sold as Kurierwagen, Trekker, Thing, Safari)', 'Volkswagen Apollo (1990-1992)'
        , 'Volkswagen Beetle (1938-2003) (Internal designation: Volkswagen Type 1)', 'Volkswagen Brasília (1973-1982)', 'Volkswagen Cabrio (1979–2002)'
        , 'Volkswagen CC (2008–2017)', 'Volkswagen Citi Golf (1984–2009)', 'Volkswagen Corrado (1988-1995)', 'Volkswagen Country Buggy (1967-1969)'
        , 'Volkswagen Derby (1977-1981), (1995-2009, also sold as Polo Classic)', 'Volkswagen Eos (2006–2015)'
        , 'Volkswagen Gol G1 (1987-1993, also sold as Parati, Pointer, Fox)', 'Volkswagen Gol G2, G3, G4 (1994-2008, also sold as Pointer)'
        , 'Volkswagen Golf Mk1 (1974-2009)', 'Volkswagen Golf Mk2 (1983-1992)', 'Volkswagen Golf Mk3 (1991-1999)', 'Volkswagen Golf Mk4 (1999-2006)'
        , 'Volkswagen Golf Mk5 (2003-2009, also sold as Rabbit)', 'Volkswagen Golf Mk6 (2009–2013)', 'Volkswagen Iltis (1978–1988)'
        , 'Volkswagen Jetta A1 (1979-1984, also sold as Atlantic, Fox)', 'Volkswagen Jetta A2 (1985-1991)', 'Volkswagen Jetta A3 (1992-1998, also sold as Vento)'
        , 'Volkswagen Jetta A4 (1999-2004, also sold as Bora, Clasico)', 'Volkswagen Jetta A5 (2005–2011, also sold as Bora, Vento, Sagitar)'
        , 'Volkswagen K70 (1968–1972)', 'Volkswagen Karmann Ghia (1955-1974, also sold as Type 34 Karmann Ghia, 1500 Karmann Ghia Coupe)'
        , 'Volkswagen Kommandeurswagen (1941–1944)', 'Volkswagen Kübelwagen (1940–1945)', 'Volkswagen Lupo (1998–2005)'
        , 'Volkswagen Logus (1993–1997,based on the Ford Escort mk5 version)', 'Volkswagen New Beetle (1997–2011)', 'Volkswagen Santana (1984–1989)'
        , 'Volkswagen Passat B1 (1973-1981, also sold as Dasher)', 'Volkswagen Passat B2 (1982-1988, also sold as Quantum, Santana, Corsar, Carat)'
        , 'Volkswagen Passat B3 (1988-1993)', 'Volkswagen Passat B4 (1993-1996)', 'Volkswagen Passat B5 (1996-2005)', 'Volkswagen Passat B6 (2005–2010)'
        , 'Volkswagen Passat B7 (2010–2014)', 'Volkswagen Phaeton (2002–2016)', 'Volkswagen Pointer (1993-1997, also sold as Logus)'
        , 'Volkswagen Polo Mk1 (1975-1981, also sold as Derby)', 'Volkswagen Polo Mk2 (1982-1993, also sold as Derby & Classic II)'
        , 'Volkswagen Polo Mk3 (1994-2001, also sold as Classic III)', 'Volkswagen Polo Mk4 (2002–2009, also sold as Polo Vivo)', 'Volkswagen Polo Playa (1996-2002)'
        , 'Volkswagen-Porsche 914 (1969-1976, also sold as Porsche 914)', 'Volkswagen Routan (2008–2014)', 'Volkswagen Scirocco I (1974-1982)', 'Volkswagen Scirocco II (1982-1992)'
        , 'Volkswagen Scirocco III (2008-2017)', 'Volkswagen Schwimmwagen (1942–1944)', 'Volkswagen SP2 (1972-1976)', 'Volkswagen LT (1975–2006)'
        , 'Volkswagen Transporter T4 (1990-2003, also sold as Caravelle, Eurovan)', 'Volkswagen Transporter T5 (2003–2015, also sold as Caravelle, Multivan)'
        , 'Volkswagen Type 2 T1 (1950-1975)', 'Volkswagen Type 2 T2 (1967–2013, also sold as Kombi)', 'Volkswagen Type 2 T3 (1979-2002, also sold as Caravelle, Transporter, Vanagon, T25)'
        , 'Volkswagen Type 3 (1961-1973, also sold as 1500, 1600)', 'Volkswagen Type 4 (1967-1973)', 'Volkswagen Type 14A (1949–1953)', 'Volkswagen Type 18A (1949–?)'
        , 'Volkswagen Type 147 Kleinlieferwagen (1964–1974)', 'Volkswagen Golf', 'Volkswagen Sharan', 'Volkswagen Polo', 'Volkswagen Jetta', 'Volkswagen Passat'];

        foreach($Volkswagen as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Volkswagen',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '11',
                'count' => 0
            ]);
        }

        $Mini = ['Mini Mark I (1969 to 2000)', 'Mini Mark II (1967 to 1970)', 'Mini Marks III (1969 to 2000)', 'Mini Marks IV (1969 to 2000)', 'Mini Marks V (1969 to 2000)', 'Mini Marks VI (1969 to 2000)', 'Mini Marks VII (1969 to 2000)',
         'Mini Hatch/Hardtop (2001 to 2006)', 'Mini Convertible/Cabrio (2005 to 2008)', 'Mini Hatch/Hardtop (2007 to 2014)', 'Mini Clubman (2008 to 2014)', 'Mini Convertible (2009 to 2015)', 'Mini Countryman (2011 to 2016)', 
         'Mini Coupé (2012 to 2015)', 'Mini Roadster (2012 to 2015)', 'Mini Paceman (2013 to 2016)', 'Mini Hatch/Hardtop (2014 to present)'];

        foreach($Mini as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Mini',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '12',
                'count' => 0
            ]);
        }

        $Audi = ['Audi 60 (1969–1972)', 'Audi 100 (1968–1978)', 'Audi 80 (1972–1978)', 'Audi 50 (1974–1978)', 'Audi 100 (1969–1976)', 'Audi 100 Coupé S (1969–1974)'
        , 'Audi 80 (1978–1986)', 'Audi 200 5T (1979–1984)', 'Audi 100 (1982–1990)', 'Audi 80 quattro (1980–1987)', 'Audi 5+5 (1981-1983)'
        , 'Audi 90 (1984–1987)', 'Audi Coupe GT (1980–1987)', 'Audi Sport quattro (1983–1984)', 'Audi 80 (1986–1991)', 'Audi 90 (1986–1991)'
        , 'Audi V8 (1988–1995)', 'Audi Coupe (1988–1995)', 'Audi 100/A6 (1991–1998)', 'Audi 80 (1991–1996)', 'Audi Cabriolet (1990–2000)'
        , 'Audi A8 (1994–2003)', 'Audi A4 (1994–2001)', 'Audi A3 (1996–2003)', 'Audi A6 (1997–2006)', 'Audi Duo (1997)'
        , 'Audi TT Coupe (1998–2006)', 'Audi TT Roadster (1999–2006)', 'Audi A2 (1999–2006)', 'Audi 90s 1993', 'Audi A4 (2001–present)'
        , 'Audi A8 (2003–present)', 'Audi A3 (2003–present)', 'Audi A6 (2004–present)', 'Audi A3 Sportback (2005–present)', 'Audi Q7 (2005–present)'
        , 'Audi A6 allroad quattro (2006–present)', 'Audi A4 Cabriolet (2002–2006)', 'Audi TT (2006–present)', 'Audi A4 (2007–present)'
        , 'Audi A5 (2007–present)', 'Audi Q5 (2008–present)', 'Audi TT 2.0 TDI quattro (2008–present)', 'Audi A4 allroad quattro (2009–present)'
        , 'Audi R8 (2006-present)', 'Audi R8 V10', 'Audi A1 (2010–present)', 'Audi A3 (2003–present)', 'Audi A5 (2003–present)'
        , 'Audi A6 (2011–present)', 'Audi A6 allroad quattro (2012–present)', 'Audi A7 (2010–present)', 'Audi A8 (2010–present)'        , 'Audi Q2 (2017-present)'
        , 'Audi Q3 (2011–present)', 'Audi Q5 (2008–present)', 'Audi Q7 (2005–present)', 'Audi Q8 (2008–present)', 'Audi R8 (2015-present)'
        , 'Audi TT (2017-present)', 'Audi e-tron (TBD)', 'Audi S2 Coupé B3 (1990–1995)', 'Audi S4 C4 (1991–1995)', 'Audi S2 Avant B4 (1992-1995)'
        , 'Audi S2 Sedan B4 (1993-1994)', 'Audi Avant RS 2 P1 (1993–1994)', 'Audi S8 D2 (1994–2003)', 'Audi S6 C4 (1994–1997)', 'Audi S4 quattro B5 (1997–2002)'
        , 'Audi S6 C5 (1999–2004)', 'Audi S3 8L (1999–2003)', 'Audi RS 4 Avant B6 (2000–2001)', 'Audi S4 B6 (2002–2005)', 'Audi RS 6 C5 (2002–2004)'
        , 'Audi S3 8P (2006-2012)', 'Audi RS 4 B7 (2006–2008)', 'Audi S4 B7 (2006–2008)', 'Audi S8 D3 (2006–2010)', 'Audi S5 B8 (2007–2012)'
        , 'Audi R8 42 (2007–2015)', 'Audi RS 6 C6 (2007–2011)', 'Audi TTS (2008–)', 'Audi TT RS 8J (2009– 2016)', 'Audi RS5 8T (2010–2015)'
        , 'Audi S8 D4 (2010–2017)', 'Audi R8 GT (2010–2013)', 'Audi S3 8V (2012–)', 'Audi S7 4G (2012–2017)', 'Audi S5 B8.5 (2013–2017)'
        , 'Audi RS 6 C7 (2013–)', 'Audi RS7 C7 (2013–)', 'Audi S1 8X (2015–)', 'Audi R8 4S (2015–)', 'Audi TT RS 8S (2016–)'
        , 'Audi S5 B9 (2017–)', 'Audi RS5 (2017–)'];

        foreach($Audi as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Audi',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '13',
                'count' => 0
            ]);
        }

        $BMW = ['3/20 PS, compact car (1932–1934)', '303, compact car (1933–1937)', '328, roadster (1936–1940)', '326, mid-size luxury car (1936–1941)', '327, grand tourer (1937–1941)'
        , '320, mid-size luxury car (1937–1938)', '321, mid-size luxury car (1938–1941)', '335, full-size luxury car (1939–1941)', '321, mid-size luxury car (1945–1950)'
        , '326, mid-size luxury car (1945–1946)', '327, grand tourer (1946–1955)', '340, full-size luxury car (1949–1955)', '501, mid-size luxury car (1952–1962)'
        , 'Isetta, microcar (1953–1962)', '503, grand tourer (1956–1959)', '507, roadster (1956–1959)', '700, compact car (1959–1965)', '3200 CS, sports car (1962–1965)'
        , 'New Class (sedans), mid-size luxury car (1962–1972)', 'New Class (coupés), grand tourer (1965–1969)', '02 Series, compact executive car (1966–1977)'
        , 'E9 New Six, grand tourer (1968-1975)', 'E3 New Six, full-size luxury car (1968-1977)', 'E12 5 Series, mid-size luxury car (1972–1981)', 'E21 3 Series, compact executive car (1975–1983)'
        , 'E24 6 Series, grand tourer (1976–1989)', 'E23 7 Series, full-size luxury car (1977–1987)', 'E26 M1, supercar (1978–1981)', 'E28 5 Series, mid-size luxury car (1981–1988)'
        , 'E30 3 Series, compact executive car (1982–1994)', 'E32 7 Series, full-size luxury car (1986–1994)', 'E34 5 Series, mid-size luxury car (1987–1996)', 'Z1, roadster (1989–1991)'
        , 'E31 8 Series, grand tourer (1989–1999)', 'E36 3 Series, compact executive car (1990–2000)', 'E38 7 Series, full-size luxury car (1994–2001)', 'E36/7 Z3, two-seat roadster and coupé (1995–2002)'
        , 'E39 5 Series, mid-size luxury car (1995–2003)', 'E46 3 Series, compact executive car (1998–2006)', 'E53 X5, mid-size luxury SUV (1999–2006)', 'E52 Z8, roadster (2000–2003)'
        , 'E65 7 Series, full-size luxury car (2001–2008)', 'E85 Z4, two-seat roadster and coupé (2002–2008)', 'E60 5 Series, mid-size luxury car (2003–2010)', 'E63 6 Series, grand tourer (2003–2010)'
        , 'E83 X3, compact luxury SUV (2003–2010)', 'E87 1 Series, subcompact car (2004–2013)', 'E90 3 Series, compact executive car (2005–2013)', 'E70 X5, mid-size luxury SUV (2006–2013)'
        , 'E71 X6, mid-size luxury SUV (2008–2014)', 'F01 7 Series, full-size luxury car (2008-2015)', 'E89 Z4, roadster (2009–2016)', 'E84 X1, sub-compact luxury crossover (2009–2015)'
        , 'F06 6 Series, grand tourer (2011–2018)', 'F12/F13 6 Series, grand tourer (2011–2018)', 'F10 5 Series, mid-size luxury car (2010–2017)', 'F25 X3, compact luxury SUV (2011–2017)'
        , 'F20 1 Series, subcompact car (2011–2019)', 'F30 3 Series, compact executive car (2012–2019)', 'I01 i3, fully electric/hybrid subcompact car (2013–present)'
        , 'F32 4 Series, compact executive car (2013–present)', 'F22 2 Series, compact car (2013–present)', 'F15 X5, mid-size luxury SUV (2013–2018)', 'F45 2 Series, Active Tourer (2014–2016)'
        , 'I12 i8, hybrid sports car (2014–present)', 'F26 X4, compact luxury SUV (2014–2018)', 'F16 X6, mid-size luxury SUV (2014–2019)', 'F48 X1, compact SUV (2015–present)'
        , 'G11 7 Series, full-size luxury car (2015–present)', 'G30 5 Series, mid-size luxury car (2016–present)', 'G32 6 Series, mid-size luxury car (2017–present)', 'F39 X2, compact SUV (2018–present)'
        , 'G01 X3, compact luxury SUV (2017-present)', 'G02 X4, compact luxury SUV (2018–present)', 'G05 X5, mid-size luxury SUV (2018–present)', 'G15 8 Series, grand tourer (2018–present)'
        , 'G29 Z4, roadster (2018–present)', 'G20 3 Series, compact executive car (2019–present)', 'F40 1 Series, subcompact car (2019–present)', 'G06 X6, mid-size luxury SUV (2019–present)'
        , 'G07 X7, full-size luxury SUV (2019-present)'];

        foreach($BMW as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'BMW',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '14',
                'count' => 0
            ]);
        }
        
        $Ford = ['Ford C100', 'Ford Capri RS', 'Ford Escort RS 1700T', 'Ford Escort RS Cosworth', 'Ford Fiesta R5', 'Ford Fiesta RS WRC', 'Ford Focus RS WRC', 'Ford G7'
        , 'Ford GT40', 'Ford GT70', 'Ford Mustang GTP (1983–1984)', 'Ford Mustang Maxum GTP (1987)', 'Ford Mustang Probe (GTP, 1985)', 'Ford P68', 'Ford P69', 'Ford RS200'
        , 'Ford Sierra RS Cosworth', 'Ford E-Series (1961–2014)', 'Ford Econoline (1978–2013)', 'Ford Husky (circa 1987, South Africa)', 'Ford Spectron', 'Ford Supervan', 'Ford Thames 300E (1954–1961, Britain)'
        , 'Ford Thames 400E (1957–1965, Britain)', 'Ford Tourneo (1995–present)', 'Ford Tourneo Connect (2002–present, Europe)', 'Ford Transit (1965–present, Europe; 1972–1981, 1994–present, Australia; 2006–present, China; 2014–present, North America)'
        , 'Ford Transit Connect (2002–present, Europe; 2009−present, North America)', 'Ford Transit Courier (2014–present, Europe)', 'Ford Transit Custom (2012–present, Europe)'
        , 'Ford C-MAX (2007–present)', 'Ford S-Max (2008–present, Europe and China)', 'Ford Galaxy (1995–present)', 'Ford Windstar (1995–2004)', 'Ford Aerostar (1986–1997)'
        , 'Ford Freestar (2004–2007)', 'Ford Bronco (1966–1996)', 'Ford Bronco II (1984–1990)', 'Ford Ecosport (2004–present) (Brazilian SUV based on the Ford Fiesta)'
        , 'Ford Edge (2007–present)', 'Ford Endeavour (2002–present, India)', 'Ford Escape (2001–present)', 'Ford Everest (2003–present)', 'Ford Excursion (2000–2005)'
        , 'Ford Expedition (1997–present)', 'Ford Expedition EL/Max (2007–present; extended version of the Expedition)', 'Ford Explorer (1991–present)', 'Ford Fiera (1972–1984, Philippines)[1][2][3]'
        , 'Ford Flex (2009–present)', 'Ford Freestyle (2005–2007)', 'Ford Fusion (Europe) (2002–2012)', 'Ford Kuga (2008–present)', 'Ford Raider (1985–1998) (Australia and New Zealand, a rebadged Mazda Proceed Marvie)'
        , 'Ford Taurus X (2008–2009)', 'Ford Territory (2004–2016)', 'Ford A-Series (Light truck, Europe)', 'Ford B-Series (Bus chassis; 1948–1998)', 'Ford Bronco (Light Truck, 1966–1996)'
        , 'Ford C-Series (Medium-Duty C.O.E. Truck; 1957–1990)', 'Ford CL-Series (1978–1991; Heavy-Duty Cabover truck, replacement for W-Series trucks)', 'Ford Cargo (1981–present; North America, Europe, Brazil)'
        , 'Ford Courier (1952–1960 & 1972–1982, North America; 1991–2002, Europe; 1979–present, Australia; 1998–present, Brazil)', 'Ford D-series (1965–1981; Medium-Heavy truck, replaced by the Cargo, Europe)'
        , 'Ford Explorer Sport Trac (2001–2010)', 'Ford F-Series (1948–present)', 'Ford Freighter', 'Ford H-Series (1961–1965, Heavy-Duty C.O.E. truck commonly referred to as the "Two-Story Falcon")'
        , 'Ford jeep (1941–1945)', 'Ford L-Series (1970–1998; a.k.a. Louisville)', 'Ford LCF (for Low Cab Forward) (2006–present)', 'Ford Lobo (Mexico)', 'Ford Mainline (1952–1958, Australia)'
        , 'Ford Model 01/02 (1940–1942)', 'Ford Model 19 (1941)', 'Ford Model 46 (1933–1934)', 'Ford Model 50 (1935)', 'Ford Model 51 (1935–1936)', 'Ford Model 59 (1945)', 'Ford Model 68 (1936)'
        , 'Ford Model 69 (1946)', 'Ford Model 75 (1937)', 'Ford Model 78 (1937–1942, 1946–1947)', 'Ford Model 79 (1947)', 'Ford Model 81/82 (1938)', 'Ford Model 83 (1945–1947)'
        , 'Ford Model 91/92/922 (1939–1940)', 'Ford Model AA (1927–1931)', 'Ford Model BB (1932–1934)', 'Ford Model TT(1925–1927)', 'Ford Mustero (1966)', 'Ford N-Series (Heavy-duty short conventional cab truck; 1962–1969)'
        , 'Ford P-Series', 'Ford Panel truck', 'Ford R-Series - UK-market bus chassis', 'Ford Ranchero (1957–1979)', 'Ford Ranchero Rio Grande (1969)', 'Ford Ranger (international) (2006–present)'
        , 'Ford Ranger (1983–2012; North America, South America)', 'Ford Ranger EV (1998–2004, all-electric version of the North American Ford Ranger)', 'Ford Ranger (T6) (2011–present; worldwide, 2018–present; North America)'
        , 'Ford SVT Raptor', 'Ford Super Duty (1999–present)', 'Ford Transcontinental (1975–1983, Europe)', 'Ford Transit (1965–present, Europe, Asia, Mexico)', 'Ford Vanette (1946–1965)'
        , 'Ford W-Series (1966–1977; Heavy-Duty C.O.E. truck, replacement for H-Series)'];

        foreach($Ford as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Ford',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '15',
                'count' => 0
            ]);
        }

        $LandRover = ['Land Rover', 'Land Rover 101 Forward Control', 'Land Rover DC100', 'Land Rover Defender', 'Land Rover Defender (L663)', 'Land Rover Discovery', 'Land Rover Discovery Series I'
        , 'Land Rover Discovery Series II', 'Land Rover Discovery 3', 'Land Rover Discovery 4', 'Land Rover Discovery (L462)', 'Land Rover Discovery Sport', 'Land Rover Freelander'
        , 'Land Rover 1/2 ton Lightweight', 'Land Rover Discovery Sport (L550)', 'Land Rover Series II', 'Land Rover Series IIa', 'Land Rover Series III', 'Land Rover Llama'
        , 'Long Range Patrol Vehicle', 'Land Rover LR3', 'Land Rover LR4', 'Land Rover Perentie', 'Range Rover', 'Range Rover (L322)', 'Range Rover (L405)', 'Range Rover (P38A)'
        , 'Range Rover Classic', 'Range Rover Evoque', 'Range Rover Evoque (L538)', 'Range Rover Evoque (L551)', 'Range Rover Sport', 'Range Rover Sport (L320)', 'Range Rover Sport (L494)'
        , 'Range Rover Velar', 'Ranger Special Operations Vehicle', 'Land Rover series', 'Shorland armoured car', 'Snatch Land Rover', 'TACR2 (Range Rover)', 'Land Rover Tangi'
        , 'Land Rover Wolf'];

        foreach($LandRover as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'LandRover',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '16',
                'count' => 0
            ]);
        }

        $Daihatsu = ['Daihatsu Altis', 'Daihatsu Applause', 'Daihatsu Atrai', 'Daihatsu Ayla', 'Daihatsu Be-go', 'Daihatsu Bee', 'Daihatsu Boon', 'Daihatsu Boon Luminas', 'Daihatsu Cast'
        , 'Daihatsu Ceria', 'Daihatsu Charade', 'Daihatsu Charade Centro', 'Daihatsu Charmant', 'Daihatsu Compagno', 'Daihatsu Consorte', 'Daihatsu Copen', 'Daihatsu Costa', 'Daihatsu Cuore'
        , 'Daihatsu Delta', 'Daihatsu Domino', 'Daihatsu Espass', 'Daihatsu Esse', 'Daihatsu Extol', 'Daihatsu Fellow', 'Daihatsu Fellow Max', 'Daihatsu Feroza', 'Daihatsu Fourtrak'
        , 'Daihatsu Gran Max', 'Daihatsu Gran Move', 'Daihatsu Grand Move', 'Daihatsu Handi', 'Daihatsu Handivan', 'Daihatsu Hi-Max', 'Daihatsu Hijet', 'Daihatsu Leeza'
        , 'Daihatsu Luxio', 'Daihatsu Materia', 'Daihatsu Max', 'Daihatsu Mebius', 'Daihatsu Midget', 'Daihatsu Mira', 'Daihatsu Mira Cocoa', 'Daihatsu Mira e:S', 'Daihatsu Mira Gino'
        , 'Daihatsu Mira Tocot', 'Daihatsu Move', 'Daihatsu Move Conte', 'Daihatsu Move Latte', 'Daihatsu Naked', 'Daihatsu New Line', 'Daihatsu Opti', 'Daihatsu P5', 'Daihatsu Pyzar'
        , 'Daihatsu Rocky', 'Daihatsu Rugger', 'Daihatsu Scat', 'Daihatsu Sigra', 'Daihatsu Sirion', 'Daihatsu Sonica', 'Daihatsu Sportrak', 'Daihatsu Storia', 'Daihatsu Taft'
        , 'Daihatsu Tanto', 'Daihatsu Tanto Exe', 'Daihatsu Taruna', 'Daihatsu Terios', 'Daihatsu Thor', 'Daihatsu Trevis', 'Daihatsu UFE-III', 'Daihatsu Wake', 'Daihatsu Wildcat'
        , 'Daihatsu Xenia', 'Daihatsu YRV', 'Daihatsu Zebra', 'Template:Daihatsu Europe timeline', 'Template:Daihatsu timeline', 'Template:Daihatsu timeline pre-1980'];

        foreach($Daihatsu as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Daihatsu',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '17',
                'count' => 0
            ]);
        }

        $Dodge = ['Dodge 330 (1963–1964)', 'Dodge 400 (1982–1983)', 'Dodge 440 (1963–1964)', 'Dodge 600 (1983–1988)', 'Dodge 880 and Custom 880 (1962–1965) [1]', 'Dodge Aries (1981–1989)', 'Dodge Aspen (1976–1980)'
        , 'Dodge Avenger (1995–2000, 2008–2014)', 'Dodge Caliber (2007–2012)', 'Dodge Challenger (1970–1974, 1978-1983, 2008-Present)', 'Dodge Charger (1966-1977, 1982-1987, 2006-Present)'
        , 'Dodge Colt (1971–1994 as rebadged Mitsubishi Chariot, Galant, Mirage and Lancer models)', 'Dodge Conquest (1984–1986 as rebadged Mitsubishi Starion)'
        , 'Dodge Coronet (1949–1959, 1965–1976, see also 1955–1957 Dodge and Dodge Super Bee)', 'Dodge Custom (1946-1948)', 'Dodge Custom Royal (1955-1959)', 'Dodge Dart (1960-1976)'
        , 'Dodge Dart (2013–2016)', 'Dodge Daytona (1984–1993)', 'Dodge Deluxe (1946-1948)', 'Dodge Demon (1971-1972)', 'Dodge Diplomat (1977–1989)', 'Dodge Dynasty (1988–1993)', 'Dodge Eight (1930–1933)'
        , 'Dodge Fast Four (1927–1928)', 'Dodge Intrepid (1993–2004)', 'Dodge Lancer (1961–1962, 1985–1989)', 'Dodge Magnum (1978–1979, 2005–2008)', 'Dodge Matador (1960)', 'Dodge Meadowbrook (1949–1954)'
        , 'Dodge Mirada (1980–1983)', 'Dodge Model 30 (1914–1922)', 'Dodge Monaco and Royal Monaco (1965–1978, 1990–1992)', 'Dodge Neon (1994–2005, see also Dodge SRT-4)', 'Dodge Omni (1978–1990, see also Dodge 024)'
        , 'Dodge Polara (1960–1973)', 'Dodge Raider (1987–1989)', 'Dodge Royal (1954–1959, see also 1955–1957 Dodge)', 'Dodge Senior (1927–1930)', 'Dodge Series 116 (1923–1925)'
        , 'Dodge Series 126 (1926–1927)', 'Dodge Shadow (1987–1994)', 'Dodge Sierra and Suburban (1957–1959, see also 1955–1957 Dodge)', 'Dodge Six (1929–1949)', 'Dodge Spirit (1989–1995)'
        , 'Dodge Standard (1928–1929)', 'Dodge Stealth (1991–1996 as rebadged Mitsubishi GTO)', 'Dodge Stratus (1995–2006)', 'Dodge St. Regis (1979–1981)', 'Dodge Victory (1928–1929)'
        , 'Dodge Viper (1992–2017)', 'Dodge Wayfarer (1949–1952)', 'Dodge Arrow (Canada)', 'Dodge Crusader (Canada 1951–1958)', 'Dodge Kingsway (Canada 1946–1952)', 'Dodge Mayfair (Canada 1953–1959)'
        , 'Dodge Regent (Canada 1946–1959)', 'Dodge Viscount (Canada 1959)', 'Dodge Kingsway Deluxe (Mexico 1958)'];

        foreach($Dodge as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Dodge',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '18',
                'count' => 0
            ]);
        }

        $Honda = ['Accord (1976–present)', 'Amaze (2013–present)', 'Avancier (1993–2003, 2016–present)', 'Ballade (1980–1991, 2014–present)', 'Brio (2011–present)', 'BR-V (2015–present)'
        , 'City (1981–present)', 'Civic (1972–present)', 'Civic Tourer (2014–present)', 'Civic Type R (1997–2010, 2015–present)', 'Clarity (2008–2014, 2016–present)', 'Crider (2013–present)'
        , 'CR-V (1996–present)', 'CR-V S (2012–present)', 'e (2019–present)', 'Elysion (2003–present)', 'Fit/Jazz (2001–present)', 'Fit Hybrid (2011–present)', 'Fit Shuttle (2011–present)'
        , 'Freed (2008–present)', 'Freed Spike (2008–present)', 'Gienia (2016–present)', 'Grace (2014–present)', 'Greiz (2015–present)', 'Hobio (2003–present)', 'HR-V (1999–2005, 2015–present)'
        , 'Insight (2019) (2019–present)', 'Jade (2013–present)', 'Jazz RS (2005–present)', 'Legend (1985–2012, 2014–present)', 'MC-β (2013–present)', 'Mobilio (2001-2008, 2014–present)'
        , 'Mobilio RS (2014–present)', 'NSX (1990–2005, 2016–present, also badged as an Acura)', 'N-Box (2012–present)', 'N-Box+ (2012–present)', 'N-Box Slash (2014–present)', 'N-One (2012–present)'
        , 'N-Van (2018–present)', 'N-WGN (2012–present)', 'Odyssey/Shuttle (international market) (1995–present)', 'Odyssey (North American market) (1995–present)', 'Passport (2019) (2019–present)'
        , 'Pilot (2003–present)', 'Ridgeline (2006–2014, 2016–present)', 'S660 (2014–present)', 'Shuttle (1994–present)', 'Spirior (2014–present)', 'StepWGN (1996–present)', 'StepWGN Spada (2009–present)'
        , 'UR-V (2016–present)', 'Vamos (1970–1973, 1999–present)', 'Vezel (2013–present)', 'WR-V (2017–present)', 'XR-V (2015–present)'];

        foreach($Honda as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Honda',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '19',
                'count' => 0
            ]);
        }

        $Hyundai = ['Hyundai Elantra', 'Hyundai Sonata', 'Hyundai Accent', 'Hyundai Tucson', 'Hyundai Santa Fe', 'Hyundai Entourage', 'Hyundai Grandeur'
        , 'Hyundai Genesis', 'Hyundai Genesis Coupe', 'Hyundai Veracruz', 'Hyundai Equus', 'Hyundai Getz', 'Hyundai Pony', 'Hyundai i10'
        , 'Hyundai Lavita', 'Hyundai Scoupe', 'Hyundai Terracan', 'Hyundai Tiburon', 'Hyundai Trajet', 'Hyundai Excel', 'Hyundai i20'
        , 'Hyundai Aero City', 'Hyundai Dynasty', 'Hyundai Stellar', 'Hyundai Verna', 'Hyundai Grace', 'Hyundai Marcia', 'Hyundai Atos'
        , 'Hyundai Portico', 'Hyundai Santamo', 'Hyundai i30', 'Hyundai Universe', 'Hyundai Global 900', 'Hyundai Aero', 'Hyundai Aero Town'
        , 'Hyundai County', 'Hyundai Mighty II', 'Hyundai e-Mighty', 'Hyundai Trago', 'Hyundai 8 to 25-ton truck', 'Hyundai Super Truck', 'Hyundai Super Truck Medium'
        , 'Hyundai Chorus', 'Hyundai Mega Truck', 'Hyundai Mighty', 'Hyundai New Power Truck', 'Hyundai Porter', 'Hyundai Galloper', 'Hyundai Sonata Embera'
        , 'Hyundai HED-5', 'Hyundai Veloster'];

        foreach($Hyundai as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Hyundai',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '20',
                'count' => 0
            ]);
        }

        $Kia = ['Cadenza/K7', 'Ceed/Ceed SW/pro_ceed', 'Forte/Cerato/K3', 'K4', 'K9/K900/Quoris', 'Optima/Magentis/K5', 'Pegas', 'Picanto/Morning', 'Ray'
        , 'Rio/Rio5/Pride', 'Soul', 'Stinger', 'Stonic', 'Carens/Rondo', 'Carnival/Sedona', 'Mohave/Borrego', 'Sorento', 'Sportage', 'Pregio', 'Telluride'
        , 'Seltos', 'AM928 – KMC only', 'Granbird – KMC only', 'Bongo, also sold as K2700/Strong/3000S/2500TCI', 'K4000s – KMC only', 'Kia ceed Hybrid'
        , 'Kia Niro Hybrid Utility Vehicle', 'Kia Ray Plug-in hybrid', 'Kia Soul EV', 'Kia Optima Hybrid'];

        foreach($Kia as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Kia',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '20',
                'count' => 0
            ]);
        }

        $Subaru = ['Subaru 360', 'Subaru 450', 'Subaru 1000', 'Subaru 1500', 'Subaru 1600', 'Subaru Alcyone SVX', 'Subaru Alcyone', 'Subaru Ascent', 'Subaru B9sc', 'Subaru Baja', 'Subaru Bighorn'
        , 'Subaru BRAT', 'Subaru Brumby', 'Subaru BRZ', 'Subaru BRZ Concept STI', 'Subaru Chiffon', 'Subaru Dex', 'Subaru Elaion', 'Subaru Exiga', 'Subaru FF-1 Star', 'Subaru Fiori'
        , 'Subaru Forester', 'Subaru G', 'Subaru G3X Justy', 'Subaru Impreza', 'Subaru Impreza (second generation)', 'Subaru Justy', 'Subaru Legacy', 'Subaru Legacy (first generation)'
        , 'Subaru Legacy (second generation)', 'Subaru Legacy (third generation)', 'Subaru Legacy (fourth generation)', 'Subaru Legacy (fifth generation)', 'Subaru Legacy (sixth generation)'
        , 'Subaru Legacy (seventh generation)', 'Subaru Leone', 'Subaru Levorg', 'Subaru Liberty', 'Subaru Liberty Exiga', 'Subaru Loyale', 'Subaru Lucra', 'Subaru Mini Jumbo', 'Subaru Outback'
        , 'Subaru Outback Sport', 'Subaru Pleo', 'Prodrive P2', 'Subaru R-2', 'Subaru R1', 'Subaru R1e', 'Subaru R2', 'Subaru Rex', 'Subaru Sambar', 'Subaru Shifter', 'Subaru Stella'
        , 'Subaru - Elten', 'Subaru Sumo', 'Subaru Traviq', 'Subaru Trezia', 'Subaru Tribeca', 'Subaru Vivio', 'Subaru Vortex', 'Subaru WRX', 'Subaru XT', 'Subaru XV'
        , 'Template:Subaru', 'Template:Subaru (early)', 'Template:Subaru North America'];

        foreach($Subaru as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Subaru',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '20',
                'count' => 0
            ]);
        }

        $Suzuki = ['Suzuki Aerio', 'Suzuki Alto', 'Suzuki APV', 'Suzuki Baleno', 'Suzuki Baleno (2015)', 'Suzuki Cappuccino', 'Suzuki Cara', 'Suzuki Carry', 'Suzuki Celerio', 'Suzuki Cervo', 'Suzuki Cultus'
        , 'Suzuki Cultus Crescent', 'Suzuki CV1', 'Suzuki Equator', 'Suzuki Ertiga', 'Suzuki Escudo', 'Suzuki Esteem', 'Suzuki Farm Worker', 'Suzuki Forenza', 'Suzuki Fronte', 'Suzuki Fronte 800'
        , 'Suzuki Fun', 'Suzuki Grand Vitara', 'Suzuki GSX-R/4', 'Suzuki Hatch', 'Suzuki Hustler', 'Suzuki Ignis', 'Suzuki Jimny', 'Suzuki Kei', 'Suzuki Kizashi', 'Suzuki Landy', 'Suzuki Lapin'
        , 'Suzuki Liana', 'Suzuki LJ80', 'Suzuki Mehran', 'Suzuki Mighty Boy', 'Suzuki MR Wagon', 'Suzuki Nomade', 'Suzuki Palette', 'Suzuki Reno', 'Suzuki Samurai', 'Suzuki Santana'
        , 'Suzuki SC100', 'Suzuki Sidekick', 'Suzuki Sierra', 'Suzuki Solio', 'Suzuki Spacia', 'Suzuki Splash', 'Suzuki Suzulight', 'Suzuki Swift', 'Suzuki Swift+', 'Suzuki SX4', 'Suzuki SX4 S-Cross'
        , 'Suzuki Twin', 'Suzuki Vitara', 'Suzuki Wagon R', 'Suzuki X-90', 'Suzuki X-HEAD', 'Suzuki XL-7', 'Template:Suzuki timeline (Europe) 1980 to date'
        , 'Template:Suzuki timeline (North America) 1985 to date', 'Template:Suzuki timeline 1955–1989', 'Template:Suzuki timeline 1980 to date', 'Template:Suzuki vehicles'];

        foreach($Suzuki as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Suzuki',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '20',
                'count' => 0
            ]);
        }

        $Mitsubishi = ['Mitsubishi 360', 'Mitsubishi 380', 'Mitsubishi 500', 'Mitsubishi 3000GT', 'Mitsubishi Adventure', 'Mitsubishi Airtrek', 'Mitsubishi Aspire', 'Mitsubishi Attrage', 'Mitsubishi Carisma'
        , 'Mitsubishi Celeste', 'Mitsubishi Champ', 'Mitsubishi Chariot', 'Chrysler Regal', 'Mitsubishi Colt', 'Mitsubishi Colt 11-F', 'Mitsubishi Colt 600', 'Mitsubishi Colt 800'
        , 'Mitsubishi Colt 1000', 'Mitsubishi Colt 1100', 'Mitsubishi Colt 1100F', 'Mitsubishi Colt 1200', 'Mitsubishi Colt 1500', 'Mitsubishi Colt Bakkie', 'Mitsubishi Colt Galant'
        , 'Mitsubishi Colt Rodeo', 'Mitsubishi Colt T120SS', 'Mitsubishi Cordia', 'Mitsubishi Debonair', 'Mitsubishi Delica', 'Mitsubishi Diamante', 'Mitsubishi Dignity', 'Mitsubishi Mirage Dingo'
        , 'Mitsubishi Dion', 'Mitsubishi Eclipse', 'Mitsubishi Eclipse Cross', 'Mitsubishi eK', 'Mitsubishi Emeraude', 'Mitsubishi Endeavor', 'Mitsubishi Eterna', 'Mitsubishi Expo'
        , 'Mitsubishi Expo LRV', 'Mitsubishi Express', 'Mitsubishi Forte', 'Mitsubishi Freeca', 'Mitsubishi FTO', 'Mitsubishi Fuzion', 'Mitsubishi G-Wagon', 'Mitsubishi Galant', 'Mitsubishi Galant Fortis'
        , 'Mitsubishi Galant FTO', 'Mitsubishi Galant GTO', 'Mitsubishi Galant Lambda', 'Mitsubishi Galant VR-4', 'Mitsubishi Go', 'Mitsubishi Grandis', 'Mitsubishi Grunder', 'Mitsubishi GTO'
        , 'Mitsubishi Henry J', 'Mitsubishi i', 'Mitsubishi i-MiEV', 'Mitsubishi Jeep', 'Mitsubishi Jolie', 'Mitsubishi Kuda', 'Mitsubishi L100', 'Mitsubishi L200', 'Mitsubishi L300'
        , 'Mitsubishi Lancer', 'Mitsubishi Lancer (A70)', 'Mitsubishi Lancer Celeste', 'Mitsubishi Lancer Evolution', 'Mitsubishi Lancer Evolution X', 'Mitsubishi Lancer WRC', 'Mitsubishi Legnum'
        , 'Mitsubishi Leo', 'Mitsubishi Lettuce', 'Mitsubishi Libero', 'Mitsubishi Magna', 'Mitsubishi Magnum', 'Mitsubishi Maven', 'Mazda-Go', 'Mitsubishi Mighty Max', 'Mitsubishi Minica'
        , 'Mitsubishi Minicab', 'Mitsubishi Mirage', 'Mitsubishi MiEV Evolution', 'Mitsubishi Mizushima', 'Mitsubishi Model A', 'Mitsubishi Montero', 'Mitsubishi Montero iO', 'Mitsubishi Montero Sport'
        , 'Mitsubishi Nativa', 'Mitsubishi Nimbus', 'Mitsubishi Outlander', 'Mitsubishi Outlander Sport', 'Mitsubishi Pajero', 'Mitsubishi Pajero Evolution', 'Mitsubishi Pajero iO'
        , 'Mitsubishi Pajero Junior', 'Mitsubishi Pajero Mini', 'Mitsubishi Pajero Pinin', 'Mitsubishi Pajero Sport', 'Mitsubishi Pajero TR4', 'Mitsubishi Pinin', 'Mitsubishi Pistachio'
        , 'Mitsubishi Precis', 'Mitsubishi Proudia', 'Mitsubishi Racing Lancer', 'Mitsubishi Raider', 'Mitsubishi Rodeo', 'Mitsubishi RVR', 'Mitsubishi Sapporo', 'Mitsubishi Savrin'
        , 'Mitsubishi Scorpion', 'Mitsubishi Shogun', 'Mitsubishi Shogun Pinin', 'Mitsubishi Shogun Sport', 'Mitsubishi Sigma', 'Mitsubishi Sigma Scorpion', 'Mitsubishi Space Gear'
        , 'Mitsubishi Space Runner', 'Mitsubishi Space Star', 'Mitsubishi Space Wagon', 'Mitsubishi Sportero', 'Mitsubishi Star Wagon', 'Mitsubishi Starion', 'Mitsubishi Storm'
        , 'Mitsubishi Strada', 'Mitsubishi Toppo', 'Mitsubishi Town Bee', 'Mitsubishi Town Box', 'Mitsubishi Towny', 'Mitsubishi Tredia', 'Mitsubishi Triton', 'Mitsubishi Type 73 Light Truck'
        , 'Mitsubishi V3000', 'Mitsubishi Verada', 'Mitsubishi Warrior', 'Mitsubishi Xpander', 'CMC Zinger'];

        foreach($Mitsubishi as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Mitsubishi',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '20',
                'count' => 0
            ]);
        }

        $Infiniti = ['Infiniti Q50 (Q50 2.0t Pure, 2.0t Luxe, 3.0t Luxe, 3.0t Sport, Red Sport 400, Hybrid)', 'Infiniti Q60 (Q60 2.0t Pure, 2.0t Luxe, 3.0t Luxe, 3.0t Sport, Red Sport 400)'
        , 'Infiniti Q70 (M25, M30d, M35h, M37/M37x AWD and M56/M56x AWD variations, all sedans)', 'Infiniti QX50 (EX30d and EX37 in Europe)', 'Infiniti QX60 (3.5, Hybrid variant discontinued)'
        , 'Infiniti QX80 (SUV)', 'Infiniti M30 (coupe and convertible) and M35/M45 (sedan)', 'Infiniti Q30', 'Infiniti QX30 (Base, Luxury, Premium, and Sport)', 'Infiniti QX4 (SUV)'
        , 'Infiniti J30 (sedan)', 'Infiniti I30 and I35 (sedan)', 'Infiniti Q40 (sedan)', 'Infiniti Q45 (sedan)', 'Infiniti QX70 (3.7, 3.7 AWD, 5.0 AWD)', 'Infiniti ESQ (rebadged Nissan Juke sold exclusively in China)'
        , 'Infiniti Triant (2003)', 'Infiniti Kuraza (2005)', 'Infiniti Coupe Concept (2006)', 'Infiniti Essence (2009)', 'Infiniti Etherea (2011)', 'Infiniti Emerg-e (2012)'
        , 'Infiniti LE (2012)', 'Infiniti Q80 Inspiration (2014)', 'Infiniti Concept Vision Gran Turismo (2014)', 'Infiniti QX Sport Inspiration (2016)', 'Infiniti Prototype 9 (2017)'
        , 'Infiniti Q Inspiration (2018)', 'Infiniti Prototype 10 (2018)'];

        foreach($Infiniti as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Infiniti',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '20',
                'count' => 0
            ]);
        }

        $Mazda = ['1931–1960 Mazdago three-wheel truck', '1958–1964 Romper truck', '1959–1965 D1100/D1500 truck', '1959–1969 K360 three-wheel truck', '1959–1971 T600 three-wheel truck'
        , '1960–1966 R360 kei car sedan', '1961–1962 P360/P600 "Carol" kei car sedan', '1961–1964 B1500/Proceed pickup truck', '1961–1966 B360/B600 kei car pickup truck'
        , '1962–1965 D2000 truck', '1964–1966 Familia/800/1000 compact car', '1964–2010 E2000 truck', '1965–1977 Kraft truck', '1965–1972 Light Bus Type A minibus'
        , '1966–1972 Light Bus Type C minibus', '1965–1971 B1500/Proceed pickup truck', '1966–1973 Luce/1500/1800/R130 luxury car', '1966–1977 Bongo small minivan'
        , '1967–1972 Familia/1000/1200/1300/R100 compact car', '1967–1972 Cosmo Sport 110S sports car', '1968–1976 E360/Porter small pickup truck', '1968–1980 Boxer truck'
        , '1968–1989 Porter CAB small pickup truck', '1970–1976 Capella/616/RX-2 mid-size car', '1971–1978 Savanna/RX-3 coupé', '1971–2014 Titan truck'
        , '1971–1978 Grand Familia/808/818/Mizer compact car', '1972–1977 Chantez kei car', '1972–1997 Parkway 26 minibus', '1972–1977 Familia Presto/1000/1300'
        , '1972–1977 Luce/RX-4 luxury car', '1974–1977 Rotary Pickup (REPU) pickup truck', '1974–1981 T3000 minibus', '1975–1978 Roadpacer full-size car'
        , '1975–1980 Cosmo/RX-5 luxury car', '1976–1984 121 compact car', '1977–1981 Luce Legato luxury car', '1977–1982 Capella/626/Montrose mid-size car'
        , '1977–1983 Familia/323/GLC compact car', '1978–1982 Bongo small minivan', '1978–1984 Savanna/RX-7 sports car', '1980–1984 Familia/323 compact car'
        , '1981–1986 929/Luce luxury car', '1982–1986 Mazda T3000 minibus', '1983–1987 Capella/626 mid-size car', '1983–1988 Bongo small minivan', '1985–1988 Familia/323 compact car'
        , '1985–1992 Savanna/RX-7 sports car', '1985–1995 121/Demio compact car', '1986–1991 929/Luce luxury car', '1986–1992 Mazda T3500 minibus', '1987–1990 Etude compact car'
        , '1988–1992 Capella/626 mid-size car', '1988–1992 Persona mid-size car', '1988–1992 MX-6 coupé', '1988–1998 MPV minivan', '1989–1990 Carol kei car', '1989–1994 Familia/323/Protegé compact car'
        , '1989–1994 Bongo small minivan', '1989–1998 MX-5/Miata convertible sports car', '1989–1995 Mazda Custom Cab', '1990–1994 Carol kei car', '1990–1998 929/Sentia luxury car'
        , '1991–1994 Mazda Navajo SUV', '1990–1998 AZ-3/MX-3 coupé', '1993–1997 MX-6 coupé', '1993–1997 Cronos/626 mid-size car', '1993–1997 Lantis/Astina compact car', '1993–2002 Millenia/Xedos9/Eunos 800 luxury car'
        , '1993–2002 RX-7 sports car', '1994–1999 Familia/Protegé/Etude/323 compact car', '1994–1998 AZ-Wagon station wagon', '1995–1998 Bongo small minivan', '1995–1998 Carol kei car'
        , '1996–2005 121/Demio/Mazda2 compact car', '1998–2003 AZ-Wagon station wagon', '1998–2002 Capella/626 mid-size car', '1998–2014 AZ-Offroad SUV', '1998–2005 MX-5/Miata convertible sports car'
        , '1999–2000 Carol kei car', '1999–2000 Laputa kei car', '1999–2001 Bongo small minivan', '1999–2005 Premacy small minivan', '1999–2006 MPV minivan', '2000–2003 Familia/Protegé/323 compact car'
        , '2001–2005 Carol kei car', '2001–2011 Mazda Tribute SUV', '2001–2006 Laputa kei car', '2002–2008 Spiano kei car', '2003–2009 RX-8 sports car', '2003–2008 AZ-Wagon station wagon'
        , '2004–2009 Carol kei car', '2004–2015 Mazda Verisa Subcompact car', '2005–2015 MX-5 convertible sports car', '2006–2016 MPV minivan', '2007–2012 CX-7 crossover SUV'
        , '2007–2016 CX-9 crossover SUV', '2008–2012 AZ-Wagon station wagon', '2009–2014 Carol kei car', '2009–2012 RX-8 sports car', '2010–2015 Premacy/Mazda5 minivan'
        , '2008–2016 Biante — minivan', '2006–2016 Mazda8/MPV — minivan', '1999–2017 Bongo – Commercial van', 'Mazda Activehicle (1999)', 'Mazda AZ550 (1989)', 'Mazda BU-X (1995)'
        , 'Mazda Chantez EV (1972)', 'Mazda CU-X (1995)', 'Mazda CVS (1974)', 'Mazda Deep Orange 3 (2013)', 'Mazda Furai (2008)', 'Mazda Gissya (1991)', 'Mazda Hakaze Concept (2007)'
        , 'Mazda Hazumi (2014)', 'Mazda HR-X (1991)', 'Mazda HR-X 2 (1993)', 'Mazda Ibuki (2003)', 'Mazda Kaan', 'Mazda Kabura (2006)', 'Mazda Kai (2017)', 'Mazda Kazamai (2008)'
        , 'Mazda Kiyora (2008)', 'Mazda Koeru (2015)', 'Mazda Le Mans Prototype (1983)', 'Mazda London Taxi (1993)', 'Mazda Miata Mono-Posto (1999)', 'Mazda Minagi (2011)'
        , 'Mazda MS-X (1997)', 'Mazda MV-X (1997)', 'Mazda MX-02 (1983)', 'Mazda MX-03 (1985)', 'Mazda MX-04 (1987)', 'Mazda MX-5 Superlight (2009)', 'Mazda MX-81 (1981)'
        , 'Mazda MX-Crossport (2005)', 'Mazda MX-Flexa (2004)', 'Mazda MX-Micro Sport (2004)', 'Mazda MX Sport Tourer (2001)', 'Mazda MX Sportif (2003)', 'Mazda Nagare (2006)'
        , 'Mazda Neospace (1999)', 'Mazda Nextourer (1999)', 'Mazda RX-01 (1995)', 'Mazda RX 87 (1967)', 'Mazda RX-500 (1970)', 'Mazda RX-510 (1971)', 'Mazda RX-Evolv (1999)'
        , 'Mazda RX-Vision (2015)', 'Mazda Ryuga (2007)', 'Mazda Sassou (2005)', 'Mazda Secret Hideout (2001)', 'Mazda Senku (2005)', 'Mazda Shinari (2010)', 'Mazda SU-V (1995)'
        , 'Mazda SW-X (1999)', 'Mazda Taiki (2007)', 'Mazda Takeri (2011)', 'Mazda TD-R (1989)', 'Mazda Vision Coupe (2017)', 'Mazda Washu (2003)'];

        foreach($Mazda as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Mazda',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '20',
                'count' => 0
            ]);
        }

        $Mazda = ['1931–1960 Mazdago three-wheel truck', '1958–1964 Romper truck', '1959–1965 D1100/D1500 truck', '1959–1969 K360 three-wheel truck', '1959–1971 T600 three-wheel truck'
        , '1960–1966 R360 kei car sedan', '1961–1962 P360/P600 "Carol" kei car sedan', '1961–1964 B1500/Proceed pickup truck', '1961–1966 B360/B600 kei car pickup truck'
        , '1962–1965 D2000 truck', '1964–1966 Familia/800/1000 compact car', '1964–2010 E2000 truck', '1965–1977 Kraft truck', '1965–1972 Light Bus Type A minibus'
        , '1966–1972 Light Bus Type C minibus', '1965–1971 B1500/Proceed pickup truck', '1966–1973 Luce/1500/1800/R130 luxury car', '1966–1977 Bongo small minivan'
        , '1967–1972 Familia/1000/1200/1300/R100 compact car', '1967–1972 Cosmo Sport 110S sports car', '1968–1976 E360/Porter small pickup truck', '1968–1980 Boxer truck'
        , '1968–1989 Porter CAB small pickup truck', '1970–1976 Capella/616/RX-2 mid-size car', '1971–1978 Savanna/RX-3 coupé', '1971–2014 Titan truck'
        , '1971–1978 Grand Familia/808/818/Mizer compact car', '1972–1977 Chantez kei car', '1972–1997 Parkway 26 minibus', '1972–1977 Familia Presto/1000/1300'
        , '1972–1977 Luce/RX-4 luxury car', '1974–1977 Rotary Pickup (REPU) pickup truck', '1974–1981 T3000 minibus', '1975–1978 Roadpacer full-size car'
        , '1975–1980 Cosmo/RX-5 luxury car', '1976–1984 121 compact car', '1977–1981 Luce Legato luxury car', '1977–1982 Capella/626/Montrose mid-size car'
        , '1977–1983 Familia/323/GLC compact car', '1978–1982 Bongo small minivan', '1978–1984 Savanna/RX-7 sports car', '1980–1984 Familia/323 compact car'
        , '1981–1986 929/Luce luxury car', '1982–1986 Mazda T3000 minibus', '1983–1987 Capella/626 mid-size car', '1983–1988 Bongo small minivan', '1985–1988 Familia/323 compact car'
        , '1985–1992 Savanna/RX-7 sports car', '1985–1995 121/Demio compact car', '1986–1991 929/Luce luxury car', '1986–1992 Mazda T3500 minibus', '1987–1990 Etude compact car'
        , '1988–1992 Capella/626 mid-size car', '1988–1992 Persona mid-size car', '1988–1992 MX-6 coupé', '1988–1998 MPV minivan', '1989–1990 Carol kei car', '1989–1994 Familia/323/Protegé compact car'
        , '1989–1994 Bongo small minivan', '1989–1998 MX-5/Miata convertible sports car', '1989–1995 Mazda Custom Cab', '1990–1994 Carol kei car', '1990–1998 929/Sentia luxury car'
        , '1991–1994 Mazda Navajo SUV', '1990–1998 AZ-3/MX-3 coupé', '1993–1997 MX-6 coupé', '1993–1997 Cronos/626 mid-size car', '1993–1997 Lantis/Astina compact car', '1993–2002 Millenia/Xedos9/Eunos 800 luxury car'
        , '1993–2002 RX-7 sports car', '1994–1999 Familia/Protegé/Etude/323 compact car', '1994–1998 AZ-Wagon station wagon', '1995–1998 Bongo small minivan', '1995–1998 Carol kei car'
        , '1996–2005 121/Demio/Mazda2 compact car', '1998–2003 AZ-Wagon station wagon', '1998–2002 Capella/626 mid-size car', '1998–2014 AZ-Offroad SUV', '1998–2005 MX-5/Miata convertible sports car'
        , '1999–2000 Carol kei car', '1999–2000 Laputa kei car', '1999–2001 Bongo small minivan', '1999–2005 Premacy small minivan', '1999–2006 MPV minivan', '2000–2003 Familia/Protegé/323 compact car'
        , '2001–2005 Carol kei car', '2001–2011 Mazda Tribute SUV', '2001–2006 Laputa kei car', '2002–2008 Spiano kei car', '2003–2009 RX-8 sports car', '2003–2008 AZ-Wagon station wagon'
        , '2004–2009 Carol kei car', '2004–2015 Mazda Verisa Subcompact car', '2005–2015 MX-5 convertible sports car', '2006–2016 MPV minivan', '2007–2012 CX-7 crossover SUV'
        , '2007–2016 CX-9 crossover SUV', '2008–2012 AZ-Wagon station wagon', '2009–2014 Carol kei car', '2009–2012 RX-8 sports car', '2010–2015 Premacy/Mazda5 minivan'
        , '2008–2016 Biante — minivan', '2006–2016 Mazda8/MPV — minivan', '1999–2017 Bongo – Commercial van', 'Mazda Activehicle (1999)', 'Mazda AZ550 (1989)', 'Mazda BU-X (1995)'
        , 'Mazda Chantez EV (1972)', 'Mazda CU-X (1995)', 'Mazda CVS (1974)', 'Mazda Deep Orange 3 (2013)', 'Mazda Furai (2008)', 'Mazda Gissya (1991)', 'Mazda Hakaze Concept (2007)'
        , 'Mazda Hazumi (2014)', 'Mazda HR-X (1991)', 'Mazda HR-X 2 (1993)', 'Mazda Ibuki (2003)', 'Mazda Kaan', 'Mazda Kabura (2006)', 'Mazda Kai (2017)', 'Mazda Kazamai (2008)'
        , 'Mazda Kiyora (2008)', 'Mazda Koeru (2015)', 'Mazda Le Mans Prototype (1983)', 'Mazda London Taxi (1993)', 'Mazda Miata Mono-Posto (1999)', 'Mazda Minagi (2011)'
        , 'Mazda MS-X (1997)', 'Mazda MV-X (1997)', 'Mazda MX-02 (1983)', 'Mazda MX-03 (1985)', 'Mazda MX-04 (1987)', 'Mazda MX-5 Superlight (2009)', 'Mazda MX-81 (1981)'
        , 'Mazda MX-Crossport (2005)', 'Mazda MX-Flexa (2004)', 'Mazda MX-Micro Sport (2004)', 'Mazda MX Sport Tourer (2001)', 'Mazda MX Sportif (2003)', 'Mazda Nagare (2006)'
        , 'Mazda Neospace (1999)', 'Mazda Nextourer (1999)', 'Mazda RX-01 (1995)', 'Mazda RX 87 (1967)', 'Mazda RX-500 (1970)', 'Mazda RX-510 (1971)', 'Mazda RX-Evolv (1999)'
        , 'Mazda RX-Vision (2015)', 'Mazda Ryuga (2007)', 'Mazda Sassou (2005)', 'Mazda Secret Hideout (2001)', 'Mazda Senku (2005)', 'Mazda Shinari (2010)', 'Mazda SU-V (1995)'
        , 'Mazda SW-X (1999)', 'Mazda Taiki (2007)', 'Mazda Takeri (2011)', 'Mazda TD-R (1989)', 'Mazda Vision Coupe (2017)', 'Mazda Washu (2003)'];

        foreach($Mazda as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Mazda',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '20',
                'count' => 0
            ]);
        }

        $Chevrolet = ['150 (1953-1957)', '210 (1953-1957)', '400 (1962-1974)', '454 SS (1990-1993)', '500 (1983-1995)', '1700 (1972-1978)', '2500 (1973-1978)', '3800 (1972-1978)', '4100 (1972-1978)'
        , 'A-10 (1981-1985)', 'A-20 (1985-1996)', 'Advance Design (1947-1955)', 'AK Series (1941-1942)', 'Agile (2009–2015)', 'Ajax (1994-2009)', 'Alero (1999–2004)', 'Apache (1955-1960)'
        , 'Astro (1985–2005)', 'Avalanche (2002–2013)', 'Baby Grand/H-4 (1914-1922)', 'Beauville station wagon (1955-1957)', 'Beauville (van) (1971–1996)', 'B-Series (1966-2003)'
        , 'Bel Air (1950–1975 for US and 1950-1981 for Canada)', 'Beretta (1987–1996)', 'Biscayne (1958–1972 for US and 1958-1975 for Canada)', 'Bison (1977–1980)', 'BJN (1961-1986 for US and 1962-1999 for Canada)'
        , 'Blazer (1995-2005 in most markets and 1997-2012 for Brazil)', 'Brookwood (1958–1961, 1969–1972)', 'Bruin (1978–1988)', 'C-10 (1964-1985)', 'C-20 (1985-1996)', 'Calibra (1989-1997)'
        , 'Camaro (1967–2002)', 'Camby (1989-2013)', 'Cameo (1955-1959)', 'Caprice (2000–2017 for the Middle East, 1965–1996 and 2011–2017 for North America)', 'Cassia (1998-2002)'
        , 'Cavalier (1982–2005)', 'Cebra (1984-1994 for Brazil and 1985-2015 for Mexico)', 'Celebrity (1982–1990)', 'Celta (2000–2015)', 'Celtic (1991-2009 for Canada)', 'Chevair (1976-1985)'
        , 'Chevelle (1964–1977)', 'Chevelle Laguna (1973–1976)', 'Chevette (1976–1987 for US, Venezuela, and Argentina, 1973-1993 for Brazil, 1976-1996 for Ecuador, and 1976-1998 for Colombia)'
        , 'Chevy (1969-1978)', 'Chevy (1994-2012)', 'Chevy II (1962-1968)', 'Chevy Malibu (1968–1982)', 'Citation (1980–1985)'
        , 'C/K (1960-2000 for US, 1965-2000 for Canada, 1964-2001 for Brazil, 1975-1982 for Chile, and 1960-1978/1986-1994 for Argentina)', 'CMP (1991–2013)', 'CMV (1991–2013)'
        , 'Cobalt (2005–2010)', 'Cobalt SS (2005–2010)', 'Commodore (1978-1982)', 'Confederate Series BA (1932)', 'Constantia (1969-1978)', 'Corsa (1994-2011)', 'Corsa Classic (2000-2010)'
        , 'Corsa Plus (2005-2010)', 'Corsica (1987–1996)', 'Corvair (1960–1969)', 'Corvan (1960–1969)', 'Cruze (2001-2008)', 'D-10 (1980-1985)', 'D-20 (1985–1996)', 'Delray (1958)'
        , 'Deluxe (1941-1942, 1945-1952)', 'D-Max (2002-2008)', 'Eagle (1933)', 'El Camino (1959–1960, 1964–1987)', 'Epica (2004-2006)', 'Epica (2006–2011)', 'Evanda (2005-2006)'
        , 'FA Series (1918)', 'FB Series (1919-1922)', 'Fleetline (1941-1942, 1945-1952)', 'Fleetmaster (1946–1948)', 'Forester (2002-2005)', 'Frontera (1989-2004)', 'G506 (1941-1945)'
        , 'Gemini (1985-1990)', 'Greenbrier (1961–1972)', 'Greenbrier (1961-1965, 1969-1972)', 'G-series (1964-1996)', 'HHR (2006–2011)', 'Independence Series AE (1931)'
        , 'International Series AC (1929)', 'Joy (2005-2009)', 'K5 Blazer (1969-1994 for North America and 1995-2001 for Brazil and Argentina)', 'Kadett (1979-1991)', 'Kalos (2005-2008)'
        , 'Kingswood (1959–1960, 1969–1972)', 'Kingswood Estate (1969–1972)', 'Kodiak (1980–2009)', 'Kommando (1968-1980)', 'Lakewood (1961-1962)', 'Lee (1963-1980)', 'Light Six (1914-1915)'
        , 'Lova (2006–2010)', 'Lumina (1990–2001 for North America and 1998–2017 for the Middle East and South Africa)', 'Lumina APV (1990-1996)'
        , 'LUV (1972-1982 for North America and 1981-2005 for South America)', 'Marajó (1980-1989)', 'Master (1933-1942)', 'Mayano (1987-2017)', 'Meriva (2002-2010 for Latin America and 2002-2011 for Brazil)'
        , 'Matiz (2005-2010)', 'Mercury (1933)', 'Metro (1998–2001)', 'Monte Carlo (1970–1988, 1995–2007)', 'Monza (1975–1980)', 'National Series AB (1928)', 'Nomad (station wagon) (1955–1961, 1968–1972)'
        , 'Nomad (SUV) (1973-1982)', 'Nova (1969–1979, 1985-1988)', 'Nubira (2004)', 'Opala (1969-1992)', 'Optra Wagon (Japan)', 'Omega (1992-2008, 2010–present)'
        , 'Optra (2004-2013 for Colombia, 2004–2008 for Canada, 2006–2009 for Mexico, 2002-2008 for India, and 2002-2010 for Vietnam)', 'Orlando (2010–2014 for Canada and Europe)'
        , 'Parkwood (1959–1961)', 'Prizm (1998–2002)', 'Rezzo (2002-2008)', 'Rodeo (1989-2004)', 'S-10 Blazer (1983-1994)', 'S-10 EV (1997–1998)', 'Senator (1978-1982)'
        , 'Series 490 (1915-1922)', 'Series AA Capitol (1927)', 'Series C Classic Six (1911-1913)', 'Series D (1917-1918)', 'Series F (1917)', 'Series H (1914-1916)', 'Series M Copper-Cooled (1923)'
        , 'Special (1949-1957)', 'Spectrum (1985–1988)', 'Sprint (1985–1988 for North America and 1987-2004 for Colombia)', 'SSR (2003–2006)', 'Chevrolet SS (2013-2017)'
        , 'Stamp (1981-2009 for Canada)', 'Standard (1933-1936)', 'Styleline (1941-1942)', 'Stylemaster (1945-1948)', 'Superior Series B (1923)', 'Superior Series F (1924)', 'Superior Series K (1925)'
        , 'Superior Series V (1926)', 'Swift (1991-2004)', 'Tacuma (2002-2008)', 'Task Force Series (1955-1959)', 'Tigra (1994-2000)', 'Titan (1969–1980)', 'Tosca (2006-2011)', 'Townsman (1953–1957, 1969–1972)'
        , 'Trafic (1997-2000)', 'Trans Sport (1997-2005)', 'Universal Series AD (1930)', 'Uplander (2005–2008 for US, Chile, and Middle East, and 2005-2009 for Canada and Mexico)'
        , 'Van (1964-1996)', 'Vectra (1993-2008)', 'Vega (1971–1977)', 'Veraneio (1964-1993)', 'Vitara (1988-1998)', 'Viva (2004-2008)', 'Vivant (2002-2008)', 'Venture (1997–2005)'
        , 'Viking', 'Yeoman (1958)', 'Zafira (2001-2011 South America)', 'Chevrolet Aero 2003A (1987)', 'Aerovette (1976)', 'Astro I (1967)', 'Astro II (1968)', 'Astro III (1969)'
        , 'Astrovette (1968)', 'Aveo RS (2010)', 'Beat (concept) (2007)', 'Bel Air Concept (2002)', 'Biscayne (concept) (1955)', 'Blazer XT-1 (1987)', 'Bob (2007)', 'Bolt (2015)'
        , 'Borrego (2001)', 'California IROC Camaro (1989)', 'Camaro Black Concept (2008)', 'Camaro Chroma Concept (2009)', 'Camaro Concept (2006)', 'Camaro Convertible Concept (2007)'
        , 'Camaro Convertible Concept (2010)', 'Camaro Dale Earnhardt Jr. Concept (2008)', 'Camaro Dusk Concept (2009)', 'Camaro GS Racecar Concept (2008)', 'Camaro LS7 Concept (2008)'
        , 'Camaro LT5 Concept (1988)', 'Camaro SS (concept) (2003)', 'Camaro SSX (2010)', 'Camaro ZL1 (concept) (2011)', 'Caprice PPV (Concept) (2010)', 'Cheyenne (concept) (2003)'
        , 'Citation IV (1984)', 'Cobalt (concept) (2011)', 'Code 130R (2012)', 'Colorado Concept (2011)', 'CERV (1960, 1964, 1990, 1992)', 'Corvair (concept) (1954)', 'Corvair (concept) (1960)'
        , 'Corvair Coupe Speciale (1960, 1962, 1963)', 'Corvair Monza GT (1962)', 'Corvair Monza SS (1962)', 'Corvair Sebring Spyder (1961)', 'Corvair Super Spyder (1962)', 'Chevrolet Testudo (1963)'
        , 'Corvette (concept) (1953)', 'Corvette C2 (concept) (1962)', 'Corvette Indy (1986)', 'Corvette Nivola (1990)', 'Corvette Stingray (concept) (1959)', 'Corvette Stingray (concept) (2009)'
        , 'Corvette XP-700 (1958)', 'Corvette XP-819 Rear Engine (1964)', 'Corvette Z03 (2008)', 'Corvette Z06X (2010)', 'Corvette ZR1 (concept) (2008)', 'Corvette ZR2 (1989)'
        , 'Cruze (concept) (2010)', 'Cruze Eco (concept) (2011)', 'Cruze RS (concept) (2011)', 'GPiX Concept (2008)', 'Equinox Xtreme Concept (2003)', 'E-Spark (2010)', 'Express (1987)'
        , 'FNR (2015)', 'Groove (2007)', 'Highlander (1993)', 'HHR (concept) (2005)', 'Impala (concept) (1956)', 'Jay Leno Camaro (2009)', 'M3X (2004)', 'Mako Shark (1961)', 'Mako Shark II (1965)'
        , 'Malibu (concept) (2011)', 'Malibu Maxx (concept) (2003)', 'Chevrolet Miray (2012)', 'Manta Ray (1969)', 'Mulsanne (1974)', 'Nomad (concept) (1954, 1999, 2004)', 'Orlando (concept) (2008)'
        , 'Colorado Rally Concept (2011)', 'Q-Corvette (1957)', 'Ramarro (1984)', 'Rondine (1963)', 'S3X (2004)', 'Scirocco (1970)', 'Sequel (2005)', 'Silverado 427 Concept (2007)'
        , 'Silverado Orange County Choppers Hauler Concept (2007)', 'Silverado ZR2 Concept (2010)', 'Sonic (concept) (2010)', 'Sonic Z-Spec Concept (2011)', 'SR-2 (1957)', 'SS (2003)'
        , 'Suburban 75th Anniversary Diamond Edition (2010)', 'Super Carry (van)[citation needed]', 'Synergy Camaro concept (2009)', 'T2X (2005)', 'Tandem 2000 (1999)', 'Trailblazer SS Concept (2002)'
        , 'Trax (2007)', 'Triax (2000)', 'Tru 140S (2012), images used for the Chevy Jolt prank[17][18][19]', 'Venture (1988)', 'Volt (concept) (2007)', 'Volt MPV5 Electric Concept (2010)'
        , 'Wedge Corvette (1963)', 'WTCC ULTRA Concept (2006)', 'XP-882 Four Rotor (1973)', 'XP-895 Reynolds (1973)', 'XP-897GT Two-Rotor (1973)', 'XP-898 (1973)', 'XT-2 (1989)', 'YGM1 (1999)'];

        foreach($Chevrolet as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Chevrolet',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '20',
                'count' => 0
            ]);
        }

        $Isuzu = ['Isuzu 117 Coupé', 'Isuzu 810', 'Isuzu 4200R', 'Isuzu Amigo', 'Isuzu Ascender', 'Isuzu Aska', 'Isuzu Axiom', 'Isuzu Bellel', 'Isuzu Bellett Gemini', 'Isuzu Bellett', 'Isuzu Trooper'
        , 'Isuzu C-Series', 'Isuzu Como', 'Isuzu Cubic', 'Isuzu D-Max', 'Isuzu Duogongnengche', 'Isuzu Elf', 'Isuzu Fargo', 'Isuzu Faster', 'Isuzu Florian', 'Isuzu Forward', 'Isuzu Gala Mio'
        , 'Isuzu Geminett II', 'Isuzu Gemini', 'Isuzu Giga', 'Isuzu Grafter', 'Isuzu H-Series', 'Isuzu Heavy Duty', 'Isuzu Hillman Minx', 'Isuzu Hombre', 'Isuzu I-Mark', 'Isuzu i-Series'
        , 'Isuzu Impulse', 'Isuzu KB', 'Isuzu LB', 'Isuzu Leopard', 'Isuzu Lingqingka', 'Isuzu MU', 'Isuzu MU-7', 'Isuzu MU-X', 'Isuzu Oasis', 'Isuzu P up', 'Isuzu Panther', 'Isuzu Piazza'
        , 'Isuzu Pika', 'Isuzu Reach', 'Isuzu Rodeo', 'Isuzu Rodeo Denver', 'Saehan BL064', 'Isuzu Spark', 'Isuzu Statesman De Ville', 'Isuzu Tiejingang', 'Isuzu Traga', 'Isuzu VehiCROSS'
        , 'Isuzu Wasp', 'Isuzu WFR', 'Isuzu MU Wizard', 'Isuzu Wizard', 'Template:Isuzu cars timeline 1950–1979', 'Template:Isuzu modern timeline', 'Template:Isuzu United States'];

        foreach($Isuzu as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Isuzu',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '20',
                'count' => 0
            ]);
        }

        $Acura = ['Acura CL-X', 'Acura ARX-01', 'Acura ARX-02a', 'Acura CDX', 'Acura CL', 'Acura CSX', 'Acura EL', 'Acura ILX', 'Acura Integra', 'Acura Legend', 'Acura MDX', 'Acura NSX'
        , 'Acura RDX', 'Acura RL', 'Acura RLX', 'Acura RSX', 'Acura SLX', 'Acura TL', 'Acura TLX', 'Acura TSX', 'Acura Vigor', 'Acura ZDX', 'Template:Acura'];

        foreach($Acura as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Acura',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '20',
                'count' => 0
            ]);
        }

        $Acura = ['Porsche 356 (1948–1965)', 'Porsche 550 (1953–1957)', 'Porsche 718 (1957–1962)', 'Porsche 904 (1963–1965)', 'Porsche 906 (1965–1966)', 'Porsche 911 (1963–present)'
        , 'Porsche 912 (1965–1969, 1976)', 'Porsche 914 (1969–1976)', 'Porsche 924 (1976–1988)', 'Porsche 928 (1977–1995)', 'Porsche 930 (1974–1989)', 'Porsche 944 (1981–1991)'
        , 'Porsche 959 (1986–1988, 1992–1993)', 'Porsche 968 (1992–1995)', 'Porsche Boxster (1996–present)', 'Porsche Cayenne (2002–present)', 'Porsche Carrera GT (2003–2007)'
        , 'Porsche Cayman (2005–present)', 'Porsche Panamera (2009–present)', 'Porsche 918 Spyder (2013–2015)', 'Porsche Macan (2014–present)', 'Porsche Taycan (2019–present)'];

        foreach($Acura as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Acura',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '20',
                'count' => 0
            ]);
        }

        $Tesla = ['Tesla Model S', 'Tesla Model S (40 kW-hr battery pack)', 'Tesla Model S AWD (85 kW-hr battery pack)', 'Tesla Model 3 Long Range', 'Tesla Model 3 Long Range AWD'
        , 'Tesla Model 3 Long Range AWD Performance', 'Tesla Model 3 Long Range AWD', 'Tesla Model 3 Long Range AWD Performance', 'Tesla Model 3 Mid Range'
        , 'Tesla Model 3 Standard Range', 'Tesla Model 3 Standard Range Plus', 'Tesla Model S (60 kW-hr battery pack)', 'Tesla Model S (70 kW-hr battery pack)'
        , 'Tesla Model S (75 kW-hr battery pack)', 'Tesla Model S (85 kW-hr battery pack)', 'Tesla Model S (90 kW-hr battery pack)', 'Tesla Model S 100D'
        , 'Tesla Model S 75D', 'Tesla Model S 75kWh', 'Tesla Model S AWD - 100D', 'Tesla Model S AWD - 60D', 'Tesla Model S AWD - 70D', 'Tesla Model S AWD - 75D'
        , 'Tesla Model S AWD - 85D', 'Tesla Model S AWD - 90D', 'Tesla Model S AWD - P100D', 'Tesla Model S AWD - P85D', 'Tesla Model S AWD - P90D', 'Tesla Model S Long Range'
        , 'Tesla Model S P100D', 'Tesla Model S Performance (19in Wheels)', 'Tesla Model S Performance (21in Wheels)', 'Tesla Model S Standard Range', 'Tesla Model X 100D'
        , 'Tesla Model X 75D', 'Tesla Model X AWD - 100D', 'Tesla Model X AWD - 60D', 'Tesla Model X AWD - 75D', 'Tesla Model X AWD - 90D', 'Tesla Model X AWD - P100D'
        , 'Tesla Model X AWD - P90D', 'Tesla Model X Long Range', 'Tesla Model X P100D', 'Tesla Model X Performance (22in Wheels)'];

        foreach($Tesla as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Tesla',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '20',
                'count' => 0
            ]);
        }

        $Volvo = ['S60/V60', 'XC40', 'XC60', '	S90/V90', 'XC90', 'XC Classic', 'V40', 'S60/V60', 'XC60', 'V70/XC70', 'S80', 'C70', 'C30', 'S40/V50', 'XC90', 'V70/XC70', 
        'S60', 'S80', 'C70', 'S90/V90', 'S70/V70', 'S40/V40', '850', '940/960', '440/460', '780', '480', '740/760', '262C'
        , '340/360', '66', '240/260'];

        foreach($Volvo as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Volvo',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '20',
                'count' => 0
            ]);
        }

        $Mitsuoka = ['1996–present Galue', '2008–present Himiko', '2014–present Ryugi (based on the Toyota Corolla Axio and Toyota Corolla Fielder)', '1993–present Viewt', '2010–present Like-T3'
        , '2018–present Rock Star (Chevrolet Corvette C2 inspiration based on the Mazda MX-5)', '1982 BUBU 50 Series (a series of three-wheeled microcars)[3]'
        , '1989-1990 BUBU 356 Speedstar[4] (a copy of the Porsche 356 Speedster)', '1987 BUBU Classic SSK (copy of the Mercedes-Benz SSK roadster based on the Volkswagen Beetle)'
        , '2008-2012 Galue 204 (based on the Toyota Corolla Axio)', '2010-2012 Galue Classic', '1991 Dore (similar to the Le-Seyde, based on the Ford Mustang)'
        , '1990, 2000 Le-Seyde (a Nissan Silvia-based coupé in the spirit of the Zimmer)', '2010-2012 Like (based on the Mitsubishi i-MiEV)', '1998-2007 Mitsuoka Microcar'
        , '1998-2007 Microcar K-1/MC-1', '1999-2007 MC-1T', '1998-? Microcar K-2 (based on the design of the FMR Tg500)', '2005-? Microcar K-3/Type F (design similar to the Zero1)'
        , '2006-? Microcar K-4/Type R[5] (styling reminiscent of 1950s race cars)', '1999-2007 ME-1', '2002-2007 ME-2 (Convoy 88)', '2004-2012 Nouera (based on the Honda Accord and later the Toyota Corolla)'
        , '2007-2014 Orochi (based on the Honda NSX)', '1996-2004 Ray (styling similar to the Riley Elf Mk.3, based on the Mazda Carol and later the Daihatsu Mira Gino)'
        , '1998-2004 Ryoga a "classically" styled sedan originally based on the Primera and later on the smaller Sunny', '1996-2000 Type F (a restyled Zero1)'
        , '2000-2001 Yuga (a London Taxi copy based on the Nissan Cube)', '1994-2000 Zero1[6] (a Lotus Super Seven copy with Eunos Roadster drivetrain)'];

        foreach($Mitsuoka as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Mitsuoka',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '20',
                'count' => 0
            ]);
        }

        $Eunos = ['Eunos'];

        foreach($Eunos as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Eunos',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '20',
                'count' => 0
            ]);
        }

        $AlfaRomeo = ['Alfa Romeo Spider', 'Alfa Romeo 8C Competizione', 'Alfa Romeo Brera', 'Alfa Romeo 159', 'Alfa Romeo 105 Series Coupes', 'Alfa Romeo 166', 
        'Alfa Romeo 8C', 'Alfa Romeo 156', 'Alfa Romeo GTV6', 'Alfa Romeo MiTo', 'Alfa Romeo 2600', 'Alfa Romeo 145', 'Alfa Romeo 75', 'Alfa Romeo 147'
        , 'Alfa Romeo 155', 'Alfa Romeo Disco Volante', 'Alfa Romeo 164', 'Alfa Romeo Arna', 'Alfa Romeo Giulia', 'Alfa Romeo Giulietta', 'Alfa Romeo GT', 'Alfa Romeo Tipo 33'
        , 'Alfa Romeo 6C', 'Alfa Romeo GTV and Spider', 'Alfa Romeo Montreal', 'Alfa Romeo 90', 'Alfa Romeo Alfasud', 'Alfa Romeo RM', 'Alfa Romeo Alfa 6', 'Alfa Romeo Alfetta'
        , 'Alfa Romeo Sprint', 'Alfa Romeo SZ', 'Alfa Romeo 1750', 'Alfa Romeo G1', 'Alfa Romeo 1900', 'Alfa Romeo 2000', 'Alfa Romeo Giulia TZ', 'Alfa Romeo Giulietta'
        , 'Alfa Romeo 33', 'Alfa Romeo 33 Stradale', 'Alfa Romeo GTA', 'Alfa Romeo 12C', 'Alfa Romeo P3', 'Alfa Romeo Matta', 'Alfa Romeo RL', 'A.L.F.A 40/60 HP'
        ,'Alfa Romeo Tipo A','A.L.F.A 24 HP','Alfa Romeo 20/30 HP ES Sport','Alfa Romeo Giulietta','Alfa Romeo Gran Sport Quattroruote','Alfa Romeo 33.2','A.L.F.A. 40/60 GP'
        ,'Alfa Romeo P1','Alfa Romeo 169','Alfa Romeo 20/30 HP','Alfa Romeo P2','Alfa Romeo Kamal','Alfa Romeo Tipo 308','Alfa Romeo Tipo 512','Alfa Romeo Scighera'];

        foreach($AlfaRomeo as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'AlfaRomeo',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '20',
                'count' => 0
            ]);
        }

        $AstonMartin = ['1921–1925 Aston Martin Standard Sports', '1927–1932 Aston Martin First Series', '1929–1932 Aston Martin International', '1932–1932 Aston Martin International Le Mans'
        , '1932–1934 Aston Martin Le Mans', '1933–1934 Aston Martin 12/50 Standard', '1934–1936 Aston Martin Mk II', '1934–1936 Aston Martin Ulster', '1936–1940 Aston Martin 2-litre Speed Models (23 built) The last 8 were fitted with C-type bodywork'
        , '1937–1939 Aston Martin 15/98', '1948–1950 Aston Martin 2-Litre Sports (DB1)', '1950–1953 Aston Martin DB2', '1953–1957 Aston Martin DB2/4', '1957–1959 Aston Martin DB Mark III'
        , '1958–1963 Aston Martin DB4', '1961–1963 Aston Martin DB4 GT Zagato', '1963–1965 Aston Martin DB5', '1965–1966 Aston Martin Short Chassis Volante', '1965–1969 Aston Martin DB6'
        , '1967–1972 Aston Martin DBS', '1969–1989 Aston Martin V8', '1977–1989 Aston Martin V8 Vantage', '1986–1990 Aston Martin V8 Zagato', '1989–1996 Aston Martin Virage/Virage Volante'
        , '1989–2000 Aston Martin Virage', '1993–2000 Aston Martin Vantage', '1996–2000 Aston Martin V8 Coupe/V8 Volante', '1993–2003 Aston Martin DB7/DB7 Vantage', '2001–2007 Aston Martin V12 Vanquish/Vanquish S'
        , '2002–2003 Aston Martin DB7 Zagato', '2002–2004 Aston Martin DB AR1', '2004–2016 Aston Martin DB9', '2005–2018 Aston Martin V8 and V12 Vantage', '2007–2012 Aston Martin DBS V12'
        , '2009–2012 Aston Martin One-77[95]', '2010–present Aston Martin Rapide/Rapide S', '2011–2012 Aston Martin Virage/Virage Volante', '2011–2013 Aston Martin Cygnet, based on the Toyota iQ[96][97]'
        , '2012–2013 Aston Martin V12 Zagato', '2012–2018 Aston Martin Vanquish/Vanquish Volante', '2015–2016 Aston Martin Vulcan', '2016–present Aston Martin DB11', '2018–present Aston Martin Vantage'
        , '2018–present Aston Martin DBS Superleggera', '1944 Aston Martin Atom (concept)', '1961–1964 Lagonda Rapide', '1976–1989 Aston Martin Lagonda', '1980 Aston Martin Bulldog (concept)'
        , '1993 Lagonda Vignale (concept)', '2007 Aston Martin V12 Vantage RS (concept)', '2007–2008 Aston Martin V8 Vantage N400', '2009 Aston Martin Lagonda SUV (concept)[98]'
        , '2010 Aston Martin V12 Vantage Carbon Black Edition[99]', '2010 Aston Martin DBS Carbon Black Edition[99]', '2013 Aston Martin Rapide Bertone Jet 2+2 (concept)'
        , '2013 Aston Martin CC100 Speedster (concept)[100]', '2015 Aston Martin DB10 (concept)', 'Aston Martin DB11', 'Aston Martin DBS Superleggera', 'Aston Martin Rapide S', 'Aston Martin Vantage'];

        foreach($AstonMartin as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'AstonMartin',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '20',
                'count' => 0
            ]);
        }

        $Bentley = ['Bentley 3 Litre', 'Bentley 3.5 Litre', 'Bentley 4 Litre', 'Bentley 4½ Litre', 'Bentley Speed Six', 'Bentley 8 Litre', 'Bentley Arnage', 'Bentley Azure', 'Bentley Bentayga'
        , 'Blue Train Bentley', 'Bentley Brooklands', 'Bentley Brooklands Coupé', 'Bentley Continental', 'Bentley Flying Spur (disambiguation)', 'Bentley Flying Spur (2005)'
        , 'Bentley Continental GT', 'Bentley Continental GTC', 'Bentley Continental R', 'Bentley Continental S', 'Bentley Continental T', 'Bentley Corniche', 'Bentley Eight'
        , 'Bentley Mark V', 'Bentley Mark VI', 'Bentley Mulsanne (1980–92)', 'Bentley Mulsanne (2010)', 'Bentley R Type', 'Bentley S1', 'Bentley S2', 'Bentley S3'
        , 'Bentley State Limousine', 'Bentley T-series', 'Bentley Turbo R', 'Bentley Turbo RT', 'Bentley Turbo S'];

        foreach($Bentley as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Bentley',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '20',
                'count' => 0
            ]);
        }

        $Bugatti = ['Bugatti Veyron', 'Bugatti Type 32', 'Bugatti EB110', 'Bugatti Type 57S Atalante number 57502', 'Bugatti Royale', 'Bugatti Type 101', 'Bugatti Type 46', 
        'Bugatti Type 51', 'Bugatti Type 49', 'Bugatti Type 57', 'Bugatti EB118', 'Bugatti Type 13', 'Bugatti Type 18', 'Bugatti Type 35', 'Bugatti Type 53', 'Bugatti Type 55'
        , 'Bugatti Type 252', 'Bugatti Type 30', 'Bugatti Type 38', 'Bugatti Type 40', 'Bugatti Type 43', 'Bugatti Type 44', 'Bugatti Type 23', 'Bugatti Type 50', 'Bugatti Type 57G'
        , 'Bugatti Type 50B', 'Bugatti Type 251', 'Bugatti Type 37', 'Bugatti Type 39', 'Bugatti Type 29', 'Bugatti 18/3 Chiron', 'Bugatti Type 57S Atalante'];

        foreach($Bugatti as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Bugatti',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '20',
                'count' => 0
            ]);
        }

        $Buick = ['Excelle', 'LaCrosse', 'Regal', 'Cascada', 'Verano', 'Encore', 'Envision', 'Enclave', 'GL8', 'Master Six', 'Century', 'Limited', 'Roadmaster', 'Special', 'Super'
        , 'Skylark', 'Electra', 'Invicta', 'LeSabre', 'Riviera', 'Wildcat', 'Estate', 'Centurion', 'Apollo', 'Skyhawk', 'Somerset', 'Reatta', 'Park Avenue', 'Rendezvous'
        , 'Rainier', 'Terraza', 'Lucerne'];

        foreach($Buick as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Buick',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '20',
                'count' => 0
            ]);
        }

        $Cadillac = ['1992-2002 Eldorado —108 in (2,700 mm) wheelbase, V8', '1989-1993 Coupe DeVille -110.8 in (2,810 mm) wheelbase, V8', '1989-1993 Sedan DeVille -113.8 in (2,890 mm) wheelbase, V8'
        , '1992-1997 Seville -111.0 in (2,820 mm) wheelbase, V8', '1994–1999 DeVille —113.8 in (2,890 mm) wheelbase, V8', '1997–2001 Catera —107.5 in (2,730 mm) wheelbase, V6'
        , '1989-1992 Fleetwood -113.8 in (2,890 mm) wheelbase, V8', '1990-1992 Brougham -121.5 in (3,090 mm) wheelbase, V8', '1993-1996 Fleetwood -121.5 in (3,090 mm) wheelbase, V8'
        , '1993 Sixty Special -113.8 in (2,890 mm) wheelbase, V8', '1998-2000 Escalade', '1998-2004 Seville -112.2 in (2,850 mm) wheelbase, V8', '2000-2005 DeVille -115.3 in (2,930 mm) wheelbase, V8'
        , '2002-2006 Escalade', '2003-2006 Escalade ESV', '2003-2013 CTS', '2004-2014 CTS-V Sedan', '2004-2009 SRX', '2004-2009 XLR', '2006-2009 XLR-V', '2005-2010 BLS (not sold in the United States)'
        , '2005-2011 STS -116.4 in (2,960 mm) wheelbase', '2005-2009 STS-V -116.4 in (2,960 mm) wheelbase', '2006-2011 DTS -115.6 in (2,940 mm) wheelbase, V8', '2007-2014 Escalade'
        , '2007-2014 Escalade ESV', '2009-2013 Escalade Hybrid hybrid SUV', '2002-2013 Escalade EXT pickup truck', '2010-2016 SRX', '2010-2013 CTS Sport Wagon', '2011-2014 CTS Coupe'
        , '2011-2014 CTS-V Sport Wagon', '2011-2015 CTS-V Coupe', '2014-2019 CTS Sedan', '2016-2019 CTS-V Sedan', '2013-2018 ATS Sedan', '2016-2018 ATS-V Sedan', '2015-2019 ATS Coupe'
        , '2016-2019 ATS-V Coupe', '2013-2019 XTS', '2014 and 2016 ELR plug-in hybrid coupe', '2015-Present Escalade', '2015-Present Escalade ESV', '2016-Present CT6', '2019-Present CT6-V'
        , '2017-Present XT5', '2019-Present XT4', 'CT4', 'CT4-V', 'CT5', 'CT5-V', 'XT6 (2020)','1980-1985 Seville — 114.3 in (2,900 mm) wheelbase, V8'
        , '1982-1988 Cimarron— 101.2 in (2,570 mm) wheelbase, V6', '1980-1984 Coupe de Ville -121.5 in (3,090 mm) wheelbase, V8', '1980-1984 Sedan de Ville -121.5 in (3,090 mm) wheelbase, V8'
        , '1985–1988 Coupe de Ville —110.8 in (2,810 mm) wheelbase, V8', '1985–1988 Sedan de Ville —110.8 in (2,810 mm) wheelbase, V8', '1985–1988 Fleetwood —110.8 in (2,810 mm) wheelbase, V8'
        , '1985–1988 Fleetwood 75 —134.4 in (3,410 mm) wheelbase, V8', '1987-1988 Fleetwood Sixty Special —115.8 in (2,940 mm) wheelbase, V8', '1979-1985 Eldorado —113.9 in (2,890 mm) wheelbase, V6 or V8'
        , '1986-1991 Eldorado —108 in (2,700 mm) wheelbase, V6 or V8', '1987–1993 Allanté —99.4 in (2,520 mm) wheelbase, V8', '1989–1993 Coupe de Ville —110.8 in (2,810 mm) wheelbase, V8'
        , '1989–1993 Sedan de Ville —113.8 in (2,890 mm) wheelbase, V8', '1989–1993 Fleetwood —113.8 in (2,890 mm) wheelbase, V8', '1980-1986 Fleetwood Brougham -121.5 in (3,090 mm) wheelbase, V8'
        , '1987-1989 Brougham -121.5 in (3,090 mm) wheelbase, V8'];

        foreach($Cadillac as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Cadillac',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '20',
                'count' => 0
            ]);
        }

        $Chrysler = ['Chrysler 300', 'Chrysler Pacifica (minivan)', 'Chrysler 150', 'Chrysler 160/180', 'Chrysler 200', 'Chrysler 300 letter series', 'Chrysler 300M', 'Chrysler 300 non-letter series', 
        'Chrysler Airflow', 'Chrysler Airstream', 'Chrysler Alpine', 'Chrysler Aspen', 'Chrysler Avenger', 'Chrysler Centura (Australia)', 'Chrysler Charger (Australia)', 'Chrysler by Chrysler (Australia)', 
        'Chrysler Cirrus', 'Chrysler Colt (South Africa)', 'Chrysler Concorde', 'Chrysler Conquest', 'Chrysler Cordoba', 'Chrysler Crossfire', 'Chrysler D-50 (Australia)', 'Chrysler Daytona (Canada)', 
        'Chrysler Delta (UK and Ireland)', 'Chrysler Drifter (Australia)', 'Chrysler Dynasty (Canada)', 'Chrysler Executive', 'Chrysler Fifth Avenue', 'Chrysler Galant', 'Chrysler Horizon (Europe)',
        'Chrysler Hunter', 'Chrysler Imperial', 'Chrysler Imperial Parade Phaeton', 'Chrysler Intrepid (Canada)', 'Chrysler L300 Express (Australia)', 'Chrysler Lancer (Australia)', 
        'Chrysler Laser', 'Chrysler LeBaron', 'Chrysler LHS', 'Chrysler Newport', 'Chrysler Neon (Australia, Europe and Japan)', 'Chrysler New Yorker', 'Chrysler New Yorker Fifth Avenue', 
        'Chrysler Pacifica (crossover)', 'Chrysler Prowler', 'Chrysler PT Cruiser', 'Chrysler Regal (Australia)', 'Chrysler Plainsman (Australia)', 'Chrysler Royal', 
        'Chrysler Royal (Australia)', 'Chrysler Saratoga', 'Chrysler Saratoga, Canada non-letter 300 series', 'Chrysler Sebring', 'Chrysler Sigma (Australia)', 'Chrysler Stratus (Canada and Europe)'
        , 'Chrysler Sunbeam', 'Chrysler TC by Maserati', 'Chrysler Touring', 'Chrysler Town and Country', 'Chrysler Turbine Car (Experimental gas turbine–powered car)', 
        'Chrysler Valiant (Australia, New Zealand and South Africa)', 'Chrysler VIP (Australia)', 'Chrysler Viper (Europe)', 'Chrysler Vogue (South Africa)', 
        'Chrysler Voyager/Grand Voyager, US', 'Chrysler Voyager, Europe', 'Chrysler Wayfarer (Australia)', 'Chrysler Windsor', 'Chrysler Windsor as Chrysler of Canadas version of Newport', 
        'Chrysler Ypsilon'];

        foreach($Chrysler as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Chrysler',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '20',
                'count' => 0
            ]);
        }

        /* Model Table END */
    }
}