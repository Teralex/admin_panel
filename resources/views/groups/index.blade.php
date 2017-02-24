@extends('layouts.app')

@section('content')
<h3 class="page-title">@lang('panel.groups.title')</h3>
@can('group_create')
<p>
    <a href="{{ route('groups.create') }}" class="btn btn-success">@lang('panel.add_new')</a>
</p>
@endcan

<div class="panel panel-default">
    <div class="panel-heading">
        @lang('panel.list')
    </div>

    <div class="panel-body">
        <table class="table table-bordered table-striped {{ count($groups) > 0 ? 'datatable' : '' }} dt-select">
            <thead>
                <tr>
                    @can('group_delete')
                    <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                    @endcan
                    <th>@lang('panel.groups.fields.id')</th>
                    <th>@lang('panel.groups.fields.title')</th>
                    <th>@lang('panel.groups.fields.tagname')</th>
                    <th>@lang('panel.groups.fields.articles')</th>
                    <th>@lang('panel.created')</th>
                    <th>@lang('panel.updated')</th>
                    <th>@lang('panel.actions')</th>
                </tr>
            </thead>

            <tbody>
                @if (count($groups) > 0)
                @foreach ($groups as $group)
                <tr data-entry-id="{{ $group->id }}">
                    @can('group_delete')
                    <td></td>
                    @endcan
                    <td>{{ $group->id }}</td>
                    <td><a href="{{ route('groups.show',[$group->id]) }}" >{{ $group->title }}</a></td>
                    <td>{{ $group->tagname }}</td>
                    <td>{{ \App\News::where('group_id', $group->id)->count() }} </td>
                    <td>{{ $group->created_at }}</td>
                    <td>{{ $group->updated_at }}</td>
                    <td>
                        <a href="{{ route('groups.show',[$group->id]) }}" class="btn btn-xs btn-primary">@lang('panel.view')</a>
                        @can('group_edit')
                        <a href="{{ route('groups.edit',[$group->id]) }}" class="btn btn-xs btn-info">@lang('panel.edit')</a>
                        @endcan
                        @can('group_delete')
                        {!! Form::open(array(
                        'style' => 'display: inline-block;',
                        'method' => 'DELETE',
                        'onsubmit' => "return confirm('".trans("panel.are_you_sure")."');",
                        'route' => ['groups.destroy', $group->id])) !!}
                        {!! Form::submit(trans('panel.delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                        {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="3">@lang('panel.no_entries_in_table')</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@stop

@section('javascript') 
<script>
    @can('group_delete')
            window.route_mass_crud_entries_destroy = '{{ route('groups.mass_destroy') }}';
    @endcan

</script>
@endsection