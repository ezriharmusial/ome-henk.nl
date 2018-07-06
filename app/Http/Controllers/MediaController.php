<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Media;
use Image;
use Storage;
use Illuminate\Support\Facades\File;

class MediaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $media = Media::all();
        return view('media.create', compact('media'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  request()
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'filename' => 'image|required|mimes:jpeg,png,jpg,gif,svg'
        ]);

        // Check if File Allready Exists
        $file = request()->file('filename');
        $hash = $file->hashName();
        // Declare & Prepare Paths
        $originalPath = '/images/originals/';
        $optimizedPath = '/images/optimized/';
        $thumbnailPath = '/images/thumbnails/';
        if ( !Storage::disk('public')->exists($optimizedPath)) {
            Storage::disk('public')->makeDirectory($originalPath);
            Storage::disk('public')->makeDirectory($optimizedPath);
            Storage::disk('public')->makeDirectory($thumbnailPath);
        }

        // dd($hash);
        // Make Image Object
        $image = Image::make($file);
        // Store Original file
        Storage::disk('public')->put(
                $originalPath . $hash, (string) $image->encode()
            );
        // Store Optimized file
        Storage::disk('public')->put(
                $optimizedPath . $hash,
                (string) $image->fit(1280, 640, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('jpg', 75)
            );
        // Store thumbnail file
        Storage::disk('public')->put(
                $thumbnailPath . $hash,
                (string) $image->fit(150, 150, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('jpg', 75)
            );

        $imagemodel = new Media();
        $imagemodel->filename = $hash;
        $imagemodel->save();

        return back()->with('success', 'Plaatje succesvol geupload');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  request()
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $originalPath = '/images/originals/';
        $optimizedPath = '/images/optimized/';
        $thumbnailPath = '/images/thumbnails/';

        $media = Media::where('id', $id)->first();
        $filename = $media->filename;
        Storage::delete([
                    $originalPath . $filename,
                    $optimizedPath . $filename,
                    $thumbnailPath . $filename,
                ]);
        $media->delete();
        return redirect( route('media.create') )->with('success', 'De afbeelding is verwijderd.');
    }
}
