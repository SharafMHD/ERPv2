@extends('layouts.app')

@section('content')
<div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-equalizer font-red-sunglo"></i>
                <span class="caption-subject font-red-sunglo bold uppercase">@lang('fully.QoutationDetails')</span>
            </div>
             @if (auth::user()->GetAuthTable($ucontroller,'create'))
            <h1 class="pull-right">
                <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('sales.qoutationDetails.create') !!}">{{__('fully.AddNew')}}</a>
            </h1>
            @endif
        </div>
        @include('flash::message')
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('sales.qoutationDetails.table')
            </div>
        </div>
 </div>
@endsection

