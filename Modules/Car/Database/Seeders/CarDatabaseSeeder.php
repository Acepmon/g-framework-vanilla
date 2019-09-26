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

        $this->call(CarGroupsTableSeeder::class);
        $this->call(CarMenusTableSeeder::class);
        $this->call(CarGroupMenuTableSeeder::class);
        $this->call(CarPermissionsTableSeeder::class);
        $this->call(CarUsersTableSeeder::class);
        $this->call(CarPagesTableSeeder::class);
        $this->call(CarContentsTableSeeder::class);
        $this->call(CarBannerLocationsTableSeeder::class);
        $this->call(CarBannersTableSeeder::class);
        $this->call(CarBuyPageTableSeeder::class);
        $this->call(CarSellPagesTableSeeder::class);
    }
}
