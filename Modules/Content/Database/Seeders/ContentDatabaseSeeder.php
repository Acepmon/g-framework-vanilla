<?php

namespace Modules\Content\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ContentDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(CountriesTableSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(GroupMenuTableSeeder::class);
        $this->call(GroupPermissionTableSeeder::class);
        $this->call(ContentsTableSeeder::class);
    }
}
