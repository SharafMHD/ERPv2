<table class="table table-striped table-bordered table-hover dt-responsive DataTable" id="privileges-table">
    <thead>
        <th>@lang('fully.Role')</th>
        <th>@lang('fully.Action')</th>
        <th>@lang('fully.Model')</th>
        <th >@lang('fully.Actions')</th>
    </thead>
    <tbody>
    @foreach($privileges as $privileges)
        <tr>
            <td>{!! $privileges->role !!}</td>
            <td>{!! $privileges->action !!}</td>
            <td>{!! $privileges->model !!}</td>
            <td width="8%">
                {!! Form::open(['route' => ['privileges.destroy', $privileges->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('privileges.show', [$privileges->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('privileges.edit', [$privileges->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                            <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('@lang('fully.Delete_Confirm')')"><i class="glyphicon glyphicon-trash"></i></button>
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>