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
        $this->call(CarParentsTableSeeder::Class);
        $this->call(CarOptionsTaxonomyTableSeeder::Class);
        $this->call(CarTypeTableSeeder::Class);
        $this->call(CarManufactureTableSeeder::Class);
        $this->call(CarFuelTypeTableSeeder::Class);
        $this->call(CarTransmissionTableSeeder::Class);
        $this->call(CarAreaTableSeeder::Class);
        $this->call(CarColorTableSeeder::Class);
        $this->call(CarWheelPositionTableSeeder::Class);
        $this->call(CarWheelTableSeeder::Class);
        $this->call(CarAccidentTableSeeder::Class);
        $this->call(CarManCountTableSeeder::Class);
    }
}
