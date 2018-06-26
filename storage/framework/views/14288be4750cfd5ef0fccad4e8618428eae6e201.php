<?php $__env->startSection('title'); ?>
    <?php echo e(trans('general.departments')); ?>

    ##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
    <a href="<?php echo e(route('departments.create')); ?>" class="btn btn-primary pull-right">
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
                                data-url="<?php echo e(route('api.departments.index')); ?>"
                                data-cookie="true"
                                data-click-to-select="true"
                                data-cookie-id-table="departmentsTable-<?php echo e(config('version.hash_version')); ?>">
                            <thead>
                            <tr>
                                <th data-sortable="true" data-field="id" data-visible="false"><?php echo e(trans('general.id')); ?></th>
                                <th data-sortable="true" data-field="company" data-visible="false" data-formatter="companiesLinkObjFormatter"><?php echo e(trans('general.company')); ?></th>
                                <th data-sortable="true" data-formatter="departmentsLinkFormatter" data-field="name" data-searchable="false"><?php echo e(trans('admin/departments/table.name')); ?></th>
                                <th data-sortable="true" data-field="image" data-visible="false" data-formatter="imageFormatter"><?php echo e(trans('general.image')); ?></th>
                                <th data-sortable="false" data-formatter="usersLinkObjFormatter" data-field="manager" data-searchable="false"><?php echo e(trans('admin/departments/table.manager')); ?></th>
                                <th data-sortable="false" data-field="users_count" data-searchable="false"><?php echo e(trans('general.users')); ?></th>
                                <th data-sortable="false" data-formatter="locationsLinkObjFormatter" data-field="location" data-searchable="false"><?php echo e(trans('admin/departments/table.location')); ?></th>
                                <th data-sortable="false" data-formatter="departmentsActionsFormatter" data-field="actions" data-searchable="false"><?php echo e(trans('table.actions')); ?></th>

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