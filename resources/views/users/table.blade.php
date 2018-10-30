<table class="table table-striped table-bordered table-hover dt-responsive DataTable" id="users-table">
    <thead>
        <th>@lang('fully.Name')</th>
        <th>@lang('fully.Email')</th>

        <th>@lang('fully.User Name')</th>
        <th>@lang('fully.Role')</th>
      
        <th>@lang('fully.Status')</th>
        <th >@lang('fully.Actions')</th>
    </thead>
    <tbody>
    @foreach($users as $users)
        <tr>
            <td>{!! $users->name !!}</td>
            <td>{!! $users->email !!}</td>

            <td>{!! $users->user_name !!}</td>
            <td>{!! $users->role !!}</td>
     
            <td>{!! $users->status !!}</td>
            <td width="8%">
                {!! Form::open(['route' => ['users.destroy', $users->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('users.show', [$users->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('users.edit', [$users->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                            <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('@lang('fully.Delete_Confirm')')"><i class="glyphicon glyphicon-trash"></i></button>
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>