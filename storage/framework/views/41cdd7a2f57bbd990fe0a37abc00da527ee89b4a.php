<?php $__env->startSection('title'); ?>
     <?php echo e(trans('admin/hardware/general.bulk_checkout')); ?>

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
      <div class="box-header with-border">
        <h3 class="box-title"> <?php echo e(trans('admin/hardware/form.tag')); ?> </h3>
      </div>
      <div class="box-body">
        <form class="form-horizontal" method="post" action="" autocomplete="off">
          <?php echo e(csrf_field()); ?>


          <!-- User -->
          <?php echo $__env->make('partials.forms.edit.user-select', ['translated_name' => trans('admin/hardware/form.checkout_to'), 'fieldname' => 'assigned_to'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

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
              <textarea class="col-md-6 form-control" id="note" name="note"><?php echo e(Input::old('note')); ?></textarea>
              <?php echo $errors->first('note', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>'); ?>

            </div>
          </div>

              <?php echo $__env->make('partials.forms.edit.asset-select', ['translated_name' => trans('general.assets'), 'fieldname' => 'selected_assets[]', 'multiple' => true], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


      </div> <!--./box-body-->
      <div class="box-footer">
        <a class="btn btn-link" href="<?php echo e(URL::previous()); ?>"> <?php echo e(trans('button.cancel')); ?></a>
        <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check icon-white"></i> <?php echo e(trans('general.checkout')); ?></button>
      </div>
    </div>
      </form>
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