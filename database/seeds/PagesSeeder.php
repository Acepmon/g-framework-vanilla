<?php

use Illuminate\Database\Seeder;

use App\Content;
use App\ContentMeta;
use App\User;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time = time();
        $rootPath = config('content.pages.rootPath');

        if (!file_exists(base_path($rootPath))) {
            mkdir(base_path($rootPath));
        } else {
            $files = glob(base_path($rootPath) . DIRECTORY_SEPARATOR . '*'); // get all file names
            foreach ($files as $file) { // iterate files
                if (is_file($file)) {
                    unlink($file); // delete file
                }
            }
        }

        // ---------------------------

        $content = new Content;
        $content->title = 'Welcome Page';
        $content->slug = '/';
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

        $file_content = file_get_contents(resource_path('stubs/root.stub'));

        $file_name = $rootPath . DIRECTORY_SEPARATOR . 'root' . Content::NAMING_CONVENTION . $content->status . Content::NAMING_CONVENTION . $time;
        $file_ext = 'blade.php';
        $file_path = $file_name . '.' . $file_ext;

        file_put_contents(base_path($file_path), $file_content);

        // ---------------------------

        $content = new Content;
        $content->title = 'Home Page';
        $content->slug = 'home';
        $content->type = Content::TYPE_PAGE;
        $content->status = Content::STATUS_PUBLISHED;
        $content->visibility = Content::VISIBILITY_AUTH;
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

        $file_content = file_get_contents(resource_path('stubs/home.stub'));
        $file_name = $rootPath . DIRECTORY_SEPARATOR . 'home' . Content::NAMING_CONVENTION . $content->status . Content::NAMING_CONVENTION . $time;
        $file_ext = 'blade.php';
        $file_path = $file_name . '.' . $file_ext;

        file_put_contents(base_path($file_path), $file_content);
        
        // ---------------------------

        $content = new Content;
        $content->title = 'Post Page';
        $content->slug = 'posts';
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

        $file_content = file_get_contents(resource_path('stubs/home.stub'));
        $file_name = $rootPath . DIRECTORY_SEPARATOR . 'home' . Content::NAMING_CONVENTION . $content->status . Content::NAMING_CONVENTION . $time;
        $file_ext = 'blade.php';
        $file_path = $file_name . '.' . $file_ext;

        file_put_contents(base_path($file_path), $file_content);
    }
}
