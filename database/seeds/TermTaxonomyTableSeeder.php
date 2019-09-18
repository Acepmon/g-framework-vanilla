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
        /* Car Type Table START */

        $term_id1 = DB::table('terms')->insertGetId([
            'name' => 'Sedan',
            'slug' => 'Sedan',
        ]);
        DB::table('term_taxonomy')->insert([

            'term_id' => $term_id1,
            'taxonomy' => 'Car Type',
            'description' => 'Sedan',
            'count' => 0
        ]);
        $term_id1 = DB::table('terms')->insertGetId([
            'name' => 'SUV',
            'slug' => 'SUV',
        ]);
        DB::table('term_taxonomy')->insert([

            'term_id' => $term_id1,
            'taxonomy' => 'Car Type',
            'description' => 'SUV',
            'count' => 0
        ]);
        $term_id1 = DB::table('terms')->insertGetId([
            'name' => 'Sport',
            'slug' => 'Sport',
        ]);
        DB::table('term_taxonomy')->insert([

            'term_id' => $term_id1,
            'taxonomy' => 'Car Type',
            'description' => 'Sport',
            'count' => 0
        ]);
        $term_id1 = DB::table('terms')->insertGetId([
            'name' => 'Trucks',
            'slug' => 'Trucks',
        ]);
        DB::table('term_taxonomy')->insert([

            'term_id' => $term_id1,
            'taxonomy' => 'Car Type',
            'description' => 'Trucks',
            'count' => 0
        ]);
        $term_id1 = DB::table('terms')->insertGetId([
            'name' => 'Vans',
            'slug' => 'Vans',
        ]);
        DB::table('term_taxonomy')->insert([

            'term_id' => $term_id1,
            'taxonomy' => 'Car Type',
            'description' => 'Vans',
            'count' => 0
        ]);
        $term_id1 = DB::table('terms')->insertGetId([
            'name' => 'Bus',
            'slug' => 'Bus',
        ]);
        DB::table('term_taxonomy')->insert([

            'term_id' => $term_id1,
            'taxonomy' => 'Car Type',
            'description' => 'Bus',
            'count' => 0
        ]);

        /* Car Type Table END */

        /* Manufacturer Table START */
        $term_id2 = DB::table('terms')->insertGetId([
            'name' => 'Toyota',
            'slug' => 'Toyota',
        ]);
        DB::table('term_taxonomy')->insert([

            'term_id' => $term_id2,
            'taxonomy' => 'Manufacturer',
            'description' => 'Toyota',
            'count' => 0
        ]);
        $term_id2 = DB::table('terms')->insertGetId([
            'name' => 'Lexus',
            'slug' => 'Lexus',
        ]);
        DB::table('term_taxonomy')->insert([

            'term_id' => $term_id2,
            'taxonomy' => 'Manufacturer',
            'description' => 'Lexus',
            'count' => 0
        ]);
        $term_id2 = DB::table('terms')->insertGetId([
            'name' => 'Nissan',
            'slug' => 'Nissan',
        ]);
        DB::table('term_taxonomy')->insert([

            'term_id' => $term_id2,
            'taxonomy' => 'Manufacturer',
            'description' => 'Nissan',
            'count' => 0
        ]);
        $term_id2 = DB::table('terms')->insertGetId([
            'name' => 'Mercedes-benz',
            'slug' => 'Mercedes-benz',
        ]);
        DB::table('term_taxonomy')->insert([

            'term_id' => $term_id2,
            'taxonomy' => 'Manufacturer',
            'description' => 'Mercedes-benz',
            'count' => 0
        ]);
        $term_id2 = DB::table('terms')->insertGetId([
            'name' => 'Volkswagen',
            'slug' => 'Volkswagen',
        ]);
        DB::table('term_taxonomy')->insert([

            'term_id' => $term_id2,
            'taxonomy' => 'Manufacturer',
            'description' => 'Volkswagen',
            'count' => 0
        ]);
        $term_id2 = DB::table('terms')->insertGetId([
            'name' => 'Mini',
            'slug' => 'Mini',
        ]);
        DB::table('term_taxonomy')->insert([

            'term_id' => $term_id2,
            'taxonomy' => 'Manufacturer',
            'description' => 'Mini',
            'count' => 0
        ]);
        $term_id2 = DB::table('terms')->insertGetId([
            'name' => 'Audi',
            'slug' => 'Audi',
        ]);
        DB::table('term_taxonomy')->insert([

            'term_id' => $term_id2,
            'taxonomy' => 'Manufacturer',
            'description' => 'Audi',
            'count' => 0
        ]);
        $term_id2 = DB::table('terms')->insertGetId([
            'name' => 'BMW',
            'slug' => 'BMW',
        ]);
        DB::table('term_taxonomy')->insert([

            'term_id' => $term_id2,
            'taxonomy' => 'Manufacturer',
            'description' => 'BMW',
            'count' => 0
        ]);
        $term_id2 = DB::table('terms')->insertGetId([
            'name' => 'Ford',
            'slug' => 'Ford',
        ]);
        DB::table('term_taxonomy')->insert([

            'term_id' => $term_id2,
            'taxonomy' => 'Manufacturer',
            'description' => 'Ford',
            'count' => 0
        ]);
        $term_id2 = DB::table('terms')->insertGetId([
            'name' => 'Land Rover',
            'slug' => 'Land Rover',
        ]);
        DB::table('term_taxonomy')->insert([

            'term_id' => $term_id2,
            'taxonomy' => 'Manufacturer',
            'description' => 'Land Rover',
            'count' => 0
        ]);
        $term_id2 = DB::table('terms')->insertGetId([
            'name' => 'Daihatsu',
            'slug' => 'Daihatsu',
        ]);
        DB::table('term_taxonomy')->insert([

            'term_id' => $term_id2,
            'taxonomy' => 'Manufacturer',
            'description' => 'Daihatsu',
            'count' => 0
        ]);
        $term_id2 = DB::table('terms')->insertGetId([
            'name' => 'Dodge',
            'slug' => 'Dodge',
        ]);
        DB::table('term_taxonomy')->insert([

            'term_id' => $term_id2,
            'taxonomy' => 'Manufacturer',
            'description' => 'Dodge',
            'count' => 0
        ]);
        $term_id2 = DB::table('terms')->insertGetId([
            'name' => 'Honda',
            'slug' => 'Honda',
        ]);
        DB::table('term_taxonomy')->insert([

            'term_id' => $term_id2,
            'taxonomy' => 'Manufacturer',
            'description' => 'Honda',
            'count' => 0
        ]);
        $term_id2 = DB::table('terms')->insertGetId([
            'name' => 'Hyundai',
            'slug' => 'Hyundai',
        ]);
        DB::table('term_taxonomy')->insert([

            'term_id' => $term_id2,
            'taxonomy' => 'Manufacturer',
            'description' => 'Hyundai',
            'count' => 0
        ]);
        $term_id2 = DB::table('terms')->insertGetId([
            'name' => 'Kia',
            'slug' => 'Kia',
        ]);
        DB::table('term_taxonomy')->insert([

            'term_id' => $term_id2,
            'taxonomy' => 'Manufacturer',
            'description' => 'Kia',
            'count' => 0
        ]);
        $term_id2 = DB::table('terms')->insertGetId([
            'name' => 'Jeep',
            'slug' => 'Jeep',
        ]);
        DB::table('term_taxonomy')->insert([

            'term_id' => $term_id2,
            'taxonomy' => 'Manufacturer',
            'description' => 'Jeep',
            'count' => 0
        ]);
        $term_id2 = DB::table('terms')->insertGetId([
            'name' => 'Subaru',
            'slug' => 'Subaru',
        ]);
        DB::table('term_taxonomy')->insert([

            'term_id' => $term_id2,
            'taxonomy' => 'Manufacturer',
            'description' => 'Subaru',
            'count' => 0
        ]);
        $term_id2 = DB::table('terms')->insertGetId([
            'name' => 'Suzuki',
            'slug' => 'Suzuki',
        ]);
        DB::table('term_taxonomy')->insert([

            'term_id' => $term_id2,
            'taxonomy' => 'Manufacturer',
            'description' => 'Suzuki',
            'count' => 0
        ]);
        /* Manufacturer Table END*/

        /* Fuel Table Start*/
        $term_id3 = DB::table('terms')->insertGetId([
            'name' => 'Gasoline',
            'slug' => 'Gasoline',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id3,
            'taxonomy' => 'Fuel',
            'description' => 'Gasoline',
            'count' => 0
        ]);
        $term_id3 = DB::table('terms')->insertGetId([
            'name' => 'Diesel',
            'slug' => 'Diesel',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id3,
            'taxonomy' => 'Fuel',
            'description' => 'Diesel',
            'count' => 0
        ]);
        $term_id3 = DB::table('terms')->insertGetId([
            'name' => 'LPG',
            'slug' => 'LPG',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id3,
            'taxonomy' => 'Fuel',
            'description' => 'LPG',
            'count' => 0
        ]);
        $term_id3 = DB::table('terms')->insertGetId([
            'name' => 'Gasoline + Electricity',
            'slug' => 'Gasoline + Electricity',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id3,
            'taxonomy' => 'Fuel',
            'description' => 'Gasoline + Electricity',
            'count' => 0
        ]);
        $term_id3 = DB::table('terms')->insertGetId([
            'name' => 'LPG + Electricity',
            'slug' => 'LPG + Electricity',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id3,
            'taxonomy' => 'Fuel',
            'description' => 'LPG + Electricity',
            'count' => 0
        ]);
        $term_id3 = DB::table('terms')->insertGetId([
            'name' => 'Gasoline + CNG',
            'slug' => 'Gasoline + CNG',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id3,
            'taxonomy' => 'Fuel',
            'description' => 'Gasoline + CNG',
            'count' => 0
        ]);
        $term_id3 = DB::table('terms')->insertGetId([
            'name' => 'Diesel + Electricity',
            'slug' => 'Diesel + Electricity',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id3,
            'taxonomy' => 'Fuel',
            'description' => 'Diesel + Electricity',
            'count' => 0
        ]);
        $term_id3 = DB::table('terms')->insertGetId([
            'name' => 'Electricity',
            'slug' => 'Electricity',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id3,
            'taxonomy' => 'Fuel',
            'description' => 'Electricity',
            'count' => 0
        ]);
        $term_id3 = DB::table('terms')->insertGetId([
            'name' => 'LNG',
            'slug' => 'LNG',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id3,
            'taxonomy' => 'Fuel',
            'description' => 'LNG',
            'count' => 0
        ]);
        /* Fuel Table END*/

        /* Transmission Table START */

        $term_id4 = DB::table('terms')->insertGetId([
            'name' => 'Auto',
            'slug' => 'Auto',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id4,
            'taxonomy' => 'Transmission',
            'description' => 'Auto',
            'count' => 0
        ]);
        $term_id4 = DB::table('terms')->insertGetId([
            'name' => 'Semi Auto',
            'slug' => 'Semi Auto',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id4,
            'taxonomy' => 'Transmission',
            'description' => 'Semi Auto',
            'count' => 0
        ]);
        $term_id4 = DB::table('terms')->insertGetId([
            'name' => 'Manual',
            'slug' => 'Manual',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id4,
            'taxonomy' => 'Transmission',
            'description' => 'Manual',
            'count' => 0
        ]);
        $term_id4 = DB::table('terms')->insertGetId([
            'name' => 'CVT',
            'slug' => 'CVT',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id4,
            'taxonomy' => 'Transmission',
            'description' => 'CVT',
            'count' => 0
        ]);

        /* Transmission Table END */

        /* Area Table START */

        $term_id7 = DB::table('terms')->insertGetId([
            'name' => 'Ulaanbaatar',
            'slug' => 'Ulaanbaatar',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id7,
            'taxonomy' => 'Area',
            'description' => 'Ulaanbaatar',
            'count' => 0
        ]);
        $term_id7 = DB::table('terms')->insertGetId([
            'name' => 'Darkhan',
            'slug' => 'Darkhan',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id7,
            'taxonomy' => 'Area',
            'description' => 'Darkhan',
            'count' => 0
        ]);
        $term_id7 = DB::table('terms')->insertGetId([
            'name' => 'Erdenet',
            'slug' => 'Erdenet',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id7,
            'taxonomy' => 'Area',
            'description' => 'Erdenet',
            'count' => 0
        ]);
        $term_id7 = DB::table('terms')->insertGetId([
            'name' => 'Arkhangai',
            'slug' => 'Arkhangai',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id7,
            'taxonomy' => 'Area',
            'description' => 'Arkhangai',
            'count' => 0
        ]);
        $term_id7 = DB::table('terms')->insertGetId([
            'name' => 'Bayan-Ulgii',
            'slug' => 'Bayan-Ulgii',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id7,
            'taxonomy' => 'Area',
            'description' => 'Bayan-Ulgii',
            'count' => 0
        ]);
        $term_id7 = DB::table('terms')->insertGetId([
            'name' => 'Bayankhongor',
            'slug' => 'Bayankhongor',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id7,
            'taxonomy' => 'Area',
            'description' => 'Bayankhongor',
            'count' => 0
        ]);
        $term_id7 = DB::table('terms')->insertGetId([
            'name' => 'Bulgan',
            'slug' => 'Bulgan',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id7,
            'taxonomy' => 'Area',
            'description' => 'Bulgan',
            'count' => 0
        ]);
        $term_id7 = DB::table('terms')->insertGetId([
            'name' => 'Gobi-Altai',
            'slug' => 'Gobi-Altai',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id7,
            'taxonomy' => 'Area',
            'description' => 'Gobi-Altai',
            'count' => 0
        ]);
        $term_id7 = DB::table('terms')->insertGetId([
            'name' => 'Gobisumber',
            'slug' => 'Gobisumber',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id7,
            'taxonomy' => 'Area',
            'description' => 'Gobisumber',
            'count' => 0
        ]);
        $term_id7 = DB::table('terms')->insertGetId([
            'name' => 'Darkhan-Uul',
            'slug' => 'Darkhan-Uul',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id7,
            'taxonomy' => 'Area',
            'description' => 'Darkhan-Uul',
            'count' => 0
        ]);
        $term_id7 = DB::table('terms')->insertGetId([
            'name' => 'Dornogobi',
            'slug' => 'Dornogobi',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id7,
            'taxonomy' => 'Area',
            'description' => 'Dornogobi',
            'count' => 0
        ]);
        $term_id7 = DB::table('terms')->insertGetId([
            'name' => 'Dornod',
            'slug' => 'Dornod',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id7,
            'taxonomy' => 'Area',
            'description' => 'Dornod',
            'count' => 0
        ]);
        $term_id7 = DB::table('terms')->insertGetId([
            'name' => 'Dundgobi',
            'slug' => 'Dundgobi',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id7,
            'taxonomy' => 'Area',
            'description' => 'Dundgobi',
            'count' => 0
        ]);
        $term_id7 = DB::table('terms')->insertGetId([
            'name' => 'Zavkhan',
            'slug' => 'Zavkhan',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id7,
            'taxonomy' => 'Area',
            'description' => 'Zavkhan',
            'count' => 0
        ]);
        $term_id7 = DB::table('terms')->insertGetId([
            'name' => 'Orkhon',
            'slug' => 'Orkhon',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id7,
            'taxonomy' => 'Area',
            'description' => 'Orkhon',
            'count' => 0
        ]);
        $term_id7 = DB::table('terms')->insertGetId([
            'name' => 'Uvurkhangai',
            'slug' => 'Uvurkhangai',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id7,
            'taxonomy' => 'Area',
            'description' => 'Uvurkhangai',
            'count' => 0
        ]);
        $term_id7 = DB::table('terms')->insertGetId([
            'name' => 'Umnugobi',
            'slug' => 'Umnugobi',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id7,
            'taxonomy' => 'Area',
            'description' => 'Umnugobi',
            'count' => 0
        ]);
        $term_id7 = DB::table('terms')->insertGetId([
            'name' => 'Sukhbaatar',
            'slug' => 'Sukhbaatar',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id7,
            'taxonomy' => 'Area',
            'description' => 'Sukhbaatar',
            'count' => 0
        ]);
        $term_id7 = DB::table('terms')->insertGetId([
            'name' => 'Selenge',
            'slug' => 'Selenge',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id7,
            'taxonomy' => 'Area',
            'description' => 'Selenge',
            'count' => 0
        ]);
        $term_id7 = DB::table('terms')->insertGetId([
            'name' => 'Tuv',
            'slug' => 'Tuv',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id7,
            'taxonomy' => 'Area',
            'description' => 'Tuv',
            'count' => 0
        ]);
        $term_id7 = DB::table('terms')->insertGetId([
            'name' => 'Uvs',
            'slug' => 'Uvs',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id7,
            'taxonomy' => 'Area',
            'description' => 'Uvs',
            'count' => 0
        ]);
        $term_id7 = DB::table('terms')->insertGetId([
            'name' => 'Khovd',
            'slug' => 'Khovd',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id7,
            'taxonomy' => 'Area',
            'description' => 'Khovd',
            'count' => 0
        ]);
        $term_id7 = DB::table('terms')->insertGetId([
            'name' => 'Khuvsgul',
            'slug' => 'Khuvsgul',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id7,
            'taxonomy' => 'Area',
            'description' => 'Khuvsgul',
            'count' => 0
        ]);
        $term_id7 = DB::table('terms')->insertGetId([
            'name' => 'Khentii',
            'slug' => 'Khentii',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id7,
            'taxonomy' => 'Area',
            'description' => 'Khentii',
            'count' => 0
        ]);

        /* Area Table END */

        /* Color Table START */

        $term_id2 = DB::table('terms')->insertGetId([
            'name' => 'White',
            'slug' => 'White',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id2,
            'taxonomy' => 'Color',
            'description' => 'White',
            'count' => 0
        ]);
        $term_id2 = DB::table('terms')->insertGetId([
            'name' => 'Black',
            'slug' => 'Black',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id2,
            'taxonomy' => 'Color',
            'description' => 'Black',
            'count' => 0
        ]);
        $term_id2 = DB::table('terms')->insertGetId([
            'name' => 'Rusty',
            'slug' => 'Rusty',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id2,
            'taxonomy' => 'Color',
            'description' => 'Rusty',
            'count' => 0
        ]);
        $term_id2 = DB::table('terms')->insertGetId([
            'name' => 'Pearl gray',
            'slug' => 'Pearl gray',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id2,
            'taxonomy' => 'Color',
            'description' => 'Pearl gray',
            'count' => 0
        ]);
        $term_id2 = DB::table('terms')->insertGetId([
            'name' => 'Silver',
            'slug' => 'Silver',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id2,
            'taxonomy' => 'Color',
            'description' => 'Silver',
            'count' => 0
        ]);

        /* Color Table END */

        /* Steering Wheel Table START */

        $term_id8 = DB::table('terms')->insertGetId([
            'name' => 'Right',
            'slug' => 'Right',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id8,
            'taxonomy' => 'Steering Wheel',
            'description' => 'Right',
            'count' => 0
        ]);
        $term_id8 = DB::table('terms')->insertGetId([
            'name' => 'Left',
            'slug' => 'Left',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id8,
            'taxonomy' => 'Steering Wheel',
            'description' => 'Left',
            'count' => 0
        ]);

        /* Steering Wheel Table END */

        /* An accident Table START */

        $term_id6 = DB::table('terms')->insertGetId([
            'name' => 'Unassuming',
            'slug' => 'Unassuming',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id6,
            'taxonomy' => 'An accident',
            'description' => 'Unassuming',
            'count' => 0
        ]);
        $term_id6 = DB::table('terms')->insertGetId([
            'name' => 'Simple exchange',
            'slug' => 'Simple exchange',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id6,
            'taxonomy' => 'An accident',
            'description' => 'Simple exchange',
            'count' => 0
        ]);
        $term_id6 = DB::table('terms')->insertGetId([
            'name' => 'Simple accident',
            'slug' => 'Simple accident',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id6,
            'taxonomy' => 'An accident',
            'description' => 'Simple accident',
            'count' => 0
        ]);

        /* An accident Table END */

        /* An accident Table START */

        $term_id6 = DB::table('terms')->insertGetId([
            'name' => 'Unassuming',
            'slug' => 'Unassuming',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id6,
            'taxonomy' => 'An accident',
            'description' => 'Unassuming',
            'count' => 0
        ]);
        $term_id6 = DB::table('terms')->insertGetId([
            'name' => 'Simple exchange',
            'slug' => 'Simple exchange',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id6,
            'taxonomy' => 'An accident',
            'description' => 'Simple exchange',
            'count' => 0
        ]);
        $term_id6 = DB::table('terms')->insertGetId([
            'name' => 'Simple accident',
            'slug' => 'Simple accident',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id6,
            'taxonomy' => 'An accident',
            'description' => 'Simple accident',
            'count' => 0
        ]);

        /* An accident Table END */

        /* Passenger Table START */

        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'Four seater',
            'slug' => 'Four seater',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Passenger',
            'description' => 'Four seater',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => '5 passengers',
            'slug' => '5 passengers',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Passenger',
            'description' => '5 passengers',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => '7 passengers',
            'slug' => '7 passengers',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Passenger',
            'description' => '7 passengers',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => '9 passengers',
            'slug' => '9 passengers',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Passenger',
            'description' => '9 passengers',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => '11 passengers',
            'slug' => '11 passengers',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Passenger',
            'description' => '11 passengers',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => '15 passengers',
            'slug' => '15 passengers',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Passenger',
            'description' => '15 passengers',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => '+ Direct input',
            'slug' => '+ Direct input',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Passenger',
            'description' => '+ Direct input',
            'count' => 0
        ]);


        /* Passenger Table END */

        /* Option Table START */

        /* exterior */
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'Sunroof',
            'slug' => 'Exterior',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'Sunroof',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'Aluminum wheel',
            'slug' => 'Exterior',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'Aluminum wheel',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => '4 season tire',
            'slug' => 'Exterior',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => '4 season tire',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'Electric folding side mirror',
            'slug' => 'Exterior',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'Electric folding side mirror',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'Rear wiper',
            'slug' => 'Exterior',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'Rear wiper',
            'count' => 0
        ]);

        /* guts */
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'Steering wheel remote control',
            'slug' => 'Guts',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'Steering wheel remote control',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'Power steering',
            'slug' => 'Guts',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'Power steering',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'Leather seat',
            'slug' => 'Guts',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'Leather seat',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'Electric seat : driver’s seat',
            'slug' => 'Guts',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'Electric seat : driver’s seat',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'Electric seat : Passenger seat',
            'slug' => 'Guts',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'Electric seat : Passenger seat',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'Heated Seat: Driver’s Seat',
            'slug' => 'Guts',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'Heated Seat: Driver’s Seat',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'Heated Seat: Rear Seat',
            'slug' => 'Guts',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'Heated Seat: Rear Seat',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'Memory seat : driver’s seat',
            'slug' => 'Guts',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'Memory seat : driver’s seat',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'Power Door lock',
            'slug' => 'Guts',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'Power Door lock',
            'count' => 0
        ]);

        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'Airbag : Driver’s seat',
            'slug' => 'Safety',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'Airbag : Driver’s seat',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'Airbag : Passenger’s seat',
            'slug' => 'Safety',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'Airbag : Passenger’s seat',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'Airbag : Side',
            'slug' => 'Safety',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'Airbag : Side',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'Airbag : Side',
            'slug' => 'Safety',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'Airbag : Side',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'Airbag : Curtains',
            'slug' => 'Safety',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'Airbag : Curtains',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'Camera : Front',
            'slug' => 'Safety',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'Camera : Front',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'Camera : Rear',
            'slug' => 'Safety',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'Camera : Rear',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'Camera : Side',
            'slug' => 'Safety',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'Camera : Side',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'Parking Sense : rear',
            'slug' => 'Safety',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'Parking Sense : rear',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'Parking sense : Front',
            'slug' => 'Safety',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'Parking sense : Front',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'ABS',
            'slug' => 'Safety',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'ABS',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'Electric parking brake',
            'slug' => 'Safety',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'Electric parking brake',
            'count' => 0
        ]);

        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'Smart Key',
            'slug' => 'Convenience',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'Smart Key',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'Cruise control',
            'slug' => 'Convenience',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'Cruise control',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'Auto air conditioner',
            'slug' => 'Convenience',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'Auto air conditioner',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'Power window',
            'slug' => 'Convenience',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'Power window',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'CD player',
            'slug' => 'Convenience',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'CD player',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'Navigation',
            'slug' => 'Convenience',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'Navigation',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'USB Terminal',
            'slug' => 'Convenience',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'USB Terminal',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'AUX terminal',
            'slug' => 'Convenience',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'AUX terminal',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'Bluetooth',
            'slug' => 'Convenience',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'Bluetooth',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'Auto light',
            'slug' => 'Convenience',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'Auto light',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'Rain senser',
            'slug' => 'Convenience',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'Rain senser',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'AV monitor : Front',
            'slug' => 'Convenience',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'AV monitor : Front',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'AV monitor : Rear',
            'slug' => 'Convenience',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'AV monitor : Rear',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'Blinder : rear',
            'slug' => 'Convenience',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'Blinder : rear',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'Black box',
            'slug' => 'Convenience',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'Black box',
            'count' => 0
        ]);

        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'One person drive',
            'slug' => 'Clean',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'One person drive',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'No smoking',
            'slug' => 'Clean',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'No smoking',
            'count' => 0
        ]);
        $term_id5 = DB::table('terms')->insertGetId([
            'name' => 'Woman driver',
            'slug' => 'Clean',
        ]);
        DB::table('term_taxonomy')->insert([
            'term_id' => $term_id5,
            'taxonomy' => 'Option',
            'description' => 'Woman driver',
            'count' => 0
        ]);

        /* Option Table END */

        /* Model Table START */

        $toyota = ['4Runner', 'Allion', 'Alphard', 'Aqua', 'Auris', 'Avensis', 'Belta', 'Brevis', 'Camry', 'Carina', 'Chaser', 'Corolla', 'Corolla Axio', 'Corolla Fielder', 'Corolla Rumion', 
        'Corolla Runx','Corolla Spacio', 'Crown-150', 'Crown-170', 'Crown-180', 'Crown-200', 'Crown Majesta', 'Estima', 'Fortuner', 'Gaia', 'Harrier', 'Hiace', 'Highlander', 
        'Hilux', 'Ipsum', 'Isis', 'Ist', 'Kluger', 'Land Cruiser-100', 'Land Cruiser-105', 'Land Cruiser-200', 'Land Cruiser-70', 'Land Cruiser-80', 'Land Cruiser Cygnus', 
        'Land Cruiser Prado-120', 'Land Cruiser Prado-150', 'Land Cruiser Prado-95', 'Mark2-100', 'Mark2-110', 'Mark X', 'Mark X Zio', 'Noah', 'Passo', 'Passo Settle', 
        'Premio', 'Prius-10', 'Prius-11', 'Prius-20', 'Prius-30', 'Prius-41 Alpha', 'Probox', 'Progres', 'Ractis', 'Raum','Rav4', 'Rush', 'Sai', 'Sienta', 'Succeed', 'Tacoma', 
        'Tundra', 'Vanguard', 'Vellfire', 'Venza', 'Verossa', 'Vitz', 'Voxy', 'Wish'];

        foreach($toyota as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Toyota',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'count' => 0
            ]);
        }

        $Nissan = ['Nissan Patrol/Safari ', 'Nissan Skyline ', 'Nissan Caravan', 'Nissan Pulsar', 'Nissan Maxima', 'Nissan Prairie', 'Nissan Atlas', 'Nissan Micra ', 'Nissan Sentra', 'Nissan Urvan', 'Nissan Pathfinder ',
        'Nissan Cima ', 'Nissan Serena ', 'Nissan Altima', 'Nissan Cube', 'Nissan Elgrand', 'Nissan Navara/Frontier', 'Nissan Sylphy', 'Nissan X-Trail', 'Nissan Murano', 'Nissan Teana', 'Nissan Armada ',
        'Nissan Fuga ', 'Nissan Lafesta', 'Nissan Titan', 'Nissan Note', 'Nissan Livina', 'Nissan Clipper', 'Nissan Latio', 'Nissan Qashqai', 'Nissan Rogue', 'Nissan Versa', 'Nissan GT-R', 'Nissan 370Z Z34 ',
        'Nissan Leaf', 'Nissan NV200', 'Nissan Juke', 'Nissan NV400 ', 'Nissan NV', 'Nissan NV100', 'Nissan NV350', 'Nissan Dayz ', 'Nissan Dayz Roox ', 'Nissan NV300 ', 'Nissan Kicks', 'Nissan Terra'];

        foreach($Nissan as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Nissan',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'count' => 0
            ]);
        }
        

        /* Model Table END */
    }
}
