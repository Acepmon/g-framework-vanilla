<?php

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            // user CRUD
            ['title' => 'admin_users_create', 'type' => 'create', 'description' => 'create permission for user'],
            ['title' => 'admin_users_read', 'type' => 'read', 'description' => 'read permission for user'],
            ['title' => 'admin_users_update', 'type' => 'update', 'description' => 'update permission for user'],
            ['title' => 'admin_users_delete', 'type' => 'delete', 'description' => 'delete permission for user'],
            // profile CRUD
            ['title' => 'admin_profile_create', 'type' => 'create', 'description' => 'create permission for profile'],
            ['title' => 'admin_profile_read', 'type' => 'read', 'description' => 'read permission for profile'],
            ['title' => 'admin_profile_update', 'type' => 'update', 'description' => 'update permission for profile'],
            ['title' => 'admin_profile_delete', 'type' => 'delete', 'description' => 'delete permission for profile'],
            // config CRUD
            ['title' => 'admin_configs_create', 'type' => 'create', 'description' => 'create permission for config'],
            ['title' => 'admin_configs_read', 'type' => 'read', 'description' => 'read permission for config'],
            ['title' => 'admin_configs_update', 'type' => 'update', 'description' => 'update permission for config'],
            ['title' => 'admin_configs_delete', 'type' => 'delete', 'description' => 'delete permission for config'],
            // log CRUD
            ['title' => 'admin_logs_create', 'type' => 'create', 'description' => 'create permission for log'],
            ['title' => 'admin_logs_read', 'type' => 'read', 'description' => 'read permission for log'],
            ['title' => 'admin_logs_update', 'type' => 'update', 'description' => 'update permission for log'],
            ['title' => 'admin_logs_delete', 'type' => 'delete', 'description' => 'delete permission for log'],
            // media CRUD
            ['title' => 'admin_media_create', 'type' => 'create', 'description' => 'create permission for media'],
            ['title' => 'admin_media_read', 'type' => 'read', 'description' => 'read permission for media'],
            ['title' => 'admin_media_update', 'type' => 'update', 'description' => 'update permission for media'],
            ['title' => 'admin_media_delete', 'type' => 'delete', 'description' => 'delete permission for media'],
            // notification CRUD
            ['title' => 'admin_notifications_create', 'type' => 'create', 'description' => 'create permission for notification'],
            ['title' => 'admin_notifications_read', 'type' => 'read', 'description' => 'read permission for notification'],
            ['title' => 'admin_notifications_update', 'type' => 'update', 'description' => 'update permission for notification'],
            ['title' => 'admin_notifications_delete', 'type' => 'delete', 'description' => 'delete permission for notification'],
            // menu CRUD
            ['title' => 'admin_menus_create', 'type' => 'create', 'description' => 'create permission for menu'],
            ['title' => 'admin_menus_read', 'type' => 'read', 'description' => 'read permission for menu'],
            ['title' => 'admin_menus_update', 'type' => 'update', 'description' => 'update permission for menu'],
            ['title' => 'admin_menus_delete', 'type' => 'delete', 'description' => 'delete permission for menu'],
            // permission CRUD
            ['title' => 'admin_permissions_create', 'type' => 'create', 'description' => 'create permission for permission'],
            ['title' => 'admin_permissions_read', 'type' => 'read', 'description' => 'read permission for permission'],
            ['title' => 'admin_permissions_update', 'type' => 'update', 'description' => 'update permission for permission'],
            ['title' => 'admin_permissions_delete', 'type' => 'delete', 'description' => 'delete permission for permission'],
            // backup CRUD
            ['title' => 'admin_backups_create', 'type' => 'create', 'description' => 'create permission for backup'],
            ['title' => 'admin_backups_read', 'type' => 'read', 'description' => 'read permission for backup'],
            ['title' => 'admin_backups_update', 'type' => 'update', 'description' => 'update permission for backup'],
            ['title' => 'admin_backups_delete', 'type' => 'delete', 'description' => 'delete permission for backup'],
            // plugin CRUD
            ['title' => 'admin_plugins_create', 'type' => 'create', 'description' => 'create permission for plugin'],
            ['title' => 'admin_plugins_read', 'type' => 'read', 'description' => 'read permission for plugin'],
            ['title' => 'admin_plugins_update', 'type' => 'update', 'description' => 'update permission for plugin'],
            ['title' => 'admin_plugins_delete', 'type' => 'delete', 'description' => 'delete permission for plugin'],
            // theme CRUD
            ['title' => 'admin_themes_create', 'type' => 'create', 'description' => 'create permission for theme'],
            ['title' => 'admin_themes_read', 'type' => 'read', 'description' => 'read permission for theme'],
            ['title' => 'admin_themes_update', 'type' => 'update', 'description' => 'update permission for theme'],
            ['title' => 'admin_themes_delete', 'type' => 'delete', 'description' => 'delete permission for theme'],
            // group CRUD
            ['title' => 'admin_groups_create', 'type' => 'create', 'description' => 'create permission for group'],
            ['title' => 'admin_groups_read', 'type' => 'read', 'description' => 'read permission for group'],
            ['title' => 'admin_groups_update', 'type' => 'update', 'description' => 'update permission for group'],
            ['title' => 'admin_groups_delete', 'type' => 'delete', 'description' => 'delete permission for group'],
            // content CRUD
            ['title' => 'admin_contents_create', 'type' => 'create', 'description' => 'create permission for content'],
            ['title' => 'admin_contents_read', 'type' => 'read', 'description' => 'read permission for content'],
            ['title' => 'admin_contents_update', 'type' => 'update', 'description' => 'update permission for content'],
            ['title' => 'admin_contents_delete', 'type' => 'delete', 'description' => 'delete permission for content'],
            // comment CRUD
            ['title' => 'admin_comments_create', 'type' => 'create', 'description' => 'create permission for comment'],
            ['title' => 'admin_comments_read', 'type' => 'read', 'description' => 'read permission for comment'],
            ['title' => 'admin_comments_update', 'type' => 'update', 'description' => 'update permission for comment'],
            ['title' => 'admin_comments_delete', 'type' => 'delete', 'description' => 'delete permission for comment'],
            // taxonomy CRUD
            ['title' => 'admin_taxonomy_create', 'type' => 'create', 'description' => 'create permission for taxonomy'],
            ['title' => 'admin_taxonomy_read', 'type' => 'read', 'description' => 'read permission for taxonomy'],
            ['title' => 'admin_taxonomy_update', 'type' => 'update', 'description' => 'update permission for taxonomy'],
            ['title' => 'admin_taxonomy_delete', 'type' => 'delete', 'description' => 'delete permission for taxonomy'],
            // others
            ['title' => 'admin_dashboard', 'type' => 'read', 'description' => 'read permission for dashboard'],
            ['title' => 'admin_changelog_read', 'type' => 'read', 'description' => 'read permission for changelog_read'],
            ['title' => 'admin_configs_maintenance', 'type' => 'read', 'description' => 'read permission for configs_maintenance'],
            ['title' => 'admin_configs_base', 'type' => 'read', 'description' => 'read permission for configs_base'],
            ['title' => 'admin_configs_system', 'type' => 'read', 'description' => 'read permission for configs_system'],
            ['title' => 'admin_configs_themes', 'type' => 'read', 'description' => 'read permission for configs_themes'],
            ['title' => 'admin_configs_plugins', 'type' => 'read', 'description' => 'read permission for configs_plugins'],
            ['title' => 'admin_configs_security', 'type' => 'read', 'description' => 'read permission for configs_security'],
            ['title' => 'admin_configs_contents', 'type' => 'read', 'description' => 'read permission for configs_contents'],
            ['title' => 'admin_notifications_channels', 'type' => 'read', 'description' => 'read permission for notifications_channels'],
            ['title' => 'admin_notifications_triggers', 'type' => 'read', 'description' => 'read permission for notifications_triggers'],
            ['title' => 'admin_notifications_events', 'type' => 'read', 'description' => 'read permission for notifications_events'],
            ['title' => 'admin_notifications_templates', 'type' => 'read', 'description' => 'read permission for notifications_templates'],
            ['title' => 'admin_users_contents_read', 'type' => 'read', 'description' => 'read permission for users_contents_read'],
            ['title' => 'admin_users_permissions_read', 'type' => 'read', 'description' => 'read permission for users_permissions_read'],
            ['title' => 'admin_users_settings_read', 'type' => 'read', 'description' => 'read permission for users_settings_read'],
            ['title' => 'admin_profile_contents_read', 'type' => 'read', 'description' => 'read permission for profile_contents_read'],
            ['title' => 'admin_profile_permissions_read', 'type' => 'read', 'description' => 'read permission for profile_permissions_read'],
            ['title' => 'admin_profile_settings_read', 'type' => 'read', 'description' => 'read permission for profile_settings_read'],
            ['title' => 'admin_profile_notifications_read', 'type' => 'read', 'description' => 'read permission for profile_notifications_read'],
        ]);
        App\Group::findOrFail(1)->permissions()->attach(App\Permission::all(), array('is_granted' => true));
    }
}
