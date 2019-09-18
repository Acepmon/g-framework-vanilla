<?php

namespace App\Http\Controllers\Admin;

use App\Banner;
use App\BannerLocation;
use App\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('location_id')) {
            $data = [
                'banners' => Banner::where('location_id', $request->input('location_id'))->get(),
                'location' => BannerLocation::find($request->input('location_id'))
            ];
        } else {
            $data = [
                'banners' => Banner::all(),
            ];
        }

        return view('admin.banners.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = BannerLocation::all();
        $pages = Content::where('type', Content::TYPE_PAGE)->get();

        return view('admin.banners.create', ['locations' => $locations, 'pages' => $pages]);
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
            'banner' => 'required|file',
            'link' => 'required',
            'location_id' => 'required|exists:banner_locations,id',
            'status' => 'nullable',
            'starts_at' => 'required|datetime',
            'ends_at' => 'required|datetime'
        ]);

        $banner = new Banner();
        $banner->title = $request->input('title');

        if ($request->hasFile('banner_img_mobile') && $request->has('banner_img_mobile_cropped')) {
            $filename = $this->saveBase64Image($request->input('banner_img_mobile_cropped'), $request->banner_img_mobile->getMimeType(), $request->banner_img_mobile->extension());
            $banner->banner_img_mobile = url(Storage::url($filename));
        }

        if ($request->hasFile('banner_img_web') && $request->has('banner_img_web_cropped')) {
            $filename = $this->saveBase64Image($request->input('banner_img_web_cropped'), $request->banner_img_web->getMimeType(), $request->banner_img_web->extension());
            $banner->banner_img_web = url(Storage::url($filename));
        }

        $banner->save();

        return back()->with('status', 'Banner Successfully created! <a href="'.route('admin.banners.show', $banner->id).'">Click here</a> to go to details page.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        return view('admin.banners.show', ['banner' => $banner]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        $pages = Content::where('type', Content::TYPE_PAGE)->get();
        $lastOrder = Banner::orderBy('order', 'desc')->first()->order;

        return view('admin.banners.edit', ['pages' => $pages, 'lastOrder' => $lastOrder, 'banner' => $banner]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'title' => 'nullable|max:191',
        ]);

        if ($request->has('title')) {
            $banner->title = $request->input('title');
        }

        if ($request->has('btn_show')) {
            $banner->btn_show = $request->input('btn_show');
        }

        if ($request->has('btn_text')) {
            $banner->btn_text = $request->input('btn_text');
        }

        if ($request->has('btn_link')) {
            $banner->btn_link = $request->input('btn_link');
        }

        if ($request->has('order')) {
            $banner->order = $request->input('order');
        }

        if ($request->has('active')) {
            $banner->active = $request->input('active');
        }

        if ($request->has('banner_img_mobile_remove')) {
            $banner->banner_img_mobile = null;
        } else if ($request->hasFile('banner_img_mobile') && $request->has('banner_img_mobile_cropped')) {
            $filename = $this->saveBase64Image($request->input('banner_img_mobile_cropped'), $request->banner_img_mobile->getMimeType(), $request->banner_img_mobile->extension());
            $banner->banner_img_mobile = url(Storage::url($filename));
        }

        if ($request->has('banner_img_web_remove')) {
            $banner->banner_img_web = null;
        } else if ($request->hasFile('banner_img_web') && $request->has('banner_img_web_cropped')) {
            $filename = $this->saveBase64Image($request->input('banner_img_web_cropped'), $request->banner_img_web->getMimeType(), $request->banner_img_web->extension());
            $banner->banner_img_web = url(Storage::url($filename));
        }

        $banner->save();

        if ($request->ajax()) {
            return response()->json($banner);
        } else {
            return back()->with('status', 'Successfully Saved!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Banner $banner)
    {
        $banner->delete();

        if ($request->ajax()) {
            return response()->json(['status' => 'Banner Removed!']);
        } else {
            return redirect()->route('admin.banners.index')->with('status', 'Successfully Removed!');
        }
    }

    private function saveBase64Image($base64, $imageType, $extension)
    {
        $base64 = str_replace('data:'.$imageType.';base64,', '', $base64);
        $base64 = str_replace(' ', '+', $base64);
        $filename = str_random(10).'.'.$extension;
        $storagePath = storage_path('app/public/banners/');

        if (!File::exists($storagePath)) {
            File::makeDirectory($storagePath);
        }

        if (File::put($storagePath . DIRECTORY_SEPARATOR . $filename, base64_decode($base64))) {
            return 'banners/'. $filename;
        }
    }
}
