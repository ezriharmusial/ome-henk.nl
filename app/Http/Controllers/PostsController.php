<?php

namespace App\Http\Controllers;

use App\Post;
use App\Page;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {

        $posts = Post::latest()
            ->filter(request(['month', 'year']))
            ->get();

        return view('posts.index', compact('posts'));
    }

    public function show(Page $page, Post $post)
    {
        return view('posts.show', compact('page', 'post'));
    }

    public function create(Page $page)
    {
        return view('posts.create', compact('page'));
    }

    public function store(Page $page)
    {
        $this->validate(request(), [
            'title' => 'required',
            'subtitle' => 'required',
            'content' => 'required',
            'published' => 'required'
        ]);

        $page->addPost(
            request('title'),
            request('subtitle'),
            request('content'),
            request('published')
        );

        return back();
    }

}
