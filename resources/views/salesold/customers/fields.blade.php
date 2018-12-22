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

<!-- Type Field -->
<div class="form-group col-sm-6">

    <label for="type" class="col-md-3 control-label">@lang('fully.Type'):</label>
    {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">

    <label for="phone" class="col-md-3 control-label">@lang('fully.Phone'):</label>
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    <label for="email" class="col-md-3 control-label">@lang('fully.Email'):</label>
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="form-actions">
        <div class="row  col-md-offset-0">
        <button type="submit"  class="btn blue"><i class="fa fa-save"></i> @lang('fully.Save')</button>
<a href="{!! route('sales.customers.index') !!}" class="btn red"><i class="fa fa-times"> @lang('fully.Cancel')</i></a>
        </div>
    </div>
</div>
