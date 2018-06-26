<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e(($snipeSettings) && ($snipeSettings->site_name) ? $snipeSettings->site_name : 'Snipe-IT'); ?></title>


    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo e(url(asset('js/plugins/select2/select2.min.css'))); ?>">

    <link rel="stylesheet" href="<?php echo e(url(mix('css/dist/all.css'))); ?>">
    <link rel="shortcut icon" type="image/ico" href="<?php echo e(url(asset('favicon.ico'))); ?>">


    <?php if(($snipeSettings) && ($snipeSettings->header_color)): ?>
        <style>
        .main-header .navbar, .main-header .logo {
        background-color: <?php echo e($snipeSettings->header_color); ?>;
        background: -webkit-linear-gradient(top,  <?php echo e($snipeSettings->header_color); ?> 0%,<?php echo e($snipeSettings->header_color); ?> 100%);
        background: linear-gradient(to bottom, <?php echo e($snipeSettings->header_color); ?> 0%,<?php echo e($snipeSettings->header_color); ?> 100%);
        border-color: <?php echo e($snipeSettings->header_color); ?>;
        }
        .skin-blue .sidebar-menu > li:hover > a, .skin-blue .sidebar-menu > li.active > a {
        border-left-color: <?php echo e($snipeSettings->header_color); ?>;
        }

        .btn-primary {
        background-color: <?php echo e($snipeSettings->header_color); ?>;
        border-color: <?php echo e($snipeSettings->header_color); ?>;
        }

        <?php if($snipeSettings->custom_css): ?>
            <?php echo e($snipeSettings->show_custom_css()); ?>

        <?php endif; ?>
        </style>

    <?php endif; ?>

</head>

<body class="hold-transition login-page">

    <?php if(($snipeSettings) && ($snipeSettings->logo!='')): ?>
        <center>
            <img style="padding-top: 20px; padding-bottom: 10px; max-width: 150px" src="<?php echo e(url('/')); ?>/uploads/<?php echo e($snipeSettings->logo); ?>">
        </center>
    <?php endif; ?>
  <!-- Content -->
  <?php echo $__env->yieldContent('content'); ?>



</body>

</html>
