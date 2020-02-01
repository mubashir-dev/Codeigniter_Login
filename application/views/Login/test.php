<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Codeigniter Ajax Curd</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">

</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<a class="navbar-brand" href="#">AJAX CODEIGBITER CURD</a>
		<button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
			aria-expanded="false" aria-label="Toggle navigation"></button>
		<div class="collapse navbar-collapse" id="collapsibleNavId">
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<li class="nav-item active">
					<a class="nav-link" href="#"><i class="fa fa-facebook" aria-hidden="true"></i> <span class="sr-only">(current)</span></a>
				</li>
				<div class="nav-item">
				<a class="nav-link" href="https://www.facebook.com/mubashiraliSE">Facebook</a>
				</div>
				<li class="nav-item">
					<a class="nav-link" href="#">Gmail</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Linkedin</a>
				</li>
			</ul>
			
		</div>
	</nav>	

	<!--Navbar-->
	<div class="container mt-5">
		<div class="row">
			<div class="col-md-6">
				<h4>Student Information</h4>
			</div>
			<div class="col-md-6 text-right">
				<button class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter" onclick="showModal()">Create</button>
			</div>
		</div>
		<!--Table For Display Data-->
		<div class="col-md-12">
			<table class="table table-bordered table-striped  table-light mt-3" id="StudentModelList">
				<thead class="thead-light">
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Father Name</th>
						<th>Email</th>
						<th>Address</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if (!empty($rows)) { ?>

						<?php foreach ($rows as $row) { ?>
							<?php $data['row'] = $row; ?>
							<?php $this->load->view('Student/Student_row', $data); ?>


						<?php }
					} else { ?>
						<td>Recored Not Found</td>
					<?php } ?>
				</tbody>
			</table>
			<tbody>
				<tr>

				</tr>
			</tbody>
			</table>
		</div>

		<!--Modal For Adding Data-->
		<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalCenterTitle">Add Student</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body" id="form_modal_body">
					</div>
				</div>
			</div>
		</div>
		<!--End of Adding Data Model-->
		<!-- Modal For Update -->
		<div class="modal fade" id="updateStudentModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalCenterTitle">Add Student</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body" id="update_modal_body">
					</div>
				</div>
			</div>
		</div>
		<!-- End of Update Modal -->

		<!-- Modal For Confirming Delete Opreation -->
		<div class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalCenterTitle">Alert</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body" id="update_modal_body">
						Are You Sure To Delete This Recore ?
					</div>
					<div class="modal-footer">
						<button class="btn btn-success" data-dismiss="#deleteConfirm"">Close</button>
						<button class="btn btn-danger" id="delete_button">Delete</button>
					</div>

				</div>
			</div>
		</div>

		<!-- End of Modal -->
	</div>
	<!--End of Main Container-->
	<!--End of Navbar-->
	<!--Message Dialog-->
	<div class="modal" tabindex="-1" role="dialog" id="hello">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Alert</h5>
					<button type="button" class="close" data-dismiss="hello" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" id="msg_body">
					<p class="alert alert-success">Data Successfully Inserted</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="hello" id="hello_btn">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!--End of Message 	Dialog-->
	<script src="<?php echo base_url(); ?>assets/js/jqurey.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>

	<script>
		function showModal() {

			$.ajax({
				url: '<?php echo base_url() . 'index.php/StudentController/showCreateForm'; ?>',
				method: 'POST',
				data: {},
				dataType: 'json',
				success: function(response) {
					//console.log(response['html']);
					$("#form_modal_body").html(response['html']);
				},
				error: function(error) {
					console.log(error);
				}
			});
			$("body").on("submit", "#CreateStudentModel", function(e) {
				e.preventDefault();
				$.ajax({
					url: '<?php echo base_url() . 'index.php/StudentController/saveStudentModel'; ?>',
					method: 'POST',
					data: $("#CreateStudentModel").serializeArray(),
					dataType: 'json',
					success: function(response) {
						if (response['status'] == 0) {
							if (response['name'] != "") {
								$(".nameError").html(response['name']).addClass("invalid-feedback d-block");
								$("#name").addClass('is-invalid');

							} else {
								$(".nameError").html("").removeClass("invalid-feedback d-block");
								$("#name").removeClass('is-invalid');
								$("#name").addClass('is-valid');

							}
							if (response['father_name'] != "") {
								$(".fatnError").html(response['father_name']).addClass("invalid-feedback d-block");
								$("#father_name").addClass('is-invalid');
							} else {
								$(".fatnError").html("").removeClass("invalid-feedback d-block");
								$("#father_name").removeClass('is-invalid');
								$("#father_name").addClass('is-valid');

							}
							if (response['email'] != "") {
								$(".emailError").html(response['email']).addClass("invalid-feedback d-block");
								$("#Email").addClass('is-invalid');
							} else {
								$(".emailError").html("").removeClass("invalid-feedback d-block");
								$("#Email").removeClass('is-invalid');
								$("#Email").addClass('is-valid');

							}
							if (response['address'] != "") {
								$(".addressError").html(response['address']).addClass("invalid-feedback d-block");
								$("#address").addClass('is-invalid');
							} else {
								$(".addressError").html("").removeClass("invalid-feedback d-block");
								$("#address").removeClass('is-invalid');
								$("#address").addClass('is-valid');

							}
						} else {
							//Remove Address Error
							$(".addressError").html("").removeClass("invalid-feedback d-block");
							$("#address").removeClass('is-invalid');
							$("#address").addClass('is-valid');
							//Remove Email Error
							$(".emailError").html("").removeClass("invalid-feedback d-block");
							$("#Email").removeClass('is-invalid');
							$("#Email").addClass('is-valid');
							//Remove Name Error
							$(".nameError").html("").removeClass("invalid-feedback d-block");
							$("#name").removeClass('is-invalid');
							$("#name").addClass('is-valid');
							//Remove Father Name Error
							$(".fatnError").html("").removeClass("invalid-feedback d-block");
							$("#father_name").removeClass('is-invalid');
							$("#father_name").addClass('is-valid');
							$("#exampleModalCenter").hide();
							$("#msg_body").html(response['message']);
							$("#hello").show();
							$("#hide_msg").on("click", function(e) {
								//e.preventDefault();
								$("#hello").hide();
								$('body').removeClass('modal-open');
								$('.modal-backdrop').remove();

							});
							//Adding Row To Table

							$("#StudentModelList").append(response['row']);
							//alert("Data Inserted Successfully");
						}
						// console.log(response);
					},
					error: function(error) {
						console.log(error);
					}
				});
			});
		}
		//JS Method for editing Data
		function showUpdateForm(id) {

			$.ajax({
				url: '<?php echo base_url() . 'index.php/StudentController/getStudentForm/'; ?>' + id,
				method: 'POST',
				data: {},
				dataType: 'json',
				success: function(response) {
					console.log(response['html']);
					//
					$("#update_modal_body").html(response['html']);
				},
				error: function(error) {
					console.log(error);
				}
			});
		}
		//End of Method Loading Form In Modal

		$("body").on("submit", "#UpdateStudentModel", function(event) {
			event.preventDefault();
			$.ajax({
				url: '<?php echo base_url() . 'index.php/StudentController/updateStudentModel'; ?>',
				method: 'POST',
				data: $("#UpdateStudentModel").serializeArray(),
				dataType: 'json',
				success: function(response) {
					if (response['status'] == 0) {
						if (response['name'] != "") {
							$(".nameError").html(response['name']).addClass("invalid-feedback d-block");
							$("#name").addClass('is-invalid');

						} else {
							$(".nameError").html("").removeClass("invalid-feedback d-block");
							$("#name").removeClass('is-invalid');
							$("#name").addClass('is-valid');

						}
						if (response['father_name'] != "") {
							$(".fatnError").html(response['father_name']).addClass("invalid-feedback d-block");
							$("#father_name").addClass('is-invalid');
						} else {
							$(".fatnError").html("").removeClass("invalid-feedback d-block");
							$("#father_name").removeClass('is-invalid');
							$("#father_name").addClass('is-valid');

						}
						if (response['email'] != "") {
							$(".emailError").html(response['email']).addClass("invalid-feedback d-block");
							$("#Email").addClass('is-invalid');
						} else {
							$(".emailError").html("").removeClass("invalid-feedback d-block");
							$("#Email").removeClass('is-invalid');
							$("#Email").addClass('is-valid');

						}
						if (response['address'] != "") {
							$(".addressError").html(response['address']).addClass("invalid-feedback d-block");
							$("#address").addClass('is-invalid');
						} else {
							$(".addressError").html("").removeClass("invalid-feedback d-block");
							$("#address").removeClass('is-invalid');
							$("#address").addClass('is-valid');

						}
					} else {
						//Remove Address Error
						$(".addressError").html("").removeClass("invalid-feedback d-block");
						$("#address").removeClass('is-invalid');
						$("#address").addClass('is-valid');
						//Remove Email Error
						$(".emailError").html("").removeClass("invalid-feedback d-block");
						$("#Email").removeClass('is-invalid');
						$("#Email").addClass('is-valid');
						//Remove Name Error
						$(".nameError").html("").removeClass("invalid-feedback d-block");
						$("#name").removeClass('is-invalid');
						$("#name").addClass('is-valid');
						//Remove Father Name Error
						$(".fatnError").html("").removeClass("invalid-feedback d-block");
						$("#father_name").removeClass('is-invalid');
						$("#father_name").addClass('is-valid');
						$("#updateStudentModel").hide();
						$("#msg_body").html(response['message']);
						$("#hello").show();
						$("#hide_msg").on("click", function(e) {
							//e.preventDefault();
							$("#hello").hide();
							$('body').removeClass('modal-open');
							$('.modal-backdrop').remove();

						});
						//Adding Row To Table
						var id = response['row']['student_id'];
						$("#StudentModelList").append(response['row']);
						$("#row-" + id + " .modelname").html(response['row']['student_name']);
						$("#row-" + id + " .modelfather_name").html(response['row']['father_name']);
						$("#row-" + id + " .modelemail").html(response['row']['email']);
						$("#row-" + id + " .modeladdress").html(response['row']['address']);
						//alert("Data Inserted Successfully");
					}
					// console.log(response);
				},
				error: function(error) {
					console.log(error);
				}
			});

		});


		//Function To Delete Recored//

		function deleteRecored(id)
		{
			console.log(id);
			$("#deleteConfirm").modal('show');
			$("#deleteConfirm").data("id",id);
			$("body").on('click','#delete_button',function(e)
		{
			$.ajax({
				url: '<?php echo base_url() . 'index.php/StudentController/deleteStudent/'; ?>' + id,
				method: 'POST',
				data: {},
				dataType: 'json',
				success: function(response) {
					
					console.log(response['message']);
					$("#deleteConfirm").modal("hide");
					// $("#update_modal_body").html(response['message']);
					$("#hello  .modal-body").html(response['message']);
					$("#hello").show();


				},
				error: function(error) {
					console.log(error);
				}
			});
			
		});

		}


		//hide Notification Modal 

		$("#hello_btn").on("click",function(e){
			console.log("cLICKED");
			$("#hello").hide();
		});


		

	</script>
</body>

</html>
