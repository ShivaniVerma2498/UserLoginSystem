<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
include_once('connection.php');
if($_SESSION['login'])
{
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>User Profile</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"
        type="text/css" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
	<style>
	.user-row {
	  margin-bottom: 14px;
	}

	.table-user-information > tbody > tr {
	  border-top: 1px solid #ccc;
	}

	.table-user-information > tbody > tr:first-child {
	  border-top: 0;
	}

	.table-user-information > tbody > tr > td {
	  border-top: 0;
	}

	.panel {
	  margin-top: 20px;
	}
	.dropdown {
	  position: relative;
	  display: inline-block;
	}

	.dropdown-content {
	  display: none;
	  position: absolute;
	  background-color: #f9f9f9;
	  min-width: 160px;
	  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	  z-index: 1;
	}

	.dropdown-content a {
	  color: black;
	  padding: 12px 16px;
	  text-decoration: none;
	  display: block;
	}

	.dropdown-content a:hover {background-color: #f1f1f1}

	.dropdown:hover .dropdown-content {
	  display: block;
	}

	.dropdown:hover .dropbtn {
	  background-color: #3e8e41;
	}
	.arrow {
	  border: solid white;
	  border-width: 0 3px 3px 0;
	  display: inline-block;
	  padding: 4px;
	}
	.down {
	  transform: rotate(45deg);
	  -webkit-transform: rotate(45deg);
	}
	
	</style>
</head>

<body>
    <!-- Navigation-->
    <!-- Navigation-->
    <nav class="navbar navbar-light bg-light static-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">Shivani</a>

            <div class="nav-link">
                <!-- Button trigger modal -->
				<div class="dropdown">
				  <button class="btn btn-primary">User Profile &nbsp;&nbsp;<i class="arrow down"></i></button>
				  <div class="dropdown-content">
				  <a href="userprofile.php">Edit Profile</a>
				  <a href="logout.php">Logout</a>
				  </div>
				</div>
            </div>

        </div>
    </nav>
    
    <!-- Testimonials-->
    <section class="testimonials text-center bg-white">
        <div class="container">
            <h2 class="mb-5">Hi <?php echo $_SESSION['login'];?></h2>
            <div class="row">
			    <div class="col-xs-12 col-sm-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">
				    <div class="panel panel-primary">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-6 col-lg-6" style="text-align:left!important;padding-top: 40px;">
									<h2 style="margin-bottom:50px;">Edit Your Information Here.</h2>
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-body">
											<div class="form-wrap">
												<form class="row g-3 needs-validation" method="post" id="edituser" novalidate>
													<div class="col-md-12">
														<label for="validationCustom01" class="form-label">Username*</label>
														<input type="text" disabled="disabled"  name="username" class="form-control" id="validationCustom00" value="<?php echo $_SESSION['login'];?>">
														<input type="hidden" name="id" class="form-control" id="validationCustom09" value="<?php echo $_SESSION['id'];?>
														">
													</div>
													<div class="col-md-6">
														<label for="validationCustom01" class="form-label">First Name</label>
														<input type="text" name="name" class="form-control" id="validationCustom01" value="<?php echo $_SESSION['firstname'];?>">
													</div>
													<div class="col-md-6">
														<label for="validationCustom02" class="form-label">Last Name</label>
														<input type="text" name="lastname" class="form-control" id="validationCustom02" value="<?php echo $_SESSION['lastname'];?>">
													</div>
													<div class="col-md-6">
														<label for="validationCustom03" class="form-label">Email Address</label>
														<input type="email" name="email" class="form-control" id="validationCustom03" value="<?php echo $_SESSION['email'];?>">
													</div>
												   
													
													<div class="col-md-6">
														<label for="validationDefaultpass" class="form-label">Choose a New Password</label>
														<div class="input-group">
														  
														  <input type="password" name="password" class="form-control" id="validationDefaultpass" aria-describedby="inputGroupPrepend2" value="<?php echo $_SESSION['userpass'];?>">
														</div>
													  </div>
													  
													  <div class="col-12">
														<div class="form-check">
														  <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
														  <label class="form-check-label" for="invalidCheck">
															Agree to terms and conditions
														  </label>
														  <div class="invalid-feedback">
															You must agree before submitting.
														  </div>
														</div>
													  </div>
													<br>
													<div class="valid-feedback" id="msg" style="padding:20px 0px; display:block;">
															
													</div>
													<div class="col-12">
														<button class="btn btn-primary" type="submit">Edit Profile</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
								</div>
								<div class=" col-md-1 col-lg-1"></div>
								<div class=" col-md-5 col-lg-5">
								   <div class="testimonial-item mx-auto mb-5 mb-lg-0">
										<img class="img-fluid rounded-circle mb-3" src="assets/img/testimonials-1.jpg" alt="..." />
										<h5><?php echo $_SESSION['firstname'];?> <?php echo $_SESSION['lastname'];?></h5>
									</div>	
								  <table class="table table-user-information" style="margin-top:40px;">
									<tbody>
									    <tr>
										  <td>ID</td>
										  <td><?php echo $_SESSION['id'];?></td>
										</tr>
										<tr>
										  <td>Email</td>
										  <td><a href="mailto:<?php echo $_SESSION['email'];?>"><?php echo $_SESSION['email'];?></a></td>
										</tr>
										<tr>
										  <td>Firstname</td>
										  <td><?php echo $_SESSION['firstname'];?></td>
										</tr>
										<tr>
										  <td>Lastname</td>
										  <td><?php echo $_SESSION['lastname'];?></td>
										</tr>
									  </tr>
									</tbody>
								  </table>
								</div>
							</div>
					    </div>
				    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer-->
    <footer class="footer bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 h-100 text-center text-lg-start my-auto">
                    <ul class="list-inline mb-2">
                        <li class="list-inline-item"><a href="#!">About</a></li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item"><a href="#!">Contact</a></li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item"><a href="#!">Terms of Use</a></li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item"><a href="#!">Privacy Policy</a></li>
                    </ul>
                    <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2023. All Rights Reserved.</p>
                </div>
                <div class="col-lg-6 h-100 text-center text-lg-end my-auto">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item me-4">
                            <a href="#!"><i class="bi-facebook fs-3"></i></a>
                        </li>
                        <li class="list-inline-item me-4">
                            <a href="#!"><i class="bi-twitter fs-3"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!"><i class="bi-instagram fs-3"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <!--<script src="js/form-validattion.js"></script>-->
    <script src="js/scripts.js"></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!--send ajax request-->
	<script>
	$(document).on('submit','#edituser',function(e){
		e.preventDefault();
		var username = $('#validationCustom00').val();
		var id = $('#validationCustom09').val();
		var name = $('#validationCustom01').val();
		var lastname = $('#validationCustom02').val();
		var email = $('#validationCustom03').val();
		var password = $('#validationDefaultpass').val();
		
		if(!(/^[a-zA-Z0-9]+(?:[+._-][a-zA-Z0-9+]+)*@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$/).test(email)){
			$("#msg").html("<b style='color:red; padding: 0px 5px; font-size: 16px;'>Email Is Not Valid.</b>");
			return false;
		}
		else if(!(/^[a-zA-Z][a-zA-Z ]*$/).test(name)){
			$("#msg").html("<b style='color:red; padding: 0px 5px; font-size: 16px;'>Please Enter Only Alphabets in Your First Name.</b>");
			return false;
		}
		else if(!(/^[a-zA-Z][a-zA-Z ]*$/).test(lastname)){
			$("#msg").html("<b style='color:red; padding: 0px 5px; font-size: 16px;'>Please Enter Only Alphabets in Your Last Name.</b>");
			return false;
		}
		else{ 
		    $("#msg").html("<b style='color:red; padding: 0px 5px; font-size: 16px;'></b>");
			$.ajax({
				method:"POST",
				url: "edit_user_profile.php",
				data:$(this).serialize(),
				success: function(data){
					if(data == 1){
						alert('Your information is updated successfully');
						window.location='index.php'
					}
					if(data == 0){
						$("#msg").html("<b style='color:red; padding: 0px 5px; font-size: 16px;'>Something Went Wrong.</b>");
				    }
                }
			});
		}
	});
	
	</script>
</body>

</html>
<?php
}
else {
header('location:logout.php');	
}
?>