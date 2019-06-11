<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;

class CommentsController extends Controller
{

    /**
     * Save Comments.
     *
     * @param  \Illuminate\Http\Request  $request   
     */
    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->comment = $request->get('comment_body');
        $comment->user_id = auth()->user()->id;
        $post = Post::find($request->get('post_id'));
        //if it is reply to comment
        if ($request->has('comment_id')) {
            $comment->parent_id = $request->get('comment_id');
        }
        $post->comments()->save($comment);

        return back();
    }

}