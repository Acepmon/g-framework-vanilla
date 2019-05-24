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
        //
        DB::table('users')->insert([
            'name' => 'John',
            'email' => 'john@example.com',
            'password' => 'johnny'
        ]);
        DB::table('users')->insert([
            'name' => 'Mary',
            'email' => 'Mary@example.com',
            'password' => 'kitty'
        ]);
        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => 'password123'
        ]);
        DB::table('users')->insert([
            'name' => 'Tee',
            'email' => 'tee@example.com',
            'password' => 'tyrannosaurus'
        ]);
    }
}
