<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>EveryNation</title>
  <style>
    body {
      background: url("<?php echo site_url(); ?>/assets/css/images/bg2.jpg");
      background-size: cover;
    }

    .login {
      margin-top: 80px;
    }
  </style>

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
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header"><?php echo $title; ?></h3>
      <?php echo form_open('register/guest'); ?>
      <div class="row">
        <div class="col-lg-4">
          <div class="form-group">
            <label for="firstname">Firstname</label>
            <input type="text" class="form-control" name="firstname" id="firstname">
            <small class="help-block error-message"><?php echo form_error('firstname'); ?></small>
          </div>


          <div class="form-group">
            <label for="street">Street</label>
            <input type="text" class="form-control" name="street" id="street">
            <small class="help-block error-message"><?php echo form_error('street'); ?></small>
          </div>

          <div class="form-group">
            <label for="barangay">Barangay</label>
            <input type="text" class="form-control" name="barangay" id="barangay">
            <small class="help-block error-message"><?php echo form_error('barangay'); ?></small>
          </div>

          <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" name="city" id="city">
            <small class="help-block error-message"><?php echo form_error('city'); ?></small>
          </div>

          <div class="form-group">
            <label for="province">Province</label>
            <input type="text" class="form-control" name="province" id="province">
            <small class="help-block error-message"><?php echo form_error('province'); ?></small>
          </div>

          <div class="form-group">
            <label for="birthday">Birthday</label>
            <input type="text" class="form-control" name="birthday" id="birthday">
            <small class="help-block error-message"><?php echo form_error('birthday'); ?></small>
          </div>
        </div>
        <div class="col-lg-4">

          <div class="form-group">
            <label for="lastname">Lastname</label>
            <input type="text" class="form-control" name="lastname" id="lastname">
            <small class="help-block error-message"><?php echo form_error('lastname'); ?></small>
          </div>


          <div class="form-group">
            <label for="school_id">School / Campus</label>
            <select class="form-control" name="school_id" id="school_id">
              <option value="">--</option>
              <?php foreach ($school

                             as $key => $value): ?>
                <option value="<?php echo $value['school_id']; ?>"><?php echo $value['school_name']; ?></option>

              <?php endforeach; ?>
            </select>
            <small class="help-block error-message"><?php echo form_error('school_id'); ?></small>
          </div>

          <div class="form-group">
            <label for="contact_no">Contact Number</label>
            <input type="number" class="form-control" name="contact_no" id="contact_no">
            <small class="help-block error-message"><?php echo form_error('contact_no'); ?></small>
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email">
            <small class="help-block error-message"><?php echo form_error('email'); ?></small>
          </div>


        </div>
      </div>
      <input type="submit" value="Save" class="btn btn-primary">

      <?php echo form_close(); ?>
    </div>
  </div>
</div>
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
