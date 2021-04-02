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
    public function commentsPostStore(Request $request)
    {
        $comment = new Comment();

        $comment->user_id = auth()->user()->id;
        $comment->post_id = $request->input('post_id');
        $comment->body = $request->input('body');

        $comment->save();

        return back();
    }

    public function commentsMusicStore(Request $request)
    {
        $comment = new Comment();

        $comment->user_id = auth()->user()->id;
        $comment->music_id = $request->input('music_id');
        $comment->body = $request->input('body');

        $comment->save();

        return back();
    }

    public function commentsDisplay()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $comments = Comment::whereIn('user_id', $users)->latest()->get();

        return view('commentsDisplay', [
            'users' => $users,
            'comments' => $comments,
        ]);
    }

    public function commentsPostDestroy(Comment $comment, Request $request)
    {

        Comment::whereId($comment->id)->delete();

        return back();
    }

    public function commentsMusicDestroy(Comment $comment, Request $request)
    {

        Comment::whereId($comment->id)->delete();

        return back();
    }

}
