<?php

namespace App\Entities;

use App\Content;
use Illuminate\Http\Request;

class ContentManager
{
    //

    /**
     * Filter & Serialize mixed request of Content and ContentMetas to Content Object with ContentMeta subarray
     * @return Paginated Content
     */
    public static function serializeRequest(Request $request)
    {
        $type = $request->input('type', Content::TYPE_POST);
        $status = $request->input('status', Content::STATUS_PUBLISHED);
        $visibility = $request->input('visibility', Content::VISIBILITY_PUBLIC);
        $limit = $request->input('limit', 10);

        $metaInputs = self::discernMetasFromRequest($request->input());

        $contents = Content::where('type', $type)->where('status', $status)->where('visibility', $visibility);

        if ($request->has('author_id')) {
            $contents = $contents->where('author_id', $request->input('author_id'));
        }

        if (count($metaInputs) > 0) {
            $contents = $contents->whereHas('metas', function ($query) use ($metaInputs) {
                foreach ($metaInputs as $key => $value) {
                    $query->where('key', $key);
                    $query->where('value', $value);
                }
            });
        }

        $contents = $contents->paginate($limit);
        return $contents;
    }

    /**
     * Used to discern content metas from attributes of Content Model.
     * @return ContentMeta array, consisting of key, value pairs
     */
    public static function discernMetasFromRequest($input)
    {
        $inputExcept = ['type', 'status', 'visibility', 'limit', 'page', 'author_id'];
        $metaInputs = array_filter($input, function ($key) use ($inputExcept) {
            return !in_array($key, $inputExcept);
        }, ARRAY_FILTER_USE_KEY);
        return $metaInputs;
    }

    /**
     * Transform Content to json-ready array
     * Can take additional parameters to merge
     * @return content array
     */
    public static function contentToArray(Content $content, $additional = null)
    {
        $result = [
            "id" => $content->id,
            "title" => $content->title,
            "slug" => $content->slug,
            "type" => $content->type,
            "status" => $content->status,
            "visibility" => $content->visibility,
            "author" => $content->author,
            "created_at" => $content->created_at,
            "updated_at" => $content->updated_at,
            "meta" => $content->metasTransform(),
        ];
        if ($additional) {
            $result = array_merge($result, $additional);
        }
        return $result;
    }
}
