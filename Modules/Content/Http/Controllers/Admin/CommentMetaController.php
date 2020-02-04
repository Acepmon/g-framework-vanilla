<?php

namespace Modules\Content\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rule;

use Route;
use App\Comment;
use App\CommentMeta;

class CommentMetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $comment = Comment::findOrFail(Route::current()->parameter('comment'));
        return view('admin.comments.metas.index', ['comment' => $comment]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $comment = Comment::findOrFail(Route::current()->parameter('comment'));
        return view('admin.comments.metas.create', ['comment' => $comment]);
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
            'key' => 'required|max:100|unique:comment_metas,key',
            'value' => 'required|max:255'
        ]);

        $comment_id = Route::current()->parameter('comment');
        $comment = Comment::findOrFail($comment_id);
        try {
            $meta = new CommentMeta();
            $meta->comment_id = $comment_id;
            $meta->key = $request->input('key');
            $meta->value = $request->input('value');
            $meta->save();

            return redirect()->route('admin.comments.show', ['id' => $comment->id]);
        } catch (\Exception $e) {
            return redirect()->route('admin.comments.show', ['id' => $comment->id])->with('error', $e->getMessage());
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
        $comment_id = Route::current()->parameter('comment');
        $comment = Comment::findOrFail($comment_id);
        $meta_id = Route::current()->parameter('meta');
        $meta = CommentMeta::findOrFail($meta_id);
        return view('admin.comments.metas.edit', ['comment' => $comment, 'meta' => $meta]);
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
        $comment_id = Route::current()->parameter('comment');
        $comment = Comment::findOrFail($comment_id);
        $meta_id = Route::current()->parameter('meta');
        $meta = CommentMeta::findOrFail($meta_id);
        $request->validate([
            'key' => ['required', 'max:100', Rule::unique('comment_metas')->ignore($meta->id, 'id')],
            'value' => 'required|max:255'
        ]);

        try {
            $meta->key = $request->input('key');
            $meta->value = $request->input('value');
            $meta->save();

            return redirect()->route('admin.comments.show', ['id' => $comment->id]);
        } catch (\Exception $e) {
            return redirect()->route('admin.comments.show', ['id' => $comment->id])->with('error', $e->getMessage());
        }
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
        CommentMeta::destroy(Route::current()->parameter('meta'));
        return redirect()->route('admin.comments.show', ['id' => Route::current()->parameter('comment')]);
    }
}
