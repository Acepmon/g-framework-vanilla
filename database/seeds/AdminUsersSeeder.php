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

        DB::table('user_group')->insert([
            'user_id' => 1,
            'group_id' => 1
        ]);

        DB::table('user_group')->insert([
            'user_id' => 2,
            'group_id' => 1
        ]);
    }
}
