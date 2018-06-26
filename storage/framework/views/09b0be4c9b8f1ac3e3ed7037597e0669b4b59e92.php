<?php $__env->startSection('title'); ?>
<?php echo e(trans('admin/groups/titles.group_management')); ?>

##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
<a href="<?php echo e(route('groups.create')); ?>" class="btn btn-primary pull-right" style="margin-left: 10px;"> <?php echo e(trans('general.create')); ?></a>
<a href="<?php echo e(route('settings.index')); ?>" class="btn btn-default pull-right"><?php echo e(trans('general.back')); ?></a>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="box box-default">
      <div class="box-body">
        <div class="table-responsive">
          <table
          name="groups"
          class="table table-striped snipe-table"
          id="table"
          data-toggle="table"
          data-url="<?php echo e(route('api.groups.index')); ?>"
          data-cookie="true"
          data-click-to-select="true"
          data-cookie-id-table="userGroupDisplay-<?php echo e(config('version.hash_version')); ?>">
            <thead>
              <tr>
               <th data-switchable="true" data-sortable="false" data-field="id" data-visible="false"><?php echo e(trans('general.id')); ?></th>
               <th data-switchable="true" data-sortable="true" data-field="name" data-formatter="groupsAdminLinkFormatter" data-visible="true"><?php echo e(trans('admin/groups/table.name')); ?></th>
               <th data-switchable="true" data-sortable="false" data-field="users_count" data-visible="true"><?php echo e(trans('admin/groups/table.users')); ?></th>
               <th data-switchable="true" data-sortable="true" data-field="created_at" data-visible="true" data-formatter="dateDisplayFormatter"><?php echo e(trans('general.created_at')); ?></th>
               <th data-switchable="false" data-searchable="false" data-sortable="false" data-field="actions"   data-formatter="groupsActionsFormatter"><?php echo e(trans('table.actions')); ?></th>
              </tr>
            </thead>
          </table>
        </div>
      </div> <!--.box-body-->
    </div> <!-- /.box.box-default-->
  </div> <!-- .col-md-12-->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('moar_scripts'); ?>
<?php echo $__env->make('partials.bootstrap-table', ['exportFile' => 'groups-export', 'search' => true], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>