<div class="form-group col-sm-6">
        <label for="from_warehouse_id" class="control-label">@lang('fully.warehouse from')</label>
        {!! Form::select('from_warehouse_id', $warehouses->prepend('Please Select', '0'), (count($warehouses) > 0) ? $warehouses : '0', array("class" => "form-control select2" , "id"=>"from_warehouse_id")) !!}
      
        </div>
<!-- To Warehouse Id Field -->
<div class="form-group col-sm-6">
        <label for="to_warehouse_id" class="control-label">@lang('fully.warehouse to')</label>
        {!! Form::select('to_warehouse_id', $warehouses->prepend('Please Select', '0'), (count($warehouses) > 0) ? $warehouses : '0', array("class" => "form-control select2", "id"=>"to_warehouse_id")) !!}
        </div>
        <!-- To Warehouse Id Field -->
<div class="form-group col-sm-6">
        <label for="item_id" class="control-label">@lang('fully.Item Name ')</label>
        {!! Form::select('item_id', $items->prepend('Please Select', '0'), (count($items) > 0) ? $items : '0', array("class" => "form-control select2", "onchange" => "getitem_avialble_qty()" , "id"=>"item_id")) !!}
        </div>
<!-- QTY Field -->
        <div class="form-group col-sm-6">
                <label for="qty" class="col-md-3 control-label">@lang('fully.Qty')</label>
                {!! Form::number('qty', null, ['class' => 'form-control', "id"=>"qty"]) !!}
            </div>
<!-- Notes Field -->
<div class="form-group col-lg-12">
        <label for="notes" class="col-md-3 control-label">@lang('fully.Remark')</label>
        {!! Form::textarea('notes', null, ['class' => 'form-control' , "id"=>"notes"]) !!}
    </div>

    <div class="form-group col-lg-12">
        <div class="clearfix">
                <button type="button" onclick="AddNewItemStockMovment();" class="btn btn-circle green-jungle btn-block"><i class="fa fa-plus-circle"></i> @lang('fully.Add')</button> </div>
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
<th >Item Name</th>
<th>Qty</th>
<th>Notes</th>
<th width="5%">Tools</th>
</tr>
</thead>
<tbody></tbody>
</table>
</div>
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="form-actions">
        <div class="row  col-md-offset-0">       
                  <a id="btnprint" disabled class="btn green-jungle"><i class="fa fa-print"></i> @lang('fully.Print')</a>
        <a id="btnsave" onclick="transfer();" class="btn blue"><i class="fa fa-save"></i> @lang('fully.Save')</a>

<a  class="btn red" href="{!! route('inventory.transfers.index') !!}"><i class="fa fa-times"> @lang('fully.Cancel')</i></a>
        </div>
    </div>
</div>
