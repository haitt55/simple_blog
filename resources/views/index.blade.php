@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-md-offset-1">
                <br>
                <div class="card">
                    <div class="card-header">List Posts</div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            @foreach($posts as $post)
                                <li>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p><a href="{{ route('posts.detail', array('post' => $post)) }}">{{ $post->title }}</a></p>
                                        </div>
                                        {{--<div class="col-md-12">--}}
                                            {{--<div>--}}
                                                {{--{{ \Illuminate\Mail\Markdown::parse($post->body) }}--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
