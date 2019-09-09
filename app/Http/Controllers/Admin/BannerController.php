<?php

namespace App\Http\Controllers\Admin;

use App\Banner;
use App\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::orderBy('order', 'asc')->get();

        return view('admin.banners.index', ['banners' => $banners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = Content::where('type', Content::TYPE_PAGE)->get();
        $lastOrder = Banner::orderBy('order', 'desc')->first()->order;

        return view('admin.banners.create', ['pages' => $pages, 'lastOrder' => $lastOrder]);
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
            'btn_show' => 'nullable|boolean',
            'btn_text' => 'nullable|max:255',
            'btn_link' => 'nullable|max:255',
            'banner_img_mobile' => 'nullable|file',
            'banner_img_web' => 'nullable|file',
            'order' => 'nullable|numeric',
            'active' => 'nullable|boolean'
        ]);

        $banner = new Banner();
        $banner->title = $request->input('title');
        $banner->btn_show = $request->input('btn_show', false);
        $banner->btn_text = $request->input('btn_text', null);
        $banner->btn_link = $request->input('btn_link', null);
        $banner->order = $request->input('order', 0);
        $banner->active = $request->input('active', false);

        if ($request->hasFile('banner_img_mobile')) {
            $mobile_path = $request->banner_img_mobile->store('public/banners');
            $mobile_path = url(\Storage::url($mobile_path));
            $banner->banner_img_mobile = $mobile_path;
        }

        if ($request->hasFile('banner_img_web')) {
            $web_path = $request->banner_img_web->store('public/banners');
            $web_path = url(\Storage::url($web_path));
            $banner->banner_img_web = $web_path;
        }

        $banner->save();

        return back()->with('status', 'Banner Successfully created!');
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
        return view('admin.banners.edit', ['banner' => $banner]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        //
    }
}
