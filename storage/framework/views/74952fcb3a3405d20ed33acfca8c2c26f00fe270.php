<?php $__env->startSection('title'); ?>
	<?php if($user->id): ?>
		<?php echo e(trans('admin/users/table.updateuser')); ?>

		<?php echo e($user->present()->fullName()); ?>

	<?php else: ?>
		<?php echo e(trans('admin/users/table.createuser')); ?>

	<?php endif; ?>

##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
<a href="<?php echo e(URL::previous()); ?>" class="btn btn-primary pull-right">
  <?php echo e(trans('general.back')); ?></a>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<style>
    .form-horizontal .control-label {
      padding-top: 0px;
    }

    input[type='text'][disabled], input[disabled], textarea[disabled], input[readonly], textarea[readonly], .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
      background-color: white;
      color: #555555;
      cursor:text;
    }
    table.permissions {
      display:flex;
      flex-direction: column;
    }

    .permissions.table > thead, .permissions.table > tbody {
      margin: 15px;
      margin-top: 0px;
    }
    .permissions.table > tbody+tbody {

    }
    .header-row {
      border-bottom: 1px solid #ccc;
    }

    .header-row h3 {
      margin:0px;
    }
    .permissions-row {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
    }
    .table > tbody > tr > td.permissions-item {
      padding: 1px;
      padding-left: 8px;
    }

    .header-name {
      cursor: pointer;
    }

</style>

<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <form class="form-horizontal" method="post" autocomplete="off" action="<?php echo e(($user) ? route('users.update', ['user' => $user->id]) : route('users.store')); ?>" id="userForm">
      <?php echo e(csrf_field()); ?>


      <?php if($user->id): ?>
          <?php echo e(method_field('PUT')); ?>

      <?php endif; ?>
        <!-- Custom Tabs -->
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab_1" data-toggle="tab">Information</a></li>
          <li><a href="#tab_2" data-toggle="tab">Permissions</a></li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            <div class="row">
              <div class="col-md-12">
                <!-- First Name -->
                <div class="form-group <?php echo e($errors->has('first_name') ? 'has-error' : ''); ?>">
                  <label class="col-md-3 control-label" for="first_name"><?php echo e(trans('general.first_name')); ?></label>
                  <div class="col-md-8 <?php echo e((\App\Helpers\Helper::checkIfRequired($user, 'first_name')) ? ' required' : ''); ?>">
                    <input class="form-control" type="text" name="first_name" id="first_name" value="<?php echo e(Input::old('first_name', $user->first_name)); ?>" />
                    <?php echo $errors->first('first_name', '<span class="alert-msg">:message</span>'); ?>

                  </div>
                </div>

                <!-- Last Name -->
                <div class="form-group <?php echo e($errors->has('last_name') ? 'has-error' : ''); ?>">
                  <label class="col-md-3 control-label" for="last_name"><?php echo e(trans('general.last_name')); ?> </label>
                  <div class="col-md-8<?php echo e((\App\Helpers\Helper::checkIfRequired($user, 'last_name')) ? ' required' : ''); ?>">
                    <input class="form-control" type="text" name="last_name" id="last_name" value="<?php echo e(Input::old('last_name', $user->last_name)); ?>" />
                    <?php echo $errors->first('last_name', '<span class="alert-msg">:message</span>'); ?>

                  </div>
                </div>

                <!-- Username -->
                <div class="form-group <?php echo e($errors->has('username') ? 'has-error' : ''); ?>">
                  <label class="col-md-3 control-label" for="username"><?php echo e(trans('admin/users/table.username')); ?></label>
                  <div class="col-md-8<?php echo e((\App\Helpers\Helper::checkIfRequired($user, 'username')) ? ' required' : ''); ?>">
                    <?php if($user->ldap_import!='1'): ?>
                      <input
                        class="form-control"
                        type="text"
                        name="username"
                        id="username"
                        value="<?php echo e(Input::old('username', $user->username)); ?>"
                        autocomplete="off"
                        readonly
                        onfocus="this.removeAttribute('readonly');"
                        <?php echo e(((config('app.lock_passwords') && ($user->id)) ? ' disabled' : '')); ?>

                      >
                      <?php if(config('app.lock_passwords') && ($user->id)): ?>
                        <p class="help-block"><?php echo e(trans('admin/users/table.lock_passwords')); ?></p>
                      <?php endif; ?>
                    <?php else: ?>
                      (Managed via LDAP)
                          <input type="hidden" name="username" value="<?php echo e(Input::old('username', $user->username)); ?>">

                    <?php endif; ?>

                    <?php echo $errors->first('username', '<span class="alert-msg">:message</span>'); ?>

                  </div>
                </div>

                <!-- Password -->
                <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                  <label class="col-md-3 control-label" for="password">
                    <?php echo e(trans('admin/users/table.password')); ?>

                  </label>
                  <div class="col-md-5<?php echo e((\App\Helpers\Helper::checkIfRequired($user, 'password')) ? ' required' : ''); ?>">
                    <?php if($user->ldap_import!='1'): ?>
                      <input
                        type="password"
                        name="password"
                        class="form-control"
                        id="password"
                        value=""
                        autocomplete="off"
                        readonly
                        onfocus="this.removeAttribute('readonly');"
                        <?php echo e(((config('app.lock_passwords') && ($user->id)) ? ' disabled' : '')); ?>>
                    <?php else: ?>
                      (Managed via LDAP)
                    <?php endif; ?>
                    <span id="generated-password"></span>
                    <?php echo $errors->first('password', '<span class="alert-msg">:message</span>'); ?>

                  </div>
                  <div class="col-md-4">
                    <?php if($user->ldap_import!='1'): ?>
                      <a href="#" class="left" id="genPassword">Generate</a>
                    <?php endif; ?>
                  </div>
                </div>

                <?php if($user->ldap_import!='1'): ?>
                <!-- Password Confirm -->
                <div class="form-group <?php echo e($errors->has('password_confirm') ? 'has-error' : ''); ?>">
                  <label class="col-md-3 control-label" for="password_confirm">
                    <?php echo e(trans('admin/users/table.password_confirm')); ?>

                  </label>
                  <div class="col-md-5 <?php echo e(((\App\Helpers\Helper::checkIfRequired($user, 'first_name')) && (!$user->id)) ? ' required' : ''); ?>">
                    <input
                    type="password"
                    name="password_confirm"
                    id="password_confirm"
                    class="form-control"
                    value=""
                    autocomplete="off"
                    readonly
                    onfocus="this.removeAttribute('readonly');"
                    <?php echo e(((config('app.lock_passwords') && ($user->id)) ? ' disabled' : '')); ?>

                    >
                    <?php if(config('app.lock_passwords') && ($user->id)): ?>
                    <p class="help-block"><?php echo e(trans('admin/users/table.lock_passwords')); ?></p>
                    <?php endif; ?>
                    <?php echo $errors->first('password_confirm', '<span class="alert-msg">:message</span>'); ?>

                  </div>
                </div>
                <?php endif; ?>

                <!-- Email -->
                <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                  <label class="col-md-3 control-label" for="email"><?php echo e(trans('admin/users/table.email')); ?> </label>
                  <div class="col-md-8<?php echo e((\App\Helpers\Helper::checkIfRequired($user, 'email')) ? ' required' : ''); ?>">
                    <input
                      class="form-control"
                      type="text"
                      name="email"
                      id="email"
                      value="<?php echo e(Input::old('email', $user->email)); ?>"
                      <?php echo e(((config('app.lock_passwords') && ($user->id)) ? ' disabled' : '')); ?>

                      autocomplete="off"
                      readonly
                      onfocus="this.removeAttribute('readonly');">
                    <?php if(config('app.lock_passwords') && ($user->id)): ?>
                    <p class="help-block"><?php echo e(trans('admin/users/table.lock_passwords')); ?></p>
                    <?php endif; ?>
                    <?php echo $errors->first('email', '<span class="alert-msg">:message</span>'); ?>

                  </div>
                </div>

                <!-- Company -->
                <?php if(\App\Models\Company::canManageUsersCompanies()): ?>
                    <?php echo $__env->make('partials.forms.edit.company-select', ['translated_name' => trans('general.select_company'), 'fieldname' => 'company_id'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>

                <!-- language -->
                <div class="form-group <?php echo e($errors->has('locale') ? 'has-error' : ''); ?>">
                  <label class="col-md-3 control-label" for="locale"><?php echo e(trans('general.language')); ?></label>
                  <div class="col-md-8">
                    <?php echo Form::locales('locale', Input::old('locale', $user->locale), 'select2'); ?>

                    <?php echo $errors->first('locale', '<span class="alert-msg">:message</span>'); ?>

                  </div>
                </div>

                <!-- Employee Number -->
                <div class="form-group <?php echo e($errors->has('employee_num') ? 'has-error' : ''); ?>">
                  <label class="col-md-3 control-label" for="employee_num"><?php echo e(trans('admin/users/table.employee_num')); ?></label>
                  <div class="col-md-8">
                    <input
                      class="form-control"
                      type="text"
                      name="employee_num"
                      id="employee_num"
                      value="<?php echo e(Input::old('employee_num', $user->employee_num)); ?>"
                    />
                    <?php echo $errors->first('employee_num', '<span class="alert-msg">:message</span>'); ?>

                  </div>
                </div>


                <!-- Jobtitle -->
                <div class="form-group <?php echo e($errors->has('jobtitle') ? 'has-error' : ''); ?>">
                  <label class="col-md-3 control-label" for="jobtitle"><?php echo e(trans('admin/users/table.title')); ?></label>
                  <div class="col-md-8">
                    <input
                      class="form-control"
                      type="text"
                      name="jobtitle"
                      id="jobtitle"
                      value="<?php echo e(Input::old('jobtitle', $user->jobtitle)); ?>"
                    />
                    <?php echo $errors->first('jobtitle', '<span class="alert-msg">:message</span>'); ?>

                  </div>
                </div>


                <!-- Manager -->
              <?php echo $__env->make('partials.forms.edit.user-select', ['translated_name' => trans('admin/users/table.manager'), 'fieldname' => 'manager_id'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                  <!--  Department -->
              <?php echo $__env->make('partials.forms.edit.department-select', ['translated_name' => trans('general.department'), 'fieldname' => 'department_id'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


                  <!-- Location -->
              <?php echo $__env->make('partials.forms.edit.location-select', ['translated_name' => trans('general.location'), 'fieldname' => 'location_id'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <!-- Phone -->
                <div class="form-group <?php echo e($errors->has('phone') ? 'has-error' : ''); ?>">
                  <label class="col-md-3 control-label" for="phone"><?php echo e(trans('admin/users/table.phone')); ?></label>
                  <div class="col-md-4">
                    <input class="form-control" type="text" name="phone" id="phone" value="<?php echo e(Input::old('phone', $user->phone)); ?>" />
                    <?php echo $errors->first('phone', '<span class="alert-msg">:message</span>'); ?>

                  </div>
                </div>

                  <!-- Address -->
                  <div class="form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
                      <label class="col-md-3 control-label" for="address"><?php echo e(trans('general.address')); ?></label>
                      <div class="col-md-4">
                          <input class="form-control" type="text" name="address" id="address" value="<?php echo e(Input::old('address', $user->address)); ?>" />
                          <?php echo $errors->first('address', '<span class="alert-msg">:message</span>'); ?>

                      </div>
                  </div>

                  <!-- City -->
                  <div class="form-group<?php echo e($errors->has('city') ? ' has-error' : ''); ?>">
                      <label class="col-md-3 control-label" for="city"><?php echo e(trans('general.city')); ?></label>
                      <div class="col-md-4">
                          <input class="form-control" type="text" name="city" id="city" value="<?php echo e(Input::old('city', $user->city)); ?>" />
                          <?php echo $errors->first('city', '<span class="alert-msg">:message</span>'); ?>

                      </div>
                  </div>

                  <!-- State -->
                  <div class="form-group<?php echo e($errors->has('state') ? ' has-error' : ''); ?>">
                      <label class="col-md-3 control-label" for="state"><?php echo e(trans('general.state')); ?></label>
                      <div class="col-md-4">
                          <input class="form-control" type="text" name="state" id="state" value="<?php echo e(Input::old('state', $user->state)); ?>" maxlength="3" />
                          <?php echo $errors->first('state', '<span class="alert-msg">:message</span>'); ?>

                      </div>
                  </div>

                  <!-- Country -->
                  <div class="form-group<?php echo e($errors->has('country') ? ' has-error' : ''); ?>">
                      <label class="col-md-3 control-label" for="city"><?php echo e(trans('general.country')); ?></label>
                      <div class="col-md-4">
                          <?php echo Form::countries('country', Input::old('country', $user->country), 'select2'); ?>

                          <?php echo $errors->first('country', '<span class="alert-msg">:message</span>'); ?>

                      </div>
                  </div>

                  <!-- Zip -->
                  <div class="form-group<?php echo e($errors->has('zip') ? ' has-error' : ''); ?>">
                      <label class="col-md-3 control-label" for="zip"><?php echo e(trans('general.zip')); ?></label>
                      <div class="col-md-4">
                          <input class="form-control" type="text" name="zip" id="zip" value="<?php echo e(Input::old('zip', $user->zip)); ?>" maxlength="10" />
                          <?php echo $errors->first('zip', '<span class="alert-msg">:message</span>'); ?>

                      </div>
                  </div>



                <!-- Activation Status -->
                <div class="form-group <?php echo e($errors->has('activated') ? 'has-error' : ''); ?>">
                  <label class="col-md-3 control-label" for="activated"><?php echo e(trans('admin/users/table.activated')); ?></label>
                  <div class="col-md-8">
                    <div class="controls">
                      <select
                        <?php echo e(($user->id === Auth::user()->id ? ' disabled="disabled"' : '')); ?>

                        name="activated"
                        id="activated"
                        <?php echo e(((config('app.lock_passwords') && ($user->id)) ? ' disabled' : '')); ?>

                      >
                        <?php if($user->id): ?>
                        <option value="1"<?php echo e(($user->isActivated() ? ' selected="selected"' : '')); ?>><?php echo e(trans('general.yes')); ?></option>
                        <option value="0"<?php echo e(( ! $user->isActivated() ? ' selected="selected"' : '')); ?>><?php echo e(trans('general.no')); ?></option>
                        <?php else: ?>
                        <option value="1"<?php echo e((Input::old('activated') == 1 ? ' selected="selected"' : '')); ?>><?php echo e(trans('general.yes')); ?></option>
                        <option value="0"><?php echo e(trans('general.no')); ?></option>
                        <?php endif; ?>
                      </select>
                      <?php echo $errors->first('activated', '<span class="alert-msg">:message</span>'); ?>

                    </div>
                  </div>
                </div>

                <?php if($snipeSettings->two_factor_enabled!=''): ?>
                  <?php if($snipeSettings->two_factor_enabled=='1'): ?>
                  <div class="form-group">
                    <div class="col-md-3 control-label">
                      <?php echo e(Form::label('two_factor_optin', trans('admin/settings/general.two_factor'))); ?>

                    </div>
                    <div class="col-md-9">
                      <?php echo e(Form::checkbox('two_factor_optin', '1', Input::old('two_factor_optin', $user->two_factor_optin),array('class' => 'minimal'))); ?>

                      <?php echo e(trans('admin/settings/general.two_factor_enabled_text')); ?>


                      <p class="help-block"><?php echo e(trans('admin/users/general.two_factor_admin_optin_help')); ?></p>
                    </div>
                  </div>
                  <?php endif; ?>

                  <!-- Reset Two Factor -->
                  <div class="form-group">
                    <div class="col-md-8 col-md-offset-3 two_factor_resetrow">
                      <a class="btn btn-default btn-sm pull-left" id="two_factor_reset" style="margin-right: 10px;"> <?php echo e(trans('admin/settings/general.two_factor_reset')); ?></a>
                      <span id="two_factor_reseticon">
                      </span>
                      <span id="two_factor_resetresult">
                      </span>
                      <span id="two_factor_resetstatus">
                      </span>
                    </div>
                    <div class="col-md-8 col-md-offset-3 two_factor_resetrow">
                      <p class="help-block"><?php echo e(trans('admin/settings/general.two_factor_reset_help')); ?></p>
                    </div>
                  </div>
                <?php endif; ?>

                <!-- Notes -->
                <div class="form-group<?php echo $errors->has('notes') ? ' has-error' : ''; ?>">
                  <label for="notes" class="col-md-3 control-label"><?php echo e(trans('admin/users/table.notes')); ?></label>
                  <div class="col-md-8">
                    <textarea class="form-control" id="notes" name="notes"><?php echo e(Input::old('notes', $user->notes)); ?></textarea>
                    <?php echo $errors->first('notes', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>'); ?>

                  </div>
                </div>

                  <!-- Groups -->
                  <div class="form-group<?php echo e($errors->has('groups') ? ' has-error' : ''); ?>">
                      <label class="col-md-3 control-label" for="groups"> <?php echo e(trans('general.groups')); ?></label>
                      <div class="col-md-5">

                          <?php if((Config::get('app.lock_passwords') || (!Auth::user()->isSuperUser()))): ?>

                              <?php if(count($userGroups->keys()) > 0): ?>
                                  <ul>
                                      <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <?php echo ($userGroups->keys()->contains($id) ? '<li>'.e($group).'</li>' : ''); ?>

                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </ul>
                              <?php endif; ?>

                              <span class="help-block">Only superadmins may edit group memberships.</p>
                                  <?php else: ?>
                                      <div class="controls">
                        <select
                                name="groups[]"
                                id="groups[]"
                                multiple="multiple"
                                class="form-control">

                            <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($id); ?>"
                                        <?php echo e(($userGroups->keys()->contains($id) ? ' selected="selected"' : '')); ?>>
                                    <?php echo e($group); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        <span class="help-block">
                          <?php echo e(trans('admin/users/table.groupnotes')); ?>

                        </span>
                    </div>
                          <?php endif; ?>

                      </div>
                  </div>


                <!-- Email user -->
                <?php if(!$user->id): ?>
                <div class="form-group">
                  <div class="col-sm-3">
                  </div>
                  <div class="col-sm-9">
                    <div class="checkbox">
                      <label for="email_user">
                        <?php echo e(Form::checkbox('email_user', '1', Input::old('email_user'), array('id'=>'email_user','disabled'=>'disabled'))); ?>

                        Email this user their credentials? <span class="help-text" id="email_user_warn">(Cannot send email. No user email address specified.)</span>
                      </label>
                    </div>
                  </div>
                </div> <!--/form-group-->
                <?php endif; ?>
              </div> <!--/col-md-12-->
            </div>
          </div><!-- /.tab-pane -->

          <div class="tab-pane" id="tab_2">
            <div class="col-md-12">
              <?php if(!Auth::user()->isSuperUser()): ?>
                <p class="alert alert-warning">Only superadmins may grant a user superadmin access.</p>
              <?php endif; ?>
            </div>

            <table class="table table-striped permissions">
              <thead>
                <tr class="permissions-row">
                  <th class="col-md-5"><span class="line"></span>Permission</th>
                  <th class="col-md-1"><span class="line"></span>Grant</th>
                  <th class="col-md-1"><span class="line"></span>Deny</th>
                  <th class="col-md-1"><span class="line"></span>Inherit</th>
                </tr>
              </thead>

              <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area => $permissionsArray): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if(count($permissionsArray) == 1): ?>
              <tbody class="permissions-group">
                <?php $localPermission = $permissionsArray[0]; ?>
                <tr class="header-row permissions-row">
                  <td class="col-md-5 tooltip-base permissions-item"
                    data-toggle="tooltip"
                    data-placement="right"
                    title="<?php echo e($localPermission['note']); ?>">
                    <h4><?php echo e($area . ': ' . $localPermission['label']); ?></h4>
                  </td>

                  <td class="col-md-1 permissions-item">
                    <?php if(($localPermission['permission'] == 'superuser') && (!Auth::user()->isSuperUser())): ?>
                      <?php echo e(Form::radio('permission['.$localPermission['permission'].']', '1',$userPermissions[$localPermission['permission'] ] == '1',['disabled'=>"disabled", 'class'=>'minimal'])); ?>

                    <?php else: ?>
                      <?php echo e(Form::radio('permission['.$localPermission['permission'].']', '1',$userPermissions[$localPermission['permission'] ] == '1',['value'=>"grant", 'class'=>'minimal'])); ?>

                    <?php endif; ?>
                  </td>
                  <td class="col-md-1 permissions-item">
                    <?php if(($localPermission['permission'] == 'superuser') && (!Auth::user()->isSuperUser())): ?>
                      <?php echo e(Form::radio('permission['.$localPermission['permission'].']', '-1',$userPermissions[$localPermission['permission'] ] == '-1',['disabled'=>"disabled", 'class'=>'minimal'])); ?>

                    <?php else: ?>
                      <?php echo e(Form::radio('permission['.$localPermission['permission'].']', '-1',$userPermissions[$localPermission['permission'] ] == '-1',['value'=>"deny", 'class'=>'minimal'])); ?>

                    <?php endif; ?>
                  </td>
                  <td class="col-md-1 permissions-item">
                    <?php if(($localPermission['permission'] == 'superuser') && (!Auth::user()->isSuperUser())): ?>
                      <?php echo e(Form::radio('permission['.$localPermission['permission'].']','0',$userPermissions[$localPermission['permission'] ] == '0',['disabled'=>"disabled",'class'=>'minimal'] )); ?>

                    <?php else: ?>
                      <?php echo e(Form::radio('permission['.$localPermission['permission'].']','0',$userPermissions[$localPermission['permission'] ] == '0',['value'=>"inherit", 'class'=>'minimal'] )); ?>

                    <?php endif; ?>
                  </td>
                </tr>
              </tbody>
              <?php else: ?>
              <tbody class="permissions-group">
                <tr class="header-row permissions-row">
                  <td class="col-md-5 header-name">
                    <h3><?php echo e($area); ?></h3>
                  </td>
                  <td class="col-md-1 permissions-item">
                    <?php echo e(Form::radio("$area", '1',false,['value'=>"grant", 'class'=>'minimal'])); ?>

                  </td>
                  <td class="col-md-1 permissions-item">
                    <?php echo e(Form::radio("$area", '-1',false,['value'=>"deny", 'class'=>'minimal'])); ?>

                  </td>
                  <td class="col-md-1 permissions-item">
                    <?php echo e(Form::radio("$area", '0',false,['value'=>"inherit", 'class'=>'minimal'] )); ?>

                  </td>
                </tr>

                <?php $__currentLoopData = $permissionsArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="permissions-row">
                  <?php if($permission['display']): ?>
                    <td
                      class="col-md-5 tooltip-base permissions-item"
                      data-toggle="tooltip"
                      data-placement="right"
                      title="<?php echo e($permission['note']); ?>">
                      <?php echo e($permission['label']); ?>

                    </td>
                    <td class="col-md-1 permissions-item">
                      <?php if(($permission['permission'] == 'superuser') && (!Auth::user()->isSuperUser())): ?>
                      <?php echo e(Form::radio('permission['.$permission['permission'].']', '1', $userPermissions[$permission['permission'] ] == '1', ["value"=>"grant", 'disabled'=>'disabled', 'class'=>'minimal'])); ?>

                      <?php else: ?>
                      <?php echo e(Form::radio('permission['.$permission['permission'].']', '1', $userPermissions[ $permission['permission'] ] == '1', ["value"=>"grant",'class'=>'minimal'])); ?>

                      <?php endif; ?>
                    </td>
                    <td class="col-md-1 permissions-item">
                      <?php if(($permission['permission'] == 'superuser') && (!Auth::user()->isSuperUser())): ?>
                      <?php echo e(Form::radio('permission['.$permission['permission'].']', '-1', $userPermissions[$permission['permission'] ] == '-1', ["value"=>"deny", 'disabled'=>'disabled', 'class'=>'minimal'])); ?>

                      <?php else: ?>
                      <?php echo e(Form::radio('permission['.$permission['permission'].']', '-1', $userPermissions[$permission['permission'] ] == '-1', ["value"=>"deny",'class'=>'minimal'])); ?>

                      <?php endif; ?>
                    </td>
                    <td class="col-md-1 permissions-item">
                      <?php if(($permission['permission'] == 'superuser') && (!Auth::user()->isSuperUser())): ?>
                      <?php echo e(Form::radio('permission['.$permission['permission'].']', '0', $userPermissions[$permission['permission']] =='0', ["value"=>"inherit", 'disabled'=>'disabled', 'class'=>'minimal'])); ?>

                      <?php else: ?>
                      <?php echo e(Form::radio('permission['.$permission['permission'].']', '0', $userPermissions[$permission['permission']] =='0', ["value"=>"inherit", 'class'=>'minimal'])); ?>

                      <?php endif; ?>
                    </td>
                  <?php endif; ?>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
              <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
          </div><!-- /.tab-pane -->
        </div><!-- /.tab-content -->
        <div class="box-footer text-right">
          <button type="submit" class="btn btn-success"><i class="fa fa-check icon-white"></i> <?php echo e(trans('general.save')); ?></button>
        </div>
      </div><!-- nav-tabs-custom -->
    </form>
  </div> <!--/col-md-8-->
</div><!--/row-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
<script nonce="<?php echo e(csrf_token()); ?>">
$(document).ready(function() {

	$('#email').on('keyup',function(){

	    if(this.value.length > 0){
	        $("#email_user").prop("disabled",false);
			$("#email_user_warn").html("");
	    } else {
	        $("#email_user").prop("disabled",true);
			$("#email_user").prop("checked",false);
	    }

	});
});
</script>

<script nonce="<?php echo e(csrf_token()); ?>">
$('tr.header-row input:radio').on('ifClicked', function () {
    value = $(this).attr('value');
      $(this).parent().parent().parent().siblings().each(function(idx,elem) {
        $(this).find('td input:radio[value='+value+']').iCheck('check');
      })
});

$('.header-name').click(function() {
  $(this).parent().nextUntil('tr.header-row').slideToggle(500);
})
</script>

<script src="<?php echo e(asset('js/pGenerator.jquery.js')); ?>"></script>

<script nonce="<?php echo e(csrf_token()); ?>">


$(document).ready(function(){

    $('.tooltip-base').tooltip({container: 'body'})
    $(".superuser").change(function() {
        var perms = $(this).val();
        if (perms =='1') {
            $("#nonadmin").hide();
        } else {
            $("#nonadmin").show();
        }
    });

    $('#genPassword').pGenerator({
        'bind': 'click',
        'passwordElement': '#password',
        'displayElement': '#generated-password',
        'passwordLength': 16,
        'uppercase': true,
        'lowercase': true,
        'numbers':   true,
        'specialChars': true,
        'onPasswordGenerated': function(generatedPassword) {
			 $('#password_confirm').val($('#password').val());
        }
    });
});

    $("#two_factor_reset").click(function(){
        $("#two_factor_resetrow").removeClass('success');
        $("#two_factor_resetrow").removeClass('danger');
        $("#two_factor_resetstatus").html('');
        $("#two_factor_reseticon").html('<i class="fa fa-spinner spin"></i>');
        $.ajax({
            url: '<?php echo e(route('api.users.two_factor_reset', ['id'=> $user->id])); ?>',
            type: 'POST',
            data: {},
            dataType: 'json',

            success: function (data) {
                $("#two_factor_reseticon").html('');
                $("#two_factor_resetstatus").html('<i class="fa fa-check text-success"></i>' + data.message);
            },

            error: function (data) {
                $("#two_factor_reseticon").html('');
                $("#two_factor_reseticon").html('<i class="fa fa-exclamation-triangle text-danger"></i>');
                $('#two_factor_resetstatus').text(data.message);
            }


        });
    });



</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>