<!-- Name Field -->
<div class="form-group col-sm-6">

    <label for="name" class="col-md-3 control-label">@lang('fully.Name'):</label>
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    <label for="description" class="col-md-3 control-label">@lang('fully.Description'):</label>
    {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '5']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="form-actions">
        <div class="row  col-md-offset-0">
        <button type="submit"  class="btn blue"><i class="fa fa-save"></i> @lang('fully.Save')</button>
<a href="{!! route('units.index') !!}" class="btn red"><i class="fa fa-times"> @lang('fully.Cancel')</i></a>
        </div>
    </div>
</div>
