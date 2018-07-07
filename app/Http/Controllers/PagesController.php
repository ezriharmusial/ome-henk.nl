<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use View;
use Session;
use App\User;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']);
    }

    public function index(Page $page)
    {
        $page = (Page::first()) ? Page::first() : New Page;
        if ( !is_null(User::first()) && !is_null($page->exists)) {
            return redirect()->route('pages.show', compact('page'));
        } else {
            return view('register', compact('page'));
        }
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

        $page = new Page(request(['title_icon', 'title', 'subtitle', 'content', 'has_articles', 'published']));

        auth()->user()->publishPage(
            $page
        );

        return redirect( route('pages.show', compact('page')) )->with('success', 'Pagina aangemaakt');
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

        return redirect()->route('pages.show', $page->slug)->with('success', 'Pagina aangepast.');

    }

    public function destroy($slug)
    {
        $page = Page::where('slug', $slug)->first();
        if (is_null( $page->posts()->first() )){
            $page->delete();

            if (is_null( Page::first() ))
                return redirect( route('home') )->with('success', 'Pagina verwijderd.');

            return redirect( route('pages.index') )->with('success', 'Pagina verwijderd.');
        }
        return back()->with('warning', 'Kan pagina niet verwijderen als het nog artikelen bevat.');
    }
}
