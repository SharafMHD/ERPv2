<div class="tabbable-custom ">
    <ul class="nav nav-tabs ">
        <li class="active">
            <a href="#tab_5_1" data-toggle="tab" aria-expanded="true">@lang('fully.Quotation Info')</a>
        </li>
        <li class="">
            <a href="#tab_5_2" data-toggle="tab" aria-expanded="false">@lang('fully.Quotation Details')</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab_5_1">

            <div class="row">
                <!-- Date Field -->
                <div class="form-group col-sm-6">
                    <label for="date" class="col-md-3 control-label">@lang('fully.Date'):</label>
                    {!! Form::date('date', null, ['class' => 'form-control']) !!}
                </div>
                <!-- No Field -->
                <div class="form-group col-sm-6">

                    <label for="no" class="col-md-3 control-label">@lang('fully.No'):</label>
                    {!! Form::text('no', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="row">
                <!-- Customer  Field -->
                <div class="form-group col-sm-6">
                    <label for="customer_name" class="control-label">@lang('fully.Customer Name')</label>
                    {!! Form::select('to_warehouse_id', $customers->prepend('Please Select', '0'), (count($customers) >
                    0) ? $customers : '0', array("class" => "form-control select2", "id"=>"customer_id")) !!}
                </div>
            </div>
        </div>
        <div class="tab-pane" id="tab_5_2">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-3">
                    <ul class="nav nav-tabs tabs-left">
                        <li class="active">
                            <a href="#tab_6_1" data-toggle="tab" aria-expanded="true"> Add Items </a>
                        </li>
                        <li class="">
                            <a href="#tab_6_2" data-toggle="tab" aria-expanded="false"> Add Services </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-9">
                    <div class="tab-content" ng-app="QouatationApp" ng-controller="mainController" ng-init="loaditems(); loadservices();">
                        <div class="tab-pane active in" id="tab_6_1">
                            <h4 class="form-section">@lang('fully.Add Items')</h4>
                            <div class="row" id="vue-additems">
                                <div class="form-group col-sm-6">
                                    <label for="item_id" class="control-label">@lang('fully.Item Name ')</label>
                                    <select id="item_id" ng-model="item_id" class="form-control select2" ng-change="getexpires(item_id)">
                                            </select>
                                </div>
                                <div class="form-group col-sm-6">
                                        <label for="expiry_date" class="control-label">@lang('fully.Expiry date ')</label>
                                        <select id="expiry_date" class="form-control select2" onchange="Getqty()"></select>
                                    </div>
                                <!-- QTY Field -->
                                <div class="form-group col-sm-6">
                                    <label for="qty" class="col-md-3 control-label">@lang('fully.Qty')</label>
                                    {!! Form::number('qty', null, ['class' => 'form-control', "id"=>"qty"]) !!}
                                </div>
                                <!-- Notes Field -->
                                <div class="form-group col-lg-6">
                                    <label for="notes" class="col-md-3 control-label">@lang('fully.Remark')</label>
                                    {!! Form::textarea('notes', null, ['class' => 'form-control' , "id"=>"notes" ,
                                    'rows'=>'2']) !!}
                                </div>

                                <div class="form-group col-lg-12">
                                    <div class="clearfix">
                                        <button type="button" onclick="AddNewItemStockMovment();" class="btn btn-circle green-jungle btn-block"><i class="fa fa-plus-circle"></i> @lang('fully.Add')</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab_6_2">
                            <h4 class="form-section">@lang('fully.Add Services')</h4>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="service_id" class="control-label">@lang('fully.Services ')</label>
                                    <select id="service_id" ng-model="service_id" class="form-control select2">
                                            </select>
                                </div>
                                <!-- QTY Field -->
                                <div class="form-group col-sm-6">
                                    <label for="service_qty" class="col-md-3 control-label">@lang('fully.Qty')</label>
                                    {!! Form::number('service_qty', null, ['class' => 'form-control',
                                    "id"=>"service_qty"]) !!}
                                </div>
                                <div class="form-group col-lg-12">
                                    <div class="clearfix">
                                        <button type="button" onclick="AddNewItemStockMovment();" class="btn btn-circle blue-hoki btn-block"><i class="fa fa-plus-circle"></i> @lang('fully.Add')</button> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
<div class="form-group col-lg-12">
    <h4 class="form-section">Details</h4>
    <!-- tems Table Field -->
    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        <table class="table table-responsive table-bordered table-striped Datatable" id="tbl_Details">
            <thead>
                <tr>
                    <th width="10%">Item Code</th>
                    <th>Item Name</th>
                    <th width="10%">Type</th>
                    <th width="10%">Qty</th>
                    <th width="10%">UOM</th>
                    <th width="10%">Unit Price</th>
                    <th width="10%">Total Price</th>
                    <th width="10%">Expiry date</th>
                    <th>Remark</th>
                    <th width="5%">Tools</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
            </div>
        </div>
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="form-actions">
        <div class="row  col-md-offset-0">
            <button type="submit" class="btn blue"><i class="fa fa-save"></i> @lang('fully.Save')</button>
            <a href="{!! route('sales.quotations.index') !!}" class="btn red"><i class="fa fa-times">
                    @lang('fully.Cancel')</i></a>
        </div>
    </div>
</div>
