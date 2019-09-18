<?php

namespace App\Http\Controllers\Admin;

use Artisan;
use Auth;
use DateTime;
use Storage;
use App\Content;
use App\ContentMeta;
use App\User;
use App\Config;
use App\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManagerStatic as Image;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = [
            Content::STATUS_PUBLISHED => Content::where('type', 'car')->where('status', Content::STATUS_PUBLISHED)->orderBy('visibility', 'desc')->get(),
            Content::STATUS_PENDING => Content::where('type', 'car')->where('status', Content::STATUS_PENDING)->orderBy('visibility', 'desc')->get(),
            Content::STATUS_DRAFT => Content::where('type', 'car')->where('status', Content::STATUS_DRAFT)->orderBy('visibility', 'desc')->get(),
        ];

        return view('admin.cars.index', ['contents' => $contents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $themes = Theme::all();
        return view('admin.cars.create', ['users' => $users, 'themes' => $themes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:191',
            'slug' => 'required|max:255|unique:contents,slug',
            'content' => 'nullable',
            'status' => 'required|max:50',
            'visibility' => 'required|max:50',
            'author_id' => 'required|integer|exists:users,id',
            'manufacturer' => 'required|max:255',
            'modelName' => 'required|max:255',
            'colorName' => 'required|max:255',
            'displacement' => 'required|max:255',
            'vin' => 'required|max:255',
            'buildYear' => 'required|max:255',
            'importDate' => 'required|max:255',
            'transmission' => 'required|max:255',
            'wheelPosition' => 'required|max:255',
            'manCount' => 'required|max:255',
            'fuel' => 'required|max:255',
            'wheelDrive' => 'required|max:255',
            'mileage' => 'required|max:255',
            'price' => 'required|int',
            'priceType' => 'required|max:255',
            'sellerDescription' => 'required|max:255'
        ]);

        try {
            DB::beginTransaction();
            $content = new Content();

            $content->title = $request->title;
            $content->slug = $request->slug;
            $content->type = $request->type;
            $content->status = $request->status;
            $content->visibility = $request->visibility;
            $content->author_id = $request->author_id;
            $content->save();

            $content->attachMeta('manufacturer', $request->manufacturer);
            $content->attachMeta('modelName', $request->modelName);
            $content->attachMeta('colorName', $request->colorName);
            $content->attachMeta('displacement', $request->displacement);
            $content->attachMeta('vin', $request->vin);
            $content->attachMeta('buildYear', $request->buildYear);
            $content->attachMeta('importDate', $request->importDate);
            $content->attachMeta('transmission', $request->transmission);
            $content->attachMeta('wheelPosition', $request->wheelPosition);
            $content->attachMeta('manCount', $request->manCount);
            $content->attachMeta('fuel', $request->fuel);
            $content->attachMeta('wheelDrive', $request->wheelDrive);
            $content->attachMeta('mileage', $request->mileage);
            if ($request->advantages) {
                foreach (explode(", ", $request->advantages) as $advantage) {
                    $content->attachMeta('advantages', $advantage);
                }
            }
            $content->attachMeta('sellerDescription', $request->sellerDescription);
            $content->attachMeta('price', $request->price);
            $content->attachMeta('priceType', $request->priceType);
            $thumbnail = $request->thumbnail;
            if ($thumbnail) {
                $filename = $thumbnail->store('public/medias', 'ftp');
                $filename = $this->cropAndStore($filename, json_decode($request->thumbnailCrop));
                $content->attachMeta('thumbnail', $filename);
            }
            $media_list = $this->uploadFiles($request->medias, $request->imagesCrop);
            if ($media_list) {
                foreach ($media_list as $media) {
                    $content->attachMeta('medias', $media);
                }
            }
            $content->attachMeta('youtubeLink', $request->youtubeLink);
            $content->attachMeta('buyout', $request->buyout);
            $content->attachMeta('startPrice', $request->startPrice);
            $content->attachMeta('maxBid', $request->maxBid);
            $startsAt = $request->startsAt;
            $endsAt = $request->endsAt;
            $content->attachMeta('startsAt', $startsAt);
            $content->attachMeta('endsAt', $endsAt);
            if ($startsAt && $endsAt) {
                $days = date_diff(new DateTime($startsAt), new DateTime($endsAt))->d;
                $content->attachMeta('durationDays', ($days!=0)?$days:"0");
            }

            DB::commit();
            return redirect()->route('admin.cars.index', ['type' => $content->type]);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
            // return redirect()->route('admin.cars.create')->with('error', $e->getMessage());
        }
    }

    public function uploadFiles($files, $crops) {
        $medias = [];
        $crops = json_decode($crops);
        if ($files) {
            foreach ($files as $index=>$file) {
                if ($file) {
                    $filename = $file->store('public/medias', 'ftp');
                    $filename = $this->cropAndStore($filename, $crops[$index]);
                    array_push($medias, $filename);
                }
            }
        }
        return $medias;
    }

    public function cropAndStore($filename, $cropData) {
        $crop = Image::make(Storage::disk('ftp')->get($filename))->crop((int) $cropData->width, (int) $cropData->height, (int) $cropData->x, (int) $cropData->y)->encode('jpg', 50);
        $cropThumb = $crop->resize(160, 90);
        Storage::disk('ftp')->put('public/medias/'.pathinfo($filename, PATHINFO_FILENAME).'_crop.jpg', $crop);
        Storage::disk('ftp')->put('public/medias/'.pathinfo($filename, PATHINFO_FILENAME).'_thumbnail.jpg', $cropThumb);
        return 'public/medias/'.pathinfo($filename, PATHINFO_FILENAME).'_crop.jpg';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $content = Content::find($id);
        return view('admin.cars.show', ['content' => $content, 'type' => 'car']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content = Content::findOrFail($id);

        return view('admin.cars.edit', ['content' => $content, 'users' => User::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $content = Content::findOrFail($id);

        $request->validate([
            'title' => 'required|max:191',
            'slug' => [
                'required',
                'max:255',
                Rule::unique('contents')->ignore($content->slug, 'slug'),
            ],
            'content' => 'nullable',
            'status' => 'required|max:50',
            'visibility' => 'required|max:50',
            'author_id' => 'required|integer|exists:users,id',
            'carTitle' => 'required|max:255',
            'manufacturer' => 'required|max:255',
            'modelName' => 'required|max:255',
            'colorName' => 'required|max:255',
            'displacement' => 'required|max:255',
            'vin' => 'required|max:255',
            'buildYear' => 'required|max:255',
            'importDate' => 'required|max:255',
            'transmission' => 'required|max:255',
            'wheelPosition' => 'required|max:255',
            'manCount' => 'required|max:255',
            'fuel' => 'required|max:255',
            'wheelDrive' => 'required|max:255',
            'mileage' => 'required|max:255',
            'price' => 'required|int',
            'priceType' => 'required|max:255',
            'thumbnail' => 'required',
            'sellerDescription' => 'required|max:255'
        ]);

        try {
            DB::beginTransaction();
            $content->title = $request->title;
            $old_slug = $content->slug;
            $content->slug = $request->slug;
            $content->type = $request->type;
            $content->status = $request->status;
            $content->visibility = $request->visibility;
            $content->author_id = $request->author_id;

            $content->updateMeta('carTitle', $request->carTitle);
            $content->updateMeta('manufacturer', $request->manufacturer);
            $content->updateMeta('modelName', $request->modelName);
            $content->updateMeta('colorName', $request->colorName);
            $content->updateMeta('displacement', $request->displacement);
            $content->updateMeta('vin', $request->vin);
            $content->updateMeta('buildYear', $request->buildYear);
            $content->updateMeta('importDate', $request->importDate);
            $content->updateMeta('transmission', $request->transmission);
            $content->updateMeta('wheelPosition', $request->wheelPosition);
            $content->updateMeta('manCount', $request->manCount);
            $content->updateMeta('fuel', $request->fuel);
            $content->updateMeta('wheelDrive', $request->wheelDrive);
            $content->updateMeta('mileage', $request->mileage);
            if ($request->advantages) {
                $content->updateMeta('advantages', $request->advantages);
            } else {
                $content->updateMeta('advantages', array());
            }
            $content->updateMeta('sellerDescription', $request->sellerDescription);
            $content->updateMeta('price', $request->price);
            $content->updateMeta('priceType', $request->priceType);
            $media_list = $this->uploadFiles($request->medias);
            foreach ($media_list as $media) {
                $content->attachMeta('medias', $media);
            }
            $content->updateMeta('youtubeLink', $request->youtubeLink);

            DB::commit();
            return redirect()->route('admin.cars.index', ['type' => $content->type]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.cars.edit', ['content' => $content, 'metas' => $content->metas])->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = Content::findORFail($id);
        $type = $content->type;
        $content->metas()->delete();
        Content::destroy($id);
        return redirect()->route('admin.cars.index', ['type' => $type]);
    }

    public function revert($id)
    {
        $content = Content::findOrFail($id);
        $revision = Route::current()->parameter('revision');

        try {
            DB::beginTransaction();

            $revision = ContentMeta::findOrFail($revision);
            $revision_value = json_decode($revision->value);

            $time = time();
            $value = new \stdClass;
            $value->datetime = $time;
            $value->filename_changed = ($revision_value->after->slug != $content->slug);
            $value->before = $content;
            $value->after = $revision_value->after;
            $value->user = Auth::user();

            $content_meta = new ContentMeta();
            $content_meta->content_id = $content->id;
            $content_meta->key = 'revert';
            $content_meta->value = json_encode($revision_value);
            $content_meta->save();

            $viewPath = str_replace('.', '/', 'views.' . Config::where('key', 'content.'.$revision->content->type.'s.viewPath')->first()->value);
            $filename = $viewPath . '/' . $revision->content->slug . Content::NAMING_CONVENTION . $revision->content->status . Content::NAMING_CONVENTION . $revision_value->datetime . '.blade.php';
            $newname = $viewPath . '/' . $revision->content->slug . Content::NAMING_CONVENTION . $revision->content->status . Content::NAMING_CONVENTION . $time . '.blade.php';
            copy(resource_path($filename), resource_path($newname));

            DB::commit();
            return redirect()->route('admin.cars.show', ['id' => $content->id]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.cars.show', ['id' => $content->id])->with('error', $e->getMessage());
        }
    }

    public function viewRevision($id)
    {
        $content = Content::findOrFail($id);
        $revision = ContentMeta::findOrFail(Route::current()->parameter('revision'));

        $viewPath = Config::where('key', 'content.'.$content->type.'s.rootPath')->first()->value;
        $path = $viewPath . DIRECTORY_SEPARATOR . $revision->revisionView();
        $revision_path = $path . '.blade.php';
        return view('admin.contents.revisions.show', ['content' => $content, 'revision' => $revision, 'revision_path' => $revision_path]);
    }

    public function updateRevision(Request $request, $id)
    {
        $request->validate([
            'revision_path' => 'required',
            'content' => 'required'
        ]);

        try {
            $revision_path = $request->input('revision_path');
            $revision_content = $request->input('content');
            // file_put_contents(base_path($revision_path), $content);

            $content = Content::findOrFail(Route::current()->parameter('id'));
            $time = time();
            $value = new \stdClass;
            $value->datetime = $time;
            $value->filename_changed = False;
            $value->before = $content;
            $value->after = $content;
            $value->user = Auth::user();

            $content_meta = new ContentMeta();
            $content_meta->content_id = $content->id;
            $content_meta->key = 'revision';
            $content_meta->value = json_encode($value);
            $content_meta->save();

            $viewPath = Config::where('key', 'content.'.$content->type.'s.viewPath')->first()->value;
            $name = $content->slug . Content::NAMING_CONVENTION . $content->status . Content::NAMING_CONVENTION . $time;
            $extension =  'blade.php';
            $this->create_view($content->type, $viewPath . '.' . $name, $extension);

            $viewPath = Config::where('key', 'content.'.$content->type.'s.rootPath')->first()->value;
            $revision_path = $viewPath . DIRECTORY_SEPARATOR . $name . '.' . $extension;
            file_put_contents(base_path($revision_path), $revision_content);

            return response()->json(["result" => "success"]);
            // return redirect()->route('admin.contents.show', ['id' => $content->id]);
        } catch (\Exception $e) {
            echo $e;
            abort(400);
        }
    }

    public function create_view($type, $name, $extension, $extends='layouts.app')
    {
        // Create View
        if ($type == 'page')
        {
            Artisan::call("make:view", [
                'name' => $name,
                '--extension' => $extension,
                '--extends' => $extends,
                '--with-yields' => true]);
        } else if ($type == 'post')
        {
            Artisan::call("make:view", [
                'name' => $name,
                '--extension' => $extension]);
        }
    }
}
