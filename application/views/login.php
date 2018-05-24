<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <style>
    body {
      background: url("<?php echo site_url(); ?>/assets/css/images/bg2.jpg");
      background-size: cover;
    }

    .login {
      margin-top: 80px;
    }
  </style>

  <title>Every Nation</title>

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
</head>
<body>

<div class="container">
  <div class="row login">
    <div class="col-md-4 col-md-offset-4">
      <?php if ($this->session->flashdata('message')): ?>
        <p class="alert alert-success"><?php echo $this->session->flashdata('message'); ?></p>
      <?php endif; ?>
      <div class="login-panel panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Login</h3>
        </div>
        <div class="panel-body">
          <?php echo form_open(''); ?>
          <fieldset>
            <div class="form-group">
              <label for="username">Username</label>
              <input class="form-control" name="username" type="text" value="admin" autofocus>
              <small class="help-block error-message"><?php echo form_error('username'); ?></small>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input class="form-control" name="password" type="password" value="admin">
              <small class="help-block error-message"><?php echo form_error('password'); ?></small>
            </div>

            <!-- Change this to a button or input when using this as a form -->
            <input type="submit" value="Login" class="btn btn-lg btn-success btn-block">
            <a href="<?php echo site_url('register/guest'); ?>" class="btn btn-lg btn-primary btn-block">Guest
              Registration</a>

          </fieldset>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="<?php echo site_url(); ?>/assets/js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo site_url(); ?>/assets/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo site_url(); ?>/assets/js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo site_url(); ?>/assets/js/startmin.js"></script>

</body>
</html>
