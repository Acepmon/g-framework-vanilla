<?php

use Illuminate\Database\Seeder;

use App\Theme;

class ThemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('themes')->insert([
            [
                'package' => 'limitless',
                'title' => 'Limitless',
                'description' => 'Responsive Web Application Kit',
                'repository' => 'https://github.com/acepmon/g-framework-limitless/archive/master.zip',
                'version' => '2.2',
                'status' => Theme::INSTALLED
            ],
            [
                'package' => 'canvas',
                'title' => 'Canvas',
                'description' => 'The Multi-Purpose HTML5 Template',
                'repository' => 'https://github.com/acepmon/g-framework-canvas/archive/master.zip',
                'version' => '5.9',
                'status' => Theme::AVAILABLE
            ],
            [
                'package' => 'future-imperfect',
                'title' => 'Future Imperfect',
                'description' => 'Another Fine Responsive Site Template by HTML5 UP',
                'repository' => 'https://github.com/acepmon/g-framework-future-imperfect/archive/master.zip',
                'version' => '1.0',
                'status' => Theme::INSTALLED
            ],
            [
                'package' => 'car-web',
                'title' => 'Car Web',
                'description' => 'Web version of Car Dealership Template',
                'repository' => 'https://github.com/acepmon/carweb-theme/archive/master.zip',
                'version' => '1.0',
                'status' => Theme::INSTALLED
            ]
        ]);
    }
}
