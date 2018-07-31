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
                        <a data-id="export-selected" class="exportselected-a btn btn-primary" href="/reports/exportselected">Export Selected</a>
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
                                    <th data-sortable="true" class="col-sm-1">#</th>
                                    <th data-sortable="true" class="col-sm-1">{{ trans('admin/models/general.model_name') }}</th>
                                    <th data-sortable="true" class="col-sm-1">{{ trans('admin/models/general.model_number') }}</th>
                                    <th data-sortable="true" class="col-sm-1">{{ trans('admin/models/general.total') }}</th>
                                    <th data-sortable="true" class="col-sm-1">Checked Out</th>
                                    <th data-sortable="true" class="col-sm-1">Remainder</th>
                                    <th data-sortable="true" class="col-sm-1">{{ trans('admin/models/general.min_amt') }}</th>
                                    <th data-sortable="true" class="col-sm-1">{{ trans('admin/models/general.normal_amt') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($models as $i => $model)
                                    <tr>
                                        <td class="col-sm-1"><input type="checkbox" class="model-id" name="model_id[]" value="{{ $model->id }}"></td>
                                        <td><a href="/models/{{$model->id}}"> {{ $model->name }}</a></td>
                                        <td><a href="/models/{{$model->id}}"> {{ $model->model_number }}</a></td>
                                        <td>{{ $model->qty }}</td>
                                        <td>{{ $model->checkedout }}</td>
                                        <td>{{ $model->remainder }}</td>
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
        <form name="form-exportselected" method="post" action="/reports/exportselected">
             {{ csrf_field() }}
             <input type="hidden" id="form-model_ids" name="model_ids" value="" />
             <input type="submit" class="hidden" id="exportselected-form-submit" name="submit">
        </form>
        
        <script type="text/javascript">
            document.getElementsByClassName('exportselected-a')[0].addEventListener('click', function(e){
                var checkedmodels = document.getElementsByClassName('model-id'), model_ids = [];
                for (var i = checkedmodels.length - 1; i >= 0; i--) {
                    if(checkedmodels[i].checked) {
                        model_ids.push(checkedmodels[i].value);
                    }
                }
                if(model_ids.length) {
                    document.getElementById('form-model_ids').value = model_ids;
                    document.getElementById('exportselected-form-submit').click();
                } else {
                    alert('Yo, can\'t export a blank!');
                }
                e.preventDefault();
            });
        </script>

        @stop

        @section('moar_scripts')
            @include ('partials.bootstrap-table')

        @stop