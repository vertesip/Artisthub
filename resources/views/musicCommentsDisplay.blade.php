<?php

use App\Models\Comment;

$comments = Comment::all() ?>
<div>
    @foreach($comments as $comment)
        @if($comment->music_id == $music->id)
            <div class="display-comment">
                <a href="/profile/{{$comment->user->id}}"><strong>{{ $comment->user->name }}</strong></a>
                <p>{{ $comment->body }}</p>
            </div>
        @endif
    @endforeach
</div>
