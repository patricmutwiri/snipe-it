<?php $__env->startSection('title'); ?>
  Manage <?php echo e(trans('admin/custom_fields/general.custom_fields')); ?>

##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-9">
    <div class="box box-default">

      <div class="box-header with-border">
        <h3 class="box-title"><?php echo e(trans('admin/custom_fields/general.fieldsets')); ?></h3>
        <div class="box-tools pull-right">
          <a href="<?php echo e(route('fieldsets.create')); ?>" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Create a new fieldset"><?php echo e(trans('admin/custom_fields/general.create_fieldset')); ?></a>
        </div>
      </div><!-- /.box-header -->

      <div class="box-body">
        <table name="fieldsets" id="table" class="table table-responsive table-no-bordered">
          <thead>
            <tr>
              <th><?php echo e(trans('general.name')); ?></th>
              <th><?php echo e(trans('admin/custom_fields/general.qty_fields')); ?></th>
              <th><?php echo e(trans('admin/custom_fields/general.used_by_models')); ?></th>
              <th></th>
            </tr>
          </thead>

          <?php if(isset($custom_fieldsets)): ?>
          <tbody>
            <?php $__currentLoopData = $custom_fieldsets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fieldset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td>
                <?php echo e(link_to_route("fieldsets.show",$fieldset->name,['id' => $fieldset->id])); ?>

              </td>
              <td>
                <?php echo e($fieldset->fields->count()); ?>

              </td>
              <td>
                <?php $__currentLoopData = $fieldset->models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <a href="<?php echo e(route('models.show', $model->id)); ?>" class="label label-default"><?php echo e($model->name); ?></a>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </td>
              <td>
                <?php echo e(Form::open(['route' => array('fieldsets.destroy', $fieldset->id), 'method' => 'delete'])); ?>

                  <?php if($fieldset->models->count() > 0): ?>
                  <button type="submit" class="btn btn-danger btn-sm disabled" disabled><i class="fa fa-trash"></i></button>
                  <?php else: ?>
                  <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                  <?php endif; ?>
                <?php echo e(Form::close()); ?>

              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
          <?php endif; ?>
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box.box-default -->

  </div> <!-- .col-md-9-->
  <!-- side address column -->
  <div class="col-md-3">
    <h4><?php echo e(trans('admin/custom_fields/general.about_fieldsets_title')); ?></h4>
    <p><?php echo e(trans('admin/custom_fields/general.about_fieldsets_text')); ?> </p>
  </div>
</div> <!-- .row-->

<div class="row">
  <div class="col-md-9">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo e(trans('admin/custom_fields/general.custom_fields')); ?></h3>
        <div class="box-tools pull-right">
          <a href="<?php echo e(route('fields.create')); ?>" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Create a new custom field"><?php echo e(trans('admin/custom_fields/general.create_field')); ?></a>
        </div>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table name="fieldsets" id="table" class="table table-responsive table-no-bordered">
          <thead>
            <tr>
              <th><?php echo e(trans('general.name')); ?></th>
              <th>Help Text</th>
              <th>DB Field</th>
              <th><?php echo e(trans('admin/custom_fields/general.field_format')); ?></th>
              <th><?php echo e(trans('admin/custom_fields/general.field_element_short')); ?></th>
              <th><?php echo e(trans('admin/custom_fields/general.fieldsets')); ?></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $custom_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($field->name); ?></td>
              <td><?php echo e($field->help_text); ?></td>
              <td><?php echo e($field->convertUnicodeDbSlug()); ?></td>
              <td><?php echo e($field->format); ?></td>
              <td><?php echo e($field->element); ?></td>
              <td>
                <?php $__currentLoopData = $field->fieldset; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fieldset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <a href="<?php echo e(route('fieldsets.show', $fieldset->id)); ?>" class="label label-default"><?php echo e($fieldset->name); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </td>
              <td>
                <?php echo e(Form::open(array('route' => array('fields.destroy', $field->id), 'method' => 'delete'))); ?>

                <nobr>
                <a href="<?php echo e(route('fields.edit', $field->id)); ?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>


                <?php if($field->fieldset->count()>0): ?>
                <button type="submit" class="btn btn-danger btn-sm disabled" disabled><i class="fa fa-trash"></i></button>
                <?php else: ?>
                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                <?php endif; ?>
                <?php echo e(Form::close()); ?>

                </nobr>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div> <!-- /.col-md-9-->
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>