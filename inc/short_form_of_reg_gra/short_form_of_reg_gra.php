<?php
session_start();
include '../../database/db_connect.php';
include '../validation/validation.php';

if($_SERVER['REQUEST_METHOD']=='POST')
{	
		$name                  =       validation(strtoupper($_POST['name']));
		$mother_name           =       validation(ucwords($_POST['mother_name']));
		$father_name           =       validation(ucwords($_POST['father_name']));
		$present_address       =       validation($_POST['present_address']);
		$present_thana         =       validation($_POST['present_thana']);
		$present_district      =       validation($_POST['present_district']);
		$nid_no                =       validation($_POST['nid_no']);
		$mobile_no             =       validation($_POST['mobile_no']);
		$ref                   =       validation($_POST['ref']);
		$register_type         =       validation($_POST['register_type']);
        $date                  =       validation(date("j-m-Y"));
        $submit_id             =       validation($_SESSION['id']);
  
  
       if($ref == 'Select....'){
         $_SESSION['w_msg']='Data insert successfully';
         header('location:../../template/short_form_of_reg_gra.php');
         exit();
       }
  
       
       $already_register="SELECT COUNT(*) AS nid FROM short_form_of_reg_gra WHERE nid_no='$nid_no' ";
       $run_query=mysqli_query($db_connection,$already_register);
       $data_fetch=mysqli_fetch_assoc($run_query);

       if($data_fetch['nid']==1)
       {
	      $_SESSION['w_msg']="Nid no already exist!";
           header('location:../../template/short_form_of_reg_gra.php');
          exit();
       }
       
 
          if(empty($name)||empty($mother_name)||empty($father_name)||empty($present_address)||empty($present_thana)||empty($present_district)||empty($nid_no)||empty($mobile_no)||empty($ref)||empty($register_type)||empty($submit_id))
       {
           	header('location:../../template/short_form_of_reg_gra.php');
       }
       else
       {



       	   $query="INSERT INTO `short_form_of_reg_gra`(`name`, `submit_id`, `mother_name`, `father_name`, `present_address`, `present_thana`, `present_district`, `nid_no`, `mobile_no`, `ref`, `register_type`,`date`) VALUES ('$name','$submit_id','$mother_name','$father_name','$present_address','$present_thana','$present_district','$nid_no','$mobile_no','$ref','$register_type','$date')";
       	   if(mysqli_query($db_connection,$query))
			{
              $insert_id          =mysqli_insert_id($db_connection);
			  	$_SESSION['s_msg']='Data insert successfully';
			    header('location:../../template/short_form_of_reg_gra.php');
			}
       }
	  

	 
	  

}
