<!-- Code Field -->
<div class="form-group col-sm-6">

    <label for="code" class="col-md-3 control-label">@lang('fully.Code'):</label>
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">

    <label for="name" class="col-md-3 control-label">@lang('fully.Name'):</label>
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">

    <label for="description" class="col-md-3 control-label">@lang('fully.Description'):</label>
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Departmentid Field -->
<div class="form-group col-sm-6">
    <label for="departmentID" class="col-md-3 control-label">@lang('fully.Departmentid'):</label>
    {!! Form::number('departmentID', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="form-actions">
        <div class="row  col-md-offset-0">
        <button type="submit"  class="btn blue"><i class="fa fa-save"></i> @lang('fully.Save')</button>
<a href="{!! route('jobs.index') !!}" class="btn red"><i class="fa fa-times"> @lang('fully.Cancel')</i></a>
        </div>
    </div>
</div>
