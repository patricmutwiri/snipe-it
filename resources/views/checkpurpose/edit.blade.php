@extends('layouts/edit-form', [
    'createText' => trans('admin/statuslabels/table.create') ,
    'updateText' => trans('admin/statuslabels/table.update'),
    'helpTitle' => 'Update purpose',
    'helpText' => 'Purpose update',
    'formAction' => ($item) ? route('checkpurpose.update', ['id' => $item->id]) : route('checkpurpose.store'),
])

{{-- Page content --}}
@section('content')
<style>
    .input-group-addon {
        width: 30px;
    }
</style>
@parent
@stop

@section('inputFields')

@include ('partials.forms.edit.purposename', ['translated_name' => trans('general.name')])

@stop

@section('moar_scripts')
    <!-- bootstrap color picker -->
    <script nonce="{{ csrf_token() }}">
        //color picker with addon
        $(".color").colorpicker();
    </script>

@stop
