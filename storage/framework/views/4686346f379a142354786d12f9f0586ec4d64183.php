<?php $__env->startSection('title'); ?>
    <?php echo e($statuslabel->name); ?> <?php echo e(trans('general.assets')); ?>

    ##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <?php echo e(Form::open([
                      'method' => 'POST',
                      'route' => ['hardware/bulkedit'],
                      'class' => 'form-inline',
                       'id' => 'bulkForm'])); ?>

                    <div class="row">
                        <div class="col-md-12">
                            <?php if(Input::get('status')!='Deleted'): ?>
                                <div id="toolbar">
                                    <select name="bulk_actions" class="form-control select2">
                                        <option value="edit">Edit</option>
                                        <option value="delete">Delete</option>
                                        <option value="labels">Generate Labels</option>
                                    </select>
                                    <button class="btn btn-default" id="bulkEdit" disabled>Go</button>
                                </div>
                            <?php endif; ?>

                            <table
                                    name="assets"
                                    
                                    data-toolbar="#toolbar"
                                    class="table table-striped snipe-table"
                                    id="table"
                                    data-advanced-search="true"
                                    data-id-table="advancedTable"
                                    data-url="<?php echo e(route('api.assets.index',
                                      array('status_id'=>$statuslabel->id))); ?>"
                                    data-click-to-select="true"
                                    data-cookie-id-table="<?php echo e(e(Input::get('status'))); ?>assetTable-<?php echo e(config('version.hash_version')); ?>">
                            </table>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <?php echo e(Form::close()); ?>

                </div><!-- ./box-body -->
            </div><!-- /.box -->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
    <?php echo $__env->make('partials.bootstrap-table', [
        'exportFile' => 'assets-export',
        'search' => true,
        'columns' => \App\Presenters\AssetPresenter::dataTableLayout()
    ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>