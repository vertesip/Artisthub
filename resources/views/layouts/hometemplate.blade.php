<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('ArtistHUB', 'ArtistHUB') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}"/>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"
          integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
          crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"
          integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
          crossorigin="anonymous"/>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm fixed-top">
        <div class="container ">
            <a class="navbar-brand" href="{{ url('/home') }}">
                {{ config('ArtistHUB', 'ArtistHUB') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="d-flex align-items-center">
                <div>
                    <a class="text-light d-flex align-items-center"
                       href="/music/upload">
                        {{ __('Upload') }}
                    </a>
                </div>
                <div class="ml-4 mr-4">
                    <a class="text-light d-flex align-items-center"
                       href="{{ route('home') }}">
                        {{ __('Music') }}</a>
                </div>
            </div>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav ml-auto mr-auto" style="margin-left: 175px !important;">
                    {!! Form::open(array('method' => 'Get','class'=>'d-flex','route' => array('search', $user ?? ''))) !!}
                    {!! Form::text('search') !!}
                    <button class="btn btn-light btn-sm ml-1">Search</button>
                    {!! Form::close() !!}
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->

                    <div class="d-flex align-items-center">
                        <div>
                            <a class="text-light d-flex align-items-center"
                               href="{{ route('home') }}">
                                {{ __('Home') }}
                            </a>
                        </div>
                        <div class="ml-4 mr-4">
                            <a class="text-light d-flex align-items-center"
                               href="/post/create">New post</a>
                        </div>
                    </div>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">

                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img src="{{Auth::user()->profile->profileImage()}}"
                                     class="rounded-circle w-100"
                                     style="max-width: 25px">
                                {{ Auth::user()->username }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right bg-dark" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-light d-flex align-items-center"
                                   href="{{ route('home') }}">
                                    <button type="button" class="w-50 btn"
                                            onclick="window.location='{{ url("home") }}'"><img class="w-75"
                                                                                               src="\storage\Icons\053-home.png">
                                    </button>
                                    {{ __('Home') }}
                                </a>
                                <a class="dropdown-item text-light d-flex align-items-center"
                                   href="{{ route('id.show', ['userId' => Auth::id()]) }}">
                                    <button type="button" class="w-50 btn"
                                            onclick="window.location='{{ url("profile") }}'"><img class="w-75"
                                                                                                  src="\storage\Icons\097-user.png">
                                    </button>
                                    {{ __('Profile') }}
                                </a>
                                <a class="dropdown-item text-light d-flex align-items-center"
                                   href="/profile/{{Auth::id()}}/edit">
                                    <button type="button" class="w-50 btn"
                                            onclick="window.location='{{ url("Edit profile") }}'"><img class="w-75"
                                                                                                       src="\storage\Icons\142-settings.png">
                                    </button>
                                    {{ __('Edit') }}
                                </a>
                                <a class="dropdown-item text-light d-flex align-items-center"
                                   href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <button type="button" class="w-50 btn"><img class="w-75" src="\storage\Icons\128-log-out.png">
                                    </button>
                                    {{ __('Logout') }}

                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="homecenter">
        @yield('content')
    </main>

    <div class="fixed-bottom">
        <div class="audio-container d-flex justify-content-center bg-dark text-light">
            <div style="height: 50px"></div>
        </div>
    </div>

</div>

<script src="{{ mix('js/app.js') }}"></script>
<script src="{{asset('public/js/carousel.js')}}" type="text/javascript"></script>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.12/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
        integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
        crossorigin="anonymous"></script>
<script>
    $('.carousel-slider').slick({
        prevArrow: "<img class='a-left control-c prev slick-prev' style='height: 400px' src='http://borvidekdev.effixpro.hu/wp-content/uploads/2020/11/ginop_portal_left_gray.svg'>",
        nextArrow: "<img class='a-right control-c next slick-next' style='height: 400px' src='http://borvidekdev.effixpro.hu/wp-content/uploads/2020/11/ginop_portal_right_gray.svg'>",
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        variableWidth: true,
        autoplaySpeed: 50
    });
</script>
