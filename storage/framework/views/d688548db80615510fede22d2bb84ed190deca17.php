<div id="assigned_user" class="form-group<?php echo e($errors->has($fieldname) ? ' has-error' : ''); ?>">

    <?php echo e(Form::label($fieldname, $translated_name, array('class' => 'col-md-3 control-label'))); ?>


    <div class="col-md-7">
        <select class="js-data-ajax" data-endpoint="departments" name="<?php echo e($fieldname); ?>" style="width: 100%" id="department_select">
            <?php if($department_id = Input::old($fieldname, (isset($item)) ? $item->{$fieldname} : '')): ?>
                <option value="<?php echo e($department_id); ?>" selected="selected">
                    <?php echo e((\App\Models\Department::find($department_id)) ? \App\Models\Department::find($department_id)->name : ''); ?>

                </option>
            <?php else: ?>
                <option value=""><?php echo e(trans('general.select_department')); ?></option>
            <?php endif; ?>
        </select>
    </div>


    <?php echo $errors->first($fieldname, '<div class="col-md-8 col-md-offset-3"><span class="alert-msg"><i class="fa fa-times"></i> :message</span></div>'); ?>


</div>
