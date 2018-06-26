<?php $__env->startSection('title'); ?>
<?php echo e(trans('general.accessories')); ?>

##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', \App\Models\Accessory::class)): ?>
        <a href="<?php echo e(route('accessories.create')); ?>" class="btn btn-primary pull-right"> <?php echo e(trans('general.create')); ?></a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-12">

    <div class="box box-default">
      <div class="box-body">
        <div class="table-responsive">
          <table
          name="accessories"
          class="table table-striped snipe-table"
          id="table"
          data-url="<?php echo e(route('api.accessories.index')); ?>"
          data-cookie="true"
          data-click-to-select="true"
          data-cookie-id-table="accessoriesTable-<?php echo e(config('version.hash_version')); ?>">
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
<?php echo $__env->make('partials.bootstrap-table', [
    'exportFile' => 'accessories-export',
    'search' => true,
    'showFooter' => true,
    'columns' => \App\Presenters\AccessoryPresenter::dataTableLayout()
    ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>