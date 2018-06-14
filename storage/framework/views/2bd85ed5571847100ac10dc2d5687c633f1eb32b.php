<div id="assigned_user" class="form-group<?php echo e($errors->has($fieldname) ? ' has-error' : ''); ?>"<?php echo (isset($style)) ? ' style="'.e($style).'"' : ''; ?>>

    <?php echo e(Form::label($fieldname, $translated_name, array('class' => 'col-md-3 control-label'))); ?>


    <div class="col-md-7<?php echo e(((isset($required)) && ($required=='true')) ? ' required' : ''); ?>">
        <select class="js-data-ajax" data-endpoint="users" name="<?php echo e($fieldname); ?>" style="width: 100%" id="assigned_user_select">
            <?php if($user_id = Input::old($fieldname, (isset($item)) ? $item->{$fieldname} : '')): ?>
                <option value="<?php echo e($user_id); ?>" selected="selected">
                    <?php echo e((\App\Models\User::find($user_id)) ? \App\Models\User::find($user_id)->present()->fullName : ''); ?>

                </option>
            <?php else: ?>
                <option value=""><?php echo e(trans('general.select_user')); ?></option>
            <?php endif; ?>
        </select>
    </div>

    <div class="col-md-1 col-sm-1 text-left">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', \App\Models\User::class)): ?>
            <a href='<?php echo e(route('modal.user')); ?>' data-toggle="modal"  data-target="#createModal" data-dependency="user" data-select='assigned_user_select' class="btn btn-sm btn-default">New</a>
        <?php endif; ?>
    </div>

    <?php echo $errors->first($fieldname, '<div class="col-md-8 col-md-offset-3"><span class="alert-msg"><i class="fa fa-times"></i> :message</span></div>'); ?>


</div>
