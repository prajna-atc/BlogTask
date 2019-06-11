<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{

    /**
     * List all Posts.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $posts = Post::all();
        return view('list-post', compact('posts'));
    }   

    /**
     * Show the form for creating a new Post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-post');
    }    

    /**
     * Save Post.
     *
     * @param  \Illuminate\Http\Request  $request  
     */
    public function store(Request $request)
    {
    	$request->validate([
            'title'=>'required',
            'body'=>'required',
        ]);  
        Post::create($request->all());  
        return redirect()->route('posts');
    }    

    /**
     * Show individual Post.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$post = Post::find($id);
        return view('show-post', compact('post'));
    }	
}