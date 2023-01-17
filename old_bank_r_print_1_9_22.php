<?php
session_start();
include 'database/db_connect.php';


$print_id=$_GET['print_id'];

if(isset($_SESSION['last_id']))
{
    $print_id= $_SESSION['last_id'];
}

  
      $query="SELECT * FROM short_form_of_reg_gra WHERE id=$print_id";
      $run_query=mysqli_query($db_connection,$query);
      $data_fetch=mysqli_fetch_assoc($run_query);
      
      $total_printed=$data_fetch['print']+1;
      $update_query="UPDATE `short_form_of_reg_gra` SET `print`='$total_printed' WHERE id= $print_id";
      mysqli_query($db_connection,$update_query)or die("Query failed.");


      
 
                  
?>


<!DOCTYPE html>
<html>
<head>
<style>

.rotate1
{
width: 1200px;
height: 1000px;
font-size: 18px;
margin: 0 0 0 200px;
color: black;
transform: rotate(-90deg);
}

.rotate2
{
width: 1200px;
height: 1000px;
font-size: 18px;
margin: 0 0 0 200px;
color: black;
transform: rotate(-90deg);
  
}
.rotate3
{
width: 1200px;
height: 1000px;
font-size: 18px;
margin: 0 0 0 200px;
color: black;
transform: rotate(-90deg);
  
}

/*h2
{
color: blue;
}*/
h2
{
color: black;
text-align: center;
}
</style>
</head>
<body onload="window.print()">



  <div class="rotate1"  style="margin: -10 0 0 245px;">

  <!-- part 1 -->
  
  <h2 style="margin: 0 0 0 858px; line-height: 5px;"><?php echo date("j-m-Y") ?></h2>
    <?php 
      $total_count=str_word_count($data_fetch['name']);  
      if($total_count >= 6)
      { ?>
             <h4 style="margin: 38px 0 0 498px;"><?php  echo $data_fetch['name']; ?></h4>
     <?php  
     }else{
      ?>
            <h2 style="margin: 38px 0 0 200px;"><?php  echo $data_fetch['name']; ?></h2>
    <?php }


    ?>
      
    <h2 style="line-height: 14px;"><?php  echo $data_fetch['mobile_no']; ?></h2>
     <p style="margin: 0 0 0 450px;  width: 564px; height: 57px; font-size: 28px; "><?php  echo $data_fetch['present_address']. ","; echo $data_fetch['present_thana']. ","; echo $data_fetch['present_district'] ;  ?></p>
    <h2 style="margin: -59px 0 0 527px; padding-top: 115px; "><?php  echo $data_fetch['register_type']; ?> Registered Graduate</h2>
    <h1 style="margin: 10px 0 0 448px; line-height: -0px;"><?php if($data_fetch['register_type']=='Lifetime'){ echo 1200; } else{ echo "500";}?></h1>
    <h2 style="margin: -10px 0 0 331px; padding-top: 12px;"><?php if($data_fetch['register_type']=='Lifetime'){ echo 'One Thousend Two Hundred'; } else{ echo "Five hundred";}?> Taka Only</h2>
     
  <!-- end part 1 -->
   
</div>
<div class="rotate2" style="margin: -210px 0 0 195px;">

  <!-- part 1 -->

  <h2 style="margin: 0 0 0 858px; line-height: 5px;"><?php echo date("j-m-Y") ?></h2>
    <?php 
      $total_count=str_word_count($data_fetch['name']);  
      if($total_count >= 6)
      { ?>
             <h4 style="margin: 38px 0 0 498px;"><?php  echo $data_fetch['name']; ?></h4>
     <?php  
     }else{
      ?>
            <h2 style="margin: 38px 0 0 200px;"><?php  echo $data_fetch['name']; ?></h2>
    <?php }


    ?>
      
    <h2 style="line-height: 14px;"><?php  echo $data_fetch['mobile_no']; ?></h2>
     <p style="margin: 0 0 0 450px;  width: 564px; height: 57px; font-size: 28px; "><?php  echo $data_fetch['present_address']. ","; echo $data_fetch['present_thana']. ","; echo $data_fetch['present_district'] ;  ?></p>
    <h2 style="margin: -59px 0 0 527px; padding-top: 108px; "><?php  echo $data_fetch['register_type']; ?> Registered Graduate</h2>
    <h1 style="margin: 10px 0 0 448px; line-height: -0px;"><?php if($data_fetch['register_type']=='Lifetime'){ echo 1200; } else{ echo "500";}?></h1>
    <h2 style="margin: -10px 0 0 331px; padding-top: 12px;"><?php if($data_fetch['register_type']=='Lifetime'){ echo 'One Thousend Two Hundred'; } else{ echo "Five hundred";}?> Taka Only</h2>
   
</div>
<div class="rotate3"  style="margin: -210px 0 0 195px;">

  <!-- part 1 -->
 
  <h2 style="margin: 0 0 0 858px; line-height: 5px;"><?php echo date("j-m-Y") ?></h2>
    <?php 
      $total_count=str_word_count($data_fetch['name']);  
      if($total_count >= 6)
      { ?>
             <h4 style="margin: 38px 0 0 498px;"><?php  echo $data_fetch['name']; ?></h4>
     <?php  
     }else{
      ?>
            <h2 style="margin: 38px 0 0 200px;"><?php  echo $data_fetch['name']; ?></h2>
    <?php }


    ?>
      
    <h2 style="line-height: 14px;"><?php  echo $data_fetch['mobile_no']; ?></h2>
     <p style="margin: 0 0 0 450px;  width: 564px; height: 57px; font-size: 28px; "><?php  echo $data_fetch['present_address']. ","; echo $data_fetch['present_thana']. ","; echo $data_fetch['present_district'] ;  ?></p>
    <h2 style="margin: -59px 0 0 527px; padding-top: 108px; "><?php  echo $data_fetch['register_type']; ?> Registered Graduate</h2>
    <h1 style="margin: 10px 0 0 448px; line-height: -0px;"><?php if($data_fetch['register_type']=='Lifetime'){ echo 1200; } else{ echo "500";}?></h1>
    <h2 style="margin: -10px 0 0 331px; padding-top: 12px;"><?php if($data_fetch['register_type']=='Lifetime'){ echo 'One Thousend Two Hundred'; } else{ echo "Five hundred";}?> Taka Only</h2>
     
     
  <!-- end part 1 -->



   
</div>



</body>
</html>