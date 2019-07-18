<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::allows('posts.create', Auth::user()))
        {
            return view('post.create');
        }else
        {
            return redirect(route('post.index'))->with('failure', 'You are not authorized to access this page');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:255',
            'subtitle' => 'required|max:255',
        ]);
        $post=new Post;
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;

        $post->save();
        return redirect(route('post.index'))->with('message', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Gate::allows('posts.update', Auth::user()))
        {
            $post=Post::find($id);
            return view('post.edit',compact('post'));
        }else{
            return redirect(route('post.index'))->with('failure', 'You are not authorized to access this page');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'subtitle' => 'required',
        ]);

        $post=Post::find($id);
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;

        $post->save();
        return redirect(route('post.index'))->with('message', 'Post deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::allows('posts.delete', Auth::user()))
        {
            Post::where('id', $id)->delete();
            return redirect()->back()->with('message', 'Post deleted successfully');
        }else
        {
            return redirect(route('post.index'))->with('failure', 'You are not authorized to access this page');
        }
    }
}
