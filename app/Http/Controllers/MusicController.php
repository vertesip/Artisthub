<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class MusicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function upload(){
        return view('upload');
    }

    public function store(Request $request)
    {
        $music = new \App\Models\Music();
        $music->user_id = Auth::id();
        $music->embedLink = $request->input('sclink');

        $music->save();

        return redirect('/profile/'. auth()->user()->id);
    }


}
