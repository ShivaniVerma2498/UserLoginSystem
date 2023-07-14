<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login</title>
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
                    <h2 style="margin-bottom:65px;">Login Here!</h2>
                    <div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-body">
								<div class="form-wrap">
									<form class="row g-3 needs-validation" method="post" id="loginuser">
										<div class="col-md-12">
											<label for="validationCustom01" class="form-label">Username</label>
											<input type="text" class="form-control" name="username" id="validationCustom01" value="">
										</div>
									   
										<div class="col-md-12">
											<label for="validationDefaultpass" class="form-label">Password</label>
											<div class="input-group">
											  
											  <input type="password" class="form-control" name="password" id="validationDefaultpass" aria-describedby="inputGroupPrepend2">
											</div>
											<br>
											<div class="link-wrap d-flex justify-content-between ">
												<a href="#">Lost Password</a> <a href="register.php">Dont' have Account yet, Register Here!</a>
											</div>
										  </div>
										 
										  <br>
                                            <div class="valid-feedback" id="msg" style="padding:20px 0px; display:block;">
												
										    </div>
										<div class="col-12">
											<button class="btn btn-primary" type="submit">Login</button>
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
	$(document).on('submit','#loginuser',function(e){
		e.preventDefault();
		var username = $('#validationCustom01').val();
		var password = $('#validationDefaultpass').val();
		
		if(username.length==0 && password.length==0){
			$("#msg").html("<b style='color:red; font-size: 16px;'>Please Enter Your Username/Email and Password.</b>");
			return false;
		}
		else if(username.length==0){
			$("#msg").html("<b style='color:red; font-size: 16px;'>Please Enter Your Username/Email.</b>");
			return false;
		}
		else if(password.length==0){
			$("#msg").html("<b style='color:red; font-size: 16px;'>Please Enter Your Password.</b>");
			return false;
		}
		else { 
			$.ajax({
				method:"POST",
				url: "logincheck.php",
				data:$(this).serialize(),
				success: function(data){
					if(data == 1){
						var delay = 1000; 
							setTimeout(function(){ 
							document.getElementById("loginuser").reset(); 
						}, delay);
						window.location='userprofile.php';
					}
					if(data == 0){
						$("#msg").html("<b style='color:red; padding: 0px 5px; font-size: 16px;'>Invalid username or password.</b>");
				    }
					if(data == 2){
						$("#msg").html("<b style='color:red; padding: 0px 5px; font-size: 16px;'>Please Verify your email id by clicking the link In your mailbox</b>");
					}					
				}
			});
		}
	});
	
	</script>
</body>

</html>