<?php $__env->startSection('title'); ?>
<?php echo e(trans('admin/suppliers/table.suppliers')); ?>

##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


<?php $__env->startSection('header_right'); ?>
<a href="<?php echo e(route('suppliers.create')); ?>" class="btn btn-primary pull-right"> <?php echo e(trans('general.create')); ?></a>
<?php $__env->stopSection(); ?>

<div class="row">
  <div class="col-md-12">
    <div class="box box-default">
      <div class="box-body">
      <div class="table-responsive">
      <table
      name="suppliers"
      id="table"
      class="table table-striped snipe-table"
      data-url="<?php echo e(route('api.suppliers.index')); ?>"
      data-cookie="true"
      data-click-to-select="true"
      data-cookie-id-table="suppliersTable-<?php echo e(config('version.hash_version')); ?>">
        <thead>
          <tr>
            <th data-sortable="true" data-field="id" data-visible="false"><?php echo e(trans('admin/suppliers/table.id')); ?></th>
            <th data-formatter="imageFormatter" data-sortable="true" data-field="image" data-visible="false"  data-searchable="false"><?php echo e(trans('general.image')); ?></th>
            <th data-sortable="true" data-field="name" data-formatter="suppliersLinkFormatter"><?php echo e(trans('admin/suppliers/table.name')); ?></th>
            <th data-sortable="true" data-field="address"><?php echo e(trans('admin/suppliers/table.address')); ?></th>
            <th data-searchable="true" data-sortable="true" data-field="contact"><?php echo e(trans('admin/suppliers/table.contact')); ?></th>
            <th data-searchable="true" data-sortable="true" data-field="email" data-formatter="emailFormatter"><?php echo e(trans('admin/suppliers/table.email')); ?></th>
            <th data-searchable="true" data-sortable="true" data-field="phone"><?php echo e(trans('admin/suppliers/table.phone')); ?></th>
            <th data-searchable="true" data-sortable="true" data-field="fax" data-visible="false"><?php echo e(trans('admin/suppliers/table.fax')); ?></th>
            <th data-searchable="false" data-sortable="true" data-field="assets_count"><?php echo e(trans('admin/suppliers/table.assets')); ?></th>
            <th data-searchable="false" data-sortable="true" data-field="accessories_count"><?php echo e(trans('general.accessories')); ?></th>
            <th data-searchable="false" data-sortable="true" data-field="licenses_count"><?php echo e(trans('admin/suppliers/table.licenses')); ?></th>
            <th data-switchable="false" data-formatter="suppliersActionsFormatter" data-searchable="false" data-sortable="false" data-field="actions"><?php echo e(trans('table.actions')); ?></th>
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
<?php echo $__env->make('partials.bootstrap-table', ['exportFile' => 'suppliers-export', 'search' => true], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>