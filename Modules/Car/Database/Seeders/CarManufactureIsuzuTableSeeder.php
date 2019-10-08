<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarManufactureIsuzuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Isuzu = ['Isuzu 117 Coupé', 'Isuzu 810', 'Isuzu 4200R', 'Isuzu Amigo', 'Isuzu Ascender', 'Isuzu Aska', 'Isuzu Axiom', 'Isuzu Bellel', 'Isuzu Bellett Gemini', 'Isuzu Bellett', 'Isuzu Trooper'
        , 'Isuzu C-Series', 'Isuzu Como', 'Isuzu Cubic', 'Isuzu D-Max', 'Isuzu Duogongnengche', 'Isuzu Elf', 'Isuzu Fargo', 'Isuzu Faster', 'Isuzu Florian', 'Isuzu Forward', 'Isuzu Gala Mio'
        , 'Isuzu Geminett II', 'Isuzu Gemini', 'Isuzu Giga', 'Isuzu Grafter', 'Isuzu H-Series', 'Isuzu Heavy Duty', 'Isuzu Hillman Minx', 'Isuzu Hombre', 'Isuzu I-Mark', 'Isuzu i-Series'
        , 'Isuzu Impulse', 'Isuzu KB', 'Isuzu LB', 'Isuzu Leopard', 'Isuzu Lingqingka', 'Isuzu MU', 'Isuzu MU-7', 'Isuzu MU-X', 'Isuzu Oasis', 'Isuzu P up', 'Isuzu Panther', 'Isuzu Piazza'
        , 'Isuzu Pika', 'Isuzu Reach', 'Isuzu Rodeo', 'Isuzu Rodeo Denver', 'Saehan BL064', 'Isuzu Spark', 'Isuzu Statesman De Ville', 'Isuzu Tiejingang', 'Isuzu Traga', 'Isuzu VehiCROSS'
        , 'Isuzu Wasp', 'Isuzu WFR', 'Isuzu MU Wizard', 'Isuzu Wizard', 'Template:Isuzu cars timeline 1950–1979', 'Template:Isuzu modern timeline', 'Template:Isuzu United States'];

        foreach($Isuzu as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Isuzu',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '20',
                'count' => 0
            ]);
        }
    }
}
