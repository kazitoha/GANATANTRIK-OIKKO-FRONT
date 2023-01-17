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
  
       


	     if($_SESSION['nid_no'] != $nid_no) {
	     	$already_register="SELECT COUNT(*) AS nid FROM short_form_of_reg_gra WHERE nid_no='$nid_no' ";
            $run_query=mysqli_query($db_connection,$already_register);
            $data_fetch=mysqli_fetch_assoc($run_query);

		       if($data_fetch['nid']>=1)
		       {
			      $_SESSION['w_msg']="Nid no already exist!";
		           header('location:../../template/edit_short_form_of_reg_gra.php');
		          exit();
		       }
	     }


       
 
       if(empty($name)||empty($mother_name)||empty($father_name)||empty($present_address)||empty($present_thana)||empty($present_district)||empty($nid_no)||empty($mobile_no)||empty($ref)||empty($register_type))
       {
           	header('location:../../template/short_form_of_reg_gra.php');
       }
       else
       {
       	  $id=$_SESSION['short_register_edit_id'];
       	  
          $query="UPDATE `short_form_of_reg_gra` SET `name`='$name',`mother_name`='$mother_name',`father_name`='$father_name',`present_address`='$present_address',`present_thana`='$present_thana',`present_district`='$present_district',`nid_no`='$nid_no',`mobile_no`='$mobile_no',`ref`='$ref',`register_type`='$register_type' WHERE id=$id";
          if(mysqli_query($db_connection,$query)){
          	$_SESSION['s_msg']='Data Update Successfully';
            // unset($_SESSION['short_register_edit_id']);
            // unset($_SESSION['nid_no']);
            header('location:../../template/short_form_of_reg_gra_list.php');
           }
       }
	  

	 
	  

}
