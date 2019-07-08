<?php

namespace App\Http\Controllers\Admin;

use App\NotificationChannel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.notifications.channels.index', ['channels' => NotificationChannel::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\NotificationChannel  $notificationChannel
     * @return \Illuminate\Http\Response
     */
    public function show(NotificationChannel $notificationChannel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NotificationChannel  $notificationChannel
     * @return \Illuminate\Http\Response
     */
    public function edit(NotificationChannel $notificationChannel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NotificationChannel  $notificationChannel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NotificationChannel $notificationChannel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NotificationChannel  $notificationChannel
     * @return \Illuminate\Http\Response
     */
    public function destroy(NotificationChannel $notificationChannel)
    {
        //
    }
}
