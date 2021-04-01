@extends('layouts.hometemplate')

@section('content')
    <div class="h-100">

        <div class="h-100">
            <div class="row justify-content-between h-100">
                <div class="col-md-3 text-center p-0">
                    <div class="card" style="border: 0">
                        <div class="card-header bg-dark text-light">{{ __('New tracks') }}</div>

                        <div>
                            @foreach($musics as $music)
                                <div class="col-10 row" style="margin: 0 auto">
                                    <div class="d-flex p-2" style="flex-direction: row-reverse">
                                        <div class="col align-self-center">
                                            <a href="/music/{{$music->id}}" class="w-100">
                                                <div class="title-wrapper">
                                                    <h3>{{$music->artist}}</h3>
                                                    <h4>{{$music->songtitle}}</h4>
                                                    <p>{{$music->genre}}</p>
                                                    <div class="d-flex justify-content-center">
                                                        <p class="pr-2"><img src="/img/heartfull.png"
                                                                             style="width: 24px"></p>
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
                <div class="col-md-4 text-center m-3">
                    {{--     <div class="row justify-content-center pb-5">
                               <div class="card">
                                   <div class="carousel-wrapper">
                                       <div class="carousel-slider">
                                   <span class="storycenter"><img class="rounded-circle" style="width: 100px;height: 100px"
                                                                  src="https://photos.bandsintown.com/thumb/9713536.jpeg">Excision</span>
                                           <span class="storycenter"><img class="rounded-circle"
                                                                          style="width: 100px;height: 100px"
                                                                          src="https://photos.bandsintown.com/thumb/9508083.jpeg">Subtronics</span>
                                           <span class="storycenter"><img class="rounded-circle"
                                                                          style="width: 100px;height: 100px"
                                                                          src="https://photos.bandsintown.com/thumb/9131158.jpeg">Peekaboo</span>
                                           <span class="storycenter"><img class="rounded-circle"
                                                                          style="width: 100px;height: 100px"
                                                                          src="https://photos.bandsintown.com/thumb/9016611.jpeg">Midnight T.</span>
                                           <span class="storycenter"><img class="rounded-circle"
                                                                          style="width: 100px;height: 100px"
                                                                          src="https://photos.bandsintown.com/thumb/9032785.jpeg">He$h</span>
                                           <span class="storycenter"><img class="rounded-circle"
                                                                          style="width: 100px;height: 100px"
                                                                          src="https://photos.bandsintown.com/thumb/8659522.jpeg">Svdden Death</span>
                                           <span class="storycenter"><img class="rounded-circle"
                                                                          style="width: 100px;height: 100px"
                                                                          src="https://photos.bandsintown.com/thumb/6311197.jpeg">Snails</span>
                                           <span class="storycenter"><img class="rounded-circle"
                                                                          style="width: 100px;height: 100px"
                                                                          src="https://photos.bandsintown.com/thumb/10216026.jpeg">Marshmello</span>
                                           <span class="storycenter"><img class="rounded-circle"
                                                                          style="width: 100px;height: 100px"
                                                                          src="https://photos.bandsintown.com/thumb/10485906.jpeg">Illenium</span>

                                       </div>
                                   </div>
                               </div>
                           </div> --}}
                    <div class="card">
                        <div>
                            @if(auth()->user()->following->count() == 0)
                                <h4>Seems like you're not following anyone!</h4>
                                <h4>Here are some users you could follow:</h4>
                                <div class="p-3">
                                    <div class="d-flex justify-content-between">
                                        @foreach($all_user as $user)
                                            <a
                                                href="{{ route('id.show', ['userId' => $user->id]) }}">
                                                <img src="{{$user->profile->profileImage()}}"
                                                     class="rounded-circle w-100"
                                                     style="max-width: 50px">
                                                {{$user->name}}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            @foreach($posts as $post)

                                <div class="container p-3">
                                    <div class="row d-flex flex-column-reverse">
                                        <div class="col-12">
                                            <a href="/post/{{$post->id}}">
                                                <img src="/storage/{{ $post->image }}" class="w-100">
                                            </a>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-flex align-items-center">
                                                <div class="p-2">
                                                    <img src="{{$post->user->profile->profileImage()}}"
                                                         class="rounded-circle w-100"
                                                         style="max-width: 50px">
                                                </div>
                                                <div>
                                                    <div class="font-weight-bold">

                                                    <span class="text-dark">
                                           <a href="/profile/{{$post->user->id}}">
                                               {{$post->user->name}}
                                           </a></span>


                                                    </div>
                                                </div>
                                                {{-- <p>{{$post->timestamp}}</p> --}}
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
                                <button class="mb-3 commentButton">Show comments</button>
                                <div class="show-comments">
                                    @include('commentsDisplay')
                                </div>
                                <hr/>
                                <form method="post" action="{{ route('comments.postStore') }}">
                                    @csrf
                                    <div class="form-group mr-4 ml-4">
                                        <textarea class="form-control" name="body"></textarea>
                                        <input type="hidden" name="post_id" value="{{$post->id}}"/>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-success" value="Add Comment"/>
                                    </div>
                                </form>
                                <hr>
                            @endforeach

                        </div>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="position-fixed w-100">
                        <div class="d-flex bg-white">
                            <div class="w-100">
                                <div class="card-header bg-dark text-light">{{ __('Online Users') }}</div>

                                <div class="card-body">
                                    @foreach($all_user as $user)
                                        @if($user->isOnline())
                                            <li class="text-success pb-2">
                                                <a class="text-success"
                                                   href="{{ route('id.show', ['userId' => $user->id]) }}">
                                                    <img src="{{$user->profile->profileImage()}}"
                                                         class="rounded-circle w-100"
                                                         style="max-width: 30px">
                                                    {{$user->name}}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="card-header bg-dark text-light">{{ __('Chat') }}</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="users">
                                            <ul class="list-group list-chat-item" style="list-style-type: none;">
                                                @if($all_user->count())
                                                    @foreach($all_user as $user)
                                                        <li class="chat-user-list">
                                                            <a href="{{ route('message.conversation', $user->id)}}">
                                                                <img src="{{$user->profile->profileImage()}}"
                                                                     class="rounded-circle w-100"
                                                                     style="max-width: 30px">
                                                                {{$user->name}}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
