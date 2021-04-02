<?php

use App\Models\Comment;

$comments = Comment::all() ?>
<div>
    @foreach($comments as $comment)
            <div class="d-flex @if(Request::is('home')) justify-content-center @endif">
            <a href="/profile/{{$comment->user->id}}"><strong>{{ $comment->user->name }}</strong></a>
            @if($comment->post_id == $post->id)
                <div class="display-comment" style="">
                    @if($comment->user->id == Auth::user()->id)
                        <form action="{{ route('post.commentDestroy',$comment->id) }}" method="post" class="pr-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="position: absolute;right: 5px;">
                                <p style="margin: 0">X</p>
                            </button>
                        </form>
                    @endif
                </div>
            @endif
        </div>
        <p>{{ $comment->body }}</p>
    @endforeach
</div>
