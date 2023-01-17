<?php
session_start();
include '../../database/db_connect.php';
include '../validation/validation.php';


if($_SERVER['REQUEST_METHOD']=='POST')
{	
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
        $email                 =       validation($_POST['email']);
		$qualifying_degree     =       validation($_POST['qualifying_degree']);
		$dept_name_institute   =       validation($_POST['dept_name_institute']);
		$reg_no                =       validation($_POST['reg_no']);
		$session               =       validation($_POST['session']);
        $graduation_year       =       validation($_POST['graduation_year']);
		$occupation            =       validation($_POST['occupation']);
  
        $image                 =       $_FILES['image'];
        $image_name            =       $image['name'];
        // image explode
        $image_explode         =       explode('.',$image_name);
        // get image file extension.
        $image_extension       =       end($image_explode);
        // which kind of file get insert
        $image_file_types      =       array('jpg','png','jpeg');
        $rename_image          =       $reg_no.".".$image_extension;
        
 
      //empty check
	  if(empty($name)||empty($mother_name)||empty($father_name)||empty($present_address)||empty($present_thana)||empty($present_district)||empty($permanent_address)||empty($permanent_thana)||empty($permanent_district)||empty($nid_no)||empty($date_of_birth)||empty($gender)||empty($mobile_no)||empty($qualifying_degree)||empty($dept_name_institute)||empty($reg_no)||empty($session)||empty($occupation)||empty($rename_image)||empty($graduation_year)||empty($email))
	  {
        $_SESSION['w_msg']='Field Empty';
        header('location:../../template/register_graduate.php');
	  }

	  elseif($image['size']==0)
        {
          $_SESSION['w_msg']='Reduce picture sizes to under 1.5MB!';
          header('location:../../template/register_graduate.php');
        }
      elseif($image['size']>=2000000)
        {
        	$_SESSION['w_msg']='Reduce picture sizes to under 1.5MB!';
           header('location:../../template/register_graduate.php');
        }
	  else
	  {
	  	if(in_array($image_extension,$image_file_types))
         {
	        // move temp location to software location
	        $temporaray_location=$image['tmp_name'];
	        // define image location
	        $image_uploaded_location="../../uploads/register_graduate/".$rename_image; 
	        move_uploaded_file($temporaray_location,$image_uploaded_location);
		   	
	    	 $query="INSERT INTO `registered_graduates`(`name`, `mother_name`, `father_name`, `present_address`, `present_thana`, `present_district`, `permanent_address`, `permanent_thana`, `permanent_district`, `nid_no`, `date_of_birth`, `gender`, `mobile_no`, `email`, `qualifying_degree`, `dept_name_institute`, `reg_no`, `session`, `graduation_year`, `occupation`, `image`)VALUES('$name','$mother_name','$father_name','$present_address','$present_thana','$present_district','$permanent_address','$permanent_thana','$permanent_district','$nid_no','$date_of_birth','$gender','$mobile_no','$email','$qualifying_degree','$dept_name_institute','$reg_no','$session','$graduation_year','$occupation','$rename_image')";

			    if(mysqli_query($db_connection,$query))
			  	{
			  	$_SESSION['s_msg']='Data insert successfully';
			    header('location:../../template/register_graduate.php');
			  	}
	  	   
	  	   
	  	   	
	  	 }
	  	 else{ $_SESSION['w_msg']='File type must be png,jpg,jpeg';
	  	      header('location:../../template/register_graduate.php'); } 
	  	
	  }

}
else
{
	$_SESSION['w_msg']="There is a problem in post";
    header('location:../template/register_graduate.php');
}