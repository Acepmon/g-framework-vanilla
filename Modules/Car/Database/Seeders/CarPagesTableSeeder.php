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

        Content::where('slug', '/')->first()->delete();

        $content = new Content;
        $content->title = 'Home Page';
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
        $file_content = file_get_contents(resource_path('stubs/carHome.stub'));
        $file_name = $rootPath . DIRECTORY_SEPARATOR . 'root' . Content::NAMING_CONVENTION . $content->status . Content::NAMING_CONVENTION . $time;
        $file_ext = 'blade.php';
        $file_path = $file_name . '.' . $file_ext;
        file_put_contents(base_path($file_path), $file_content);
        //        ------------- car web home login page -----------------------
        // $time = time();
        // $rootPath = config('content.pages.rootPath');
        // $content = new Content;
        // $content->title = 'Car web login';
        // $content->slug = 'car-web-login';
        // $content->type = Content::TYPE_PAGE;
        // $content->status = Content::STATUS_PUBLISHED;
        // $content->visibility = Content::VISIBILITY_PUBLIC;
        // $content->author_id = 1;
        // $content->save();
        // $value = new \stdClass;
        // $value->datetime = $time;
        // $value->filename_changed = true;
        // $value->before = $content;
        // $value->after = $content;
        // $value->user = User::find(1);
        // $content_meta = new ContentMeta();
        // $content_meta->content_id = $content->id;
        // $content_meta->key = 'initial';
        // $content_meta->value = json_encode($value);
        // $content_meta->save();
        // $file_content = file_get_contents(resource_path('stubs/carHomeLogin.stub'));
        // $file_name = $rootPath . DIRECTORY_SEPARATOR . 'car-web-login' . Content::NAMING_CONVENTION . $content->status . Content::NAMING_CONVENTION . $time;
        // $file_ext = 'blade.php';
        // $file_path = $file_name . '.' . $file_ext;
        // file_put_contents(base_path($file_path), $file_content);
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
        $content->slug = 'search';
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

        Content::where('slug', 'posts')->first()->delete();

        $content = new Content;
        $content->title = 'Posts';
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
        $file_content = file_get_contents(resource_path('stubs/carPost.stub'));
        $file_name = $rootPath . DIRECTORY_SEPARATOR . 'posts' . Content::NAMING_CONVENTION . $content->status . Content::NAMING_CONVENTION . $time;
        $file_ext = 'blade.php';
        $file_path = $file_name . '.' . $file_ext;
        file_put_contents(base_path($file_path), $file_content);
        //        ------------- car register step 1 -----------------------
        $time = time();
        $rootPath = config('content.pages.rootPath');
        $content = new Content;
        $content->title = 'Car Register Step 1';
        $content->slug = 'register-step-1';
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
        $file_content = file_get_contents(resource_path('stubs/carRegisterStep1.stub'));
        $file_name = $rootPath . DIRECTORY_SEPARATOR . $content->slug . Content::NAMING_CONVENTION . $content->status . Content::NAMING_CONVENTION . $time;
        $file_ext = 'blade.php';
        $file_path = $file_name . '.' . $file_ext;
        file_put_contents(base_path($file_path), $file_content);
        //        ------------- car register step 2 -----------------------
        $time = time();
        $rootPath = config('content.pages.rootPath');
        $content = new Content;
        $content->title = 'Car Register Step 2';
        $content->slug = 'register-step-2';
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
        $file_content = file_get_contents(resource_path('stubs/carRegisterStep2.stub'));
        $file_name = $rootPath . DIRECTORY_SEPARATOR . $content->slug . Content::NAMING_CONVENTION . $content->status . Content::NAMING_CONVENTION . $time;
        $file_ext = 'blade.php';
        $file_path = $file_name . '.' . $file_ext;
        file_put_contents(base_path($file_path), $file_content);
        //        ------------- car register step 3 -----------------------
        $time = time();
        $rootPath = config('content.pages.rootPath');
        $content = new Content;
        $content->title = 'Car Register Step 3';
        $content->slug = 'register-step-3';
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
        $file_content = file_get_contents(resource_path('stubs/carRegisterStep3.stub'));
        $file_name = $rootPath . DIRECTORY_SEPARATOR . $content->slug . Content::NAMING_CONVENTION . $content->status . Content::NAMING_CONVENTION . $time;
        $file_ext = 'blade.php';
        $file_path = $file_name . '.' . $file_ext;
        file_put_contents(base_path($file_path), $file_content);

        //        ------------- car write wanna buy -----------------------

        $time = time();
        $rootPath = config('content.pages.rootPath');

        $content = new Content;
        $content->title = 'Car Write Wanna Buy';
        $content->slug = 'car-write-wanna-buy';
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

        $file_content = file_get_contents(resource_path('stubs/carWriteWannaBuy.stub'));
        $file_name = $rootPath . DIRECTORY_SEPARATOR . 'car-write-wanna-buy' . Content::NAMING_CONVENTION . $content->status . Content::NAMING_CONVENTION . $time;
        $file_ext = 'blade.php';
        $file_path = $file_name . '.' . $file_ext;

        file_put_contents(base_path($file_path), $file_content);


        //        ------------- car agreement terms -----------------------

        $time = time();
        $rootPath = config('content.pages.rootPath');

        $content = new Content;
        $content->title = 'Car Agreement Terms';
        $content->slug = 'car-agreement-terms';
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

        $file_content = file_get_contents(resource_path('stubs/carAgreementTerms.stub'));
        $file_name = $rootPath . DIRECTORY_SEPARATOR . 'car-agreement-terms' . Content::NAMING_CONVENTION . $content->status . Content::NAMING_CONVENTION . $time;
        $file_ext = 'blade.php';
        $file_path = $file_name . '.' . $file_ext;

        file_put_contents(base_path($file_path), $file_content);

        //        ------------- car more information -----------------------

        $time = time();
        $rootPath = config('content.pages.rootPath');

        $content = new Content;
        $content->title = 'Car Sell Page 2 Step 1';
        $content->slug = 'sell-car-page-2-step-1';
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

        $file_content = file_get_contents(resource_path('stubs/carSellPage2Step1.stub'));
        $file_name = $rootPath . DIRECTORY_SEPARATOR . 'sell-car-page-2-step-1' . Content::NAMING_CONVENTION . $content->status . Content::NAMING_CONVENTION . $time;
        $file_ext = 'blade.php';
        $file_path = $file_name . '.' . $file_ext;

        file_put_contents(base_path($file_path), $file_content);

        // --- car my page sell request on sell ---

        $time = time();
        $rootPath = config('content.pages.rootPath');

        $content = new Content;
        $content->title = 'Car sell page on sale';
        $content->slug = 'sell-page-on-sell';
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

        $file_content = file_get_contents(resource_path('stubs/carSellPageOnSell.stub'));
        $file_name = $rootPath . DIRECTORY_SEPARATOR . 'sell-page-on-sell' . Content::NAMING_CONVENTION . $content->status . Content::NAMING_CONVENTION . $time;
        $file_ext = 'blade.php';
        $file_path = $file_name . '.' . $file_ext;

        file_put_contents(base_path($file_path), $file_content);


        // --- car my page sell request sold ---

        $time = time();
        $rootPath = config('content.pages.rootPath');

        $content = new Content;
        $content->title = 'Car sell page sold';
        $content->slug = 'sell-page-sold';
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


        $file_content = file_get_contents(resource_path('stubs/carSellPageSold.stub'));
        $file_name = $rootPath . DIRECTORY_SEPARATOR . 'sell-page-sold' . Content::NAMING_CONVENTION . $content->status . Content::NAMING_CONVENTION . $time;
        $file_ext = 'blade.php';
        $file_path = $file_name . '.' . $file_ext;

        file_put_contents(base_path($file_path), $file_content);


        // --- car my page purchase request published ---
        $content = new Content;
        $content->title = 'Car purchase page published';
        $content->slug = 'purchase-page-published';
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

        $file_content = file_get_contents(resource_path('stubs/carPurchasePagePublished.stub'));
        $file_name = $rootPath . DIRECTORY_SEPARATOR . 'purchase-page-published' . Content::NAMING_CONVENTION . $content->status . Content::NAMING_CONVENTION . $time;
        $file_ext = 'blade.php';
        $file_path = $file_name . '.' . $file_ext;

        file_put_contents(base_path($file_path), $file_content);

        // --- car my page purchase request published ---
        $content = new Content;
        $content->title = 'Car purchase page checking';
        $content->slug = 'purchase-page-checking';
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

        $file_content = file_get_contents(resource_path('stubs/carPurchasePageChecking.stub'));
        $file_name = $rootPath . DIRECTORY_SEPARATOR . 'purchase-page-checking' . Content::NAMING_CONVENTION . $content->status . Content::NAMING_CONVENTION . $time;
        $file_ext = 'blade.php';
        $file_path = $file_name . '.' . $file_ext;

        file_put_contents(base_path($file_path), $file_content);

        // --- car my page user information ---
        $content = new Content;
        $content->title = 'User Information';
        $content->slug = 'user-information';
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

        $file_content = file_get_contents(resource_path('stubs/carUserInformation.stub'));
        $file_name = $rootPath . DIRECTORY_SEPARATOR . 'user-information' . Content::NAMING_CONVENTION . $content->status . Content::NAMING_CONVENTION . $time;
        $file_ext = 'blade.php';
        $file_path = $file_name . '.' . $file_ext;

        file_put_contents(base_path($file_path), $file_content);

        // --- loan possibility check ---
        $content = new Content;
        $content->title = 'Loan Possibility Check';
        $content->slug = 'loan-possibility-check';
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

        $file_content = file_get_contents(resource_path('stubs/loanPossibilityCheck.stub'));
        $file_name = $rootPath . DIRECTORY_SEPARATOR . 'loan-possibility-check' . Content::NAMING_CONVENTION . $content->status . Content::NAMING_CONVENTION . $time;
        $file_ext = 'blade.php';
        $file_path = $file_name . '.' . $file_ext;

        file_put_contents(base_path($file_path), $file_content);

        // --- car auction page ---
        $content = new Content;
        $content->title = 'Auction Car List';
        $content->slug = 'auction';
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

        $file_content = file_get_contents(resource_path('stubs/carAuctionList.stub'));
        $file_name = $rootPath . DIRECTORY_SEPARATOR . 'auction' . Content::NAMING_CONVENTION . $content->status . Content::NAMING_CONVENTION . $time;
        $file_ext = 'blade.php';
        $file_path = $file_name . '.' . $file_ext;

        file_put_contents(base_path($file_path), $file_content);

        // --- G6.2 - Search Cars for Monthly Installments ---
        $content = new Content;
        $content->title = 'Search Cars for Monthly Installments';
        $content->slug = 'cars-for-monthly-installments';
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

        $file_content = file_get_contents(resource_path('stubs/carsForMonthlyInstallments.stub'));
        $file_name = $rootPath . DIRECTORY_SEPARATOR . 'cars-for-monthly-installments' . Content::NAMING_CONVENTION . $content->status . Content::NAMING_CONVENTION . $time;
        $file_ext = 'blade.php';
        $file_path = $file_name . '.' . $file_ext;

        file_put_contents(base_path($file_path), $file_content);
    }
}
