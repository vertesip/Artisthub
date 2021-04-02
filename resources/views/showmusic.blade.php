@extends('layouts.hometemplate')

@section('content')
    <div class="container card p-3">
        <div class="row">

            <div class="col">
                <div data-artist="{{$music->artist}}" data-audio="{{$music->audio}}"
                     class="playContainer" class="w-100">
                    <img src="/storage/{{$music->image}}" class="w-100">
                    <div class="play"><img
                            src="http://cdn1.iconfinder.com/data/icons/flavour/button_play_blue.png"/>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="d-flex align-items-center">
                    <div class="pr-3" style="min-width: fit-content">
                        <img src="{{$music->user->profile->profileImage()}}" class="rounded-circle w-100"
                             style="max-width: 50px">
                    </div>
                    <div class="d-flex col-sm-auto">
                        <div class="font-weight-bold">
                            <a href="/profile/{{$music->user->id}}">
                                    <span class="text-dark">
                                        {{$music->user->name}}</span>
                            </a>
                        </div>
                    </div>
                    @if($music->user->id == Auth::user()->id)
                        <form action="{{ route('musicDestroy',$music->id) }}" method="post" class="pr-2 w-100 d-flex justify-content-md-end" style="justify-content: flex-end">
                            @csrf
                            @method('DELETE')
                            <button type="submit">
                                <p style="margin: 0">X</p>
                            </button>
                        </form>
                    @endif
                </div>
                <hr>
                <p>
                    <span class="font-weight-bold">
                        <a href="/profile/{{$music->user->id}}">
                            <span class="text-dark">{{$music->user->name}}</span>
                        </a></span>{{ $music->text }}</p>
                <div class="d-flex pb-2">
                    @if (!$music->likedBy(auth()->user()))
                        <form action="{{ route('music.like',$music->id) }}" method="post" class="pr-2">
                            @csrf
                            <button type="submit">
                                <img src="/img/heart.svg">
                            </button>
                        </form>
                    @else
                        <form action="{{ route('music.like.delete',$music->id) }}" method="post" class="pr-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit">
                                <img src="/img/heartfull.png" style="width: 24px">
                            </button>
                        </form>
                    @endif
                    <p>{{ $music->likes->count() }}</p>
                </div>
                <div class="title-wrapper">
                    <h3>{{$music->artist}}</h3>
                    <h4>{{$music->songtitle}}</h4>
                    <p>{{$music->genre}}</p>
                </div>
                <h4>Display Comments</h4>
                @include('musicCommentsDisplay')
                <hr>
                <h4>Add comment</h4>
                <form method="post" action="{{ route('comments.musicStore') }}">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" name="body"></textarea>
                        <input type="hidden" name="music_id" value="{{ $music->id }}" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Add Comment" />
                    </div>
                </form>
            </div>
            <hr/>

        </div>
    </div>
    </div>

@endsection
