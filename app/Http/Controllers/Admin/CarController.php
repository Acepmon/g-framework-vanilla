<?php

namespace App\Http\Controllers\Admin;

use Artisan;
use Auth;
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

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type = Input::get('type', 'post');
        Session::flash('type', $type);
        $contents = Content::where('type', $type)->get();
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
            'carTitle' => 'required|max:255',
            'manufacturer' => 'required|max:255',
            'carCondition' => 'required|max:255',
            'model' => 'required|max:255',
            'color' => 'required|max:255',
            'displacement' => 'required|max:255',
            'vin' => 'required|max:255',
            'yearOfProduct' => 'required|max:255',
            'yearOfEntry' => 'required|max:255',
            'lastCheck' => 'required|max:255',
            'transmission' => 'required|max:255',
            'steeringWheel' => 'required|max:255',
            'seating' => 'required|max:255',
            'typeOfFuel' => 'required|max:255',
            'wheelDrive' => 'required|max:255',
            'millage' => 'required|max:255',
            'sellerDescription' => 'required|max:255',
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

            $value = new \stdClass;
            $value->datetime = time();
            $value->user = Auth::user();
            $value->carTitle = $request->carTitle;
            $value->manufacturer = $request->manufacturer;
            $value->carCondition = $request->carCondition;
            $value->model = $request->model;
            $value->color = $request->color;
            $value->displacement = $request->displacement;
            $value->vin = $request->vin;
            $value->yearOfProduct = $request->yearOfProduct;
            $value->yearOfEntry = $request->yearOfEntry;
            $value->lastCheck = $request->lastCheck;
            $value->transmission = $request->transmission;
            $value->steeringWheel = $request->steeringWheel;
            $value->seating = $request->seating;
            $value->typeOfFuel = $request->typeOfFuel;
            $value->wheelDrive = $request->wheelDrive;
            $value->millage = $request->millage;
            $value->advantages = $request->advantages;
            $value->sellerDescription = $request->sellerDescription;

            $content_meta = new ContentMeta();
            $content_meta->content_id = $content->id;
            $content_meta->key = 'car';
            $content_meta->value = json_encode($value);
            $content_meta->save();

            DB::commit();
            return redirect()->route('admin.cars.index', ['type' => $content->type]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.cars.create')->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = Input::get('type', NULL);
        $content = Content::find($id);
        return view('admin.cars.show', ['content' => $content, 'type' => $type]);
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
        $users = User::all();
        $metas = $content->metas;

        $viewPath = Config::where('key', 'content.'.$content->type.'s.rootPath')->first()->value;
        $revision_path = $viewPath . DIRECTORY_SEPARATOR . $content->currentView() . '.blade.php';
        return view('admin.cars.edit', ['content' => $content, 'users' => $users, 'metas' => $metas, 'revision_path' => $revision_path]);
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
        $old_content = $content;

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
            'author_id' => 'required|integer|exists:users,id'
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

            $updated_at = $content->updated_at;
            $old_terms = $content->terms;
            $old_name = $content->metas->last()->revisionView();
            $content->save();
            $content->terms()->sync($request->input('tags'));
            $content->terms()->attach($request->input('category'));

            $updated = $updated_at != $content->updated_at || $content->terms != $old_terms;
            if ($updated)
            {
                $value = new \stdClass;
                $time = time();
                $value->datetime = $time;
                $value->filename_changed = ($old_slug != $content->slug);
                $value->before = $old_content;
                $value->after = $content;
                $value->user = Auth::user();

                $content_meta = new ContentMeta();
                $content_meta->content_id = $content->id;
                $content_meta->key = 'revision';
                $content_meta->value = json_encode($value);
                $content_meta->save();

                $viewPath = Config::where('key', 'content.'.$content->type.'s.viewPath')->first()->value;
                $viewPath = str_replace('.', '/', 'views.' . $viewPath);
                $name = $content->slug . Content::NAMING_CONVENTION . $content->status . Content::NAMING_CONVENTION . $time;
                $filename = $viewPath . '/' . $old_name . '.blade.php';
                $newname = $viewPath . '/' . $name . '.blade.php';
                copy(resource_path($filename), resource_path($newname));
            }

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
        $type = Content::findORFail($id)->type;
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
