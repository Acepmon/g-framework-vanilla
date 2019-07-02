<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'name' => 'G-Framework',
            'language' => 'en'
        ]);

        DB::table('users')->insert([
            'username' => 'acep',
            'email' => 'dtsogtbayar123@gmail.com',
            'password' => Hash::make('acep123'),
            'name' => 'Acep',
            'language' => 'en'
        ]);

        DB::table('users')->insert([
            'username' => 'operator',
            'email' => 'operator@gmail.com',
            'password' => Hash::make('operator'),
            'name' => 'Operator',
            'language' => 'en'
        ]);

        DB::table('users')->insert([
            'username' => 'member',
            'email' => 'member@gmail.com',
            'password' => Hash::make('member'),
            'name' => 'Member',
            'language' => 'en'
        ]);

        DB::table('users')->insert([
            'username' => 'guest',
            'email' => 'guest@gmail.com',
            'password' => Hash::make('guest'),
            'name' => 'Guest',
            'language' => 'en'
        ]);

        DB::table('user_group')->insert([
            'user_id' => 1,
            'group_id' => 1
        ]);

        DB::table('user_group')->insert([
            'user_id' => 2,
            'group_id' => 1
        ]);

        DB::table('user_group')->insert([
            'user_id' => 3,
            'group_id' => 2
        ]);

        DB::table('user_group')->insert([
            'user_id' => 4,
            'group_id' => 3
        ]);

        DB::table('user_group')->insert([
            'user_id' => 5,
            'group_id' => 4
        ]);
    }
}
