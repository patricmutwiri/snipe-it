<?php $__env->startSection('inputFields'); ?>

<?php echo $__env->make('partials.forms.edit.company-select', ['translated_name' => trans('general.company'), 'fieldname' => 'company_id'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('partials.forms.edit.name', ['translated_name' => trans('admin/accessories/general.accessory_name')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('partials.forms.edit.category-select', ['translated_name' => trans('general.category'), 'fieldname' => 'category_id'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('partials.forms.edit.supplier-select', ['translated_name' => trans('general.supplier'), 'fieldname' => 'supplier_id'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('partials.forms.edit.manufacturer-select', ['translated_name' => trans('general.manufacturer'), 'fieldname' => 'manufacturer_id'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('partials.forms.edit.location-select', ['translated_name' => trans('general.location'), 'fieldname' => 'location_id'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('partials.forms.edit.model_number', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('partials.forms.edit.order_number', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('partials.forms.edit.purchase_date', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('partials.forms.edit.purchase_cost', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('partials.forms.edit.quantity', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('partials.forms.edit.minimum_quantity', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- Image -->

<div class="form-group <?php echo e($errors->has('image') ? ' has-error' : ''); ?>">
    <?php echo e(Form::label('image', trans('general.image_upload'), array('class' => 'col-md-3 control-label'))); ?>

    <div class="col-md-7">
        <?php if(config('app.lock_passwords')): ?>
            <p class="help-block"><?php echo e(trans('general.lock_passwords')); ?></p>
        <?php else: ?>
            <?php echo e(Form::file('image')); ?>

            <?php echo $errors->first('image', '<span class="alert-msg">:message</span>'); ?>

        <?php endif; ?>
    </div>
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/edit-form', [
    'createText' => trans('admin/accessories/general.create') ,
    'updateText' => trans('admin/accessories/general.update'),
    'helpTitle' => trans('admin/accessories/general.about_accessories_title'),
    'helpText' => trans('admin/accessories/general.about_accessories_text'),
    'formAction' => ($item) ? route('accessories.update', ['accessory' => $item->id]) : route('accessories.store'),
], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>