<?php $__env->startSection('title'); ?>
Create a User ::
##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<p> This is the account information you'll use to access the site for the first time. All fields are required. </p>

<form action="<?php echo e(route('setup.user.save')); ?>" method="POST">
  <?php echo e(csrf_field()); ?>


  <div class="col-lg-12" style="padding-top: 20px;">
    <!-- Site Name -->
    <div class="row">
      <div class="form-group col-lg-12 <?php echo e($errors->has('site_name') ? 'error' : ''); ?>">
        <?php echo e(Form::label('site_name', trans('general.site_name'))); ?>

        <?php echo e(Form::text('site_name', Input::old('site_name'), array('class' => 'form-control','placeholder' => 'Snipe-IT Asset Management'))); ?>


        <?php echo $errors->first('site_name', '<span class="alert-msg">:message</span>'); ?>

      </div>
    </div>

    <!-- email domain -->
    <div class="row">
      <div class="form-group col-lg-6 <?php echo e($errors->has('email_domain') ? 'error' : ''); ?>">
        <?php echo e(Form::label('email_domain', trans('general.email_domain'))); ?>

        <?php echo e(Form::text('email_domain', Input::old('email_domain'), array('class' => 'form-control','placeholder' => 'example.com'))); ?>

        <span class="help-block"><?php echo e(trans('general.email_domain_help')); ?></span>

        <?php echo $errors->first('email_domain', '<span class="alert-msg">:message</span>'); ?>

      </div>

      <!-- email format  -->
      <div class="form-group col-lg-6 <?php echo e($errors->has('email_format') ? 'error' : ''); ?>">
        <?php echo e(Form::label('email_format', trans('general.email_format'))); ?>

        <?php echo Form::username_format('email_format', Input::old('email_format', 'filastname'), 'select2'); ?>

        <?php echo $errors->first('email_format', '<span class="alert-msg">:message</span>'); ?>

      </div>
    </div>

    <!-- Name -->
    <div class="row">
      <!-- first name -->
      <div class="form-group col-lg-6 <?php echo e($errors->has('first_name') ? 'error' : ''); ?>">
        <?php echo e(Form::label('first_name', trans('general.first_name'))); ?>

        <?php echo e(Form::text('first_name', Input::old('first_name'), array('class' => 'form-control','placeholder' => 'Jane'))); ?>

        <?php echo $errors->first('first_name', '<span class="alert-msg">:message</span>'); ?>

      </div>

      <!-- last name -->
      <div class="form-group col-lg-6 <?php echo e($errors->has('last_name') ? 'error' : ''); ?>">
        <?php echo e(Form::label('last_name', trans('general.last_name'))); ?>

        <?php echo e(Form::text('last_name', Input::old('last_name'), array('class' => 'form-control','placeholder' => 'Smith'))); ?>

        <?php echo $errors->first('last_name', '<span class="alert-msg">:message</span>'); ?>

      </div>
    </div>

    <div class="row">
      <!-- email-->
      <div class="form-group col-lg-6 <?php echo e($errors->has('email') ? 'error' : ''); ?>">
        <?php echo e(Form::label('email', trans('admin/users/table.email'))); ?>

        <?php echo e(Form::email('email', config('mail.from.address'), array('class' => 'form-control','placeholder' => 'you@example.com'))); ?>

        <?php echo $errors->first('email', '<span class="alert-msg">:message</span>'); ?>

      </div>

      <!-- username -->
      <div class="form-group col-lg-6 <?php echo e($errors->has('username') ? 'error' : ''); ?>">
        <?php echo e(Form::label('username', trans('admin/users/table.username'))); ?>

        <?php echo e(Form::text('username', Input::old('username'), array('class' => 'form-control','placeholder' => 'jsmith'))); ?>

        <?php echo $errors->first('username', '<span class="alert-msg">:message</span>'); ?>

      </div>
    </div>

    <div class="row">
      <!-- password -->
      <div class="form-group col-lg-6 <?php echo e($errors->has('password') ? 'error' : ''); ?>">
        <?php echo e(Form::label('password', trans('admin/users/table.password'))); ?>

        <?php echo e(Form::password('password', array('class' => 'form-control'))); ?>

        <?php echo $errors->first('password', '<span class="alert-msg">:message</span>'); ?>

      </div>

      <!-- password confirm -->
      <div class="form-group col-lg-6 <?php echo e($errors->has('password_confirm') ? 'error' : ''); ?>">
        <?php echo e(Form::label('password_confirmation', trans('admin/users/table.password_confirm'))); ?>

        <?php echo e(Form::password('password_confirm', array('class' => 'form-control'))); ?>

        <?php echo $errors->first('password_confirmation', '<span class="alert-msg">:message</span>'); ?>

      </div>
    </div>

    <!-- Email credentials -->
    <div class="form-group col-lg-12">
      <label>Email credentials</label>
      <div class="checkbox">
        <label>
          <input type="checkbox" value="1" name="email_creds">Email my credentials to the email address above
        </label>
      </div>
    </div>
  </div> <!--/.COL-LG-12-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('button'); ?>
  <button class="btn btn-primary">Next: Save User</button>
</form>
##parent-placeholder-7b7fcc78d6cd1507925b769b1386ced3683f99c7##
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/setup', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>