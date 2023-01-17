<?php
   session_start();
   include '../../database/db_connect.php';
   $email=filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
   $password=filter_var($_POST['password'],FILTER_SANITIZE_STRING);
   $query="SELECT COUNT(*) AS login, id,username,full_name,mobile,email,image FROM admin_name WHERE email='$email' AND password='$password'";
   $run_query=mysqli_query($db_connection,$query);
   $data_fetch=mysqli_fetch_assoc($run_query);

   if(empty($email)||empty($password))
  {
   $_SESSION['w_msg']="Fill up the all box!";
   header('location: ../../template/login.php');  
  }
  else
  {
   if($data_fetch['login']==1)
      {
         $_SESSION['id']=$data_fetch['id'];
         $_SESSION['login_username']=$data_fetch['username'];
         $_SESSION['access']=$data_fetch['access'];
         $_SESSION['login_full_name']=$data_fetch['full_name'];
         $_SESSION['login_mobile']=$data_fetch['mobile'];
         $_SESSION['login_email']=$data_fetch['email'];
         $_SESSION['login_image']=$data_fetch['image'];
         header('location: ../../template/dashboard.php');
      }
      else
      {  $_SESSION['w_msg']="Email or Password worng!";
         header('location: ../../template/login.php');
         
      }
  }    
?>



