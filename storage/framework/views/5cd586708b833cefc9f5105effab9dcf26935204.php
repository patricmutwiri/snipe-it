<?php $__env->startSection('title'); ?>
<?php echo e(trans('admin/categories/general.asset_categories')); ?>

##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header_right'); ?>
<a href="<?php echo e(route('categories.create')); ?>" class="btn btn-primary pull-right">
  <?php echo e(trans('general.create')); ?></a>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-12">
    <div class="box box-default">
      <div class="box-body">
        <div class="table-responsive">
          <table
            class="table table-striped snipe-table"
            name="categories"
            id="table"
            data-url="<?php echo e(route('api.categories.index')); ?>"
            data-cookie="true"
            data-click-to-select="true"
            data-cookie-id-table="categoriesTable-<?php echo e(config('version.hash_version')); ?>">

          </table>
        </div>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
  <?php echo $__env->make('partials.bootstrap-table',
      ['exportFile' => 'category-export',
      'search' => true,
      'columns' => \App\Presenters\CategoryPresenter::dataTableLayout()
  ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>