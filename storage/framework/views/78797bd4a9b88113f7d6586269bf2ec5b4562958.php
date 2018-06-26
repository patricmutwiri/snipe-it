<!-- Notes -->
<div class="form-group <?php echo e($errors->has('notes') ? ' has-error' : ''); ?>">
    <label for="notes" class="col-md-3 control-label"><?php echo e(trans('admin/hardware/form.notes')); ?></label>
    <div class="col-md-7 col-sm-12">
        <textarea class="col-md-6 form-control" id="notes" name="notes"><?php echo e(Input::old('notes', $item->notes)); ?></textarea>
        <?php echo $errors->first('notes', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>'); ?>

    </div>
</div>
