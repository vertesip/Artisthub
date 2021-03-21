@extends('layouts.hometemplate')

@section('content')
    <div class="container card p-3">
        <div class="row">
            <div class="col-8">
                <img src="/storage/{{ $post->image }}" class="w-100">
            </div>
            <div class="col-4">
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src="{{$post->user->profile->profileImage()}}" class="rounded-circle w-100"
                             style="max-width: 50px">
                        </div>
                    <div>
                            <div class="font-weight-bold">
                                <a href="/profile/{{$post->user->id}}">
                                    <span class="text-dark">
                                        {{$post->user->name}}</span>
                                </a>
                            </div>
                        </div>
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
                        <button type="submit">Like</button>
                    </form>
                    @else
                    <form action="{{ route('post.delete',$post->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Unlike</button>
                    </form>
                    @endif
                </div>
                <div>
                    <p>Likes one this post: {{ $post->likes->count() }} {{Str::plural('like', $post->likes->count())}}</p>
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
