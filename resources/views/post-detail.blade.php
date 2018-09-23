@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-md-offset-1">
                <div class="card">
                    <div class="card-header">{{ __('Show Post') }}</div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <p>{{ $post->title }}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div>
                                    {{ \Illuminate\Mail\Markdown::parse($post->body) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection