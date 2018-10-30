@extends('layouts.app')

@section('content')
     <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-equalizer font-red-sunglo"></i>
                    <span class="caption-subject font-red-sunglo bold uppercase">@lang('fully.accounts')</span>
                </div>
            </div>
            <div>
                @include('metronic-templates::common.errors')
            </div>
            <div class="portlet-body form">
                <div class="row" style="padding-left: 20px">
                   @include('accounts.show_fields')
                   <a href="{!! route('accounts.index') !!}" class="btn btn-default">@lang('fully.Back')</a>
                </div>
            </div>
        </div>
@endsection
