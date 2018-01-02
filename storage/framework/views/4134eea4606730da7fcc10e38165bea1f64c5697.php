<?php $__env->startSection('title'); ?>
<?php echo e(trans('general.locations')); ?>

##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
<a href="<?php echo e(route('locations.create')); ?>" class="btn btn-primary pull-right">
  <?php echo e(trans('general.create')); ?></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="box box-default">
      <div class="box-body">
        <div class="table-responsive">
          <table
          name="locations"
          class="table table-striped snipe-table"
          id="table"
          data-url="<?php echo e(route('api.locations.index')); ?>"
          data-cookie="true"
          data-click-to-select="true"
          data-cookie-id-table="locationsTable-<?php echo e(config('version.hash_version')); ?>">
            <thead>
              <tr>
                <th data-sortable="true" data-field="id" data-visible="false"><?php echo e(trans('general.id')); ?></th>
                <th data-sortable="true" data-formatter="locationsLinkFormatter" data-field="name" data-searchable="true"><?php echo e(trans('admin/locations/table.name')); ?></th>
                <th data-sortable="true" data-field="image" data-visible="false" data-formatter="imageFormatter"><?php echo e(trans('general.image')); ?></th>
                <th data-sortable="true" data-field="parent" data-formatter="locationsLinkObjFormatter"><?php echo e(trans('admin/locations/table.parent')); ?></th>
                <th data-searchable="false" data-sortable="true" data-field="assets_count"><?php echo e(trans('admin/locations/table.assets_rtd')); ?></th>
                <th data-searchable="false" data-sortable="true" data-field="assigned_assets_count"><?php echo e(trans('admin/locations/table.assets_checkedout')); ?></th>
                <th data-searchable="false" data-sortable="true" data-field="users_count"><?php echo e(trans('general.people')); ?></th>
                <th data-searchable="true" data-sortable="true" data-field="currency"><?php echo e(trans('general.currency')); ?></th>
                <th data-searchable="true" data-sortable="true" data-field="address"><?php echo e(trans('admin/locations/table.address')); ?></th>
                <th data-searchable="true" data-sortable="true" data-field="city"><?php echo e(trans('admin/locations/table.city')); ?>

                </th>
                <th data-searchable="true" data-sortable="true" data-field="state">
                    <?php echo e(trans('admin/locations/table.state')); ?>

                </th>
                    <th data-searchable="true" data-sortable="true" data-field="zip">
                        <?php echo e(trans('admin/locations/table.zip')); ?>

                    </th>
                <th data-searchable="true" data-sortable="true" data-field="country">
                    <?php echo e(trans('admin/locations/table.country')); ?>

                </th>
                <th data-sortable="true" data-formatter="usersLinkObjFormatter" data-field="manager" data-searchable="true"><?php echo e(trans('admin/users/table.manager')); ?></th>
                <th data-switchable="false" data-formatter="locationsActionsFormatter" data-searchable="false" data-sortable="false" data-field="actions"><?php echo e(trans('table.actions')); ?></th>
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
<?php echo $__env->make('partials.bootstrap-table', ['exportFile' => 'locations-export', 'search' => true], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>