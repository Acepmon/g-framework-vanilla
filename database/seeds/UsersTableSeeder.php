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
            $systemUsers = [
                [
                    'username' => 'admin',
                    'email' => 'admin@example.com',
                    'password' => Hash::make('admin'),
                    'name' => 'Administrator',
                    'language' => 'en',
                    'avatar' => asset('user.png'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ];
            $adminGroupId = 1;

            foreach ($systemUsers as $systemUser) {
                $user = new User();
                $user->username = $systemUser['username'];
                $user->email = $systemUser['email'];
                $user->password = $systemUser['password'];
                $user->name = $systemUser['name'];
                $user->language = $systemUser['language'];
                $user->avatar = $systemUser['avatar'];
                $user->created_at = $systemUser['created_at'];
                $user->updated_at = $systemUser['updated_at'];
                $user->save();

                $user->groups()->attach($adminGroupId);
            }
        }
    }
}
