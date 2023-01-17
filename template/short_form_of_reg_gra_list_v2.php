<?php 
include'nav_header.php'; 
require_once '../database/db_connect.php'; 
include '../inc/validation/validation.php';
$user_id= $_SESSION['id'];
?>


<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">




<div class="col-lg-13" id="alert-show">
    
</div>



<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Search</h4>
                <hr>  
                

                 <form  action="" method="post">
                   <label for="validationCustom02"></label>
                   <input type="text" name="nid_no" class="form-control" onkeydown="buttondown()"  placeholder="Enter Nid" >
                   <br>
                   <input type="text" name="mobile_no" class="form-control" onkeydown="buttondown()"  placeholder="Enter Mobile" >
                   <br>
                    <button class="btn btn-info">Search </button>
                </form>

            </div>
        </div>
    </div>
                            
   



<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    
                    <table id="example" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Print</th>
                            <th>Reference</th>
                            <th>Name</th>
                            <th>Mother Name</th>
                            <th>Father Name</th>
                            <th>Present Address</th>
                            <th>Present Thana</th>
                            <th>Present District</th>
                            <th>Nid No</th>
                            <th>Mobile No</th>
                            <th>Register Type</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>

               <?php 

               

               if($_SERVER['REQUEST_METHOD']=='POST')
                {   $mobile_no=validation($_POST['mobile_no']);
                    $nid_no=validation($_POST['nid_no']);
                    if(!$nid_no == null){
                    $query="SELECT * FROM `short_form_of_reg_gra` WHERE `nid_no` LIKE '%$nid_no%'";
                    }
                    if(!$mobile_no== null){
                     $query="SELECT * FROM `short_form_of_reg_gra` WHERE `mobile_no` LIKE '%$mobile_no%'";
                    }

                    $run_query=mysqli_query($db_connection,$query);
                    $i=1;
                    foreach($run_query as $data_show)
                    { ?>
                        <tr>
                             <td>
                                 <?php if($data_show['print']==0)
                                 {    


                                    if( $user_id =="5")
                                        { ?> <span class="badge badge-danger"><a href="../epson_bank_r_print.php?print_id=<?php echo $data_show['id'];?>" target="_blank" style="color: white;">print</span>
                                    <?php }else{?> <span class="badge badge-danger"><a href="../bank_r_print.php?print_id=<?php echo $data_show['id'];?>" target="_blank" style="color: white;">print</span>  <?php  } ?>        
                                  
                                   
                                  <?php 
                                  
                                  }else{ 

                                    if( $user_id =="5")
                                        { ?>
                                    <span class="badge badge-success"><a href="../epson_bank_r_print.php?print_id=<?php echo $data_show['id'];?>" target="_blank" style="color: white;">printed</span> 
                                        <?php }else{?><span class="badge badge-success"><a href="../bank_r_print.php?print_id=<?php echo $data_show['id'];?>" target="_blank" style="color: white;">printed</span><?php  } ?> 
                                  <?php } ?>   
                               </td>
                            
                            <td><?php echo $data_show['ref'] ?></td>
                            <td><?php echo $data_show['name'] ?></td>
                            <td><?php echo $data_show['mother_name'] ?></td>
                            <td><?php echo $data_show['father_name'] ?></td>
                            <td><?php echo $data_show['present_address'] ?></td>
                            <td><?php echo $data_show['present_thana'] ?></td>
                            <td><?php echo $data_show['present_district'] ?></td>
                            <td><?php echo $data_show['nid_no'] ?></td>
                            <td><?php echo $data_show['mobile_no'] ?></td>
                            <td><?php echo $data_show['register_type'] ?></td>
                            <td>

                              
                             <div class="btn-group" role="group" aria-label="Basic example">

                        <?php      

                        if( $user_id =="5"){

                         ?>
                                <a href="../epson_bank_r_print.php?print_id=<?php echo $data_show['id'];?>"><i class="fa-solid fa-file-pdf"></i></a>


                      <?php } else {  ?>

                                <a class="btn btn-outline-secondary" href="../bank_r_print.php?print_id=<?php echo $data_show['id'];?>" target="_blank"><i class="fa-solid fa-file-pdf"></i></a>
                                <?php } ?>
                               
                                <a class="btn btn-outline-success" href="edit_short_form_of_reg_gra.php?short_edit_id=<?php echo $data_show['id'];?>"><i class="far fa-edit"></i></a>
                              </div>

                           </td>

                        </tr>
                   
                    <?php 
                    } 
                 }?>
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->







<!--start  modal -->

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Ref Name</h5>
        <button type="button" class="close" id="close-modal" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#">
          <div class="form-group">
            <label for="exampleInputEmail1">Current name</label>
            <input type="text" class="form-control" id="current_name"  placeholder="Current Name">
            
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Change Name</label>
            <input type="text" class="form-control" id="change_name" placeholder="Change Name">
          </div>
            
          <button type="submit" class="btn btn-primary" onclick="refupdate()">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!--end  modal -->


<?php include 'footer.php'; ?>        