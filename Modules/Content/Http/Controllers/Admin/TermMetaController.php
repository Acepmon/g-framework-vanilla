<?php

namespace Modules\Content\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Route;
use App\Term;
use App\TermMeta;
use App\TermTaxonomy;

class TermMetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $taxonomy = TermTaxonomy::findOrFail(Route::current()->parameter('taxonomy'));
        return view('admin.taxonomy.metas.index', ['taxonomy' => $taxonomy]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $taxonomy = TermTaxonomy::findOrFail(Route::current()->parameter('taxonomy'));
        return view('admin.taxonomy.metas.create', ['taxonomy' => $taxonomy]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'key' => 'required|max:100|unique:term_metas,key',
            'value' => 'required|max:255'
        ]);

        $taxonomy = TermTaxonomy::findOrFail(Route::current()->parameter('taxonomy'));
        try {
            $meta = new TermMeta();
            $meta->term_id = $taxonomy->term->id;
            $meta->key = $request->input('key');
            $meta->value = $request->input('value');
            $meta->save();

            return redirect()->route('admin.taxonomy.show', ['id' => $taxonomy->id])->with('success', 'Successfully created');
        } catch (\Exception $e) {
            return redirect()->route('admin.taxonomy.metas.create', ['taxonomy' => $taxonomy])->with('error', $e->getMessage());
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
        return view('admin.taxonomy.metas.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $meta = TermMeta::findOrFail(Route::current()->parameter('meta'));
        $taxonomy = TermTaxonomy::findOrFail(Route::current()->parameter('taxonomy'));
        return view('admin.taxonomy.metas.edit', ['taxonomy' => $taxonomy, 'meta' => $meta]);
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
        //
        $meta = TermMeta::findOrFail(Route::current()->parameter('meta'));
        $taxonomy = TermTaxonomy::findOrFail(Route::current()->parameter('taxonomy'));
        $request->validate([
            'key' => 'required|max:100|unique:term_metas,key',
            'value' => 'required|max:255'
        ]);

        try {
            $meta->key = $request->input('key');
            $meta->value = $request->input('value');
            $meta->save();

            return redirect()->route('admin.taxonomy.show', ['id' => $taxonomy->id])->with('success', 'Successfully created');
        } catch (\Exception $e) {
            return redirect()->route('admin.taxonomy.metas.edit', ['taxonomy' => $taxonomy, 'meta' => $meta])->with('error', $e->getMessage());
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
        //
        TermMeta::destroy(Route::current()->parameter('meta'));
        $taxonomy = TermTaxonomy::findOrFail(Route::current()->parameter('taxonomy'));
        return view('admin.taxonomy.show', ['term_taxonomy' => $taxonomy]);
    }
}
