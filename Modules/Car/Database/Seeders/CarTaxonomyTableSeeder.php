<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarTaxonomyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CarParentsTableSeeder::class);
        $this->call(CarOptionsTaxonomyTableSeeder::class);
        $this->call(CarTypeTableSeeder::class);
        $this->call(CarManufactureTableSeeder::class);
        $this->call(CarFuelTypeTableSeeder::class);
        $this->call(CarTransmissionTableSeeder::class);
        $this->call(CarAreaTableSeeder::class);
        $this->call(CarColorTableSeeder::class);
        $this->call(CarWheelPositionTableSeeder::class);
        $this->call(CarWheelTableSeeder::class);
        $this->call(CarAccidentTableSeeder::class);
        $this->call(CarManCountTableSeeder::class);
    }
}
