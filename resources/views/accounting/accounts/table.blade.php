<table class="table table-striped table-bordered table-hover dt-responsive DataTable" id="accounts-table">
    <thead>
        <th>@lang('fully.No')</th>
        <th>@lang('fully.Name')</th>
        <th>@lang('fully.Main Account')</th>
        <th>@lang('fully.Description')</th>
        <th>@lang('fully.Status')</th>
        <th >@lang('fully.Actions')</th>
    </thead>
    <tbody>
    @foreach($accounts as $accounts)
        <tr>
            <td>{!! $accounts->no !!}</td>
            <td>{!! $accounts->name !!}</td>
            <td>{!! $accounts->main_account !!}</td>
            <td>{!! $accounts->description !!}</td>
            <td>{!! $accounts->status !!}</td>
                <td width="8%">
                {!! Form::open(['route' => ['accounting.accounts.destroy', $accounts->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                   @if (auth::user()->GetAuthTable($ucontroller, 'show'))
                    <a href="{!! route('accounting.accounts.show', [$accounts->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                      @endif
                                @if (auth::user()->GetAuthTable($ucontroller, 'edit'))
                    <a href="{!! route('accounting.accounts.edit', [$accounts->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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