<!-- checkout reason select -->
<div id="{{ $fieldname }}" class="form-group{{ $errors->has($fieldname) ? ' has-error' : '' }}">

    {{ Form::label($fieldname, $translated_name, array('class' => 'col-md-3 control-label')) }}

    <div class="col-md-7 required">
        <select class="checkpurpose xjs-data-ajax" data-x-endpoint="checkpurpose" name="{{ $fieldname }}" style="padding:5px; width: 100%" id="checkpurpose">
            @foreach (\App\Models\Checkpurpose::get() as $reason)
                <option class="check-reason-option" value="{{$reason->id}}">{{ $reason->name }}</option>
            @endforeach
        </select>
    </div>

    {!! $errors->first($fieldname, '<div class="col-md-8 col-md-offset-3"><span class="alert-msg"><i class="fa fa-times"></i> :message</span></div>') !!}
</div>
