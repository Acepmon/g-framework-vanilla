<?php

namespace Modules\Content\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Advertisement\Entities\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $status = $request->input('status', 'active');

        $banners = Banner::where('status', $status);

        if ($request->has('location_id')) {
            $banners = $banners->where('location_id', $request->input('location_id'));
        }

        $banners = $banners->get();
        $banners->transform(function ($banner) {
            return [
                "id" => $banner->id,
                "title" => $banner->title,
                "banner" => $banner->banner,
                "link" => $banner->link,
                "status" => $banner->status,
                "starts_at" => $banner->starts_at,
                "ends_at" => $banner->ends_at,
                "created_at" => $banner->created_at,
                "updated_at" => $banner->updated_at,
                "location" => $banner->location
            ];
        });

        return response()->json($banners);
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
     * @param  \Modules\Advertisement\Entities\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        return response()->json($banner);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Modules\Advertisement\Entities\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Modules\Advertisement\Entities\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        //
    }
}
