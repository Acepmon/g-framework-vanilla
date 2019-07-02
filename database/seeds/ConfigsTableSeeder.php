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
                'key' => 'plugins.development.path',
                'value' => '' . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'plugins',
                'autoload' => true
            ],
            [
                'title' => 'Plugin Download Path',
                'key' => 'plugins.storage.path',
                'value' => '' . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'plugins',
                'autoload' => true
            ],
            [
                'title' => 'Plugin Install Path',
                'key' => 'plugins.install.path',
                'value' => '' . DIRECTORY_SEPARATOR . 'plugins',
                'autoload' => true
            ],
            [
                'title' => 'Content posts root path',
                'key' => 'content.posts.rootPath',
                'value' => '' . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'posts',
                'autoload' => true
            ],
            [
                'title' => 'Content posts view path',
                'key' => 'content.posts.viewPath',
                'value' => 'posts',
                'autoload' => true
            ],
            [
                'title' => 'Content pages root path',
                'key' => 'content.pages.rootPath',
                'value' => '' . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'pages',
                'autoload' => true
            ],
            [
                'title' => 'Content pages view path',
                'key' => 'content.pages.viewPath',
                'value' => 'pages',
                'autoload' => true
            ],
            [
                'title' => 'Current Admin Panel Theme',
                'key' => 'admin.theme.current',
                'value' => 'limitless',
                'autoload' => true
            ],
            [
                'title' => 'Default Group for newly registered Users',
                'key' => 'system.register.defaultGroup',
                'value' => '3',
                'autoload' => false
            ],
            [
                'title' => 'Redirect path for Administrator group after authentication',
                'key' => 'system.auth.adminRedirectPath',
                'value' => '/admin',
                'autoload' => false
            ],
            [
                'title' => 'Redirect path for Operator group after authentication',
                'key' => 'system.auth.operatorRedirectPath',
                'value' => '/admin',
                'autoload' => false
            ],
            [
                'title' => 'Redirect path for Member group after authentication',
                'key' => 'system.auth.memberRedirectPath',
                'value' => '/home',
                'autoload' => false
            ],
            [
                'title' => 'Redirect path for Guest group after authentication',
                'key' => 'system.auth.guestRedirectPath',
                'value' => '/home',
                'autoload' => false
            ],
            [
                'title' => 'Bitcoin is Volatile - Enabled',
                'key' => 'bitcoin.volatile.enabled',
                'value' => true,
                'autoload' => false
            ],
            [
                'title' => 'Bitcoin is Volatile - Path',
                'key' => 'bitcoin.volatile.path',
                'value' => url('assets/system/volatile.mp3'),
                'autoload' => false
            ]
        ]);
    }
}
