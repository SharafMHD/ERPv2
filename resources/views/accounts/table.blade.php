<table class="table table-striped table-bordered table-hover dt-responsive DataTable" id="accounts-table">
    <thead>
        <th>@lang('fully.No')</th>
        <th>@lang('fully.Name')</th>
        <th>@lang('fully.Main Account')</th>
        <th>@lang('fully.Description')</th>
        <th>@lang('fully.Status')</th>
        <th width="20%">@lang('fully.Actions')</th>
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
                {{-- <div class='btn-group'>
                    <a href="{!! route('accounts.show', [$accounts->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('accounts.edit', [$accounts->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                            <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('@lang('fully.Delete_Confirm')')"><i class="glyphicon glyphicon-trash"></i></button>
                </div> --}}
                <div class="btn-group">
                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="true"> Actions
                            <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            @if (auth::user()->GetAuthTable($ucontroller, 'show'))
                            <li>
                                <a href="{!! route('accounts.show', [$accounts->id]) !!}">
                                    <i class="icon-docs"></i> Details </a>
                            </li>
                            @endif
                            @if (auth::user()->GetAuthTable($ucontroller, 'edit'))

                            <li>
                                <a href="{!! route('accounts.edit', [$accounts->id]) !!}">
                                    <i class="icon-tag"></i> Edit </a>
                            </li>
                            @endif
                            @if (auth::user()->GetAuthTable($ucontroller, 'delete'))

                          <li>
                                <a onclick="return confirm('Are you sure?')"  href="{!! route('accounts.edit', [$accounts->id]) !!}">
                                   <i class="glyphicon glyphicon-trash"></i>Delete </a>
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