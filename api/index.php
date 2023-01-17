<?php 
include_once "../database/db_connect.php";
if(isset($_GET['key'])){
  $key=mysqli_real_escape_string($db_connection,$_GET['key']);
  $checkrow= mysqli_query($db_connection,"SELECT status FROM api_token WHERE token ='$Key'");
  if(mysqli_num_rows($checkrow)>0)
  {
  $query =" SELECT * FROM registered_graduates";
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
  }
  
}
else
{
  echo json_encode(['status'=>'false','data'=>'Please provide api key']);
}
