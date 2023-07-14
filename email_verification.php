<?php
//include database connection file
include('connection.php');

if(!empty($_GET['code']) && isset($_GET['code']))
{
	
//get activation code
$code=$_GET['code'];

//echo $code;
$sql = mysqli_query($conn,"SELECT * FROM Usertable WHERE activationcode='$code'");
$num = mysqli_fetch_array($sql);
if($num>0)
{
$st = 0;
$result = mysqli_query($conn,"SELECT id FROM Usertable WHERE activationcode='$code' and status='$st'");
$result4 = mysqli_fetch_array($result);
if($result4>0)
 {
$st = 1;
$result1 = mysqli_query($conn,"UPDATE Usertable SET status='$st' WHERE activationcode='$code'");
$msg = "Your Account is Activated";
}
else
{
$msg ="Your account is already active, no need to activate again.";
}
}
else
{
$msg ="Wrong activation code.";
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Email Verification</title>
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
				    
                    <h2 style="margin-bottom:30px;">Your Email is Verified Successfully!</h2>
					<h5>
					<?php
						echo $msg;
 					?></h5>
					<br>
					<h5>For Login <a href="login.php"> Click Here!</a></h5>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <!--<script src="js/form-validattion.js"></script>-->
    <script src="js/scripts.js"></script>
</body>

</html>
