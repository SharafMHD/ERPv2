<table class="table table-striped table-bordered table-hover dt-responsive DataTable" id="qoutationDetails-table">
    <thead>
        <th>@lang('fully.Item Id')</th>
        <th>@lang('fully.Qty')</th>
        <th>@lang('fully.Price')</th>
        <th>@lang('fully.Total')</th>
        <th>@lang('fully.Description')</th>
        <th>@lang('fully.Qoutation Id')</th>
        <th >@lang('fully.Actions')</th>
    </thead>
    <tbody>
    @foreach($qoutationDetails as $qoutationDetails)
        <tr>
            <td>{!! $qoutationDetails->item_id !!}</td>
            <td>{!! $qoutationDetails->qty !!}</td>
            <td>{!! $qoutationDetails->price !!}</td>
            <td>{!! $qoutationDetails->total !!}</td>
            <td>{!! $qoutationDetails->description !!}</td>
            <td>{!! $qoutationDetails->qoutation_id !!}</td>
                <td width="8%">
                {!! Form::open(['route' => ['sales.qoutationDetails.destroy', $qoutationDetails->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                   @if (auth::user()->GetAuthTable($ucontroller, 'show'))
                    <a href="{!! route('sales.qoutationDetails.show', [$qoutationDetails->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                      @endif
                                @if (auth::user()->GetAuthTable($ucontroller, 'edit'))
                    <a href="{!! route('sales.qoutationDetails.edit', [$qoutationDetails->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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