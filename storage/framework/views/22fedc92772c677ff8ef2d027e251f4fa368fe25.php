<!-- Asset Model -->
<div id="<?php echo e($fieldname); ?>" class="form-group<?php echo e($errors->has($fieldname) ? ' has-error' : ''); ?>">

    <?php echo e(Form::label($fieldname, $translated_name, array('class' => 'col-md-3 control-label'))); ?>


    <div class="col-md-7 required">
        <select class="js-data-ajax" data-endpoint="models" name="<?php echo e($fieldname); ?>" style="width: 100%" id="model_select_id">
            <?php if($model_id = Input::old($fieldname, (isset($item)) ? $item->{$fieldname} : '')): ?>
                <option value="<?php echo e($model_id); ?>" selected="selected">
                    <?php echo e((\App\Models\AssetModel::find($model_id)) ? \App\Models\AssetModel::find($model_id)->name : ''); ?>

                </option>
            <?php else: ?>
                <option value=""><?php echo e(trans('general.select_model')); ?></option>
            <?php endif; ?>

        </select>
    </div>
    <div class="col-md-1 col-sm-1 text-left">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', \App\Models\AssetModel::class)): ?>
            <a href='<?php echo e(route('modal.model')); ?>' data-toggle="modal"  data-target="#createModal" data-dependency="model" data-select='model_select_id' class="btn btn-sm btn-default">New</a>
            <span class="mac_spinner" style="padding-left: 10px; color: green; display:none; width: 30px;"><i class="fa fa-spinner fa-spin"></i> </span>
        <?php endif; ?>
    </div>

    <?php echo $errors->first($fieldname, '<div class="col-md-8 col-md-offset-3"><span class="alert-msg"><i class="fa fa-times"></i> :message</span></div>'); ?>

</div>
