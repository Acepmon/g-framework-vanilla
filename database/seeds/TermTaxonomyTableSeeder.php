<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TermTaxonomyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $term_id = DB::table('terms')->insertGetId([
            'name' => 'Uncategorized',
            'slug' => 'Uncategorized',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id,
            'taxonomy' => 'category',
            'description' => 'Default Category',
            'count' => 0
        ]);
    }
}
