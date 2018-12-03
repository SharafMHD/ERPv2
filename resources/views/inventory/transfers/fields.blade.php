<!-- No Field -->
<div class="form-group col-sm-6">

    <label for="no" class="col-md-3 control-label">@lang('fully.No'):</label>
    {!! Form::text('no', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Field -->
<div class="form-group col-sm-6">
    <label for="date" class="col-md-3 control-label">@lang('fully.Date'):</label>
    {!! Form::date('date', null, ['class' => 'form-control']) !!}
</div>

<!-- From Warehouse Id Field -->
<div class="form-group col-sm-6">
    <label for="from_warehouse_id" class="col-md-3 control-label">@lang('fully.From Warehouse Id'):</label>
    {!! Form::number('from_warehouse_id', null, ['class' => 'form-control']) !!}
</div>

<!-- To Warehouse Id Field -->
<div class="form-group col-sm-6">
    <label for="to_warehouse_id" class="col-md-3 control-label">@lang('fully.To Warehouse Id'):</label>
    {!! Form::number('to_warehouse_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Notes Field -->
<div class="form-group col-sm-6">

    <label for="notes" class="col-md-3 control-label">@lang('fully.Notes'):</label>
    {!! Form::text('notes', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">

    <label for="status" class="col-md-3 control-label">@lang('fully.Status'):</label>
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
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
<a href="{!! route('inventory.transfers.index') !!}" class="btn red"><i class="fa fa-times"> @lang('fully.Cancel')</i></a>
        </div>
    </div>
</div>
