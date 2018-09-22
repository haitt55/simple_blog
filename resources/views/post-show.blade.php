@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-md-offset-1">
                <div class="card">
                    <div class="card-header">{{ __('Show Post') }}</div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-8">
                                <p>{{ $post->title }}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="body" class="col-sm-3 col-form-label text-md-right">{{ __('Body') }}</label>

                            <div class="col-md-8">
                                <div>
                                    {{ \Illuminate\Mail\Markdown::parse($post->body) }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="publish" class="col-sm-3 col-form-label text-md-right">{{ __('Publish') }}</label>
                            <div class="col-md-8">
                                {{ $post->is_publish ? __('Is Pushlish') : __('Is Not Pushlish') }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-1 col-md-offset-3">
                                <a class="btn btn-primary" href="{{ route('posts.edit', array('post' => $post)) }}">{{ __('Edit') }}</a>
                            </div>
                            <div class="col-md-1">
                                <form action="{{ route('posts.destroy', array('post' => $post)) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit">{{ __('Delete') }}</button>
                                </form>
                            </div>
                            <div class="col-md-1">
                                <a class="btn btn-primary" href="{{ route('home') }}">{{ __('Home') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection