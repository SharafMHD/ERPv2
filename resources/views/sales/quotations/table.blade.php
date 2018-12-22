<table class="table table-striped table-bordered table-hover dt-responsive DataTable" id="quotations-table">
    <thead>
        <th>@lang('fully.Date')</th>
        <th>@lang('fully.No')</th>
        <th>@lang('fully.Customer Name')</th>
        <th>@lang('fully.Customer Phone')</th>
        <th>@lang('fully.Customer Address')</th>
        <th>@lang('fully.Valide Date')</th>
        <th>@lang('fully.Notes')</th>
        <th>@lang('fully.Amount')</th>
        <th>@lang('fully.Discount')</th>
        <th>@lang('fully.Net Amount')</th>
        <th>@lang('fully.Status')</th>
        <th>@lang('fully.User Id')</th>
        <th >@lang('fully.Actions')</th>
    </thead>
    <tbody>
    @foreach($quotations as $quotations)
        <tr>
            <td>{!! $quotations->date !!}</td>
            <td>{!! $quotations->no !!}</td>
            <td>{!! $quotations->customer_name !!}</td>
            <td>{!! $quotations->customer_phone !!}</td>
            <td>{!! $quotations->customer_address !!}</td>
            <td>{!! $quotations->valide_date !!}</td>
            <td>{!! $quotations->notes !!}</td>
            <td>{!! $quotations->amount !!}</td>
            <td>{!! $quotations->discount !!}</td>
            <td>{!! $quotations->net_amount !!}</td>
            <td>{!! $quotations->status !!}</td>
            <td>{!! $quotations->user_id !!}</td>
                <td width="8%">
                {!! Form::open(['route' => ['sales.quotations.destroy', $quotations->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                   @if (auth::user()->GetAuthTable($ucontroller, 'show'))
                    <a href="{!! route('sales.quotations.show', [$quotations->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                      @endif
                                @if (auth::user()->GetAuthTable($ucontroller, 'edit'))
                    <a href="{!! route('sales.quotations.edit', [$quotations->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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