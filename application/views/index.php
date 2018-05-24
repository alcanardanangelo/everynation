<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>EveryNation</title>

  <!-- Bootstrap Core CSS -->
  <link href="<?php echo site_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="<?php echo site_url(); ?>/assets/css/metisMenu.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="<?php echo site_url(); ?>/assets/css/startmin.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="<?php echo site_url(); ?>/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo site_url(); ?>/assets/css/custom.css" rel="stylesheet" type="text/css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

</head>
<body>

<div id="wrapper">

  <!-- Navigation -->
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo site_url('home'); ?>">
        <img src="<?php echo site_url(); ?>/assets/css/images/logo.png" alt="" width="100">
      </a>
    </div>

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>


    <div class="navbar-default sidebar" role="navigation">
      <div class="sidebar-nav navbar-collapse">
        <a href="<?php echo site_url('home'); ?>"><img src="<?php echo site_url(); ?>/assets/css/images/bg.jpg" alt="" id="sidebar-logo"></a>
        <ul class="nav" id="side-menu">
          <li>

            <a href="<?php echo site_url('attendance'); ?>"><i class="fa fa-calendar fa-fw"></i>&nbsp&nbspAttendance</a>
          </li>
          
                    <li>

            <a href="<?php echo site_url('attendance-per-class'); ?>"><i class="fa fa-calendar fa-fw"></i>&nbsp&nbspAttendance Per Class</a>
          </li>
          <li>

            <a href="<?php echo site_url('discipleship-journey'); ?>"><i class="fa fa-book fa-fw"></i>&nbsp&nbspDiscipleship Journey</a>

          </li>
          <li>
            <a href="<?php echo site_url('class-registration'); ?>"><i class="fa fa-users fa-fw"></i>&nbsp&nbspClass Registration</a>
          </li>
          <li>
            <a href="<?php echo site_url('registration'); ?>"><i class="fa fa-folder-open fa-fw"></i>&nbsp&nbspRegistration</a>
          </li>

          <li>
            <a href="<?php echo site_url('text-blast'); ?>"><i class="fa fa-envelope-o fa-fw"></i>&nbsp&nbspText Blast</a>
          </li>

          <li>
            <a href="<?php echo site_url('users'); ?>"><i class="fa fa-wrench fa-fw"></i>&nbsp&nbspUser Management</a>
          </li>
          <li>
            <a href="#"><i class="fa fa-database fa-fw"></i>&nbsp&nbspMasterdata Maintenance<span class="fa arrow"></a>
            <ul class="nav nav-second-level">
              <li>
                <a href="<?php echo site_url('maintenance/journey'); ?>">Journey</a>
              </li>
              <li>
                <a href="<?php echo site_url('maintenance/school'); ?>">School / Campus</a>
              </li>
              <li>
                <a href="<?php echo site_url('maintenance/member-type'); ?>">Member Type</a>
              </li>
              <li>
                <a href="<?php echo site_url('maintenance/monthly-topic'); ?>">Monthly Topic</a>
              </li>

              <li>
                <a href="<?php echo site_url('maintenance/class'); ?>">Class</a>
              </li>

              <li>
                <a href="<?php echo site_url('maintenance/status'); ?>">Status</a>
              </li>
            </ul>
            <!-- /.nav-second-level -->
          </li>

          <li>
            <a href="<?php echo site_url('logout'); ?>"><i class="fa fa-sign-out fa-fw"></i>&nbsp&nbspLogout</a>
          </li>
        </ul>
      </div>
      <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
  </nav>

  <!-- Page Content -->
  <div id="page-wrapper">
    <div class="container-fluid">
      <?php $this->load->view($main_view); ?>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="<?php echo site_url(); ?>/assets/js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo site_url(); ?>/assets/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo site_url(); ?>/assets/js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo site_url(); ?>/assets/js/startmin.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="<?php echo site_url(); ?>/assets/js/custom.js"></script>

</body>
</html>
