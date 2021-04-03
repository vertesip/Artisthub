@extends('layouts.hometemplate')

@section('content')
    <!-- Variables -->
    <script>
        window.userId = "{{$user->id}}";
        window.follows = "{{($follows) ? 'true' : 'false'}}";
    </script>
    <div class="banner shadow-lg"><img class="position-absolute w-100"
                                       src="/storage/{{$user->profile->bannerimage}}"></div>
    <div class="container-fluid">
        <div class="row" style="    padding-bottom: 41px;">
            <div class="col-3 p-5 d-flex justify-content-center">
                <img src="{{$user->profile->profileImage()}}" class="rounded-circle">
            </div>
            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <div class="d-flex align-items-center pb-3">
                        <div class="h1 text-light bg-dark p-2">@if(!empty($user->profile->artistname)){{$user->profile->artistname}} @else{{ $user->name }} @endif</div>
                        <div class="follow" id="follow-button" v-model:user-id="{{ $user->id }}">
                            <follow-button></follow-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(session()->has('message'))
            <div class="alert alert-success text-center">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="d-flex row container-fluid">
            <div class="card-body col-4 pt-5 text-center">
                <div class="justify-content-center row">
                    <div class="text-center justify-content-center mr-4">
                        <p class="text-dark h2"><strong>{{$user->posts->count()}}</strong></p>
                        <p class="text-dark h4" style="margin-top:-20px"><br>posts</p>
                    </div>
                    <div class="text-center justify-content-center mr-4">
                        <p class="text-dark h2"><strong>{{$user->music->count()}}</strong></p>
                        <p class="text-dark h4" style="margin-top:-20px"><br>tracks</p>
                    </div>
                    <div class="text-center justify-content-center mr-4">
                        <p class="text-dark h2"><strong>{{$user->profile->followers->count()}}</strong></p>
                        <p class="text-dark h4" style="margin-top:-20px"><br>followers</p>
                    </div>
                    <div class="text-center justify-content-center mr-4">
                        <p class="text-dark h2"><strong>{{$user->following->count()}}</strong></p>
                        <p class="text-dark h4" style="margin-top:-20px"><br>following</p>
                    </div>
                </div>
                <hr>
                <div class="d-flex flex-column text-left ml-5">
                    <p class="text-dark h2 mt-5 mb-4">{{ $user->profile->title ?? '' }}</p>
                    <a class="text-dark h4" href="{{ $user->profile->url ?? '' }}"
                       target="_blank">{{ $user->profile->url ?? '' }}</a><br>
                    <p class="text-dark">{{ $user->profile->description ?? '' }}</p>
                </div>
            </div>
            <div class="card col-4">
                <div>
                    @foreach($user->posts as $post)

                        <div class="container p-3">
                            <div class="row d-flex flex-column-reverse">
                                <div class="col-12">
                                    <a href="/post/{{$post->id}}">
                                        <img src="/storage/{{ $post->image }}" class="w-100">
                                    </a>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex align-items-center">
                                        <div class="p-2" style="min-width: fit-content">
                                            <img src="{{$post->user->profile->profileImage()}}"
                                                 class="rounded-circle w-100"
                                                 style="max-width: 50px">
                                        </div>
                                        <div class="d-flex col-sm-auto">
                                            <div class="font-weight-bold">

                                                    <span class="text-dark">
                                           <a href="/profile/{{$post->user->id}}">
                                               {{$post->user->name}}
                                           </a></span>


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
                                </div>
                            </div>
                        </div>
                        <span class="font-weight-bold">
               <a href="/profile/{{$post->user->id}}">
               </a></span>
                        <div class="d-flex justify-content-between col-12" style="word-break: break-all">
                            <p class="text-left">{{ $post->text }}</p>
                            <div class="d-flex justify-content-end">
                                <p class="pr-2 pl-2"><img src="/img/heartfull.png" style="width: 24px"></p>
                                <p>{{ $post->likes->count() }}</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="mb-3 ProfileCommentButton">Show comments</button>
                        </div>
                            <div class="show-comments text-center">
                                @include('commentsDisplay')
                            </div>

                        <hr/>
                        <form method="post" action="{{ route('comments.postStore') }}">
                            @csrf
                            <div class="form-group mr-4 ml-4">
                                <textarea class="form-control" name="body"></textarea>
                                <input type="hidden" name="post_id" value="{{$post->id}}"/>
                            </div>
                            <div class="form-group d-flex justify-content-center">
                                <input type="submit" class="btn btn-success" value="Add Comment"/>
                            </div>
                        </form>
                        <hr>
                    @endforeach

                </div>

            </div>
            <div class="col-4" style="border: 0">
                <div>
                    @foreach($user->music as $music)
                        <div class="col-10 row" style="margin: 0 auto">
                            @if($music->user->id == Auth::user()->id)
                                <form action="{{ route('musicDestroy',$music->id) }}" method="post" class="pr-2 w-100 d-flex justify-content-md-start" style="justify-content: flex-star">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <p style="margin: 0">X</p>
                                    </button>
                                </form>
                            @endif
                            <div class="d-flex p-2" style="flex-direction: row-reverse">
                                <div class="col align-self-center">
                                    <a href="/music/{{$music->id}}" class="w-100">
                                        <div class="title-wrapper">
                                            <h3>{{$music->artist}}</h3>
                                            <h4>{{$music->songtitle}}</h4>
                                            <p>{{$music->genre}}</p>
                                            <div class="d-flex justify-content-center">
                                                <p class="pr-2"><img src="/img/heartfull.png" style="width: 24px">
                                                </p>
                                                <p>{{ $music->likes->count() }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <div data-artist="{{$music->artist}}" data-audio="{{$music->audio}}"
                                         class="playContainer" class="w-100">
                                        <img src="/storage/{{$music->image}}" class="w-100">
                                        <div class="play"><img
                                                src="http://cdn1.iconfinder.com/data/icons/flavour/button_play_blue.png"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>

    </div>


@endsection
