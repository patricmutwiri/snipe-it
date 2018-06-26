<!-- Name -->
<div class="form-group <?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
    <label for="name" class="col-md-3 control-label"><?php echo e($translated_name); ?></label>
    <div class="col-md-7 col-sm-12<?php echo e((\App\Helpers\Helper::checkIfRequired($item, 'name')) ? ' required' : ''); ?>">
        <input class="form-control" type="text" name="name" id="name" value="<?php echo e(Input::old('name', $item->name)); ?>" />
        <?php echo $errors->first('name', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>'); ?>

    </div>
</div>