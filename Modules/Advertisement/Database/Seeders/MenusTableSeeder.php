<?php

namespace Modules\Advertisement\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Managers\MenuManager;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $parent_id = MenuManager::search(['link' => '/admin'])->first()->id;

        MenuManager::register('Banners', '/admin/banners', [
            'parent_id' => $parent_id,
            'module' => 'Advertisement',
            'group' => [1, 2],
            'icon' => 'icon-printer4'
        ]);
        MenuManager::register('Create Banner', '/admin/banners/create', [
            'parent_id' => $parent_id,
            'module' => 'Advertisement',
            'group' => [1, 2],
            'icon' => 'icon-plus3'
        ]);
    }
}
