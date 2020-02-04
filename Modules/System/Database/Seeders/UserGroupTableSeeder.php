<?php

namespace Modules\System\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

use Modules\System\Entities\User;
use Modules\System\Entities\Group;

class UserGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('users') && Schema::hasTable('groups')) {
            // Attach Admin Group to Admin User
            User::where('username', 'admin')->first()->groups()->attach(Group::where('title', 'Administrator')->get());

            // Attach Operator, System Operator Group to System Operator User
            User::where('username', 'system')->first()->groups()->attach(Group::where('title', 'Operator')->get());
            User::where('username', 'system')->first()->groups()->attach(Group::where('title', 'System Operator')->get());

            // Attach Operator, Content Operator Group to Content Operator User
            User::where('username', 'content')->first()->groups()->attach(Group::where('title', 'Operator')->get());
            User::where('username', 'content')->first()->groups()->attach(Group::where('title', 'Content Operator')->get());
        }
    }
}
