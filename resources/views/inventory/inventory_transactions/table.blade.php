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
                <td>@lang('fully.'.$inventoryTransactions[0]->transaction_type  )</td>

            </tr>
            <tr id="{!! $inventoryTransactions[0]->id !!}" class="collapse out">
                <td colspan="8">
                    <div >
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
