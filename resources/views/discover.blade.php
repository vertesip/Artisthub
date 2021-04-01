@extends('layouts.hometemplate')

@section('content')
    <div class="h-100">

        <div class="h-100">
            <div class="card-header col-12 bg-dark text-light">{{ __('Users') }}</div>
            <div class="p-3">
                <div class="d-flex justify-content-around">
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
            <div class="row justify-content-between h-100">
                <div class="card-header col-12 bg-dark text-light">{{ __('New tracks by genres you like') }}</div>
                <div class="d-flex">
                    @foreach($musics as $music)
                        @if(!$music->likedBy(auth()->user()))
                            <div class="card col-3">
                                <div class="d-flex">
                                    <div class="col-12 row" style="margin: 0 auto">
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
                                </div>
                            </div>

                        @endif
                    @endforeach
                </div>
                <div class="card">
                    <div class="card-header bg-dark text-light">{{ __('All new tracks') }}</div>
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
        </div>
    </div>
@endsection
