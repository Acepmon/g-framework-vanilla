<?php

namespace App\Http\Controllers\Ajax;

use App\ContentMeta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContentMetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
     * @param  \App\ContentMeta  $contentMeta
     * @return \Illuminate\Http\Response
     */
    public function show(ContentMeta $contentMeta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContentMeta  $contentMeta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContentMeta $contentMeta)
    {
        //
        // PUT /ajax/contents/:id/metas/
        // key, value

        // $request->key
        // $request->value
        // $request->newValue

        $meta = ContentMeta::where('key', $request->key)->where('value', $request->value)->first();
        $meta->value = $request->newValue;
        $meta->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContentMeta  $contentMeta
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContentMeta $contentMeta)
    {
        //
    }
}
