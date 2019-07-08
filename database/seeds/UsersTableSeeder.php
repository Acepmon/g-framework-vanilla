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
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('user_group')->insert([
            'user_id' => 1,
            'group_id' => 1
        ]);

        factory(App\User::class, 500)->create()->each(function ($user) {
            // $user->posts()->save(factory(App\Post::class)->make());
            $user->groups()->attach(3);

            for ($i=0; $i < rand(0, 5); $i++) {
                $user->groups()->attach(rand(4, \App\Group::where('type', \App\Group::TYPE_STATIC)->count() + 3));
            }
        });
    }
}
