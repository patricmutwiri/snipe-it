<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><?php echo e(trans('admin/statuslabels/table.create')); ?></h4>
        </div>
        <div class="modal-body">
            <div class="alert alert-danger" id="modal_error_msg" style="display:none">
            </div>
            <div class="dynamic-form-row">
                <div class="col-md-4 col-xs-12"><label for="modal-name"><?php echo e(trans('general.name')); ?>:
                    </label></div>
                <div class="col-md-8 col-xs-12 required"><input type='text' id='modal-name' class="form-control"></div>
            </div>

            <div class="dynamic-form-row">
                <div class="col-md-4 col-xs-12"><label for="modal-type"><?php echo e(trans('admin/statuslabels/table.status_type')); ?>:
                    </label></div>
                <div class="col-md-8 col-xs-12 required"><?php echo e(Form::select('modal-type', $statuslabel_types, '', array('class'=>'select2', 'style'=>'width:90%','id' =>'modal-type'))); ?></div>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('button.cancel')); ?></button>
            <button type="button" class="btn btn-primary" id="modal-save"><?php echo e(trans('general.save')); ?></button>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
