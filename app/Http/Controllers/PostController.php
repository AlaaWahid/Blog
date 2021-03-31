<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\posts\CreatePostsRequest;
use App\Http\Requests\posts\UpdatePostsRequest;
use Illuminate\Http\Request;
use App\Post;
use App\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.form')
            ->with('users', User::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::id();
        $post = new Post;
        $post->user_id = $user_id;
        $post->title = $request->input('title');
        $post->body = $request->input('body');

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/posts/', $filename);
            $post->image = $filename;
        }

        $post->save();
        return redirect(route('posts.index'))->with('success', 'Post saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

        return view('posts.show')
            ->with('post', $post)
            ->with('user', User::all())
            ->with('comments', Comment::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.form')
            ->with('post', $post)
            ->with('users', User::all());
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
        // $post->update([
        //     'title' => $request->title,
        //     'body' => $request->body,
        //     'user_id' => $request->user
        // ]);
        $post = Post::findOrFail($id);
        $user_id = Auth::id();
        $post->user_id = $user_id;
        $post->title =  $request->input('title');
        $post->body = $request->input('body');
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/posts/', $filename);
            $post->image = $filename;
        }
        $post->save();
        return redirect(route('posts.index'))->with('success', 'Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect(route('posts.index'))->with('success', 'Post deleted!');
    }
}