<?php

namespace App\Http\Controllers;

use app\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile($user)
    {
        $user = User::findOrFail($user);


        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        return view('profile', [
            'user' => $user,
            'follows' => $follows,
        ]);
    }

    //Profil módosítása
    public function edit($user)
    {
        $user = User::findOrFail($user);

        if (Auth::user()->id == $user->id) {
            return view('edit', [
                'user' => $user,
            ]);
        } else {
            return back();
        }
    }

    public function update($user)
    {
        $data = request()->validate([
            'artistname' => 'required',
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'profileimage' => '',
            'bannerimage' => ''
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('pictures', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(310, 310);
            $image->save();

            $data = array_merge(
                $data,
                ['profileimage' => $imagePath],
            );
        }
        if (request('banner')) {
            $imagePath = request('banner')->store('banners', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1900, 400);
            $image->save();

            $data = array_merge(
                $data,
                ['bannerimage' => $imagePath],
            );
        }
        auth()->user()->profile()->update($data);

        $user = User::findOrFail($user);
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        return view('profile', [
            'user' => $user,
            'follows' => $follows,
        ])->with('message', 'Profile has been updated!');

    }

    //Keresés
    public function search(Request $request)
    {
        $getQuery = urldecode($request->getQueryString());
        $sub = substr($getQuery, 7);
        $user = User::where('name', $sub)->firstOrFail();
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        return view('profile', [
            'user' => $user,
            'follows' => $follows,
        ]);
    }

}
