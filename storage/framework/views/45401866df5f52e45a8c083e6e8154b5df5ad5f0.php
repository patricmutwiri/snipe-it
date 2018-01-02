<?php $__env->startSection('title'); ?>
  <?php echo e(trans('general.companies')); ?>

  ##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
  <a href="<?php echo e(route('companies.create')); ?>" class="btn btn-primary pull-right">
    <?php echo e(trans('general.create')); ?></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div class="row">
    <div class="col-md-9">
      <div class="box box-default">
        <div class="box-body">
          <div class="table-responsive">
            <table
                    name="companies"
                    class="table table-striped snipe-table"
                    id="table"
                    data-url="<?php echo e(route('api.companies.index')); ?>"
                    data-cookie="true"
                    data-click-to-select="true"
                    data-cookie-id-table="companiesTable-<?php echo e(config('version.hash_version')); ?>">
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- side address column -->
    <div class="col-md-3">
      <h4>About Companies</h4>
      <p>
        You can use companies as a simple informative field, or you can use them to restrict asset visibility and availability to users with a specific company by enabling Full Company Support in your Admin Settings.
      </p>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
  <?php echo $__env->make('partials.bootstrap-table', [
      'exportFile' => 'companies-export',
      'search' => true,
      'columns' => \App\Presenters\CompanyPresenter::dataTableLayout()
  ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>