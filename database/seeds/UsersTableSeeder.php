<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('users')) {
            $adminGroupId = 1;
            $operatorGroupId = 2;
            $users = [
                // Super Admin
                [
                    'username' => 'acep',
                    'email' => 'dtsogtbayar123@gmail.com',
                    'password' => Hash::make('acep'),
                    'name' => 'Acep Mon',
                    'group_id' => $adminGroupId
                ],

                // System Operator
                [
                    'username' => 'system',
                    'email' => 'system@example.com',
                    'password' => Hash::make('system'),
                    'name' => 'System Operator',
                    'group_id' => $operatorGroupId
                ],

                // Content Operator
                [
                    'username' => 'content',
                    'email' => 'content@example.com',
                    'password' => Hash::make('content'),
                    'name' => 'Content Operator',
                    'group_id' => $operatorGroupId
                ]
            ];

            foreach ($users as $user) {
                $this->createUser($user, $user['group_id']);
            }
        }
    }

    private function createUser($data, $groupId) {
        $user = new User();
        $user->username = $data['username'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->name = $data['name'];
        $user->language = 'en';
        $user->avatar = null;
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->groups()->attach($groupId);
    }
}
