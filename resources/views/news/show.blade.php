@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('panel.articles.title')</h3>

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
                            <td>{{ $news->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('panel.news.fields.group')</th>
                            <td>{{ $news->group }}</td>
                        </tr>
                        <tr>
                            <th>@lang('panel.news.fields.description')</th>
                            <td>{{ $news->description }}</td>
                        </tr>
                        <tr>
                            <th>@lang('panel.news.fields.content')</th>
                            <td>{!! $news->content !!}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->

            <p>&nbsp;</p>

            <a href="{{ route('news.index') }}" class="btn btn-default">@lang('panel.back_to_list')</a>
        </div>
    </div>
@stop