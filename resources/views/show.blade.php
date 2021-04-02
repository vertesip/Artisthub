@extends('layouts.hometemplate')

@section('content')
    <div class="container card p-3">
        <div class="row">
            <div class="col-8">
                <img src="/storage/{{ $post->image }}" class="w-100">
            </div>
            <div class="col-4">
                <div class="d-flex align-items-center">
                    <div class="pr-3" style="min-width: fit-content">
                        <img src="{{$post->user->profile->profileImage()}}" class="rounded-circle w-100"
                             style="max-width: 50px">
                        </div>
                    <div class="d-flex col-sm-auto">
                            <div class="font-weight-bold">
                                <a href="/profile/{{$post->user->id}}">
                                    <span class="text-dark">
                                        {{$post->user->name}}</span>
                                </a>
                            </div>
                        </div>
                    @if($post->user->id == Auth::user()->id)
                        <form action="{{ route('postDestroy',$post->id) }}" method="post" class="pr-2 w-100 d-flex justify-content-md-end" style="justify-content: flex-end">
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
                        <a href="/profile/{{$post->user->id}}">
                            <span class="text-dark">{{$post->user->name}}</span>
                        </a></span>{{ $post->text }}</p>
                <div class="d-flex pb-2">
                    @if (!$post->likedBy(auth()->user()))
                    <form action="{{ route('post.like',$post->id) }}" method="post" class="pr-2">
                        @csrf
                        <button type="submit">
                            <img src="/img/heart.svg">
                        </button>
                    </form>
                    @else
                    <form action="{{ route('post.like.delete',$post->id) }}" method="post" class="pr-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit">
                            <img src="/img/heartfull.png" style="width: 24px">
                        </button>
                    </form>
                    @endif
                        <p>{{ $post->likes->count() }}</p>
                </div>
                <h4>Display Comments</h4>
                @include('commentsDisplay')
                <hr>
                <h4>Add comment</h4>
                <form method="post" action="{{ route('comments.postStore') }}">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" name="body"></textarea>
                        <input type="hidden" name="post_id" value="{{ $post->id }}" />
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
