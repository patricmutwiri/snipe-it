<?php $__env->startSection('content'); ?>

    <form role="form" action="<?php echo e(url('/login')); ?>" method="POST" autocomplete="false">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />

        <!-- this is a hack to prevent Chrome from trying to autocomplete fields -->
        <input type="text" name="prevent_autofill" id="prevent_autofill" value="" style="display:none;" />
        <input type="password" name="password_fake" id="password_fake" value="" style="display:none;" />

        <div class="container">
            <div class="row">

                <div class="col-md-4 col-md-offset-4">

                    <div class="box login-box">
                        <div class="box-header">
                            <h3 class="box-title"> <?php echo e(trans('auth/general.login_prompt')); ?></h3>
                        </div>


                        <div class="login-box-body">
                            <div class="row">

                                <?php if($snipeSettings->login_note): ?>
                                    <div class="col-md-12">
                                        <div class="alert alert-info">
                                            <?php echo Parsedown::instance()->text(e($snipeSettings->login_note)); ?>

                                        </div>
                                    </div>
                                <?php endif; ?>

                                <!-- Notifications -->
                                <?php echo $__env->make('notifications', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                                <div class="col-md-12">
                                    <!-- CSRF Token -->


                                    <fieldset>
                                        <div class="form-group<?php echo e($errors->has('username') ? ' has-error' : ''); ?>">
                                            <input class="form-control" placeholder="<?php echo e(trans('admin/users/table.username')); ?>" name="username" type="text"  autocomplete="off" autofocus>
                                            <?php echo $errors->first('username', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>'); ?>

                                        </div>
                                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                            <input class="form-control" placeholder="<?php echo e(trans('admin/users/table.password')); ?>" name="password" type="password" autocomplete="off">
                                            <?php echo $errors->first('password', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>'); ?>

                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input name="remember" type="checkbox" value="Remember Me"><?php echo e(trans('auth/general.remember_me')); ?>

                                            </label>
                                        </div>
                                    </fieldset>
                                </div> <!-- end col-md-12 -->

                            </div> <!-- end row -->
                        </div>
                        <div class="box-footer">
                            <button class="btn btn-lg btn-primary btn-block"><?php echo e(trans('auth/general.login')); ?></button>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 text-right" style="padding-top: 10px;">
                            <?php if($snipeSettings->custom_forgot_pass_url): ?>
                                <a href="<?php echo e($snipeSettings->custom_forgot_pass_url); ?>" rel="noopener"><?php echo e(trans('auth/general.forgot_password')); ?></a>
                            <?php else: ?>
                                <a href="<?php echo e(route('password.request')); ?>"><?php echo e(trans('auth/general.forgot_password')); ?></a>
                            <?php endif; ?>


                        </div>
                    </div> <!-- end login box -->

                </div> <!-- col-md-4 -->

            </div> <!-- end row -->
        </div> <!-- end container -->
    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/basic', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>