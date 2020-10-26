@extends('layouts.hometemplate')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 p-5">
                <img src="https://i1.sndcdn.com/avatars-000681400931-9mhkyo-t200x200.jpg" class="rounded-circle">
            </div>
            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <h1>{{ $user->username }}</h1>
                    <a href="/post/create">Add new post</a>
                </div>
                <div class="d-flex">
                    <div class="pr-5"><strong>{{$user->posts->count()}}</strong> posts</div>
                    <div class="pr-5"><strong>0</strong> tracks</div>
                    <div class="pr-5"><strong>23k</strong> followers</div>
                    <div class="pr-W5"><strong>153</strong> following</div>
                </div>
                <p></p>
                <p>{{ $user->profile->title ?? '' }}</p>
                <p>{{ $user->profile->description ?? '' }}</p>
                <a href="{{ $user->profile->url ?? '' }}" target="_blank">{{ $user->profile->url ?? '' }}</a><br>

            </div>

            <div class="row pt-5">
                @foreach($user->posts as $post)
                    <div class="col-4 pb-4">
                        <a href="/post/{{$post->id}}">
                            <img src="/storage/{{ $post->image }}" class="w-100">
                            <p class="center">{{ $post->text }}</p>
                        </a>
                    </div>
                @endforeach

            </div>

        </div>

    </div>



@endsection
