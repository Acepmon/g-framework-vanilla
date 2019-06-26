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
                'key' => 'plugins.development.path',
                'value' => '' . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'plugins',
                'autoload' => true
            ],
            [
                'title' => 'Plugin Download Path',
                'description' => '',
                'key' => 'plugins.storage.path',
                'value' => '' . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'plugins',
                'autoload' => true
            ],
            [
                'title' => 'Plugin Install Path',
                'description' => '',
                'key' => 'plugins.install.path',
                'value' => '' . DIRECTORY_SEPARATOR . 'plugins',
                'autoload' => true
            ],
            [
                'title' => 'Content posts root path',
                'description' => '',
                'key' => 'content.posts.rootPath',
                'value' => '' . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'contents' . DIRECTORY_SEPARATOR . 'posts',
                'autoload' => true
            ],
            [
                'title' => 'Content posts view path',
                'description' => '',
                'key' => 'content.posts.viewPath',
                'value' => 'admin.contents.posts',
                'autoload' => true
            ],
            [
                'title' => 'Content pages root path',
                'description' => '',
                'key' => 'content.pages.rootPath',
                'value' => '' . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'contents' . DIRECTORY_SEPARATOR . 'pages',
                'autoload' => true
            ],
            [
                'title' => 'Content pages view path',
                'description' => '',
                'key' => 'content.pages.viewPath',
                'value' => 'admin.contents.pages',
                'autoload' => true
            ],
        ]);
    }
}
