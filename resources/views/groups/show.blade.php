@extends('layouts.app')

@section('content')
<h3 class="page-title">@lang('panel.groups.title')</h3>

<div class="panel panel-default">
    <div class="panel-heading">
        @lang('panel.view')
    </div>

    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>@lang('panel.news.fields.title')</th>
                        <td>{{ $group->title }}</td>
                    </tr>
                </table>
            </div>
        </div><!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">

            <li role="presentation" class="active"><a href="#users" aria-controls="users" role="tab" data-toggle="tab">Articles</a></li>

        </ul>

        <!-- Tab panes -->
        <div class="tab-content">

            <div role="tabpanel" class="tab-pane active" id="users">
                <table class="table table-bordered table-striped {{ isset($news) && count($news) > 0 ? 'datatable' : '' }}">
                    <thead>
                        <tr>
                            <th>@lang('panel.news.fields.title')</th>
                            <th>@lang('panel.actions')</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if (isset($news) && count($news) > 0)
                        @foreach ($news as $newsData)
                        <tr data-entry-id="{{ $newsData->id }}">
                            <td>{{ $newsData->title }}</td>
                            <td>
                                @can('news_view')
                                <a href="{{ route('news.show',[$newsData->id]) }}" class="btn btn-xs btn-primary">@lang('panel.view')</a>
                                @endcan
                                @can('news_edit')
                                <a href="{{ route('news.edit',[$newsData->id]) }}" class="btn btn-xs btn-info">@lang('panel.edit')</a>
                                @endcan
                                @can('user_delete')
                                {!! Form::open(array(
                                'style' => 'display: inline-block;',
                                'method' => 'DELETE',
                                'onsubmit' => "return confirm('".trans("panel.are_you_sure")."');",
                                'route' => ['news.destroy', $newsData->id])) !!}
                                {!! Form::submit(trans('panel.delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!}
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="7">@lang('panel.no_entries_in_table')</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <p>&nbsp;</p>

        <a href="{{ route('groups.index') }}" class="btn btn-default">@lang('panel.back_to_list')</a>
    </div>
</div>
@stop