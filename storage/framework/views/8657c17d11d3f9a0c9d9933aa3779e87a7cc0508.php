<?php $__env->startSection('title'); ?>
Create a User ::
##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="col-lg-12" style="padding-top: 20px;">
    <?php if(trim($output)=='Nothing to migrate.'): ?>
    <div class="col-md-12">
        <div class="alert alert-warning">
            <i class="fa fa-warning"></i>
            There was nothing to migrate. Your database tables were already set up!
        </div>
    </div>
    <?php else: ?>
    <div class="col-md-12">
        <div class="alert alert-success">
            <i class="fa fa-check"></i>
            Your database tables have been created
        </div>
    </div>

    <?php endif; ?>

    <p>Migration output: </p>
    <pre><?php echo e($output); ?></pre>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('button'); ?>
  <form action="<?php echo e(route('setup.user')); ?>" method="GET">
    <button class="btn btn-primary">Next: Create User</button>
  </form>
##parent-placeholder-7b7fcc78d6cd1507925b769b1386ced3683f99c7##
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/setup', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>