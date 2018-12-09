@extends('layouts.app')

@section('content')
 <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-equalizer font-red-sunglo"></i>
                <span class="caption-subject font-red-sunglo bold uppercase">@lang('fully.Stock In')</span>
            </div>
        </div>
        <div>
            @include('metronic-templates::common.errors')
        </div>
        <div class="portlet-body form">
            <div class="row">
                {!! Form::open(['route' => 'inventory.stock_details.store', 'id'=> 'frmstockin']) !!}

                    @include('inventory.stock_details.fields')

                 {!! Form::close() !!}
            </div>
        </div>
  </div>
  <script src="/js/stockin.js"></script>
@endsection
