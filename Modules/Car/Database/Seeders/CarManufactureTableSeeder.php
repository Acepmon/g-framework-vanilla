<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarManufactureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manufacturers = ['Toyota', 'Lexus', 'Nissan', 'Mercedes-benz', 'Volkswagen', 'Mini', 'Audi', 'BMW', 'Ford', 'Land Rover', 'Daihatsu', 'Dodge', 'Honda', 'Hyundai', 'Kia'
        ,'Jeep', 'Subaru', 'Suzuki', 'Mitsubishi', 'Infiniti', 'Mazda', 'Chevrolet', 'isuzu', 'Acura', 'Porsche', 'Tesla', 'Volvo', 'Daewoo', 'Mitsuoka', 'Eunos', 'CT T'
        , 'AM General', 'Alfa Romeo', 'Aston Martin', 'Bentley', 'Bugatti', 'Buick', 'Cadillac', 'Chrysler', 'Eagle', 'Jaguar', 'Lamborghini', 'Lincoln', 'Lotus', 'Maserati'
        , 'Maybach', 'McLaren', 'Panoz', 'Ram', 'Rolls-Royce', 'Saab', 'Scion', 'Smart', 'Spyker'];

        $parent = TaxonomyManager::register('Car Manufacturer', 'car');

        foreach ($manufacturers as $key => $manufacturer) {
            TaxonomyManager::register($manufacturer, 'car-manufacturer', $parent->term->id);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);

        $this->call(CarManufactureToyotaTableSeeder::class);
        $this->call(CarManufactureLexusTableSeeder::class);
        $this->call(CarManufactureNissanTableSeeder::class);
        $this->call(CarManufactureMercedesbenzTableSeeder::class);
        $this->call(CarManufactureVolkswagenTableSeeder::class);
        $this->call(CarManufactureMiniTableSeeder::class);
        $this->call(CarManufactureAudiTableSeeder::class);
        $this->call(CarManufactureBMWTableSeeder::class);
        $this->call(CarManufactureFordTableSeeder::class);
        $this->call(CarManufactureLandRoverTableSeeder::class);
        $this->call(CarManufactureDaihatsuTableSeeder::class);
        $this->call(CarManufactureDodgeTableSeeder::class);
        $this->call(CarManufactureHondaTableSeeder::class);
        $this->call(CarManufactureHyundaiTableSeeder::class);
        // $this->call(CarManufactureKiaTableSeeder::class);
        // $this->call(CarManufactureSubaruTableSeeder::class);
        // $this->call(CarManufactureSuzukiTableSeeder::class);
        // $this->call(CarManufactureMitsubishiTableSeeder::class);
        // $this->call(CarManufactureInfinitiTableSeeder::class);
        // $this->call(CarManufactureMazdeTableSeeder::class);
        // $this->call(CarManufactureChevroletTableSeeder::class);
        // $this->call(CarManufactureIsuzuTableSeeder::class);
        // $this->call(CarManufactureAcuraTableSeeder::class);
        // $this->call(CarManufacturePorscheTableSeeder::class);
        // $this->call(CarManufactureTeslaTableSeeder::class);
        // $this->call(CarManufactureMitsuokaTableSeeder::class);
        // $this->call(CarManufactureEunosTableSeeder::class);
        // $this->call(CarManufactureAlfaRomeoTableSeeder::class);
        // $this->call(CarManufactureAstinMartinTableSeeder::class);
        // $this->call(CarManufactureBentleyTableSeeder::class);
        // $this->call(CarManufactureBugattiTableSeeder::class);
        // $this->call(CarManufactureBuickTableSeeder::class);
        // $this->call(CarManufactureCadillacTableSeeder::class);
        // $this->call(CarManufactureChryslerTableSeeder::class);
        // $this->call(CarManufactureEagleTableSeeder::class);
    }
}
