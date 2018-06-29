<?php

namespace App\Http\Controllers;

use App\Post;
use App\Page;
use App\Comment;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Page $page, Post $post)
    {

        $this->validate(request(), [ 'body' => 'required|min:2']);
        $post->addComment(request('body'));

        return back();
    }
}
