<table class="table table-striped table-bordered table-hover dt-responsive DataTable" id="hrDepartments-table">
    <thead>
        <th>Name</th>
        <th>Description</th>
        <th >Action</th>
    </thead>
    <tbody>
    @foreach($hrDepartments as $hrDepartment)
        <tr>
            <td>{!! $hrDepartment->name !!}</td>
            <td>{!! $hrDepartment->description !!}</td>
            <td width="8%">
                {!! Form::open(['route' => ['hrDepartments.destroy', $hrDepartment->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('hrDepartments.show', [$hrDepartment->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('hrDepartments.edit', [$hrDepartment->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>