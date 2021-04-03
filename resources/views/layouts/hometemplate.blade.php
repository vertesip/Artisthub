<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('ArtistHUB', 'ArtistHUB') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.socket.io/3.1.3/socket.io.min.js"
            integrity="sha384-cPwlPLvBTa3sKAgddT6krw0cJat7egBga3DJepJyrLl4Q9/5WLra3rrnMcyTyOnh"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>



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
                       href="{{ route('discover') }}">
                        {{ __('Discover') }}</a>
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
                                {{ Auth::user()->name }}
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
                                    <button type="button" class="w-50 btn"><img class="w-75"
                                                                                src="\storage\Icons\128-log-out.png">
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
        <div class="ap" id="ap">
            <div class="ap-inner">
                <div class="ap-panel">
                    <div class="ap-item ap--playback">
                        <button class="ap-controls ap-prev-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#ffffff" height="24" viewBox="0 0 24 24"
                                 width="24">
                                <path d="M6 6h2v12H6zm3.5 6l8.5 6V6z"/>
                                <path d="M0 0h24v24H0z" fill="none"/>
                            </svg>
                        </button>
                        <button class="ap-controls ap-toggle-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" height="30" viewBox="0 0 24 24"
                                 width="30" class="ap--play">
                                <path d="M8 5v14l11-7z"/>
                                <path d="M0 0h24v24H0z" fill="none"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#ffffff" height="30" viewBox="0 0 24 24"
                                 width="30" class="ap--pause">
                                <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>
                                <path d="M0 0h24v24H0z" fill="none"/>
                            </svg>
                        </button>
                        <button class="ap-controls ap-next-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#ffffff" height="24" viewBox="0 0 24 24"
                                 width="24">
                                <path d="M6 18l8.5-6L6 6v12zM16 6v12h2V6h-2z"/>
                                <path d="M0 0h24v24H0z" fill="none"/>
                            </svg>
                        </button>
                    </div>
                    <div class="ap-item ap--track">
                        <div class="ap-info">
                            <div class="ap-title">Unknown</div>
                            <div class="ap-time">
                                <span class="ap-time--current">--</span>
                                <span> / </span>
                                <span class="ap-time--duration">--</span>
                            </div>
                            <div class="ap-progress-container">
                                <div class="ap-progress">
                                    <div class="ap-bar"></div>
                                    <div class="ap-preload-bar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ap-item ap--settings">
                        <div class="ap-controls ap-volume-container">
                            <button class="ap-volume-btn">
                                <svg fill="#ffffff" height="48" viewBox="0 0 24 24" width="24"
                                     xmlns="http://www.w3.org/2000/svg" class="ap--volume-on">
                                    <path
                                        d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.91 7-4.49 7-8.77s-2.99-7.86-7-8.77z"/>
                                    <path d="M0 0h24v24H0z" fill="none"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#ffffff" height="48" viewBox="0 0 24 24"
                                     width="24" class="ap--volume-off">
                                    <path d="M7 9v6h4l5 5V4l-5 5H7z"/>
                                    <path d="M0 0h24v24H0z" fill="none"/>
                                </svg>
                            </button>
                            <div class="ap-volume">
                                <div class="ap-volume-progress">
                                    <div class="ap-volume-bar"></div>
                                </div>
                            </div>
                        </div>
                        <button class="ap-controls ap-repeat-btn">
                            <svg fill="#ffffff" height="24" viewBox="0 0 24 24" width="24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 0h24v24H0z" fill="none"/>
                                <path d="M7 7h10v3l4-4-4-4v3H5v6h2V7zm10 10H7v-3l-4 4 4 4v-3h12v-6h-2v4z"/>
                            </svg>
                        </button>
                        <button class="ap-controls ap-playlist-btn">
                            <svg fill="#ffffff" height="24" viewBox="0 0 24 24" width="24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 0h24v24H0z" fill="none"/>
                                <path
                                    d="M15 6H3v2h12V6zm0 4H3v2h12v-2zM3 16h8v-2H3v2zM17 6v8.18c-.31-.11-.65-.18-1-.18-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3V8h3V6h-5z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-dark d-flex justify-content-center" style="margin-bottom: 50px">
        <p class="text-white d-flex align-items-center" style="    margin: 0;
    height: 40px;">ArtistHUB made by: Vértesi Patrik</p>
    </footer>
</div>


<script src="{{ mix('js/app.js') }}"></script>
</body>
@stack('scripts')
</html>
<script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
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
