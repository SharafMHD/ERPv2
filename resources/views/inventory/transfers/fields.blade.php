<div class="form-group col-sm-6">
        <label for="from_warehouse_id" class="control-label">@lang('fully.warehouse from')</label>
        {!! Form::select('from_warehouse_id', $warehouses, null, ['class' => 'form-control select2']) !!}
        </div>
<!-- To Warehouse Id Field -->
<div class="form-group col-sm-6">
        <label for="to_warehouse_id" class="control-label">@lang('fully.warehouse to')</label>
        {!! Form::select('to_warehouse_id', $warehouses, null, ['class' => 'form-control select2']) !!}
        </div>
        <!-- To Warehouse Id Field -->
<div class="form-group col-sm-6">
        <label for="item_id" class="control-label">@lang('fully.Item Name ')</label>
        {!! Form::select('item_id', $items, null, ['class' => 'form-control select2']) !!}
        </div>
<!-- QTY Field -->
        <div class="form-group col-sm-6">
                <label for="qty" class="col-md-3 control-label">@lang('fully.Qty')</label>
                {!! Form::number('qty', null, ['class' => 'form-control']) !!}
            </div>
<!-- Notes Field -->
<div class="form-group col-sm-6">
        <label for="notes" class="col-md-3 control-label">@lang('fully.Remark')</label>
        {!! Form::text('notes', null, ['class' => 'form-control']) !!}
        {{-- {!! Form::textarea('notes', null, ['class' => 'form-control']) !!} --}}
    </div>
    <div class="form-group col-sm-6">
            <button type="submit"  class="btn green"><i class="fa fa-plus-circle"></i> @lang('fully.Add')</button>
        </div>
 
<hr/>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="form-actions">
        <div class="row  col-md-offset-0">
        <button type="submit"  class="btn blue"><i class="fa fa-save"></i> @lang('fully.Save')</button>
<a href="{!! route('inventory.transfers.index') !!}" class="btn red"><i class="fa fa-times"> @lang('fully.Cancel')</i></a>
        </div>
    </div>
</div>
