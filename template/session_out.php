<?php 

if(!isset($_SESSION['login_email']))
{
  header('location:login.php');
}


unset($_SESSION['register_edit_id']);

unset($_SESSION['about_us_old_image']);


unset($_SESSION['about_us_edit_id']);

unset($_SESSION['about_us_old_image']);

