<?php

use Illuminate\Database\Seeder;

class ConfigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configs')->insert([
            [
                'title' => '',
                'description' => '',
                'key' => '',
                'value' => '',
                'autoload' => false
            ]
        ])
    }
}
