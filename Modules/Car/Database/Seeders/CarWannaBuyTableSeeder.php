<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Content;
use App\ContentMeta;
use App\User;
use App\Group;

class CarWannaBuyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        factory(Content::class, 100)->create([
            'type' => 'wanna-buy',
            'status' => Content::STATUS_PUBLISHED,
            'visibility' => Content::VISIBILITY_PUBLIC,
        ])->each(function ($content) {
            $content->slug = 'wanna-buy/' . $content->slug;
            $content->save();

            $carUserRandomId = User::whereHas('groups', function ($query) {
                $query->where('type', Group::TYPE_DYNAMIC);
            })->get()->random()->id;
            $content->author_id = $carUserRandomId;
            $content->save();

            $content->metas()->saveMany([
                new ContentMeta(['key' => 'markName', 'value' => 'Toyota']),
                new ContentMeta(['key' => 'modelName', 'value' => 'Prius']),
                new ContentMeta(['key' => 'priceAmountStart', 'value' => '10000000']),
                new ContentMeta(['key' => 'priceAmountEnd', 'value' => '10000000']),
                new ContentMeta(['key' => 'priceUnit', 'value' => '₮']),
            ]);
        });
    }
}
