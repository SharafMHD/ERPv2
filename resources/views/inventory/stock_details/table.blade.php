<table class="table table-striped table-bordered table-hover dt-responsive DataTable" id="stockDetails-table">
    <thead>
        <th >@lang('fully.Warehouse ')</th>
        <th width="10%">@lang('fully.Item Code ')</th>
        <th>@lang('fully.Item ')</th>
        <th width="10%">@lang('fully.UOM')</th>
        <th width="10%">@lang('fully.Qty')</th>
        <th width="10%">@lang('fully.Expiry date')</th>
        <th >@lang('fully.Actions')</th>
    </thead>
    <tbody>
    @foreach($stockDetails as $stockDetails)
        <tr>
            <td>{!! $stockDetails->warehouses->name !!}</td>
            <td>{!! $stockDetails->items->no !!}</td>
            <td>{!! $stockDetails->items->name !!}</td>
            <td>{!! $stockDetails->items->units->name !!}</td>
            <td>{!! $stockDetails->qty !!}</td>
            <td>{!! $stockDetails->expiry_date !!}</td>
                <td width="8%">
                {!! Form::open(['route' => ['inventory.stock_details.destroy', $stockDetails->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                   {{-- @if (auth::user()->GetAuthTable($ucontroller, 'show')) --}}
                    <a href="{!! route('inventory.stock_details.show', [$stockDetails->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                      {{-- @endif --}}
                                @if (auth::user()->GetAuthTable($ucontroller, 'edit'))
                    <a href="{!! route('inventory.stock_details.edit', [$stockDetails->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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