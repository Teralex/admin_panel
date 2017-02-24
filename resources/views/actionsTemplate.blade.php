@can($gateKey.'view')
    <a href="{{ route($routeKey.'.show', $row->id) }}"
       class="btn btn-xs btn-primary">@lang('panel.view')</a>
@endcan
@can($gateKey.'edit')
    <a href="{{ route($routeKey.'.edit', $row->id) }}" class="btn btn-xs btn-info">@lang('panel.edit')</a>
@endcan
@can($gateKey.'delete')
    {!! Form::open(array(
        'style' => 'display: inline-block;',
        'method' => 'DELETE',
        'onsubmit' => "return confirm('".trans("panel.are_you_sure")."');",
        'route' => [$routeKey.'.destroy', $row->id])) !!}
    {!! Form::submit(trans('panel.delete'), array('class' => 'btn btn-xs btn-danger')) !!}
    {!! Form::close() !!}
@endcan