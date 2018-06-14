<?php $__env->startSection('title'); ?>
<?php echo e(trans('admin/licenses/general.software_licenses')); ?>

##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header_right'); ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', \App\Models\License::class)): ?>
    <a href="<?php echo e(route('licenses.create')); ?>" class="btn btn-primary pull-right">
      <?php echo e(trans('general.create')); ?>

    </a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-body">
        <table
        name="licenses"
        id="table"
        data-url="<?php echo e(route('api.licenses.index')); ?>"
        class="table table-striped snipe-table"
        data-cookie="true"
        data-click-to-select="true"
        data-cookie-id-table="licenseTable">
        </table>
      </div><!-- /.box-body -->

      <div class="box-footer clearfix">
      </div>
    </div><!-- /.box -->
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
<?php echo $__env->make('partials.bootstrap-table', [
    'exportFile' => 'licenses-export',
    'search' => true,
    'showFooter' => true,
    'columns' => \App\Presenters\LicensePresenter::dataTableLayout()], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>