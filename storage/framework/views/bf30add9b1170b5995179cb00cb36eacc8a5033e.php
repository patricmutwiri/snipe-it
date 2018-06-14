<?php if(($model) && ($model->fieldset)): ?>
  <?php $__currentLoopData = $model->fieldset->fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="form-group<?php echo e($errors->has($field->db_column_name()) ? ' has-error' : ''); ?>">
      <label for="<?php echo e($field->db_column_name()); ?>" class="col-md-3 control-label"><?php echo e($field->name); ?> </label>
      <div class="col-md-7 col-sm-12<?php echo e(($field->pivot->required=='1') ? ' required' : ''); ?>">

          <?php if($field->element!='text'): ?>
              <!-- Listbox -->
              <?php if($field->element=='listbox'): ?>
                  <?php echo e(Form::select($field->db_column_name(), $field->formatFieldValuesAsArray(),
                  Input::old($field->db_column_name(),(isset($item) ? $item->{$field->db_column_name()} : "")), ['class'=>'format select2 form-control'])); ?>


              <?php elseif($field->element=='checkbox'): ?>
                    <!-- Checkboxes -->
                  <?php $__currentLoopData = $field->formatFieldValuesAsArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                      <div>
                          <label>
                              <input type="checkbox" value="1" name="<?php echo e($field->db_column_name()); ?>[]" class="minimal" <?php echo e(Input::old($field->db_column_name()) != '' ? ' checked="checked"' : ''); ?>> key: <?php echo e($key); ?> value: <?php echo e($value); ?>

                          </label>
                      </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              <?php endif; ?>


          <?php else: ?>
            <!-- Date field -->

                <?php if($field->format=='DATE'): ?>

                        <div class="input-group col-md-4" style="padding-left: 0px;">
                            <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd"  data-autoclose="true">
                                <input type="text" class="form-control" placeholder="<?php echo e(trans('general.select_date')); ?>" name="<?php echo e($field->db_column_name()); ?>" id="<?php echo e($field->db_column_name()); ?>" value="<?php echo e(Input::old($field->db_column_name(),(isset($item) ? \App\Helpers\Helper::gracefulDecrypt($field, $item->{$field->db_column_name()}) : ""))); ?>">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>


                <?php else: ?>
                    <?php if(($field->field_encrypted=='0') || (Gate::allows('admin'))): ?>
                    <input type="text" value="<?php echo e(Input::old($field->db_column_name(),(isset($item) ? \App\Helpers\Helper::gracefulDecrypt($field, $item->{$field->db_column_name()}) : ""))); ?>" id="<?php echo e($field->db_column_name()); ?>" class="form-control" name="<?php echo e($field->db_column_name()); ?>" placeholder="Enter <?php echo e(strtolower($field->format)); ?> text">
                        <?php else: ?>
                            <input type="text" value="<?php echo e(strtoupper(trans('admin/custom_fields/general.encrypted'))); ?>" class="form-control disabled" disabled>
                    <?php endif; ?>
                <?php endif; ?>

          <?php endif; ?>

              <?php if($field->help_text!=''): ?>
              <p class="help-block"><?php echo e($field->help_text); ?></p>
              <?php endif; ?>

          <?php
          $errormessage=$errors->first($field->db_column_name());
          if ($errormessage) {
              $errormessage=preg_replace('/ snipeit /', '', $errormessage);
              print('<span class="alert-msg"><i class="fa fa-times"></i> '.$errormessage.'</span>');
          }
            ?>
      </div>

        <?php if($field->field_encrypted): ?>
        <div class="col-md-1 col-sm-1 text-left">
            <i class="fa fa-lock" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/custom_fields/general.value_encrypted')); ?>"></i>
        </div>
        <?php endif; ?>


    </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
