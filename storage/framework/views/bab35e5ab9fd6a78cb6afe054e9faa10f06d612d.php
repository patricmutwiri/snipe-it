<!-- Asset -->
<div id="assigned_asset" class="form-group<?php echo e($errors->has($fieldname) ? ' has-error' : ''); ?>"<?php echo (isset($style)) ? ' style="'.e($style).'"' : ''; ?>>
    <?php echo e(Form::label($fieldname, $translated_name, array('class' => 'col-md-3 control-label'))); ?>

    <div class="col-md-7<?php echo e(((isset($required) && ($required =='true'))) ?  ' required' : ''); ?>">
        <select class="js-data-ajax select2" data-endpoint="hardware" name="<?php echo e($fieldname); ?>" style="width: 100%" id="assigned_asset_select"<?php echo e((isset($multiple)) ? ' multiple="multiple"' : ''); ?>>

            <?php if((!isset($unselect)) && ($asset_id = Input::old($fieldname, (isset($asset) ? $asset->id  : (isset($item) ? $item->{$fieldname} : ''))))): ?>
                <option value="<?php echo e($asset_id); ?>" selected="selected">
                    <?php echo e((\App\Models\Asset::find($asset_id)) ? \App\Models\Asset::find($asset_id)->present()->fullName : ''); ?>

                </option>
            <?php else: ?>
                <option value=""><?php echo e(trans('general.select_asset')); ?></option>
            <?php endif; ?>
        </select>
    </div>
    <?php echo $errors->first($fieldname, '<div class="col-md-8 col-md-offset-3"><span class="alert-msg"><i class="fa fa-times"></i> :message</span></div>'); ?>


</div>
