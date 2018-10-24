@extends('layouts/default')

{{-- Page title --}}
@section('title')
        Error Log
    @parent
@stop


{{-- Page content --}}
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-body">
                {!! nl2br($laravel_log) !!}
            </div>
        </div>
    </div>
</div>
@stop


@section('moar_scripts')
    @include ('partials.bootstrap-table')
@stop
