<?php $__env->startSection('title'); ?>
 <?php echo e($consumable->name); ?>

 <?php echo e(trans('general.consumable')); ?>

##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
<a href="<?php echo e(URL::previous()); ?>" class="btn btn-primary pull-right">
  <?php echo e(trans('general.back')); ?></a>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-9">
    <div class="box box-default">
      <?php if($consumable->id): ?>
      <div class="box-header with-border">
        <div class="box-heading">
          <h3 class="box-title"> <?php echo e($consumable->name); ?></h3>
        </div>
      </div><!-- /.box-header -->
      <?php endif; ?>

      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <div class="table table-responsive">
              <table
                name="consumable_users"
                class="table table-striped snipe-table"
                id="table"
                data-url="<?php echo e(route('api.consumables.showUsers', $consumable->id)); ?>"
                data-cookie="true"
                data-click-to-select="true"
                data-cookie-id-table="consumableDetailTable-<?php echo e(config('version.hash_version')); ?>"
              >
                <thead>
                  <tr>
                    <th data-switchable="false" data-searchable="false" data-sortable="false" data-field="name"><?php echo e(trans('general.user')); ?></th>
                    <th data-switchable="false" data-searchable="false" data-sortable="false" data-field="created_at"><?php echo e(trans('general.date')); ?></th>
                    <th data-switchable="false" data-searchable="false" data-sortable="false" data-field="admin"><?php echo e(trans('general.admin')); ?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div> <!-- /.col-md-12-->

        </div>
      </div>
    </div> <!-- /.box.box-default-->
  </div> <!-- /.col-md-9-->
  <div class="col-md-3">

    <?php if($consumable->image!=''): ?>
      <div class="col-md-12" style="padding-bottom: 5px;">
        <img src="<?php echo e(url('/')); ?>/uploads/consumables/<?php echo e($consumable->image); ?>">
      </div>
    <?php endif; ?>

    <h4><?php echo e(trans('admin/consumables/general.about_consumables_title')); ?></h4>
    <p><?php echo e(trans('admin/consumables/general.about_consumables_text')); ?> </p>

    <?php if($consumable->purchase_date): ?>
      <div class="col-md-12" style="padding-bottom: 5px;">
        <strong><?php echo e(trans('general.purchase_date')); ?>: </strong>
        <?php echo e($consumable->purchase_date); ?>

      </div>
    <?php endif; ?>

    <?php if($consumable->purchase_cost): ?>
      <div class="col-md-12" style="padding-bottom: 5px;">
        <strong><?php echo e(trans('general.purchase_cost')); ?>:</strong>
        <?php echo e($snipeSettings->default_currency); ?>

        <?php echo e(\App\Helpers\Helper::formatCurrencyOutput($consumable->purchase_cost)); ?>

      </div>
    <?php endif; ?>

    <?php if($consumable->item_no): ?>
      <div class="col-md-12" style="padding-bottom: 5px;">
        <strong><?php echo e(trans('admin/consumables/general.item_no')); ?>:</strong>
        <?php echo e($consumable->item_no); ?>

      </div>
    <?php endif; ?>

    <?php if($consumable->model_number): ?>
      <div class="col-md-12" style="padding-bottom: 5px;">
        <strong><?php echo e(trans('general.model_no')); ?>:</strong>
        <?php echo e($consumable->model_number); ?>

      </div>
    <?php endif; ?>

    <?php if($consumable->manufacturer): ?>
      <div class="col-md-12" style="padding-bottom: 5px;">
        <strong><?php echo e(trans('general.manufacturer')); ?>:</strong>
        <?php echo e($consumable->manufacturer->name); ?>

      </div>
    <?php endif; ?>

    <?php if($consumable->order_number): ?>
      <div class="col-md-12" style="padding-bottom: 5px;">
        <strong><?php echo e(trans('general.order_number')); ?>:</strong>
        <?php echo e($consumable->order_number); ?>

      </div>
    <?php endif; ?>
  </div> <!-- /.col-md-3-->
</div> <!-- /.row-->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
<?php echo $__env->make('partials.bootstrap-table', ['exportFile' => 'consumable' . $consumable->name . '-export', 'search' => false], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>