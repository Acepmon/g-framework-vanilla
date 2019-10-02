<?php

namespace Modules\System\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Banner;
use App\BannerLocation;
use App\Content;
use File;
use Storage;
use Carbon\Carbon;

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
            'link' => 'nullable',
            'location' => 'required|exists:banner_locations,id',
            'status' => 'nullable',
            'schedule' => 'required',
        ]);

        $schedule = explode('-', $request->input('schedule'));

        $banner = new Banner();
        $banner->title = $request->input('title');
        $banner->link = $request->input('link');
        $banner->location_id = $request->input('location');
        $banner->status = $request->input('status', 'draft');
        $banner->starts_at = Carbon::parse(trim($schedule[0]));
        $banner->ends_at = Carbon::parse(trim($schedule[1]));

        if ($request->hasFile('banner') && $request->has('banner_cropped')) {
            $filename = $this->saveBase64Image($request->input('banner_cropped'), $request->banner->getMimeType(), $request->banner->extension());
            $banner->banner = url(Storage::url($filename));
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
        $locations = BannerLocation::all();
        $pages = Content::where('type', Content::TYPE_PAGE)->get();

        return view('admin.banners.edit', ['locations' => $locations, 'pages' => $pages, 'banner' => $banner]);
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

        if ($request->has('link')) {
            $banner->link = $request->input('link');
        }

        if ($request->has('location')) {
            $banner->location = $request->input('location');
        }

        if ($request->has('status')) {
            $banner->status = $request->input('status');
        }

        if ($request->has('starts_at')) {
            $banner->starts_at = $request->input('starts_at');
        }

        if ($request->has('ends_at')) {
            $banner->ends_at = $request->input('ends_at');
        }

        if ($request->has('banner_remove')) {
            $banner->banner = null;
        } else if ($request->hasFile('banner') && $request->has('banner_cropped')) {
            $filename = $this->saveBase64Image($request->input('banner_cropped'), $request->banner->getMimeType(), $request->banner->extension());
            $banner->banner = url(Storage::url($filename));
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
