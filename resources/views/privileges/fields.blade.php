<!-- Role Field -->
<div class="form-group col-sm-6">
    <label for="role" class="col-md-3 control-label">@lang('fully.Role'):</label>
    {!! Form::number('role', null, ['class' => 'form-control']) !!}
</div>

<!-- Action Field -->
<div class="form-group col-sm-6">
    <label for="action" class="col-md-3 control-label">@lang('fully.Action'):</label>
    {!! Form::number('action', null, ['class' => 'form-control']) !!}
</div>

<!-- Model Field -->
<div class="form-group col-sm-6">
    <label for="model" class="col-md-3 control-label">@lang('fully.Model'):</label>
    {!! Form::number('model', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="form-actions">
        <div class="row  col-md-offset-0">
        <button type="submit"  class="btn blue"><i class="fa fa-save"></i> @lang('fully.Save')</button>
<a href="{!! route('privileges.index') !!}" class="btn red"><i class="fa fa-times"> @lang('fully.Cancel')</i></a>
        </div>
    </div>
</div>
