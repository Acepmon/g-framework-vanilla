<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
            'language' => 'en',
            'avatar' => 'https://i.pravatar.cc/100?img=' . rand(1, 70),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_group')->insert([
            'user_id' => 1,
            'group_id' => 1
        ]);
    }
}
