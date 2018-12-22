<table class="table table-striped table-bordered table-hover dt-responsive DataTable" id="customers-table">
    <thead>
        <th>@lang('fully.No')</th>
        <th>@lang('fully.Name')</th>
        <th>@lang('fully.Type')</th>
        <th>@lang('fully.Phone')</th>
        <th>@lang('fully.Email')</th>
        <th >@lang('fully.Actions')</th>
    </thead>
    <tbody>
    @foreach($customers as $customers)
        <tr>
            <td>{!! $customers->no !!}</td>
            <td>{!! $customers->name !!}</td>
            <td>{!! $customers->type !!}</td>
            <td>{!! $customers->phone !!}</td>
            <td>{!! $customers->email !!}</td>
                <td width="8%">
                {!! Form::open(['route' => ['sales.customers.destroy', $customers->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                   @if (auth::user()->GetAuthTable($ucontroller, 'show'))
                    <a href="{!! route('sales.customers.show', [$customers->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                      @endif
                                @if (auth::user()->GetAuthTable($ucontroller, 'edit'))
                    <a href="{!! route('sales.customers.edit', [$customers->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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