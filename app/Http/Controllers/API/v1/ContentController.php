<?php

namespace App\Http\Controllers\API\v1;

use App\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $authUser = auth('api')->user();

        $type = $request->input('type', Content::TYPE_POST);
        $status = $request->input('status', Content::STATUS_PUBLISHED);
        $visibility = $request->input('visibility', Content::VISIBILITY_PUBLIC);
        $limit = $request->input('limit', 10);

        $inputExcept = ['type', 'status', 'visibility', 'limit', 'page', 'author_id'];
        $metaInputs = array_filter($request->input(), function ($key) use ($inputExcept) {
            return !in_array($key, $inputExcept);
        }, ARRAY_FILTER_USE_KEY);

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

        $contents->getCollection()->transform(function ($content) use ($authUser) {
            if (isset($authUser)) {
                $interested = $authUser->metas()->where('key', 'interestedCars')->where('value', $content->id)->count();
                return [
                    "id" => $content->id,
                    "title" => $content->title,
                    "slug" => $content->slug,
                    "type" => $content->type,
                    "status" => $content->status,
                    "visibility" => $content->visibility,
                    "author" => $content->author,
                    "created_at" => $content->created_at,
                    "updated_at" => $content->updated_at,
                    "authInterested" => $interested ? true : false,
                    "meta" => $content->metasTransform(),
                ];
            } else {
                return [
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
            }
        });

        return response()->json($contents);
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
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        return response()->json([
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
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Content $content)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        //
    }
}
