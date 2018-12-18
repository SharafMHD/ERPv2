<table class="table table-striped table-bordered table-hover dt-responsive" id="stockDetails-table">
    <thead>
        <tr>
            <td width="1%">#</td>
            <th>@lang('fully.Warehouse ')</th>
            <th width="10%">@lang('fully.Actions')</th>
        </tr>
    </thead>
    <tbody>
        @foreach($stockDetails->groupBy('warehouse_id') as $stockDetails)
        <tr class="accordion-toggle">
            <td class="info" data-toggle="collapse" data-target="#{!! $stockDetails[0]->id !!}"><i class="icon-arrow-down"></i></td>
            <td>{!! $stockDetails[0]->warehouses->name !!}</td>
            <td>
                {!! Form::open(['route' => ['inventory.stock_details.destroy', $stockDetails[0]->id], 'method' =>
                'delete']) !!}
                <div class='btn-group'>
                    @if (auth::user()->GetAuthTable($ucontroller, 'show'))
                    <a href="{!! route('inventory.stock_details.show', [$stockDetails[0]->id]) !!}" class='btn btn-default btn-xs'><i
                            class="glyphicon glyphicon-eye-open"></i></a>
                    @endif
                    @if (auth::user()->GetAuthTable($ucontroller, 'edit'))
                    <a href="{!! route('inventory.stock_details.edit', [$stockDetails[0]->id]) !!}" class='btn btn-default btn-xs'><i
                            class="glyphicon glyphicon-edit"></i></a>
                    @endif
                    @if (auth::user()->GetAuthTable($ucontroller, 'delete'))
                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('@lang('fully.Delete_Confirm')')"><i
                            class="glyphicon glyphicon-trash"></i></button>
                    @endif
                </div>
                {!! Form::close() !!}
            </td>

        </tr>
        <tr>
            <td></td>
            <td colspan="8">
                <div id="{!! $stockDetails[0]->id !!}" class="collapse out">
                    {{-- table child begin --}}
                    <table class="table table-striped table-bordered table-hover dt-responsive DataTable" id="stockDetails-table">
                        <thead>
            <th>#</th>
            <th width="10%">@lang('fully.Item Code ')</th>
            <th>@lang('fully.Item ')</th>
            <th width="10%">@lang('fully.UOM')</th>
            <th width="10%">@lang('fully.Qty')</th>
            <th width="10%">@lang('fully.Expiry date')</th>
            </thead>
    <tbody>
        @foreach($stockDetails as $index => $data)
        <tr>
            <td>{{$index +1}}</td>
            <td>{!! $data->items->no !!}</td>
            <td>{!! $data->items->name !!}</td>
            <td>{!! $data->items->units->name !!}</td>
            <td>{!! $data->qty !!}</td>
            <td>{!! $data->expiry_date !!}</td>
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
