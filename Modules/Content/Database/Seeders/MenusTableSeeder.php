<?php

namespace Modules\Content\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\MenuManager;

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

        MenuManager::register('Pages', '/admin/contents?type=page', [
            'parent_id' => $parent_id,
            'module' => 'Content',
            'group' => [1, 2],
            'icon' => 'icon-files-empty2'
        ]);
        MenuManager::register('Blog Posts', '/admin/contents?type=post', [
            'parent_id' => $parent_id,
            'module' => 'Content',
            'group' => [1, 2],
            'icon' => 'icon-blog'
        ]);
        MenuManager::register('Media', '/admin/media', [
            'parent_id' => $parent_id,
            'module' => 'Content',
            'group' => [1, 2],
            'icon' => 'icon-media'
        ]);
        MenuManager::register('Localization', '/admin/localizations', [
            'parent_id' => $parent_id,
            'module' => 'Content',
            'group' => [1, 2],
            'icon' => 'icon-sphere'
        ]);
        MenuManager::register('Categories', '/admin/taxonomy?taxonomy=category', [
            'parent_id' => $parent_id,
            'module' => 'Content',
            'group' => [1, 2],
            'icon' => 'icon-grid6'
        ]);
        MenuManager::register('Tags', '/admin/taxonomy?taxonomy=tag', [
            'parent_id' => $parent_id,
            'module' => 'Content',
            'group' => [1, 2],
            'icon' => 'icon-price-tag2'
        ]);
    }
}
