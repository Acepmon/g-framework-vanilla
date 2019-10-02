<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

use App\Permission;
use App\Entities\PermissionManager;

class UserPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('users') && Schema::hasTable('permissions')) {
            //
        }
    }
}
