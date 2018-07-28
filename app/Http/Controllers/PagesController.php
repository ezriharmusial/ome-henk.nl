<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\User;
use Session;
use View;

class PagesController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->except(['show', 'index']);
        $this->middleware('permission:pagepost-list')->except(['show', 'index']);
        $this->middleware('permission:pagepost-crud', ['only' => ['create','store','edit','update','destroy']]);
    }

    public function index(Page $page)
    {
        $page = (is_null(Page::first())) ? New Page : Page::first();

        if ( $page->exists ) {
            return redirect()->route('pages.show', compact('page'));
        } elseif ( $page->exists == false && !is_null(auth()->user()) ) {
            return redirect()->route('pages.create', compact('page'))->with('warning', 'Maak uw eerste Pagina aan.');
        } elseif ( $page->exists == false && is_null(auth()->user()) ) {
            return redirect()->route('login', compact('page'))->with('warning', 'Meld u eerst aan.');
        } else {
            return redirect()->route('register', compact('page'));
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
            // 'title_icon' => 'required',
            'title' => 'required',
            'subtitle' => 'required',
            'content' => 'required',
        ]);

        $title_icon = !is_null( $request['title_icon'] ) ? $request['title_icon'] : '';
        $title_icon = str_replace('iconpicker-icon-preview ', '', $title_icon);
        $title_icon = str_replace('fa-icon ', '', $title_icon);

        $request['title_icon'] = $title_icon;
        $request['published'] = (empty($request['published'])) ? 0 : 1 ;
        $request['has_articles'] = (empty($request['has_articles'])) ? 0 : 1 ;

        $page = new Page(request(['title_icon', 'title', 'subtitle', 'content', 'has_articles', 'published']));

        if($request->hasFile('page-header')){
            $page->addMediaFromRequest('page-header')->toMediaCollection('page-headers');
        }

        auth()->user()->publishPage(
            $page
        );

        return redirect()->route('pages.show', compact('page'))->with('success', 'Pagina aangemaakt');
    }

    public function edit(Page $page)
    {
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

        if($request->hasFile('page-header')){
            $page->addMediaFromRequest('page-header')->toMediaCollection('page-headers');
        }

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
