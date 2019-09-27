<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\UserMeta;
use App\Content;

class CarInterestedCarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $users = User::all();
        $userInterestMin = 1;
        $userInterestMax = 10;

        foreach ($users as $index => $user) {
            $cars = Content::where('type', Content::TYPE_CAR)
                            ->where('status', Content::STATUS_PUBLISHED)
                            ->where('visibility', Content::VISIBILITY_PUBLIC)
                            ->select('id')
                            ->inRandomOrder()
                            ->take(rand($userInterestMin, $userInterestMax))
                            ->get()
                            ->transform(function ($item) {
                                return $item->id;
                            })
                            ->toArray();

            foreach ($cars as $car) {
                $user->metas()->save(new UserMeta(['key' => 'interestedCars', 'value' => $car]));
            }
        }
    }
}
