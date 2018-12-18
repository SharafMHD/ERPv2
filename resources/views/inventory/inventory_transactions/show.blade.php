@extends('layouts.app')

@section('content')
     <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-equalizer font-red-sunglo"></i>
                    <span class="caption-subject font-red-sunglo bold uppercase">@lang('fully.Product Movement') / {!!$inventoryTransactions[0]->items->name !!}</span>
                </div>
            </div>
            <div>
                @include('metronic-templates::common.errors')
            </div>
            <div class="portlet-body form">
                <div class="row" style="padding-left: 20px">
                        <div class="alert alert-info">
                                @lang('fully.Available Quantity in all Stocks is')<strong> {!!$avilableqty !!} </strong> {!!$unit !!}'s </div>
                   <div class="mt-timeline-2">
                        <div class="mt-timeline-line border-grey-steel"></div>
                        <ul class="mt-container">

                                @foreach($inventoryTransactions as $data)
                         
                    
                                <li class="mt-item">
                           
                                                    @if ( strpos( $data->description,'transfer' ) !== false)
                                                    <div class="mt-timeline-icon bg-blue-chambray bg-font-blue-chambray border-grey-steel">
                                                            <i class="icon-anchor"></i>
                                                        </div>
                                                        <div class="mt-timeline-content">
                                                    <div class="mt-content-container bg-blue-chambray bg-font-blue-chambray border-blue-chambray border-left-before-blue-chambray">
                                                    @elseif  ( strpos( $data->description,'Stock in' ) !== false)
                                                    <div class="mt-timeline-icon bg-blue-steel bg-font-blue-steel border-grey-steel">
                                                            <i class="icon-call-in"></i>
                                                        </div>
                                                        <div class="mt-timeline-content">
                                                    <div class="mt-content-container bg-blue-steel bg-font-blue-steel border-blue-steel border-left-before-blue-steel">
                                                    @else
                                                    <div class="mt-timeline-icon bg-red bg-font-red border-grey-steel">
                                                            <i class="icon-call-out"></i>
                                                        </div>
                                                        <div class="mt-timeline-content">
                                                    <div class="mt-content-container bg-red bg-font-red border-left-before-red border-red">
                                                @endif
                                                <div class="mt-title">
                                                    <h3 class="mt-content-title">@lang('fully.'.$data->transaction_type )/ {!! $data->no!!}</h3>
                                                </div>
                                                <div class="mt-author">
                                                    <div class="mt-avatar">
                                                        <img src="{!! $data->user->image !!}" />
                                                    </div>
                                                    <div class="mt-author-name">
                                                        <a href="javascript:;" class="font-white">{!! $data->user->name !!}</a>
                                                    </div>
                                                    <div class="mt-author-notes font-white">{!! $data->created_at !!}</div>
                                                </div>
                                                <div class="mt-content border-white">
                                                    <p>From: {!! $data->warehouse->name !!} </p>
                                                    <p>Quantity: {!! $data->qty!!} </p>
                                                    <p>Description: {!! $data->description !!}</p>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                {{-- @else
                                <li class="mt-item">
                                        <div class="mt-timeline-icon bg-blue-steel bg-font-blue-steel border-grey-steel">
                                            <i class="icon-call-in"></i>
                                        </div>
                                        <div class="mt-timeline-content">
                                            <div class="mt-content-container bg-blue-steel bg-font-blue-steel border-blue-steel border-left-before-blue-steel">
                                                <div class="mt-title">
                                                    <h3 class="mt-content-title">{!! $data->transaction_type !!} / {!! $data->no!!}</h3>
                                                </div>
                                                <div class="mt-author">
                                                    <div class="mt-avatar">
                                                        <img src="{!! $data->user->image !!}" />
                                                    </div>
                                                    <div class="mt-author-name">
                                                        <a href="javascript:;" class="font-white">{!! $data->user->name !!}</a>
                                                    </div>
                                                    <div class="mt-author-notes font-white">{!! $data->created_at !!}</div>
                                                </div>
                                                <div class="mt-content border-white">
                                                        <p>From: {!! $data->warehouse->name !!} </p>
                                                        <p>Quantity: {!! $data->qty!!} </p>
                                                        <p>Description: {!! $data->description !!}</p>
                                                        
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endif --}}

                                @endforeach
                     

                        </ul>
                    </div>
                   <a href="{!! route('inventory.inventory_transactions.index') !!}" class="btn btn-default">@lang('fully.Back')</a>
                </div>
            </div>
        </div>
@endsection
