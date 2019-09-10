<?php

use Illuminate\Database\Seeder;

class FileConfigsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('configs')->insert([
            [
                'title' => 'File Storage Host',
                'key' => 'content.storage.host',
                'value' => 'http://66.181.167.116',
                'autoload' => true
            ],
            [
                'title' => 'File System Port',
                'key' => 'content.storage.port',
                'value' => '3000',
                'autoload' => true
            ],
        ]);
    }
}
