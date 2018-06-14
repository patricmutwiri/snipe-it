<!-- Item Number -->
<div class="form-group <?php echo e($errors->has('item_no') ? ' has-error' : ''); ?>">
   <label for="item_no" class="col-md-3 control-label"><?php echo e(trans('admin/consumables/general.item_no')); ?></label>
   <div class="col-md-7 col-sm-12<?php echo e((\App\Helpers\Helper::checkIfRequired($item, 'item_no')) ? ' required' : ''); ?>">
       <input class="form-control" type="text" name="item_no" id="item_no" value="<?php echo e(Input::old('item_no', $item->item_no)); ?>" />
       <?php echo $errors->first('item_no', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>'); ?>

   </div>
</div>