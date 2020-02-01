<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Registration </title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">

</head>

<body>
	<div class="container mt-4">

	<!-- Message  -->
	<?php
	$msg=$this->session->flashdata('msg');
	if($msg != "")
	{
		echo "<div class='alert alert-success'>$msg</div>";
	}

	?>
	<!-- End of Message -->
		<div class="row mt-4">
			<div class="col-md-6">
			<h3>Register Now</h3>
				<form action="<?php echo base_url().'index.php/AuthController/register' ?>" name="registerForm" method="post">
					<div class="form-group">
						<label for="name">Name</label>
						<input id="name" class="form-control <?php echo  (strip_tags(form_error('name')) !="") ? 'is-invalid':'';  ?>" type="text" name="name">
						<p class="invalid-feedback  d-block"><?php echo strip_tags(form_error('name'));?></p>
					</div>
					<div class="form-group">
						<label for="username">Username</label>
						<input id="username" class="form-control <?php echo  (strip_tags(form_error('name')) !="") ? 'is-invalid':'';  ?>" type="text" name="username">
						<p class="invalid-feedback d-block"><?php echo strip_tags(form_error('username')); ?></p>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input id="email" class="form-control <?php echo  (strip_tags(form_error('name')) !="") ? 'is-invalid':'';  ?>" type="email" name="Email">
						<p class="invalid-feedback  d-block"><?php echo strip_tags(form_error('Email'));?></p>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input id="password" class="form-control <?php echo  (strip_tags(form_error('name')) !="") ? 'is-invalid':'';  ?>" type="password" name="password">
						<p class="invalid-feedback  d-block"><?php echo strip_tags(form_error('password'));?></p>
					</div>
					<div class="form-group">
						<label for="confirm_password">Confirm Password</label>
						<input id="confirm_password" class="form-control" type="text" name="confirm_password">
					</div>
					<button class="btn btn-primary btn-block" type="submit">Register Now</button>
				</form>
			</div>
		</div> <!--End of Row-->
	</div>
	<!-- Adding js Files -->
	<script src="<?php echo base_url(); ?>assets/js/jqurey.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
	<!-- End of Adding js Files -->
</body>

</html>
