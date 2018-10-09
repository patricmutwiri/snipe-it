@extends('layouts/default')

{{-- Page title --}}
@section('title')
     {{ trans('admin/consumables/general.checkout') }}
@parent
@stop

{{-- Page content --}}
@section('content')

<div class="row">
  <div class="col-md-9">

    <form class="form-horizontal" method="post" action="{{ route('checkout/consumables', $consumable->id) }}" autocomplete="off">
      <!-- CSRF Token -->
      <input type="hidden" name="_token" value="{{ csrf_token() }}" />

      <div class="box box-default">

        @if ($consumable->id)
          <div class="box-header with-border">
            <div class="box-heading">
              <h3 class="box-title">{{ $consumable->name }} </h3>
            </div>
          </div><!-- /.box-header -->
        @endif

        <div class="box-body">
          @if ($consumable->name)
          <!-- consumable name -->
          <div class="form-group">
            <label class="col-sm-3 control-label">{{ trans('admin/consumables/general.consumable_name') }}</label>
            <div class="col-md-6">
              <p class="form-control-static">{{ $consumable->name }}</p>
            </div>
          </div>
          @endif

          <!-- User -->
            @include ('partials.forms.edit.user-select', ['translated_name' => trans('general.select_user'), 'fieldname' => 'assigned_to', 'required'=> 'true'])


            @if ($consumable->requireAcceptance() || $consumable->getEula() || ($snipeSettings->slack_endpoint!=''))
              <div class="form-group notification-callout">
                <div class="col-md-8 col-md-offset-3">
                  <div class="callout callout-info">

                    @if ($consumable->category->require_acceptance=='1')
                      <i class="fa fa-envelope"></i>
                      {{ trans('admin/categories/general.required_acceptance') }}
                      <br>
                    @endif

                    @if ($consumable->getEula())
                      <i class="fa fa-envelope"></i>
                      {{ trans('admin/categories/general.required_eula') }}
                        <br>
                    @endif

                    @if ($snipeSettings->slack_endpoint!='')
                        <i class="fa fa-slack"></i>
                        A slack message will be sent
                    @endif
                  </div>
                </div>
              </div>
            @endif

          <!-- amount/pieces -->
          <div class="form-group {{ $errors->has('note') ? 'error' : '' }}">
            <label for="pieces" class="col-md-3 control-label">Pieces</label>
            <div class="col-md-7">
              <input type="number" required="true" class="col-md-6 form-control" id="pieces" name="pieces" value="{{ Input::old('pieces', $consumable->pieces) }}" />
              {!! $errors->first('pieces', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>') !!}
            </div>
          </div>
          
          <!-- Checkout/Checkin Date -->
          <div class="form-group {{ $errors->has('checkout_at') ? 'error' : '' }}">
            {{ Form::label('name', trans('admin/hardware/form.checkout_date'), array('class' => 'col-md-3 control-label')) }}
            <div class="col-md-7">
                <div class="input-group date c-xx-ol-md-5" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-end-date="0d">
                    <input type="text" class="form-control" placeholder="{{ trans('general.select_date') }}" name="checkout_at" id="checkout_at" value="{{ Input::old('checkout_at') }}">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                </div>
              {!! $errors->first('checkout_at', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>') !!}
            </div>
          </div>
          <!-- Note -->
          <div class="form-group {{ $errors->has('note') ? 'error' : '' }}">
            <label for="note" class="col-md-3 control-label">{{ trans('admin/hardware/form.notes') }}</label>
            <div class="col-md-7">
              <textarea class="col-md-6 form-control" id="note" name="note">{{ Input::old('note', $consumable->note) }}</textarea>
              {!! $errors->first('note', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>') !!}
            </div>
          </div>
        </div> <!-- .box-body -->
        <div class="box-footer">
          <a class="btn btn-link" href="{{ URL::previous() }}">{{ trans('button.cancel') }}</a>
          <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check icon-white"></i> {{ trans('general.checkout') }}</button>
       </div>
      </div>
    </form>

  </div>
</div>
@stop
