<!-- Name Field -->
<div class="form-group col-sm-6">

    <label for="name" class="col-md-3 control-label">@lang('fully.Name'):</label>
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Keeper Field -->
<div class="form-group col-sm-6">

    <label for="keeper" class="col-md-3 control-label">@lang('fully.Keeper'):</label>
    {!! Form::text('keeper', null, ['class' => 'form-control']) !!}
</div>

<!-- Location Field -->
<div class="form-group col-sm-6">

    <label for="location" class="col-md-3 control-label">@lang('fully.Location'):</label>
    {!! Form::text('location', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">

    <label for="phone" class="col-md-3 control-label">@lang('fully.Phone'):</label>
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">

    <label for="status" class="col-md-3 control-label">@lang('fully.Status'):</label>
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="form-actions">
        <div class="row  col-md-offset-0">
        <button type="submit"  class="btn blue"><i class="fa fa-save"></i> @lang('fully.Save')</button>
<a href="{!! route('inventory.warehouses.index') !!}" class="btn red"><i class="fa fa-times"> @lang('fully.Cancel')</i></a>
        </div>
    </div>
</div>
