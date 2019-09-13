<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // System Groups
        if (Schema::hasTable('groups')) {
            DB::table('groups')->insert([
                [
                    "title" => "Administrator",
                    "description" => "Administrator is the most powerful user role and should rarely be assigned to any other account.",
                    "type" => App\Group::TYPE_SYSTEM
                ],
                [
                    "title" => "Operator",
                    "description" => "Operators are the sub-system management user. Who has carefully selected privileges and permissions to specific services.",
                    "type" => App\Group::TYPE_SYSTEM
                ],
                [
                    "title" => "Member",
                    "description" => "Essentially the most basic role of all. No special privileges are granted, only the basic requirements are added such as authentication, viewing public posts etc..",
                    "type" => App\Group::TYPE_SYSTEM
                ],
                [
                    "title" => "Guest",
                    "description" => "Non member entity who has brief access to some services for a temporary time. Any user who is not registered is considered 'guest' by default.",
                    "type" => App\Group::TYPE_SYSTEM
                ]
            ]);
        }
    }
}
