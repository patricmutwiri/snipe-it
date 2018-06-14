<?php $__env->startSection('title0'); ?>
  <?php echo e(trans('admin/hardware/general.requestable')); ?>

  <?php echo e(trans('general.assets')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('title'); ?>
    <?php echo $__env->yieldContent('title0'); ?>  ##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12">

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#assets" data-toggle="tab" title="<?php echo e(trans('general.assets')); ?>"><?php echo e(trans('general.assets')); ?></a>
                </li>
                <li>
                    <a href="#models" data-toggle="tab" title="<?php echo e(trans('general.asset_models')); ?>"><?php echo e(trans('general.asset_models')); ?></a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="assets">
                    <div class="row">
                        <div class="col-md-12">

                                <?php if($assets->count() > 0): ?>

                                <div class="table-responsive">
                                    <table
                                            name="requested-assets"
                                            data-toolbar="#toolbar"
                                            class="table table-striped snipe-table"
                                            id="table"
                                            data-advanced-search="true"
                                            data-id-table="advancedTable"
                                            data-cookie-id-table="requestableAssets">
                                        <thead>
                                            <tr role="row">
                                                <th class="col-md-1" data-sortable="true"><?php echo e(trans('general.image')); ?></th>
                                                <th class="col-md-2" data-sortable="true"><?php echo e(trans('admin/hardware/table.asset_model')); ?></th>
                                                <th class="col-md-2" data-sortable="true"><?php echo e(trans('admin/models/table.modelnumber')); ?></th>
                                                <?php if($snipeSettings->display_asset_name): ?>
                                                <th class="col-md-2" data-sortable="true"><?php echo e(trans('admin/hardware/form.name')); ?></th>
                                                <?php endif; ?>
                                                <th class="col-md-3" data-sortable="true"><?php echo e(trans('admin/hardware/table.serial')); ?></th>
                                                <th class="col-md-2" data-sortable="true"><?php echo e(trans('admin/hardware/table.location')); ?></th>
                                                <th class="col-md-2" data-sortable="true"><?php echo e(trans('admin/hardware/table.status')); ?></th>
                                                <th class="col-md-2" data-sortable="true"><?php echo e(trans('admin/hardware/form.expected_checkin')); ?></th>
                                                <th class="col-md-1 actions" data-sortable="false"><?php echo e(trans('table.actions')); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $assets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <tr>

                                                    <td>
                                                        <?php if($asset->getImageUrl()): ?>
                                                            <a href="<?php echo e($asset->getImageUrl()); ?>" data-toggle="lightbox" data-type="image">
                                                                <img src="<?php echo e($asset->getImageUrl()); ?>" style="max-height: <?php echo e($snipeSettings->thumbnail_max_h); ?>px; width: auto;" class="img-responsive">
                                                            </a>
                                                        <?php endif; ?>

                                                    </td>
                                                    <td><?php echo e($asset->model->name); ?>


                                                    </td>
                                                    <td>
                                                        <?php echo e($asset->model->model_number); ?>

                                                    </td>

                                                    <?php if($snipeSettings->display_asset_name): ?>
                                                    <td><?php echo e($asset->name); ?></td>
                                                    <?php endif; ?>

                                                    <td><?php echo e($asset->serial); ?></td>

                                                    <td>
                                                        <?php if($asset->location): ?>
                                                        <?php echo e($asset->location->name); ?>

                                                        <?php endif; ?>
                                                    </td>
                                                    <?php if($asset->assigned_to != '' && $asset->assigned_to > 0): ?>
                                                        <td>Checked out</td>
                                                    <?php else: ?>
                                                        <td><?php echo e(trans('admin/hardware/general.requestable')); ?></td>
                                                    <?php endif; ?>

                                                    <td><?php echo e($asset->expected_checkin); ?></td>
                                                    <td>
                                                        <form action="<?php echo e(route('account/request-item', ['itemType' => 'asset', 'itemId' => $asset->id])); ?>" method="POST" accept-charset="utf-8">
                                                        <?php echo e(csrf_field()); ?>

                                                        <?php if($asset->isRequestedBy(Auth::user())): ?>
                                                            <?php echo e(Form::submit(trans('button.cancel'), ['class' => 'btn btn-danger btn-sm'])); ?>

                                                        <?php else: ?>
                                                            <?php echo e(Form::submit(trans('button.request'), ['class' => 'btn btn-primary btn-sm'])); ?>

                                                        <?php endif; ?>
                                                        </form>
                                                    </td>

                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>

                                <?php else: ?>

                                    <div class="alert alert-info alert-block">
                                        <i class="fa fa-info-circle"></i>
                                        <?php echo e(trans('general.no_results')); ?>

                                    </div>

                                <?php endif; ?>

                    </div>
                </div>
            </div>

                <div class="tab-pane fade" id="models">
                    <div class="row">
                        <div class="col-md-12">

                            <?php if($models->count() > 0): ?>
                            <h4>Requestable Models</h4>
                                <table
                                        name="requested-assets"
                                        data-toolbar="#toolbar"
                                        class="table table-striped snipe-table"
                                        id="table"
                                        data-advanced-search="true"
                                        data-id-table="advancedTable"
                                        data-cookie-id-table="requestableAssets">
                                <thead>
                                    <tr role="row">
                                        <th class="col-md-1" data-sortable="true"><?php echo e(trans('general.image')); ?></th>
                                        <th class="col-md-6" data-sortable="true"><?php echo e(trans('admin/hardware/table.asset_model')); ?></th>
                                        <th class="col-md-3" data-sortable="true"><?php echo e(trans('admin/accessories/general.remaining')); ?></th>
                                        <th class="col-md-2" data-sortable="true"><?php echo e(trans('general.quantity')); ?></th>
                                        <th class="col-md-1 actions" data-sortable="false"><?php echo e(trans('table.actions')); ?></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $requestableModel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <form  action="<?php echo e(route('account/request-item', ['itemType' => 'asset_model', 'itemId' => $requestableModel->id])); ?>"
                                                    method="POST"
                                                    accept-charset="utf-8">
                                                <?php echo e(csrf_field()); ?>

                                                <td>
                                                    <?php if($requestableModel->image): ?>
                                                        <a href="<?php echo e(url('/')); ?>/uploads/models/<?php echo e($requestableModel->image); ?>" data-toggle="lightbox" data-type="image">
                                                            <img src="<?php echo e(url('/')); ?>/uploads/models/<?php echo e($requestableModel->image); ?>" style="max-height: <?php echo e($snipeSettings->thumbnail_max_h); ?>px; width: auto;" class="img-responsive">
                                                        </a>
                                                    <?php endif; ?>

                                                </td>


                                                <td><?php echo e($requestableModel->name); ?></td>
                                                <td><?php echo e($requestableModel->assets->where('requestable', '1')->count()); ?></td>
                                                <td><input type="text" name="request-quantity" value=""></td>
                                                <td>
                                                    <?php if($requestableModel->isRequestedBy(Auth::user())): ?>
                                                        <?php echo e(Form::submit(trans('button.cancel'), ['class' => 'btn btn-danger btn-sm'])); ?>

                                                    <?php else: ?>
                                                        <?php echo e(Form::submit(trans('button.request'), ['class' => 'btn btn-primary btn-sm'])); ?>

                                                    <?php endif; ?>
                                                </td>
                                            </form>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>

                            <?php else: ?>
                                <div class="alert alert-info alert-block">
                                    <i class="fa fa-info-circle"></i>
                                    <?php echo e(trans('general.no_results')); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div> <!-- .tab-content-->
        </div> <!-- .nav-tabs-custom -->
    </div> <!-- .col-md-12> -->
</div> <!-- .row -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('moar_scripts'); ?>
    <?php echo $__env->make('partials.bootstrap-table', [
        'exportFile' => 'requested-export',
        'search' => true,
        'clientSearch' => true,
    ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


    <script nonce="<?php echo e(csrf_token()); ?>">

    $( "a[name='Request']").click(function(event) {
        // event.preventDefault();
        quantity = $(this).closest('td').siblings().find('input').val();
        currentUrl = $(this).attr('href');
        // $(this).attr('href', currentUrl + '?quantity=' + quantity);
        // alert($(this).attr('href'));
    });
</script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>