<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(CarConfigsSeeder::class);
        $this->call(CarGroupsSeeder::class);
        $this->call(CarUsersSeeder::class);
        $this->call(CarPagesSeeder::class);
        $this->call(CarContentsSeeder::class);
        $this->call(CarBannerLocationsTableSeeder::class);
        $this->call(CarBannersTableSeeder::class);
        $this->call(CarBuyPageSeeder::class);
    }
}
