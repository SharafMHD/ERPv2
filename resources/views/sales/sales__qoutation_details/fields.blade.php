<!-- Item Id Field -->
<div class="form-group col-sm-6">
    <label for="item_id" class="col-md-3 control-label">@lang('fully.Item Id'):</label>
    {!! Form::number('item_id', null, ['class' => 'form-control']) !!}
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

<!-- Total Field -->
<div class="form-group col-sm-6">
    <label for="total" class="col-md-3 control-label">@lang('fully.Total'):</label>
    {!! Form::number('total', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">

    <label for="description" class="col-md-3 control-label">@lang('fully.Description'):</label>
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Qoutation Id Field -->
<div class="form-group col-sm-6">
    <label for="qoutation_id" class="col-md-3 control-label">@lang('fully.Qoutation Id'):</label>
    {!! Form::number('qoutation_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="form-actions">
        <div class="row  col-md-offset-0">
        <button type="submit"  class="btn blue"><i class="fa fa-save"></i> @lang('fully.Save')</button>
<a href="{!! route('sales.salesQoutationDetails.index') !!}" class="btn red"><i class="fa fa-times"> @lang('fully.Cancel')</i></a>
        </div>
    </div>
</div>
