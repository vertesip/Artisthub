<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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
        $post = new Post();
        $post->user_id = Auth::id();
        $post->text = $request->input('caption');
        $post->image = $request->file('image')->store('pictures', 'public');

        $image = Image::make(public_path("storage/{$post->image}"))->fit(1200, 1200);

        $image->save();
        $post->save();

        return redirect('/profile/'. auth()->user()->id)->with('message', 'Post has been added!');

    }


    public function postDestroy(Post $post, Request $request)
    {

        Post::whereId($post->id)->delete();
        Like::where('post_id',$post->id)->delete();
        Comment::where('post_id',$post->id)->delete();

        return back();
    }


    public function show(Post $post)
    {
        return view('show', compact('post'));
    }
}
