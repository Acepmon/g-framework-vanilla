<?php

namespace App\Http\Controllers\Admin;

use App\BannerLocation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        return view('admin.banners.locations.index', ['locations' => $locations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banners.locations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:191',
            'width' => 'required|numeric',
            'height' => 'required|numeric',
            'type' => 'required|in:' . implode(',', BannerLocation::TYPE_ARRAY)
        ]);

        $location = new BannerLocation();

        if ($request->has('title')) {
            $location->title = $request->input('title');
        }

        if ($request->has('width')) {
            $location->width = $request->input('width');
        }

        if ($request->has('height')) {
            $location->height = $request->input('height');
        }

        if ($request->has('type')) {
            $location->type = $request->input('type');
        }

        $location->save();

        if ($request->ajax()) {
            return response()->json($location);
        } else {
            return redirect()->route('admin.banners.locations.index', $location->id)->with('status', 'Successfully saved!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BannerLocation  $location
     * @return \Illuminate\Http\Response
     */
    public function show(BannerLocation $location)
    {
        return view('admin.banners.locations.show', ['location' => $location]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BannerLocation  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(BannerLocation $location)
    {
        return view('admin.banners.locations.edit', ['location' => $location]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BannerLocation  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BannerLocation $location)
    {
        $request->validate([
            'title' => 'nullable|max:191',
            'width' => 'nullable|numeric',
            'height' => 'nullable|numeric',
            'type' => 'nullable|in:' . implode(',', BannerLocation::TYPE_ARRAY)
        ]);

        if ($request->has('title')) {
            $location->title = $request->input('title');
        }

        if ($request->has('width')) {
            $location->width = $request->input('width');
        }

        if ($request->has('height')) {
            $location->height = $request->input('height');
        }

        if ($request->has('type')) {
            $location->type = $request->input('type');
        }

        $location->save();

        if ($request->ajax()) {
            return response()->json($location);
        } else {
            return redirect()->route('admin.banners.locations.edit', $location->id)->with('status', 'Successfully saved!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BannerLocation  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, BannerLocation $location)
    {
        $location->delete();

        if ($request->ajax()) {
            return response()->json(['status' => 'location Removed!']);
        } else {
            return redirect()->route('admin.banners.locations.index')->with('status', 'Successfully Removed!');
        }
    }
}
