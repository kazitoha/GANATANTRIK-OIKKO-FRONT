<?php
   

   include 'database/db_connect.php';
   include 'inc/validation/validation.php';


if($_SERVER['REQUEST_METHOD']=='POST'){


      // $start= validation($_POST['start']);
      $start= 1;
      // $end = validation($_POST['end']);
      $end = 15;


      for ($i=$start; $i <= $end  ; $i++) { 
          
          $query="UPDATE `short_form_of_reg_gra` SET `print`='2' WHERE id=$i";
          $run_query=mysqli_query($db_connection,$query);
      }
}
 

?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
</head>
<body>
   <form action="#" method="post">
      <input type="number" name="start" placeholder="start_id">
      <input type="number" name="end" placeholder="End id">
      <button type="submit">Submit</button>
   </form>

</body>
</html>