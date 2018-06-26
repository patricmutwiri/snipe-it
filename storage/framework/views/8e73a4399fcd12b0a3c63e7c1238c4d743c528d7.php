<?php $__env->startSection('inputFields'); ?>

    <?php echo $__env->make('partials.forms.edit.name', ['translated_name' => trans('admin/departments/table.name')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- Company -->
    <?php if(\App\Models\Company::canManageUsersCompanies()): ?>
        <?php echo $__env->make('partials.forms.edit.company-select', ['translated_name' => trans('general.company'), 'fieldname' => 'company_id'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>


    <!-- Manager -->
    <?php echo $__env->make('partials.forms.edit.user-select', ['translated_name' => trans('admin/users/table.manager'), 'fieldname' => 'manager_id'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- Location -->
    <?php echo $__env->make('partials.forms.edit.location-select', ['translated_name' => trans('general.location'), 'fieldname' => 'location_id'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- Image -->
    <?php if($item->image): ?>
        <div class="form-group <?php echo e($errors->has('image_delete') ? 'has-error' : ''); ?>">
            <label class="col-md-3 control-label" for="image_delete"><?php echo e(trans('general.image_delete')); ?></label>
            <div class="col-md-5">
                <?php echo e(Form::checkbox('image_delete')); ?>

                <img src="<?php echo e(url('/')); ?>/uploads/departments/<?php echo e($item->image); ?>" />
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
    'createText' => trans('admin/departments/table.create') ,
    'updateText' => trans('admin/departments/table.update'),
    'helpTitle' => trans('admin/departments/table.about_locations_title'),
    'helpText' => trans('admin/departments/table.about_locations'),
    'formAction' => ($item) ? route('departments.update', ['department' => $item->id]) : route('departments.store'),
], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>