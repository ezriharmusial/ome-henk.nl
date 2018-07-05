<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use View;
use Session;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }

    public function index(Page $page)
    {
        $page = Page::first();
        return view('pages.index', compact('page') );
    }

    public function show(Page $page)
    {
        return view('pages.show', compact('page'));
    }

    public function create()
    {
        $page = new Page;
        return view('pages.create', compact('page'));
    }

    public function store(Request $request)
    {

        $this->validate(request(), [
            'title_icon' => 'required',
            'title' => 'required',
            'subtitle' => 'required',
            'content' => 'required',
        ]);

        // dd($request);

        $title_icon = $request['title_icon'];
        $title_icon = str_replace('iconpicker-icon-preview ', '', $title_icon);
        $title_icon = str_replace('fa-icon ', '', $title_icon);

        $request['title_icon'] = $title_icon;
        $request['published'] = (empty($request['published'])) ? 0 : 1 ;
        $request['has_articles'] = (empty($request['has_articles'])) ? 0 : 1 ;

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

    public function update(Request $request, $slug)
    {
        $this->validate(request(), [
            'title_icon' => 'required',
            'title' => 'required',
            'subtitle' => 'required',
            'content' => 'required',
        ]);

        $page = Page::where('slug', $slug)->first();

        // dd($request);

        // Iconpicker hack
        $title_icon = $request['title_icon'];
        $title_icon = str_replace('iconpicker-icon-preview ', '', $title_icon);
        $title_icon = str_replace('fa-icon ', '', $title_icon);

        $page->title_icon = $title_icon;
        $page->title = $request['title'];
        $page->subtitle = $request['subtitle'];
        $page->content = $request['content'];
        $page->published = (empty($request['published'])) ? 0 : 1 ;
        $page->has_articles = (empty($request['has_articles'])) ? 0 : 1 ;

        $page->save();

        Session::flash('success', 'Pagina opgeslagen');

        return redirect()->route('pages.show', $page->slug);

    }

    public function destroy($slug)
    {
        dd($slug);
        $page = Page::where('slug', $slug)->first();
        $pagetitle = $page->title;
        $page->delete();
        return redirect( route('index') )->with('success', 'Pagina <em>' . $pagetitle . '</em> is verwijderd.');
    }
}
