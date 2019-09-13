<?php

use Illuminate\Database\Seeder;

class CarContentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Content::class, 10)->create()->each(function ($content) {
            
            if ($content->type == App\Content::TYPE_CAR) {
            	$content->metas()->saveMany([ 
				    new App\ContentMeta(['key' => 'plateNumber', 'value' => '0035UNA']),
				    new App\ContentMeta(['key' => 'cabinNumber', 'value' => 'VF3 3CRFNC 12345678']),
				    new App\ContentMeta(['key' => 'countryName', 'value' => 'Japan']),
				    new App\ContentMeta(['key' => 'markName', 'value' => 'toyota']),
				    new App\ContentMeta(['key' => 'modelName', 'value' => 'starix']),
				    new App\ContentMeta(['key' => 'type', 'value' => 'van']),
				    new App\ContentMeta(['key' => 'className', 'value' => 'luxury']),
				    new App\ContentMeta(['key' => 'manCount', 'value' => '4']),
				    new App\ContentMeta(['key' => 'weight', 'value' => '1600kg']),
				    new App\ContentMeta(['key' => 'mass', 'value' => '1600kg']),
				    new App\ContentMeta(['key' => 'fuelType', 'value' => 'gas']),
				    new App\ContentMeta(['key' => 'width', 'value' => '160cm']),
				    new App\ContentMeta(['key' => 'height', 'value' => '180cm']),
				    new App\ContentMeta(['key' => 'capacity', 'value' => '1800cc']),
				    new App\ContentMeta(['key' => 'motorNumber', 'value' => '2H2tXA598WDY987665']),
				    new App\ContentMeta(['key' => 'colorName', 'value' => 'black']),
				    new App\ContentMeta(['key' => 'axleCount', 'value' => '4']),
				    new App\ContentMeta(['key' => 'certificateNumber', 'value' => '2H2tXA598WDY987665']),
				    new App\ContentMeta(['key' => 'importDate', 'value' => '2006']),
				    new App\ContentMeta(['key' => 'intent', 'value' => 'use']),
				    new App\ContentMeta(['key' => 'transmission', 'value' => 'automatic']),
				    new App\ContentMeta(['key' => 'archiveDate', 'value' => '2008']),
				    new App\ContentMeta(['key' => 'buildYear', 'value' => '2003']),
				    new App\ContentMeta(['key' => 'archiveFirstNumber', 'value' => 'A598WDY987']),
				    new App\ContentMeta(['key' => 'wheelPosition', 'value' => 'right']),
				    new App\ContentMeta(['key' => 'length', 'value' => '4m']),
				    new App\ContentMeta(['key' => 'archiveNumber', 'value' => 'A598WDY987']),
				    new App\ContentMeta(['key' => 'title', 'value' => 'Selling car']),
				    new App\ContentMeta(['key' => 'status', 'value' => 'published']),
				    new App\ContentMeta(['key' => 'visibility', 'value' => 'public']),
				    new App\ContentMeta(['key' => 'carCondition', 'value' => 'used']),
				    new App\ContentMeta(['key' => 'importDate', 'value' => '2006']),
				    new App\ContentMeta(['key' => 'wheelDrive', 'value' => 'back']),
				    new App\ContentMeta(['key' => 'mileage', 'value' => '5000km']),
				    new App\ContentMeta(['key' => 'advantages', 'value' => 'used in womans hand']),
				    new App\ContentMeta(['key' => 'SellerDescription', 'value' => 'there is nothing to change']),
				    new App\ContentMeta(['key' => 'price', 'value' => '10000000']),
				    new App\ContentMeta(['key' => 'priceType', 'value' => 'loan']),
				    new App\ContentMeta(['key' => 'thumbnail', 'value' => 'thumb1']),
				    new App\ContentMeta(['key' => 'medias', 'value' => 'image2']),
				    new App\ContentMeta(['key' => 'link', 'value' => 'https://www.youtube.com/watch?v=2RnGwkWL94I']),
				    new App\ContentMeta(['key' => 'buyout', 'value' => '10000000']),
				    new App\ContentMeta(['key' => 'startPrice', 'value' => '8000000']),
				    new App\ContentMeta(['key' => 'maxBid', 'value' => '14000000']),
				    new App\ContentMeta(['key' => 'startsAt', 'value' => '2019-09-15']),
				    new App\ContentMeta(['key' => 'endsAt', 'value' => '2019-09-18'])
				]);
            } else {
            	$content->metas()->save(factory(App\ContentMeta::class)->make());
            }
        });
    }
}
