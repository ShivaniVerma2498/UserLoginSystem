<?php

session_start();

//include database connection file
include_once('connection.php');

//post form data
$username = $_POST['username'];
$userpass = $_POST['password'];
$password = md5($_POST['password']);

//select query
$ret = mysqli_query($conn,"SELECT * FROM Usertable WHERE username='$username' and password='$password'");
$num = mysqli_fetch_array($ret);
$status = $num['status'];
$Email  = $num['email'];
$ID  =    $num['id'];
$Name  =  $num['firstname'];
$Lname =  $num['lastname'];
$Password =  $num['password'];

if($num>0)
{	
	if($status==0)
	{
		echo 2;
	}
	else 
	{
		$_SESSION['login']      = $username;
		$_SESSION['email']      = $Email;
		$_SESSION['id']         = $ID;
		$_SESSION['firstname']  = $Name;
		$_SESSION['lastname']   = $Lname;
		$_SESSION['password']   = $Password;
		$_SESSION['userpass']   = $userpass;
		echo True;
	}
}
else
{
	echo false;

}


?>