<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $music = new Music();
        $music->user_id = Auth::id();
        $music->genre = $request->input('genre');
        $music->artist = $request->input('artist');
        $music->songtitle = $request->input('songtitle');
        $music->audio = $request->file('audio')->store('music', 'public');

        $music->image = $request->file('image')->store('covers', 'public');

        $image = Image::make(public_path("storage/{$music->image}"))->fit(1200, 1200);

        $image->save();
        $music->save();

        return redirect('/profile/'. auth()->user()->id)->with('message', 'Music has been added!');
    }

    public function show(Music $music)
    {
        return view('showmusic', compact('music'));
    }

    public function discover()
    {
        $musicId = $this->getRandomLikedMusicId();

        $musics = $this->getMusicsBySameGenre(Music::where('id',$musicId)->first());

        return view('discover', [
            'musics' => $musics,
        ]);
    }

    public function getRandomLikedMusicId()
    {
        $likedIDs = DB::table('likes')->whereNotNull('music_id')->pluck('music_id')->toArray();
        return $likedIDs[rand(0,sizeof($likedIDs)-1)];
    }

    public function getMusicsBySameGenre(Music $music)
    {
       return Music::where('genre',$music->genre)->where('id','!=',$music->id)->get();
    }


}
