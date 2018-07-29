<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Page;
use Session;
use Image;

class PostsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->except(['index', 'show']);
        $this->middleware('permission:pagepost-list')->except(['index', 'show']);
        $this->middleware('permission:pagepost-crud', ['only' => ['create','store','edit','update', 'destroy']]);
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

    public function create(Page $page, Post $post)
    {
        $post = new Post;
        return view('posts.create', compact('page', 'post'));
    }

    public function store(Request $request, Page $page, Post $post)
    {

        $this->validate(request(), [
            'title' => 'required',
            // 'subtitle' => 'required',
            'content' => 'required',
            'published' => 'required'
        ]);

        $page->addPost(request());

        return redirect(route('pages.show' , $page->slug))->with('success', 'Artikel aangemaakt.');
    }

    public function edit($pageSlug, $postSlug)
    {
        $page = Page::where('slug', $pageSlug)->first();
        $post = Post::where('slug', $postSlug)->first();

        return view('posts.edit', compact('page', 'post') );
    }

    public function update($pageSlug, $postSlug)
    {

        $this->validate(request(), [
            'title' => 'required',
            // 'subtitle' => 'required',
            'content' => 'required',
        ]);

        $post = Post::where('slug', $postSlug)->first();

        $post->title = request('title');
        $post->subtitle = request('subtitle');
        $post->content = request('content');
        $post->published = (empty(request('published'))) ? 0 : 1 ;

        $post->save();

        if(request()->hasFile('featured-image')){
            $post->addMediaFromRequest('featured-image')->toMediaCollection('featured-images');
        }

        return redirect()->route('posts.show', compact('pageSlug', 'postSlug'))->with('success', 'Artikel aangepast.');

    }
    public function destroy($pageSlug, $postSlug)
    {
        $post = Post::where('slug', $postSlug)->first();
        $page = Page::where('slug', $pageSlug)->first();
        $post->delete();
        return redirect()->route('pages.show', compact('page'))->with('success', 'Artikel verwijderd.');
    }

}
