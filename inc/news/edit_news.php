<?php
session_start();
include '../../database/db_connect.php';
include '../validation/validation.php';


if($_SERVER['REQUEST_METHOD']=='POST')
{	
		// $id                    =       validation($_POST['edit_id']);
		$id                    =       validation($_SESSION['news_edit_id']);
		$headline              =       validation($_POST['headline']);
		$body                  =       validation($_POST['body']);
		$old_image             =       $_SESSION['news_old_image'];
		$image                 =       $_FILES['image'];
	    $rename_image          =       $old_image;
		
        if($image['name'])
        {   $image_name            =       $image['name'];
		    $image_explode         =       explode('.', $image_name);
		    $image_extension       =       end($image_explode);
		    $image_file_types      =       array('jpg','png','jpeg');
		    
            if($image['size']>=4000000)
            {
        	$_SESSION['w_msg']="Image size must be 4MB or less.";
	    	header('location:../../template/edit_news.php');
	    	exit();
            }

            if(in_array($image_extension,$image_file_types)){
		    unlink("../../uploads/news/".$old_image);
		    $rename_image          =       	$id."_news.".$image_extension;
		    $temp_location         =       $image['tmp_name'];
		    $upload_location       =       "../../uploads/news/".$rename_image;
		    $upload_location       = str_replace(' ', '', $upload_location);
		     
		    move_uploaded_file($temp_location, $upload_location);
		    }
		    else{
		    	$_SESSION['w_msg']="File format is invalid";
		    	header('location:../../template/edit_news.php');
		    	exit();
		    }

         }

      //empty check
	  if(empty($id)||empty($headline)||empty($body)||empty($old_image))
	  {
        $_SESSION['w_msg']='Field Empty';
        header('location:../../template/edit_news.php');
	  }
	  else
	  {
	  	
	  	$query="UPDATE `news` SET `headline`='$headline',`body`='$body',`image`='$rename_image' WHERE id=$id";
	  	
	  	if(mysqli_query($db_connection,$query))
	  	{
	  	$_SESSION['s_msg']='Data Update Successfully';
        unset($_SESSION['about_edit_id']);
        unset($_SESSION['about_us_old_image']);
        header('location:../../template/news_list.php');
	  	}
	  }

}
else
{
	$_SESSION['w_msg']="There is a problem in post";
    header('location:../../template/edit_about_us.php');
}