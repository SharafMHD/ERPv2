<table class="table table-striped table-bordered table-hover dt-responsive DataTable" id="transfers-table">
    <thead>
        <th>@lang('fully.No')</th>
        <th>@lang('fully.Date')</th>
        <th>@lang('fully.From Warehouse Id')</th>
        <th>@lang('fully.To Warehouse Id')</th>
        <th>@lang('fully.Notes')</th>
        <th>@lang('fully.User Id')</th>
        <th >@lang('fully.Actions')</th>
    </thead>
    <tbody>
    @foreach($transfers as $transfer)
        <tr>
            <td>{!! $transfer->no !!}</td>
            <td>{!! $transfer->created_at !!}</td>
            <td>{!! $transfer->Warehousefrom->name !!}</td>
            <td>{!! $transfer->Warehouseto->name !!}</td>
            <td>{!! $transfer->notes !!}</td>
            <td>{!! $transfer->user->name !!}</td>
                <td width="8%">
                {!! Form::open(['route' => ['inventory.transfers.destroy', $transfer->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                   @if (auth::user()->GetAuthTable($ucontroller, 'show'))
                    <a href="{!! route('inventory.transfers.show', [$transfer->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                      @endif
                                @if (auth::user()->GetAuthTable($ucontroller, 'edit'))
                    <a href="{!! route('inventory.transfers.edit', [$transfer->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                         @endif
                         @if (auth::user()->GetAuthTable($ucontroller, 'print'))
                         <a href="/en/inventory/transfers/Print/{!!$transfer->id!!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-print"></i></a>
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