<?php 
include_once "../database/db_connect.php";

$query =" SELECT * FROM news";
$result=mysqli_query($db_connection,$query);
$count=mysqli_num_rows($result);
header('content-Type:application/json');
if($count>0)
  {
    while($row=mysqli_fetch_assoc($result))
    {
        $arr[]=$row;
    }
        echo json_encode(['status'=>true,'data'=>$arr,'result'=>'found']);
  }else{
      echo json_encode(['status'=>true,'data'=>'No data found','result'=>'found']);
  }