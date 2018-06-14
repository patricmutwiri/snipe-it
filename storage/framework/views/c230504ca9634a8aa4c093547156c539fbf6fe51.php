<?php $__env->startSection('title'); ?>
    <?php if($item->id): ?>
        <?php echo e($updateText); ?>

    <?php else: ?>
        <?php echo e($createText); ?>

    <?php endif; ?>
##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
<a href="<?php echo e(URL::previous()); ?>" class="btn btn-primary pull-right">
    <?php echo e(trans('general.back')); ?></a>
<?php $__env->stopSection(); ?>





<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="box box-default">
            <div class="box-header with-border">
            <h3 class="box-title">
            <?php if($item->id): ?>
            <?php echo e($item->display_name); ?>

            <?php endif; ?>
            </h3>
                <?php if(isset($helpText)): ?>
                    <div class="box-tools pull-right">
                        <button class="slideout-menu-toggle btn btn-box-tool btn-box-tool-lg" data-toggle="tooltip" title="Help"><i class="fa fa-question"></i></button>
                    </div>
                <?php endif; ?>
            </div><!-- /.box-header -->

            <div class="box-body">
                <form id="create-form" class="form-horizontal" method="post" action="<?php echo e((isset($formAction)) ? $formAction : \Request::url()); ?>" autocomplete="off" role="form" enctype="multipart/form-data">

                    <?php if($item->id): ?>
                    <?php echo e(method_field('PUT')); ?>

                    <?php endif; ?>


                    <!-- CSRF Token -->
                    <?php echo e(csrf_field()); ?>

                    <?php echo $__env->yieldContent('inputFields'); ?>
                    <?php echo $__env->make('partials.forms.edit.submit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </form>
            </div>
        </div>
    </div>

    <?php if((isset($helpText)) && (isset($helpTitle))): ?>
    <div class="slideout-menu">
        <a href="#" class="slideout-menu-toggle pull-right">×</a>
        <h3>
            <?php echo e($helpTitle); ?>

        </h3>
        <p><?php echo e($helpText); ?> </p>
    </div>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>