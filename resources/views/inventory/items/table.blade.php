<table class="table table-striped table-bordered table-hover dt-responsive DataTable" id="items-table">
    <thead>
        <th>@lang('fully.No')</th>
        <th>@lang('fully.Name')</th>
        <th>@lang('fully.Category Id')</th>
        <th>@lang('fully.Unit Id')</th>
        <th>@lang('fully.Sales Price')</th>
        <th>@lang('fully.Purchase Price')</th>
        <th>@lang('fully.Low Stock Qty')</th>
        <th>@lang('fully.Color')</th>
        <th>@lang('fully.Size')</th>
        <th>@lang('fully.Description')</th>
        <th>@lang('fully.Item Type')</th>
        <th >@lang('fully.Actions')</th>
    </thead>
    <tbody>
    @foreach($items as $items)
        <tr>
            <td>{!! $items->no !!}</td>
            <td>{!! $items->name !!}</td>
            <td>{!! $items->categories->name !!}</td>
            <td>{!! $items->units->name !!}</td>
            <td>{!! $items->sales_price !!}</td>
            <td>{!! $items->purchase_price !!}</td>
            <td>{!! $items->low_stock_qty !!}</td>
            <td>{!! $items->color !!}</td>
            <td>{!! $items->size !!}</td>
            <td>{!! $items->description !!}</td>
            <td>{!! $items->item_type !!}</td>
                <td width="8%">
                {!! Form::open(['route' => ['inventory.items.destroy', $items->id], 'method' => 'delete']) !!}
                <div class='btn-group'> 
                        {{-- @if (auth::user()->GetAuthTable($ucontroller, 'timeline')) --}}
                        <a href="{!! route('inventory.inventory_transactions.show', [$items->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-time"></i></a>
                          {{-- @endif --}}
                   @if (auth::user()->GetAuthTable($ucontroller, 'show'))
                    <a href="{!! route('inventory.items.show', [$items->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                      @endif
                                @if (auth::user()->GetAuthTable($ucontroller, 'edit'))
                    <a href="{!! route('inventory.items.edit', [$items->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
