<table class="table table-striped table-bordered table-hover dt-responsive DataTable" id="accountTransactions-table">
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
    @foreach($accountTransactions as $accountTransactions)
        <tr>
            <td>{!! $accountTransactions->date !!}</td>
            <td>{!! $accountTransactions->no !!}</td>
            <td>{!! $accountTransactions->account_id !!}</td>
            <td>{!! $accountTransactions->transaction_type !!}</td>
            <td>{!! $accountTransactions->credit !!}</td>
            <td>{!! $accountTransactions->debit !!}</td>
            <td>{!! $accountTransactions->pay_type !!}</td>
            <td>{!! $accountTransactions->description !!}</td>
            <td>{!! $accountTransactions->cheque_no !!}</td>
            <td>{!! $accountTransactions->cheque_date !!}</td>
            <td>{!! $accountTransactions->cheque_bank !!}</td>
            <td>{!! $accountTransactions->cheque_status !!}</td>
            <td>{!! $accountTransactions->ref_no !!}</td>
            <td>{!! $accountTransactions->user_id !!}</td>
                <td width="8%">
                {!! Form::open(['route' => ['accounting.accountTransactions.destroy', $accountTransactions->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                   @if (auth::user()->GetAuthTable($ucontroller, 'show'))
                    <a href="{!! route('accounting.accountTransactions.show', [$accountTransactions->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                      @endif
                                @if (auth::user()->GetAuthTable($ucontroller, 'edit'))
                    <a href="{!! route('accounting.accountTransactions.edit', [$accountTransactions->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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