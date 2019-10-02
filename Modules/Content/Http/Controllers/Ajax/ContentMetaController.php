<?php

namespace Modules\Content\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Content;
use App\ContentMeta;
use App\Entities\ContentManager;

class ContentMetaController extends Controller
{
    public function createMeta(Request $request) {
        $content_id = $request->route('contentId');
        $content = Content::find($content_id);

        $data = ContentManager::discernMetasFromRequest($request->input());

        foreach($data as $key=>$value) {
            ContentManager::addMeta($content_id, $key, $value);
        }

        return response()->json($data);
    }

    public function updateMeta(Request $request) {
        $content_id = $request->route('contentId');
        $content = Content::find($content_id);

        $key = $request->key;
        $value = $request->value;
        $newValue = $request->newValue;

        $meta = ContentManager::updateMeta($content_id, $key, $value, $newValue);

        return response()->json($meta);
    }

    public function deleteMeta(Request $request) {
        $content_id = $request->route('contentId');
        $content = Content::find($content_id);

        $key = $request->key;
        $value = $request->value;

        ContentManager::deleteMeta($content_id, $key, $value);

        return response()->json(["key"=>$key, "value"=>$value]);
    }

    public function syncMetas(Request $request) {
        $content_id = $request->route('contentId');
        $content = Content::find($content_id);

        $data = ContentManager::discernMetasFromRequest($request->input());
        ContentManager::syncMetas($content_id, $data);

        return response()->json($data);
    }

    public function attachMetas(Request $request) {
        $content_id = $request->route('contentId');
        $content = Content::find($content_id);

        $data = ContentManager::discernMetasFromRequest($request->input());
        ContentManager::attachMetas($content_id, $data);

        return response()->json($data);
    }

    public function detachMetas(Request $request) {
        $content_id = $request->route('contentId');
        $content = Content::find($content_id);

        $data = ContentManager::discernMetasFromRequest($request->input());
        ContentManager::detachMetas($content_id, $data);

        return response()->json($data);
    }
}
