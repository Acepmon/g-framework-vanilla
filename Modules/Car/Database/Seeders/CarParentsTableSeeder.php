<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarParentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $CarType = ['CarType', 'Manufacture', 'FuelType', 'Transmission', 
        'Area', 'WheelPosition', 'accidents', 'manCount', 
        'options', 'Exteriors', 'Guts', 'Safety',
        'Convenience', 'clean', 'WheelDrive', 'Toyota', 
        'Lexus', 'Nissan', 'Mercedesbenz','Volkswagen', 
        'Mini', 'Audi', 'BMW', 'Ford', 
        'LandRover', 'Daihatsu', 'Dodge', 'Honda', 
        'Hyundai', 'Kia', 'Subaru', 'Suzuki', 
        'Mitsubishi', 'Infiniti', 'Mazda', 'Chevrolet', 
        'Isuzu', 'Acura', 'Porsche', 'Tesla', 
        'Volvo', 'Mitsuoka', 'Eunos', 'AlfaRomeo', 'AstonMartin', 'Bentley', 'Bugatti', 'Buick', 'Cadillac', 'Chrysler'];

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
    }
}
