<!-- Warehouse Id Field -->
<div class="form-group col-sm-6">
        <label for="warehouse_id" class="control-label">@lang('fully.Warehouse Name ')</label>
        {!! Form::select('warehouse_id', $warehouses->prepend('Please Select', '0'), (count($warehouses) > 0) ? $warehouses : '0', array("class" => "form-control select2", "id"=>"warehouse_id")) !!}
        </div>


<!-- Item Id Field -->
<div class="form-group col-sm-6">
        <label for="item_id" class="control-label">@lang('fully.Item Name ')</label>
        {!! Form::select('item_id', $items->prepend('Please Select', '0'), (count($items) > 0) ? $items : '0', array("class" => "form-control select2" , "id"=>"item_id")) !!}
        </div>

<!-- Qty Field -->
<div class="form-group col-sm-6">
    <label for="qty" class="col-md-3 control-label">@lang('fully.Qty'):</label>
    {!! Form::number('qty', null, ['class' => 'form-control' , 'id'=>'qty']) !!}
</div>
<!-- Expiry Field -->
<div class="form-group col-sm-6">
        <label for="expiry_date" class="col-md-3 control-label">@lang('fully.Expiry Date'):</label>
        {!! Form::date('expiry_date', null, ['class' => 'form-control' , 'id'=>'expiry_date']) !!}
    </div>
    <div class="form-group col-lg-12">
            <div class="clearfix">
                    <button type="button" onclick="AddNewItemStockIn();" class="btn btn-circle green-jungle btn-block"><i class="fa fa-plus-circle"></i> @lang('fully.Add')</button> </div>
            </div>
    <hr/>
    <div class="form-group col-lg-12">
    <h4 class="form-section">Details</h4>
    <!-- tems Table Field -->
    <!-- Submit Field -->
    <div class="form-group col-sm-12">
    <table class="table table-responsive table-bordered table-striped" id="tbl_Details">
    <thead>
    <tr>
   <th >Warehouse Name</th>
    <th >Item Name</th>
    <th width="10%">Qty</th>
    <th width="10%">Expiry_date</th>
    <th width="5%">Tools</th>
    </tr>
    </thead>
    <tbody></tbody>
    </table>
    </div>
    </div>
<!-- Submit Field -->

    <!-- Submit Field -->
<div class="form-group col-sm-12">
                <div class="form-actions">
                    <div class="row  col-md-offset-0">       
                              <a id="btnprint" disabled class="btn green-jungle"><i class="fa fa-print"></i> @lang('fully.Print')</a>
                    <a id="btnsave" onclick="Stockin();" class="btn blue"><i class="fa fa-save"></i> @lang('fully.Save')</a>
            
            <a  class="btn red" href="{!! route('inventory.stock_details.index') !!}"><i class="fa fa-times"> @lang('fully.Cancel')</i></a>
                    </div>
                </div>
</div>
