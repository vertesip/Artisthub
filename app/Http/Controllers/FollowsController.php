<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    public function store($user)
    {

        $user = User::findOrFail($user);

        return auth()->user()->following()->toggle($user->profile);
    }
}
