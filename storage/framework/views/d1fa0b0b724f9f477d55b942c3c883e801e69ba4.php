<?php $__env->startSection('title'); ?>
    Update Security Settings
    ##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
    <a href="<?php echo e(route('settings.index')); ?>" class="btn btn-default"> <?php echo e(trans('general.back')); ?></a>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>



    <?php echo e(Form::open(['method' => 'POST', 'files' => false, 'autocomplete' => 'off', 'class' => 'form-horizontal', 'role' => 'form' ])); ?>

    <!-- CSRF Token -->
    <?php echo e(csrf_field()); ?>


    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">


            <div class="panel box box-default">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <i class="fa fa-lock"></i> Security
                    </h4>
                </div>
                <div class="box-body">


                    <div class="col-md-11 col-md-offset-1">

                        <!-- Two Factor -->
                        <div class="form-group <?php echo e($errors->has('brand') ? 'error' : ''); ?>">
                            <div class="col-md-3">
                                <?php echo e(Form::label('two_factor_enabled', trans('admin/settings/general.two_factor_enabled_text'))); ?>

                            </div>
                            <div class="col-md-9">

                                <?php echo Form::two_factor_options('two_factor_enabled', Input::old('two_factor_enabled', $setting->two_factor_enabled), 'select2'); ?>

                                <p class="help-block"><?php echo e(trans('admin/settings/general.two_factor_enabled_warning')); ?></p>

                                <?php if(config('app.lock_passwords')): ?>
                                    <p class="help-block"><?php echo e(trans('general.feature_disabled')); ?></p>
                                <?php endif; ?>

                                <?php echo $errors->first('two_factor_enabled', '<span class="alert-msg">:message</span>'); ?>

                            </div>
                        </div>

                        <!-- Min characters -->
                        <div class="form-group <?php echo e($errors->has('pwd_secure_min') ? 'error' : ''); ?>">
                            <div class="col-md-3">
                                <?php echo e(Form::label('pwd_secure_min', trans('admin/settings/general.pwd_secure_min'))); ?>

                            </div>
                            <div class="col-md-9">
                                <?php echo e(Form::text('pwd_secure_min', Input::old('pwd_secure_min', $setting->pwd_secure_min), array('class' => 'form-control',  'style'=>'width: 50px;'))); ?>


                                <?php echo $errors->first('pwd_secure_min', '<span class="alert-msg">:message</span>'); ?>

                                <p class="help-block">
                                    <?php echo e(trans('admin/settings/general.pwd_secure_min_help')); ?>

                                </p>


                            </div>
                        </div>


                        <!-- Common Passwords -->
                        <div class="form-group <?php echo e($errors->has('pwd_secure_uncommon') ? 'error' : ''); ?>">
                            <div class="col-md-3">
                                <?php echo e(Form::label('pwd_secure_text',
                                              trans('admin/settings/general.pwd_secure_uncommon'))); ?>


                            </div>
                            <div class="col-md-9">
                                <?php echo e(Form::checkbox('pwd_secure_uncommon', '1', Input::old('pwd_secure_uncommon', $setting->pwd_secure_uncommon),array('class' => 'minimal'))); ?>

                                <?php echo e(Form::label('pwd_secure_uncommon',  trans('general.yes'))); ?>

                                <?php echo $errors->first('pwd_secure_uncommon', '<span class="alert-msg">:message</span>'); ?>

                                <p class="help-block">
                                    <?php echo e(trans('admin/settings/general.pwd_secure_uncommon_help')); ?>

                                </p>
                            </div>
                        </div>
                        <!-- /.form-group -->

                        <!-- Common Passwords -->
                        <div class="form-group">
                            <div class="col-md-3">
                                <?php echo e(Form::label('pwd_secure_complexity', trans('admin/settings/general.pwd_secure_complexity'))); ?>

                            </div>
                            <div class="col-md-9">

                                <?php echo e(Form::checkbox("pwd_secure_complexity['letters']", 'letters', Input::old('pwd_secure_uncommon', strpos($setting->pwd_secure_complexity, 'letters')!==false), array('class' => 'minimal'))); ?>

                                Require at least one letter <br>

                                <?php echo e(Form::checkbox("pwd_secure_complexity['numbers']", 'numbers', Input::old('pwd_secure_uncommon', strpos($setting->pwd_secure_complexity, 'numbers')!==false), array('class' => 'minimal'))); ?>

                                Require at least one number<br>

                                <?php echo e(Form::checkbox("pwd_secure_complexity['symbols']", 'symbols', Input::old('pwd_secure_uncommon', strpos($setting->pwd_secure_complexity, 'symbols')!==false), array('class' => 'minimal'))); ?>

                                Require at least one symbol<br>

                                <?php echo e(Form::checkbox("pwd_secure_complexity['case_diff']", 'case_diff', Input::old('pwd_secure_uncommon', strpos($setting->pwd_secure_complexity, 'case_diff')!==false), array('class' => 'minimal'))); ?>

                                Require at least one uppercase and one lowercase

                                <p class="help-block">
                                    <?php echo e(trans('admin/settings/general.pwd_secure_complexity_help')); ?>

                                </p>
                            </div>
                        </div>
                        <!-- /.form-group -->


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