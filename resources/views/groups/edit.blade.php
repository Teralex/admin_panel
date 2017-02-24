@extends('layouts.app')

@section('content')
<h3 class="page-title">@lang('panel.groups.title')</h3>

{!! Form::model($group, ['method' => 'PUT', 'route' => ['groups.update', $group->id]]) !!}

<div class="panel panel-default">
    <div class="panel-heading">
        @lang('panel.edit')
    </div>

    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12 form-group">
                {!! Form::label('title', 'Title*', ['class' => 'control-label']) !!}
                {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '']) !!}
                {!! Form::label('tagname', 'Tagname*', ['class' => 'control-label']) !!}
                {!! Form::text('tagname', old('tagname'), ['class' => 'form-control', 'readonly', 'placeholder' => '']) !!}
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
{!! Form::close() !!}
@stop

