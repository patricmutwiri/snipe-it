<!-- Asset Model -->
<div id="<?php echo e($fieldname); ?>" class="form-group<?php echo e($errors->has($fieldname) ? ' has-error' : ''); ?>">

    <?php echo e(Form::label($fieldname, $translated_name, array('class' => 'col-md-3 control-label'))); ?>


    <div class="col-md-7 required">
        <select class="js-data-ajax" data-endpoint="categories/<?php echo e((isset($category_type)) ? $category_type : 'assets'); ?>" name="<?php echo e($fieldname); ?>" style="width: 100%" id="category_select_id">
            <?php if($category_id = Input::old($fieldname, $item->{$fieldname})): ?>
                <option value="<?php echo e($category_id); ?>" selected="selected">
                    <?php echo e((\App\Models\Category::find($category_id)) ? \App\Models\Category::find($category_id)->name : ''); ?>

                </option>
            <?php else: ?>
                <option value=""><?php echo e(trans('general.select_category')); ?></option>
            <?php endif; ?>

        </select>
    </div>


    <?php echo $errors->first($fieldname, '<div class="col-md-8 col-md-offset-3"><span class="alert-msg"><i class="fa fa-times"></i> :message</span></div>'); ?>

</div>
