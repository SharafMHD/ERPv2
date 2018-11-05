<table class="table table-striped table-bordered table-hover dt-responsive DataTable" id="courses-table">
    <thead>
        <th>@lang('fully.Name')</th>
        <th>@lang('fully.Descritpion')</th>
        <th>@lang('fully.Award Point')</th>
        <th >@lang('fully.Actions')</th>
    </thead>
    <tbody>
    @foreach($courses as $courses)
        <tr>
            <td>{!! $courses->name !!}</td>
            <td>{!! $courses->descritpion !!}</td>
            <td>{!! $courses->award_point !!}</td>
            <td width="8%">
                {!! Form::open(['route' => ['courses.destroy', $courses->id], 'method' => 'delete']) !!}

                 <div class="btn-group">
                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="true"> @lang('fully.Actions')
                            <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            @if (auth::user()->GetAuthTable($ucontroller, 'show'))
                            <li>
                                <a href="{!! route('courses.show', [$courses->id]) !!}">
                                    <i class="icon-docs"></i> @lang('fully.Details') </a>
                            </li>
                            @endif
                            @if (auth::user()->GetAuthTable($ucontroller, 'edit'))

                            <li>
                                <a href="{!! route('courses.edit', [$courses->id]) !!}">
                                    <i class="icon-tag"></i> @lang('fully.Edit') </a>
                            </li>
                            @endif
                            @if (auth::user()->GetAuthTable($ucontroller, 'delete'))

                          <li>
                                <a onclick="return confirm('Are you sure?')"  href="{!! route('courses.edit', [$courses->id]) !!}">
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