<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\User;
use App\UserMeta;
use App\Group;

class CarUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        factory(User::class, 1)->create()->each(function ($user) {
            $carGroups = Group::where('type', Group::TYPE_DYNAMIC)->get();

            $user->metas()->saveMany([
                new UserMeta(['key' => 'type', 'value' => 'Damoa']),
                new UserMeta(['key' => 'phone', 'value' => '99119922']),
            ]);
        });
    }
}
