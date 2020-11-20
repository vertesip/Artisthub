@extends('layouts.hometemplate')

@section('content')
    <div class="container">


        <div class="row justify-content-center pb-5">
            <div class="col-md-12 text-center">
                <div class="card">
                    <div class="carousel-wrapper">
                        <div class="carousel-slider">
                            <span class="storycenter"><img class="rounded-circle" style="width: 100px;height: 100px" src="https://photos.bandsintown.com/thumb/9713536.jpeg">Excision</span>
                            <span class="storycenter"><img class="rounded-circle" style="width: 100px;height: 100px" src="https://photos.bandsintown.com/thumb/9508083.jpeg">Subtronics</span>
                            <span class="storycenter"><img class="rounded-circle" style="width: 100px;height: 100px" src="https://photos.bandsintown.com/thumb/9131158.jpeg">Peekaboo</span>
                            <span class="storycenter"><img class="rounded-circle" style="width: 100px;height: 100px" src="https://photos.bandsintown.com/thumb/9016611.jpeg">Midnight T.</span>
                            <span class="storycenter"><img class="rounded-circle" style="width: 100px;height: 100px" src="https://photos.bandsintown.com/thumb/9032785.jpeg">He$h</span>
                            <span class="storycenter"><img class="rounded-circle" style="width: 100px;height: 100px" src="https://photos.bandsintown.com/thumb/8659522.jpeg">Svdden Death</span>
                            <span class="storycenter"><img class="rounded-circle" style="width: 100px;height: 100px" src="https://photos.bandsintown.com/thumb/6311197.jpeg">Snails</span>
                            <span class="storycenter"><img class="rounded-circle" style="width: 100px;height: 100px" src="https://photos.bandsintown.com/thumb/10216026.jpeg">Marshmello</span>
                            <span class="storycenter"><img class="rounded-circle" style="width: 100px;height: 100px" src="https://photos.bandsintown.com/thumb/10485906.jpeg">Illenium</span>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-between">
            <div class="col-md-3 text-center">
                <div class="card">
                    <div class="card-header bg-dark text-light">{{ __('New tracks') }}</div>

                    <div class="card-body">
                        <p>tracks</p>
                        <p>tracks</p>
                        <p>tracks</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="card">
                    <div class="card-header bg-dark text-light">{{ __('Post') }}</div>

                    <div class="card-body">
                        {{ __('Content') }}
                    </div>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="card">
                    <div class="card-header bg-dark text-light">{{ __('Friends online') }}</div>

                    <div class="card-body">
                        <p>Friend 1</p>
                        <p>Friend 2</p>
                        <p>Friend 3</p>
                    </div>
                </div>
            </div>
        </div>

@endsection
