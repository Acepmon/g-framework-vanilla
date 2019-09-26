<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Content;
use App\ContentMeta;
use App\User;

class CarSellPagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        //        ------------- car web buy page -----------------------
        try{
            $time = time();
            $rootPath = config('content.pages.rootPath');

            // --- car sell page 1 ---
            $content = new Content;
            $content->title = 'Sell Car Page 1';
            $content->slug = 'sell-car-page-1';
            $content->type = Content::TYPE_PAGE;
            $content->status = Content::STATUS_PUBLISHED;
            $content->visibility = Content::VISIBILITY_PUBLIC;
            $content->author_id = 1;
            $content->save();

            $value = new \stdClass;
            $value->datetime = $time;
            $value->filename_changed = true;
            $value->before = $content;
            $value->after = $content;
            $value->user = User::find(1);

            $content_meta = new ContentMeta();
            $content_meta->content_id = $content->id;
            $content_meta->key = 'initial';
            $content_meta->value = json_encode($value);
            $content_meta->save();

            $file_content = file_get_contents(resource_path('stubs/carSellPage1.stub'));
            $file_name = $rootPath . DIRECTORY_SEPARATOR . 'sell-car-page-1' . Content::NAMING_CONVENTION . $content->status . Content::NAMING_CONVENTION . $time;
            $file_ext = 'blade.php';
            $file_path = $file_name . '.' . $file_ext;

            file_put_contents(base_path($file_path), $file_content);


            // --- car sell page 2 ---
            $content = new Content;
            $content->title = 'Sell Car Page 2';
            $content->slug = 'sell-car-page-2';
            $content->type = Content::TYPE_PAGE;
            $content->status = Content::STATUS_PUBLISHED;
            $content->visibility = Content::VISIBILITY_PUBLIC;
            $content->author_id = 1;
            $content->save();

            $value = new \stdClass;
            $value->datetime = $time;
            $value->filename_changed = true;
            $value->before = $content;
            $value->after = $content;
            $value->user = User::find(1);

            $content_meta = new ContentMeta();
            $content_meta->content_id = $content->id;
            $content_meta->key = 'initial';
            $content_meta->value = json_encode($value);
            $content_meta->save();

            $file_content = file_get_contents(resource_path('stubs/carSellPage2.stub'));
            $file_name = $rootPath . DIRECTORY_SEPARATOR . 'sell-car-page-2' . Content::NAMING_CONVENTION . $content->status . Content::NAMING_CONVENTION . $time;
            $file_ext = 'blade.php';
            $file_path = $file_name . '.' . $file_ext;

            file_put_contents(base_path($file_path), $file_content);

            // --- car sell page 2 step 2 ---
            $content = new Content;
            $content->title = 'Sell Car Page 2 step 2';
            $content->slug = 'sell-car-page-2-step-2';
            $content->type = Content::TYPE_PAGE;
            $content->status = Content::STATUS_PUBLISHED;
            $content->visibility = Content::VISIBILITY_PUBLIC;
            $content->author_id = 1;
            $content->save();

            $value = new \stdClass;
            $value->datetime = $time;
            $value->filename_changed = true;
            $value->before = $content;
            $value->after = $content;
            $value->user = User::find(1);

            $content_meta = new ContentMeta();
            $content_meta->content_id = $content->id;
            $content_meta->key = 'initial';
            $content_meta->value = json_encode($value);
            $content_meta->save();

            $file_content = file_get_contents(resource_path('stubs/carSellPage2Step2.stub'));
            $file_name = $rootPath . DIRECTORY_SEPARATOR . 'sell-car-page-2-step-2' . Content::NAMING_CONVENTION . $content->status . Content::NAMING_CONVENTION . $time;
            $file_ext = 'blade.php';
            $file_path = $file_name . '.' . $file_ext;

            file_put_contents(base_path($file_path), $file_content);


            
            // --- car sell auction page ---
            $content = new Content;
            $content->title = 'Sell Car Auction';
            $content->slug = 'sell-car-auction';
            $content->type = Content::TYPE_PAGE;
            $content->status = Content::STATUS_PUBLISHED;
            $content->visibility = Content::VISIBILITY_PUBLIC;
            $content->author_id = 1;
            $content->save();

            $value = new \stdClass;
            $value->datetime = $time;
            $value->filename_changed = true;
            $value->before = $content;
            $value->after = $content;
            $value->user = User::find(1);

            $content_meta = new ContentMeta();
            $content_meta->content_id = $content->id;
            $content_meta->key = 'initial';
            $content_meta->value = json_encode($value);
            $content_meta->save();

            $file_content = file_get_contents(resource_path('stubs/carSellAuction.stub'));
            $file_name = $rootPath . DIRECTORY_SEPARATOR . 'sell-car-auction' . Content::NAMING_CONVENTION . $content->status . Content::NAMING_CONVENTION . $time;
            $file_ext = 'blade.php';
            $file_path = $file_name . '.' . $file_ext;

            file_put_contents(base_path($file_path), $file_content);
            return redirect()->route('admin.cars.index', ['type' => $content->type]);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
