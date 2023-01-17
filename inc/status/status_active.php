<?php

 include '../database/db_connect.php';
 include '../validation/validation.php';

   //slider id
   $slider_id=$_GET['slider_id'];
   if($slider_id['slider_id'])
   {
    //update query
    $query="UPDATE slider SET slider_status = 1 WHERE id=$slider_id";
    mysqli_query($db_connection,$query);
    header('location: ../slider.php');
   }


   //notice id
   $notice_id=$_GET['notice_id'];
   if ($notice_id['notice_id']) 
   {
     $query="UPDATE notice SET notice_status = 1 WHERE id=$notice_id";
     mysqli_query($db_connection,$query);
     header('location: ../notice.php');
   }

   //about id
   $about_id=$_GET['about_id'];
   if ($about_id['about_id']) 
   {
     $query="UPDATE about_us SET about_status = 1 WHERE id=$about_id";
     mysqli_query($db_connection,$query);
     header('location: ../about_us.php');
   }
