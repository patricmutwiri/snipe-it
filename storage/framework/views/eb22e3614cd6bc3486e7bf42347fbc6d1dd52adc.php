<?php $__env->startSection('title'); ?>
    Update Label Settings
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
                        <i class="fa fa-tags"></i> Labels
                    </h4>
                </div>
                <div class="box-body">


                    <div class="col-md-11 col-md-offset-1">

                        <div class="form-group <?php echo e($errors->has('labels_per_page') ? 'error' : ''); ?>">
                            <div class="col-md-3">
                                <?php echo e(Form::label('labels_per_page', trans('admin/settings/general.labels_per_page'))); ?>

                            </div>
                            <div class="col-md-9">
                                <?php echo e(Form::text('labels_per_page', Input::old('labels_per_page', $setting->labels_per_page), ['class' => 'form-control','style' => 'width: 100px;'])); ?>

                                <?php echo $errors->first('labels_per_page', '<span class="alert-msg">:message</span>'); ?>

                            </div>
                        </div>

                        <div class="form-group <?php echo e($errors->has('labels_width') ? 'error' : ''); ?>">
                            <div class="col-md-3">
                                <?php echo e(Form::label('labels_width', trans('admin/settings/general.labels_fontsize'))); ?>

                            </div>
                            <div class="col-md-2 form-group">
                                <div class="input-group">
                                    <?php echo e(Form::text('labels_fontsize', Input::old('labels_fontsize', $setting->labels_fontsize), ['class' => 'form-control'])); ?>

                                    <div class="input-group-addon"><?php echo e(trans('admin/settings/general.text_pt')); ?></div>
                                </div>
                            </div>
                            <div class="col-md-9 col-md-offset-3">
                                <?php echo $errors->first('labels_fontsize', '<span class="alert-msg">:message</span>'); ?>

                            </div>
                        </div>

                        <div class="form-group <?php echo e($errors->has('labels_width') ? 'error' : ''); ?>">
                            <div class="col-md-3">
                                <?php echo e(Form::label('labels_width', trans('admin/settings/general.label_dimensions'))); ?>

                            </div>
                            <div class="col-md-3 form-group">
                                <div class="input-group">
                                    <?php echo e(Form::text('labels_width', Input::old('labels_width', $setting->labels_width), ['class' => 'form-control'])); ?>

                                    <div class="input-group-addon"><?php echo e(trans('admin/settings/general.width_w')); ?></div>
                                </div>
                            </div>
                            <div class="col-md-3 form-group" style="margin-left: 10px">
                                <div class="input-group">
                                    <?php echo e(Form::text('labels_height', Input::old('labels_height', $setting->labels_height), ['class' => 'form-control'])); ?>

                                    <div class="input-group-addon"><?php echo e(trans('admin/settings/general.height_h')); ?></div>
                                </div>
                            </div>
                            <div class="col-md-9 col-md-offset-3">
                                <?php echo $errors->first('labels_width', '<span class="alert-msg">:message</span>'); ?>

                                <?php echo $errors->first('labels_height', '<span class="alert-msg">:message</span>'); ?>

                            </div>
                        </div>

                        <div class="form-group <?php echo e($errors->has('labels_width') ? 'error' : ''); ?>">
                            <div class="col-md-3">
                                <?php echo e(Form::label('labels_width', trans('admin/settings/general.label_gutters'))); ?>

                            </div>
                            <div class="col-md-3 form-group">
                                <div class="input-group">
                                    <?php echo e(Form::text('labels_display_sgutter', Input::old('labels_display_sgutter', $setting->labels_display_sgutter), ['class' => 'form-control'])); ?>

                                    <div class="input-group-addon"><?php echo e(trans('admin/settings/general.horizontal')); ?></div>
                                </div>
                            </div>
                            <div class="col-md-3 form-group" style="margin-left: 10px">
                                <div class="input-group">
                                    <?php echo e(Form::text('labels_display_bgutter', Input::old('labels_display_bgutter', $setting->labels_display_bgutter), ['class' => 'form-control'])); ?>

                                    <div class="input-group-addon"><?php echo e(trans('admin/settings/general.vertical')); ?></div>
                                </div>
                            </div>
                            <div class="col-md-9 col-md-offset-3">
                                <?php echo $errors->first('labels_display_sgutter', '<span class="alert-msg">:message</span>'); ?>

                                <?php echo $errors->first('labels_display_bgutter', '<span class="alert-msg">:message</span>'); ?>

                            </div>
                        </div>

                        <div class="form-group <?php echo e($errors->has('labels_width') ? 'error' : ''); ?>">
                            <div class="col-md-3">
                                <?php echo e(Form::label('labels_width', trans('admin/settings/general.page_padding'))); ?>

                            </div>
                            <div class="col-md-3 form-group">
                                <div class="input-group" style="margin-bottom: 15px;">
                                    <?php echo e(Form::text('labels_pmargin_top', Input::old('labels_pmargin_top', $setting->labels_pmargin_top), ['class' => 'form-control'])); ?>

                                    <div class="input-group-addon"><?php echo e(trans('admin/settings/general.top')); ?></div>
                                </div>
                                <div class="input-group">
                                    <?php echo e(Form::text('labels_pmargin_right', Input::old('labels_pmargin_right', $setting->labels_pmargin_right), ['class' => 'form-control'])); ?>

                                    <div class="input-group-addon"><?php echo e(trans('admin/settings/general.right')); ?></div>
                                </div>
                            </div>
                            <div class="col-md-3 form-group" style="margin-left: 10px; ">
                                <div class="input-group" style="margin-bottom: 15px;">
                                    <?php echo e(Form::text('labels_pmargin_bottom', Input::old('labels_pmargin_bottom', $setting->labels_pmargin_bottom), ['class' => 'form-control'])); ?>

                                    <div class="input-group-addon"><?php echo e(trans('admin/settings/general.bottom')); ?></div>
                                </div>
                                <div class="input-group">
                                    <?php echo e(Form::text('labels_pmargin_left', Input::old('labels_pmargin_left', $setting->labels_pmargin_left), ['class' => 'form-control'])); ?>

                                    <div class="input-group-addon"><?php echo e(trans('admin/settings/general.left')); ?></div>
                                </div>
                            </div>
                            <div class="col-md-9 col-md-offset-3">
                                <?php echo $errors->first('labels_width', '<span class="alert-msg">:message</span>'); ?>

                                <?php echo $errors->first('labels_height', '<span class="alert-msg">:message</span>'); ?>

                            </div>
                        </div>

                        <div class="form-group <?php echo e($errors->has('labels_pageheight') ? 'error' : ''); ?>">
                            <div class="col-md-3">
                                <?php echo e(Form::label('labels_width', trans('admin/settings/general.page_dimensions'))); ?>

                            </div>
                            <div class="col-md-3 form-group">
                                <div class="input-group">
                                    <?php echo e(Form::text('labels_pagewidth', Input::old('labels_pagewidth', $setting->labels_pagewidth), ['class' => 'form-control'])); ?>

                                    <div class="input-group-addon"><?php echo e(trans('admin/settings/general.width_w')); ?></div>
                                </div>
                            </div>
                            <div class="col-md-3 form-group" style="margin-left: 10px">
                                <div class="input-group">
                                    <?php echo e(Form::text('labels_pageheight', Input::old('labels_pageheight', $setting->labels_pageheight), ['class' => 'form-control'])); ?>

                                    <div class="input-group-addon"><?php echo e(trans('admin/settings/general.height_h')); ?></div>
                                </div>
                            </div>
                            <div class="col-md-9 col-md-offset-3">
                                <?php echo $errors->first('labels_pagewidth', '<span class="alert-msg">:message</span>'); ?>

                                <?php echo $errors->first('labels_pageheight', '<span class="alert-msg">:message</span>'); ?>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3">
                                <?php echo e(Form::label('labels_width', trans('admin/settings/general.label_fields'))); ?>

                            </div>
                            <div class="col-md-9">
                                <div class="checkbox">
                                    <label>
                                        <?php echo e(Form::checkbox('labels_display_name', '1', Input::old('labels_display_name',   $setting->labels_display_name),['class' => 'minimal'])); ?>

                                        <?php echo e(trans('admin/hardware/form.name')); ?>

                                    </label>
                                    <label>
                                        <?php echo e(Form::checkbox('labels_display_serial', '1', Input::old('labels_display_serial',   $setting->labels_display_serial),['class' => 'minimal'])); ?>

                                        <?php echo e(trans('admin/hardware/form.serial')); ?>

                                    </label>
                                    <label>
                                        <?php echo e(Form::checkbox('labels_display_tag', '1', Input::old('labels_display_tag',   $setting->labels_display_tag),['class' => 'minimal'])); ?>

                                        <?php echo e(trans('admin/hardware/form.tag')); ?>

                                    </label>
                                    <label>
                                        <?php echo e(Form::checkbox('labels_display_company_name', '1', Input::old('labels_display_company_name',   $setting->labels_display_company_name),['class' => 'minimal'])); ?>

                                        <?php echo e(trans('admin/companies/table.name')); ?>

                                    </label>
                                </div> <!--/.CHECKBOX-->
                            </div> <!--/.col-md-9-->
                        </div> <!--/.form-group-->




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