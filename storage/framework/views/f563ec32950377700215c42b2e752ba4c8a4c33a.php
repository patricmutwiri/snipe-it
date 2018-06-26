<?php $__env->startSection('title'); ?>
<?php echo e(trans('general.dashboard')); ?>

##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

<div class="row">
  <!-- panel -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-teal">
      <div class="inner">
        <h3><?php echo e(number_format($counts['asset'])); ?></h3>
        <p><?php echo e(trans('general.total_assets')); ?></p>
      </div>
      <div class="icon">
        <i class="fa fa-barcode"></i>
      </div>
      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Models\Asset::class)): ?>
        <a href="<?php echo e(route('hardware.index')); ?>" class="small-box-footer"><?php echo e(trans('general.moreinfo')); ?> <i class="fa fa-arrow-circle-right"></i></a>
      <?php endif; ?>
    </div>
  </div><!-- ./col -->

  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-maroon">
      <div class="inner">
        <h3><?php echo e(number_format($counts['license'])); ?></h3>
        <p><?php echo e(trans('general.total_licenses')); ?></p>
      </div>
      <div class="icon">
        <i class="fa fa-floppy-o"></i>
      </div>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\License::class)): ?>
          <a href="<?php echo e(route('licenses.index')); ?>" class="small-box-footer"><?php echo e(trans('general.moreinfo')); ?> <i class="fa fa-arrow-circle-right"></i></a>
        <?php endif; ?>
    </div>
  </div><!-- ./col -->


  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-orange">
      <div class="inner">
        <h3> <?php echo e(number_format($counts['accessory'])); ?></h3>
          <p><?php echo e(trans('general.total_accessories')); ?></p>
      </div>
      <div class="icon">
        <i class="fa fa-keyboard-o"></i>
      </div>
      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Models\Accessory::class)): ?>
          <a href="<?php echo e(route('accessories.index')); ?>" class="small-box-footer"><?php echo e(trans('general.moreinfo')); ?> <i class="fa fa-arrow-circle-right"></i></a>
      <?php endif; ?>
    </div>
  </div><!-- ./col -->

  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-purple">
      <div class="inner">
        <h3> <?php echo e(number_format($counts['consumable'])); ?></h3>
          <p><?php echo e(trans('general.total_consumables')); ?></p>
      </div>
      <div class="icon">
        <i class="fa fa-tint"></i>
      </div>
      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Models\Consumable::class)): ?>
        <a href="<?php echo e(route('consumables.index')); ?>" class="small-box-footer"><?php echo e(trans('general.moreinfo')); ?> <i class="fa fa-arrow-circle-right"></i></a>
      <?php endif; ?>
    </div>
  </div><!-- ./col -->
</div>

<?php if($counts['grand_total'] == 0): ?>

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">This is your dashboard. There are many like it, but this one is yours.</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="progress">
                                <div class="progress-bar progress-bar-yellow" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                    <span class="sr-only">60% Complete (warning)</span>
                                </div>
                            </div>


                            <p><strong>It looks like you haven't added anything yet, so we don't have anything awesome to display. Get started by adding some assets, accessories, consumables, or licenses now!</strong></p>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', \App\Models\Asset::class)): ?>
                            <a class="btn bg-teal" style="width: 100%" href="<?php echo e(route('hardware.create')); ?>">New Asset</a>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-3">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', \App\Models\License::class)): ?>
                                <a class="btn bg-maroon" style="width: 100%" href="<?php echo e(route('licenses.create')); ?>">New License</a>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-3">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', \App\Models\Accessory::class)): ?>
                                <a class="btn bg-orange" style="width: 100%" href="<?php echo e(route('accessories.create')); ?>">New Accessory</a>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-3">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', \App\Models\Consumable::class)): ?>
                                <a class="btn bg-purple" style="width: 100%" href="<?php echo e(route('consumables.create')); ?>">New Consumable</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php else: ?>

<!-- recent activity -->
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo e(trans('general.recent_activity')); ?></h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
      </div><!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <div class="table-responsive">
              <table
                class="table table-striped snipe-table"
                name="activityReport"
                id="table"
                data-sort-order="desc"
                data-height="400"
                data-url="<?php echo e(route('api.activity.index', ['limit' => 25])); ?>">
                <thead>
                  <tr>
                    <th data-field="icon" style="width: 40px;" class="hidden-xs" data-formatter="iconFormatter"></th>
                    <th class="col-sm-3" data-field="created_at" data-formatter="dateDisplayFormatter"><?php echo e(trans('general.date')); ?></th>
                    <th class="col-sm-2" data-field="admin" data-formatter="usersLinkObjFormatter"><?php echo e(trans('general.admin')); ?></th>
                    <th class="col-sm-2" data-field="action_type"><?php echo e(trans('general.action')); ?></th>
                    <th class="col-sm-3" data-field="item" data-formatter="polymorphicItemFormatter"><?php echo e(trans('general.item')); ?></th>
                    <th class="col-sm-2" data-field="target" data-formatter="polymorphicItemFormatter"><?php echo e(trans('general.target')); ?></th>
                  </tr>
                </thead>
              </table>

            </div><!-- /.responsive -->
          </div><!-- /.col -->
          <div class="col-md-12 text-center" style="padding-top: 10px;">
            <a href="<?php echo e(route('reports.activity')); ?>" class="btn btn-primary btn-sm" style="width: 100%">View All</a>
          </div>
        </div><!-- /.row -->
      </div><!-- ./box-body -->
    </div><!-- /.box -->
  </div>

</div> <!--/row-->
<div class="row">
    <div class="col-md-6">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo e(trans('general.assets')); ?> by Status</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="min-height: 400px;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="chart-responsive">
                            <canvas id="statusPieChart" height="120"></canvas>
                        </div> <!-- ./chart-responsive -->
                    </div> <!-- /.col -->
                </div> <!-- /.row -->
            </div><!-- /.box-body -->
        </div> <!-- /.box -->
    </div>
    <div class="col-md-6">

        <!-- Categories -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Asset <?php echo e(trans('general.categories')); ?></h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <table
                                class="table table-striped snipe-table"
                                name="categorySummary"
                                id="table"
                                data-height="440"

                                data-url="<?php echo e(route('api.categories.index', ['sort' => 'assets_count', 'order' => 'asc'])); ?>">
                            <thead>
                            <tr>
                                <th class="col-sm-3" data-field="name" data-formatter="categoriesLinkFormatter" data-sortable="true"><?php echo e(trans('general.name')); ?></th>
                                <th class="col-sm-3" data-field="category_type" data-sortable="true"><?php echo e(trans('general.type')); ?></th>
                                <th class="col-sm-1" data-field="assets_count" data-sortable="true"><i class="fa fa-barcode"></i></th>
                                <th class="col-sm-1" data-field="accessories_count" data-sortable="true"><i class="fa fa-keyboard-o"></i></th>
                                <th class="col-sm-1" data-field="consumables_count" data-sortable="true"><i class="fa fa-tint"></i></th>
                                <th class="col-sm-1" data-field="components_count" data-sortable="true"><i class="fa fa-hdd-o"></i></th>
                            </tr>
                            </thead>
                        </table>
                    </div> <!-- /.col -->
                    <div class="col-md-12 text-center" style="padding-top: 10px;">
                        <a href="<?php echo e(route('categories.index')); ?>" class="btn btn-primary btn-sm" style="width: 100%">View All</a>
                    </div>
                </div> <!-- /.row -->

            </div><!-- /.box-body -->
        </div> <!-- /.box -->
    </div>
</div>

<?php endif; ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
<?php echo $__env->make('partials.bootstrap-table', ['simple_view' => true], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php if($snipeSettings->load_remote=='1'): ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<?php else: ?>
    <script src="<?php echo e(asset('js/plugins/chartjs/Chart.min.js')); ?>"></script>
<?php endif; ?>


<script nonce="<?php echo e(csrf_token()); ?>">




        /* ChartJS
         * -------
         */

        // -----------------------
        // - LINE CHART -
        // -----------------------



        //var ctx = document.getElementById('salesChart').getContext("2d")
        //var myChart = new Chart(ctx, {
         //   type: 'line'
        //});


        //$.ajax({
        //    type: 'GET',
        //    url: '<?php echo e(route('api.statuslabels.assets.bytype')); ?>',
        //    headers: {
        //        "X-Requested-With": 'XMLHttpRequest',
        //        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        //    },

        //    dataType: 'json',
        //   success: function (data) {
        //       var ctx = new Chart(ctx,{
        //          type: 'line',
        //            data: data,
        //            options: lineOptions
        //        });
        //    },
        //    error: function (data) {
       //         window.location.reload(true);
       //     }
       // });





  // ---------------------------
  // - END MONTHLY SALES CHART -
  // ---------------------------


    var pieChartCanvas = $("#statusPieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var ctx = document.getElementById("statusPieChart");



    $.ajax({
        type: 'GET',
        url: '<?php echo e(route('api.statuslabels.assets.bytype')); ?>',
        headers: {
            "X-Requested-With": 'XMLHttpRequest',
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        },

        dataType: 'json',
        success: function (data) {
            var myPieChart = new Chart(ctx,{

                type: 'doughnut',
                data: data,
                options: pieOptions
            });
        },
        error: function (data) {
           // window.location.reload(true);
        }
    });


</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>