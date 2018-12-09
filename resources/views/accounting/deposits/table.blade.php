<table class="table table-striped table-bordered table-hover dt-responsive DataTable" id="deposits-table">
    <thead>
        <th>@lang('fully.Date')</th>
        <th>@lang('fully.No')</th>
        <th>@lang('fully.Account Id')</th>
        <th>@lang('fully.Credit')</th>
        <th>@lang('fully.Pay Type')</th>
        <th>@lang('fully.Description')</th>
        <th>@lang('fully.Cheque No')</th>
        <th>@lang('fully.Cheque Date')</th>
        <th>@lang('fully.Cheque Bank')</th>
        <th>@lang('fully.Cheque Status')</th>
        <th >@lang('fully.Actions')</th>
    </thead>
    <tbody>
    @foreach($deposits as $deposit)
        <tr>
            <td>{!! $deposit->date !!}</td>
            <td>{!! $deposit->no !!}</td>
            <td>{!! $deposit->account_id !!}</td>
            <td>{!! $deposit->credit !!}</td>
            <td>{!! $deposit->pay_type !!}</td>
            <td>{!! $deposit->description !!}</td>
            <td>{!! $deposit->cheque_no !!}</td>
            <td>{!! $deposit->cheque_date !!}</td>
            <td>{!! $deposit->cheque_bank !!}</td>
            <td>{!! $deposit->cheque_status !!}</td>
                <td width="8%">
                {!! Form::open(['route' => ['accounting.deposits.destroy', $deposit->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                   <!-- @if (auth::user()->GetAuthTable($ucontroller, 'show')) -->
                    <a href="{!! route('accounting.deposits.show', [$deposit->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                      <!-- @endif -->
                                <!-- @if (auth::user()->GetAuthTable($ucontroller, 'edit')) -->
                    <a href="{!! route('accounting.deposits.edit', [$deposit->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                         <!-- @endif -->
                           <!-- @if (auth::user()->GetAuthTable($ucontroller, 'delete')) -->
                       <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('@lang('fully.Delete_Confirm')')"><i class="glyphicon glyphicon-trash"></i></button>
                <!-- @endif -->
                </div>
                {!! Form::close() !!}
            </td>
           
        </tr>
    @endforeach
    </tbody>
</table>