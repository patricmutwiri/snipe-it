<?php $__env->startSection('title'); ?>

  <?php if(Input::get('status')=='deleted'): ?>
    <?php echo e(trans('admin/models/general.view_deleted')); ?>

    <?php echo e(trans('admin/models/table.title')); ?>

    <?php else: ?>
    <?php echo e(trans('admin/models/general.view_models')); ?>

  <?php endif; ?>
##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header_right'); ?>
  <a href="<?php echo e(route('models.create')); ?>" class="btn btn-primary pull-right"></i> <?php echo e(trans('general.create')); ?></a>

  <?php if(Input::get('status')=='deleted'): ?>
    <a class="btn btn-default pull-right" href="<?php echo e(route('models.index')); ?>" style="margin-right: 5px;"><?php echo e(trans('admin/models/general.view_models')); ?></a>
  <?php else: ?>
    <a class="btn btn-default pull-right" href="<?php echo e(route('models.index', ['status' => 'deleted'])); ?>" style="margin-right: 5px;"><?php echo e(trans('admin/models/general.view_deleted')); ?></a>
  <?php endif; ?>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>


<div class="row">
  <div class="col-md-12">
    <div class="box box-default">
      <div class="box-body">
        <?php echo e(Form::open([
          'method' => 'POST',
          'route' => ['models.bulkedit.index'],
          'class' => 'form-inline',
           'id' => 'bulkForm'])); ?>

        <div class="row">
          <div class="col-md-12">

            <?php if(Input::get('status')!='deleted'): ?>
              <div id="toolbar">
                <select name="bulk_actions" class="form-control select2" style="width: 300px;">
                  <option value="edit">Bulk Edit</option>
                </select>
                <button class="btn btn-primary" id="bulkEdit" disabled>Go</button>
              </div>
            <?php endif; ?>



        <table
        name="models"
        class="table table-striped snipe-table"
        id="table"
        data-url="<?php echo e(route('api.models.index', ['status'=> e(Input::get('status'))])); ?>"
        data-cookie="true"
        data-click-to-select="true"
        data-cookie-id-table="modelsTable-<?php echo e(config('version.hash_version')); ?>">
          <thead>
            <tr>
              <th data-checkbox="true" data-field="checkbox"></th>
              <th data-sortable="true" data-field="id" data-visible="false"><?php echo e(trans('general.id')); ?></th>
              <th data-sortable="true" data-field="name" data-formatter="modelsLinkFormatter"><?php echo e(trans('general.name')); ?></th>
              <th data-sortable="true" data-field="image" data-formatter="imageFormatter" data-visible="false"><?php echo e(trans('admin/hardware/table.image')); ?></th>
              <th data-sortable="true" data-field="manufacturer" data-formatter="manufacturersLinkObjFormatter"><?php echo e(trans('general.manufacturer')); ?></th>
              <th data-sortable="true" data-field="model_number"><?php echo e(trans('admin/models/table.modelnumber')); ?></th>
              <th data-sortable="false" data-field="assets_count"><?php echo e(trans('admin/models/table.numassets')); ?></th>
              <th data-sortable="false" data-field="depreciation" data-formatter="depreciationsLinkObjFormatter"><?php echo e(trans('general.depreciation')); ?></th>
              <th data-sortable="false" data-field="category" data-formatter="categoriesLinkObjFormatter"><?php echo e(trans('general.category')); ?></th>
              <th data-sortable="true" data-field="eol"><?php echo e(trans('general.eol')); ?></th>
              <th data-sortable="false" data-field="fieldset" data-formatter="fieldsetsLinkObjFormatter"><?php echo e(trans('admin/models/general.fieldset')); ?></th>
              <th data-sortable="true" data-field="notes"><?php echo e(trans('general.notes')); ?></th>
              <th data-switchable="false" data-formatter="modelsActionsFormatter" data-searchable="false" data-sortable="false" data-field="actions"><?php echo e(trans('table.actions')); ?></th>
            </tr>
          </thead>
        </table>
              <?php echo e(Form::close()); ?>

          </div>
        </div>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
<?php echo $__env->make('partials.bootstrap-table', ['exportFile' => 'models-export', 'search' => true], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>