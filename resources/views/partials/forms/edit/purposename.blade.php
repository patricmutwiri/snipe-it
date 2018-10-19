<!-- Name -->
<div class="form-group">
    <label for="name" class="col-md-3 control-label">Name</label>
    <div class="col-md-7 col-sm-12 required">
        <input class="form-control" type="text" name="name" id="name" value="{{ Input::old('name', $item->name) }}" />
        {!! $errors->first('name', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>') !!}
    </div>
</div>