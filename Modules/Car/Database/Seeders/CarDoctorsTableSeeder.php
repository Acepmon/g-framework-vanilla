<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarDoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctors = ['Баталгаажсан', 'Баталгаажаагүй'];
        foreach($doctors as &$doctor){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $doctor,
                'slug' => $doctor,
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Doctors Verified',
                'description' => $doctor,
                'count' => 0
            ]);
        }
    }
}
