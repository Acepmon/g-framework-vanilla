<?php

namespace Modules\Car\Http\Controllers\API\v1;

use App\Content;
use App\ContentMeta;
use App\User;
use App\Entities\ContentManager;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('car::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('car::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
        try {
            DB::beginTransaction();
            $authUser = auth('api')->user();
            
            $content = new Content();
            $title = $request->input('title', 'Sample Car');
            $slug = $request->input('slug', Str::uuid());
            $type = $request->input('type', Content::TYPE_CAR);
            $status = $request->input('status', Content::STATUS_DRAFT);
            $visibility = $request->input('visibility', Content::VISIBILITY_PRIVATE);
            $author_id = $authUser->id;

            $content->title = $title;
            $content->slug = $slug;
            $content->type = $type;
            $content->status = $status;
            $content->visibility = $visibility;
            $content->author_id = $author_id;
            $content->save();
            DB::commit();

            $resp = ContentManager::contentToArray($content);
            return response()->json($resp);
        } catch (\Exception $e) {
            DB::rollBack();
            abort(500, 'Something went wrong!');
        }
    }

    public function syncMetas(Request $request) {
        $content_id = $request->route('car');

        $data = ContentManager::discernMetasFromRequest($request->input());
        ContentManager::syncMetas($content_id, $data);

        return response()->json($data);
    }

    public function attachMedias(Request $request) {
        $content_id = $request->route('car');

        $media_list = $this->uploadFiles($request->medias);
        $media_list = ['medias' => $media_list];
        ContentManager::attachMetas($content_id, $media_list);

        return response()->json($media_list);
    }

    public function attachDoc(Request $request) {
        $content_id = $request->route('car');

        $doc_list = $this->uploadFiles($request->doc);
        $doc_list = ['medias' => $doc_list];
        ContentManager::attachMetas($content_id, $doc_list);

        return response()->json($doc_list);
    }
    
    public function uploadFiles($files) {
        $medias = [];
        if (is_array($files)) {
            foreach ($files as $file) {
                if ($file) {
                    $filename = $file->store('public/medias', 'ftp');
                    $filename = 'http://66.181.167.116:3000/' . $filename;
                    array_push($medias, $filename);
                }
            }
        } else if($files) {
            $filename = $files->store('public/medias', 'ftp');
            $filename = 'http://66.181.167.116:3000/' . $filename;
            array_push($medias, $filename);
        }
        return $medias;
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('car::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('car::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
        try {
            $content = Content::find($id);
            DB::beginTransaction();
            $authUser = auth('api')->user();

            if ($authUser->id == $content->author_id) {
                if ($request->has('title')) {
                    $content->title = $request->input('title');
                }
                if ($request->has('slug')) {
                    $content->slug = $request->input('slug');
                }
                if ($request->has('type')) {
                    $content->type = $request->input('type');
                }
                if ($request->has('status')) {
                    $content->status = $request->input('status');
                }
                if ($request->has('visibility')) {
                    $content->visibility = $request->input('visibility');
                }
                $content->save();
            }
            DB::commit();

            $resp = ContentManager::contentToArray($content);
            return response()->json($resp);
        } catch (\Exception $e) {
            DB::rollBack();
            abort(500, 'Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        $authUser = auth('api')->user();
        $content = Content::findOrFail($id);

        if ($authUser->id == $content->author_id) {
            $content->metas()->delete();
            Content::destroy($id);
        }

        return response()->json([]);
    }
}
