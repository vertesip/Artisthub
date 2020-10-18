<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Post;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        return view('posts.create');
    }


    public function store(Request $request)
    {
        $post = new \App\Models\Post();
        $post->user_id = Auth::id();
        $post->text = $request->input('caption');
        $post->image = $request->file('image');
        $post->save();
        return back()->withSuccess('Post added!');
    }

}
