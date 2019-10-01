<?php

namespace App\Http\Controllers\Ajax;

use App\ContentMeta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContentMetaController extends Controller
{
    public function createMeta(Request $request, ContentMeta $contentMeta)
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
}
