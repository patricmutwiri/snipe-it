<?php $__env->startSection('title'); ?>
     <?php echo e(trans('admin/consumables/general.checkout')); ?>

##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-9">

    <form class="form-horizontal" method="post" action="" autocomplete="off">
      <!-- CSRF Token -->
      <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />

      <div class="box box-default">

        <?php if($consumable->id): ?>
          <div class="box-header with-border">
            <div class="box-heading">
              <h3 class="box-title"><?php echo e($consumable->name); ?> </h3>
            </div>
          </div><!-- /.box-header -->
        <?php endif; ?>

        <div class="box-body">
          <?php if($consumable->name): ?>
          <!-- consumable name -->
          <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo e(trans('admin/consumables/general.consumable_name')); ?></label>
            <div class="col-md-6">
              <p class="form-control-static"><?php echo e($consumable->name); ?></p>
            </div>
          </div>
          <?php endif; ?>

          <!-- User -->
            <?php echo $__env->make('partials.forms.edit.user-select', ['translated_name' => trans('general.select_user'), 'fieldname' => 'assigned_to', 'required'=> 'true'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

          <?php if($consumable->category->require_acceptance=='1'): ?>
          <div class="form-group">
            <div class="col-md-9 col-md-offset-3">
              <p class="hint-block"><?php echo e(trans('admin/categories/general.required_acceptance')); ?></p>
            </div>
          </div>
          <?php endif; ?>

          <?php if($consumable->getEula()): ?>
          <div class="form-group">
            <div class="col-md-9 col-md-offset-3">
              <p class="hint-block"><?php echo e(trans('admin/categories/general.required_eula')); ?></p>
            </div>
          </div>
          <?php endif; ?>
        </div> <!-- .box-body -->
        <div class="box-footer">
          <a class="btn btn-link" href="<?php echo e(URL::previous()); ?>"><?php echo e(trans('button.cancel')); ?></a>
          <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check icon-white"></i> <?php echo e(trans('general.checkout')); ?></button>
       </div>
      </div>
    </form>

  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>