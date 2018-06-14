<!-- Purchase Cost -->
<div class="form-group <?php echo e($errors->has('purchase_cost') ? ' has-error' : ''); ?>">
    <label for="purchase_cost" class="col-md-3 control-label"><?php echo e(trans('general.purchase_cost')); ?></label>
    <div class="col-md-9">
        <div class="input-group col-md-3" style="padding-left: 0px;">
            <input class="form-control" type="text" name="purchase_cost" id="purchase_cost" value="<?php echo e(Input::old('purchase_cost', \App\Helpers\Helper::formatCurrencyOutput($item->purchase_cost))); ?>" />
            <span class="input-group-addon">
                <?php if(isset($currency_type)): ?>
                    <?php echo e($currency_type); ?>

                <?php else: ?>
                    <?php echo e($snipeSettings->default_currency); ?>

                <?php endif; ?>
            </span>
        </div>
        <div class="col-md-9" style="padding-left: 0px;">
            <?php echo $errors->first('purchase_cost', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>'); ?>

        </div>
    </div>

</div>
