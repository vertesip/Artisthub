@extends('layouts.hometemplate')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-3 text-center">
                <div class="card">
                    <div class="card-header">{{ __('New tracks') }}</div>

                    <div class="card-body">
                        <p>tracks</p>
                        <p>tracks</p>
                        <p>tracks</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="card">
                    <div class="card-header">{{ __('Post') }}</div>

                    <div class="card-body">
                        {{ __('Content') }}
                    </div>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="card">
                    <div class="card-header">{{ __('Friends online') }}</div>

                    <div class="card-body">
                        <p>Friend 1</p>
                        <p>Friend 2</p>
                        <p>Friend 3</p>
                    </div>
                </div>
            </div>
        </div>
@endsection
