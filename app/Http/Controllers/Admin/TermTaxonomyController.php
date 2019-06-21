<?php

namespace App\Http\Controllers\Admin;

use App\Term;
use App\TermTaxonomy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class TermTaxonomyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $taxonomy = Input::get('taxonomy', '');
        if ($taxonomy == '') {
            $taxonomy = session('taxonomy');
        }
        session(['taxonomy' => $taxonomy]);
        $term_taxonomies = TermTaxonomy::where('taxonomy', $taxonomy)->get();
        return view('admin.terms.index', ['term_taxonomies' => $term_taxonomies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $term_taxonomy = TermTaxonomy::findOrFail($id);
        return view('admin.terms.show', ['term_taxonomy' => $term_taxonomy]);
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
        $term_taxonomy = TermTaxonomy::findOrFail($id);
        TermTaxonomy::destroy($id);
        // Term::destroy($term_taxonomy->term->id);
        return redirect()->route('admin.terms.index');
    }
}
