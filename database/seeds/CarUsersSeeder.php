<?php

use Illuminate\Database\Seeder;

class CarUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 100)->create()->each(function ($user) {
            $carGroups = \App\Group::where('type', \App\Group::TYPE_DYNAMIC)->get();
            $randomGroup = $carGroups->random();
            $randomGroupId = $randomGroup->id;

            $user->groups()->attach($randomGroupId);

            $user->metas()->saveMany([
                new App\UserMeta(['key' => 'type', 'value' => $randomGroup->title]),
                new App\UserMeta(['key' => 'phone', 'value' => '+976 88206116']),
            ]);
        });
    }
}
