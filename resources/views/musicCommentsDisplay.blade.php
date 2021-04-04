<?php

use App\Models\Comment;

$comments = Comment::all() ?>
<div class="centerOnMobile">
    @foreach($comments as $comment)
        <div class="d-flex">
            <a href="/profile/{{$comment->user->id}}"><strong>{{ $comment->user->name }}</strong></a>
            @if($comment->music_id == $music->id)
                <div class="display-comment" style="">
                    @if($comment->user->id == Auth::user()->id)
                        <form action="{{ route('music.commentDestroy',$comment->id) }}" method="post" class="pr-2">
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
