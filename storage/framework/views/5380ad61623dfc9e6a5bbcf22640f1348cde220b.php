<?php $__env->startSection('inputFields'); ?>

<?php echo $__env->make('partials.forms.edit.name', ['translated_name' => trans('admin/suppliers/table.name')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('partials.forms.edit.address', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="form-group <?php echo e($errors->has('contact') ? ' has-error' : ''); ?>">
    <?php echo e(Form::label('contact', trans('admin/suppliers/table.contact'), array('class' => 'col-md-3 control-label'))); ?>

    <div class="col-md-7">
        <?php echo e(Form::text('contact', Input::old('contact', $item->contact), array('class' => 'form-control'))); ?>

        <?php echo $errors->first('contact', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>'); ?>

    </div>
</div>

<?php echo $__env->make('partials.forms.edit.phone', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="form-group <?php echo e($errors->has('fax') ? ' has-error' : ''); ?>">
    <?php echo e(Form::label('fax', trans('admin/suppliers/table.fax'), array('class' => 'col-md-3 control-label'))); ?>

    <div class="col-md-7">
        <?php echo e(Form::text('fax', Input::old('fax', $item->fax), array('class' => 'form-control'))); ?>

        <?php echo $errors->first('fax', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>'); ?>

    </div>
</div>

<?php echo $__env->make('partials.forms.edit.email', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="form-group <?php echo e($errors->has('url') ? ' has-error' : ''); ?>">
    <?php echo e(Form::label('url', trans('admin/suppliers/table.url'), array('class' => 'col-md-3 control-label'))); ?>

    <div class="col-md-7">
        <?php echo e(Form::text('url', Input::old('url', $item->url), array('class' => 'form-control'))); ?>

        <?php echo $errors->first('url', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>'); ?>

    </div>
</div>

<?php echo $__env->make('partials.forms.edit.notes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- Image -->
<?php if($item->image): ?>
<div class="form-group <?php echo e($errors->has('image_delete') ? 'has-error' : ''); ?>">
    <label class="col-md-3 control-label" for="image_delete"><?php echo e(trans('general.image_delete')); ?></label>
    <div class="col-md-5">
        <?php echo e(Form::checkbox('image_delete')); ?>

        <img src="<?php echo e(url('/')); ?>/uploads/suppliers/<?php echo e($item->image); ?>" />
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
    'createText' => trans('admin/suppliers/table.create') ,
    'updateText' => trans('admin/suppliers/table.update'),
    'helpTitle' => trans('admin/suppliers/table.about_suppliers_title'),
    'helpText' => trans('admin/suppliers/table.about_suppliers_text'),
    'formAction' => ($item) ? route('suppliers.update', ['supplier' => $item->id]) : route('suppliers.store'),
], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>