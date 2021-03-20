<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = new Comment();

        $comment->user_id = auth()->user()->id;
        $comment->post_id =  $request->input('post_id');
        $comment->body = $request->input('body');

        $comment->save();
        Session::put('comment', $comment);

        return back();
    }

    public function commentsDisplay()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $comments = Comment::whereIn('user_id',$users)->latest()->get();

        return view('commentsDisplay', [
            'users' => $users,
            'comments' => $comments,
        ]);
    }

}
