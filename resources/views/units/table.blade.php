<table class="table table-striped table-bordered table-hover dt-responsive DataTable" id="units-table">
    <thead>
        <th>Name</th>
        <th>Description</th>
        <th >Action</th>
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
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>