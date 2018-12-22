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

<!-- Customer Name Field -->
<div class="form-group col-sm-6">

    <label for="customer_name" class="col-md-3 control-label">@lang('fully.Customer Name'):</label>
    {!! Form::text('customer_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Customer Phone Field -->
<div class="form-group col-sm-6">

    <label for="customer_phone" class="col-md-3 control-label">@lang('fully.Customer Phone'):</label>
    {!! Form::text('customer_phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Customer Address Field -->
<div class="form-group col-sm-6">

    <label for="customer_address" class="col-md-3 control-label">@lang('fully.Customer Address'):</label>
    {!! Form::text('customer_address', null, ['class' => 'form-control']) !!}
</div>

<!-- Valide Date Field -->
<div class="form-group col-sm-6">
    <label for="valide_date" class="col-md-3 control-label">@lang('fully.Valide Date'):</label>
    {!! Form::date('valide_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Notes Field -->
<div class="form-group col-sm-6">

    <label for="notes" class="col-md-3 control-label">@lang('fully.Notes'):</label>
    {!! Form::text('notes', null, ['class' => 'form-control']) !!}
</div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    <label for="amount" class="col-md-3 control-label">@lang('fully.Amount'):</label>
    {!! Form::number('amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Discount Field -->
<div class="form-group col-sm-6">
    <label for="discount" class="col-md-3 control-label">@lang('fully.Discount'):</label>
    {!! Form::number('discount', null, ['class' => 'form-control']) !!}
</div>

<!-- Net Amount Field -->
<div class="form-group col-sm-6">
    <label for="net_amount" class="col-md-3 control-label">@lang('fully.Net Amount'):</label>
    {!! Form::number('net_amount', null, ['class' => 'form-control']) !!}
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
<a href="{!! route('sales.quotations.index') !!}" class="btn red"><i class="fa fa-times"> @lang('fully.Cancel')</i></a>
        </div>
    </div>
</div>
