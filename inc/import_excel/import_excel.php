<?php

session_start();
include '../../database/db_connect.php';
include '../validation/validation.php';


if(isset($_POST["Import"])){
		

		 $filename=$_FILES["file"]["tmp_name"];
		

		 if($_FILES["file"]["size"] > 0)
		 {

		  	$file = fopen($filename, "r");


		  	$emapData = fgetcsv($file, 10000, ",");

		    if(!$emapData[0]=='id'&&$emapData[1]=='image'&&$emapData[2]=='name'&&$emapData[3]=='father name'&&$emapData[4]=='mother name'&&$emapData[5]=='address'){

		    	$_SESSION['w_msg']="File format is invalid";
		    	header('location:../../template/insert_data_from_excel.php');
		    	exit();

		    }

	         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
	    
	          //It wiil insert a row to our subject table from our csv file`
	           $sql = "INSERT into reg_info (`web_id`, `image`, `name`, `father_name`,`mother_name`, `address`) 
	            	values('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]')";
	         //we are using mysql_query function. it returns a resource on true else False on error
	          $result = mysqli_query( $db_connection, $sql );
				if(! $result )
				{
					$_SESSION['w_msg']="File format is invalid";
		    	    header('location:../../template/insert_data_from_excel.php');
		    	    exit();
				
				}

	         }
	         fclose($file);
	         //throws a message if data successfully imported to mysql database from excel file
	         $_SESSION['s_msg']="File Insert Successfully";
		    	header('location:../../template/insert_data_from_excel.php');
		    	exit();
	        
			
		 	
			
		 }
	}	 