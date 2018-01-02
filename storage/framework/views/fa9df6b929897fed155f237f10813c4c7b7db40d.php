<div id="assigned_user" class="form-group<?php echo e($errors->has($fieldname) ? ' has-error' : ''); ?>">

    <?php echo e(Form::label($fieldname, $translated_name, array('class' => 'col-md-3 control-label'))); ?>


    <div class="col-md-7<?php echo e(((isset($required)) && ($required=='true')) ? ' required' : ''); ?>">
        <select class="js-data-ajax" data-endpoint="suppliers" name="<?php echo e($fieldname); ?>" style="width: 100%" id="supplier_select">
            <?php if($supplier_id = Input::old($fieldname, (isset($item)) ? $item->{$fieldname} : '')): ?>
                <option value="<?php echo e($supplier_id); ?>" selected="selected">
                    <?php echo e((\App\Models\Supplier::find($supplier_id)) ? \App\Models\Supplier::find($supplier_id)->name : ''); ?>

                </option>
            <?php else: ?>
                <option value=""><?php echo e(trans('general.select_supplier')); ?></option>
            <?php endif; ?>
        </select>
    </div>

    <div class="col-md-1 col-sm-1 text-left">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', \App\Models\Supplier::class)): ?>
            <a href='<?php echo e(route('modal.supplier')); ?>' data-toggle="modal"  data-target="#createModal" data-dependency="supplier" data-select='supplier_select' class="btn btn-sm btn-default">New</a>
        <?php endif; ?>
    </div>

    <?php echo $errors->first($fieldname, '<div class="col-md-8 col-md-offset-3"><span class="alert-msg"><i class="fa fa-times"></i> :message</span></div>'); ?>


</div>
