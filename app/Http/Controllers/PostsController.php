<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

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
        $post->image = $request->file('image')->store('pictures', 'public');

        $image = Image::make(public_path("storage/{$post->image}"))->fit(1200, 1200);

        $image->save();
        $post->save();

        return redirect('/profile/'. auth()->user()->id);
    }
    public function show(\App\Models\Post $post)
    {
        return view('show', compact('post'));
    }
}
