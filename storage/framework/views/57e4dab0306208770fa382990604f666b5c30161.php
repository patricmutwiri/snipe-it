<div class="form-group" id="assignto_selector"<?php echo (isset($style)) ? ' style="'.e($style).'"' : ''; ?>>
    <?php echo e(Form::label('name', trans('admin/hardware/form.checkout_to'), array('class' => 'col-md-3 control-label'))); ?>

    <div class="col-md-8">
        <div class="btn-group" data-toggle="buttons">
            <?php if((isset($user_select)) && ($user_select!='false')): ?>
            <label class="btn btn-default active">
                <input name="checkout_to_type" value="user" type="radio" checked="checked"><i class="fa fa-user"></i> <?php echo e(trans('general.user')); ?>

            </label>
            <?php endif; ?>
            <?php if((isset($asset_select)) && ($asset_select!='false')): ?>
            <label class="btn btn-default">
                <input name="checkout_to_type" value="asset" type="radio"><i class="fa fa-barcode"></i> <?php echo e(trans('general.asset')); ?>

            </label>
            <?php endif; ?>
            <?php if((isset($location_select)) && ($location_select!='false')): ?>
            <label class="btn btn-default">
                <input name="checkout_to_type" value="location" class="active" type="radio"><i class="fa fa-map-marker"></i> <?php echo e(trans('general.location')); ?>

            </label>
            <?php endif; ?>

            <?php echo $errors->first('checkout_to_type', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>'); ?>

        </div>
    </div>
</div>
