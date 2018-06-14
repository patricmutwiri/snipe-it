<?php $__env->startSection('content'); ?>

<p><?php echo e(trans('mail.a_user_requested')); ?> <a href="<?php echo e(url('/')); ?>"> <?php echo e($snipeSettings->site_name); ?></a>. </p>

<p><?php echo e(trans('mail.user')); ?> <a href="<?php echo e(route('users.show', $user_id)); ?>"><?php echo e($requested_by); ?></a><br>
   <?php echo e(trans('mail.item')); ?> <a href="<?php echo e($item_url); ?>"><?php echo e($item_name); ?></a> (<?php echo e($item_type); ?>) <br>
   <?php echo e(trans('mail.requested')); ?> <?php echo e($requested_date); ?>

<?php if($item_quantity > 1): ?>
<?php echo e(trans('mail.quantity')); ?> <?php echo e($item_quantity); ?>

<?php endif; ?>

<?php if($snipeSettings->show_url_in_emails=='1'): ?>
    <p><a href="<?php echo e(url('/')); ?>"><?php echo e($snipeSettings->site_name); ?></a></p>
<?php else: ?>
    <p><?php echo e($snipeSettings->site_name); ?></p>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('emails/layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>