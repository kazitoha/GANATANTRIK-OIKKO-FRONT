<?php

require_once __DIR__ . '../../../vendor/autoload.php';
ob_start()?>

  <?php session_start();
if(!isset($_SESSION['login_email']))
{
  header('location:login.php');
}
require_once '../../database/db_connect.php'; 
include '../../inc/validation/validation.php';

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>GANATANTRIK OIKKO FRONT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body >

<div class="container-fluid">
           <?php 
            $ref_name ="";
            if(isset($_SESSION['ref_name'])){

             $ref_name=$_SESSION['ref_name'];

            }
            $query="SELECT * FROM `short_form_of_reg_gra` WHERE `ref` LIKE '$ref_name' ORDER by register_type ASC ";
            $run_query=mysqli_query($db_connection,$query);
            $x=1;
            ?>
            <?php
            if($x ==1)
            {
                foreach($run_query as $ref_show)
                {
                 $x++; ?>
                <div style="text-align: center;">
                    <h4>DU Registered Graduate Senate Election-2022</h4>
                    <h4><i><?php echo ucwords($ref_show['ref']);?></i></h4><hr>
                    <h4><?php if($ref_show['register_type']=='Lifetime')
                             {
                              echo $ref_show['register_type'];
                             }
                        ?></h4>
                </div> 
         <?php break;  } 
            } ?>
              <table border="1" width="100%" style="border-collapse: collapse;">
                <thead>
                    
                  <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Mother Name</th>
                    <th>Father Name</th>
                    <th>Present Address</th>
                    <th>Nid No</th>
                    <th>Mobile No</th>
                  </tr>
                </thead>

     <tbody>
        
                 <?php 
                      $i=1;
                      foreach($run_query as $data_show)
                    { ?>
                        <?php if($data_show['register_type']=='Lifetime'){ ?>
                        <tr >
                            <td><?php echo $i++; ?></td>
                            <td ><?php echo $data_show['name'] ?></td>
                            <td style=""><?php echo $data_show['mother_name'] ?></td>
                            <td style=""><?php echo $data_show['father_name'] ?></td>
                            <td width="20">
                            <?php 
                                echo $data_show['present_address'].",";
                                echo $data_show['present_thana'].",";
                                echo $data_show['present_district'];
                            ?>
                            </td>
                            <td style=""><?php echo $data_show['nid_no'] ?></td>
                            <td style=""><?php echo $data_show['mobile_no'] ?></td>
                            
                        </tr>
                         <?php } ?>
                        <!-- end of if condditon -->

                   
                    <?php } ?>
    </tbody>
  </table>
</div>




<!-- One Time side -->
<div class="" >
           <?php 
            if(isset($_SESSION['ref_name'])){
              $ref_name=$_SESSION['ref_name'];
            }
            $query="SELECT * FROM `short_form_of_reg_gra` WHERE `ref` LIKE '$ref_name' ORDER by register_type DESC ";
            $run_query=mysqli_query($db_connection,$query);
            $x=1;
            ?>
            <?php
            if($x ==1)
            {
                foreach($run_query as $ref_show)
                {
                 $x++; ?>
                <div style="text-align: center;">
                    <h4><?php echo 'Three Academic Years(Onetime)'?></h4>
                </div> 
         <?php break;  } 
            } ?>
              <table border="1" width="100%" style="border-collapse: collapse;">
                <thead> 
                  <tr >
                    <th>id</th>
                    <th >Name</th>
                    <th>Mother Name</th>
                    <th>Father Name</th>
                    <th>Present Address</th>
                    <th>Nid No</th>
                    <th>Mobile No</th>
                  </tr>
            </thead>

     <tbody>
        
                 <?php 
                      foreach($run_query as $data_show)
                    { ?>
                        <?php if($data_show['register_type']=='Onetime'){ ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td ><?php echo $data_show['name']; ?></td>
                            <td><?php echo $data_show['mother_name']; ?></td>
                            <td><?php echo $data_show['father_name'] ;?></td>
                            <td>
                            <?php 
                                echo $data_show['present_address'].",";
                                echo $data_show['present_thana'].",";
                                echo $data_show['present_district'];
                            ?>
                            </td>
                                        
                                     
                            <td><?php echo $data_show['nid_no'] ?></td>
                            <td><?php echo $data_show['mobile_no'] ?></td>
                            
                        </tr>
                         <?php } ?>
                        <!-- end of if condditon -->

                   
                    <?php } ?>
    </tbody>
  </table>
</div>
</body>
</html>

<?php
$body=ob_get_clean();

$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => [190, 236],
    'orientation' => 'L',
    'margin_left' => 5,
    'margin_right' => 5,
    'margin_top' =>5,
]);

$mpdf->WriteHTML($body);
$mpdf->Output();
