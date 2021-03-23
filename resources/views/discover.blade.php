@extends('layouts.hometemplate')

@section('content')
    <div class="h-100">

        <div class="h-100">
            <div class="row justify-content-between h-100">
                <div class="col-md-3 text-center bg-white">
                    <div class="card">
                        <div class="card-header bg-dark text-light">{{ __('New tracks by genre') }}</div>

                        <div>
                            @foreach($musics as $music)
                                @if(!$music->likedBy(auth()->user()))
                                    <div class="col-12">
                                        <div class="d-flex justify-content-around p-2"
                                             style="flex-direction: row-reverse">
                                            <a href="/music/{{$music->id}}">
                                                <div class="title-wrapper">
                                                    <h2>{{$music->artist}}</h2>
                                                    <h3>{{$music->songtitle}}</h3>
                                                    <p>{{$music->genre}}</p>
                                                </div>
                                                <img src="/storage/{{$music->image}}" class="w-50">
                                            </a>
                                        </div>
                                        <audio controls class="w-100 mt-1">
                                            <source src="/storage/{{$music->audio}}">
                                        </audio>
                                        <hr>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header bg-dark text-light">{{ __('All new tracks') }}</div>

                        <div>
                            @foreach($musics as $music)
                                <div class="col-12">
                                    <div class="d-flex justify-content-around p-2" style="flex-direction: row-reverse">
                                        <a href="/music/{{$music->id}}">
                                            <div class="title-wrapper">
                                                <h2>{{$music->artist}}</h2>
                                                <h3>{{$music->songtitle}}</h3>
                                                <p>{{$music->genre}}</p>
                                            </div>
                                            <img src="/storage/{{$music->image}}" class="w-50">
                                        </a>
                                    </div>
                                    <audio controls class="w-100 mt-1">
                                        <source src="/storage/{{$music->audio}}">
                                    </audio>
                                    <hr>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
