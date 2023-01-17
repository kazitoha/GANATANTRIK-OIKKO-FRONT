<?php
session_start();
include '../../database/db_connect.php';
include '../validation/validation.php';


if($_SERVER['REQUEST_METHOD']=='POST' && $_SERVER['REQUEST_URI']=='/inc/about_us/add_about_us.php' && $_SERVER['HTTP_REFERER']=='https://test.toha.eco.du.ac.bd/template/add_about_us.php')
{
  
    
    // if(empty($name)||empty($designation)||empty($image_name)){
    //    echo "ekhane khali ache boss"; 
    // }

}
echo "hello toha";

