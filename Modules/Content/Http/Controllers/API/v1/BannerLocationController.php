<?php

namespace Modules\Content\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Advertisement\Entities\BannerLocation;

class BannerLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = BannerLocation::all();

        $locations->transform(function ($location) {
            return [
                "id" => $location->id,
                "title" => $location->title,
                "width" => $location->width,
                "height" => $location->height,
                "type" => $location->type,
                "banners" => $location->banners
            ];
        });

        return response()->json($locations);
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
     * @param  \Modules\Advertisement\Entities\BannerLocation  $bannerLocation
     * @return \Illuminate\Http\Response
     */
    public function show(BannerLocation $bannerLocation)
    {
        return response()->json([
            "id" => $bannerLocation->id,
            "title" => $bannerLocation->title,
            "width" => $bannerLocation->width,
            "height" => $bannerLocation->height,
            "type" => $bannerLocation->type,
            "banners" => $bannerLocation->banners
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Modules\Advertisement\Entities\BannerLocation  $bannerLocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BannerLocation $bannerLocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Modules\Advertisement\Entities\BannerLocation  $bannerLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(BannerLocation $bannerLocation)
    {
        //
    }
}
