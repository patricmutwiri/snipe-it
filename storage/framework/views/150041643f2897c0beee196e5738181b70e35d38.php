<?php $__env->startSection('inputFields'); ?>

<?php echo $__env->make('partials.forms.edit.name', ['translated_name' => trans('admin/models/table.name')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('partials.forms.edit.manufacturer-select', ['translated_name' => trans('general.manufacturer'), 'fieldname' => 'manufacturer_id'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('partials.forms.edit.category-select', ['translated_name' => trans('admin/categories/general.category_name'), 'fieldname' => 'category_id'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('partials.forms.edit.model_number', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('partials.forms.edit.depreciation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- EOL -->

<div class="form-group <?php echo e($errors->has('eol') ? ' has-error' : ''); ?>">
    <label for="eol" class="col-md-3 control-label"><?php echo e(trans('general.eol')); ?></label>
    <div class="col-md-2">
        <div class="input-group">
            <input class="col-md-1 form-control" type="text" name="eol" id="eol" value="<?php echo e(Input::old('eol', isset($item->eol)) ? $item->eol : ''); ?>" />
            <span class="input-group-addon">
                <?php echo e(trans('general.months')); ?>

            </span>
        </div>
    </div>
    <div class="col-md-9 col-md-offset-3">
        <?php echo $errors->first('eol', '<span class="alert-msg"><br><i class="fa fa-times"></i> :message</span>'); ?>

    </div>
</div>

<!-- Custom Fieldset -->
<div class="form-group <?php echo e($errors->has('custom_fieldset') ? ' has-error' : ''); ?>">
    <label for="custom_fieldset" class="col-md-3 control-label"><?php echo e(trans('admin/models/general.fieldset')); ?></label>
    <div class="col-md-7">
        <?php echo e(Form::select('custom_fieldset', \App\Helpers\Helper::customFieldsetList(),Input::old('custom_fieldset', $item->fieldset_id), array('class'=>'select2', 'style'=>'width:350px'))); ?>

        <?php echo $errors->first('custom_fieldset', '<span class="alert-msg"><br><i class="fa fa-times"></i> :message</span>'); ?>

    </div>
</div>

<?php echo $__env->make('partials.forms.edit.notes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('partials.forms.edit.requestable', ['requestable_text' => trans('admin/models/general.requestable')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- Image -->
<?php if($item->image): ?>
<div class="form-group <?php echo e($errors->has('image_delete') ? 'has-error' : ''); ?>">
    <label class="col-md-3 control-label" for="image_delete"><?php echo e(trans('general.image_delete')); ?></label>
    <div class="col-md-5">
        <?php echo e(Form::checkbox('image_delete')); ?>

        <img src="<?php echo e(url('/')); ?>/uploads/models/<?php echo e($item->image); ?>" />
        <?php echo $errors->first('image_delete', '<span class="alert-msg"><br>:message</span>'); ?>

    </div>
</div>
<?php endif; ?>

<div class="form-group <?php echo e($errors->has('image') ? 'has-error' : ''); ?>">
    <label class="col-md-3 control-label" for="image"><?php echo e(trans('general.image_upload')); ?></label>
    <div class="col-md-5">
        <?php echo e(Form::file('image')); ?>

        <?php echo $errors->first('image', '<span class="alert-msg"><br>:message</span>'); ?>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/edit-form', [
    'createText' => trans('admin/models/table.create') ,
    'updateText' => trans('admin/models/table.update'),
    'helpTitle' => trans('admin/models/general.about_models_title'),
    'helpText' => trans('admin/models/general.about_models_text'),
    'formAction' => ($item) ? route('models.update', ['model' => $item->id]) : route('models.store'),
], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>