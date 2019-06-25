<?php

namespace App\Http\Controllers\Admin;

use Artisan;
use Auth;
use Storage;
use App\Content;
use App\ContentMeta;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class ContentController extends Controller
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
        return view('admin.contents.index', ['contents' => $contents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.contents.create', ['users' => $users]);
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
            'author_id' => 'required|integer|exists:users,id'
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
            
            $content->terms()->sync($request->input('tags'));
            $content->terms()->attach($request->input('category'));

            $value = new \stdClass;
            $value->datetime = time();
            $value->filename_changed = true;
            $value->before = $content->slug;
            $value->after = $content->slug;
            $value->user = Auth::user();
            
            $content_meta = new ContentMeta();
            $content_meta->content_id = $content->id;
            $content_meta->key = 'initial';
            $content_meta->value = json_encode($value);
            $content_meta->save();

            // Create View
            Artisan::call("make:view", [
                'name' => 'admin.contents.' . $content->type . 's.' . $content->slug,
                '--extension' => $content->status . '.' . time() . '.blade.php',
                '--extends' => 'layous.admin',
                '--with-yields']);

            DB::commit();
            return redirect()->route('admin.contents.index', ['type' => $content->type]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.contents.create')->with('error', $e->getMessage());
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
        return view('admin.contents.show', ['content' => $content, 'type' => $type]);
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
        return view('admin.contents.edit', ['content' => $content, 'users' => $users, 'metas' => $metas]);
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

            $content->save();
            $content->terms()->sync($request->input('tags'));
            $content->terms()->attach($request->input('category'));

            $value = new \stdClass;
            $value->datetime = time();
            $value->filename_changed = ($old_slug != $content->slug);
            $value->before = $old_slug;
            $value->after = $content->slug;
            $value->user = Auth::user();

            $content_meta = new ContentMeta();
            $content_meta->content_id = $content->id;
            $content_meta->key = 'revision';
            $content_meta->value = json_encode($value);
            $content_meta->save();

            Artisan::call("make:view", [
                'name' => 'admin.contents.' . $content->type . 's.' . $content->slug,
                '--extension' => $content->status . '.' . time() . '.blade.php',
                '--extends' => 'layous.admin',
                '--with-yields']);

            DB::commit();
            return redirect()->route('admin.contents.index', ['type' => $content->type]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.contents.create')->with('error', $e->getMessage());
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
        Content::destroy($id);
        return redirect()->route('admin.contents.index');
    }

    public function revert($id)
    {
        $content = Content::findOrFail($id);
        $revision = Route::current()->parameter('revision');

        try {
            DB::beginTransaction();

            $revision = ContentMeta::findOrFail($revision);
            $revision_value = json_decode($revision->value);
            $slug = $revision_value->after;

            $value = new \stdClass;
            $value->datetime = time();
            $value->filename_changed = ($slug != $content->slug);
            $value->before = $content->slug;
            $value->after = $slug;
            $value->user = Auth::user();

            $content_meta = new ContentMeta();
            $content_meta->content_id = $content->id;
            $content_meta->key = 'revert';
            $content_meta->value = json_encode($revision_value);
            $content_meta->save();

            $filename = 'views/admin/contents/' . $revision->content->type . 's/' . $slug . '.' . $revision->content->status . '.' . $revision_value->datetime . '.blade.php';
            $newname = 'views/admin/contents/' . $revision->content->type . 's/' . $slug . '.' . $revision->content->status . '.' . time() . '.blade.php';
            copy(resource_path($filename), resource_path($newname));
            // Artisan::call("make:view", [
            //     'name' => 'admin.contents.' . $content->type . 's.' . $content->slug,
            //     '--extension' => $content->status . '.' . time() . '.blade.php',
            //     '--extends' => 'layous.admin',
            //     '--with-yields']);

            DB::commit();
            return redirect()->route('admin.contents.show', ['id' => $content->id]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.contents.show', ['id' => $content->id])->with('error', $e->getMessage());
        }
    }

    public function viewRevision($id)
    {
        $content = Content::findOrFail($id);
        $revision = ContentMeta::findOrFail(Route::current()->parameter('revision'));

        $revision_value = json_decode($revision->value);
        $revision_path = 'views/admin/contents/' . $revision->content->type . 's/' . $revision_value->after . '.' . $revision->content->status . '.' . $revision_value->datetime . '.blade.php';
        return view('admin.contents.revisions.show', ['content' => $content, 'revision' => $revision, 'revision_path' => $revision_path]);
    }

    public function updateRevision(Request $request)
    {
        $request->validate([
            'revision_path' => 'required',
            'content' => 'required'
        ]);

        try {
            $revision_path = $request->input('revision_path');
            $content = $request->input('content');
            echo $revision_path;
            Storage::disk('resource')->put($revision_path, $content);
            // return response()->json(["result" => "success"]);
            return redirect()->route('admin.contents.show', ['id' => $content->id]);
        } catch (\Exception $e) {
            abort(400);
        }
    }
}
