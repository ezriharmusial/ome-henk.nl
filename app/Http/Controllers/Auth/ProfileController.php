<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(){
        return view('auth.profile', array('user' => auth()->user()) );
    }

    public function update(Request $request){
        // Handle the user upload of avatar
        if($request->hasFile('avatar')){
            // dd($request->hasFile('avatar'));
            $user = auth()->user();
            $user->addMediaFromRequest('avatar')->toMediaCollection('avatar');
        }
        return view('auth.profile', array('user' => auth()->user()) );
    }
}
