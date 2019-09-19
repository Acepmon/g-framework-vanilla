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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BannerLocation  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(BannerLocation $location)
    {
        //
    }
}
