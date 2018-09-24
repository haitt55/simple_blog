@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-md-offset-1">
                <div class="card">
                    <div class="card-header">@if($post->id) {{ __('Edit Post') }} @else {{ __('Create Post') }} @endif</div>

                    <div class="card-body">
                        <form action="@if($post->id){{ route('posts.update', array('post' => $post)) }}@else{{ route('posts.store') }}@endif" @if($post->id) method="post" @else method="post" @endif>
                            @if($post->id)
                                <input type="hidden" name="_method" value="PUT">
                            @endif
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-sm-3 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-8">
                                    <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title', $post->title) }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="body" class="col-sm-3 col-form-label text-md-right">{{ __('Body') }}</label>

                                <div class="col-md-8">
                                    <textarea id="body" type="text" rows="10" data-provide="markdown"
                                              class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}"
                                              name="body" value="" required>{{ old('body', $post->body) }}</textarea>

                                    @if ($errors->has('body'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-2">
                                    <button class="btn btn-primary" type="submit" name="{{ __('Create') }}">@if($post->id) {{ __('Update') }} @else{{ __('create') }}@endif</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection