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

<!-- Notes Field -->
<div class="form-group col-sm-6">

    <label for="notes" class="col-md-3 control-label">@lang('fully.Notes'):</label>
    {!! Form::text('notes', null, ['class' => 'form-control']) !!}
</div>

<!-- Movement Id Field -->
<div class="form-group col-sm-6">
    <label for="movement_id" class="col-md-3 control-label">@lang('fully.Movement Id'):</label>
    {!! Form::number('movement_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="form-actions">
        <div class="row  col-md-offset-0">
        <button type="submit"  class="btn blue"><i class="fa fa-save"></i> @lang('fully.Save')</button>
<a href="{!! route('inventory.movementDetails.index') !!}" class="btn red"><i class="fa fa-times"> @lang('fully.Cancel')</i></a>
        </div>
    </div>
</div>
