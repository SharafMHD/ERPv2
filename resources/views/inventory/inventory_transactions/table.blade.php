{{-- <table class="table table-striped table-bordered table-hover dt-responsive DataTable" id="inventoryTransactions-table">
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
</table> --}}

<table class="table table-striped table-bordered table-hover dt-responsive" id="stockDetails-table">
        <thead>
            <tr>
                <td width="1%">#</td>
                <th>@lang('fully.Transaction Type')</th>
            
            </tr>
        </thead>
        <tbody>
                @foreach($inventoryTransactions->groupBy('transaction_type') as $inventoryTransactions)
                {{-- {!!dd($inventoryTransactions[0]->transaction_type)!!} --}}
            <tr class="accordion-toggle">
                    <td class="info" data-toggle="collapse" data-target="#{!! $inventoryTransactions[0]->id !!}" ><i class="icon-arrow-down"></i></td>
                <td>{!! $inventoryTransactions[0]->transaction_type !!}</td>

            </tr>
            <tr>
                <td></td>
                <td colspan="8">
                    <div id="{!! $inventoryTransactions[0]->id !!}" class="collapse out">
                        {{-- table child begin --}}
                       <table class="table table-striped table-bordered table-hover dt-responsive DataTable" id="stockDetails-table">
<thead>
    <th >#</th>
    <th width="col-md-3">@lang('fully.No')</th>
    <th width="10%">@lang('fully.Date Of Process')</th>
    <th width="col-md-3">@lang('fully.Warhouse Name')</th>
    <th>@lang('fully.User Name')</th>
    <th>@lang('fully.Item Name')</th>
    <th width="10%">@lang('fully.Qty')</th>
    <th >@lang('fully.Remark')</th>
</thead>
<tbody>
@foreach($inventoryTransactions as  $index => $data)
    <tr>
            <td>{{$index +1}}</td>
        <td>{!! $data->no !!}</td>
        <td>{!! $data->created_at !!}</td>
        <td>{!! $data->warehouse->name!!}</td>
        <td>{!! $data->user->name!!}</td>
        <td>{!! $data->items->name!!}</td>
        <td>{!! $data->qty !!}</td>
        <td>{!! $data->description !!}</td>
    </tr>
@endforeach
</tbody>
</table>
{{-- table child end --}}
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
</table>
</div>
