<?php

namespace App\Http\Controllers\Admin;

use App\NotificationEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.notifications.events.index', ['events' => NotificationEvent::all()]);
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
     * @param  \App\NotificationEvent  $notificationEvent
     * @return \Illuminate\Http\Response
     */
    public function show(NotificationEvent $notificationEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NotificationEvent  $notificationEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(NotificationEvent $notificationEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NotificationEvent  $notificationEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NotificationEvent $notificationEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NotificationEvent  $notificationEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(NotificationEvent $notificationEvent)
    {
        //
    }
}
