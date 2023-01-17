<?php include'nav_header.php'; ?>
<?php
require_once '../database/db_connect.php'; ?>


           


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Registered Graduate</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="index.php">Du</a></li>
                        <li class="breadcrumb-item active">Registered Graduate</li>
                    </ol>
                </div>
                
            </div>
        </div>
    </div>     
    <!-- end page title -->

 <table class="table table-striped">
      <tbody>
<?php 


  $query="SELECT ref FROM short_form_of_reg_gra GROUP BY ref ORDER BY MAX(ref)";
  $run_query=mysqli_query($db_connection,$query);
  $i=1;
  foreach ($run_query as $key => $value) 
  { 
    $ref_name=$value['ref'];
    $query="SELECT * FROM `short_form_of_reg_gra` WHERE `ref` LIKE '$ref_name' ORDER by register_type DESC";
    $ref_datas=mysqli_query($db_connection,$query);
    ?> 
      <td colspan="10">
        <b class="d-flex justify-content-center"><?php echo $ref_name; ?></b>
      </td> 
    <?php
     foreach ($ref_datas as $key => $ref_data) 
       { ?>  
                <tr>        
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $ref_data['register_type'] ?></td>
                  <td><?php echo $ref_data['name'] ?></td>
                  <td><?php echo $ref_data['mother_name'] ?></td>
                  <td><?php echo $ref_data['father_name'] ?></td>
                  <td><?php echo $ref_data['present_address'] ?></td>
                  <td><?php echo $ref_data['present_thana'] ?></td>
                  <td><?php echo $ref_data['present_district'] ?></td>
                  <td><?php echo $ref_data['nid_no'] ?></td>
                  <td><?php echo $ref_data['mobile_no'] ?></td>
                </tr>

         <?php
        }
   }

?>    
              </tbody>
            </table>

 

           



   