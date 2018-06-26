<div class="form-group <?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
    <?php echo e(Form::label('address', trans('general.address'), array('class' => 'col-md-3 control-label'))); ?>

    <div class="col-md-7">
        <?php echo e(Form::text('address', Input::old('address', $item->address), array('class' => 'form-control'))); ?>

        <?php echo $errors->first('address', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>'); ?>

    </div>
</div>

<div class="form-group <?php echo e($errors->has('address2') ? ' has-error' : ''); ?>">
    <?php echo e(Form::label('address2', ' ', array('class' => 'col-md-3 control-label'))); ?>

    <div class="col-md-7">
        <?php echo e(Form::text('address2', Input::old('address2', $item->address2), array('class' => 'form-control'))); ?>

        <?php echo $errors->first('address2', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>'); ?>

    </div>
</div>

<div class="form-group <?php echo e($errors->has('city') ? ' has-error' : ''); ?>">
    <?php echo e(Form::label('city', trans('general.city'), array('class' => 'col-md-3 control-label'))); ?>

    <div class="col-md-7">
    <?php echo e(Form::text('city', Input::old('city', $item->city), array('class' => 'form-control'))); ?>

        <?php echo $errors->first('city', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>'); ?>

    </div>
</div>

<div class="form-group <?php echo e($errors->has('state') ? ' has-error' : ''); ?>">
    <?php echo e(Form::label('state', trans('general.state'), array('class' => 'col-md-3 control-label'))); ?>

    <div class="col-md-7">
    <?php echo e(Form::text('state', Input::old('state', $item->state), array('class' => 'form-control'))); ?>

        <?php echo $errors->first('state', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>'); ?>

    </div>
</div>

<div class="form-group <?php echo e($errors->has('country') ? ' has-error' : ''); ?>">
    <?php echo e(Form::label('country', trans('general.country'), array('class' => 'col-md-3 control-label'))); ?>

    <div class="col-md-5">
    <?php echo Form::countries('country', Input::old('country', $item->country), 'select2'); ?>

        <?php echo $errors->first('country', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>'); ?>

    </div>
</div>

<div class="form-group <?php echo e($errors->has('zip') ? ' has-error' : ''); ?>">
    <?php echo e(Form::label('zip', trans('general.zip'), array('class' => 'col-md-3 control-label'))); ?>

    <div class="col-md-7">
    <?php echo e(Form::text('zip', Input::old('zip', $item->zip), array('class' => 'form-control'))); ?>

        <?php echo $errors->first('zip', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>'); ?>

    </div>
</div>