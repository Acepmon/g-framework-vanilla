<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarManufactureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
                'taxonomy' => 'Manufacturer',
                'description' => $manufacture,
                'count' => 0
            ]);
        }

        $this->call(CarManufactureToyotaTableSeeder::Class);
        $this->call(CarManufactureLexusTableSeeder::Class);
        $this->call(CarManufactureNissanTableSeeder::Class);
        $this->call(CarManufactureMercedesbenzTableSeeder::Class);
        $this->call(CarManufactureVolkswagenTableSeeder::Class);
        $this->call(CarManufactureMiniTableSeeder::Class);
        $this->call(CarManufactureAudiTableSeeder::Class);
        $this->call(CarManufactureBMWTableSeeder::Class);
        $this->call(CarManufactureFordTableSeeder::Class);
        $this->call(CarManufactureLandRoverTableSeeder::Class);
        $this->call(CarManufactureDaihatsuTableSeeder::Class);
        $this->call(CarManufactureDodgeTableSeeder::Class);
        $this->call(CarManufactureHondaTableSeeder::Class);
        $this->call(CarManufactureHyandaiTableSeeder::Class);
        $this->call(CarManufactureKiaTableSeeder::Class);
        $this->call(CarManufactureSubaruTableSeeder::Class);
        $this->call(CarManufactureSuzukiTableSeeder::Class);
        $this->call(CarManufactureMitsubishiTableSeeder::Class);
        $this->call(CarManufactureInfinitiTableSeeder::Class);
        $this->call(CarManufactureMazdeTableSeeder::Class);
        $this->call(CarManufactureChevroletTableSeeder::Class);
        $this->call(CarManufactureIsuzuTableSeeder::Class);
        $this->call(CarManufactureAcuraTableSeeder::Class);
        $this->call(CarManufacturePorscheTableSeeder::Class);
        $this->call(CarManufactureTeslaTableSeeder::Class);
        $this->call(CarManufactureMitsuokaTableSeeder::Class);
        $this->call(CarManufactureEunosTableSeeder::Class);
        $this->call(CarManufactureAlfaRomeoTableSeeder::Class);
        $this->call(CarManufactureAstinMartinTableSeeder::Class);
        $this->call(CarManufactureBentleyTableSeeder::Class);
        $this->call(CarManufactureBugattiTableSeeder::Class);
        $this->call(CarManufactureBuickTableSeeder::Class);
        $this->call(CarManufactureCadillacTableSeeder::Class);
        $this->call(CarManufactureChryslerTableSeeder::Class);
        $this->call(CarManufactureEagleTableSeeder::Class);
    }
}
