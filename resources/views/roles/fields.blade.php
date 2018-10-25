<!-- Role Name Field -->
<div class="form-group col-sm-6">

    <label for="role_name" class="col-md-3 control-label">@lang('fully.Role Name'):</label>
    {!! Form::text('role_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Created By Field -->
<div class="form-group col-sm-6">
    <label for="created_by" class="col-md-3 control-label">@lang('fully.Created By'):</label>
    {!! Form::number('created_by', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="form-actions">
        <div class="row  col-md-offset-0">
        <button type="submit"  class="btn blue"><i class="fa fa-save"></i> @lang('fully.Save')</button>
<a href="{!! route('roles.index') !!}" class="btn red"><i class="fa fa-times"> @lang('fully.Cancel')</i></a>
        </div>
    </div>
</div>
