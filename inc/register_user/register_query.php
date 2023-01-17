<?php
session_start();
include '../../database/db_connect.php';
include '../validation/validation.php';
$username=filter_var($_POST['username'],FILTER_SANITIZE_STRING);
$email=filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
$password=filter_var($_POST['password'],FILTER_SANITIZE_STRING);
$confirm_pass=filter_var($_POST['confirm_pass'],FILTER_SANITIZE_STRING);

// check email and username alredy exist naki.
$already_register="SELECT COUNT(*) AS register FROM admin_name WHERE email='$email' AND username='$username'";
$run_query=mysqli_query($db_connection,$already_register);
$data_fetch=mysqli_fetch_assoc($run_query);

if($data_fetch['register']==1)
{
	$_SESSION['w_msg']="Email already exist!";
   header('location:../../template/register.php');
}
else
{

		// empty check
		if(empty($username)||empty($email)||empty($password)||empty($confirm_pass))
		{
		 $_SESSION['w_msg']="Fill up the all the box!";
		 header('location:../../template/register.php');
		}
		else
		{
			if($password==$confirm_pass)
			{
			    
			  $query="INSERT INTO `admin_name`(`username`, `email`, `password`) VALUES ('$username','$email','$password')";
			    if(mysqli_query($db_connection,$query))
				 {
				 	$_SESSION['s_msg']='Register Completed.';
				    header('location:../../template/login.php');
				 }
			}
			else
			{
				$_SESSION['w_msg']='Password and confirm password does not match.';
				header('location:../../template/register.php');

			}
		}	
}
exit();