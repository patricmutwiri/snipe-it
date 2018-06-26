<?php $__env->startSection('title'); ?>
    <?php echo e(trans('general.asset_maintenance_report')); ?>

    ##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="box box-default">
      <div class="box-body">

        <div class="table-responsive">
            <table
                    name="maintenancesReport"
                    id="table"
                    class="table table-striped snipe-table"
                    data-url="<?php echo e(route('api.maintenances.index')); ?>"
                    data-cookie="true"
                    data-click-to-select="true"
                    data-cookie-id-table="maintenancesReport-<?php echo e(config('version.hash_version')); ?>">
                <thead>
                <tr>
                    <th data-field="company" data-sortable="false" data-visible="false"><?php echo e(trans('admin/companies/table.title')); ?></th>
                    <th data-sortable="true" data-field="id" data-visible="false"><?php echo e(trans('general.id')); ?></th>
                    <th data-sortable="false" data-field="asset_name" data-formatter="hardwareLinkObjFormatter"><?php echo e(trans('admin/asset_maintenances/table.asset_name')); ?></th>
                    <th data-sortable="false" data-field="supplier" data-formatter="suppliersLinkObjFormatter"><?php echo e(trans('general.supplier')); ?></th>
                    <th data-searchable="true" data-sortable="true" data-field="asset_maintenance_type"><?php echo e(trans('admin/asset_maintenances/form.asset_maintenance_type')); ?></th>
                    <th data-searchable="true" data-sortable="true" data-field="title"><?php echo e(trans('admin/asset_maintenances/form.title')); ?></th>
                    <th data-searchable="true" data-sortable="false" data-field="start_date" data-formatter="dateDisplayFormatter"><?php echo e(trans('admin/asset_maintenances/form.start_date')); ?></th>
                    <th data-searchable="true" data-sortable="true" data-field="completion_date" data-formatter="dateDisplayFormatter"><?php echo e(trans('admin/asset_maintenances/form.completion_date')); ?></th>
                    <th data-searchable="true" data-sortable="true" data-field="asset_maintenance_time"><?php echo e(trans('admin/asset_maintenances/form.asset_maintenance_time')); ?></th>
                    <th data-searchable="true" data-sortable="true" data-field="cost" class="text-right" data-footer-formatter="sumFormatter"><?php echo e(trans('admin/asset_maintenances/form.cost')); ?></th>
                    <th data-searchable="true" data-sortable="true" data-field="user_id" data-formatter="usersLinkObjFormatter"><?php echo e(trans('general.admin')); ?></th>
                    <th data-searchable="true" data-sortable="true" data-field="notes" data-visible="false"><?php echo e(trans('admin/asset_maintenances/form.notes')); ?></th>
                </tr>
                </thead>
            </table>

        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
    <?php echo $__env->make('partials.bootstrap-table',
    ['exportFile' => 'maintenances-export',
    'search' => true,
    'showFooter' => true ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>