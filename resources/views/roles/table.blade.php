<table class="table table-striped table-bordered table-hover dt-responsive DataTable" id="roles-table">
    <thead>
        <th>@lang('fully.Role Name')</th>
        <th>@lang('fully.Created By')</th>
        <th >@lang('fully.Actions')</th>
    </thead>
    <tbody>
    @foreach($roles as $roles)
        <tr>
            <td>{!! $roles->role_name !!}</td>
            <td>{!! $roles->created_by !!}</td>
            <td width="8%">
                {!! Form::open(['route' => ['settings.roles.destroy', $roles->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('settings.roles.show', [$roles->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('settings.roles.edit', [$roles->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="{!! route('settings.roles.assign', [$roles->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-add"></i></a>
 
                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('@lang('fully.Delete_Confirm')')"><i class="glyphicon glyphicon-trash"></i></button>
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>