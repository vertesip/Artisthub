<?php

namespace App\Http\Controllers;

use app\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

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

    public function search(Request $request)
    {
     // $request->get('search');

        $artist = User::whereHas('profile', function (Builder $query) use ($request) {
            $query->where('artistname', $request);
        })->firstOrFail();

    }
}
