<?php

namespace App\Http\Controllers;

use App\Page;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        return view('pages.index');
    }

    public function show(Page $page)
    {
        return view('pages.index', compact('page'));
    }

    public function create()
    {
        return view('pages.create');
    }

    public function store()
    {

        $this->validate(request(), [
            'title_icon' => 'required',
            'title' => 'required',
            'subtitle' => 'required',
            'content' => 'required',
            'has_articles' => 'required'
        ]);

        auth()->user()->publishPage(
            new Page(request(['title_icon', 'title', 'subtitle', 'content', 'has_articles']))
        );

        return redirect('/');
    }
}
