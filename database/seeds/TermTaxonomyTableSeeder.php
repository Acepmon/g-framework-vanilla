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

        /* Car Terms Table START */
        
        // Manufacturer
        $term_id = DB::table('terms')->insertGetId([
            'name' => 'Toyota',
            'slug' => 'toyota',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id,
            'taxonomy' => 'manufacturer',
            'description' => 'Toyota',
            'count' => 0
        ]);
        $term_id = DB::table('terms')->insertGetId([
            'name' => 'Ford',
            'slug' => 'ford',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id,
            'taxonomy' => 'manufacturer',
            'description' => 'Ford',
            'count' => 0
        ]);
        // Steering Wheel
        $term_id = DB::table('terms')->insertGetId([
            'name' => 'Left',
            'slug' => 'left',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id,
            'taxonomy' => 'steering-wheel',
            'description' => 'Left',
            'count' => 0
        ]);
        $term_id = DB::table('terms')->insertGetId([
            'name' => 'Right',
            'slug' => 'right',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id,
            'taxonomy' => 'steering-wheel',
            'description' => 'Right',
            'count' => 0
        ]);
        // Type of Fuel
        $term_id = DB::table('terms')->insertGetId([
            'name' => 'Gas',
            'slug' => 'gas',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id,
            'taxonomy' => 'type-of-fuel',
            'description' => 'Gas',
            'count' => 0
        ]);
        $term_id = DB::table('terms')->insertGetId([
            'name' => 'Diesel',
            'slug' => 'diesel',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id,
            'taxonomy' => 'type-of-fuel',
            'description' => 'Diesel',
            'count' => 0
        ]);
        // Millage
        $term_id = DB::table('terms')->insertGetId([
            'name' => 'millage',
            'slug' => 'millage',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id,
            'taxonomy' => 'millage',
            'description' => 'millage',
            'count' => 0
        ]);
        // Transmission
        $term_id = DB::table('terms')->insertGetId([
            'name' => 'Automatic',
            'slug' => 'automatic',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id,
            'taxonomy' => 'transmission',
            'description' => 'Automatic',
            'count' => 0
        ]);
        $term_id = DB::table('terms')->insertGetId([
            'name' => 'Manual',
            'slug' => 'manual',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id,
            'taxonomy' => 'transmission',
            'description' => 'Manual',
            'count' => 0
        ]);
        // Seating
        $term_id = DB::table('terms')->insertGetId([
            'name' => '4',
            'slug' => 'four',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id,
            'taxonomy' => 'seating',
            'description' => '4',
            'count' => 0
        ]);
        $term_id = DB::table('terms')->insertGetId([
            'name' => '6',
            'slug' => 'six',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id,
            'taxonomy' => 'seating',
            'description' => '6',
            'count' => 0
        ]);
        // Wheel drive
        $term_id = DB::table('terms')->insertGetId([
            'name' => '2WD',
            'slug' => '2wd',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id,
            'taxonomy' => 'wheel-drive',
            'description' => '2WD',
            'count' => 0
        ]);
        $term_id = DB::table('terms')->insertGetId([
            'name' => '4WD',
            'slug' => '4wd',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id,
            'taxonomy' => 'wheel-drive',
            'description' => '4WD',
            'count' => 0
        ]);
        // Advantages
        $term_id = DB::table('terms')->insertGetId([
            'name' => '1 person',
            'slug' => 'one-person',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id,
            'taxonomy' => 'advantages',
            'description' => '1 person',
            'count' => 0
        ]);
        $term_id = DB::table('terms')->insertGetId([
            'name' => 'In Garage',
            'slug' => 'in-garage',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id,
            'taxonomy' => 'advantages',
            'description' => 'In Garage',
            'count' => 0
        ]);
        $term_id = DB::table('terms')->insertGetId([
            'name' => '4 Season Tire',
            'slug' => 'four-season-tire',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id,
            'taxonomy' => 'advantages',
            'description' => '4 Season Tire',
            'count' => 0
        ]);
        // Seller Description
        $term_id = DB::table('terms')->insertGetId([
            'name' => 'description',
            'slug' => 'description',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id,
            'taxonomy' => 'description',
            'description' => 'description',
            'count' => 0
        ]);
        // General Information
        $term_id = DB::table('terms')->insertGetId([
            'name' => 'model',
            'slug' => 'model',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id,
            'taxonomy' => 'model',
            'description' => 'model',
            'count' => 0
        ]);
        $term_id = DB::table('terms')->insertGetId([
            'name' => 'displacement',
            'slug' => 'displacement',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id,
            'taxonomy' => 'displacement',
            'description' => 'displacement',
            'count' => 0
        ]);
        $term_id = DB::table('terms')->insertGetId([
            'name' => 'Year of Product',
            'slug' => 'year-of-product',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id,
            'taxonomy' => 'year-of-product',
            'description' => 'year of product',
            'count' => 0
        ]);
        $term_id = DB::table('terms')->insertGetId([
            'name' => 'Last Check Log',
            'slug' => 'last-check-log',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id,
            'taxonomy' => 'last-check-log',
            'description' => 'last check log',
            'count' => 0
        ]);
        $term_id = DB::table('terms')->insertGetId([
            'name' => 'New',
            'slug' => 'new',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id,
            'taxonomy' => 'car-condition',
            'description' => 'car condition: new',
            'count' => 0
        ]);
        $term_id = DB::table('terms')->insertGetId([
            'name' => 'Used',
            'slug' => 'used',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id,
            'taxonomy' => 'car-condition',
            'description' => 'car condition: used',
            'count' => 0
        ]);
        $term_id = DB::table('terms')->insertGetId([
            'name' => 'Black',
            'slug' => 'black',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id,
            'taxonomy' => 'color',
            'description' => 'black',
            'count' => 0
        ]);
        $term_id = DB::table('terms')->insertGetId([
            'name' => 'VIN',
            'slug' => 'vin',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id,
            'taxonomy' => 'vin',
            'description' => 'VIN',
            'count' => 0
        ]);
        $term_id = DB::table('terms')->insertGetId([
            'name' => 'Year of Entry',
            'slug' => 'year-of-entry',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id,
            'taxonomy' => 'year-of-entry',
            'description' => 'year-of-entry',
            'count' => 0
        ]);
        $term_id = DB::table('terms')->insertGetId([
            'name' => 'Change',
            'slug' => 'change',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id,
            'taxonomy' => 'price-type',
            'description' => 'Change',
            'count' => 0
        ]);
        $term_id = DB::table('terms')->insertGetId([
            'name' => 'Negotiate',
            'slug' => 'negotiate',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id,
            'taxonomy' => 'price-type',
            'description' => 'Negotiate',
            'count' => 0
        ]);
        $term_id = DB::table('terms')->insertGetId([
            'name' => 'Loan',
            'slug' => 'loan',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id,
            'taxonomy' => 'price-type',
            'description' => 'Loan',
            'count' => 0
        ]);

        /* Car Terms Table END */
    }
}
