@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Stock Level Report
    @parent
@stop


{{-- Page content --}}
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-body">
                    <div class="table-responsive">

                        <table
                                data-cookie-id-table="stocklevelreport"
                                data-pagination="true"
                                data-id-table="stocklevelreport"
                                data-search="true"
                                data-side-pagination="client"
                                data-show-columns="true"
                                data-show-export="true"
                                data-show-refresh="true"
                                data-sort-order="asc"
                                id="stocklevelreport"
                                class="table table-striped snipe-table"
                                data-export-options='{
                        "fileName": "stock-level-report-{{ date('Y-m-d') }}",
                        "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                        }'>

                            <thead>
                            <tr>
                                <th class="col-sm-1">#</th>
                                <th class="col-sm-1">{{ trans('admin/models/general.model_name') }}</th>
                                <th class="col-sm-1">{{ trans('admin/models/general.model_number') }}</th>
                                <th class="col-sm-1">{{ trans('admin/models/general.total') }}</th>
                                <th class="col-sm-1">{{ trans('admin/models/general.min_amt') }}</th>
                                <th class="col-sm-1">{{ trans('admin/models/general.normal_amt') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($models as $i => $model)
                                <tr>
                                    <td class="col-sm-1">{{ ++$i }}</td>
                                    <td><a href="/models/{{$model->id}}"> {{ $model->name }}</a></td>
                                    <td><a href="/models/{{$model->id}}"> {{ $model->model_number }}</a></td>
                                    <td>{{ $model->qty }}</td>
                                    <td>{{ $model->min_amt }}</td>
                                    <td>{{ $model->normal_amt }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        </table>
                    </div>
                </div>
            </div>
        </div>


        @stop

        @section('moar_scripts')
            @include ('partials.bootstrap-table')

        @stop


