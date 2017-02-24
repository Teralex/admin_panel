@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('panel.articles.title')</h3>
    
    {!! Form::model($news, ['method' => 'PUT', 'route' => ['news.update', $news->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('panel.edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">

                    {!! Form::label('title', 'Title*', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <br>
                    {!! Form::label('group', 'Group*', ['class' => 'control-label']) !!}<br>
                    {!! Form::select('group_id', $groups) !!}
                    <br><br>
                    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                    {!! Form::text('description', old('description'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <br>
                    {!! Form::hidden('content', old('content'), ['class' => 'form-control', 'id' => 'content', 'placeholder' => '']) !!}

                    <script type="text/javascript" src="{!! asset('assets/js/ckeditor/ckeditor.js') !!}"></script>
                    <textarea name="editor1" id="editor1" rows="10" cols="80">{{ $news->content }}</textarea>
                    <script type="text/javascript" src="{!! asset('assets/js/templates.js') !!}"></script>

                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {!! Form::submit(trans('panel.update'), ['class' => 'btn btn-danger']) !!}

    <a href="{{ route('news.index') }}" class="btn btn-default">@lang('panel.back_to_list')</a>

    {!! Form::close() !!}
@stop

