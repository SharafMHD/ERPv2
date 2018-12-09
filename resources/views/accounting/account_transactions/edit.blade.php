@extends('layouts.app')

@section('content')
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-equalizer font-red-sunglo"></i>
            <span class="caption-subject font-red-sunglo bold uppercase">@lang('fully.Account_transactions')</span>
        </div>
    </div>
    <div>
        @include('metronic-templates::common.errors')
    </div>
    <div class="portlet-body form">
        <div class="row">
           {!! Form::model($accountTransactions, ['route' => ['accounting.accountTransactions.update', $accountTransactions->id], 'method' => 'patch']) !!}

            @include('accounting.accountTransactions.fields')

           {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection