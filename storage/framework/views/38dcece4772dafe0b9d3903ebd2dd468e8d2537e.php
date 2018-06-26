<div class="form-group <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
    <?php echo e(Form::label('email', trans('admin/suppliers/table.email'), array('class' => 'col-md-3 control-label'))); ?>

    <div class="col-md-7">
    <?php echo e(Form::text('email', Input::old('email', $item->email), array('class' => 'form-control'))); ?>

        <?php echo $errors->first('email', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>'); ?>

    </div>
</div>