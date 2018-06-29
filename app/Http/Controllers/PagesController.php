<?php

namespace App\Http\Controllers;

use App\Page;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }

    public function show(Page $page)
    {
        return view('pages.show', compact('page'));
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

    public function edit(Page $page)
    {
        // dd($page);
        return view('pages.edit')->with('page', $page);
    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
