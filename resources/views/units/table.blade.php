<table class="table table-striped table-bordered table-hover dt-responsive DataTable" id="units-table">
    <thead>
        <th>@lang('fully.Name')</th>
        <th>@lang('fully.Description')</th>
        <th >@lang('fully.Actions')</th>
    </thead>
    <tbody>
    @foreach($units as $units)
        <tr>
            <td>{!! $units->name !!}</td>
            <td>{!! $units->description !!}</td>
            <td width="8%">
                {!! Form::open(['route' => ['units.destroy', $units->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('units.show', [$units->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('units.edit', [$units->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                            <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('@lang('fully.Delete_Confirm')')"><i class="glyphicon glyphicon-trash"></i></button>
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>