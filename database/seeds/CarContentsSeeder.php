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
        factory(App\Content::class, 50)->create()->each(function ($content) {

            if ($content->type == App\Content::TYPE_CAR) {
            	$content->metas()->saveMany([
				    new App\ContentMeta(['key' => 'plateNumber', 'value' => '0035UNA']),
				    new App\ContentMeta(['key' => 'cabinNumber', 'value' => 'VF3 3CRFNC 12345678']),
				    new App\ContentMeta(['key' => 'countryName', 'value' => 'Korea']),
				    new App\ContentMeta(['key' => 'markName', 'value' => 'toyota']),
				    new App\ContentMeta(['key' => 'modelName', 'value' => 'prius']),
				    new App\ContentMeta(['key' => 'type', 'value' => 'Sedan']),
				    new App\ContentMeta(['key' => 'className', 'value' => 'luxury']),
				    new App\ContentMeta(['key' => 'manCount', 'value' => '4']),
				    new App\ContentMeta(['key' => 'weight', 'value' => '1200kg']),
				    new App\ContentMeta(['key' => 'mass', 'value' => '1200kg']),
				    new App\ContentMeta(['key' => 'fuelType', 'value' => 'gas']),
				    new App\ContentMeta(['key' => 'width', 'value' => '160cm']),
				    new App\ContentMeta(['key' => 'height', 'value' => '120cm']),
				    new App\ContentMeta(['key' => 'capacity', 'value' => '1500cc']),
				    new App\ContentMeta(['key' => 'motorNumber', 'value' => '2H2tXA598WDY987665']),
				    new App\ContentMeta(['key' => 'colorName', 'value' => 'black']),
				    new App\ContentMeta(['key' => 'axleCount', 'value' => '2']),
				    new App\ContentMeta(['key' => 'certificateNumber', 'value' => '2H2tXA598WDY987665']),
				    new App\ContentMeta(['key' => 'importDate', 'value' => '2006']),
				    new App\ContentMeta(['key' => 'intent', 'value' => 'use']),
				    new App\ContentMeta(['key' => 'transmission', 'value' => 'automatic']),
				    new App\ContentMeta(['key' => 'archiveDate', 'value' => '2008']),
				    new App\ContentMeta(['key' => 'buildYear', 'value' => '2003']),
				    new App\ContentMeta(['key' => 'archiveFirstNumber', 'value' => 'A598WDY987']),
				    new App\ContentMeta(['key' => 'wheelPosition', 'value' => 'left']),
				    new App\ContentMeta(['key' => 'length', 'value' => '4m']),
				    new App\ContentMeta(['key' => 'archiveNumber', 'value' => 'A598WDY987']),
				]);
            } else {
            	$content->metas()->save(factory(App\ContentMeta::class)->make());
            }
        });
    }
}
