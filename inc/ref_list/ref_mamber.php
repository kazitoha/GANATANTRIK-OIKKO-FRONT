<?php
session_start();
include '../../database/db_connect.php';
include '../validation/validation.php';

if($_SERVER['REQUEST_METHOD']=='POST')
{  
	$current_name=validation($_POST['current_name']);
	$change_name=validation($_POST['change_name']);

  if(empty($current_name)||empty($change_name))
	  {
        $_SESSION['w_msg']='Field Empty';
        header('location:../../template/ref_list.php');
        exit();	
	  }
		

		$query="SELECT * FROM `short_form_of_reg_gra` WHERE REPLACE(`ref`,'  ',' ') LIKE '$current_name'";
		$run_query=mysqli_query($db_connection,$query);

		foreach($run_query as $data_show){
		    $id=$data_show['id'];
		    
		    $query="UPDATE `short_form_of_reg_gra` SET `ref`='$change_name' WHERE id =$id";
		    $run_query=mysqli_query($db_connection,$query);
		}
		$_SESSION['s_msg']='Reference Update Succefully';
		header('location:../../template/ref_list.php');
}


                          
