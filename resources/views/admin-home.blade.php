@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-md-offset-1">
                <br>
                <div class="card">
                    <div class="card-header">List Posts</div>
                    @if (Session::has('message'))
                        <div class="col-md-12">
                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                        </div>
                    @endif
                    <div class="card-body">
                        <form class="form-inline" action="{{ route('admin.home') }}">
                            <div class="form-group">
                                <label for="order">{{ __('Order By') }}</label>
                                <select class="form-control" id="order" name="order">
                                    <option value="">{{ __('--') }}</option>
                                    <option value="date_desc" @if($order == 'date_desc') selected @endif>{{ __('Date DESC') }}</option>
                                    <option value="date_asc" @if($order == 'date_asc') selected @endif>{{ __('Date ASC') }}</option>
                                    <option value="published_first" @if($order == 'published_first') selected @endif>{{ __('Published First') }}</option>
                                    <option value="unpublished_first" @if($order == 'unpublished_first') selected @endif>{{ __('Unpublished First') }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="order">{{ __('Filter By') }}</label>
                                <select class="form-control" id="filter" name="filter">
                                    <option value="">{{ __('--') }}</option>
                                    <option value="published" @if($filter == 'published') selected @endif>{{ __('Published') }}</option>
                                    <option value="unpublished" @if($filter == 'unpublished') selected @endif>{{ __('Unpublished') }}</option>
                                </select>
                            </div>
                            <button class="btn btn-primary" type="submit">{{ __('Apply') }}</button>
                        </form>
                        <br>
                        <ul class="list-unstyled">
                            <li>
                                <div class="form-group row">
                                    <div class="col-md-1">
                                        {{ __('No') }}
                                    </div>
                                    <div class="col-md-4">
                                        {{ __('Title') }}
                                    </div>
                                    <div class="col-md-1">
                                        {{ __('User') }}
                                    </div>
                                    <div class="col-md-2">
                                        {{ __('Date') }}
                                    </div>
                                    <div class="col-md-2">
                                        {{ __('Status') }}
                                    </div>
                                    <div class="col-md-1">

                                    </div>
                                </div>
                            </li>
                            @foreach($posts as $post)
                                <li>
                                    <div class="row">
                                        <div class="col-md-1">
                                            {{ (($posts->currentPage() - 1 ) * $posts->perPage() ) + $loop->iteration }}
                                        </div>
                                        <div class="col-md-4">
                                            <p>{{ $post->title }}</p>
                                        </div>
                                        <div class="col-md-1">
                                            <p>{{ $post->user->name }}</p>
                                        </div>
                                        <div class="col-md-2">
                                            <p>{{ $post->created_at }}</p>
                                        </div>
                                        <div class="col-md-2">
                                            @if($post->is_publish)
                                                <span class="label label-success">Published</span>
                                            @else
                                                <span class="label label-default">Unpublished</span>
                                            @endif
                                        </div>
                                        <div class="col-md-1">
                                            <a class="btn btn-primary" href="{{ route('admin.posts.edit', array('post' => $post)) }}">{{ __('Edit') }}</a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    {{ $posts->appends(request()->input())->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection