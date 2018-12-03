<table class="table table-striped table-bordered table-hover dt-responsive DataTable" id="warehouses-table">
    <thead>
        <th>@lang('fully.Name')</th>
        <th>@lang('fully.Keeper')</th>
        <th>@lang('fully.Location')</th>
        <th>@lang('fully.Phone')</th>
        <th>@lang('fully.Status')</th>
        <th >@lang('fully.Actions')</th>
    </thead>
    <tbody>
    @foreach($warehouses as $warehouses)
        <tr>
            <td>{!! $warehouses->name !!}</td>
            <td>{!! $warehouses->keeper !!}</td>
            <td>{!! $warehouses->location !!}</td>
            <td>{!! $warehouses->phone !!}</td>
            <td>{!! $warehouses->status !!}</td>
            <td >
                {!! Form::open(['route' => ['inventory.warehouses.destroy', $warehouses->id], 'method' => 'delete']) !!}
             
                 <div class="btn-group">
                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="true">@lang('fully.Actions')
                            <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            @if (auth::user()->GetAuthTable($ucontroller, 'show'))
                            <li>
                                <a href="{!! route('inventory.warehouses.show', [$warehouses->id]) !!}">
                                    <i class="icon-docs"></i> @lang('fully.Details')  </a>
                            </li>
                            @endif
                            @if (auth::user()->GetAuthTable($ucontroller, 'edit'))

                            <li>
                                <a href="{!! route('inventory.warehouses.edit', [$warehouses->id]) !!}">
                                    <i class="icon-tag"></i> @lang('fully.Edit') </a>
                            </li>
                            @endif
                            @if (auth::user()->GetAuthTable($ucontroller, 'delete'))

                          <li>
                                <a onclick="return confirm('@lang('fully.Delete_Confirm')'"  href="{!! route('inventory.warehouses.edit', [$warehouses->id]) !!}">
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