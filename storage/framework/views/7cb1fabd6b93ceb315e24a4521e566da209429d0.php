<?php $__env->startSection('content'); ?>
<p><?php echo e(trans('mail.hello')); ?> <?php echo e($first_name); ?>,</p>

<p><?php echo e(trans('mail.admin_has_created', ['web' => $snipeSettings->site_name])); ?> </p>

<p>URL: <a href="<?php echo e(url('/')); ?>"><?php echo e(url('/')); ?></a><br>
<?php echo e(trans('mail.login')); ?> <?php echo e($username); ?> <br>
<?php echo e(trans('mail.password')); ?> <?php echo e($password); ?>

</p>

<p><?php echo e(trans('mail.best_regards')); ?></p>

<?php if($snipeSettings->show_url_in_emails=='1'): ?>
    <p><a href="<?php echo e(url('/')); ?>"><?php echo e($snipeSettings->site_name); ?></a></p>
<?php else: ?>
    <p><?php echo e($snipeSettings->site_name); ?></p>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('emails/layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>