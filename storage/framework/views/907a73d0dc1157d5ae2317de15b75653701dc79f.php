<?php $__env->startSection('title'); ?>
<?php echo e(trans('admin/suppliers/table.view')); ?> -
<?php echo e($supplier->name); ?>

##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
  <a href="<?php echo e(route('suppliers.edit', $supplier->id)); ?>" class="btn btn-default pull-right">
  <?php echo e(trans('admin/suppliers/table.update')); ?></a>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-9">



    <!-- start tables -->

    <div class="box box-default">
      <?php if($supplier->id): ?>
      <div class="box-header with-border">
        <div class="box-heading">
          <h3 class="box-title"> <?php echo e(trans('general.assets')); ?>

          </h3>
        </div>
      </div><!-- /.box-header -->
      <?php endif; ?>

      <div class="box-body">
        <!-- checked out suppliers table -->
        <br>
        <div class="table-responsive">
          <table class="display table table-hover">
            <thead>
              <tr role="row">
                <th class="col-md-3">Asset Tag</th>
                <th class="col-md-3"><span class="line"></span>Name</th>
                <th class="col-md-3"><span class="line"></span>User</th>
                <th class="col-md-2"><span class="line"></span>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $supplier->assets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplierassets): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td>
                  <a href="<?php echo e(route('hardware.show',  $supplierassets->id)); ?>">
                    <?php echo e($supplierassets->asset_tag); ?>

                  </a>
                </td>
                <td>
                  <a href="<?php echo e(route('hardware.show',  $supplierassets->id)); ?>">
                    <?php echo e($supplierassets->name); ?>

                  </a>
                </td>
                <td>
                  <?php if($supplierassets->assignedTo): ?>
                  <?php echo $supplierassets->assignedTo->present()->nameUrl(); ?>

                  <?php endif; ?>
                </td>
                <td>
                  <?php if($supplierassets->assigned_to != ''): ?>
                  <a href="<?php echo e(route('checkin/hardware', $supplierassets->id)); ?>" class="btn btn-info btn-sm">Checkin</a>
                  <?php else: ?>
                  <a href="<?php echo e(route('checkout/hardware', $supplierassets->id)); ?>" class="btn btn-success btn-sm">Checkout</a>
                  <?php endif; ?>
                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
      </div> <!--/box-body-->
    </div>
  </div> <!--/col-md-9-->

  <!-- side address column -->
  <div class="col-md-3">
    <h4>Contact:</h4>
    <ul class="list-unstyled">
      <?php if($supplier->contact): ?>
      <li><i class="fa fa-user"></i><?php echo e($supplier->contact); ?></li>
      <?php endif; ?>
      <?php if($supplier->phone): ?>
      <li><i class="fa fa-phone"></i><?php echo e($supplier->phone); ?></li>
      <?php endif; ?>
      <?php if($supplier->fax): ?>
      <li><i class="fa fa-print"></i><?php echo e($supplier->fax); ?></li>
      <?php endif; ?>

      <?php if($supplier->email): ?>
      <li>
        <i class="fa fa-envelope-o"></i>
        <a href="mailto:<?php echo e($supplier->email); ?>">
        <?php echo e($supplier->email); ?>

        </a>
      </li>
      <?php endif; ?>

      <?php if($supplier->url): ?>
      <li>
        <i class="fa fa-globe"></i>
        <a href="<?php echo e($supplier->url); ?>" target="_new"><?php echo e($supplier->url); ?></a>
      </li>
      <?php endif; ?>

      <?php if($supplier->address): ?>
      <li><br>
        <?php echo e($supplier->address); ?>


        <?php if($supplier->address2): ?>
        <br>
        <?php echo e($supplier->address2); ?>

        <?php endif; ?>
        <?php if(($supplier->city) || ($supplier->state)): ?>
        <br>
        <?php echo e($supplier->city); ?> <?php echo e(strtoupper($supplier->state)); ?> <?php echo e($supplier->zip); ?> <?php echo e(strtoupper($supplier->country)); ?>

        <?php endif; ?>
      </li>
      <?php endif; ?>

      <?php if($supplier->notes): ?>
      <li><i class="fa fa-comment"></i><?php echo e($supplier->notes); ?></li>
      <?php endif; ?>

      <?php if($supplier->image): ?>
      <li><br /><img src="<?php echo e(url('/')); ?>/uploads/suppliers/<?php echo e($supplier->image); ?>" /></li>
      <?php endif; ?>
    </ul>
  </div> <!--/col-md-3-->
</div> <!--/row-->

<div class="row">
  <div class="col-md-9">

    <div class="box box-default">
      <div class="box-header with-border">
        <div class="box-heading">
          <h3 class="box-title">Accessories</h3>
        </div>
      </div><!-- /.box-header -->
      <div class="box-body">
        <div class="table-responsive">

          <table
                  name="suppliersAccessories"
                  id="table"
                  class="snipe-table"
                  data-url="<?php echo e(route('api.accessories.index', ['supplier_id' => $supplier->id])); ?>"
                  data-cookie="true"
                  data-export-options='{"fileName": "testo"}'
                  data-click-to-select="true"
                  data-cookie-id-table="suppliersAccessories-<?php echo e(config('version.hash_version')); ?>">
            <thead>
            <tr>
              <th class="col-md-4" data-field="name" data-formatter="accessoriesLinkFormatter">Name</th>
              <th class="col-md-4" data-field="model_number">Model Number</th>
              <th class="col-md-4" data-field="purchase_cost" data-footer-formatter="sumFormatter">Purchase_cost</th>

              <th class="col-md-4" data-field="actions" data-formatter="accessoriesActionsFormatter">Actions</th>
            </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>


    <div class="box box-default">

      <?php if($supplier->id): ?>
      <div class="box-header with-border">
        <div class="box-heading">
          <h3 class="box-title">Software</h3>
        </div>
      </div><!-- /.box-header -->
      <?php endif; ?>

      <div class="box-body">
        <table class="table table-hover">
          <thead>
            <tr>
              <th class="col-md-4">Name</th>
              <th class="col-md-4"><span class="line"></span>Serial</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $supplier->licenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $license): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo $license->present()->nameUrl(); ?></td>
              <td><?php echo $license->present()->serialUrl(); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-9">
    <div class="box box-default">

      <?php if($supplier->id): ?>
      <div class="box-header with-border">
        <div class="box-heading">
          <h3 class="box-title"> Improvements</h3>
        </div>
      </div><!-- /.box-header -->
      <?php endif; ?>

      <div class="box-body">
        <table class="table table-hover">
          <thead>
            <tr>
              <th class="col-md-2"><span class="line"></span><?php echo e(trans('admin/asset_maintenances/table.asset_name')); ?></th>
              <th class="col-md-2"><span class="line"></span><?php echo e(trans('admin/asset_maintenances/form.asset_maintenance_type')); ?></th>
              <th class="col-md-2"><span class="line"></span><?php echo e(trans('admin/asset_maintenances/form.start_date')); ?></th>
              <th class="col-md-2"><span class="line"></span><?php echo e(trans('admin/asset_maintenances/form.completion_date')); ?></th>
              <th class="col-md-2"><span class="line"></span><?php echo e(trans('admin/asset_maintenances/table.is_warranty')); ?></th>
              <th class="col-md-2"><span class="line"></span><?php echo e(trans('admin/asset_maintenances/form.cost')); ?></th>
              <th class="col-md-1"><span class="line"></span><?php echo e(trans('table.actions')); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php $totalCost = 0; ?>
            <?php if($supplier->asset_maintenances): ?>
              <?php $__currentLoopData = $supplier->asset_maintenances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $improvement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(is_null($improvement->deleted_at)): ?>
                <tr>
                  <td>
                    <?php if($improvement->asset): ?>
                      <a href="<?php echo e(route('hardware.show', $improvement->asset_id)); ?>"><?php echo e($improvement->asset->name); ?></a>
                    <?php else: ?>
                        (deleted asset)
                    <?php endif; ?>
                  </td>
                  <td><?php echo e($improvement->asset_maintenance_type); ?></td>
                  <td><?php echo e($improvement->start_date); ?></td>
                  <td><?php echo e($improvement->completion_date); ?></td>
                  <td><?php echo e($improvement->is_warranty ? trans('admin/asset_maintenances/message.warranty') : trans('admin/asset_maintenances/message.not_warranty')); ?></td>
                  <td><?php echo e(sprintf( $snipeSettings->default_currency. '%01.2f', $improvement->cost)); ?></td>
                    <?php $totalCost += $improvement->cost; ?>
                  <td><a href="<?php echo e(route('maintenances.edit', $improvement->id)); ?>" class="btn btn-warning"><i class="fa fa-pencil icon-white"></i></a>
                  </td>
                </tr>
                <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </tbody>

          <tfoot>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td><?php echo e(sprintf($snipeSettings->default_currency . '%01.2f', $totalCost)); ?></td>
            </tr>
          </tfoot>
        </table>
      </div>

    </div>
  </div>
</div> <!-- /.row-->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('moar_scripts'); ?>
  <?php echo $__env->make('partials.bootstrap-table', [
      'showFooter' => true,
      ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>