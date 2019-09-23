<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Permission;
use App\Group;
use DB;

class CarPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('permissions')->insert([
            // car CRUD
            ['title' => 'admin_cars_create', 'type' => Permission::TYPE_CREATE, 'description' => 'create permission for car'],
            ['title' => 'admin_cars_read', 'type' => Permission::TYPE_READ, 'description' => 'read permission for car'],
            ['title' => 'admin_cars_update', 'type' => Permission::TYPE_UPDATE, 'description' => 'update permission for car'],
            ['title' => 'admin_cars_delete', 'type' => Permission::TYPE_DELETE, 'description' => 'delete permission for car'],
            // car specials CRUD
            ['title' => 'admin_cars_specials_create', 'type' => Permission::TYPE_CREATE, 'description' => 'create permission for car specials'],
            ['title' => 'admin_cars_specials_read', 'type' => Permission::TYPE_READ, 'description' => 'read permission for car specials'],
            ['title' => 'admin_cars_specials_update', 'type' => Permission::TYPE_UPDATE, 'description' => 'update permission for car specials'],
            ['title' => 'admin_cars_specials_delete', 'type' => Permission::TYPE_DELETE, 'description' => 'delete permission for car specials'],
            // car options CRUD
            ['title' => 'admin_cars_options_create', 'type' => Permission::TYPE_CREATE, 'description' => 'create permission for car options'],
            ['title' => 'admin_cars_options_read', 'type' => Permission::TYPE_READ, 'description' => 'read permission for car options'],
            ['title' => 'admin_cars_options_update', 'type' => Permission::TYPE_UPDATE, 'description' => 'update permission for car options'],
            ['title' => 'admin_cars_options_delete', 'type' => Permission::TYPE_DELETE, 'description' => 'delete permission for car options'],
        ]);

        // Admin Permissions
        Group::findOrFail(1)->permissions()->attach(Permission::where('title', 'LIKE', 'admin_cars_%')->get(), ['is_granted' => true]);
    }
}
