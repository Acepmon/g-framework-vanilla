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
        if (Schema::hasTable('groups')) {
            DB::table('groups')->insert([
                [
                    "title" => "Administrator",
                    "description" => "Administrator is the most powerful user role and should rarely be assigned to any other account. If you give someone else this user role, you’re essentially giving them the keys to the castle.",
                    "type" => App\Group::TYPE_SYSTEM
                ],
                [
                    "title" => "Editor",
                    "description" => "As the name of this user role suggests, an editor is generally responsible for managing content and thus has a high level of access. They can create, edit, delete, and publish both pages and posts – even those belonging to other users.",
                    "type" => App\Group::TYPE_SYSTEM
                ],
                [
                    "title" => "Author",
                    "description" => "An author has far fewer permissions than editors. They cannot edit pages and are unable to alter other users’ content. In addition, they lack any sort of administrative capabilities.",
                    "type" => App\Group::TYPE_SYSTEM
                ],
                [
                    "title" => "Contributor",
                    "description" => "The contributor role is essentially a stripped-down version of the author role. A contributor perform only three tasks – reading all posts, as well as deleting and editing their own posts.",
                    "type" => App\Group::TYPE_SYSTEM
                ],
                [
                    "title" => "Subscriber",
                    "description" => "Subscribers have only one main capability and their dashboard is usually incredibly bare. They can read all posts on the site. Normally, anyone can read posts without being assigned a role, so not all sites will use this option.",
                    "type" => App\Group::TYPE_SYSTEM
                ],
                [
                    "title" => "Member",
                    "description" => "Essentially the most basic role of all. No special privileges are granted, only the basic requirements are added such as authentication, viewing public posts etc..",
                    "type" => App\Group::TYPE_SYSTEM
                ]
            ]);
        }
    }
}
