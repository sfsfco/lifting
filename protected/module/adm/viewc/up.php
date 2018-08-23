<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="shortcut icon" href="<?php echo Doo::conf()->APP_URL; ?>global/images/zekky.ico" type="image/x-icon" />
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo play::prefrances('site_name');?> | Admin Panel - <?php echo $data['title']; ?></title>


    <!-- Custom Theme Style -->
    <link href="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>build/css/custom.min.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>build/css/custom.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>" class="site_title">
              <img src="<?php echo Doo::conf()->APP_URL; ?>global/uploads/prefrances/<?php echo play::prefrances('logo') ?>"/></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">

                <img src="<?php echo Doo::conf()->APP_URL; ?>global/uploads/users/150X150_<?php echo $_SESSION['username']['pic']; ?>.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $_SESSION['username']['first_name'].' '.$_SESSION['username']['last_name']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/menu.php"); ?>
            
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Prefrances" href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>prefrances">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <!--
              <a data-toggle="tooltip" data-placement="top" title="FullScreen" onclick="fullscreen();">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              -->
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>login/logout" onclick="return confirm('Logout ?')">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
<img src="<?php echo Doo::conf()->APP_URL; ?>global/uploads/users/150X150_<?php echo $_SESSION['username']['pic']; ?>.jpg" alt="..." >
                    <?php echo $_SESSION['username']['first_name'].' '.$_SESSION['username']['last_name']; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>users/edit/<?php echo $_SESSION['username']['id']; ?>/profile"> Profile</a></li>
                    <li>
                      <a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>prefrances">
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>login/logout" onclick="return confirm('Logout ?')" ><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <?php $messages=play::new_message();
                      if(count($messages)>0){echo '<span class="badge bg-green">'.count($messages).'</span>';}
                    ?>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                  <?php foreach($messages as $message){ ?>
                    <li>
                      <a  href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>contact/read/<?php echo $message->id; ?>">
                        <span>
                          <span><?php echo $message->email;  ?></span>
                          <span class="time"><?php echo play::humanTiming($message->create_date).' Ago'; ?></span>
                        </span>
                        <span class="message">
                          <?php echo $message->subject;  ?>
                        </span>
                      </a>
                    </li>
                    <?php } ?>
                    <li>
                      <div class="text-center">
                        <a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>contact/">
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main" id="right_col">