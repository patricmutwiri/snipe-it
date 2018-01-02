<?php $__env->startSection('inputFields'); ?>

<?php echo $__env->make('partials.forms.edit.name', ['translated_name' => trans('admin/components/table.title')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('partials.forms.edit.category-select', ['translated_name' => trans('general.category'), 'fieldname' => 'category_id'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('partials.forms.edit.quantity', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('partials.forms.edit.minimum_quantity', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('partials.forms.edit.serial', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('partials.forms.edit.company-select', ['translated_name' => trans('general.company'), 'fieldname' => 'company_id'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('partials.forms.edit.location-select', ['translated_name' => trans('general.location'), 'fieldname' => 'location_id'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('partials.forms.edit.order_number', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('partials.forms.edit.purchase_date', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('partials.forms.edit.purchase_cost', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- Image -->
<?php if($item->image): ?>
    <div class="form-group <?php echo e($errors->has('image_delete') ? 'has-error' : ''); ?>">
        <label class="col-md-3 control-label" for="image_delete"><?php echo e(trans('general.image_delete')); ?></label>
        <div class="col-md-5">
            <?php echo e(Form::checkbox('image_delete')); ?>

            <img src="<?php echo e(url('/')); ?>/uploads/components/<?php echo e($item->image); ?>" />
            <?php echo $errors->first('image_delete', '<span class="alert-msg">:message</span>'); ?>

        </div>
    </div>
<?php endif; ?>

<div class="form-group <?php echo e($errors->has('image') ? 'has-error' : ''); ?>">
    <label class="col-md-3 control-label" for="image"><?php echo e(trans('general.image_upload')); ?></label>
    <div class="col-md-5">
        <?php echo e(Form::file('image')); ?>

        <?php echo $errors->first('image', '<span class="alert-msg">:message</span>'); ?>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/edit-form', [
    'createText' => trans('admin/components/general.create') ,
    'updateText' => trans('admin/components/general.update'),
    'helpTitle' => trans('admin/components/general.about_components_title'),
    'helpText' => trans('admin/components/general.about_components_text'),
    'formAction' => ($item) ? route('components.update', ['component' => $item->id]) : route('components.store'),

], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>