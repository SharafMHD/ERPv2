<table class="table table-striped table-bordered table-hover dt-responsive DataTable" id="models-table">
    <thead>
        <th>@lang('fully.Name')</th>
        <th>@lang('fully.Label')</th>
        <th>@lang('fully.Parent')</th>
        <th>@lang('fully.Icon')</th>
        <th >@lang('fully.Actions')</th>
    </thead>
    <tbody>
    @foreach($models as $models)
        <tr>
            <td>{!! $models->name !!}</td>
            <td>{!! $models->label !!}</td>
            <td>{!! $models->parent !!}</td>
            <td>{!! $models->icon !!}</td>
            <td width="8%">
                {!! Form::open(['route' => ['settings.models.destroy', $models->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('settings.models.show', [$models->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('settings.models.edit', [$models->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                            <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('@lang('fully.Delete_Confirm')')"><i class="glyphicon glyphicon-trash"></i></button>
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>