<table class="table table-striped table-bordered table-hover dt-responsive DataTable" id="movementDetails-table">
    <thead>
        <th>@lang('fully.Item Id')</th>
        <th>@lang('fully.Qty')</th>
        <th>@lang('fully.Notes')</th>
        <th>@lang('fully.Movement Id')</th>
        <th >@lang('fully.Actions')</th>
    </thead>
    <tbody>
    @foreach($movementDetails as $movementDetails)
        <tr>
            <td>{!! $movementDetails->item_id !!}</td>
            <td>{!! $movementDetails->qty !!}</td>
            <td>{!! $movementDetails->notes !!}</td>
            <td>{!! $movementDetails->movement_id !!}</td>
                <td width="8%">
                {!! Form::open(['route' => ['inventory.movementDetails.destroy', $movementDetails->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                   @if (auth::user()->GetAuthTable($ucontroller, 'show'))
                    <a href="{!! route('inventory.movementDetails.show', [$movementDetails->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                      @endif
                                @if (auth::user()->GetAuthTable($ucontroller, 'edit'))
                    <a href="{!! route('inventory.movementDetails.edit', [$movementDetails->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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