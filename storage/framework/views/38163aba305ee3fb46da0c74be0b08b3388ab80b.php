<!-- Asset Model -->
<div id="<?php echo e($fieldname); ?>" class="form-group<?php echo e($errors->has($fieldname) ? ' has-error' : ''); ?>">

    <?php echo e(Form::label($fieldname, $translated_name, array('class' => 'col-md-3 control-label'))); ?>


    <div class="col-md-7 required">
        <select class="js-data-ajax" data-endpoint="manufacturers" name="<?php echo e($fieldname); ?>" style="width: 100%" id="category_select_id">
            <?php if($manufacturer_id = Input::old($fieldname, $item->{$fieldname})): ?>
                <option value="<?php echo e($manufacturer_id); ?>" selected="selected">
                    <?php echo e((\App\Models\Manufacturer::find($manufacturer_id)) ? \App\Models\Manufacturer::find($manufacturer_id)->name : ''); ?>

                </option>
            <?php else: ?>
                <option value=""><?php echo e(trans('general.select_manufacturer')); ?></option>
            <?php endif; ?>

        </select>
    </div>


    <?php echo $errors->first($fieldname, '<div class="col-md-8 col-md-offset-3"><span class="alert-msg"><i class="fa fa-times"></i> :message</span></div>'); ?>

</div>
