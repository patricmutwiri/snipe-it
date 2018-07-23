@extends('layouts/default')

{{-- Page title --}}
@section('title')
  Asset Checkin/Checkout Purposes
@parent
@stop

@section('header_right')
    @can('create', \App\Models\Statuslabel::class)
        <a href="{{ route('checkpurpose.create') }}" class="btn btn-primary pull-right">
          {{ trans('general.create') }}
        </a>
    @endcan
@stop
{{-- Page content --}}
@section('content')

<div class="row">
  <div class="col-md-11">
    <div class="box box-default">
      <div class="box-body">
        <div class="table-responsive">

            <table
                    data-pagination="true"
                    data-search="true"
                    data-show-footer="false"
                    data-side-pagination="server"
                    data-show-columns="true"
                    data-show-export="true"
                    data-show-refresh="true"
                    data-sort-order="asc"
                    data-sort-name="name"
                    id="checkpurposesTable"
                    class="table table-striped snipe-table"
                    data-export-options='{
                "fileName": "export-checkpurposes-{{ date('Y-m-d') }}",
                "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                }'>
            <thead>
              <tr>
                <th data-sortable="true" data-field="id" data-visible="true">{{ trans('general.id') }}</th>
                <th data-sortable="true" data-field="name">Name</th>
                <th data-formatter="" data-searchable="false" data-sortable="false" data-field="actions"><span class="pull-right texxt-right">{{ trans('table.actions') }}</span></th>
              </tr>
            </thead>
            <tbody>
              @if($purposes->count() > 0)
                @foreach($purposes as $purpose)
                  <tr>
                    <td>{{$purpose->id}}</td>
                    <td>
                      <a href="{{ route('checkpurpose.show', $purpose->id) }}">{{$purpose->name}}</a>
                    </td>
                    <td>
                      <div class="col-xs-4 text-right pull-right">
                          <a href="{{ route('checkpurpose.edit', $purpose->id) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                          <a href="{{ route('checkpurpose/delete', $purpose->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </div>
                    </td>
                  </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>
@stop

@section('moar_scripts')
@include ('partials.bootstrap-table')
@stop
