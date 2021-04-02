<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Post;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }


    public function postLikeStore(Post $post, Request $request)
    {

        if($post->likedBy($request->user())){
            return response(null, 409);
        }

        $post->likes()->create([
                'user_id' => $request->user()->id
            ]);

        return back();
    }

    public function postLikeDestroy(Post $post, Request $request)
    {
            $request->user()->likes()->where('post_id',$post->id)->delete();

            return back();
    }

    public function musicLikeStore(Music $music, Request $request)
    {

        if($music->likedBy($request->user())){
            return response(null, 409);
        }

        $music->likes()->create([
            'user_id' => $request->user()->id
        ]);

        return back();
    }

    public function musicLikeDestroy(Music $music, Request $request)
    {
        $request->user()->likes()->where('music_id',$music->id)->delete();

        return back();
    }


}
