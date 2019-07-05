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
        //
        DB::table('permissions')->insert([
            'title' => 'admin_users_create',
            'type' => 'create',
            'description' => 'create permission for user',
        ]);
        DB::table('permissions')->insert([
            'title' => 'admin_users_read',
            'type' => 'create',
            'description' => 'create permission for user',
        ]);
        DB::table('permissions')->insert([
            'title' => 'admin_users_update',
            'type' => 'create',
            'description' => 'create permission for user',
        ]);
        DB::table('permissions')->insert([
            'title' => 'admin_users_delete',
            'type' => 'create',
            'description' => 'create permission for user',
        ]);
    }
}
