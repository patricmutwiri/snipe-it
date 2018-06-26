<?php $__env->startSection('inputFields'); ?>

<?php echo $__env->make('partials.forms.edit.name', ['translated_name' => trans('admin/categories/general.name')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- Type -->
<div class="form-group <?php echo e($errors->has('category_type') ? ' has-error' : ''); ?>">
    <label for="category_type" class="col-md-3 control-label"><?php echo e(trans('general.type')); ?></label>
    <div class="col-md-7 required">
        <?php echo e(Form::select('category_type', $category_types , Input::old('category_type', $item->category_type), array('class'=>'select2', 'style'=>'min-width:350px', $item->itemCount() > 0 ? 'disabled' : ''))); ?>

        <?php echo $errors->first('category_type', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>'); ?>

    </div>
</div>

<!-- EULA text -->
<div class="form-group <?php echo e($errors->has('eula_text') ? 'error' : ''); ?>">
    <label for="eula_text" class="col-md-3 control-label"><?php echo e(trans('admin/categories/general.eula_text')); ?></label>
    <div class="col-md-7">
        <?php echo e(Form::textarea('eula_text', Input::old('eula_text', $item->eula_text), array('class' => 'form-control'))); ?>

        <p class="help-block"><?php echo trans('admin/categories/general.eula_text_help'); ?> </p>
        <p class="help-block"><?php echo trans('admin/settings/general.eula_markdown'); ?> </p>

        <?php echo $errors->first('eula_text', '<span class="alert-msg">:message</span>'); ?>

    </div>
</div>

<!-- Use default checkbox -->
<div class="checkbox col-md-offset-3">
    <label>

        <?php if($snipeSettings->default_eula_text!=''): ?>
        <?php echo e(Form::checkbox('use_default_eula', '1', Input::old('use_default_eula', $item->use_default_eula))); ?>

        <?php echo trans('admin/categories/general.use_default_eula'); ?>

        <?php else: ?>
        <?php echo e(Form::checkbox('use_default_eula', '0', Input::old('use_default_eula'), array('disabled' => 'disabled'))); ?>

        <?php echo trans('admin/categories/general.use_default_eula_disabled'); ?>

        <?php endif; ?>

    </label>
</div>

<!-- Require Acceptance -->
<div class="checkbox col-md-offset-3">
    <label>
        <?php echo e(Form::checkbox('require_acceptance', '1', Input::old('require_acceptance', $item->require_acceptance))); ?>

        <?php echo e(trans('admin/categories/general.require_acceptance')); ?>

    </label>
</div>

<!-- Email on Checkin -->
<div class="checkbox col-md-offset-3">
    <label>
        <?php echo e(Form::checkbox('checkin_email', '1', Input::old('checkin_email', $item->checkin_email))); ?>

        <?php echo e(trans('admin/categories/general.checkin_email')); ?>

    </label>
</div>

<!-- Image -->
<?php if($item->image): ?>
    <div class="form-group <?php echo e($errors->has('image_delete') ? 'has-error' : ''); ?>">
        <label class="col-md-3 control-label" for="image_delete"><?php echo e(trans('general.image_delete')); ?></label>
        <div class="col-md-5">
            <?php echo e(Form::checkbox('image_delete')); ?>

            <img src="<?php echo e(url('/')); ?>/uploads/categories/<?php echo e($item->image); ?>" />
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

<?php $__env->startSection('content'); ?>
##parent-placeholder-040f06fd774092478d450774f5ba30c5da78acc8##


<?php if($snipeSettings->default_eula_text!=''): ?>
<!-- Modal -->
<div class="modal fade" id="eulaModal" tabindex="-1" role="dialog" aria-labelledby="eulaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="eulaModalLabel"><?php echo e(trans('admin/settings/general.default_eula_text')); ?></h4>
            </div>
            <div class="modal-body">
                <?php echo e(\App\Models\Setting::getDefaultEula()); ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('button.cancel')); ?></button>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/edit-form', [
    'createText' => trans('admin/categories/general.create') ,
    'updateText' => trans('admin/categories/general.update'),
    'helpTitle' =>  trans('admin/categories/general.about_categories_title'),
    'helpText' => trans('admin/categories/general.about_categories'),
    'formAction' => ($item) ? route('categories.update', ['category' => $item->id]) : route('categories.store'),
], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>