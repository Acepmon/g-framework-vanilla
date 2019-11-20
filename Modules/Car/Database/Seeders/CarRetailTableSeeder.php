<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Content;
use App\ContentMeta;

class CarRetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        factory(Content::class, 125)->create(['type' => 'retail'])->each(function ($content) {
            $content->metas()->saveMany([
                new ContentMeta(['key' => 'name', 'value' => 'Амгалан Auto Plaza']),
                new ContentMeta(['key' => 'address', 'value' => 'БЗД, Амгалангийн тойрог / Нохойны хөшөөтэй/ зүүн тийш өнгөрөөд 300м яваад төв замын хойд талд']),
                new ContentMeta(['key' => 'openHours', 'value' => 'Даваа - Бямөа 9:00 - 18:00 цайны цаг 12:00 - 13:00']),
                new ContentMeta(['key' => 'website', 'value' => 'www.yourdomain.com']),
                new ContentMeta(['key' => 'phone', 'value' => '+976 ' . rand(10000000, 99999999)]),
                new ContentMeta(['key' => 'vehicles', 'value' => '123']),
                new ContentMeta(['key' => 'image', 'value' => url(asset('car-web/img/retail.png'))])
            ]);

            $content->slug = 'retails/' . $content->id;
            $content->save();
        });
    }
}
