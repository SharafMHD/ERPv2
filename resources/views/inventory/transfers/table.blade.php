<table class="table table-striped table-bordered table-hover dt-responsive " id="transfer-table">
    <thead>
        <tr>
            <td width="1%">#</td>
            <th>@lang('fully.No')</th>
            <th>@lang('fully.Date')</th>
            <th>@lang('fully.From Warehouse ')</th>
            <th>@lang('fully.To Warehouse ')</th>
            <th>@lang('fully.Notes')</th>
            <th>@lang('fully.User ')</th>
            <th>@lang('fully.Actions')</th>
        </tr>
    </thead>
    <tbody>

        @foreach($transfers as $record)
        <tr class="accordion-toggle">
            <td class="info" data-toggle="collapse" data-target="#{!! $record->id !!}"><i class="icon-arrow-down"></i></td>
            <td>{!! $record->no !!}</td>
            <td>{!! $record->created_at !!}</td>
            <td>{!! $record->Warehousefrom->name !!}</td>
            <td>{!! $record->Warehouseto->name !!}</td>
            <td>{!! $record->notes !!}</td>
            <td>{!! $record->user->name !!}</td>
            <td>
                {!! Form::open(['route' => ['inventory.transfers.destroy', $record->id]]) !!}
                <div class='btn-group'>

                    {{-- @if (auth::user()->GetAuthTable($ucontroller, 'print')) --}}
                    <a href="/en/inventory/transfers/Print/{!!$record->id!!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-print"></i></a>
                    {{-- @endif --}}
                </div>
                {!! Form::close() !!}
            </td>

        </tr>
        <tr id="{!! $record->id !!}" class="collapse out">
            <td colspan="8">
                <div >
                    {{-- table child begin --}}
                    <table class="table table-striped table-bordered table-hover dt-responsive DataTable" id="transferdetails-table">
                        <thead>
            <th>#</th>
            <th width="10%">@lang('fully.Item Code ')</th>
            <th>@lang('fully.Item ')</th>
            <th width="10%">@lang('fully.UOM')</th>
            <th width="10%">@lang('fully.Qty')</th>
            <th width="10%">@lang('fully.Expiry date')</th>
            <th width="10%">@lang('fully.Remark')</th>
            </thead>
    <tbody>
        @foreach($record->MovementDetails as $index => $data)
        <tr>
            <td>{{$index +1}}</td>
            <td>{!! $data->items->no !!}</td>
            <td>{!! $data->items->name !!}</td>
            <td>{!! $data->items->units->name !!}</td>
            <td>{!! $data->qty !!}</td>
            <td>{!! $data->expiry_date !!}</td>
            <td>{!! $data->notes !!}</td>
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
{{ $transfers->links() }}
</div>
