<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\User;
use App\UserMeta;
use App\Group;

class CarUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        factory(User::class, 100)->create()->each(function ($user) {
            $carGroups = Group::where('type', Group::TYPE_DYNAMIC)->get();
            $randomGroup = $carGroups->random();
            $randomGroupId = $randomGroup->id;

            $user->groups()->attach(3);
            $user->groups()->attach($randomGroupId);

            $user->metas()->saveMany([
                new UserMeta(['key' => 'type', 'value' => $randomGroup->title]),
                new UserMeta(['key' => 'phone', 'value' => '+976 88206116']),
            ]);
        });
    }
}
