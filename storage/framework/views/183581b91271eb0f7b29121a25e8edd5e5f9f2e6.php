<?php $__env->startSection('title'); ?>
    Update Barcode Settings
    ##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
    <a href="<?php echo e(route('settings.index')); ?>" class="btn btn-default"> <?php echo e(trans('general.back')); ?></a>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

    <style>
        .checkbox label {
            padding-right: 40px;
        }
    </style>


    <?php echo e(Form::open(['method' => 'POST', 'files' => false, 'autocomplete' => 'off', 'class' => 'form-horizontal', 'role' => 'form' ])); ?>

    <!-- CSRF Token -->
    <?php echo e(csrf_field()); ?>


    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">


            <div class="panel box box-default">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <i class="fa fa-barcode"></i> Barcodes
                    </h4>
                </div>
                <div class="box-body">


                    <div class="col-md-11 col-md-offset-1">

                    <?php if($is_gd_installed): ?>
                        <!-- qr code -->
                            <div class="form-group">
                                <div class="col-md-3">
                                    <?php echo e(Form::label('qr_code', trans('admin/settings/general.display_qr'))); ?>

                                </div>
                                <div class="col-md-9">
                                    <?php echo e(Form::checkbox('qr_code', '1', Input::old('qr_code', $setting->qr_code),array('class' => 'minimal'))); ?>

                                    <?php echo e(trans('general.yes')); ?>

                                </div>
                            </div>

                            <!-- square barcode type -->
                            <div class="form-group<?php echo e($errors->has('barcode_type') ? ' has-error' : ''); ?>">
                                <div class="col-md-3">
                                    <?php echo e(Form::label('barcode_type', trans('admin/settings/general.barcode_type'))); ?>

                                </div>
                                <div class="col-md-9">
                                    <?php echo Form::barcode_types('barcode_type', Input::old('barcode_type', $setting->barcode_type), 'select2'); ?>

                                    <?php echo $errors->first('barcode_type', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>'); ?>

                                </div>
                            </div>

                            <!-- barcode -->
                            <div class="form-group">
                                <div class="col-md-3">
                                    <?php echo e(Form::label('qr_code', trans('admin/settings/general.display_alt_barcode'))); ?>

                                </div>
                                <div class="col-md-9">
                                    <?php echo e(Form::checkbox('alt_barcode_enabled', '1', Input::old('alt_barcode_enabled', $setting->alt_barcode_enabled),array('class' => 'minimal'))); ?>

                                    <?php echo e(trans('general.yes')); ?>

                                </div>
                            </div>

                            <!-- barcode type -->
                            <div class="form-group<?php echo e($errors->has('alt_barcode') ? ' has-error' : ''); ?>">
                                <div class="col-md-3">
                                    <?php echo e(Form::label('alt_barcode', trans('admin/settings/general.alt_barcode_type'))); ?>

                                </div>
                                <div class="col-md-9">
                                    <?php echo Form::alt_barcode_types('alt_barcode', Input::old('alt_barcode', $setting->alt_barcode), 'select2'); ?>

                                    <?php echo $errors->first('barcode_type', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>'); ?>

                                </div>
                            </div>
                        <?php else: ?>
                            <span class="help-block col-md-offset-3 col-md-12">
                    <?php echo e(trans('admin/settings/general.php_gd_warning')); ?>

                                <br>
                                <?php echo e(trans('admin/settings/general.php_gd_info')); ?>

                  </span>
                    <?php endif; ?>

                    <!-- qr text -->
                        <div class="form-group <?php echo e($errors->has('qr_text') ? 'error' : ''); ?>">
                            <div class="col-md-3">
                                <?php echo e(Form::label('qr_text', trans('admin/settings/general.qr_text'))); ?>

                            </div>
                            <div class="col-md-9">
                                <?php if($setting->qr_code == 1): ?>
                                    <?php echo e(Form::text('qr_text', Input::old('qr_text', $setting->qr_text), array('class' => 'form-control','placeholder' => 'Property of Your Company',
                                    'rel' => 'txtTooltip',
                                    'title' =>'Extra text that you would like to display on your labels. ',
                                    'data-toggle' =>'tooltip',
                                    'data-placement'=>'top'))); ?>

                                    <?php echo $errors->first('qr_text', '<span class="alert-msg">:message</span>'); ?>

                                <?php else: ?>
                                    <?php echo e(Form::text('qr_text', Input::old('qr_text', $setting->qr_text), array('class' => 'form-control', 'disabled'=>'disabled','placeholder' => 'Property of Your Company'))); ?>

                                    <p class="help-block"><?php echo e(trans('admin/settings/general.qr_help')); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>


                    </div>

                </div> <!--/.box-body-->
                <div class="box-footer">
                    <div class="text-left col-md-6">
                        <a class="btn btn-link text-left" href="<?php echo e(route('settings.index')); ?>"><?php echo e(trans('button.cancel')); ?></a>
                    </div>
                    <div class="text-right col-md-6">
                        <button type="submit" class="btn btn-success"><i class="fa fa-check icon-white"></i> <?php echo e(trans('general.save')); ?></button>
                    </div>

                </div>
            </div> <!-- /box -->
        </div> <!-- /.col-md-8-->
    </div> <!-- /.row-->

    <?php echo e(Form::close()); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>