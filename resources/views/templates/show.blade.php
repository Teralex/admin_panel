@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('panel.news.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('panel.view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('panel.news.fields.title')</th>
                            <td>{{ $template->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('panel.news.fields.content')</th>
                            <td>{!! $template->content !!}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->

            <p>&nbsp;</p>

            <a href="{{ route('templates.index') }}" class="btn btn-default">@lang('panel.back_to_list')</a>
        </div>
    </div>
@stop