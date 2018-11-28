<table class="table table-striped table-bordered table-hover dt-responsive DataTable" id="jobs-table">
    <thead>
        <th>@lang('fully.Code')</th>
        <th>@lang('fully.Name')</th>
        <th>@lang('fully.Description')</th>
        <th>@lang('fully.Departmentid')</th>
        <th >@lang('fully.Actions')</th>
    </thead>
    <tbody>
    @foreach($jobs as $jobs)
        <tr>
            <td>{!! $jobs->code !!}</td>
            <td>{!! $jobs->name !!}</td>
            <td>{!! $jobs->description !!}</td>
            <td>{!! $jobs->departmentID !!}</td>
            <td >
                {!! Form::open(['route' => ['jobs.destroy', $jobs->id], 'method' => 'delete']) !!}
             
                 <div class="btn-group">
                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="true">@lang('fully.Actions')
                            <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            @if (auth::user()->GetAuthTable($ucontroller, 'show'))
                            <li>
                                <a href="{!! route('jobs.show', [$jobs->id]) !!}">
                                    <i class="icon-docs"></i> @lang('fully.Details')  </a>
                            </li>
                            @endif
                            @if (auth::user()->GetAuthTable($ucontroller, 'edit'))

                            <li>
                                <a href="{!! route('jobs.edit', [$jobs->id]) !!}">
                                    <i class="icon-tag"></i> @lang('fully.Edit') </a>
                            </li>
                            @endif
                            @if (auth::user()->GetAuthTable($ucontroller, 'delete'))

                          <li>
                                <a onclick="return confirm('@lang('fully.Delete_Confirm')'"  href="{!! route('jobs.edit', [$jobs->id]) !!}">
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