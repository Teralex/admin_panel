@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('panel.templates.title')</h3>
    @can('role_create')
    <p>
        <a href="{{ route('templates.create') }}" class="btn btn-success">@lang('panel.add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('panel.list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($templates) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        @can('role_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('panel.templates.fields.title')</th>
                        <th>@lang('panel.actions')</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($templates) > 0)
                        @foreach ($templates as $role)
                            <tr data-entry-id="{{ $role->id }}">
                                @can('role_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $role->title }}</td>
                                <td>
                                    @can('role_view')
                                    <a href="{{ route('templates.show',[$role->id]) }}" class="btn btn-xs btn-primary">@lang('panel.view')</a>
                                    @endcan
                                    @can('role_edit')
                                    <a href="{{ route('templates.edit',[$role->id]) }}" class="btn btn-xs btn-info">@lang('panel.edit')</a>
                                    @endcan
                                    @can('role_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("panel.are_you_sure")."');",
                                        'route' => ['templates.destroy', $role->id])) !!}
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
        @can('role_delete')
            window.route_mass_crud_entries_destroy = '{{ route('templates.mass_destroy') }}';
        @endcan

    </script>
@endsection