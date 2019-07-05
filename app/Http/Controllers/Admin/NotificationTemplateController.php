<?php

namespace App\Http\Controllers\Admin;

use App\NotificationTemplate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.notifications.templates.index', ['templates' => NotificationTemplate::all()]);
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
     * @param  \App\NotificationTemplate  $notificationTemplate
     * @return \Illuminate\Http\Response
     */
    public function show(NotificationTemplate $notificationTemplate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NotificationTemplate  $notificationTemplate
     * @return \Illuminate\Http\Response
     */
    public function edit(NotificationTemplate $notificationTemplate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NotificationTemplate  $notificationTemplate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NotificationTemplate $notificationTemplate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NotificationTemplate  $notificationTemplate
     * @return \Illuminate\Http\Response
     */
    public function destroy(NotificationTemplate $notificationTemplate)
    {
        //
    }
}
