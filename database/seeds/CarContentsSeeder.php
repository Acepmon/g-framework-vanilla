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
        $time = time();
        $rootPath = \App\Config::where('key', 'content.cars.rootPath')->first()->value;

        factory(App\Content::class, 50)->create(['type' => App\Content::TYPE_CAR])->each(function ($content) use($time, $rootPath) {

            $carUserRandomId = \App\User::whereHas('groups', function ($query) {
                $query->where('type', \App\Group::TYPE_DYNAMIC);
            })->get()->random()->id;
            $content->author_id = $carUserRandomId;
            $content->save();

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

            $value = new \stdClass;
            $value->datetime = $time;
            $value->filename_changed = true;
            $value->before = $content;
            $value->after = $content;
            $value->user = \App\User::find($content->author_id);

            $content_meta = new \App\ContentMeta();
            $content_meta->content_id = $content->id;
            $content_meta->key = 'initial';
            $content_meta->value = json_encode($value);
            $content_meta->save();

            $file_content = file_get_contents(resource_path('stubs/car.stub'));
            $file_name = $rootPath . DIRECTORY_SEPARATOR . $content->slug . \App\Content::NAMING_CONVENTION . $content->status . \App\Content::NAMING_CONVENTION . $time;
            $file_ext = 'blade.php';
            $file_path = $file_name . '.' . $file_ext;

            file_put_contents(base_path($file_path), $file_content);
        });
    }
}
