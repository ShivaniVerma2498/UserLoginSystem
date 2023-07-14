<?php
session_start();
//include database connection file
include_once('connection.php');

//post form data
$Username = $_SESSION['login'];
$Id = $_POST['id'];
$Name = $_POST['name'];
$LastName = $_POST['lastname'];
$Email = $_POST['email'];
$passwordbyuser = $_POST['password'];
$Password=md5($_POST['password']);


//echo 'username = '.$Username.' ~~ Id = '.$Id.' ~~ Name = '.$Name.' ~~ Email = '.$Email.' ~~ passwordbyuser = '.$passwordbyuser.' ~~ LastName = '.$LastName;

//select query
$edit = mysqli_query($conn,"SELECT * FROM Usertable WHERE id='$Id' and username='$Username'");
$edit4 = mysqli_fetch_array($edit);
if($edit4>0)
{
	//update query
	$result1 = mysqli_query($conn,"UPDATE Usertable SET firstname='$Name',lastname='$LastName',email='$Email',password='$Password' WHERE id='$Id' and username='$Username'");
	if($result1 == true){
		
		echo true;
	}
}
else
{
	echo false;
}