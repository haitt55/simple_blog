@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-md-offset-1">
            <div class="row">
                <div class="col-md-2">
                    <a class="btn btn-primary" href="{{ route('posts.create') }}">Create post</a>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">List Posts</div>
                @if (Session::has('message'))
                    <div class="col-md-12">
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    </div>
                @endif
                <div class="card-body">
                    <ul class="list-unstyled">
                        @foreach($posts as $post)
                            <li>
                                <div class="row">
                                    <div class="col-md-2">
                                        {{ (($posts->currentPage() - 1 ) * $posts->perPage() ) + $loop->iteration }}
                                    </div>
                                    <div class="col-md-6">
                                        <p><a href="{{ route('posts.show', array('post' => $post)) }}">{{ $post->title }}</a></p>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="btn btn-primary" href="{{ route('posts.edit', array('post' => $post)) }}">{{ __('Edit') }}</a>
                                    </div>
                                    <div class="col-md-2">
                                        <form action="{{ route('posts.destroy', array('post' => $post)) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger" type="submit">{{ __('Delete') }}</button>
                                        </form>
                                    </div>
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
