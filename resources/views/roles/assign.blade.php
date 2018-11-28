@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Assign
        </h1>
    </section>
    {!! Form::open(['route' => 'roles.assignpost']) !!}
    <input  id="roleid" name="id" value="{!! $role !!}" type="hidden">
<div class="row">

@foreach ($models as $model)
<div class="col-md-6">
<div class="portlet light bordered">
<div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-settings font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase"> @lang('fully.'.$model->name )</span>
                        </div>
                        </br>
                        <!-- <button type="button" onclick="checkAllBoxe('Roles');" class="btn btn-primary">Check All</button>
            <button type="button" onclick="unCheckAllBoxe('Roles');" class="btn btn-success">Uncheck All</button>
           -->
                    </div>


<table class="table table-bordered">
<tbody>

    @foreach ($model->actions as $cct)
     {{-- {!! $cct->name !!}  --}}

    <tr class="Roles">
        <td><center>@lang('fully.'.$cct->name )</center></td>
        <td>
            <center>
                <input id="{!! $model->id !!}_{!! $cct->id !!}" name="role[{!! $model->id !!}_{!! $cct->id !!}]" value="{!! $model->id !!}_{!! $cct->id !!}" type="checkbox" {!! auth::user()->checked($role,$cct->id,$model->id ) !!}>
                <input id="{!! $model->id !!}_{!! $cct->id !!}" name="" value="{!! $model->id !!}_{!! $cct->id !!}" type="hidden">
            </center>
        </td>
    </tr>


    @endforeach 

</tbody>
</table>
</div> 
</div>             

@endforeach

</div>   
<div class="row">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('roles.index') !!}" class="btn btn-default">Cancel</a>
</div>
{!! Form::close() !!}


@endsection
