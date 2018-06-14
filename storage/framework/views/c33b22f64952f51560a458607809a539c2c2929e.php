<div class="form-group <?php echo e($errors->has('phone') ? ' has-error' : ''); ?>">
    <?php echo e(Form::label('phone', trans('admin/suppliers/table.phone'), array('class' => 'col-md-3 control-label'))); ?>

    <div class="col-md-7">
    <?php echo e(Form::text('phone', Input::old('phone', $item->phone), array('class' => 'form-control'))); ?>

        <?php echo $errors->first('phone', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>'); ?>

    </div>
</div>