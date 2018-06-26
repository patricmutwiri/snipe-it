<?php $__env->startSection('title'); ?>
    Update Slack Settings
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
                        <i class="fa fa-slack"></i> Slack
                    </h4>
                </div>
                <div class="box-body">


                    <div class="col-md-11 col-md-offset-1">

                        <p class="help-block"><?php echo trans('admin/settings/general.slack_integration_help',array('slack_link' => 'https://my.slack.com/services/new/incoming-webhook')); ?></p>

                        <!-- slack endpoint -->
                        <div class="form-group <?php echo e($errors->has('slack_endpoint') ? 'error' : ''); ?>">
                            <div class="col-md-3">
                                <?php echo e(Form::label('slack_endpoint', trans('admin/settings/general.slack_endpoint'))); ?>

                            </div>
                            <div class="col-md-9">
                                <?php if(config('app.lock_passwords')===true): ?>
                                    <?php echo e(Form::text('slack_endpoint', Input::old('slack_endpoint', $setting->slack_endpoint), array('class' => 'form-control','disabled'=>'disabled','placeholder' => 'https://hooks.slack.com/services/XXXXXXXXXXXXXXXXXXXXX'))); ?>

                                <?php else: ?>
                                    <?php echo e(Form::text('slack_endpoint', Input::old('slack_endpoint', $setting->slack_endpoint), array('class' => 'form-control','placeholder' => 'https://hooks.slack.com/services/XXXXXXXXXXXXXXXXXXXXX'))); ?>

                                <?php endif; ?>
                                <?php echo $errors->first('slack_endpoint', '<span class="alert-msg">:message</span>'); ?>

                            </div>
                        </div>

                        <!-- slack channel -->
                        <div class="form-group <?php echo e($errors->has('slack_channel') ? 'error' : ''); ?>">
                            <div class="col-md-3">
                                <?php echo e(Form::label('slack_channel', trans('admin/settings/general.slack_channel'))); ?>

                            </div>
                            <div class="col-md-9">
                                <?php if(config('app.lock_passwords')===true): ?>
                                    <?php echo e(Form::text('slack_channel', Input::old('slack_channel', $setting->slack_channel), array('class' => 'form-control','disabled'=>'disabled','placeholder' => '#IT-Ops'))); ?>

                                <?php else: ?>
                                    <?php echo e(Form::text('slack_channel', Input::old('slack_channel', $setting->slack_channel), array('class' => 'form-control','placeholder' => '#IT-Ops'))); ?>

                                <?php endif; ?>
                                <?php echo $errors->first('slack_channel', '<span class="alert-msg">:message</span>'); ?>

                            </div>
                        </div>

                        <!-- slack botname -->
                        <div class="form-group <?php echo e($errors->has('slack_botname') ? 'error' : ''); ?>">
                            <div class="col-md-3">
                                <?php echo e(Form::label('slack_botname', trans('admin/settings/general.slack_botname'))); ?>

                            </div>
                            <div class="col-md-9">
                                <?php if(config('app.lock_passwords')===true): ?>
                                    <?php echo e(Form::text('slack_botname', Input::old('slack_botname', $setting->slack_botname), array('class' => 'form-control','disabled'=>'disabled','placeholder' => 'Snipe-Bot'))); ?>

                                <?php else: ?>
                                    <?php echo e(Form::text('slack_botname', Input::old('slack_botname', $setting->slack_botname), array('class' => 'form-control','placeholder' => 'Snipe-Bot'))); ?>

                                <?php endif; ?>
                                <?php echo $errors->first('slack_botname', '<span class="alert-msg">:message</span>'); ?>

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