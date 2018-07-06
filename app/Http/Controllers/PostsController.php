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
        // dd(request());
        $this->validate(request(), [
            'title' => 'required',
            'subtitle' => 'required',
            'content' => 'required',
            'published' => 'required'
        ]);

        if (request()->hasFile('filename'))
        {
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


        return redirect(route('pages.show' , $page->slug))->with('success', 'Artikel aangemaakt.');
    }

    public function edit(Post $post)
    {
        // dd($post);
        return view('posts.edit')->with('post', $post);
    }

    public function update(Request $request, $slug)
    {
        $this->validate(request(), [
            'title_icon' => 'required',
            'title' => 'required',
            'subtitle' => 'required',
            'content' => 'required',
        ]);

        $page->addPost(
            $featured_image_filename, // request('featured_image'),
            request('title'),
            request('subtitle'),
            request('content'),
            request('published')
        );


        return redirect(route('pages.show' , $page->slug))->with('success', 'Artikel aangemaakt.');

        $post = Post::where('slug', $slug)->first();

        // dd($request);

        // Iconpicker hack
        $title_icon = $request['title_icon'];
        $title_icon = str_replace('iconpicker-icon-preview ', '', $title_icon);
        $title_icon = str_replace('fa-icon ', '', $title_icon);

        $post->title_icon = $title_icon;
        $post->title = $request['title'];
        $post->subtitle = $request['subtitle'];
        $post->content = $request['content'];
        $post->published = (empty($request['published'])) ? 0 : 1 ;
        $post->has_articles = (empty($request['has_articles'])) ? 0 : 1 ;

        $post->save();

        return redirect()->route('posts.show', compact('post'))->with('success', 'Artikel aangepast.');

    }
    public function destroy($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $page = Page::where('id', $post->id);
        $post->delete();
        return redirect( route('pages.show', compact('page')) )->with('success', 'Artikel verwijderd.');
    }

}
