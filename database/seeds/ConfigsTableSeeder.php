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
                'title' => 'Plugin Development Path',
                'description' => '',
                'key' => 'system.plugins.developmentPath',
                'value' => '/storage/app/plugins',
                'autoload' => true
            ],
            [
                'title' => 'Plugin Download Path',
                'description' => '',
                'key' => 'system.plugins.storagePath',
                'value' => '/storage/app/plugins',
                'autoload' => true
            ],
            [
                'title' => 'Plugin Install Path',
                'description' => '',
                'key' => 'system.plugins.installPath',
                'value' => '/plugins',
                'autoload' => true
            ]
        ]);
    }
}
