<?php $__env->startSection('title'); ?>
<?php echo e(trans('admin/hardware/general.view')); ?> <?php echo e($asset->asset_tag); ?>

##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header_right'); ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage', \App\Models\Asset::class)): ?>
<div class="dropdown pull-right">
  <button class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?php echo e(trans('button.actions')); ?>

    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu1">
    <?php if(($asset->assetstatus) && ($asset->assetstatus->deployable=='1')): ?>
      <?php if($asset->assigned_to != ''): ?>
      <li role="presentation"><a href="<?php echo e(route('checkin/hardware', $asset->id)); ?>"><?php echo e(trans('admin/hardware/general.checkin')); ?></a></li>
      <?php else: ?>
      <li role="presentation"><a href="<?php echo e(route('checkout/hardware', $asset->id)); ?>"><?php echo e(trans('admin/hardware/general.checkout')); ?></a></li>
      <?php endif; ?>
    <?php endif; ?>
    <li role="presentation"><a href="<?php echo e(route('hardware.edit', $asset->id)); ?>"><?php echo e(trans('admin/hardware/general.edit')); ?></a></li>
    <li role="presentation"><a href="<?php echo e(route('clone/hardware', $asset->id)); ?>"><?php echo e(trans('admin/hardware/general.clone')); ?></a></li>
      <li role="presentation"><a href="<?php echo e(route('asset.audit.create', $asset->id)); ?>"><?php echo e(trans('general.audit')); ?></a></li>
  </ul>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">


    <?php if($asset->deleted_at!=''): ?>
        <div class="col-md-12">
             <div class="alert alert-danger">
                    <i class="fa fa-exclamation-circle faa-pulse animated"></i>
                    <strong>WARNING: </strong>
                    This asset has been deleted.
                    You must <a href="<?php echo e(route('restore/hardware', $asset->id)); ?>">restore it</a> before you can assign it to someone.
               </div>
        </div>
    <?php endif; ?>

    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active">
          <a href="#details" data-toggle="tab"><span class="hidden-lg hidden-md"><i class="fa fa-info-circle"></i></span> <span class="hidden-xs hidden-sm">Details</span></a>
        </li>
        <li>
          <a href="#software" data-toggle="tab"><span class="hidden-lg hidden-md"><i class="fa fa-floppy-o"></i></span> <span class="hidden-xs hidden-sm">Licenses</span></a>
        </li>
        <li>
          <a href="#components" data-toggle="tab"><span class="hidden-lg hidden-md"><i class="fa fa-hdd-o"></i></span> <span class="hidden-xs hidden-sm">Components</span></a>
        </li>
        <li>
          <a href="#maintenances" data-toggle="tab"><span class="hidden-lg hidden-md"><i class="fa fa-wrench"></i></span> <span class="hidden-xs hidden-sm">Maintenances</span></a>
        </li>
        <li>
          <a href="#history" data-toggle="tab"><span class="hidden-lg hidden-md"><i class="fa fa-history"></i></span> <span class="hidden-xs hidden-sm">History</span></a>
        </li>
        <li>
          <a href="#files" data-toggle="tab"><span class="hidden-lg hidden-md"><i class="fa fa-files-o"></i></span> <span class="hidden-xs hidden-sm">Files</span></a>
        </li>
        <li class="pull-right">
          <!-- <a href="#" data-toggle="modal" data-target="#uploadFileModal"><i class="fa fa-paperclip"></i> </a> -->
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade in active" id="details">
          <div class="row">
            <div class="col-md-8">
              <div class="table-responsive" style="margin-top: 10px;">
                <table class="table">
                  <tbody>
                    <?php if($asset->assetstatus): ?>
                    <tr>
                      <td><?php echo e(trans('general.status')); ?></td>
                      <td>

                        <?php if(($asset->assignedTo) && ($asset->deleted_at=='')): ?>
                          <i class="fa fa-circle text-blue"></i> <?php echo e(trans('general.deployed')); ?> <i class="fa fa-long-arrow-right" aria-hidden="true"></i> <?php echo $asset->assignedTo->present()->glyph(); ?>

                          <?php echo $asset->assignedTo->present()->nameUrl(); ?>

                        <?php else: ?>
                          <?php if(($asset->assetstatus) && ($asset->assetstatus->deployable=='1')): ?>
                            <i class="fa fa-circle text-green"></i>
                          <?php elseif(($asset->assetstatus) && ($asset->assetstatus->pending=='1')): ?>
                              <i class="fa fa-circle text-orange"></i>
                          <?php elseif(($asset->assetstatus) && ($asset->assetstatus->archived=='1')): ?>
                            <i class="fa fa-times text-red"></i>
                          <?php endif; ?>
                            <a href="<?php echo e(route('statuslabels.show', $asset->assetstatus->id)); ?>">
                              <?php echo e($asset->assetstatus->name); ?></a>
                            <label class="label label-default"><?php echo e($asset->present()->statusMeta); ?></label>

                        <?php endif; ?>
                      </td>
                    </tr>
                    <?php endif; ?>

                    <?php if($asset->company): ?>
                    <tr>
                      <td><?php echo e(trans('general.company')); ?></td>
                      <td><a href="<?php echo e(url('/companies/' . $asset->company->id)); ?>"><?php echo e($asset->company->name); ?></a></td>
                    </tr>
                    <?php endif; ?>

                    <?php if($asset->name): ?>
                    <tr>
                      <td><?php echo e(trans('admin/hardware/form.name')); ?></td>
                      <td><?php echo e($asset->name); ?></td>
                    </tr>
                    <?php endif; ?>

                    <?php if($asset->serial): ?>
                    <tr>
                      <td><?php echo e(trans('admin/hardware/form.serial')); ?></td>
                      <td><?php echo e($asset->serial); ?></td>
                    </tr>
                    <?php endif; ?>
                    <?php if((isset($audit_log)) && ($audit_log->created_at)): ?>
                      <tr>
                        <td><?php echo e(trans('general.last_audit')); ?></td>
                        <td> <?php echo e(\App\Helpers\Helper::getFormattedDateObject($audit_log->created_at, 'date', false)); ?> (by <?php echo e(link_to_route('users.show', $audit_log->user->present()->fullname(), [$audit_log->user->id])); ?>)</td>
                      </tr>
                    <?php endif; ?>
                    <?php if($asset->next_audit_date): ?>
                      <tr>
                        <td><?php echo e(trans('general.next_audit_date')); ?></td>
                        <td> <?php echo e(\App\Helpers\Helper::getFormattedDateObject($asset->next_audit_date, 'date', false)); ?></td>
                      </tr>
                    <?php endif; ?>

                    <?php if($asset->model->manufacturer): ?>
                    <tr>
                      <td><?php echo e(trans('admin/hardware/form.manufacturer')); ?></td>
                      <td>
                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\Manufacturer::class)): ?>
                        <a href="<?php echo e(route('manufacturers.show', $asset->model->manufacturer->id)); ?>">
                        <?php echo e($asset->model->manufacturer->name); ?>

                        </a>
                      <?php else: ?>
                        <?php echo e($asset->model->manufacturer->name); ?>

                      <?php endif; ?>

                        <?php if($asset->model->manufacturer->url): ?>
                            <br><i class="fa fa-globe"></i> <a href="<?php echo e($asset->model->manufacturer->url); ?>"><?php echo e($asset->model->manufacturer->url); ?></a>
                        <?php endif; ?>

                        <?php if($asset->model->manufacturer->support_url): ?>
                            <br><i class="fa fa-life-ring"></i> <a href="<?php echo e($asset->model->manufacturer->support_url); ?>"><?php echo e($asset->model->manufacturer->support_url); ?></a>
                          <?php endif; ?>

                          <?php if($asset->model->manufacturer->support_phone): ?>
                            <br><i class="fa fa-phone"></i> <?php echo e($asset->model->manufacturer->support_phone); ?>

                          <?php endif; ?>

                          <?php if($asset->model->manufacturer->support_email): ?>
                            <br><i class="fa fa-envelope"></i> <a href="mailto:<?php echo e($asset->model->manufacturer->support_email); ?>"><?php echo e($asset->model->manufacturer->support_email); ?></a>
                          <?php endif; ?>
                      </td>
                    </tr>
                    <?php endif; ?>
                    <tr>
                      <td>
                        <?php echo e(trans('admin/hardware/form.model')); ?></td>
                      <td>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\AssetModel::class)): ?>
                        <a href="<?php echo e(route('models.show', $asset->model->id)); ?>">
                          <?php echo e($asset->model->name); ?>

                        </a>
                      <?php else: ?>
                        <?php echo e($asset->model->name); ?>

                      <?php endif; ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?php echo e(trans('admin/models/table.modelnumber')); ?></td>
                      <td>
                        <?php echo e($asset->model->model_number); ?>

                      </td>
                    </tr>


                    <?php if($asset->model->fieldset): ?>
                      <?php $__currentLoopData = $asset->model->fieldset->fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td>
                            <?php echo e($field->name); ?>

                          </td>
                          <td>
                            <?php if($field->field_encrypted=='1'): ?>
                              <i class="fa fa-lock" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/custom_fields/general.value_encrypted')); ?>"></i>
                            <?php endif; ?>

                            <?php if($field->isFieldDecryptable($asset->{$field->db_column_name()} )): ?>
                              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('superuser')): ?>
                                <?php if(($field->format=='URL') && ($asset->{$field->db_column_name()}!='')): ?>
                                  <a href="<?php echo e(\App\Helpers\Helper::gracefulDecrypt($field, $asset->{$field->db_column_name()})); ?>" target="_new"><?php echo e(\App\Helpers\Helper::gracefulDecrypt($field, $asset->{$field->db_column_name()})); ?></a>
                                <?php else: ?>
                                  <?php echo e(\App\Helpers\Helper::gracefulDecrypt($field, $asset->{$field->db_column_name()})); ?>

                                <?php endif; ?>
                              <?php else: ?>
                                  <?php echo e(strtoupper(trans('admin/custom_fields/general.encrypted'))); ?>

                              <?php endif; ?>

                            <?php else: ?>
                              <?php if(($field->format=='URL') && ($asset->{$field->db_column_name()}!='')): ?>
                                <a href="<?php echo e($asset->{$field->db_column_name()}); ?>" target="_new"><?php echo e($asset->{$field->db_column_name()}); ?></a>
                              <?php else: ?>
                                <?php echo e($asset->{$field->db_column_name()}); ?>

                              <?php endif; ?>
                            <?php endif; ?>
                           </td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    <?php if($asset->purchase_date): ?>
                      <tr>
                        <td><?php echo e(trans('admin/hardware/form.date')); ?></td>
                        <td>
                          <?php echo e(\App\Helpers\Helper::getFormattedDateObject($asset->purchase_date, 'date', false)); ?>

                        </td>
                      </tr>
                    <?php endif; ?>

                    <?php if($asset->purchase_cost): ?>
                      <tr>
                        <td><?php echo e(trans('admin/hardware/form.cost')); ?></td>
                        <td>
                          <?php if(($asset->id) && ($asset->location)): ?>
                            <?php echo e($asset->location->currency); ?>

                          <?php elseif(($asset->id) && ($asset->location)): ?>
                            <?php echo e($asset->location->currency); ?>

                          <?php else: ?>
                            <?php echo e($snipeSettings->default_currency); ?>

                          <?php endif; ?>
                          <?php echo e(\App\Helpers\Helper::formatCurrencyOutput($asset->purchase_cost)); ?>



                        </td>
                      </tr>
                    <?php endif; ?>
                    <?php if($asset->order_number): ?>
                      <tr>
                        <td><?php echo e(trans('general.order_number')); ?></td>
                        <td>
                          #<?php echo e($asset->order_number); ?>

                        </td>
                      </tr>
                    <?php endif; ?>

                    <?php if($asset->supplier): ?>
                      <tr>
                        <td><?php echo e(trans('general.supplier')); ?></td>
                        <td>
                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('superuser')): ?>
                            <a href="<?php echo e(route('suppliers.show', $asset->supplier_id)); ?>">
                              <?php echo e($asset->supplier->name); ?>

                            </a>
                          <?php else: ?>
                            <?php echo e($asset->supplier->name); ?>

                          <?php endif; ?>
                        </td>
                      </tr>
                    <?php endif; ?>

                    <?php if($asset->warranty_months): ?>
                      <tr <?php echo $asset->present()->warrantee_expires() < date("Y-m-d") ? ' class="warning"' : ''; ?>>
                        <td><?php echo e(trans('admin/hardware/form.warranty')); ?></td>
                        <td>
                          <?php echo e($asset->warranty_months); ?>

                          <?php echo e(trans('admin/hardware/form.months')); ?>


                          (<?php echo e(trans('admin/hardware/form.expires')); ?>

                          <?php echo e($asset->present()->warrantee_expires()); ?>)
                        </td>
                      </tr>
                    <?php endif; ?>

                    <?php if($asset->depreciation): ?>
                      <tr>
                        <td><?php echo e(trans('general.depreciation')); ?></td>
                        <td>
                          <?php echo e($asset->depreciation->name); ?>

                          (<?php echo e($asset->depreciation->months); ?>

                          <?php echo e(trans('admin/hardware/form.months')); ?>

                          )
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <?php echo e(trans('admin/hardware/form.fully_depreciated')); ?>

                        </td>
                        <td>
                          <?php if($asset->time_until_depreciated()->y > 0): ?>
                           <?php echo e($asset->time_until_depreciated()->y); ?>

                           <?php echo e(trans('admin/hardware/form.years')); ?>,
                          <?php endif; ?>
                          <?php echo e($asset->time_until_depreciated()->m); ?>

                          <?php echo e(trans('admin/hardware/form.months')); ?>

                          (<?php echo e($asset->depreciated_date()->format('Y-m-d')); ?>)
                        </td>
                      </tr>
                    <?php endif; ?>

                    <?php if($asset->model->eol): ?>
                      <tr>
                        <td><?php echo e(trans('admin/hardware/form.eol_rate')); ?></td>
                        <td>
                          <?php echo e($asset->model->eol); ?>

                          <?php echo e(trans('admin/hardware/form.months')); ?>


                          (
                          <?php echo e(trans('admin/hardware/form.eol_date')); ?>:
                          <?php echo e($asset->present()->eol_date()); ?>

                          <?php if($asset->present()->months_until_eol()): ?>
                            (
                            <?php if($asset->present()->months_until_eol()->y > 0): ?> <?php echo e($asset->present()->months_until_eol()->y); ?>

                            <?php echo e(trans('general.years')); ?>,
                            <?php endif; ?>

                            <?php echo e($asset->present()->months_until_eol()->m); ?>

                            <?php echo e(trans('general.months')); ?>

                            )
                          <?php endif; ?>

                        </td>
                      </tr>
                    <?php endif; ?>



                    <?php if($asset->expected_checkin!=''): ?>
                      <tr>
                        <td><?php echo e(trans('admin/hardware/form.expected_checkin')); ?></td>
                        <td>
                          <?php echo e(\App\Helpers\Helper::getFormattedDateObject($asset->expected_checkin, 'date', false)); ?>

                        </td>
                      </tr>
                    <?php endif; ?>

                    <tr>
                      <td><?php echo e(trans('admin/hardware/form.notes')); ?></td>
                      <td> <?php echo nl2br(e($asset->notes)); ?></td>
                    </tr>

                    <?php if($asset->location): ?>
                      <tr>
                        <td><?php echo e(trans('general.location')); ?></td>
                        <td>
                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('superuser')): ?>
                            <a href="<?php echo e(route('locations.show', ['location' => $asset->location->id])); ?>">
                              <?php echo e($asset->location->name); ?>

                            </a>
                          <?php else: ?>
                            <?php echo e($asset->location->name); ?>

                          <?php endif; ?>
                        </td>
                      </tr>
                    <?php endif; ?>

                    <?php if($asset->defaultLoc): ?>
                      <tr>
                        <td><?php echo e(trans('admin/hardware/form.default_location')); ?></td>
                        <td>
                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('superuser')): ?>
                            <a href="<?php echo e(route('locations.show', ['location' => $asset->defaultLoc->id])); ?>">
                              <?php echo e($asset->defaultLoc->name); ?>

                            </a>
                          <?php else: ?>
                            <?php echo e($asset->defaultLoc->name); ?>

                          <?php endif; ?>
                        </td>
                      </tr>
                    <?php endif; ?>

                    <?php if($asset->created_at!=''): ?>
                      <tr>
                        <td><?php echo e(trans('general.created_at')); ?></td>
                        <td>
                          <?php echo e(\App\Helpers\Helper::getFormattedDateObject($asset->created_at, 'datetime', false)); ?>

                        </td>
                      </tr>
                    <?php endif; ?>

                    <?php if($asset->updated_at!=''): ?>
                      <tr>
                        <td><?php echo e(trans('general.updated_at')); ?></td>
                        <td>
                          <?php echo e(\App\Helpers\Helper::getFormattedDateObject($asset->updated_at, 'datetime', false)); ?>

                        </td>
                      </tr>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div> <!-- /table-responsive -->
            </div><!-- /col-md-8 -->

            <div class="col-md-4">
              <?php if($asset->image): ?>
                <img src="<?php echo e(url('/')); ?>/uploads/assets/<?php echo e($asset->image); ?>" class="assetimg img-responsive">
              <?php elseif($asset->model->image!=''): ?>
                <img src="<?php echo e(url('/')); ?>/uploads/models/<?php echo e($asset->model->image); ?>" class="assetimg img-responsive">
              <?php endif; ?>

              <?php if($snipeSettings->qr_code=='1'): ?>
                 <img src="<?php echo e(config('app.url')); ?>/hardware/<?php echo e($asset->id); ?>/qr_code" class="img-thumbnail pull-right" style="height: 100px; width: 100px; margin-right: 10px;">
              <?php endif; ?>

              <?php if(($asset->assignedTo) && ($asset->deleted_at=='')): ?>
                <h4><?php echo e(trans('admin/hardware/form.checkedout_to')); ?></h4>
                <p>
                  <?php if($asset->checkedOutToUser()): ?> <!-- Only users have avatars currently-->
                  <img src="<?php echo e($asset->assignedTo->present()->gravatar()); ?>" class="user-image-inline" alt="<?php echo e($asset->assignedTo->present()->fullName()); ?>">
                  <?php endif; ?>
                  <?php echo $asset->assignedTo->present()->glyph() . ' ' .$asset->assignedTo->present()->nameUrl(); ?>

                </p>

                <ul class="list-unstyled">
                  <?php if((isset($asset->assignedTo->email)) && ($asset->assignedTo->email!='')): ?>
                    <li><i class="fa fa-envelope-o"></i> <a href="mailto:<?php echo e($asset->assignedTo->email); ?>"><?php echo e($asset->assignedTo->email); ?></a></li>
                  <?php endif; ?>

                  <?php if((isset($asset->assignedTo->phone)) && ($asset->assignedTo->phone!='')): ?>
                    <li><i class="fa fa-phone"></i> <?php echo e($asset->assignedTo->phone); ?></li>
                  <?php endif; ?>

                  <?php if(isset($asset->location)): ?>
                    <li><?php echo e($asset->location->name); ?></li>
                    <li><?php echo e($asset->location->address); ?>

                      <?php if($asset->location->address2!=''): ?>
                      <?php echo e($asset->location->address2); ?>

                      <?php endif; ?>
                    </li>

                    <li><?php echo e($asset->location->city); ?>

                      <?php if(($asset->location->city!='') && ($asset->location->state!='')): ?>
                          ,
                      <?php endif; ?>
                      <?php echo e($asset->location->state); ?> <?php echo e($asset->location->zip); ?>

                    </li>
                    <?php endif; ?>
                </ul>

	          <?php endif; ?>
            </div> <!-- div.col-md-4 -->
          </div><!-- /row -->
        </div><!-- /.tab-pane asset details -->

        <div class="tab-pane fade" id="software">
          <div class="row">
            <div class="col-md-12">
              <!-- Licenses assets table -->
              <?php if(count($asset->licenses) > 0): ?>
                <table class="table">
                  <thead>
                    <tr>
                      <th class="col-md-4"><?php echo e(trans('general.name')); ?></th>
                      <th class="col-md-4"><span class="line"></span><?php echo e(trans('admin/licenses/form.license_key')); ?></th>
                      <th class="col-md-1"><span class="line"></span><?php echo e(trans('table.actions')); ?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $asset->licenseseats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><a href="<?php echo e(route('licenses.show', $seat->license->id)); ?>"><?php echo e($seat->license->name); ?></a></td>
                      <td><?php echo e($seat->license->serial); ?></td>
                      <td>
                        <a href="<?php echo e(route('licenses.checkin', $seat->id)); ?>" class="btn-flat info btn-sm"><?php echo e(trans('general.checkin')); ?></a>
                      </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
                <?php else: ?>

                <div class="col-md-12">
                  <div class="alert alert-info alert-block">
                    <i class="fa fa-info-circle"></i>
                    <?php echo e(trans('general.no_results')); ?>

                  </div>
                </div>
              <?php endif; ?>
            </div><!-- /col -->
          </div> <!-- row -->
        </div> <!-- /.tab-pane software -->

        <div class="tab-pane fade" id="components">
          <!-- checked out assets table -->
          <div class="row">
              <div class="col-md-12">
                <?php if(count($asset->components) > 0): ?>
                  <table class="table table-striped">
                    <tbody>
                      <?php $totalCost = 0; ?>
                      <?php $__currentLoopData = $asset->components; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $component): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(is_null($component->deleted_at)): ?>
                          <tr>
                            <td><a href="<?php echo e(route('components.show', $component->id)); ?>"><?php echo e($component->name); ?></a></td>
                          </tr>
                        <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>

                    <tfoot>
                      <tr>
                        <td colspan="7" class="text-right"><?php echo e($use_currency.$totalCost); ?></td>
                      </tr>
                    </tfoot>
                  </table>
                <?php else: ?>
                  <div class="alert alert-info alert-block">
                    <i class="fa fa-info-circle"></i>
                    <?php echo e(trans('general.no_results')); ?>

                  </div>
                <?php endif; ?>
              </div>
          </div>
        </div> <!-- /.tab-pane components -->

        <div class="tab-pane fade" id="maintenances">
          <div class="row">
            <div class="col-md-12">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', \App\Models\Asset::class)): ?>
                  <h6><?php echo e(trans('general.asset_maintenances')); ?>

                    [ <a href="<?php echo e(route('maintenances.create', ['asset_id'=>$asset->id])); ?>"><?php echo e(trans('button.add')); ?></a> ]
                  </h6>
                <?php endif; ?>

              <!-- Asset Maintenance table -->
              <?php if(count($asset->assetmaintenances) > 0): ?>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th><?php echo e(trans('general.supplier')); ?></th>
                      <th><?php echo e(trans('admin/asset_maintenances/form.title')); ?></th>
                      <th><?php echo e(trans('admin/asset_maintenances/form.asset_maintenance_type')); ?></th>
                      <th><?php echo e(trans('admin/asset_maintenances/form.start_date')); ?></th>
                      <th><?php echo e(trans('admin/asset_maintenances/form.completion_date')); ?></th>
                      <th><?php echo e(trans('admin/asset_maintenances/form.notes')); ?></th>
                      <th><?php echo e(trans('admin/asset_maintenances/table.is_warranty')); ?></th>
                      <th><?php echo e(trans('admin/asset_maintenances/form.cost')); ?></th>
                      <th><?php echo e(trans('general.admin')); ?></th>

                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', \App\Models\Asset::class)): ?>
                      <th><?php echo e(trans('table.actions')); ?></th>
                      <?php endif; ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $totalCost = 0; ?>

                    <?php $__currentLoopData = $asset->assetmaintenances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assetMaintenance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if(is_null($assetMaintenance->deleted_at)): ?>
                        <tr>
                          <td>
                            <?php if($assetMaintenance->supplier): ?>
                              <a href="<?php echo e(route('suppliers.show', $assetMaintenance->supplier_id)); ?>"><?php echo e($assetMaintenance->supplier->name); ?></a>
                            <?php else: ?>
                                (deleted supplier)
                            <?php endif; ?>
                          </td>
                          <td><?php echo e($assetMaintenance->title); ?></td>
                          <td><?php echo e($assetMaintenance->asset_maintenance_type); ?></td>
                          <td><?php echo e($assetMaintenance->start_date); ?></td>
                          <td><?php echo e($assetMaintenance->completion_date); ?></td>
                          <td><?php echo e($assetMaintenance->notes); ?></td>
                          <td><?php echo e($assetMaintenance->is_warranty ? trans('admin/asset_maintenances/message.warranty') : trans('admin/asset_maintenances/message.not_warranty')); ?></td>
                          <td class="text-right"><nobr><?php echo e($use_currency.$assetMaintenance->cost); ?></nobr></td>
                          <td>
                            <?php if($assetMaintenance->admin): ?>
                              <a href="<?php echo e(route('users.show', $assetMaintenance->admin->id)); ?>"><?php echo e($assetMaintenance->admin->present()->fullName()); ?></a>
                            <?php endif; ?>
                          </td>
                            <?php $totalCost += $assetMaintenance->cost; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', \App\Models\Asset::class)): ?>
                              <td>
                                <a href="<?php echo e(route('maintenances.edit', $assetMaintenance->id)); ?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil icon-white"></i></a>
                              </td>
                            <?php endif; ?>
                        </tr>
                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="8" class="text-right"><?php echo e(is_numeric($totalCost) ? $use_currency.number_format($totalCost, 2) : $totalCost); ?></td>
                    </tr>
                  </tfoot>
                </table>
              <?php else: ?>
                <div class="alert alert-info alert-block">
                  <i class="fa fa-info-circle"></i>
                  <?php echo e(trans('general.no_results')); ?>

                </div>
              <?php endif; ?>
            </div> <!-- /.col-md-12 -->
          </div> <!-- /.row -->
        </div> <!-- /.tab-pane maintenances -->

        <div class="tab-pane fade" id="history">
          <!-- checked out assets table -->
          <div class="row">
            <div class="col-md-12">
              <table
                      class="table table-striped snipe-table"
                      name="assetHistory"
                      id="table"
                      data-sort-order="desc"
                      data-height="400"
                      data-url="<?php echo e(route('api.activity.index', ['item_id' => $asset->id, 'item_type' => 'asset'])); ?>">
                <thead>
                <tr>
                  <th data-field="icon" style="width: 40px;" class="hidden-xs" data-formatter="iconFormatter"></th>
                  <th class="col-sm-2" data-field="created_at" data-formatter="dateDisplayFormatter"><?php echo e(trans('general.date')); ?></th>
                  <th class="col-sm-2" data-field="admin" data-formatter="usersLinkObjFormatter"><?php echo e(trans('general.admin')); ?></th>
                  <th class="col-sm-2" data-field="action_type"><?php echo e(trans('general.action')); ?></th>
                  <th class="col-sm-2" data-field="item" data-formatter="polymorphicItemFormatter"><?php echo e(trans('general.item')); ?></th>
                  <th class="col-sm-2" data-field="target" data-formatter="polymorphicItemFormatter"><?php echo e(trans('general.target')); ?></th>
                  <th class="col-sm-2" data-field="note"><?php echo e(trans('general.notes')); ?></th>
                  <?php if($snipeSettings->require_accept_signature=='1'): ?>
                    <th class="col-md-3" data-field="signature_file" data-formatter="imageFormatter"><?php echo e(trans('general.signature')); ?></th>
                  <?php endif; ?>
                </tr>
                </thead>
              </table>
            </div>
          </div> <!-- /.row -->
        </div> <!-- /.tab-pane history -->

        <div class="tab-pane fade" id="files">
          <div class="row">

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', \App\Models\Asset::class)): ?>
              <?php echo e(Form::open([
              'method' => 'POST',
              'route' => ['upload/asset', $asset->id],
              'files' => true, 'class' => 'form-horizontal' ])); ?>


              <div class="col-md-2">
                <span class="btn btn-default btn-file">Browse for file...
                    <?php echo e(Form::file('assetfile[]', ['multiple' => 'multiple'])); ?>

                </span>
              </div>
              <div class="col-md-7">
                <?php echo e(Form::text('notes', Input::old('notes', Input::old('notes')), array('class' => 'form-control','placeholder' => 'Notes'))); ?>

              </div>
              <div class="col-md-3">
                <button type="submit" class="btn btn-primary"><?php echo e(trans('button.upload')); ?></button>
              </div>

              <div class="col-md-12">
                <p><?php echo e(trans('admin/hardware/general.filetype_info')); ?></p>
                <hr>
              </div>

              <?php echo e(Form::close()); ?>

            <?php endif; ?>

            <div class="col-md-12">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th class="col-md-4"><?php echo e(trans('general.notes')); ?></th>
                    <th class="col-md-2"></th>
                    <th class="col-md-4"><span class="line"></span><?php echo e(trans('general.file_name')); ?></th>
                    <th class="col-md-2"></th>
                    <th class="col-md-2"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(count($asset->uploads) > 0): ?>
                    <?php $__currentLoopData = $asset->uploads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td>
                          <?php if($file->note): ?>
                          <?php echo e($file->note); ?>

                          <?php endif; ?>
                        </td>
                        <td>
                          <?php if( \App\Helpers\Helper::checkUploadIsImage($file->get_src('assets'))): ?>
                            <a href="<?php echo e(route('show/assetfile', ['assetId' => $asset->id, 'fileId' =>$file->id])); ?>" data-toggle="lightbox" data-type="image"><img src="<?php echo e(route('show/assetfile', ['assetId' => $asset->id, 'fileId' =>$file->id])); ?>" class="img-thumbnail" style="max-width: 50px;"></a>
                          <?php endif; ?>
                        </td>
                        <td>
                          <?php echo e($file->filename); ?>

                        </td>
                        <td>
                          <?php if($file->filename): ?>
                          <a href="<?php echo e(route('show/assetfile', [$asset->id, $file->id])); ?>" class="btn btn-default"><?php echo e(trans('general.download')); ?></a>
                          <?php endif; ?>
                        </td>
                        <td>
                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', \App\Models\Asset::class)): ?>
                            <a class="btn delete-asset btn-danger btn-sm" href="<?php echo e(route('delete/assetfile', [$asset->id, $file->id])); ?>"><i class="fa fa-trash icon-white"></i></a>
                          <?php endif; ?>
                        </td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="4">
                        <?php echo e(trans('general.no_results')); ?>

                      </td>
                    </tr>
                  <?php endif; ?>
                </tbody>
              </table>
            </div> <!-- /.col-md-12 -->
          </div> <!-- /.row -->
        </div> <!-- /.tab-pane files -->
      </div> <!-- /. tab-content -->
    </div> <!-- /.nav-tabs-custom -->
  </div> <!-- /. col-md-12 -->
</div> <!-- /. row -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
  <?php echo $__env->make('partials.bootstrap-table', ['simple_view' => true], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script nonce="<?php echo e(csrf_token()); ?>">
    $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>