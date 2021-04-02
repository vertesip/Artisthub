<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Music;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id',$users)->latest()->get();
        $musics = Music::whereIn('user_id',$users)->latest()->get();
        $all_user = User::where('id', '!=', Auth::id())->get();

        return view('home', [
            'posts' => $posts,
            'musics' => $musics,
            'all_user' => $all_user,
        ]);
    }
}
