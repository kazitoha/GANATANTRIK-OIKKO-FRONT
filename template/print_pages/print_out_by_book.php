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
               
     <tbody>
        
                 <?php 
                      $i=1;
                      $x=1;
                      foreach($run_query as $data_show)
                      { ?>
                        <?php if($data_show['register_type']=='Lifetime'){ ?>
                        
                        <?php if($x=1){?><tr><?php } ?>
                            <?php $x++; if($x==2){ ?><td width="50%">Name: toha<?php echo $i;  ?></td> <?php } ?>
                            <?php if($x==3){ ?><td width="50%">Name: toha<?php echo $i;  ?></td> <?php } ?>
                            
                            
                        <?php if($x=3){?></tr><?php } ?>
                         <?php } ?>
                        <!-- end of if condditon -->

                   
                    <?php } ?>
    </tbody>
  </table>
</div>



</body>
</html>