<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
      <?php $__env->startSection('title'); ?>
      <?php echo $__env->yieldSection(); ?>
      :: <?php echo e($snipeSettings->site_name); ?>

    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo e(url(asset('js/plugins/select2/select2.min.css'))); ?>">

    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?php echo e(url(asset('js/plugins/iCheck/all.css'))); ?>">

    <!-- bootstrap tables CSS -->
    <link rel="stylesheet" href="<?php echo e(url(asset('css/bootstrap-table.css'))); ?>">

    <link rel="stylesheet" href="<?php echo e(url(mix('css/dist/all.css'))); ?>">

    <link rel="shortcut icon" type="image/ico" href="<?php echo e(url(asset('favicon.ico'))); ?>">

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <script nonce="<?php echo e(csrf_token()); ?>">
      window.Laravel = { csrfToken: '<?php echo e(csrf_token()); ?>' };

    </script>

    <style nonce="<?php echo e(csrf_token()); ?>">
        <?php if($snipeSettings): ?>
            <?php if($snipeSettings->header_color): ?>
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

            <?php endif; ?>

        <?php if($snipeSettings->custom_css): ?>
            <?php echo $snipeSettings->show_custom_css(); ?>

        <?php endif; ?>
     <?php endif; ?>
    @media (max-width: 400px) {
      .navbar-left {
       margin: 2px;
      }

      .nav::after {
        clear: none;
      }
    }
    </style>

    <script nonce="<?php echo e(csrf_token()); ?>">
          window.snipeit = {
              settings: {
                  "per_page": <?php echo e($snipeSettings->per_page); ?>

              }
          };
    </script>
    <!-- Add laravel routes into javascript  Primarily useful for vue.-->
    <?php echo app('Tightenco\Ziggy\BladeRouteGenerator')->generate(); ?>
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>

      <?php if($snipeSettings->load_remote=='1'): ?>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js" integrity="sha384-qFIkRsVO/J5orlMvxK1sgAt2FXT67og+NyFTITYzvbIP1IJavVEKZM7YWczXkwpB" crossorigin="anonymous"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js" integrity="sha384-ZoaMbDF+4LeFxg6WdScQ9nnR1QC2MIRxA1O9KWEXQwns1G8UNyIEZIQidzb0T1fo" crossorigin="anonymous"></script>

       <?php else: ?>
            <script src="<?php echo e(url(asset('js/html5shiv.js'))); ?>" nonce="<?php echo e(csrf_token()); ?>"></script>
            <script src="<?php echo e(url(asset('js/respond.js'))); ?>" nonce="<?php echo e(csrf_token()); ?>"></script>
       <?php endif; ?>
       <![endif]-->
  </head>
  <body class="sidebar-mini skin-blue <?php echo e((session('menu_state')!='open') ? 'sidebar-mini sidebar-collapse' : ''); ?>">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->


        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button above the compact sidenav -->
          <a href="#" style="color: white" class="sidebar-toggle btn btn-white" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <ul class="nav navbar-nav navbar-left">
              <li class="left-navblock">
                 <?php if($snipeSettings->brand == '3'): ?>
                      <a class="logo navbar-brand no-hover" href="<?php echo e(url('/')); ?>">
                          <?php if($snipeSettings->logo!=''): ?>
                          <img class="navbar-brand-img" src="<?php echo e(url('/')); ?>/uploads/<?php echo e($snipeSettings->logo); ?>">
                          <?php endif; ?>
                          <?php echo e($snipeSettings->site_name); ?>

                      </a>
                  <?php elseif($snipeSettings->brand == '2'): ?>
                      <a class="logo navbar-brand no-hover" href="<?php echo e(url('/')); ?>">
                          <?php if($snipeSettings->logo!=''): ?>
                          <img class="navbar-brand-img" src="<?php echo e(url('/')); ?>/uploads/<?php echo e($snipeSettings->logo); ?>">
                          <?php endif; ?>
                      </a>
                  <?php else: ?>
                      <a class="logo no-hover" href="<?php echo e(url('/')); ?>">
                          <?php echo e($snipeSettings->site_name); ?>

                      </a>
                  <?php endif; ?>
              </li>
            </ul>

          <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Models\Asset::class)): ?>
                  <li <?php echo (Request::is('hardware*') ? ' class="active"' : ''); ?>>
                      <a href="<?php echo e(url('hardware')); ?>">
                          <i class="fa fa-barcode"></i>
                      </a>
                  </li>
                  <?php endif; ?>
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\License::class)): ?>
                  <li <?php echo (Request::is('licenses*') ? ' class="active"' : ''); ?>>
                      <a href="<?php echo e(route('licenses.index')); ?>">
                          <i class="fa fa-floppy-o"></i>
                      </a>
                  </li>
                  <?php endif; ?>
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Models\Accessory::class)): ?>
                  <li <?php echo (Request::is('accessories*') ? ' class="active"' : ''); ?>>
                      <a href="<?php echo e(route('accessories.index')); ?>">
                          <i class="fa fa-keyboard-o"></i>
                      </a>
                  </li>
                  <?php endif; ?>
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Models\Consumable::class)): ?>
                  <li <?php echo (Request::is('consumables*') ? ' class="active"' : ''); ?>>
                      <a href="<?php echo e(url('consumables')); ?>">
                          <i class="fa fa-tint"></i>
                      </a>
                  </li>
                  <?php endif; ?>
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\Component::class)): ?>
                  <li <?php echo (Request::is('components*') ? ' class="active"' : ''); ?>>
                      <a href="<?php echo e(route('components.index')); ?>">
                          <i class="fa fa-hdd-o"></i>
                      </a>
                  </li>
                  <?php endif; ?>

                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Models\Asset::class)): ?>
                  <form class="navbar-form navbar-left form-horizontal" role="search" action="<?php echo e(route('findbytag/hardware')); ?>" method="get">
                      <div class="col-xs-12 col-md-12">
                          <div class="col-xs-12 form-group">
                              <label class="sr-only" for="tagSearch"><?php echo e(trans('general.lookup_by_tag')); ?></label>
                              <input type="text" class="form-control" id="tagSearch" name="assetTag" placeholder="<?php echo e(trans('general.lookup_by_tag')); ?>">
                              <input type="hidden" name="topsearch" value="true">
                          </div>
                          <div class="col-xs-1">
                              <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-search"></i></button>
                          </div>
                      </div>
                  </form>
                  <?php endif; ?>

                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <?php echo e(trans('general.create')); ?>

                      <b class="caret"></b>
                    </a>
                   <ul class="dropdown-menu">
                     <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', \App\Models\Asset::class)): ?>
                      <li <?php echo (Request::is('hardware/create') ? 'class="active>"' : ''); ?>>
                              <a href="<?php echo e(route('hardware.create')); ?>">
                                  <i class="fa fa-barcode fa-fw"></i>
                                  <?php echo e(trans('general.asset')); ?>

                              </a>
                      </li>
                       <?php endif; ?>
                       <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', \App\Models\License::class)): ?>
                       <li <?php echo (Request::is('licenses/create') ? 'class="active"' : ''); ?>>
                           <a href="<?php echo e(route('licenses.create')); ?>">
                               <i class="fa fa-floppy-o fa-fw"></i>
                               <?php echo e(trans('general.license')); ?>

                           </a>
                       </li>
                       <?php endif; ?>
                       <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', \App\Models\Accessory::class)): ?>
                       <li <?php echo (Request::is('accessories/create') ? 'class="active"' : ''); ?>>
                           <a href="<?php echo e(route('accessories.create')); ?>">
                               <i class="fa fa-keyboard-o fa-fw"></i>
                               <?php echo e(trans('general.accessory')); ?></a>
                       </li>
                       <?php endif; ?>
                       <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', \App\Models\Consumable::class)): ?>
                       <li <?php echo (Request::is('consunmables/create') ? 'class="active"' : ''); ?>>
                           <a href="<?php echo e(route('consumables.create')); ?>">
                               <i class="fa fa-tint fa-fw"></i>
                               <?php echo e(trans('general.consumable')); ?>

                           </a>
                       </li>
                       <?php endif; ?>
                       <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', \App\Models\User::class)): ?>
                       <li <?php echo (Request::is('users/create') ? 'class="active"' : ''); ?>>
                           <a href="<?php echo e(route('users.create')); ?>">
                           <i class="fa fa-user fa-fw"></i>
                           <?php echo e(trans('general.user')); ?>

                           </a>
                       </li>
                       <?php endif; ?>
                       <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', \App\Models\Component::class)): ?>
                       <li <?php echo (Request::is('components/create') ? 'class="active"' : ''); ?>>
                           <a href="<?php echo e(route('components.create')); ?>">
                           <i class="fa fa-hdd-o"></i>
                           <?php echo e(trans('general.component')); ?>

                           </a>
                       </li>
                       <?php endif; ?>
                   </ul>
                </li>
               <?php endif; ?>

               <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
               <?php if($snipeSettings->show_alerts_in_menu=='1'): ?>
               <!-- Tasks: style can be found in dropdown.less -->
               <?php $alert_items = \App\Helpers\Helper::checkLowInventory(); ?>

               <li class="dropdown tasks-menu">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                   <i class="fa fa-flag-o"></i>
                   <?php if(count($alert_items)): ?>
                    <span class="label label-danger"><?php echo e(count($alert_items)); ?></span>
                   <?php endif; ?>
                 </a>
                 <ul class="dropdown-menu">
                   <li class="header">You have <?php echo e(count($alert_items)); ?> items below or almost below minimum quantity levels</li>
                   <li>
                     <!-- inner menu: contains the actual data -->
                     <ul class="menu">

                      <?php for($i=0; count($alert_items) > $i; $i++): ?>

                        <li><!-- Task item -->
                          <a href="<?php echo e(route($alert_items[$i]['type'].'.show', $alert_items[$i]['id'])); ?>">
                            <h3><?php echo e($alert_items[$i]['name']); ?>

                              <small class="pull-right">
                                <?php echo e($alert_items[$i]['remaining']); ?> remaining
                              </small>
                            </h3>
                            <div class="progress xs">
                              <div class="progress-bar progress-bar-yellow" style="width: <?php echo e($alert_items[$i]['percent']); ?>%" role="progressbar" aria-valuenow="<?php echo e($alert_items[$i]['percent']); ?>" aria-valuemin="0" aria-valuemax="100">
                                <span class="sr-only"><?php echo e($alert_items[$i]['percent']); ?>% Complete</span>
                              </div>
                            </div>
                          </a>
                        </li>
                        <!-- end task item -->
                      <?php endfor; ?>
                     </ul>
                   </li>
                   
                 </ul>
               </li>
               <?php endif; ?>
               <?php endif; ?>


               <!-- User Account: style can be found in dropdown.less -->
               <?php if(Auth::check()): ?>
               <li class="dropdown user user-menu">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                   <?php if(Auth::user()->present()->gravatar()): ?>
                       <img src="<?php echo e(Auth::user()->present()->gravatar()); ?>" class="user-image" alt="User Image">
                   <?php else: ?>
                      <i class="fa fa-user fa-fws"></i>
                   <?php endif; ?>

                   <span class="hidden-xs"><?php echo e(Auth::user()->first_name); ?> <b class="caret"></b></span>
                 </a>
                 <ul class="dropdown-menu">
                   <!-- User image -->
                     <li <?php echo (Request::is('account/profile') ? ' class="active"' : ''); ?>>
                       <a href="<?php echo e(route('view-assets')); ?>">
                             <i class="fa fa-check fa-fw"></i>
                             <?php echo e(trans('general.viewassets')); ?>

                       </a></li>
                     <li>
                          <a href="<?php echo e(route('profile')); ?>">
                             <i class="fa fa-user fa-fw"></i>
                              <?php echo e(trans('general.editprofile')); ?>

                         </a>
                     </li>
                     <li>
                         <a href="<?php echo e(route('account.password.index')); ?>">
                             <i class="fa fa-asterisk fa-fw"></i>
                             <?php echo e(trans('general.changepassword')); ?>

                         </a>
                     </li>



                     <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('self.api')): ?>
                     <li>
                         <a href="<?php echo e(route('user.api')); ?>">
                             <i class="fa fa-user-secret fa-fw"></i> Manage API Keys
                         </a>
                     </li>
                     <?php endif; ?>
                     <li class="divider"></li>
                     <li>
                         <a href="<?php echo e(url('/logout')); ?>">
                             <i class="fa fa-sign-out fa-fw"></i>
                             <?php echo e(trans('general.logout')); ?>

                         </a>
                     </li>
                 </ul>
               </li>
               <?php endif; ?>


               <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('superadmin')): ?>
               <li>
                   <a href="<?php echo e(route('settings.index')); ?>">
                       <i class="fa fa-cogs fa-fw"></i>
                   </a>
               </li>
               <?php endif; ?>
            </ul>
          </div>
      </nav>
       <a href="#" style="float:left" class="sidebar-toggle-mobile visible-xs btn" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <i class="fa fa-bars"></i>
      </a>
       <!-- Sidebar toggle button-->
      </header>

      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
            <li <?php echo (\Request::route()->getName()=='home' ? ' class="active"' : ''); ?>>
              <a href="<?php echo e(route('home')); ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Models\Asset::class)): ?>
            <li class="treeview<?php echo e((Request::is('hardware*') ? ' active' : '')); ?>">
                <a href="#"><i class="fa fa-barcode"></i>
                  <span><?php echo e(trans('general.assets')); ?></span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li>
                    <a href="<?php echo e(url('hardware')); ?>">
                        <?php echo e(trans('general.list_all')); ?>

                    </a>
                  </li>

                    <?php $status_navs = \App\Models\Statuslabel::where('show_in_nav', '=', 1)->get(); ?>
                    <?php if(count($status_navs) > 0): ?>
                        <li class="divider">&nbsp;</li>
                        <?php $__currentLoopData = $status_navs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status_nav): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e(route('statuslabels.show', ['id' => $status_nav->id])); ?>"}> <?php echo e($status_nav->name); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>


                  <li<?php echo (Request::query('status') == 'Deployed' ? ' class="active"' : ''); ?>>
                    <a href="<?php echo e(url('hardware?status=Deployed')); ?>"><i class="fa fa-circle-o text-blue"></i>
                        <?php echo e(trans('general.all')); ?>

                        <?php echo e(trans('general.deployed')); ?>

                    </a>
                  </li>
                  <li<?php echo (Request::query('status') == 'RTD' ? ' class="active"' : ''); ?>>
                    <a href="<?php echo e(url('hardware?status=RTD')); ?>">
                        <i class="fa fa-circle-o text-green"></i>
                        <?php echo e(trans('general.all')); ?>

                        <?php echo e(trans('general.ready_to_deploy')); ?>

                    </a>
                  </li>
                  <li<?php echo (Request::query('status') == 'Pending' ? ' class="active"' : ''); ?>><a href="<?php echo e(url('hardware?status=Pending')); ?>"><i class="fa fa-circle-o text-orange"></i>
                          <?php echo e(trans('general.all')); ?>

                          <?php echo e(trans('general.pending')); ?>

                      </a>
                  </li>
                  <li<?php echo (Request::query('status') == 'Undeployable' ? ' class="active"' : ''); ?> ><a href="<?php echo e(url('hardware?status=Undeployable')); ?>"><i class="fa fa-times text-red"></i>
                          <?php echo e(trans('general.all')); ?>

                          <?php echo e(trans('general.undeployable')); ?>

                      </a>
                  </li>
                  <li<?php echo (Request::query('status') == 'Archived' ? ' class="active"' : ''); ?>><a href="<?php echo e(url('hardware?status=Archived')); ?>"><i class="fa fa-times text-red"></i>
                          <?php echo e(trans('general.all')); ?>

                          <?php echo e(trans('admin/hardware/general.archived')); ?>

                          </a>
                  </li>
                    <li<?php echo (Request::query('status') == 'Requestable' ? ' class="active"' : ''); ?>><a href="<?php echo e(url('hardware?status=Requestable')); ?>"><i class="fa fa-check text-blue"></i>
                        <?php echo e(trans('admin/hardware/general.requestable')); ?>

                        </a>
                    </li>

                  <li class="divider">&nbsp;</li>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('checkout', \App\Models\Asset::class)): ?>
                    <li<?php echo (Request::is('hardware/bulkcheckout') ? ' class="active>"' : ''); ?>>
                        <a href="<?php echo e(route('hardware/bulkcheckout')); ?>">
                            <?php echo e(trans('general.bulk_checkout')); ?>

                        </a>
                    </li>
                    <li<?php echo (Request::is('hardware/requested') ? ' class="active>"' : ''); ?>>
                        <a href="<?php echo e(route('assets.requested')); ?>">
                            <?php echo e(trans('general.requested')); ?></a>
                    </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', \App\Models\Asset::class)): ?>
                      <li<?php echo (Request::query('Deleted') ? ' class="active"' : ''); ?>>
                          <a href="<?php echo e(url('hardware?status=Deleted')); ?>">
                              <?php echo e(trans('general.deleted')); ?>

                          </a>
                      </li>
                      <li>
                          <a href="<?php echo e(route('maintenances.index')); ?>">
                            <?php echo e(trans('general.asset_maintenances')); ?>

                          </a>
                      </li>
                      <li>
                          <a href="<?php echo e(url('hardware/history')); ?>">
                            <?php echo e(trans('general.import-history')); ?>

                          </a>
                      </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('audit', \App\Models\Asset::class)): ?>
                        <li>
                            <a href="<?php echo e(route('assets.bulkaudit')); ?>">
                                <?php echo e(trans('general.bulkaudit')); ?>

                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
              </li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\License::class)): ?>
              <li<?php echo (Request::is('licenses*') ? ' class="active"' : ''); ?>>
                  <a href="<?php echo e(route('licenses.index')); ?>">
                    <i class="fa fa-floppy-o"></i>
                    <span><?php echo e(trans('general.licenses')); ?></span>
                  </a>
              </li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Models\Accessory::class)): ?>
              <li<?php echo (Request::is('accessories*') ? ' class="active"' : ''); ?>>
                <a href="<?php echo e(route('accessories.index')); ?>">
                  <i class="fa fa-keyboard-o"></i>
                  <span><?php echo e(trans('general.accessories')); ?></span>
                </a>
              </li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Models\Consumable::class)): ?>
            <li<?php echo (Request::is('consunmables*') ? ' class="active"' : ''); ?>>
                <a href="<?php echo e(url('consumables')); ?>">
                  <i class="fa fa-tint"></i>
                  <span><?php echo e(trans('general.consumables')); ?></span>
                </a>
            </li>
             <?php endif; ?>
             <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\Components::class)): ?>
            <li<?php echo (Request::is('components*') ? ' class="active"' : ''); ?>>
                <a href="<?php echo e(route('components.index')); ?>">
                  <i class="fa fa-hdd-o"></i>
                  <span><?php echo e(trans('general.components')); ?></span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\User::class)): ?>
            <li<?php echo (Request::is('users*') ? ' class="active"' : ''); ?>>
                  <a href="<?php echo e(route('users.index')); ?>">
                      <i class="fa fa-users"></i>
                      <span><?php echo e(trans('general.people')); ?></span>
                  </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', \App\Models\Asset::class)): ?>
                <li<?php echo (Request::is('import/*') ? ' class="active"' : ''); ?>>
                    <a href="<?php echo e(route('imports.index')); ?>">
                        <i class="fa fa-cloud-download"></i>
                        <span><?php echo e(trans('general.import')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.interact')): ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-gear"></i>
                        <span><?php echo e(trans('general.settings')); ?></span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>

                    <ul class="treeview-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\Customfield::class)): ?>
                            <li <?php echo (Request::is('custom_fields*') ? ' class="active"' : ''); ?>>
                                <a href="<?php echo e(route('fields.index')); ?>">
                                    <?php echo e(trans('admin/custom_fields/general.custom_fields')); ?>

                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\Statuslabel::class)): ?>
                            <li <?php echo (Request::is('statuslabels*') ? ' class="active"' : ''); ?>>
                                <a href="<?php echo e(route('statuslabels.index')); ?>">
                                    <?php echo e(trans('general.status_labels')); ?>

                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\AssetModel::class)): ?>
                            <li>
                                <a href="<?php echo e(route('models.index')); ?>" <?php echo e((Request::is('/assetmodels') ? ' class="active"' : '')); ?>>
                                    <?php echo e(trans('general.asset_models')); ?>

                                </a>
                            </li>
                        <?php endif; ?>


                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\Category::class)): ?>
                            <li>
                                <a href="<?php echo e(route('categories.index')); ?>" <?php echo e((Request::is('/categories') ? ' class="active"' : '')); ?>>
                                    <?php echo e(trans('general.categories')); ?>

                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\Manufacturer::class)): ?>
                            <li>
                                <a href="<?php echo e(route('manufacturers.index')); ?>" <?php echo e((Request::is('/manufacturers') ? ' class="active"' : '')); ?>>
                                    <?php echo e(trans('general.manufacturers')); ?>

                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\Supplier::class)): ?>
                            <li>
                                <a href="<?php echo e(route('suppliers.index')); ?>" <?php echo e((Request::is('/suppliers') ? ' class="active"' : '')); ?>>
                                    <?php echo e(trans('general.suppliers')); ?>

                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\Department::class)): ?>
                            <li>
                                <a href="<?php echo e(route('departments.index')); ?>" <?php echo e((Request::is('/departments') ? ' class="active"' : '')); ?>>
                                    <?php echo e(trans('general.departments')); ?>

                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\Location::class)): ?>
                            <li>
                                <a href="<?php echo e(route('locations.index')); ?>" <?php echo e((Request::is('/locations') ? ' class="active"' : '')); ?>>
                                    <?php echo e(trans('general.locations')); ?>

                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\Company::class)): ?>
                            <li>
                                <a href="<?php echo e(route('companies.index')); ?>" <?php echo e((Request::is('/companies') ? ' class="active"' : '')); ?>>
                                    <?php echo e(trans('general.companies')); ?>

                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\Depreciation::class)): ?>
                            <li>
                                <a href="<?php echo e(route('depreciations.index')); ?>" <?php echo e((Request::is('/depreciations') ? ' class="active"' : '')); ?>>
                                    <?php echo e(trans('general.depreciation')); ?>

                                </a>
                            </li>
                        <?php endif; ?>

                    </ul>

                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reports.view')): ?>
            <li class="treeview<?php echo e((Request::is('reports*') ? ' active' : '')); ?>">
                <a href="<?php echo e(url('reports')); ?>"  class="dropdown-toggle">
                    <i class="fa fa-bar-chart"></i>
                    <span><?php echo e(trans('general.reports')); ?></span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu">
                    <li>
                        <a href="<?php echo e(route('reports.activity')); ?>" <?php echo e((Request::is('reports/activity') ? ' class="active"' : '')); ?>>
                            <?php echo e(trans('general.activity_report')); ?>

                        </a>
                    </li>

                    <li><a href="<?php echo e(route('reports.audit')); ?>" <?php echo e((Request::is('reports.audit') ? ' class="active"' : '')); ?>>
                            <?php echo e(trans('general.audit_report')); ?></a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('reports/depreciation')); ?>" <?php echo e((Request::is('reports/depreciation') ? ' class="active"' : '')); ?>>
                            <?php echo e(trans('general.depreciation_report')); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('reports/licenses')); ?>" <?php echo e((Request::is('reports/licenses') ? ' class="active"' : '')); ?>>
                            <?php echo e(trans('general.license_report')); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('reports/asset_maintenances')); ?>" <?php echo e((Request::is('reports/asset_maintenances') ? ' class="active"' : '')); ?>>
                            <?php echo e(trans('general.asset_maintenance_report')); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('reports/unaccepted_assets')); ?>" <?php echo e((Request::is('reports/unaccepted_assets') ? ' class="active"' : '')); ?>>
                            <?php echo e(trans('general.unaccepted_asset_report')); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('reports/accessories')); ?>" <?php echo e((Request::is('reports/accessories') ? ' class="active"' : '')); ?>>
                            <?php echo e(trans('general.accessory_report')); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('reports/custom')); ?>" <?php echo e((Request::is('reports/custom') ? ' class="active"' : '')); ?>>
                            <?php echo e(trans('general.custom_report')); ?>

                        </a>
                    </li>
                </ul>
            </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewRequestable', \App\Models\Asset::class)): ?>
            <li<?php echo (Request::is('account/requestable-assets') ? ' class="active"' : ''); ?>>
            <a href="<?php echo e(route('requestable-assets')); ?>">
            <i class="fa fa-laptop"></i>
            <span><?php echo e(trans('admin/hardware/general.requestable')); ?></span>
            </a>
            </li>
            <?php endif; ?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->

      <div class="content-wrapper">

          <?php if($debug_in_production): ?>
              <div class="row" style="margin-bottom: 0px; background-color: red; color: white; font-size: 15px;">
                  <div class="col-md-12" style="margin-bottom: 0px; background-color: #b50408 ; color: white; padding: 10px 20px 10px 30px; font-size: 16px;">
                      <i class="fa fa-warning fa-3x pull-left"></i> <strong><?php echo e(strtoupper(trans('general.debug_warning'))); ?>:</strong>
                      <?php echo trans('general.debug_warning_text'); ?>

                  </div>
              </div>
      <?php endif; ?>

        <!-- Content Header (Page header) -->
        <section class="content-header" style="padding-bottom: 30px;">
          <h1 class="pull-left">
            <?php echo $__env->yieldContent('title'); ?>


          </h1>
          <div class="pull-right">
            <?php echo $__env->yieldContent('header_right'); ?>
          </div>



        </section>


        <section class="content">
          <!-- Notifications -->
          <div class="row">
              <?php if(config('app.lock_passwords')): ?>
                  <div class="col-md-12">
                      <div class="callout callout-info">
                          <?php echo e(trans('general.some_features_disabled')); ?>

                      </div>
                  </div>
              <?php endif; ?>

          <?php echo $__env->make('notifications', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          </div>


          <!-- Content -->
            <div id="<?php echo (Request::is('*api*') ? 'app' : 'webui'); ?>">
          <?php echo $__env->yieldContent('content'); ?>
            </div>

        </section>

      </div><!-- /.content-wrapper -->

      <footer class="main-footer hidden-print">
        <div class="pull-right hidden-xs">
          <b>Version</b> <?php echo e(config('version.app_version')); ?> - build <?php echo e(config('version.build_version')); ?> (<?php echo e(config('version.branch')); ?>)
          <a target="_blank" class="btn btn-default btn-xs" href="https://snipe-it.readme.io/docs/overview" rel="noopener">User's Manual</a>
          <a target="_blank" class="btn btn-default btn-xs" href="https://snipeitapp.com/support/" rel="noopener">Report a Bug</a>
        </div>
        <a target="_blank" href="https://snipeitapp.com" rel="noopener">Snipe-IT</a> is an open source
          project, made with <i class="fa fa-heart" style="color: #a94442; font-size: 10px"></i> by <a href="https://twitter.com/snipeitapp" rel="noopener">@snipeitapp</a> under the <a href="https://www.gnu.org/licenses/agpl-3.0.en.html" rel="noopener">AGPL3 license</a>.
      </footer>



    </div><!-- ./wrapper -->


    <!-- end main container -->

    <div class="modal  modal-danger fade" id="dataConfirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                <form method="post" id="deleteForm" role="form">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('DELETE')); ?>


                    <button type="button" class="btn btn-default  pull-left" data-dismiss="modal"><?php echo e(trans('general.cancel')); ?></button>
                    <button type="submit" class="btn btn-outline" id="dataConfirmOK"><?php echo e(trans('general.yes')); ?></button>
                </form>
                </div>
            </div>
        </div>
    </div>



    <script src="<?php echo e(url(mix('js/dist/all.js'))); ?>" nonce="<?php echo e(csrf_token()); ?>"></script>

    <?php $__env->startSection('moar_scripts'); ?>
    <?php echo $__env->yieldSection(); ?>

    <script nonce="<?php echo e(csrf_token()); ?>">
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
            $('.select2 span').addClass('needsclick');

            // This javascript handles saving the state of the menu (expanded or not)
            $('body').bind('expanded.pushMenu', function() {
                $.ajax({
                    type: 'GET',
                    url: "<?php echo e(route('account.menuprefs', ['state'=>'open'])); ?>",
                    _token: "<?php echo e(csrf_token()); ?>"
                });

            });

            $('body').bind('collapsed.pushMenu', function() {
                $.ajax({
                    type: 'GET',
                    url: "<?php echo e(route('account.menuprefs', ['state'=>'close'])); ?>",
                    _token: "<?php echo e(csrf_token()); ?>"
                });
            });

        });

        // Initiate the ekko lightbox
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });



    </script>

    <?php if((Session::get('topsearch')=='true') || (Request::is('/'))): ?>
    <script nonce="<?php echo e(csrf_token()); ?>">
         $("#tagSearch").focus();
    </script>
    <?php endif; ?>

  </body>
</html>
