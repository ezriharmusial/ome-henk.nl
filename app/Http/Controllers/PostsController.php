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

        if (request()->hasFile('featured_image'))
        {
            $image = request()->file('featured_image');
            $featured_image_filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $featured_image_filename);
            Image::make($image)->resize(1200, 675)->save($location);
        } else {
            $featured_image_filename = null;
        }

        $page->addPost(
            $featured_image_filename, // request('featured_image'),
            request('title'),
            request('subtitle'),
            request('content'),
            request('published')
        );

        Session::flash('success', 'Artikel toegevoegd.');

        return redirect(route('showPage' , $page->slug));
    }

}
