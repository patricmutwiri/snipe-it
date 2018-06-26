<?php $__env->startSection('title'); ?>
     <?php echo e(trans('admin/hardware/general.checkout')); ?>

##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<style>

.input-group {
    padding-left: 0px !important;
}
</style>

<div class="row">
  <!-- left column -->
  <div class="col-md-7">
    <div class="box box-default">
      <form class="form-horizontal" method="post" action="" autocomplete="off">
        <div class="box-header with-border">
            <h3 class="box-title"> <?php echo e(trans('admin/hardware/form.tag')); ?> <?php echo e($asset->asset_tag); ?></h3>
        </div>
        <div class="box-body">
            <?php echo e(csrf_field()); ?>

            <?php if($asset->model->name): ?>
            <!-- Model name -->
            <div class="form-group <?php echo e($errors->has('name') ? 'error' : ''); ?>">
                <?php echo e(Form::label('name', trans('admin/hardware/form.model'), array('class' => 'col-md-3 control-label'))); ?>

              <div class="col-md-8">
                <p class="form-control-static"><?php echo e($asset->model->name); ?></p>
              </div>
            </div>
            <?php endif; ?>

            <!-- Asset Name -->
            <div class="form-group <?php echo e($errors->has('name') ? 'error' : ''); ?>">
              <?php echo e(Form::label('name', trans('admin/hardware/form.name'), array('class' => 'col-md-3 control-label'))); ?>

              <div class="col-md-8">
                <input class="form-control" type="text" name="name" id="name" value="<?php echo e(Input::old('name', $asset->name)); ?>" tabindex="1">
                <?php echo $errors->first('name', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>'); ?>

              </div>
            </div>
                <?php echo $__env->make('partials.forms.checkout-selector', ['user_select' => 'true','asset_select' => 'true', 'location_select' => 'true'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <?php echo $__env->make('partials.forms.edit.user-select', ['translated_name' => trans('general.user'), 'fieldname' => 'assigned_user', 'required'=>'true'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php if($asset->requireAcceptance()): ?>
                    <div class="form-group">

                        <div class="col-md-8 col-md-offset-3">
                            <p class="help-block">
                                Because this asset category requires acceptance,
                                it cannot be checked out to another asset or to a location.
                            </p>
                        </div>
                    </div>
            <?php else: ?>
                <!-- We have to pass unselect here so that we don't default to the asset that's being checked out. We want that asset to be pre-selected everywhere else. -->
                <?php echo $__env->make('partials.forms.edit.asset-select', ['translated_name' => trans('general.asset'), 'fieldname' => 'assigned_asset', 'unselect' => 'true', 'style' => 'display:none;', 'required'=>'true'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <?php echo $__env->make('partials.forms.edit.location-select', ['translated_name' => trans('general.location'), 'fieldname' => 'assigned_location', 'style' => 'display:none;', 'required'=>'true'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php endif; ?>

            <!-- Checkout/Checkin Date -->
            <div class="form-group <?php echo e($errors->has('checkout_at') ? 'error' : ''); ?>">
              <?php echo e(Form::label('name', trans('admin/hardware/form.checkout_date'), array('class' => 'col-md-3 control-label'))); ?>

              <div class="col-md-8">
                  <div class="input-group date col-md-5" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                      <input type="text" class="form-control" placeholder="<?php echo e(trans('general.select_date')); ?>" name="checkout_at" id="checkout_at" value="<?php echo e(Input::old('checkout_at')); ?>">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  </div>
                <?php echo $errors->first('checkout_at', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>'); ?>

              </div>
            </div>

            <!-- Expected Checkin Date -->
            <div class="form-group <?php echo e($errors->has('expected_checkin') ? 'error' : ''); ?>">
              <?php echo e(Form::label('name', trans('admin/hardware/form.expected_checkin'), array('class' => 'col-md-3 control-label'))); ?>

              <div class="col-md-8">
                  <div class="input-group date col-md-5" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                      <input type="text" class="form-control" placeholder="<?php echo e(trans('general.select_date')); ?>" name="expected_checkin" id="expected_checkin" value="<?php echo e(Input::old('expected_checkin')); ?>">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  </div>
                <?php echo $errors->first('expected_checkin', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>'); ?>

              </div>
            </div>

            <!-- Note -->
            <div class="form-group <?php echo e($errors->has('note') ? 'error' : ''); ?>">
              <?php echo e(Form::label('note', trans('admin/hardware/form.notes'), array('class' => 'col-md-3 control-label'))); ?>

              <div class="col-md-8">
                <textarea class="col-md-6 form-control" id="note" name="note"><?php echo e(Input::old('note', $asset->note)); ?></textarea>
                <?php echo $errors->first('note', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>'); ?>

              </div>
            </div>

                <?php if($asset->requireAcceptance() || $asset->getEula()): ?>
                    <div class="form-group notification-callout">
                        <div class="col-md-8 col-md-offset-3">
                            <div class="callout callout-info">

                                    <?php if($asset->requireAcceptance()): ?>
                                        <i class="fa fa-envelope"></i>
                                    <?php echo e(trans('admin/categories/general.required_acceptance')); ?>

                                        <br>
                                    <?php endif; ?>

                                    <?php if($asset->getEula()): ?>
                                        <i class="fa fa-envelope"></i>
                                       <?php echo e(trans('admin/categories/general.required_eula')); ?>

                                    <?php endif; ?>
                            </div>
                        </div>
                    </div>
                 <?php endif; ?>

        </div> <!--/.box-body-->
        <div class="box-footer">
          <a class="btn btn-link" href="<?php echo e(URL::previous()); ?>"> <?php echo e(trans('button.cancel')); ?></a>
          <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check icon-white"></i> <?php echo e(trans('general.checkout')); ?></button>
        </div>
      </form>
    </div>
  </div> <!--/.col-md-7-->

  <!-- right column -->
  <div class="col-md-5" id="current_assets_box" style="display:none;">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo e(trans('admin/users/general.current_assets')); ?></h3>
      </div>
      <div class="box-body">
        <div id="current_assets_content">
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
    <?php echo $__env->make('partials/assets-assigned', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>