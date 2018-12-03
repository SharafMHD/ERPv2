@extends('layouts.app')

@section('content')
 <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="glyphicon glyphicon-transfer"></i>
                <span class="caption-subject font-red-sunglo bold uppercase">@lang('fully.Warehouses transfer')</span>
            </div>
        </div>
        <div>
            @include('metronic-templates::common.errors')
        </div>
        <div class="portlet-body form">
            <div class="row">
                {!! Form::open(['route' => 'inventory.transfers.store']) !!}

                    @include('inventory.transfers.fields')

                 {!! Form::close() !!}
            </div>
        </div>
  </div>
@endsection
