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
            <td >
                {!! Form::open(['route' => ['accounts.destroy', $accounts->id], 'method' => 'delete']) !!}
             
                 <div class="btn-group">
                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="true">@lang('fully.Actions')
                            <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            @if (auth::user()->GetAuthTable($ucontroller, 'show'))
                            <li>
                                <a href="{!! route('accounts.show', [$accounts->id]) !!}">
                                    <i class="icon-docs"></i> @lang('fully.Details')  </a>
                            </li>
                            @endif
                            @if (auth::user()->GetAuthTable($ucontroller, 'edit'))

                            <li>
                                <a href="{!! route('accounts.edit', [$accounts->id]) !!}">
                                    <i class="icon-tag"></i> @lang('fully.Edit') </a>
                            </li>
                            @endif
                            @if (auth::user()->GetAuthTable($ucontroller, 'delete'))

                          <li>
                                <a onclick="return confirm('@lang('fully.Delete_Confirm')'"  href="{!! route('accounts.edit', [$accounts->id]) !!}">
                                   <i class="glyphicon glyphicon-trash"></i>@lang('fully.Delete') </a>
                            </li>
                            @endif

                          
                        </ul>
                    </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>