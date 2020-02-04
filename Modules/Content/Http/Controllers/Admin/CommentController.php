<?php

namespace Modules\Content\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $comments = Comment::all();
        return view('admin.comments.index', ['comments' => $comments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.comments.create');
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
        $request->validate([
            'parent_id' => 'nullable|integer|exists:comments,id',
            'content' => 'required',
            'type' => 'required|max:50',
            'author_id' => 'required|integer|exists:users,id',
            'author_ip' => 'required|max:50',
            'author_name' => 'required|max:100',
            'author_email' => 'required|max:191',
            'author_avatar' => 'required|max:255',
            'author_user_agent' => 'required|max:255',
            'commentable_id' => 'required|integer',
            'commentable_type' => 'required|max:191'
        ]);

        try {
            $comment = new Comment();
            $comment->parent_id = $request->parent_id;
            $comment->content = $request->content;
            $comment->type = $request->type;
            $comment->author_id = $request->author_id;
            $comment->author_ip = $request->author_ip;
            $comment->author_name = $request->author_name;
            $comment->author_email = $request->author_email;
            $comment->author_avatar = $request->author_avatar;
            $comment->author_user_agent = $request->author_user_agent;
            $comment->commentable_id = $request->commentable_id;
            $comment->commentable_type = $request->commentable_type;
            $comment->save();

            return redirect()->route('admin.comments.index');
        } catch (\Exception $e) {
            return redirect()->route('admin.comments.create')->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $comment = Comment::findOrFail($id);
        return view('admin.comments.show', ['comment' => $comment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Comment::destroy($id);
        // return redirect()->route('admin.comments.index');
        return redirect()->back();
    }
}
