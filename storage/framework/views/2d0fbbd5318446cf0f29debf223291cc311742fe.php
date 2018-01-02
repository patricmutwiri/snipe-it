<?php $__env->startSection('title'); ?>
View Assets for  <?php echo e($user->present()->fullName()); ?>

##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-12">
    <div class="box box-default">

        <?php if($user->id): ?>
          <div class="box-header with-border">
            <div class="box-heading">
              <h3 class="box-title"> <?php echo e(trans('admin/users/general.assets_user', array('name' => $user->first_name))); ?></h3>
            </div>
          </div><!-- /.box-header -->
        <?php endif; ?>

      <div class="box-body">
        <!-- checked out assets table -->
        <?php if(count($user->assets) > 0): ?>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th class="col-md-4"><?php echo e(trans('admin/hardware/table.asset_model')); ?></th>
                  <th class="col-md-2"><?php echo e(trans('admin/hardware/table.asset_tag')); ?></th>
                  <th class="col-md-3"><?php echo e(trans('admin/hardware/table.serial')); ?></th>
                  <th class="col-md-3"><?php echo e(trans('general.name')); ?></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $user->assets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td>
                    <?php if($asset->physical=='1'): ?>
                    <?php echo e($asset->model->name); ?>

                    <?php endif; ?>
                  </td>
                  <td><?php echo e($asset->asset_tag); ?></td>
                  <td><?php echo e($asset->serial); ?></td>
                  <td><?php echo e($asset->name); ?></td>
                  <td>
                    <?php if(($asset->image) && ($asset->image!='')): ?>
                      <img src="<?php echo e(url('/')); ?>/uploads/assets/<?php echo e($asset->image); ?>" height="50" width="50">

                    <?php elseif(($asset->model) && ($asset->model->image!='')): ?>
                      <img src="<?php echo e(url('/')); ?>/uploads/models/<?php echo e($asset->model->image); ?>" height="50" width="50">
                    <?php endif; ?>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div> <!-- .table-responsive-->
        <?php else: ?>

        <div class="col-md-12">
          <div class="alert alert-info alert-block">
            <i class="fa fa-info-circle"></i>
            <?php echo e(trans('general.no_results')); ?>

          </div>
        </div>
        <?php endif; ?>
      </div> <!-- .box-body-->
    </div><!--.box.box-default-->
  </div> <!-- .col-md-12-->
</div> <!-- .row-->

<div class="row">
  <div class="col-md-12">
    <div class="box box-default">
      <?php if($user->id): ?>
        <div class="box-header with-border">
          <div class="box-heading">
            <h3 class="box-title"> <?php echo e(trans('admin/users/general.software_user', array('name' => $user->first_name))); ?></h3>
          </div>
        </div><!-- /.box-header -->
      <?php endif; ?>

      <div class="box-body">
        <!-- checked out licenses table -->
        <?php if(count($user->licenses) > 0): ?>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th class="col-md-5"><?php echo e(trans('general.name')); ?></th>
                <th class="col-md-4"><?php echo e(trans('admin/hardware/form.serial')); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $user->licenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $license): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($license->name); ?></td>
                <td>
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewKeys', $license)): ?>
                  <?php echo e(mb_strimwidth($license->serial, 0, 50, "...")); ?>

                  <?php else: ?>
                  ---
                  <?php endif; ?>
                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div> <!-- .table-responsive-->
        <?php else: ?>
        <div class="col-md-12">
          <div class="alert alert-info alert-block">
            <i class="fa fa-info-circle"></i>
            <?php echo e(trans('general.no_results')); ?>

          </div>
        </div>
        <?php endif; ?>
      </div> <!-- .box-body-->
    </div><!--.box.box-default-->
  </div> <!-- .col-md-12-->
</div> <!-- .row-->

<div class="row">
  <div class="col-md-12">
    <div class="box box-default">
      <?php if($user->id): ?>
      <div class="box-header with-border">
        <div class="box-heading">
          <h3 class="box-title"> <?php echo e(trans('general.consumables')); ?> </h3>
        </div>
      </div><!-- /.box-header -->
      <?php endif; ?>

      <div class="box-body">
        <!-- checked out consumables table -->
        <?php if(count($user->consumables) > 0): ?>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th class="col-md-12"><?php echo e(trans('general.name')); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $user->consumables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consumable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($consumable->name); ?></td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
        <?php else: ?>
        <div class="col-md-12">
            <div class="alert alert-info alert-block">
                <i class="fa fa-info-circle"></i>
                <?php echo e(trans('general.no_results')); ?>

            </div>
        </div>
        <?php endif; ?>

      </div> <!-- .box-body-->
    </div><!--.box.box-default-->
  </div> <!-- .col-md-12-->
</div> <!-- .row-->

<div class="row">
  <div class="col-md-12">
    <div class="box box-default">

      <?php if($user->id): ?>
      <div class="box-header with-border">
        <div class="box-heading">
          <h3 class="box-title"> <?php echo e(trans('general.accessories')); ?></h3>
        </div>
      </div><!-- /.box-header -->
      <?php endif; ?>

      <div class="box-body">
        <!-- checked out licenses table -->
        <?php if(count($user->accessories) > 0): ?>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th class="col-md-12">Name</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $user->accessories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accessory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($accessory->name); ?></td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
        <?php else: ?>
        <div class="col-md-12">
          <div class="alert alert-info alert-block">
            <i class="fa fa-info-circle"></i>
            <?php echo e(trans('general.no_results')); ?>

          </div>
        </div>
        <?php endif; ?>
       </div> <!-- .box-body-->
    </div><!--.box.box-default-->
  </div> <!-- .col-md-12-->
</div> <!-- .row-->

<div class="row">
  <div class="col-md-12">
    <div class="box box-default">
      <?php if($user->id): ?>
      <div class="box-header with-border">
        <div class="box-heading">
          <h3 class="box-title"> History</h3>
        </div>
      </div><!-- /.box-header -->
      <?php endif; ?>

      <div class="box-body">
        <?php if(count($userlog) > 0): ?>
        <div class="table-responsive">
          <table
                  class="table table-striped snipe-table"
                  name="userActivityReport"
                  id="table"
                  data-cookie="false"
                  data-cookie-id-table="userHistoryTable-<?php echo e(config('version.hash_version')); ?>"
                  data-url="<?php echo e(route('api.activity.index', ['target_id' => $user->id, 'target_type' => 'User', 'order' => 'desc'])); ?>">
            <thead>
            <tr>
              <th data-field="icon" style="width: 40px;" class="hidden-xs" data-formatter="iconFormatter"></th>
              <th class="col-sm-3" data-field="created_at" data-formatter="dateDisplayFormatter"><?php echo e(trans('general.date')); ?></th>
              <th class="col-sm-3" data-field="admin" data-formatter="usersLinkObjFormatter"><?php echo e(trans('general.admin')); ?></th>
              <th class="col-sm-3" data-field="action_type"><?php echo e(trans('general.action')); ?></th>
              <th class="col-sm-3" data-field="item" data-formatter="polymorphicItemFormatter"><?php echo e(trans('general.item')); ?></th>
            </tr>
            </thead>
            <tbody>

          </table>
        </div> <!--.table-responsive-->

        <?php else: ?>
        <div class="col-md-12">
            <div class="alert alert-info alert-block">
                <i class="fa fa-info-circle"></i>
                <?php echo e(trans('general.no_results')); ?>

            </div>
        </div>
        <?php endif; ?>
      </div> <!-- .box-body-->
    </div><!--.box.box-default-->
  </div> <!-- .col-md-12-->
</div> <!-- .row-->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
  <?php echo $__env->make('partials.bootstrap-table', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>