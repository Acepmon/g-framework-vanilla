<?php

use Illuminate\Database\Seeder;

use App\Entities\TaxonomyManager;

class TaxonomyManagerTester extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options = ['Exterior', 'Guts', 'Safety', 'Convenience', 'Clean'];
        $clean = ['Woman driver', 'No smoking', 'One person drive'];
        $convenience = ['Black box', 'Blinder : rear', 'AV monitor : Rear', 'AV monitor : Front', 'Rain senser', 'Auto light', 'Bluetooth', 'AUX terminal', 'USB Terminal'
        , 'Navigation', 'CD player', 'Power window', 'Auto air conditioner', 'Cruise control', 'Smart Key'];
        $exteriors = ['Rear wiper', 'Electric folding side mirror', '4 season tire', 'Aluminum wheel', 'Sunroof'];
        $guts = ['Power Door lock', 'Memory seat : driver’s seat', 'Heated Seat: Rear Seat', 'Heated Seat: Driver’s Seat', 'Electric seat : Passenger seat', 'Electric seat : driver’s seat'
        , 'Leather seat', 'Power steering', 'Steering wheel remote control'];
        $safetys = ['Electric parking brake', 'ABS', 'Parking sense : Front', 'Parking Sense : rear', 'Camera : Side', 'Camera : Rear', 'Camera : Front', 'Airbag : Curtains'
        , 'Airbag : Side', 'Passenger’s seat', 'Airbag : Driver’s seat'];

        TaxonomyManager::registerTaxonomy('manufacturer');
    }
}
