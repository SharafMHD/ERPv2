<!-- No Field -->
<div class="form-group col-sm-6">

    <label for="no" class="col-md-3 control-label">@lang('fully.No'):</label>
    {!! Form::text('no', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    <label for="name" class="col-md-3 control-label">@lang('fully.Name'):</label>
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<!-- Category Id Field -->
<div class="form-group col-sm-6">
        <label for="category_id" class="control-label">@lang('fully.Category Id'):</label>
        {!! Form::select('category_id', $categories, null, ['class' => 'form-control select2']) !!}
        </div>
<!-- Unit Id Field -->
<div class="form-group col-sm-6">
        <label for="unit_id" class="control-label">@lang('fully.Unit Id'):</label>
        {!! Form::select('unit_id', $units, null, ['class' => 'form-control select2']) !!}
        </div>
<!-- Sales Price Field -->
<div class="form-group col-sm-6">
    <label for="sales_price" class="col-md-3 control-label">@lang('fully.Sales Price'):</label>
    {!! Form::number('sales_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Purchase Price Field -->
<div class="form-group col-sm-6">
    <label for="purchase_price" class="col-md-3 control-label">@lang('fully.Purchase Price'):</label>
    {!! Form::number('purchase_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Low Stock Qty Field -->
<div class="form-group col-sm-6">
    <label for="low_stock_qty" class="col-md-3 control-label">@lang('fully.Low Stock Qty'):</label>
    {!! Form::number('low_stock_qty', null, ['class' => 'form-control']) !!}
</div>

<!-- Color Field -->
<div class="form-group col-sm-6">

    <label for="color" class="col-md-3 control-label">@lang('fully.Color'):</label>
    {!! Form::text('color', null, ['class' => 'form-control']) !!}
</div>

<!-- Size Field -->
<div class="form-group col-sm-6">

    <label for="size" class="col-md-3 control-label">@lang('fully.Size'):</label>
    {!! Form::text('size', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">

    <label for="description" class="col-md-3 control-label">@lang('fully.Description'):</label>
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Item Type Field -->
<div class="form-group col-sm-6">
    <label for="item_type" class="control-label">@lang('fully.Item Type'):</label>
    {!! Form::select('item_type', array('Item' => 'Item', 'Service' => 'Service'), null, ['class' => 'form-control select2']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="form-actions">
        <div class="row  col-md-offset-0">
        <button type="submit"  class="btn blue"><i class="fa fa-save"></i> @lang('fully.Save')</button>
<a href="{!! route('inventory.items.index') !!}" class="btn red"><i class="fa fa-times"> @lang('fully.Cancel')</i></a>
        </div>
    </div>
</div>
