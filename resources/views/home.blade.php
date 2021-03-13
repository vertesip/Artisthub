@extends('layouts.hometemplate')

@section('content')
    <div class="container-fluid d-flex justify-content-center">

        <div class="col-10">
            <div class="row justify-content-center pb-5">
                <div class="col-md-12 text-center">
                    <div class="card">
                        <div class="carousel-wrapper">
                            <div class="carousel-slider">
                            <span class="storycenter"><img class="rounded-circle" style="width: 100px;height: 100px"
                                                           src="https://photos.bandsintown.com/thumb/9713536.jpeg">Excision</span>
                                <span class="storycenter"><img class="rounded-circle" style="width: 100px;height: 100px"
                                                               src="https://photos.bandsintown.com/thumb/9508083.jpeg">Subtronics</span>
                                <span class="storycenter"><img class="rounded-circle" style="width: 100px;height: 100px"
                                                               src="https://photos.bandsintown.com/thumb/9131158.jpeg">Peekaboo</span>
                                <span class="storycenter"><img class="rounded-circle" style="width: 100px;height: 100px"
                                                               src="https://photos.bandsintown.com/thumb/9016611.jpeg">Midnight T.</span>
                                <span class="storycenter"><img class="rounded-circle" style="width: 100px;height: 100px"
                                                               src="https://photos.bandsintown.com/thumb/9032785.jpeg">He$h</span>
                                <span class="storycenter"><img class="rounded-circle" style="width: 100px;height: 100px"
                                                               src="https://photos.bandsintown.com/thumb/8659522.jpeg">Svdden Death</span>
                                <span class="storycenter"><img class="rounded-circle" style="width: 100px;height: 100px"
                                                               src="https://photos.bandsintown.com/thumb/6311197.jpeg">Snails</span>
                                <span class="storycenter"><img class="rounded-circle" style="width: 100px;height: 100px"
                                                               src="https://photos.bandsintown.com/thumb/10216026.jpeg">Marshmello</span>
                                <span class="storycenter"><img class="rounded-circle" style="width: 100px;height: 100px"
                                                               src="https://photos.bandsintown.com/thumb/10485906.jpeg">Illenium</span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-md-3 text-center">
                    <div class="card" style="width: 120%">
                        <div class="card-header bg-dark text-light">{{ __('New tracks') }}</div>

                        <div class="card-body">
                            @foreach($musics as $music)
                                <div class="col-12">
                                    <?php echo $music->embedLink;?>
                                    <hr>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="card" style="width: 120%">
                        <div class="card-header bg-dark text-light">{{ __('Posts') }}</div>

                        <div class="card-body">
                            @foreach($posts as $post)

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
                                        {{$post->user->name}}
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
                </div>
                <div class="col-md-3 text-center">
                    <div class="card">
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
            </div>
        </div>
    </div>
@endsection
