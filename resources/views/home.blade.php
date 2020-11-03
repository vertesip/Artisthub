@extends('layouts.hometemplate')

@section('content')
    <div class="container">

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
