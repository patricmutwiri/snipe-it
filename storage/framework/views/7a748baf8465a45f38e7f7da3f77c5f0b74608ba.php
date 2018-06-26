<!-- Depreciation -->
<div class="form-group <?php echo e($errors->has('depreciation_id') ? ' has-error' : ''); ?>">
    <label for="depreciation_id" class="col-md-3 control-label"><?php echo e(trans('general.depreciation')); ?></label>
    <div class="col-md-7">
        <?php echo e(Form::select('depreciation_id', $depreciation_list , Input::old('depreciation_id', $item->depreciation_id), array('class'=>'select2', 'style'=>'width:350px'))); ?>

        <?php echo $errors->first('depreciation_id', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>'); ?>

    </div>
</div>