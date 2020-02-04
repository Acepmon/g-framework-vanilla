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

        $this->call(ContentsTableSeeder::class);
        $this->call(TermTaxonomyTableSeeder::class);
        $this->call(MenusTableSeeder::class);
    }
}
