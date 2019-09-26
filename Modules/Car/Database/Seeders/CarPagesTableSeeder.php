<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Content;
use App\ContentMeta;
use App\User;

class CarPagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
//        ------------- car web home page -----------------------


        $time = time();
        $rootPath = config('content.pages.rootPath');

        $content = new Content;
        $content->title = 'Car web';
        $content->slug = 'car-web';
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

        $file_content = file_get_contents(resource_path('stubs/carHome.stub'));
        $file_name = $rootPath . DIRECTORY_SEPARATOR . 'car-web' . Content::NAMING_CONVENTION . $content->status . Content::NAMING_CONVENTION . $time;
        $file_ext = 'blade.php';
        $file_path = $file_name . '.' . $file_ext;

        file_put_contents(base_path($file_path), $file_content);

        //        ------------- car web home login page -----------------------


        $time = time();
        $rootPath = config('content.pages.rootPath');

        $content = new Content;
        $content->title = 'Car web login';
        $content->slug = 'car-web-login';
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

        $file_content = file_get_contents(resource_path('stubs/carHomeLogin.stub'));
        $file_name = $rootPath . DIRECTORY_SEPARATOR . 'car-web-login' . Content::NAMING_CONVENTION . $content->status . Content::NAMING_CONVENTION . $time;
        $file_ext = 'blade.php';
        $file_path = $file_name . '.' . $file_ext;

        file_put_contents(base_path($file_path), $file_content);


        //        ------------- car web home forget password page -----------------------

        $time = time();
        $rootPath = config('content.pages.rootPath');

        $content = new Content;
        $content->title = 'Car web recover password';
        $content->slug = 'car-web-rvr-pwd';
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

        $file_content = file_get_contents(resource_path('stubs/carHomeRvrPwd.stub'));
        $file_name = $rootPath . DIRECTORY_SEPARATOR . 'car-web-rvr-pwd' . Content::NAMING_CONVENTION . $content->status . Content::NAMING_CONVENTION . $time;
        $file_ext = 'blade.php';
        $file_path = $file_name . '.' . $file_ext;

        file_put_contents(base_path($file_path), $file_content);


        //        ------------- car web home forget password page -----------------------

        $time = time();
        $rootPath = config('content.pages.rootPath');

        $content = new Content;
        $content->title = 'Car web finance';
        $content->slug = 'car-web-finance';
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

        $file_content = file_get_contents(resource_path('stubs/carHomeFinance.stub'));
        $file_name = $rootPath . DIRECTORY_SEPARATOR . 'car-web-finance' . Content::NAMING_CONVENTION . $content->status . Content::NAMING_CONVENTION . $time;
        $file_ext = 'blade.php';
        $file_path = $file_name . '.' . $file_ext;

        file_put_contents(base_path($file_path), $file_content);


        //        ------------- car search page -----------------------

        $time = time();
        $rootPath = config('content.pages.rootPath');

        $content = new Content;
        $content->title = 'Car Search';
        $content->slug = 'car-search';
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

        $file_content = file_get_contents(resource_path('stubs/carSearch.stub'));
        $file_name = $rootPath . DIRECTORY_SEPARATOR . 'car-search' . Content::NAMING_CONVENTION . $content->status . Content::NAMING_CONVENTION . $time;
        $file_ext = 'blade.php';
        $file_path = $file_name . '.' . $file_ext;

        file_put_contents(base_path($file_path), $file_content);

        //        ------------- car posts -----------------------

        $time = time();
        $rootPath = config('content.pages.rootPath');

        $content = new Content;
        $content->title = 'Car posts';
        $content->slug = 'car-posts';
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

        $file_content = file_get_contents(resource_path('stubs/carPost.stub'));
        $file_name = $rootPath . DIRECTORY_SEPARATOR . 'car-posts' . Content::NAMING_CONVENTION . $content->status . Content::NAMING_CONVENTION . $time;
        $file_ext = 'blade.php';
        $file_path = $file_name . '.' . $file_ext;

        file_put_contents(base_path($file_path), $file_content);

    }
}
