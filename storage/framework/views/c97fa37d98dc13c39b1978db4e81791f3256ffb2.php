<!DOCTYPE html>
<html>
    <head>
      <title>
        <?php $__env->startSection('title'); ?>
         Snipe-IT Setup
        <?php echo $__env->yieldSection(); ?>
      </title>

        <link rel="stylesheet" href="<?php echo e(url(mix('css/dist/all.css'))); ?>">





        <script nonce="<?php echo e(csrf_token()); ?>">
            window.snipeit = {
                settings: {
                    "per_page": 20
                }
            };
        </script>



        <style>
          td, th {
            font-size: 14px;
          }

          .preflight-success {
            color: green;
          }

          .preflight-error {
            color: red;
          }

          .preflight-warning {
            color: orange;
          }

          .page-header {
            font-size: 280%;
          }

          h3 {
            font-size: 250%;
          }

          .alert {
            font-size: 16px;
          }


        </style>

    </head>
    <body>
          <div class="container">
              <div class="row">
                  <div class="col-lg-10 col-lg-offset-1">
                    <h1 class="page-header">Snipe-IT Pre-Flight</h1>
                  </div>
                  <div class="col-lg-11 col-lg-offset-1">

                    <div class="row bs-wizard" style="border-bottom:0;">

                      <div class="col-xs-3 bs-wizard-step <?php echo e(($step > 1) ? 'complete':'active'); ?>">
                        <div class="text-center bs-wizard-stepnum">Step 1</div>
                        <div class="progress"><div class="progress-bar"></div></div>
                        <a href="<?php echo e(route('setup')); ?>" class="bs-wizard-dot"></a>
                        <div class="bs-wizard-info text-center">Configuration Check</div>
                      </div>

                      <div class="col-xs-3 bs-wizard-step <?php echo e(($step == 2) ? 'active': (($step < 2) ? 'disabled' : 'complete')); ?>"><!-- complete -->
                        <div class="text-center bs-wizard-stepnum">Step 2</div>
                        <div class="progress"><div class="progress-bar"></div></div>
                        <a href="<?php echo e(route('setup.migrate')); ?>" class="bs-wizard-dot"></a>
                        <div class="bs-wizard-info text-center">Create Database Tables</div>
                      </div>

                      <div class="col-xs-3 bs-wizard-step <?php echo e(($step == 3) ? 'active': (($step < 3) ? 'disabled' : 'complete')); ?>"><!-- complete -->
                        <div class="text-center bs-wizard-stepnum">Step 3</div>
                        <div class="progress"><div class="progress-bar"></div></div>
                        <a href="<?php echo e(route('setup.user')); ?>" class="bs-wizard-dot"></a>
                        <div class="bs-wizard-info text-center">Create Admin User</div>
                      </div>

                      <div class="col-xs-3 bs-wizard-step <?php echo e(($step == 4) ? 'active': (($step < 4) ? 'disabled' : 'complete')); ?>"><!-- active -->
                        <div class="text-center bs-wizard-stepnum">Step 4</div>
                        <div class="progress"><div class="progress-bar"></div></div>
                        <a href="#" class="bs-wizard-dot"></a>
                        <div class="bs-wizard-info text-center"> Finished!</div>
                      </div>
                  </div>
                </div>

                  <div class="col-lg-10 col-lg-offset-1" style="padding-top: 50px;">


                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo e($section); ?>

                        </div>
                        <div class="panel-body">
                          <!-- Content -->
                          <?php echo $__env->yieldContent('content'); ?>
                        </div>
                        <div class="panel-footer text-right">
                            <?php $__env->startSection('button'); ?>
                            <?php echo $__env->yieldSection(); ?>


                        </div>
                    </div>

                  </div>
              </div>
          </div>
          <script src="<?php echo e(url(mix('js/dist/all.js'))); ?>" nonce="<?php echo e(csrf_token()); ?>"></script>

        <script nonce="<?php echo e(csrf_token()); ?>">
            $(function () {
                $(".select2").select2();
            });
        </script>
          <?php $__env->startSection('moar_scripts'); ?>
          <?php echo $__env->yieldSection(); ?>

    </body>
</html>
