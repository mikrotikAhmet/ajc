<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Perfex - Installation</title>
	<link href="<?php echo site_url(); ?>assets/css/reset.css" rel="stylesheet">
	<link href="<?php echo site_url(); ?>bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href='<?php echo site_url(); ?>bower_components/open-sans-fontface/open-sans.css' rel='stylesheet' type='text/css'>
  <link href='<?php echo site_url(); ?>assets/css/bs-overides.css' rel='stylesheet' type='text/css'>
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- danger: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <style>
        body {
          font-family:'Open Sans';
        }
        .install-row {
          border:1px solid #e4e5e7;
          border-radius:2px;
          background:#fff;
          padding:15px;
        }
        .logo {
          margin-top:50px;
          background:#444a52;
          padding:15px;
          display:inline-block;
          width:100%;
          border-radius:2px;
          margin-bottom:5px;
        }
        .logo img {
          display:block;
          margin:0 auto;
        }
        .control-label {
          font-weight:600;
        }
        .padding-10 {
          padding:10px;
        }
        .mbot15 {
          margin-bottom:15px;
        }
        .bg-default {
          background: #28B8DA;
          color:#fff;
          border:1px solid #28B8DA;
        }
        .bg-not-passed {
          border:1px solid #e4e5e7;
          border-radius:2px;
        }
        .bold {
          font-weight:600;
        }
      </style>
    </head>
    <body>
     <div class="container">
      <div class="row">

       <div class="col-md-8 col-md-offset-2">
        <div class="logo">
          <img src="<?php echo site_url('uploads/company/logo.png'); ?>">
        </div>
        <div class="install-row">
          <div class="col-md-3 text-center <?php if($passed_steps[1] == true || $step == 1){echo 'bg-default';} ?> padding-10 mbot15">
            <h5>Requirements</h5>
          </div>
          <div class="col-md-3 text-center <?php if($passed_steps[2] || $step == 2){echo 'bg-default';} else {echo 'bg-not-passed';} ?> padding-10 mbot15">
           <h5> Database setup</h5>
         </div>
         <div class="col-md-3 text-center <?php if($passed_steps[3] || $step == 3){echo 'bg-default';} else {echo 'bg-not-passed';} ?> padding-10 mbot15">
           <h5> Install</h5>
         </div>
         <div class="col-md-3 text-center <?php if($step == 4){echo 'bg-default';}else {echo 'bg-not-passed';} ?> padding-10 mbot15">
           <h5> Finish</h5>
         </div>
         <div class="clearfix"> </div>
         <hr />
         <p><?php echo $debug; ?></p>
         <?php if(isset($error) && $error != ''){ ?>
         <div class="alert alert-danger text-center">
           <?php echo $error; ?>
         </div>
         <?php } ?>
         <?php if($step == 1){
           include_once('requirements.php');
         }
         ?>
         <?php if($step == 2){ ?>
         <?php echo form_open($this->uri->uri_string()); ?>
         <?php echo form_hidden('step',$step); ?>
         <div class="form-group">
          <label for="hostname" class="control-label">Hostname</label>
          <input type="text" class="form-control" name="hostname" value="localhost">
        </div>
        <div class="form-group">
          <label for="database" class="control-label">Database Name</label>
          <input type="text" class="form-control" name="database">
        </div>
        <div class="form-group">
          <label for="username" class="control-label">Username</label>
          <input type="text" class="form-control" name="username">
        </div>
        <div class="form-group">
          <label for="password" class="control-label">Password</label>
          <input type="text" class="form-control" name="password">
        </div>
        <div class="text-center">
         <button type="submit" class="btn btn-primary">Check Database</button>
       </div>
       <?php echo form_close(); ?>
       <?php } else if($step == 3){ ?>
       <?php echo form_open($this->uri->uri_string()); ?>
       <?php echo form_hidden('step',$step); ?>
       <div class="form-group">
         <label for="admin_email" class="control-label">Email</label>
         <input type="email" class="form-control" name="admin_email" id="admin_email">
       </div>
       <div class="form-group">
        <label for="admin_password" class="control-label">Password</label>

        <input type="password" class="form-control" name="admin_password" id="admin_password">
      </div>
      <div class="form-group">
        <label for="admin_passwordr" class="control-label">Repeat Password</label>
        <input type="password" class="form-control" name="admin_passwordr" id="admin_passwordr">
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary">Install</button>
      </div>
      <?php echo form_close(); ?>

      <?php } else if($step == 4){ ?>
      <h4 class="bold">Installation successful!</h4>
      <p>You need to delete the install directory.</p>
      <a href="<?php echo site_url('install/make/delete_install_dir'); ?>" class="btn btn-primary">Delete Install Directory and Login</a>
      <?php } ?>
    </div>
  </div>
</div>
</div>
</body>
</html>

