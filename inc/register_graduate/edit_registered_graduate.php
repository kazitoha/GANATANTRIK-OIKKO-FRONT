<?php
session_start();
include '../../database/db_connect.php';
include '../validation/validation.php';


if($_SERVER['REQUEST_METHOD']=='POST')
{	
		// $id                    =       validation($_POST['edit_id']);
		$id                    =       validation($_SESSION['register_edit_id']);
		$name                  =       strtoupper(validation($_POST['name']));
		$mother_name           =       strtoupper(validation($_POST['mother_name']));
		$father_name           =       strtoupper(validation($_POST['father_name']));
		$present_address       =       validation($_POST['present_address']);
		$present_thana         =       validation($_POST['present_thana']);
		$present_district      =       validation($_POST['present_district']);
		$permanent_address     =       validation($_POST['permanent_address']);
		$permanent_thana       =       validation($_POST['permanent_thana']);
		$permanent_district    =       validation($_POST['permanent_district']);
		$nid_no                =       validation($_POST['nid_no']);
		$date_of_birth         =       validation($_POST['date_of_birth']);
		$gender                =       validation($_POST['gender']);
		$mobile_no             =       validation($_POST['mobile_no']);
		$qualifying_degree     =       validation($_POST['qualifying_degree']);
		$dept_name_institute   =       validation($_POST['dept_name_institute']);
		$reg_no                =       validation($_POST['reg_no']);
		$session               =       validation($_POST['session']);
		$occupation            =       validation($_POST['occupation']);
		$old_image             =       $_SESSION['register_old_image'];
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
	    	header('location:../../template/edit_register_graduate.php');
	    	exit();
            }

            if(in_array($image_extension,$image_file_types)){
		    unlink("../../uploads/register_graduate/".$old_image);
		    $rename_image          =       $reg_no.".".$image_extension;
		    $temp_location         =       $image['tmp_name'];
		    $upload_location       =       "../../uploads/register_graduate/".$rename_image;
		    move_uploaded_file($temp_location, $upload_location);
		    }
		    else{
		    	$_SESSION['w_msg']="File format is invalid";
		    	header('location:../../template/edit_register_graduate.php');
		    	exit();
		    }

         }

      //empty check
	  if(empty($id)||empty($name)||empty($mother_name)||empty($father_name)||empty($present_address)||empty($present_thana)||empty($present_district)||empty($permanent_address)||empty($permanent_thana)||empty($permanent_district)||empty($nid_no)||empty($date_of_birth)||empty($gender)||empty($mobile_no)||empty($qualifying_degree)||empty($dept_name_institute)||empty($reg_no)||empty($session)||empty($occupation)||empty($old_image))
	  {
        $_SESSION['w_msg']='Field Empty';
        header('location:../../template/edit_register_graduate.php');
	  }
	  else
	  {
	  	$query="UPDATE `registered_graduates` SET `name`='$name',`mother_name`='$mother_name',`father_name`='$father_name',`present_address`='$present_address',`present_thana`='$present_thana',`present_district`='$present_district',`permanent_address`='$permanent_address ',`permanent_thana`='$permanent_thana',`permanent_district`='$permanent_district',`nid_no`='$nid_no',`date_of_birth`='$date_of_birth',`gender`='$gender ',`mobile_no`='$mobile_no',`qualifying_degree`='$qualifying_degree',`dept_name_institute`='$dept_name_institute',`reg_no`='$reg_no',`session`='$session',`occupation`='$occupation',`image`='$rename_image' WHERE id=$id ";
	  	
	  	if(mysqli_query($db_connection,$query))
	  	{
	  	$_SESSION['s_msg']='Data Update Successfully';
        unset($_SESSION['register_edit_id']);
        unset($_SESSION['register_old_image']);
        header('location:../../template/register_graduate_list.php');
	  	}
	  }

}
else
{
	$_SESSION['w_msg']="There is a problem in post";
    header('location:../../template/edit_register_graduate.php');
}