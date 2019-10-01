<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use DB;
use App\Content;
use App\ContentMeta;
use App\User;

class CarBuyPageTableSeeder extends Seeder
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
            DB::beginTransaction();
            $time = time();
            $rootPath = config('content.pages.rootPath');

            $content = new Content;
            $content->title = 'Buy';
            $content->slug = 'buy';
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

            $file_content = file_get_contents(resource_path('stubs/carBuy.stub'));
            $file_name = $rootPath . DIRECTORY_SEPARATOR . 'buy' . Content::NAMING_CONVENTION . $content->status . Content::NAMING_CONVENTION . $time;
            $file_ext = 'blade.php';
            $file_path = $file_name . '.' . $file_ext;

            file_put_contents(base_path($file_path), $file_content);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
