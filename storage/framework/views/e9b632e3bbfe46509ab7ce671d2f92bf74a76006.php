
<!-- QTY -->
<div class="form-group <?php echo e($errors->has('qty') ? ' has-error' : ''); ?>">
    <label for="qty" class="col-md-3 control-label"><?php echo e(trans('general.quantity')); ?></label>
    <div class="col-md-7<?php echo e((\App\Helpers\Helper::checkIfRequired($item, 'qty')) ? ' required' : ''); ?>">
       <div class="col-md-2" style="padding-left:0px">
           <input class="form-control" type="text" name="qty" id="qty" value="<?php echo e(Input::old('qty', $item->qty)); ?>" />
       </div>
       <?php echo $errors->first('qty', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>'); ?>

   </div>
</div>