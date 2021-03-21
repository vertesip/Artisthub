@extends('layouts.hometemplate')

@section('content')

    <div class="container card p-3">
        <div class="row">
            <div class="col-8">
                <div class="col-12">
                    <div class="d-flex justify-content-around p-2" style="flex-direction: row-reverse">
                            <div class="title-wrapper">
                                <h2>{{$music->artist}}</h2>
                                <h3>{{$music->songtitle}}</h3>
                                <p>{{$music->genre}}</p>
                            </div>
                            <img src="/storage/{{$music->image}}" class="w-50">
                    </div>
                    <audio controls class="w-100 mt-1">
                        <source src="/storage/{{$music->audio}}">
                    </audio>
                    <hr>
                </div>
            </div>
            <div class="col-4">
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src="{{$music->user->profile->profileImage()}}" class="rounded-circle w-100"
                             style="max-width: 50px">
                    </div>
                    <div>
                        <div class="font-weight-bold">
                            <a href="/profile/{{$music->user->id}}">
                                    <span class="text-dark">
                                        {{$music->user->name}}</span>
                            </a>
                        </div>
                    </div>
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
                            <button type="submit">Like</button>
                        </form>
                    @else
                        <form action="{{ route('music.delete',$music->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Unlike</button>
                        </form>
                    @endif
                </div>
                <div>
                    <p>Likes one this music: {{ $music->likes->count() }} {{Str::plural('like', $music->likes->count())}}</p>
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
