<?php

namespace App\Entities;

use App\Permission;

class PermissionManager extends Manager
{
    public static function newPermission($title, $description, $type) {
        $permission = new Permission();
        $permission->title = $title;
        $permission->description = $description;
        $permission->type = $type;
        $permission->save();

        return $permission;
    }

    public static function newCreatePermission($title, $description = null) {
        $type = Permission::TYPE_CREATE;
        $description = isset($description) ? $description : $type . ' permission for ' . str_replace('_', ' ', $title);
        self::newPermission($title, $description, $type);
    }

    public static function newReadPermission($title, $description = null) {
        $type = Permission::TYPE_READ;
        $description = isset($description) ? $description : $type . ' permission for ' . str_replace('_', ' ', $title);
        self::newPermission($title, $description, $type);
    }

    public static function newUpdatePermission($title, $description = null) {
        $type = Permission::TYPE_UPDATE;
        $description = isset($description) ? $description : $type . ' permission for ' . str_replace('_', ' ', $title);
        self::newPermission($title, $description, $type);
    }

    public static function newDeletePermission($title, $description = null) {
        $type = Permission::TYPE_DELETE;
        $description = isset($description) ? $description : $type . ' permission for ' . str_replace('_', ' ', $title);
        self::newPermission($title, $description, $type);
    }

    public static function newOtherPermission($title, $description = null) {
        $type = Permission::TYPE_OTHER;
        $description = isset($description) ? $description : $type . ' permission for ' . str_replace('_', ' ', $title);
        self::newPermission($title, $description, $type);
    }

    public static function newPermissionCrud($crud) {
        foreach (Permission::TYPE_ARRAY as $type) {
            $title = $crud . '_' . $type;
            $description = $type . ' permission for ' . str_replace('_', ' ', $crud);
            self::newPermission($title, $description, $type);
        }
    }

    public static function attachGroupPermissions($groupId, $permissions = array()) {
        // @todo
    }

    public static function detachGroupPermissions($groupId) {
        // @todo
    }

    public static function attachUserPermissions($userId, $permissions = array()) {
        // @todo
    }

    public static function detachUserPermissions($userId) {
        // @todo
    }
}
