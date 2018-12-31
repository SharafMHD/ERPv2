@extends('layouts.app')

@section('content')
     <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-equalizer font-red-sunglo"></i>
                    <span class="caption-subject font-red-sunglo bold uppercase">@lang('fully.QoutationDetails')</span>
                </div>
            </div>
            <div>
                @include('metronic-templates::common.errors')
            </div>
            <div class="portlet-body form">
                <div class="row" style="padding-left: 20px">
                   @include('sales.qoutationDetails.show_fields')
                   <a href="{!! route('sales.qoutationDetails.index') !!}" class="btn btn-default">@lang('fully.Back')</a>
                </div>
            </div>
        </div>
@endsection
