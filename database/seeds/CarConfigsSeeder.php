<?php

use Illuminate\Database\Seeder;

class CarConfigsSeeder extends Seeder
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
                'title' => 'Content cars root path',
                'key' => 'content.cars.rootPath',
                'value' => '' . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'pages',
                'autoload' => true
            ],
            [
                'title' => 'Content cars view path',
                'key' => 'content.cars.viewPath',
                'value' => 'pages',
                'autoload' => true
            ],
        ]);
    }
}
