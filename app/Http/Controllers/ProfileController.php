<?php

namespace App\Http\Controllers;

use app\Models\User;
use Illuminate\Http\Request;

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
        $user = User::find($user);

        return view('profile', [
            'user' => $user,
        ]);
    }
}
