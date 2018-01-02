<?php $__env->startSection('title'); ?>
<?php echo e(trans('admin/manufacturers/table.asset_manufacturers')); ?> 
##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header_right'); ?>
<a href="<?php echo e(route('manufacturers.create')); ?>" class="btn btn-primary pull-right">
  <?php echo e(trans('general.create')); ?></a>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-12">
    <div class="box box-default">
      <div class="box-body">
        <div class="table-responsive">
          <table
          name="manufacturers"
          class="table table-striped snipe-table"
          id="table"
          data-url="<?php echo e(route('api.manufacturers.index')); ?>"
          data-cookie="true"
          data-click-to-select="true"
          data-cookie-id-table="manufacturersTable-<?php echo e(config('version.hash_version')); ?>">

          </table>
        </div>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
  <?php echo $__env->make('partials.bootstrap-table',
      ['exportFile' => 'manufacturers-export',
      'search' => true,
      'columns' => \App\Presenters\ManufacturerPresenter::dataTableLayout()
  ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>