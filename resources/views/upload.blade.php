@extends('layouts.hometemplate')

@section('content')
    <div class="container">
        <form action="/music" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row card p-5">
                <div class="col-8 offset-2">
                    <div class="row">
                        <h1>Upload New Music</h1>
                    </div>
                    <div class="form-group row">
                        <label for="caption" class="col-md-4 col-form-label">Soundcloud embed link</label>

                        <input id="sclink" type="text"
                               class="form-control @error('sclink') is-invalid @enderror"
                               name="sclink"
                               value="{{ old('sclink') }}"
                               required autocomplete="sclink" autofocus>

                        @error('sclink')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row pt-4">
                        <button class="btn btn-primary">Upload New Music</button>
                    </div>
                </div>

            </div>

        </form>
    </div>
@endsection
