<?php

use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = new \App\Content;;
        $content->title = 'Welcome Page';
        $content->slug = '/';
        $content->type = \App\Content::TYPE_PAGE;
        $content->status = \App\Content::STATUS_PUBLISHED;
        $content->visibility = \App\Content::VISIBILITY_PUBLIC;
        $content->author_id = 1;
        $content->save();

        $value = new \stdClass;
        $value->datetime = 1562054752;
        $value->filename_changed = true;
        $value->before = $content;
        $value->after = $content;
        $value->user = \App\User::find(1);

        $content_meta = new \App\ContentMeta();
        $content_meta->content_id = $content->id;
        $content_meta->key = 'initial';
        $content_meta->value = json_encode($value);
        $content_meta->save();

        // ---------------------------

        $content = new \App\Content;;
        $content->title = 'Home Page';
        $content->slug = 'home';
        $content->type = \App\Content::TYPE_PAGE;
        $content->status = \App\Content::STATUS_PUBLISHED;
        $content->visibility = \App\Content::VISIBILITY_AUTH;
        $content->author_id = 1;
        $content->save();

        $value = new \stdClass;
        $value->datetime = 1562054752;
        $value->filename_changed = true;
        $value->before = $content;
        $value->after = $content;
        $value->user = \App\User::find(1);

        $content_meta = new \App\ContentMeta();
        $content_meta->content_id = $content->id;
        $content_meta->key = 'initial';
        $content_meta->value = json_encode($value);
        $content_meta->save();
    }
}
