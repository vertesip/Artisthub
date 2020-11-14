<?php

namespace App\Http\Controllers;

use app\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
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

        return view('profile', [
            'user' => $user,
        ]);
    }

    //Profil módosítása
    public function edit($user)
    {
        $user = User::findOrFail($user);

        return view('edit', [
            'user' => $user,
        ]);
    }

    public function update($user)
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'profileimage' => '',
        ]);

        if (request('image',)) {
            $imagePath = request('image')->store('pictures', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(310, 310);
            $image->save();


            auth()->user()->profile()->update(array_merge(
                $data,
                ['profileimage' => $imagePath],
            ));
        } else {
            auth()->user()->profile()->update($data);
        }


        $user = User::findOrFail($user);

        return view('profile', [
            'user' => $user,
        ]);

    }

    //Keresés
    public function search(Request $request)
    {
        $getQuery = $request->getQueryString();
        $sub = substr($getQuery, 7);
        $user = User::where('username', $sub)->firstOrFail();

        return view('profile', [
            'user' => $user,
        ]);
    }
}
