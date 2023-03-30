<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $comments = Comment::orderBy('author','DESC')->paginate(5);
        return view('admin.comment.index',compact('comments'));
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $comment = Comment::create($request->all());
        $request->validate(['path' => 'required|image|mimes:jpeg,png,jpg',]);
        $path = 'img/avatar_author/'.$comment->id.'.jpg';
        $request->path->move(public_path('img/avatar_author/'), $path);
        return back();
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $comment = Comment::find($request->id);
        $comment->author = $request->author;
        $comment->comment = $request->comment;
        $comment->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Comment $comment)
    {
        if (file_exists('img/avatar_author/'.$comment->id.'.jpg')){
            unlink('img/avatar_author/'.$comment->id.'.jpg');
        }

        $comment->delete();
        return back();
    }
    public function avatar(Request $request)
    {
        $request->validate(['path' => 'required|image|mimes:jpeg,png,jpg',]);
        $path = 'img/avatar_author/'.$request->avatar_id.'.jpg';
        $request->path->move(public_path('img/avatar_author/'), $path);
        return back();
    }
}
