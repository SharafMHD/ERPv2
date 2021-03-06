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

<!-- Account Id Field -->
<div class="form-group col-sm-6">
    <label for="account_id" class="col-md-3 control-label">@lang('fully.Account Id'):</label>
    {!! Form::number('account_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Transaction Type Field -->
<div class="form-group col-sm-6">

    <label for="transaction_type" class="col-md-3 control-label">@lang('fully.Transaction Type'):</label>
    {!! Form::text('transaction_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Credit Field -->
<div class="form-group col-sm-6">
    <label for="credit" class="col-md-3 control-label">@lang('fully.Credit'):</label>
    {!! Form::number('credit', null, ['class' => 'form-control']) !!}
</div>

<!-- Debit Field -->
<div class="form-group col-sm-6">
    <label for="debit" class="col-md-3 control-label">@lang('fully.Debit'):</label>
    {!! Form::number('debit', null, ['class' => 'form-control']) !!}
</div>

<!-- Pay Type Field -->
<div class="form-group col-sm-6">

    <label for="pay_type" class="col-md-3 control-label">@lang('fully.Pay Type'):</label>
    {!! Form::text('pay_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">

    <label for="description" class="col-md-3 control-label">@lang('fully.Description'):</label>
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Cheque No Field -->
<div class="form-group col-sm-6">

    <label for="cheque_no" class="col-md-3 control-label">@lang('fully.Cheque No'):</label>
    {!! Form::text('cheque_no', null, ['class' => 'form-control']) !!}
</div>

<!-- Cheque Date Field -->
<div class="form-group col-sm-6">
    <label for="cheque_date" class="col-md-3 control-label">@lang('fully.Cheque Date'):</label>
    {!! Form::date('cheque_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Cheque Bank Field -->
<div class="form-group col-sm-6">

    <label for="cheque_bank" class="col-md-3 control-label">@lang('fully.Cheque Bank'):</label>
    {!! Form::text('cheque_bank', null, ['class' => 'form-control']) !!}
</div>

<!-- Cheque Status Field -->
<div class="form-group col-sm-6">

    <label for="cheque_status" class="col-md-3 control-label">@lang('fully.Cheque Status'):</label>
    {!! Form::text('cheque_status', null, ['class' => 'form-control']) !!}
</div>

<!-- Ref No Field -->
<div class="form-group col-sm-6">

    <label for="ref_no" class="col-md-3 control-label">@lang('fully.Ref No'):</label>
    {!! Form::text('ref_no', null, ['class' => 'form-control']) !!}
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
<a href="{!! route('accounting.accountTransactions.index') !!}" class="btn red"><i class="fa fa-times"> @lang('fully.Cancel')</i></a>
        </div>
    </div>
</div>
