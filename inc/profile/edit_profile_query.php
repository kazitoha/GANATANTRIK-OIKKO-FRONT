<?php
  session_start();
  require_once '../../database/db_connect.php';
  include '../validation/validation.php';

  $catch_profile_id=$_SESSION['id'];
  $full_name=$_POST['full_name'];
  $email=filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
  $mobile=$_POST['mobile'];
  $website=$_POST['website'];
  $github=$_POST['github'];
  $twitter=$_POST['twitter'];
  $instagram=$_POST['instagram'];
  $facebook=$_POST['facebook'];
  
  $query="UPDATE `admin_name` SET full_name ='$full_name', mobile ='$mobile', email='$email',website='$website', github='$github',twitter='$twitter',instagram='$instagram',facebook='$facebook' WHERE id=$catch_profile_id";
  if(mysqli_query($db_connection,$query))
  {
  	$_SESSION['s_msg']='Profile updated successfully.';
  	header('location: ../../template/profile.php');
  }
  else
  {
  	$_SESSION['w_msg']='Something  Wrong';
  }

 



  