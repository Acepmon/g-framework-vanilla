<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use App\Page_metas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Route;

class PageMetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.metas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $page = Page::findOrFail($id);
        $pages = Page::all();
        return view('admin.pages.metas.create', ['pages' => $pages], ['page' => $page]);
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
            'key' => 'required|max:100|unique:page_metas,key',
            'value' => 'required|max:255'
        ]);
        
        $page_id = Route::current()->parameter('page');
        try {
            $page_metas = new Page_metas();
            $page_metas->page_id = $page_id;
            $page_metas->key = $request->input('key');
            $page_metas->value = $request->input('value');
            $page_metas->save();

            $page = Page::findOrFail($page_id);
            return redirect()->route('admin.pages.edit', ['id' => $page->id]);
        } catch (\Exception $e) {
            $page = Page::findOrFail($page_id);
            return redirect()->route('admin.pages.edit', ['id' => $page->id])->with('error', $e->getMessage());
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
        $meta = Page_metas::findOrFail($meta_id);
        return view('admin.pages.metas.edit', ['meta' => $meta]);
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

        $page_id = Route::current()->parameter('page');
        $meta_id = Route::current()->parameter('meta');
        $page_metas = Page_metas::findOrFail($meta_id);

        $page_metas->key = $request->input('key');
        $page_metas->value = $request->input('value');

        $page_metas->save();
        $page = Page::findOrFail($page_id);
        return redirect()->route('admin.pages.edit', ['id' => $page->id]);
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
        $page = Route::current()->parameter('page');
        Page_metas::destroy($meta);
        return redirect()->route('admin.pages.edit', ['id' => $page]);
    }
}
