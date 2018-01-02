<!-- Model Number -->
<div class="form-group <?php echo e($errors->has('model_number') ? ' has-error' : ''); ?>">
    <label for="model_number" class="col-md-3 control-label"><?php echo e(trans('general.model_no')); ?></label>
    <div class="col-md-7">
    <input class="form-control" type="text" name="model_number" id="model_number" value="<?php echo e(Input::old('model_number', $item->model_number)); ?>" />
        <?php echo $errors->first('model_number', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>'); ?>

    </div>
</div>