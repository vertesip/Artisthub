@extends('layouts.hometemplate')

@section('content')
    <!-- Variables -->
    <script>
        window.userId = "{{$user->id}}";
        window.follows = "{{($follows) ? 'true' : 'false'}}";
    </script>
    <div class="banner shadow-lg"><img class="position-absolute"
                             src="/storage/{{$user->profile->bannerimage}}">
        <div class="container-fluid">
            <div class="row">
                <div class="col-3 p-5">
                    <img src="{{$user->profile->profileImage()}}" class="rounded-circle">
                </div>
                <div class="col-9 pt-5">
                    <div class="d-flex justify-content-between align-items-baseline">
                        <div class="d-flex align-items-center pb-3">
                            <div class="h1 text-light bg-dark p-1">{{ $user->name }}</div>
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
            <div class="d-flex">
                <div class="container justify-content-center">
                    <div class="container justify-content-center row" style="width: 105%">
                        <h2 class="text-light"></h2>
                    </div>
                </div>
                <div class="container justify-content-center card" >
                    <div class="card-header container bg-dark shadow-sm justify-content-center row" style="width: 105%">
                        <h2 class="text-light">Posts</h2>
                    </div>
                </div>
                <div class="container justify-content-center card">
                    <div class="card-header container bg-dark shadow-sm justify-content-center row" style="width: 105%">
                        <h2 class="text-light">Tracks</h2>
                    </div>
                </div>
            </div>
            <div class="d-flex">
                <div class="card-body container justify-content-center pt-5 text-center" style="margin-top: -92px;">
                    <div class="container justify-content-center row">
                        <div class="text-center justify-content-center mr-4">
                            <p class="text-light h2"><strong>{{$user->posts->count()}}</strong></p>
                            <p class="text-light h4" style="margin-top:-20px"><br>posts</p>
                        </div>
                        <div class="text-center justify-content-center mr-4">
                            <p class="text-light h2"><strong>{{$user->music->count()}}</strong></p>
                            <p class="text-light h4"style="margin-top:-20px"><br>tracks</p>
                        </div>
                        <div class="text-center justify-content-center mr-4">
                            <p class="text-light h2"><strong>{{$user->profile->followers->count()}}</strong></p>
                            <p class="text-light h4"style="margin-top:-20px"><br>followers</p>
                        </div>
                        <div class="text-center justify-content-center mr-4">
                            <p class="text-light h2"><strong>{{$user->following->count()}}</strong></p>
                            <p class="text-light h4"style="margin-top:-20px"><br>following</p>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex flex-column text-left">
                        <p class="text-light h2 mt-5 mb-4">{{ $user->profile->title ?? '' }}</p>
                        <a class="text-light h4" href="{{ $user->profile->url ?? '' }}"
                           target="_blank">{{ $user->profile->url ?? '' }}</a><br>
                        <p class="text-light">{{ $user->profile->description ?? '' }}</p>
                    </div>
                </div>
                <div class="bg-light container card">
                <div class="card-body container justify-content-center row pt-5 m-auto text-center">
                    @foreach($user->posts as $post)
                        <div class="container pb-3">
                            <div class="row">
                                <div class="col-8">
                                    <a href="/post/{{$post->id}}">
                                        <img src="/storage/{{ $post->image }}" class="w-100">
                                    </a>
                                </div>

                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <div class="pr-3">
                                            <img src="{{$post->user->profile->profileImage()}}"
                                                 class="rounded-circle w-100"
                                                 style="max-width: 50px">
                                        </div>
                                        <div>
                                            <div class="font-weight-bold">

                                    <span class="text-dark">
                                                    <a href="/profile/{{$post->user->id}}">
                                        {{$post->user->username}}
                                                    </a></span>


                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <p>
                    <span class="font-weight-bold">
                        <a href="/profile/{{$post->user->id}}">
                        </a></span>{{ $post->text }}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
                </div>
                <div class="card-body container justify-content-center text-center">
                    @foreach($user->music as $music)
                        <div class="col-12">
                                    <?php echo $music->embedLink;?>
                            <hr>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>


@endsection
