<!-- Name Field -->
<div class="form-group col-sm-6">

    <label for="name" class="col-md-3 control-label">@lang('fully.Name'):</label>
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Descritpion Field -->
<div class="form-group col-sm-6">

    <label for="descritpion" class="col-md-3 control-label">@lang('fully.Descritpion'):</label>
    {!! Form::text('descritpion', null, ['class' => 'form-control']) !!}
</div>

<!-- Award Point Field -->
<div class="form-group col-sm-6">

    <label for="award_point" class="col-md-3 control-label">@lang('fully.Award Point'):</label>
    {!! Form::text('award_point', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="form-actions">
        <div class="row  col-md-offset-0">
        <button type="submit"  class="btn blue"><i class="fa fa-save"></i> @lang('fully.Save')</button>
<a href="{!! route('courses.index') !!}" class="btn red"><i class="fa fa-times"> @lang('fully.Cancel')</i></a>
        </div>
    </div>
</div>
