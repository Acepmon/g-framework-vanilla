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
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin')
        ]);

        DB::table('profiles')->insert([
            'user_id' => 1,
            'role_id' => 1,
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'avatar' => '/assets/images/placeholder.jpg',
            'language' => 'en'
        ]);
    }
}
