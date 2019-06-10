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
            'name' => 'Administrator',
            'language' => 'en'
        ]);

        DB::table('user_group')->insert([
            'user_id' => 1,
            'group_id' => 1
        ]);
    }
}
