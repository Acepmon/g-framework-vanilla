<?php

use Illuminate\Database\Seeder;

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
                'title' => 'Limitless',
                'description' => 'Responsive Web Application Kit',
                'repository' => 'https://github.com/acepmon/g-framework-limitless/archive/master.zip',
                'version' => '2.2',
                'status' => \App\Theme::AVAILABLE
            ],
            [
                'title' => 'Canvas',
                'description' => 'The Multi-Purpose HTML5 Template',
                'repository' => 'https://github.com/acepmon/g-framework-canvas/archive/master.zip',
                'version' => '5.9',
                'status' => \App\Theme::AVAILABLE
            ],
            [
                'title' => 'Future Imperfect',
                'description' => 'Another Fine Responsive Site Template by HTML5 UP',
                'repository' => 'https://github.com/acepmon/g-framework-future-imperfect/archive/master.zip',
                'version' => '1.0',
                'status' => \App\Theme::AVAILABLE
            ]
        ]);
    }
}
