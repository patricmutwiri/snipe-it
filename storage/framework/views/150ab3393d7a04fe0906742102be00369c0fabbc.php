<?php $__env->startSection('inputFields'); ?>
<?php echo $__env->make('partials.forms.edit.name', ['translated_name' => trans('admin/companies/table.name')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- Image -->
<?php if($item->image): ?>
    <div class="form-group <?php echo e($errors->has('image_delete') ? 'has-error' : ''); ?>">
        <label class="col-md-3 control-label" for="image_delete"><?php echo e(trans('general.image_delete')); ?></label>
        <div class="col-md-5">
            <?php echo e(Form::checkbox('image_delete')); ?>

            <img src="<?php echo e(url('/')); ?>/uploads/companies/<?php echo e($item->image); ?>" />
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
    'createText' => trans('admin/companies/table.create') ,
    'updateText' => trans('admin/companies/table.update'),
    'helpTitle' => trans('admin/companies/general.about_companies_title'),
    'helpText' => trans('admin/companies/general.about_companies_text'),
    'formAction' => ($item) ? route('companies.update', ['company' => $item->id]) : route('companies.store'),
], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>