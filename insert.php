<?php 
//include database connection file
include_once('connection.php');

//post form data
$Username = $_POST['username'];
$Name = $_POST['name'];
$LastName = $_POST['lastname'];
$Email = $_POST['email'];
$passwordbyuser = $_POST['password'];
$Password=md5($_POST['password']);
$status=0;
$activationcode=md5($Email.time());

//echo 'Name = '.$Name.' ~~ Email = '.$Email.' ~~ Password = '.$Password.' ~~ activationcode = '.$activationcode;

//check if username and email is laready exist or not
$select = mysqli_query($conn,"SELECT * FROM Usertable WHERE username='$Username'");
$run    = mysqli_fetch_array($select);
if($run>0)
{
	echo false;
	
}
else {
//insert query
$query = "INSERT INTO Usertable (username,firstname,lastname,email,password,activationcode,status) VALUES ('$Username','$Name','$LastName','$Email','$Password','$activationcode','$status')";
$result = mysqli_query($conn, $query);
if($result === True){
	
	//send email code
	
    $to = $Email;
	$msg = "Thanks For New Registration.";
	$subject = "Email verification Link From Shivani";
	$headers = "MIME-Version: 1.0"."\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
	$headers .= 'From:Shivani | User Login <shivuverma2498@gmail.com>'."\r\n";
	
	$body = "
		<html>
		<head>
		<title>Thanks For New Registration</title>
		</head>
		<body style='border: 1px solid #141212; padding: 40px; text-align: center;'>
		<div id='logo'>
		<img style='border-radius:45%;' class='site-logo ie_png' src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQDAwg2GP0zd9YJqVa12CnRl8tfanO6FmSLZw&usqp=CAU' width='200' height='auto' alt='Parrot Secrets'></div>
		<br>
		<p style='color:Black; font-size: 14px; font-family: Tahoma,Geneva,Kalimati,sans-serif; line-height: 26px;'>
		Dear $Name.<br>
		Please click The following link For verifying and activation of your account.<br>
		<a href='http://localhost/mywork/loginsystem/email_verification.php?code=$activationcode'>Click Here to Login</a>
		</p>
        <table cellspacing='0' style='border: 2px dashed #FB4314; width: 100%;'> 
		    <tr style='background: #eee;'> 
                <th style='padding: 10px; border: 1px solid #ccc; font-size: 14px;'><b>Username :</b></th>
				<td style='padding: 10px; border: 1px solid #ccc; font-size: 14px;'>$Username</td> 
            </tr> 
            <tr> 
                <th style='padding: 10px; border: 1px solid #ccc; font-size: 14px;'><b>Password :</b></th>
				<td style='padding: 10px; border: 1px solid #ccc; font-size: 14px;'>$passwordbyuser</td> 
            </tr>
        </table>
		</body>
		</html>
		";
	if(mail($to,$subject,$body,$headers)){
	    echo true;
	}
}
}



?>
