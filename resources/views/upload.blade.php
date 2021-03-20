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
                        <label for="artist" class="col-md-4 col-form-label">Artist</label>

                        <input id="artist" type="text"
                               class="form-control @error('artist') is-invalid @enderror"
                               name="artist"
                               value="{{ old('artist') }}"
                               required autocomplete="artist" autofocus>

                        @error('artist')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label for="songtitle" class="col-md-4 col-form-label">Song title</label>

                        <input id="songtitle" type="text"
                               class="form-control @error('songtitle') is-invalid @enderror"
                               name="songtitle"
                               value="{{ old('songtitle') }}"
                               required autocomplete="songtitle" autofocus>

                        @error('songtitle')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label for="genre" class="col-md-4 col-form-label">Music genre</label>

                        <input id="genre" type="text"
                               class="form-control @error('genre') is-invalid @enderror"
                               name="genre"
                               value="{{ old('genre') }}"
                               required autocomplete="genre" autofocus>

                        @error('genre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row">
                        <label for="image" class="col-md-4 col-form-label">Cover image</label>
                    </div>
                    <input type="file" , class="file-control-file" id="image" name="image">
                    @error('image')
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="row">
                        <label for="audio" class="col-md-4 col-form-label">Upload music</label>
                    </div>
                    <input type="file" , class="file-control-file" id="audio" name="audio">
                    @error('audio')
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="row pt-4">
                        <button class="btn btn-primary">Upload New Music</button>
                    </div>
                </div>

            </div>

        </form>
    </div>
@endsection
