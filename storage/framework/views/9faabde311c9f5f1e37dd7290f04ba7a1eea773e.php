<?php $__env->startSection('title'); ?>
<?php echo e(trans('admin/statuslabels/table.title')); ?>

##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
<a href="<?php echo e(route('statuslabels.create')); ?>" class="btn btn-primary pull-right">
<?php echo e(trans('general.create')); ?></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-9">
    <div class="box box-default">
      <div class="box-body">
        <div class="table-responsive">

          <table
          name="statuslabels"
          id="table"
          class="snipe-table"
          data-url="<?php echo e(route('api.statuslabels.index')); ?>"
          data-cookie="true"
          data-click-to-select="true"
          data-cookie-id-table="statuslabelsTable-<?php echo e(config('version.hash_version')); ?>">
            <thead>
              <tr>
                <th data-sortable="true" data-field="id" data-visible="false"><?php echo e(trans('general.id')); ?></th>
                <th data-sortable="true" data-field="name" data-formatter="statuslabelsAssetLinkFormatter"><?php echo e(trans('admin/statuslabels/table.name')); ?></th>
                <th data-sortable="false" data-field="type" data-formatter="statusLabelTypeFormatter"><?php echo e(trans('admin/statuslabels/table.status_type')); ?></th>
                  <th data-sortable="true" data-field="assets_count"><?php echo e(trans('general.assets')); ?></th>
                <th data-sortable="false" data-field="color" data-formatter="colorSqFormatter"><?php echo e(trans('admin/statuslabels/table.color')); ?></th>
                <th class="text-center" data-sortable="true" data-field="show_in_nav" data-formatter="trueFalseFormatter"><?php echo e(trans('admin/statuslabels/table.show_in_nav')); ?></th>
                <th data-switchable="false" data-formatter="statuslabelsActionsFormatter" data-searchable="false" data-sortable="false" data-field="actions"><?php echo e(trans('table.actions')); ?></th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- side address column -->
  <div class="col-md-3">
    <h4><?php echo e(trans('admin/statuslabels/table.about')); ?></h4>
    <p><?php echo e(trans('admin/statuslabels/table.info')); ?></p>

      <div class="box box-success">
          <div class="box-body">
          <p><i class="fa fa-circle text-green"></i> <strong><?php echo e(trans('admin/statuslabels/table.deployable')); ?></strong>: <?php echo trans('admin/statuslabels/message.help.deployable'); ?></p>
          </div>
      </div>

      <div class="box box-warning">
          <div class="box-body">
              <p><i class="fa fa-circle text-orange"></i> <strong>Pending</strong>: <?php echo e(trans('admin/statuslabels/message.help.pending')); ?></p>
          </div>
      </div>
      <div class="box box-danger">
          <div class="box-body">
            <p><i class="fa fa-times text-red"></i> <strong>Undeployable</strong>: <?php echo e(trans('admin/statuslabels/message.help.undeployable')); ?></p>
          </div>
      </div>

      <div class="box box-danger">
          <div class="box-body">
              <p><i class="fa fa-times text-red"></i> <strong>Archived</strong>: <?php echo e(trans('admin/statuslabels/message.help.archived')); ?></p>
          </div>
      </div>

  </div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
<?php echo $__env->make('partials.bootstrap-table', ['exportFile' => 'statuslabels-export', 'search' => true], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <script nonce="<?php echo e(csrf_token()); ?>">
      function colorSqFormatter(value, row) {
          if (value) {
              return '<span class="label" style="background-color: ' + value + ';">&nbsp;</span> ' + value;
          }
      }

      function statuslabelsAssetLinkFormatter(value, row) {
          if ((row) && (row.name)) {
              return '<a href="<?php echo e(url('/')); ?>/hardware/?status_id=' + row.id + '"> ' + row.name + '</a>';
          }
      }

      function statusLabelTypeFormatter (row, value) {
          switch (value.type) {
              case 'deployed':
                  text_color = 'blue';
                  icon_style = 'fa-circle';
                  break;
              case 'deployable':
                  text_color = 'green';
                  icon_style = 'fa-circle';
                  break;
              case 'pending':
                  text_color = 'orange';
                  icon_style = 'fa-circle';
                  break;
              default:
                  text_color = 'red';
                  icon_style = 'fa-times';
          }

          var typename_lower = value.type;
          var typename = typename_lower.charAt(0).toUpperCase() + typename_lower.slice(1);
          return '<i class="fa ' + icon_style + ' text-' + text_color + '"></i> ' + typename;


      }
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>