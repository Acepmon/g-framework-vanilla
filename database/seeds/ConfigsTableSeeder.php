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
                'title' => 'Plugin Storage Path',
                'key' => 'plugins.install.storagePath',
                'value' => storage_path('app' . DIRECTORY_SEPARATOR . 'plugins'),
                'autoload' => true
            ],
            [
                'title' => 'Plugin Apps Install Path',
                'key' => 'plugins.install.appPath',
                'value' => app_path('Plugins'),
                'autoload' => true
            ],
            [
                'title' => 'Plugin Databases Install Path',
                'key' => 'plugins.install.databasePath',
                'value' => database_path(),
                'autoload' => true
            ],
            [
                'title' => 'Theme Storage Path',
                'key' => 'themes.install.storagePath',
                'value' => storage_path('app' . DIRECTORY_SEPARATOR . 'themes'),
                'autoload' => true
            ],
            [
                'title' => 'Theme Assets Install Path',
                'key' => 'themes.install.assetPath',
                'value' => public_path(config('app.asset_url')),
                'autoload' => true
            ],
            [
                'title' => 'Theme Views Install Path',
                'key' => 'themes.install.viewPath',
                'value' => resource_path('views' . DIRECTORY_SEPARATOR . 'themes'),
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
                'title' => 'Maintenance mode email notification addresses',
                'key' => 'system.maintenance.emails',
                'value' => '',
                'autoload' => false
            ]
        ]);
    }
}
