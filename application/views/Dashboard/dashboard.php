<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
	<title>Dashboard</title>
</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
  <!-- <a class="navbar-brand mr-auto mr-lg-0" href="#">Codeigniter Login System</a> -->
  <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-success" href="#">Welcome <?php echo $user['name'];  ?> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Notifications</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Profile</a>
	  </li>
	  <li class="nav-item">
        <a class="nav-link" href="#">Change Password</a>
      </li>
      <li class="nav-item text-right">
        <a class="nav-link" href="#">Switch account</a>
      </li>
	  <li class="nav-item"><a class="nav-link" href="<?php echo base_url()."index.php/AuthController/logout";   ?>">Logout</a></li>
    </ul>
  </div>
</nav>
<!-- Adding JS Files -->
<script src="<?php echo base_url();?>assets/js/jqurey.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
<!-- End of Adding Files -->
</body>
</html>
