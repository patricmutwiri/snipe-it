<?php $__env->startSection('title'); ?>
<?php echo e(trans('admin/users/general.view_user', array('name' => $user->present()->fullName()))); ?>

##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-12">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs hidden-print">

        <li class="active">
          <a href="#info_tab" data-toggle="tab">
            <span class="hidden-lg hidden-md">
            <i class="fa fa-info-circle"></i>
            </span>
            <span class="hidden-xs hidden-sm"><?php echo e(trans('admin/users/general.info')); ?></span>
          </a>
        </li>

        <li>
          <a href="#asset_tab" data-toggle="tab">
            <span class="hidden-lg hidden-md">
            <i class="fa fa-barcode"></i>
            </span>
            <span class="hidden-xs hidden-sm"><?php echo e(trans('general.assets')); ?></span>
          </a>
        </li>

        <li>
          <a href="#licenses_tab" data-toggle="tab">
            <span class="hidden-lg hidden-md">
            <i class="fa fa-floppy-o"></i>
            </span>
            <span class="hidden-xs hidden-sm"><?php echo e(trans('general.licenses')); ?></span>
          </a>
        </li>

        <li>
          <a href="#accessories_tab" data-toggle="tab">
            <span class="hidden-lg hidden-md">
            <i class="fa fa-keyboard-o"></i>
            </span> <span class="hidden-xs hidden-sm"><?php echo e(trans('general.accessories')); ?></span>
          </a>
        </li>

        <li>
          <a href="#consumables_tab" data-toggle="tab">
            <span class="hidden-lg hidden-md">
            <i class="fa fa-tint"></i></span>
            <span class="hidden-xs hidden-sm"><?php echo e(trans('general.consumables')); ?></span>
          </a>
        </li>

        <li>
          <a href="#files_tab" data-toggle="tab">
            <span class="hidden-lg hidden-md">
            <i class="fa fa-paperclip"></i></span>
            <span class="hidden-xs hidden-sm"><?php echo e(trans('general.file_uploads')); ?></span>
          </a>
        </li>

        <li>
          <a href="#history_tab" data-toggle="tab">
            <span class="hidden-lg hidden-md">
            <i class="fa fa-clock-o"></i></span>
            <span class="hidden-xs hidden-sm"><?php echo e(trans('general.history')); ?></span>
          </a>
        </li>

        <?php if($user->managedLocations()->count() >= 0 ): ?>
        <li>
          <a href="#managed_tab" data-toggle="tab">
            <span class="hidden-lg hidden-md">
            <i class="fa fa-clock-o"></i></span>
            <span class="hidden-xs hidden-sm"><?php echo e(trans('admin/users/table.managed_locations')); ?></span>
          </a>
        </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $user)): ?>
          <li class="dropdown pull-right">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="fa fa-gear"></i> <?php echo e(trans('button.actions')); ?>

              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo e(route('users.edit', $user->id)); ?>"><?php echo e(trans('admin/users/general.edit')); ?></a></li>
              <li><a href="<?php echo e(route('clone/user', $user->id)); ?>"><?php echo e(trans('admin/users/general.clone')); ?></a></li>
              <?php if((Auth::user()->id !== $user->id) && (!config('app.lock_passwords')) && ($user->deleted_at=='')): ?>
                <li><a href="<?php echo e(route('users.destroy', $user->id)); ?>"><?php echo e(trans('button.delete')); ?></a></li>
              <?php endif; ?>
            </ul>
          </li>
        <?php endif; ?>
      </ul>

      <div class="tab-content">
        <div class="tab-pane active" id="info_tab">
          <div class="row">
            <?php if($user->deleted_at!=''): ?>
              <div class="col-md-12">
                <div class="callout callout-warning">
                  <i class="icon fa fa-warning"></i>
                  <?php echo e(trans('admin/users/message.user_deleted_warning')); ?>

                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $user)): ?>
                      <a href="<?php echo e(route('restore/user', $user->id)); ?>"><?php echo e(trans('admin/users/general.restore_user')); ?></a>
                  <?php endif; ?>
                </div>
              </div>
            <?php endif; ?>
            <div class="col-md-1">
              <?php if($user->avatar): ?>
                <img src="/uploads/avatars/<?php echo e($user->avatar); ?>" class="avatar img-thumbnail hidden-print">
              <?php else: ?>
                <img src="<?php echo e($user->present()->gravatar()); ?>" class="avatar img-circle hidden-print">
              <?php endif; ?>
            </div>

            <div class="col-md-8">
              <div class="table table-responsive">
                <table class="table table-striped">
                  <?php if(!is_null($user->company)): ?>
                    <tr>
                        <td><?php echo e(trans('general.company')); ?></td>
                        <td><?php echo e($user->company->name); ?></td>
                    </tr>
                  <?php endif; ?>

                  <tr>
                    <td><?php echo e(trans('admin/users/table.name')); ?></td>
                    <td><?php echo e($user->present()->fullName()); ?></td>
                  </tr>

                  <?php if($user->last_login): ?>
                    <tr>
                      <td><?php echo e(trans('general.last_login')); ?></td>
                      <td><?php echo e(\App\Helpers\Helper::getFormattedDateObject($user->last_login, 'datetime', false)); ?></td>
                    </tr>
                  <?php endif; ?>

                    <?php if(!is_null($user->department)): ?>
                      <tr>
                        <td><?php echo e(trans('general.department')); ?></td>
                        <td><a href="<?php echo e(route('departments.show', $user->department)); ?>"><?php echo e($user->department->name); ?></a></td>
                      </tr>
                    <?php endif; ?>

                  <?php if($user->jobtitle): ?>
                  <tr>
                    <td><?php echo e(trans('admin/users/table.job')); ?></td>
                    <td><?php echo e($user->jobtitle); ?></td>
                  </tr>
                  <?php endif; ?>

                  <?php if($user->employee_num): ?>
                  <tr>
                    <td><?php echo e(trans('admin/users/table.employee_num')); ?></td>
                    <td><?php echo e($user->employee_num); ?></td>
                  </tr>
                  <?php endif; ?>

                  <?php if($user->manager): ?>
                  <tr>
                    <td><?php echo e(trans('admin/users/table.manager')); ?></td>
                    <td>
                      <a href="<?php echo e(route('users.show', $user->manager->id)); ?>"><?php echo e($user->manager->getFullNameAttribute()); ?></a>

                      </td>
                  </tr>
                  <?php endif; ?>

                  <?php if($user->email): ?>
                  <tr>
                    <td><?php echo e(trans('admin/users/table.email')); ?></td>
                    <td><a href="mailto:<?php echo e($user->email); ?>"><?php echo e($user->email); ?></a></td>
                  </tr>
                  <?php endif; ?>

                  <?php if($user->phone): ?>
                  <tr>
                    <td><?php echo e(trans('admin/users/table.phone')); ?></td>
                    <td><?php echo e($user->phone); ?></td>
                  </tr>
                  <?php endif; ?>

                  <?php if($user->userloc): ?>
                  <tr>
                    <td><?php echo e(trans('admin/users/table.location')); ?></td>
                    <td><?php echo e(link_to_route('locations.show', $user->userloc->name, [$user->userloc->id])); ?></td>


                  </tr>
                  <?php endif; ?>
                  <?php if($user->created_at): ?>
                  <tr>
                    <td><?php echo e(trans('general.created_at')); ?></td>
                    <td><?php echo e($user->created_at->format('F j, Y h:iA')); ?></td>
                  </tr>
                  <?php endif; ?>
                </table>
              </div>
            </div> <!--/col-md-8-->

            <!-- Start button column -->
            <div class="col-md-2">
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $user)): ?>
                <div class="col-md-12">
                  <a href="<?php echo e(route('users.edit', $user->id)); ?>" style="width: 100%;" class="btn btn-sm btn-default hidden-print"><?php echo e(trans('admin/users/general.edit')); ?></a>
                </div>
                <div class="col-md-12" style="padding-top: 5px;">
                  <a href="<?php echo e(route('clone/user', $user->id)); ?>" style="width: 100%;" class="btn btn-sm btn-default hidden-print"><?php echo e(trans('admin/users/general.clone')); ?></a>
                </div>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $user)): ?>
                  <?php if($user->deleted_at==''): ?>
                    <div class="col-md-12" style="padding-top: 5px;">
                      <form action="<?php echo e(route('users.destroy',$user->id)); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field("DELETE")); ?>

                        <button style="width: 100%;" class="btn btn-sm btn-warning hidden-print"><?php echo e(trans('button.delete')); ?></button>
                      </form>
                    </div>
                    <div class="col-md-12" style="padding-top: 5px;">
                      <form action="<?php echo e(route('users/bulkedit')); ?>" method="POST">
                        <!-- CSRF Token -->
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                        <input type="hidden" name="ids[<?php echo e($user->id); ?>]" value="<?php echo e($user->id); ?>" />
                        <button style="width: 100%;" class="btn btn-sm btn-danger hidden-print"><?php echo e(trans('button.checkin_and_delete')); ?></button>
                      </form>
                    </div>
                  <?php else: ?>
                    <div class="col-md-12" style="padding-top: 5px;">
                      <a href="<?php echo e(route('restore/user', $user->id)); ?>" style="width: 100%;" class="btn btn-sm btn-warning hidden-print"><?php echo e(trans('button.restore')); ?></a>
                    </div>
                  <?php endif; ?>
                <?php endif; ?>
              <?php endif; ?>
            </div>
            <!-- End button column -->
          </div> <!--/.row-->
        </div><!-- /.tab-pane -->

        <div class="tab-pane" id="asset_tab">
          <!-- checked out assets table -->
          <div class="table-responsive">
            <table class="display table table-striped">
              <thead>
                <tr>
                  <th class="col-md-3"><?php echo e(trans('admin/hardware/table.asset_model')); ?></th>
                  <th class="col-md-2"><?php echo e(trans('admin/hardware/table.asset_tag')); ?></th>
                  <th class="col-md-2"><?php echo e(trans('general.name')); ?></th>
                  <th class="col-md-1 hidden-print"><?php echo e(trans('general.action')); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $user->assets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td>
                    <?php if($asset->physical=='1'): ?>
                      <a href="<?php echo e(route('models.show', $asset->model->id)); ?>"><?php echo e($asset->model->name); ?></a>
                    <?php endif; ?>
                  </td>
                  <td>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $asset)): ?>
                      <a href="<?php echo e(route('hardware.show', $asset->id)); ?>"><?php echo e($asset->asset_tag); ?></a>
                    <?php endif; ?>
                  </td>
                  <td><?php echo $asset->present()->nameUrl(); ?></td>
                  <td class="hidden-print">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('checkin', $asset)): ?>
                      <a href="<?php echo e(route('checkin/hardware', array('assetId'=> $asset->id, 'backto'=>'user'))); ?>" class="btn btn-primary btn-sm hidden-print"><?php echo e(trans('general.checkin')); ?></a>
                    <?php endif; ?>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        </div><!-- /asset_tab -->

        <div class="tab-pane" id="licenses_tab">
          <div class="table-responsive">
            <table class="display table table-hover">
              <thead>
                <tr>
                  <th class="col-md-5"><?php echo e(trans('general.name')); ?></th>
                  <th class="col-md-6"><?php echo e(trans('admin/hardware/form.serial')); ?></th>
                  <th class="col-md-1 hidden-print"><?php echo e(trans('general.action')); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $user->licenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $license): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td>
                    <?php echo $license->present()->nameUrl(); ?>

                  </td>
                  <td>
                    <?php echo $license->present()->serialUrl(); ?>

                  </td>
                  <td class="hidden-print">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $license)): ?>
                      <a href="<?php echo e(route('licenses.checkin', array('licenseseat_id'=> $license->pivot->id, 'backto'=>'user'))); ?>" class="btn btn-primary btn-sm hidden-print"><?php echo e(trans('general.checkin')); ?></a>
                     <?php endif; ?>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
          </table>
          </div>
        </div><!-- /licenses-tab -->

        <div class="tab-pane" id="accessories_tab">
          <div class="table-responsive">
            <table class="display table table-hover">
              <thead>
                <tr>
                  <th class="col-md-5"><?php echo e(trans('general.name')); ?></th>
                  <th class="col-md-1 hidden-print"><?php echo e(trans('general.action')); ?></th>
                </tr>
              </thead>
              <tbody>
                  <?php $__currentLoopData = $user->accessories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accessory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo $accessory->present()->nameUrl(); ?></td>
                    <td class="hidden-print">
                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('checkin', $accessory)): ?>
                        <a href="<?php echo e(route('checkin/accessory', array('accessory_id'=> $accessory->pivot->id, 'backto'=>'user'))); ?>" class="btn btn-primary btn-sm hidden-print"><?php echo e(trans('general.checkin')); ?></a>
                      <?php endif; ?>
                    </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        </div><!-- /accessories-tab -->

        <div class="tab-pane" id="consumables_tab">
          <div class="table-responsive">
            <table class="display table table-striped">
              <thead>
                <tr>
                  <th class="col-md-8"><?php echo e(trans('general.name')); ?></th>
                  <th class="col-md-4"><?php echo e(trans('general.date')); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $user->consumables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consumable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo $consumable->present()->nameUrl(); ?></a></td>
                  <td><?php echo e($consumable->created_at); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
          </table>
          </div>
        </div><!-- /consumables-tab -->

        <div class="tab-pane" id="files_tab">
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <p><?php echo e(trans('admin/hardware/general.filetype_info')); ?></p>
            </div>
            <div class="col-md-2">
              <!-- The fileinput-button span is used to style the file input field as button -->
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $user)): ?>
              <span class="btn btn-info fileinput-button hidden-print">
                <i class="fa fa-plus icon-white"></i>
                <span><?php echo e(trans('button.select_file')); ?></span>
                <!-- The file input field used as target for the file upload widget -->
                <input id="fileupload" type="file" name="file[]" data-url="<?php echo e(route('upload/user', $user->id)); ?>">
              </span>
              <?php endif; ?>
            </div>
            <div class="col-md-4">
              <input id="notes" type="text" name="notes">
            </div>
            <div class="col-md-6" id="progress-container" style="visibility: hidden; padding-bottom: 20px;">
              <!-- The global progress bar -->
              <div class="col-md-11">
                <div id="progress" class="progress progress-striped active" style="margin-top: 8px;">
                  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                      <span id="progress-bar-text">0% <?php echo e(trans('general.complete')); ?></span>
                  </div>
                </div>
              </div>
              <div class="col-md-1">
                  <div class="pull-right progress-checkmark" style="display: none;">
                  </div>
              </div>
            </div>

            <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/lib/jquery.fileupload.css')); ?>">
            <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/lib/jquery.fileupload-ui.css')); ?>">

            <div class="col-md-12 col-sm-12">
              <div class="table-responsive">
                <table class="display table table-striped">
                  <thead>
                    <tr>
                      <th class="col-md-5"><?php echo e(trans('general.notes')); ?></th>
                      <th class="col-md-5"><span class="line"></span><?php echo e(trans('general.file_name')); ?></th>
                      <th class="col-md-2"></th>
                      <th class="col-md-2"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $user->uploads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td>
                        <?php if($file->note): ?>
                        <?php echo e($file->note); ?>

                        <?php endif; ?>
                      </td>
                      <td>
                      <?php echo e($file->filename); ?>

                      </td>
                      <td>
                        <?php if($file->filename): ?>
                        <a href="<?php echo e(route('show/userfile', [$user->id, $file->id])); ?>" class="btn btn-default"><?php echo e(trans('general.download')); ?></a>
                        <?php endif; ?>
                      </td>
                      <td>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $user)): ?>
                        <a class="btn delete-asset btn-danger btn-sm hidden-print" href="<?php echo e(route('userfile.destroy', [$user->id, $file->id])); ?>" data-content="Are you sure you wish to delete this file?" data-title="Delete <?php echo e($file->filename); ?>?"><i class="fa fa-trash icon-white"></i></a>
                        <?php endif; ?>
                      </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div> <!--/ROW-->
        </div><!--/FILES_TAB-->

        <div class="tab-pane" id="history_tab">
          <div class="table-responsive">

            <table
                    class="table table-striped snipe-table"
                    name="userActivityReport"
                    id="table4
                    data-sort-order="desc"
                    data-url="<?php echo e(route('api.activity.index', ['target_id' => $user->id, 'target_type' => 'user'])); ?>">
              <thead>
              <tr>
                <th data-field="icon" style="width: 40px;" class="hidden-xs" data-formatter="iconFormatter"></th>
                <th class="col-sm-3" data-field="created_at" data-formatter="dateDisplayFormatter"><?php echo e(trans('general.date')); ?></th>
                <th class="col-sm-2" data-field="admin" data-formatter="usersLinkObjFormatter"><?php echo e(trans('general.admin')); ?></th>
                <th class="col-sm-2" data-field="action_type"><?php echo e(trans('general.action')); ?></th>
                <th class="col-sm-3" data-field="item" data-formatter="polymorphicItemFormatter"><?php echo e(trans('general.item')); ?></th>
                <th class="col-sm-2" data-field="target" data-formatter="polymorphicItemFormatter"><?php echo e(trans('general.target')); ?></th>
              </tr>
              </thead>
            </table>

          </div>
        </div><!-- /.tab-pane -->

        <div class="tab-pane" id="managed_tab">
          <div class="table-responsive">
            <table class="display table table-striped">
              <thead>
                <tr>
                  <th class="col-md-8"><?php echo e(trans('general.name')); ?></th>
                  <th class="col-md-4"><?php echo e(trans('general.date')); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $user->managedLocations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo $location->present()->nameUrl(); ?></a></td>
                  <td><?php echo e($location->created_at); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
          </table>
          </div>
        </div><!-- /consumables-tab -->
      </div><!-- /.tab-content -->
    </div><!-- nav-tabs-custom -->
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
  <?php echo $__env->make('partials.bootstrap-table', ['simple_view' => true], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script nonce="<?php echo e(csrf_token()); ?>">
$(function () {
    //binds to onchange event of your input field
    var uploadedFileSize = 0;
    $('#fileupload').bind('change', function() {
      uploadedFileSize = this.files[0].size;
      $('#progress-container').css('visibility', 'visible');
    });

    $('#fileupload').fileupload({
        //maxChunkSize: 100000,
        dataType: 'json',
        formData:{
        _token:'<?php echo e(csrf_token()); ?>',
        notes: $('#notes').val(),
        },

        progress: function (e, data) {
            //var overallProgress = $('#fileupload').fileupload('progress');
            //var activeUploads = $('#fileupload').fileupload('active');
            var progress = parseInt((data.loaded / uploadedFileSize) * 100, 10);
            $('.progress-bar').addClass('progress-bar-warning').css('width',progress + '%');
            $('#progress-bar-text').html(progress + '%');
            //console.dir(overallProgress);
        },

        done: function (e, data) {
            console.dir(data);

            // We use this instead of the fail option, since our API
            // returns a 200 OK status which always shows as "success"

            if (data && data.jqXHR.responseJSON.error && data.jqXHR.responseJSON && data.jqXHR.responseJSON.error) {
                $('#progress-bar-text').html(data.jqXHR.responseJSON.error);
                $('.progress-bar').removeClass('progress-bar-warning').addClass('progress-bar-danger').css('width','100%');
                $('.progress-checkmark').fadeIn('fast').html('<i class="fa fa-times fa-3x icon-white" style="color: #d9534f"></i>');
                console.log(data.jqXHR.responseJSON.error);
            } else {
                $('.progress-bar').removeClass('progress-bar-warning').addClass('progress-bar-success').css('width','100%');
                $('.progress-checkmark').fadeIn('fast');
                $('#progress-container').delay(950).css('visibility', 'visible');
                $('.progress-bar-text').html('Finished!');
                $('.progress-checkmark').fadeIn('fast').html('<i class="fa fa-check fa-3x icon-white" style="color: green"></i>');
                $.each(data.result.file, function (index, file) {
                    $('<tr><td>' + file.notes + '</td><<td>' + file.name + '</td><td>Just now</td><td>' + file.filesize + '</td><td><a class="btn btn-info btn-sm hidden-print" href="import/process/' + file.name + '"><i class="fa fa-spinner process"></i> Process</a></td></tr>').prependTo("#upload-table > tbody");
                });
            }
            $('#progress').removeClass('active');


        }
    });
});
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>