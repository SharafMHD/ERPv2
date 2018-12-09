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

<!-- Warehouse Id Field -->
<div class="form-group col-sm-6">
    <label for="warehouse_id" class="col-md-3 control-label">@lang('fully.Warehouse Id'):</label>
    {!! Form::number('warehouse_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Item Id Field -->
<div class="form-group col-sm-6">
    <label for="item_id" class="col-md-3 control-label">@lang('fully.Item Id'):</label>
    {!! Form::number('item_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Transaction Type Field -->
<div class="form-group col-sm-6">
    <label for="transaction_type" class="col-md-3 control-label">@lang('fully.Transaction Type'):</label>
    {!! Form::number('transaction_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Qty Field -->
<div class="form-group col-sm-6">
    <label for="qty" class="col-md-3 control-label">@lang('fully.Qty'):</label>
    {!! Form::number('qty', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    <label for="price" class="col-md-3 control-label">@lang('fully.Price'):</label>
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">

    <label for="description" class="col-md-3 control-label">@lang('fully.Description'):</label>
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    <label for="user_id" class="col-md-3 control-label">@lang('fully.User Id'):</label>
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="form-actions">
        <div class="row  col-md-offset-0">
        <button type="submit"  class="btn blue"><i class="fa fa-save"></i> @lang('fully.Save')</button>
<a href="{!! route('inventory.inventory_transactions.index') !!}" class="btn red"><i class="fa fa-times"> @lang('fully.Cancel')</i></a>
        </div>
    </div>
</div>
