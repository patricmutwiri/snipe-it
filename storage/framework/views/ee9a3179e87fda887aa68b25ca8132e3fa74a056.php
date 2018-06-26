<!-- Company -->
<div id="<?php echo e($fieldname); ?>" class="form-group<?php echo e($errors->has($fieldname) ? ' has-error' : ''); ?>">
    <?php echo e(Form::label($fieldname, $translated_name, array('class' => 'col-md-3 control-label'))); ?>

    <div class="col-md-7">
        <select class="js-data-ajax" data-endpoint="companies" name="<?php echo e($fieldname); ?>" style="width: 100%" id="company_select">
            <?php if($company_id = Input::old($fieldname, (isset($item)) ? $item->{$fieldname} : '')): ?>
                <option value="<?php echo e($company_id); ?>" selected="selected">
                    <?php echo e((\App\Models\Company::find($company_id)) ? \App\Models\Company::find($company_id)->name : ''); ?>

                </option>
            <?php else: ?>
                <option value=""><?php echo e(trans('general.select_company')); ?></option>
            <?php endif; ?>
        </select>
    </div>


    <?php echo $errors->first($fieldname, '<div class="col-md-8 col-md-offset-3"><span class="alert-msg"><i class="fa fa-times"></i> :message</span></div>'); ?>


</div>
