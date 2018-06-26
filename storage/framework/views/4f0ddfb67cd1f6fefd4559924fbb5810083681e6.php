<!-- Requestable -->
<div class="form-group">
    <div class="col-sm-offset-3 col-sm-10">
        <label>
        <input type="checkbox" value="1" name="requestable" id="requestable" class="minimal" <?php echo e(Input::old('requestable', $item->requestable) == '1' ? ' checked="checked"' : ''); ?>> <?php echo e($requestable_text); ?>

        </label>

    </div>
</div>
