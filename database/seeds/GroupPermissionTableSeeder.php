<?php

use Illuminate\Database\Seeder;

use App\Group;
use App\Permission;

class GroupPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin Permissions
        Group::findOrFail(1)->permissions()->attach(Permission::all(), ['is_granted' => true]);

        // Operator Permissions
        Group::findOrFail(2)->permissions()->attach(Permission::where('title', '')->get(), ['is_granted' => true]);
        Group::findOrFail(2)->permissions()->attach(Permission::where('title', 'logout')->get(), ['is_granted' => true]);
        Group::findOrFail(2)->permissions()->attach(Permission::where('title', 'register')->get(), ['is_granted' => true]);
        Group::findOrFail(2)->permissions()->attach(Permission::where('title', 'login')->get(), ['is_granted' => true]);
        Group::findOrFail(2)->permissions()->attach(Permission::where('title', 'LIKE', 'password_%')->get(), ['is_granted' => true]);
        Group::findOrFail(2)->permissions()->attach(Permission::where('title', 'LIKE', 'admin_contents_%')->get(), ['is_granted' => true]);
        Group::findOrFail(2)->permissions()->attach(Permission::where('title', 'LIKE', 'admin_menus_%')->get(), ['is_granted' => true]);
        Group::findOrFail(2)->permissions()->attach(Permission::where('title', 'LIKE', 'admin_profile_%')->get(), ['is_granted' => true]);

        // Member Permissions
        Group::findOrFail(3)->permissions()->attach(Permission::where('title', '')->get(), ['is_granted' => true]);
        Group::findOrFail(3)->permissions()->attach(Permission::where('title', 'logout')->get(), ['is_granted' => true]);
        Group::findOrFail(3)->permissions()->attach(Permission::where('title', 'register')->get(), ['is_granted' => true]);
        Group::findOrFail(3)->permissions()->attach(Permission::where('title', 'login')->get(), ['is_granted' => true]);
        Group::findOrFail(3)->permissions()->attach(Permission::where('title', 'LIKE', 'password_%')->get(), ['is_granted' => true]);
    }
}
