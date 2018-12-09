@extends('layouts.app')

@section('content')
     <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-equalizer font-red-sunglo"></i>
                    <span class="caption-subject font-red-sunglo bold uppercase">@lang('fully.StockDetails')</span>
                </div>
            </div>
            <div>
                @include('metronic-templates::common.errors')
            </div>
            <div class="portlet-body form">
                <div class="row" style="padding-left: 20px">
                   @include('inventory.stock_details.show_fields')
                   <a href="{!! route('inventory.stock_details.index') !!}" class="btn btn-default">@lang('fully.Back')</a>
                </div>
            </div>
        </div>
@endsection
