<?php

namespace App\Http\Controllers;

class PostsController extends Controller
{
    public function create(){
        return view('posts.create');
    }


    public function store()
    {
        $data = request()->validate([
            'text' => 'required',
            'image' => ['required', 'image'],
        ]);

        dd(request()->all());
    }

}
