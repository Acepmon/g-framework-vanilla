<?php

namespace Modules\Car\Database\Seeders;

use App\Banner;
use App\BannerLocation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class CarBannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $url = "https://picsum.photos/id/";

        // 1. Home Main Slider (650x650)
        factory(Banner::class, 3)->create([
            "location_id" => 1,
        ])->each(function ($banner) use ($url) {
            $banner->banner = $url . rand(1, 1000) . "/" . BannerLocation::find(1)->width . "/" . BannerLocation::find(1)->height;
            $banner->save();
        });

        // 2. Login Main Slider (650x650)
        factory(Banner::class, 3)->create([
            "location_id" => 2,
        ])->each(function ($banner) use ($url) {
            $banner->banner = $url . rand(1, 1000) . "/" . BannerLocation::find(2)->width . "/" . BannerLocation::find(2)->height;
            $banner->save();
        });

        // 3. Finance Main Slider (650x650)
        factory(Banner::class, 3)->create([
            "location_id" => 3,
        ])->each(function ($banner) use ($url) {
            $banner->banner = $url . rand(1, 1000) . "/" . BannerLocation::find(3)->width . "/" . BannerLocation::find(3)->height;
            $banner->save();
        });

        // 4. Right Sidebar Sticky (120x160)
        factory(Banner::class, 2)->create([
            "location_id" => 4,
        ])->each(function ($banner) use ($url) {
            $banner->banner = $url . rand(1, 1000) . "/" . BannerLocation::find(4)->width . "/" . BannerLocation::find(4)->height;
            $banner->save();
        });

        // 5. Mid Content Banner (1170x160)
        factory(Banner::class, 3)->create([
            "location_id" => 5,
        ])->each(function ($banner) use ($url) {
            $banner->banner = $url . rand(1, 1000) . "/" . BannerLocation::find(5)->width . "/" . BannerLocation::find(5)->height;
            $banner->save();
        });

        // 6. Mobile Home Main Slider (640x360)
        factory(Banner::class, 10)->create([
            "location_id" => 6,
        ])->each(function ($banner) use ($url) {
            $banner->banner = $url . rand(1, 1000) . "/" . BannerLocation::find(6)->width . "/" . BannerLocation::find(6)->height;
            $banner->save();
        });

        // 7. Mobile Mid Content Banner (640x360)
        factory(Banner::class, 10)->create([
            "location_id" => 7,
        ])->each(function ($banner) use ($url) {
            $banner->banner = $url . rand(1, 1000) . "/" . BannerLocation::find(7)->width . "/" . BannerLocation::find(7)->height;
            $banner->save();
        });

        // 8. Mobile Finance Main Slider (640x360)
        factory(Banner::class, 10)->create([
            "location_id" => 8,
        ])->each(function ($banner) use ($url) {
            $banner->banner = $url . rand(1, 1000) . "/" . BannerLocation::find(8)->width . "/" . BannerLocation::find(8)->height;
            $banner->save();
        });
    }
}
