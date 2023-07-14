<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register</title>
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
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-light bg-light static-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">Shivani</a>

            <div class="nav-link">
                <!-- Button trigger modal -->
                <a href="login.php" class="btn btn-primary">Login</a>
                <a href="register.php" class="btn btn-primary">Register</a>
            </div>

        </div>
    </nav>
	
    <!-- Image Showcases-->
    <section class="showcase">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-lg-6 order-lg-2 text-white showcase-img"
                    style="background-image: url('assets/img/bg-showcase-2.jpg')"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2 style="margin-bottom:65px;">Ready to get started? Sign up now!</h2>
                    <div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-body">
								<div class="form-wrap">
									<form class="row g-3 needs-validation" method="post" id="registeruser" novalidate>
									    <div class="col-md-12">
											<label for="validationCustom01" class="form-label">Username*</label>
											<input type="text" name="username" class="form-control" id="validationCustom00" value=""
												required>
										</div>
										<div class="col-md-6">
											<label for="validationCustom01" class="form-label">First Name*</label>
											<input type="text" name="name" class="form-control" id="validationCustom01" value=""
												required>
										</div>
										<div class="col-md-6">
											<label for="validationCustom02" class="form-label">Last Name*</label>
											<input type="text" name="lastname" class="form-control" id="validationCustom02" value=""
												required>
										</div>
										<div class="col-md-6">
											<label for="validationCustom03" class="form-label">Email Address*</label>
											<input type="email" name="email" class="form-control" id="validationCustom03" value=""
												required>
										</div>
									   
										
										<div class="col-md-6">
											<label for="validationDefaultpass" class="form-label">Choose a Password*</label>
											<div class="input-group">
											  
											  <input type="password" name="password" class="form-control" id="validationDefaultpass" aria-describedby="inputGroupPrepend2" required>
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
											<button class="btn btn-primary" type="submit">Sign Up</button>
										</div>
									</form>
								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <!--<script src="js/form-validattion.js"></script>-->
    <script src="js/scripts.js"></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- on submit send the ajax request-->
	<script>
	$(document).on('submit','#registeruser',function(e){
		e.preventDefault();
		var username = $('#validationCustom00').val();
		var name = $('#validationCustom01').val();
		var lastname = $('#validationCustom02').val();
		var email = $('#validationCustom03').val();
		var password = $('#validationDefaultpass').val();
		
		if(name.length==0 || username.length==0 || password.length==0 || email.length==0 || lastname.length==0){
			$("#msg").html("<b style='color:red; font-size: 16px;'>Please fill all the required fields.</b>");
			return false;
		}
		else if(!(/^[a-zA-Z0-9]+(?:[+._-][a-zA-Z0-9+]+)*@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$/).test(email)){
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
				url: "insert.php",
				data:$(this).serialize(),
				success: function(data){
					if(data == 1){
						var delay = 1000; 
							setTimeout(function(){ 
							document.getElementById("registeruser").reset();
						}, delay);
						alert('Registration Successful, Please Verify in the Registered Email-Id');
						window.location='login.php'
					}
					if(data == 0){
						$("#msg").html("<b style='color:red; padding: 0px 5px; font-size: 16px;'>Something Went Wrong.</b>");
				    }
					if(data == 2){
						$("#msg").html("<b style='color:red; padding: 0px 5px; font-size: 16px;'>Email Already Exists.</b>");
				    }
					if(data == 3){
						$("#msg").html("<b style='color:red; padding: 0px 5px; font-size: 16px;'>Username Already Exists.</b>");
				    }
					if(data == 4){
						$("#msg").html("<b style='color:red; padding: 0px 5px; font-size: 16px;'>Username And Email Already Exists.</b>");
				    }
                }
			});
		}
	});
	
	</script>
</body>

</html>