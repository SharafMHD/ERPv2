<!-- Id Field -->
<div class="form-group">
<label for="id" class="col-md-3 control-label">@lang('fully.Id'):</label>
    <p>{!! $items->id !!}</p>
</div>

<!-- No Field -->
<div class="form-group">
<label for="no" class="col-md-3 control-label">@lang('fully.No'):</label>
    <p>{!! $items->no !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
<label for="name" class="col-md-3 control-label">@lang('fully.Name'):</label>
    <p>{!! $items->name !!}</p>
</div>

<!-- Category Id Field -->
<div class="form-group">
<label for="category_id" class="col-md-3 control-label">@lang('fully.Category Id'):</label>
    <p>{!!  $items->categories->name !!}</p>
</div>

<!-- Unit Id Field -->
<div class="form-group">
<label for="unit_id" class="col-md-3 control-label">@lang('fully.Unit Id'):</label>
    <p>{!! $items->units->name  !!}</p>
</div>

<!-- Sales Price Field -->
<div class="form-group">
<label for="sales_price" class="col-md-3 control-label">@lang('fully.Sales Price'):</label>
    <p>{!! $items->sales_price !!}</p>
</div>

<!-- Purchase Price Field -->
<div class="form-group">
<label for="purchase_price" class="col-md-3 control-label">@lang('fully.Purchase Price'):</label>
    <p>{!! $items->purchase_price !!}</p>
</div>

<!-- Low Stock Qty Field -->
<div class="form-group">
<label for="low_stock_qty" class="col-md-3 control-label">@lang('fully.Low Stock Qty'):</label>
    <p>{!! $items->low_stock_qty !!}</p>
</div>

<!-- Color Field -->
<div class="form-group">
<label for="color" class="col-md-3 control-label">@lang('fully.Color'):</label>
    <p>{!! $items->color !!}</p>
</div>

<!-- Size Field -->
<div class="form-group">
<label for="size" class="col-md-3 control-label">@lang('fully.Size'):</label>
    <p>{!! $items->size !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
<label for="description" class="col-md-3 control-label">@lang('fully.Description'):</label>
    <p>{!! $items->description !!}</p>
</div>

<!-- Item Type Field -->
<div class="form-group">
<label for="item_type" class="col-md-3 control-label">@lang('fully.Item Type'):</label>
    <p>{!! $items->item_type !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
<label for="created_at" class="col-md-3 control-label">@lang('fully.Created At'):</label>
    <p>{!! $items->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
<label for="updated_at" class="col-md-3 control-label">@lang('fully.Updated At'):</label>
    <p>{!! $items->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
<label for="deleted_at" class="col-md-3 control-label">@lang('fully.Deleted At'):</label>
    <p>{!! $items->deleted_at !!}</p>
</div>

