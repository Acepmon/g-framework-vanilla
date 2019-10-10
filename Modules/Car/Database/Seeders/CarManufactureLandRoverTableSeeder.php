<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarManufactureLandRoverTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $LandRover = ['Land Rover', 'Land Rover 101 Forward Control', 'Land Rover DC100', 'Land Rover Defender', 'Land Rover Defender (L663)', 'Land Rover Discovery', 'Land Rover Discovery Series I'
        , 'Land Rover Discovery Series II', 'Land Rover Discovery 3', 'Land Rover Discovery 4', 'Land Rover Discovery (L462)', 'Land Rover Discovery Sport', 'Land Rover Freelander'
        , 'Land Rover 1/2 ton Lightweight', 'Land Rover Discovery Sport (L550)', 'Land Rover Series II', 'Land Rover Series IIa', 'Land Rover Series III', 'Land Rover Llama'
        , 'Long Range Patrol Vehicle', 'Land Rover LR3', 'Land Rover LR4', 'Land Rover Perentie', 'Range Rover', 'Range Rover (L322)', 'Range Rover (L405)', 'Range Rover (P38A)'
        , 'Range Rover Classic', 'Range Rover Evoque', 'Range Rover Evoque (L538)', 'Range Rover Evoque (L551)', 'Range Rover Sport', 'Range Rover Sport (L320)', 'Range Rover Sport (L494)'
        , 'Range Rover Velar', 'Ranger Special Operations Vehicle', 'Land Rover series', 'Shorland armoured car', 'Snatch Land Rover', 'TACR2 (Range Rover)', 'Land Rover Tangi'
        , 'Land Rover Wolf'];

        foreach($LandRover as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'LandRover',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '25',
                'count' => 0
            ]);
        }
    }
}
