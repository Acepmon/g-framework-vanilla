<?php

use Illuminate\Database\Seeder;

use App\Entities\PermissionManager;

class AdminContentPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PermissionManager::newPermissionCrud('admin_menus');
        PermissionManager::newPermissionCrud('admin_menus_groups');
        PermissionManager::newReadPermission('admin_menus_tree');
        PermissionManager::newUpdatePermission('admin_menus_tree_update');

        PermissionManager::newPermissionCrud('admin_contents');
        PermissionManager::newPermissionCrud('admin_contents_metas');
        PermissionManager::newPermissionCrud('admin_contents_revisions');
        PermissionManager::newDeletePermission('admin_contents_revisions_revert');

        PermissionManager::newPermissionCrud('admin_comments');
        PermissionManager::newPermissionCrud('admin_comments_metas');

        PermissionManager::newPermissionCrud('admin_taxonomy');
        PermissionManager::newPermissionCrud('admin_taxonomy_metas');

        PermissionManager::newPermissionCrud('admin_localizations');

        PermissionManager::newPermissionCrud('admin_media');
        PermissionManager::newReadPermission('admin_media_medias');
        PermissionManager::newReadPermission('admin_media_avatars');
        PermissionManager::newReadPermission('admin_media_thumbnails');
        PermissionManager::newReadPermission('admin_media_assets');
        PermissionManager::newReadPermission('admin_media_upload');
    }
}
