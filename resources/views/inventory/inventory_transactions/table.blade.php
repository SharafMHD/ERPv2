<table class="table table-striped table-bordered table-hover dt-responsive DataTable" id="inventoryTransactions-table">
    <thead>
        <th>@lang('fully.Date')</th>
        <th>@lang('fully.No')</th>
        <th>@lang('fully.Warehouse Id')</th>
        <th>@lang('fully.Item Id')</th>
        <th>@lang('fully.Transaction Type')</th>
        <th>@lang('fully.Qty')</th>
        <th>@lang('fully.Price')</th>
        <th>@lang('fully.Description')</th>
        <th>@lang('fully.User Id')</th>
        <th >@lang('fully.Actions')</th>
    </thead>
    <tbody>
    @foreach($inventoryTransactions as $inventoryTransactions)
        <tr>
            <td>{!! $inventoryTransactions->date !!}</td>
            <td>{!! $inventoryTransactions->no !!}</td>
            <td>{!! $inventoryTransactions->warehouse_id !!}</td>
            <td>{!! $inventoryTransactions->item_id !!}</td>
            <td>{!! $inventoryTransactions->transaction_type !!}</td>
            <td>{!! $inventoryTransactions->qty !!}</td>
            <td>{!! $inventoryTransactions->price !!}</td>
            <td>{!! $inventoryTransactions->description !!}</td>
            <td>{!! $inventoryTransactions->user_id !!}</td>
                <td width="8%">
                {!! Form::open(['route' => ['inventory.inventory_transactions.destroy', $inventoryTransactions->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                   @if (auth::user()->GetAuthTable($ucontroller, 'show'))
                    <a href="{!! route('inventory.inventory_transactions.show', [$inventoryTransactions->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                      @endif
                                @if (auth::user()->GetAuthTable($ucontroller, 'edit'))
                    <a href="{!! route('inventory.inventory_transactions.edit', [$inventoryTransactions->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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