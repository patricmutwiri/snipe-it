<!-- Serial -->
<div class="form-group <?php echo e($errors->has('serial') ? ' has-error' : ''); ?>">
    <label for="serial" class="col-md-3 control-label"><?php echo e(trans('admin/hardware/form.serial')); ?> </label>
    <div class="col-md-7 col-sm-12<?php echo e((\App\Helpers\Helper::checkIfRequired($item, 'serial')) ? ' required' : ''); ?>">
        <input class="form-control" type="text" name="serial" id="serial" value="<?php echo e(Input::old('serial', $item->serial)); ?>" />
        <?php echo $errors->first('serial', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>'); ?>

    </div>
</div>