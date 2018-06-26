<?php $__env->startSection('title'); ?>
    Update Branding Settings
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
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="<?php echo e(asset('js/plugins/colorpicker/bootstrap-colorpicker.min.css')); ?>">


    <?php echo e(Form::open(['method' => 'POST', 'files' => true, 'autocomplete' => 'off', 'class' => 'form-horizontal', 'role' => 'form' ])); ?>

    <!-- CSRF Token -->
    <?php echo e(csrf_field()); ?>


    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">


            <div class="panel box box-default">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <i class="fa fa-copyright"></i> Branding
                    </h4>
                </div>
                <div class="box-body">


                    <div class="col-md-11 col-md-offset-1">

                        <!-- Site name -->
                        <div class="form-group <?php echo e($errors->has('site_name') ? 'error' : ''); ?>">

                            <div class="col-md-3">
                                <?php echo e(Form::label('site_name', trans('admin/settings/general.site_name'))); ?>

                            </div>
                            <div class="col-md-7">
                                <?php if(config('app.lock_passwords')===true): ?>
                                    <?php echo e(Form::text('site_name', Input::old('site_name', $setting->site_name), array('class' => 'form-control', 'disabled'=>'disabled','placeholder' => 'Snipe-IT Asset Management'))); ?>

                                <?php else: ?>
                                    <?php echo e(Form::text('site_name',
                                        Input::old('site_name', $setting->site_name), array('class' => 'form-control','placeholder' => 'Snipe-IT Asset Management'))); ?>

                                <?php endif; ?>
                                <?php echo $errors->first('site_name', '<span class="alert-msg">:message</span>'); ?>

                            </div>
                        </div>


                        <!-- Logo -->
                        <div class="form-group <?php echo e($errors->has('image') ? 'has-error' : ''); ?>">
                            <div class="col-md-3">
                                <?php echo e(Form::label('logo', trans('admin/settings/general.logo'))); ?>

                            </div>
                            <div class="col-md-9">
                                <?php if(config('app.lock_passwords')): ?>
                                    <p class="help-block"><?php echo e(trans('general.lock_passwords')); ?></p>
                                <?php else: ?>
                                    <?php echo e(Form::file('image')); ?>

                                    <?php echo $errors->first('image', '<span class="alert-msg">:message</span>'); ?>

                                    <?php echo e(Form::checkbox('clear_logo', '1', Input::old('clear_logo'),array('class' => 'minimal'))); ?> Remove
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Branding -->
                        <div class="form-group <?php echo e($errors->has('brand') ? 'error' : ''); ?>">
                            <div class="col-md-3">
                                <?php echo e(Form::label('brand', trans('admin/settings/general.brand'))); ?>

                            </div>
                            <div class="col-md-9">
                                <?php echo Form::select('brand', array('1'=>'Text','2'=>'Logo','3'=>'Logo + Text'), Input::old('brand', $setting->brand), array('class' => 'form-control', 'style'=>'width: 150px ;')); ?>

                                <?php echo $errors->first('brand', '<span class="alert-msg">:message</span>'); ?>

                            </div>
                        </div>
                        <!-- remote load -->
                        <div class="form-group">
                            <div class="col-md-3">
                                <?php echo e(Form::label('show_url_in_emails', trans('admin/settings/general.show_url_in_emails'))); ?>

                            </div>
                            <div class="col-md-9">
                                <?php echo e(Form::checkbox('show_url_in_emails', '1', Input::old('show_url_in_emails', $setting->show_url_in_emails),array('class' => 'minimal'))); ?>

                                <?php echo e(trans('general.yes')); ?>

                                <p class="help-block"><?php echo e(trans('admin/settings/general.show_url_in_emails_help_text')); ?></p>
                            </div>
                        </div>

                        <!-- Header color -->
                        <div class="form-group <?php echo e($errors->has('header_color') ? 'error' : ''); ?>">
                            <div class="col-md-3">
                                <?php echo e(Form::label('header_color', trans('admin/settings/general.header_color'))); ?>

                            </div>
                            <div class="col-md-2">
                                <div class="input-group header-color">
                                    <?php echo e(Form::text('header_color', Input::old('header_color', $setting->header_color), array('class' => 'form-control', 'style' => 'width: 100px;','placeholder' => '#FF0000'))); ?>

                                    <div class="input-group-addon">
                                        <i></i>
                                    </div>
                                </div><!-- /.input group -->
                                <?php echo $errors->first('header_color', '<span class="alert-msg">:message</span>'); ?>

                            </div>
                        </div>

                        <!-- Custom css -->
                        <div class="form-group <?php echo e($errors->has('custom_css') ? 'error' : ''); ?>">
                            <div class="col-md-3">
                                <?php echo e(Form::label('custom_css', trans('admin/settings/general.custom_css'))); ?>

                            </div>
                            <div class="col-md-9">
                                <?php if(config('app.lock_passwords')===true): ?>
                                    <?php echo e(Form::textarea('custom_css', Input::old('custom_css', $setting->custom_css), array('class' => 'form-control','placeholder' => 'Add your custom CSS','disabled'=>'disabled'))); ?>

                                    <?php echo $errors->first('custom_css', '<span class="alert-msg">:message</span>'); ?>

                                    <p class="help-block"><?php echo e(trans('general.lock_passwords')); ?></p>
                                <?php else: ?>
                                    <?php echo e(Form::textarea('custom_css', Input::old('custom_css', $setting->custom_css), array('class' => 'form-control','placeholder' => 'Add your custom CSS'))); ?>

                                    <?php echo $errors->first('custom_css', '<span class="alert-msg">:message</span>'); ?>

                                <?php endif; ?>
                                <p class="help-block"><?php echo e(trans('admin/settings/general.custom_css_help')); ?></p>
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

<?php $__env->startSection('moar_scripts'); ?>
    <!-- bootstrap color picker -->
    <script nonce="<?php echo e(csrf_token()); ?>">
        //color picker with addon
        $(".header-color").colorpicker();
        // toggle the disabled state of asset id prefix
        $('#auto_increment_assets').on('ifChecked', function(){
            $('#auto_increment_prefix').prop('disabled', false).focus();
        }).on('ifUnchecked', function(){
            $('#auto_increment_prefix').prop('disabled', true);
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>