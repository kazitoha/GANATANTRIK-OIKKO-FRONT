<?php 
  session_start();
  require_once '../../database/db_connect.php';
  include '../validation/validation.php';
 
  $catch_profile_id=$_SESSION['id'];
  $old_password=$_POST['old_password'];
  $new_password=$_POST['new_password'];
  $confirm_password=$_POST['confirm_password'];
  //empty chack
  if(empty($old_password)||empty($new_password)||empty($confirm_password))
  {
    $_SESSION['w_msg']="Please fill up all the form.";
      header('location: ../../template/edit_profile.php');
      exit();

  }

  // Password query
  if($new_password == $confirm_password)
  {
  	$get_db_password="SELECT password FROM admin_name WHERE id=$catch_profile_id";
  	$run_query=mysqli_query($db_connection,$get_db_password);
  	$data_fetch=mysqli_fetch_assoc($run_query);

  	if($old_password==$data_fetch['password'])
  	{
  		$update_query="UPDATE `admin_name` SET password='$confirm_password' WHERE id=$catch_profile_id";
  		mysqli_query($db_connection,$update_query);
  		$_SESSION['s_msg']="password change successfully";
  		header('location: ../../template/profile.php');
  	}
  	else
  	{   
  		$_SESSION['w_msg']="Old password dosenot match.";
  		header('location: ../../template/edit_profile.php');
  	}
  }
  else
  {
   $_SESSION['w_msg']="New and Confirm password dosenot match.";
   header('location: ../../template/edit_profile.php');
  }
 



 ?>