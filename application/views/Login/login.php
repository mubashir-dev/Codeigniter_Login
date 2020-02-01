<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/login.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
</head>
<body class="text-center">
<form class="form-signin" action="<?php echo base_url().'index.php/AuthController/login'; ?>" name="LoginForm" method="POST">

	<?php
	$msg=$this->session->flashdata('msg');
	if($msg !="")
	{
		echo '<div class="alert alert-danger">'.$msg .'</div>';
	}
	?>

	<h1 class="h3 mb-3 font-weight-normal">Sign In</h1>
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="email" id="inputEmail" class="form-control" placeholder="Email address" autofocus name="email">
	<p class="invalid-feedback d-block"><?php echo strip_tags(form_error('email'));?></p>
	<label for="inputPassword" class="sr-only">Password</label>
  <input type="password" id="inputPassword" class="form-control" placeholder="Password"  name="password">
	<p class="invalid-feedback d-block"><?php echo strip_tags(form_error('password'));?></p>

  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  <p class="mt-5 mb-3 text-muted"><a href="https://www.facebook.com/mubashiraliSE">Sardar Mubashir Ali</a></p>
</form>
<!-- Adding JS Files -->
<script src="<?php echo base_url();?>assets/js/jqurey.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
<!-- End of Adding Files -->
</body>
</html>
