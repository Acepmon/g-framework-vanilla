<?php

namespace App\Http\Controllers\Admin;

use App\NotificationTrigger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationTriggerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.notifications.triggers.index', ['triggers' => NotificationTrigger::all()]);
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
     * @param  \App\NotificationTrigger  $notificationTrigger
     * @return \Illuminate\Http\Response
     */
    public function show(NotificationTrigger $notificationTrigger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NotificationTrigger  $notificationTrigger
     * @return \Illuminate\Http\Response
     */
    public function edit(NotificationTrigger $notificationTrigger)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NotificationTrigger  $notificationTrigger
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NotificationTrigger $notificationTrigger)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NotificationTrigger  $notificationTrigger
     * @return \Illuminate\Http\Response
     */
    public function destroy(NotificationTrigger $notificationTrigger)
    {
        //
    }
}
