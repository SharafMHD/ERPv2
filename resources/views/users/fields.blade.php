<!-- Name Field -->
<div class="form-group col-sm-6">

    <label for="name" class="col-md-3 control-label">@lang('fully.Name'):</label>
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- User Name Field -->
<div class="form-group col-sm-6">

    <label for="user_name" class="col-md-3 control-label">@lang('fully.User Name'):</label>
    {!! Form::text('user_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Role Field -->
<div class="form-group col-sm-6">
    <label for="role" class="col-md-3 control-label">@lang('fully.Role'):</label>
    {!! Form::number('role', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    <label for="password" class="col-md-3 control-label">@lang('fully.Password'):</label>
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- User Group Field -->
<div class="form-group col-sm-6">

    <label for="user_group" class="col-md-3 control-label">@lang('fully.User Group'):</label>
    {!! Form::text('user_group', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">

    <label for="image" class="col-md-3 control-label">@lang('fully.Image'):</label>
    {!! Form::text('image', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">

    <label for="status" class="col-md-3 control-label">@lang('fully.Status'):</label>
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Remember Token Field -->
<div class="form-group col-sm-6">

    <label for="remember_token" class="col-md-3 control-label">@lang('fully.Remember Token'):</label>
    {!! Form::text('remember_token', null, ['class' => 'form-control']) !!}
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
<a href="{!! route('users.index') !!}" class="btn red"><i class="fa fa-times"> @lang('fully.Cancel')</i></a>
        </div>
    </div>
</div>
