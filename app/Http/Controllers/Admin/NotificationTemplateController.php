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
        return view('admin.notifications.templates.create', ['types' => NotificationTemplate::TYPE_ARRAY]);
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
            'type' => 'required|in:' . implode(',', NotificationTemplate::TYPE_ARRAY)
        ]);

        $notificationTemplate = new NotificationTemplate();
        $notificationTemplate->title = $request->input('title');
        $notificationTemplate->type = $request->input('type');
        $notificationTemplate->save();

        return redirect()->route('admin.notifications.templates.index')->with('status', 'Successfully added new notification template.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NotificationTemplate  $notificationTemplate
     * @return \Illuminate\Http\Response
     */
    public function show(NotificationTemplate $notificationTemplate)
    {
        return view('admin.notifications.templates.show', ['template' => $notificationTemplate]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NotificationTemplate  $notificationTemplate
     * @return \Illuminate\Http\Response
     */
    public function edit(NotificationTemplate $notificationTemplate)
    {
        return view('admin.notifications.templates.edit', ['template' => $notificationTemplate]);
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
        $request->validate([
            'title' => 'required|max:191',
            'type' => 'required|in:' . implode(',', NotificationTemplate::TYPE_ARRAY),
            'body' => 'nullable'
        ]);

        $notificationTemplate->title = $request->input('title');
        $notificationTemplate->type = $request->input('type');
        $notificationTemplate->body = $request->input('body');
        $notificationTemplate->save();

        return redirect()->route('admin.notifications.templates.index')->with('status', 'Successfully added new notification template.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NotificationTemplate  $notificationTemplate
     * @return \Illuminate\Http\Response
     */
    public function destroy(NotificationTemplate $notificationTemplate)
    {
        $notificationTemplate->delete();

        return redirect()->route('admin.notifications.templates.index')->with('status', 'Removed notification template.');
    }
}
