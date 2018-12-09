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
                {!! Form::open(['route' => ['inventory.units.destroy', $units->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                   <!-- @if (auth::user()->GetAuthTable($ucontroller, 'show')) -->
                    <a href="{!! route('inventory.units.show', [$units->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                      <!-- @endif -->
                                @if (auth::user()->GetAuthTable($ucontroller, 'edit'))
                    <a href="{!! route('inventory.units.edit', [$units->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                         @endif
                           @if (auth::user()->GetAuthTable($ucontroller, 'delete'))
                       <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('@lang('fully.Delete_Confirm')')"><i class="glyphicon glyphicon-trash"></i></button>
                @endif
                </div>
                {!! Form::close() !!}
            </td>
           
        </tr>
    @endforeach
    </tbody>
</table>