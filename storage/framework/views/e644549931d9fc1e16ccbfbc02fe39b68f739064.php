<?php $__env->startSection('title0'); ?>

  <?php if((Input::get('company_id')) && ($company)): ?>
    <?php echo e($company->name); ?>

  <?php endif; ?>



<?php if(Input::get('status')): ?>
  <?php if(Input::get('status')=='Pending'): ?>
    <?php echo e(trans('general.pending')); ?>

  <?php elseif(Input::get('status')=='RTD'): ?>
    <?php echo e(trans('general.ready_to_deploy')); ?>

  <?php elseif(Input::get('status')=='Deployed'): ?>
    <?php echo e(trans('general.deployed')); ?>

  <?php elseif(Input::get('status')=='Undeployable'): ?>
    <?php echo e(trans('general.undeployable')); ?>

  <?php elseif(Input::get('status')=='Deployable'): ?>
    <?php echo e(trans('general.deployed')); ?>

  <?php elseif(Input::get('status')=='Requestable'): ?>
    <?php echo e(trans('admin/hardware/general.requestable')); ?>

  <?php elseif(Input::get('status')=='Archived'): ?>
    <?php echo e(trans('general.archived')); ?>

  <?php elseif(Input::get('status')=='Deleted'): ?>
    <?php echo e(trans('general.deleted')); ?>

  <?php endif; ?>
<?php else: ?>
<?php echo e(trans('general.all')); ?>

<?php endif; ?>
<?php echo e(trans('general.assets')); ?>


  <?php if(Input::has('order_number')): ?>
    : Order #<?php echo e(Input::get('order_number')); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('title'); ?>
<?php echo $__env->yieldContent('title0'); ?>  ##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
  <a href="<?php echo e(route('reports.export.assets', ['status'=> e(Input::get('status'))])); ?>" style="margin-right: 5px;" class="btn btn-default"><i class="fa fa-download icon-white"></i>
    <?php echo e(trans('admin/hardware/table.dl_csv')); ?></a>
  <a href="<?php echo e(route('hardware.create')); ?>" class="btn btn-primary pull-right"></i> <?php echo e(trans('general.create')); ?></a>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-body">
        <?php echo e(Form::open([
          'method' => 'POST',
          'route' => ['hardware/bulkedit'],
          'class' => 'form-inline',
           'id' => 'bulkForm'])); ?>

          <div class="row">
            <div class="col-md-12">
              <?php if(Input::get('status')!='Deleted'): ?>
              <div id="toolbar">
                <select name="bulk_actions" class="form-control select2">
                  <option value="edit">Edit</option>
                  <option value="delete">Delete</option>
                  <option value="labels">Generate Labels</option>
                </select>
                <button class="btn btn-primary" id="bulkEdit" disabled>Go</button>
              </div>
              <?php endif; ?>

              <table
              name="assets"
              
              data-toolbar="#toolbar"
              class="table table-striped snipe-table"
              id="table"
              data-advanced-search="true"
              data-id-table="advancedTable"
              data-url="<?php echo e(route('api.assets.index',
                  array('status' => e(Input::get('status')),
                  'order_number'=>e(Input::get('order_number')),
                  'company_id'=>e(Input::get('company_id')),
                  'status_id'=>e(Input::get('status_id'))))); ?>"
              data-click-to-select="true"
              data-cookie-id-table="<?php echo e(e(Input::get('status'))); ?>assetTable-<?php echo e(config('version.hash_version')); ?>">
              </table>
            </div><!-- /.col -->
          </div><!-- /.row -->
        <?php echo e(Form::close()); ?>

      </div><!-- ./box-body -->
    </div><!-- /.box -->
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
<?php echo $__env->make('partials.bootstrap-table', [
    'exportFile' => 'assets-export',
    'search' => true,
    'showFooter' => true,
    'columns' => \App\Presenters\AssetPresenter::dataTableLayout()
], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>