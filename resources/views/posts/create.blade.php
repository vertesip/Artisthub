@extends('layouts.hometemplate')

@section('content')
    <div class="container">
        <form action="/post" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row card p-5">
                <div class="col-8 offset-2">
                    <div class="row">
                        <h1>Add New Post</h1>
                    </div>
                    <div class="form-group row">
                        <label for="caption" class="col-md-4 col-form-label">Post Text</label>

                        <input id="caption" type="text"
                               class="form-control @error('caption') is-invalid @enderror"
                               name="caption"
                               value="{{ old('caption') }}"
                               required autocomplete="caption" autofocus>

                        @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="row">
                        <label for="image" class="col-md-4 col-form-label">Post Image</label>
                    </div>
                    <input type="file" , class="file-control-file" id="image" name="image">
                    @error('image')
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="row pt-4">
                        <button class="btn btn-primary">Add New Post</button>
                    </div>
                </div>

            </div>

        </form>
    </div>
@endsection
