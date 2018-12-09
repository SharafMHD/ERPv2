<table class="table table-striped table-bordered table-hover dt-responsive DataTable" id="transactions-table">
    <thead>
        <th>@lang('fully.Date')</th>
        <th>@lang('fully.No')</th>
        <th>@lang('fully.Account Id')</th>
        <th>@lang('fully.Transaction Type')</th>
        <th>@lang('fully.Credit')</th>
        <th>@lang('fully.Debit')</th>
        <th>@lang('fully.Pay Type')</th>
        <th>@lang('fully.Description')</th>
        <th>@lang('fully.Cheque No')</th>
        <th>@lang('fully.Cheque Date')</th>
        <th>@lang('fully.Cheque Bank')</th>
        <th>@lang('fully.Cheque Status')</th>
        <th>@lang('fully.Ref No')</th>
        <th>@lang('fully.User Id')</th>
        <th >@lang('fully.Actions')</th>
    </thead>
    <tbody>
    @foreach($transactions as $transactions)
        <tr>
            <td>{!! $transactions->date !!}</td>
            <td>{!! $transactions->no !!}</td>
            <td>{!! $transactions->account_id !!}</td>
            <td>{!! $transactions->transaction_type !!}</td>
            <td>{!! $transactions->credit !!}</td>
            <td>{!! $transactions->debit !!}</td>
            <td>{!! $transactions->pay_type !!}</td>
            <td>{!! $transactions->description !!}</td>
            <td>{!! $transactions->cheque_no !!}</td>
            <td>{!! $transactions->cheque_date !!}</td>
            <td>{!! $transactions->cheque_bank !!}</td>
            <td>{!! $transactions->cheque_status !!}</td>
            <td>{!! $transactions->ref_no !!}</td>
            <td>{!! $transactions->user_id !!}</td>
                <td width="8%">
                {!! Form::open(['route' => ['accounting.transactions.destroy', $transactions->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                   @if (auth::user()->GetAuthTable($ucontroller, 'show'))
                    <a href="{!! route('accounting.transactions.show', [$transactions->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                      @endif
                                @if (auth::user()->GetAuthTable($ucontroller, 'edit'))
                    <a href="{!! route('accounting.transactions.edit', [$transactions->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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