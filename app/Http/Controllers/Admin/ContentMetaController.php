<?php

namespace App\Http\Controllers\Admin;

use App\Content;
use App\Content_metas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Route;

class ContentMetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.contents.metas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $content = Content::findOrFail($id);
        $contents = Content::all();
        return view('admin.contents.metas.create', ['contents' => $contents], ['content' => $content]);
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
            'key' => 'required|max:100|unique:content_metas,key',
            'value' => 'required|max:255'
        ]);
        
        $content_id = Route::current()->parameter('content');
        try {
            $content_metas = new Content_metas();
            $content_metas->content_id = $content_id;
            $content_metas->key = $request->input('key');
            $content_metas->value = $request->input('value');
            $content_metas->save();

            $content = Content::findOrFail($content_id);
            return redirect()->route('admin.contents.edit', ['id' => $content->id]);
        } catch (\Exception $e) {
            $content = Content::findOrFail($content_id);
            return redirect()->route('admin.contents.edit', ['id' => $content->id])->with('error', $e->getMessage());
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $meta_id = Route::current()->parameter('meta');
        $meta = Content_metas::findOrFail($meta_id);
        $content_id = Route::current()->parameter('content');
        $content = Content::findOrFail($content_id);
        return view('admin.contents.metas.edit', ['content' => $content, 'meta' => $meta]);
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
        $request->validate([
            'key' => 'required|max:100',
            'value' => 'required|max:255'
        ]);

        $content_id = Route::current()->parameter('content');
        $meta_id = Route::current()->parameter('meta');
        $content_metas = Content_metas::findOrFail($meta_id);

        $content_metas->key = $request->input('key');
        $content_metas->value = $request->input('value');

        $content_metas->save();
        $content = Content::findOrFail($content_id);
        return redirect()->route('admin.contents.edit', ['content' => $content->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meta = Route::current()->parameter('meta');
        $content = Route::current()->parameter('content');
        Content_metas::destroy($meta);
        return redirect()->route('admin.contents.edit', ['id' => $content]);
    }
}
