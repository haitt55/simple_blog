@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-md-offset-1">
                <div class="card">
                    <div class="card-header">@if($post->id) {{ __('Edit Post') }} @else {{ __('Create Post') }} @endif</div>

                    <div class="card-body">
                        <form action="@if($post->id){{ route('admin.posts.update', array('post' => $post)) }}@else{{ route('admin.posts.store') }}@endif" @if($post->id) method="post" @else method="post" @endif>
                            @if($post->id)
                                <input type="hidden" name="_method" value="PUT">
                            @endif
                            @csrf

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
                                <div class="col-md-8 col-md-offset-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="is_publish"
                                               id="is_publish" {{ old('is_publish', $post->is_publish) ? 'checked' : '' }}>

                                        <label class="form-check-label" for="is_publish">
                                            {{ __('Pushlish') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="dtp_input1" class="col-sm-3 col-form-label text-md-right">{{ __('Publish Time') }}</label>

                                <div class="col-md-8">
                                    <div class="input-group date form_datetime col-md-6" data-date="{{ $post->published_at }}" data-date-format="dd MM yyyy - HH:ii p" data-link-field="published_at">
                                        <input class="form-control" size="20" type="text" value="{{ date('d F Y - h:i A', strtotime($post->published_at)) }}" readonly>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                    </div>
                                    <input type="hidden" name="published_at" id="published_at" value="{{ $post->published_at }}" /><br/>
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

@section('js')
    <script type="text/javascript" src="{{ asset('js/bootstrap-datetimepicker.min.js') }}" charset="UTF-8"></script>
    <script type="text/javascript" src="{{ asset('js/locales/bootstrap-datetimepicker.fr.js') }}" charset="UTF-8"></script>
    <script type="text/javascript">
        $('.form_datetime').datetimepicker({
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            forceParse: 0,
            showMeridian: 1
        });
    </script>
@endsection