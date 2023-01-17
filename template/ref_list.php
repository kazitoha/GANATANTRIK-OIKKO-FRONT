<?php 
include'nav_header.php'; 
require_once '../database/db_connect.php'; 
include '../inc/validation/validation.php';

?>


<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">




<!-- <div class="col-lg-13" id="alert-show"> -->
<!-- ajax alert -->
<!-- </div>   -->
    <!-- Start success msg -->
    <?php
    if (isset($_SESSION['s_msg'])) 
    { ?>
    <div class="col-lg-12">
        <div class="card alert border mt-4 mt-lg-0 p-0 mb-0">
            <div class="card-header bg-soft-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h5 class="font-size-16 text-success my-1">Success:) <?php echo $_SESSION['s_msg'];?></h5>
            </div>
            
        </div>  
    </div>
<?php
unset($_SESSION['s_msg']);
}
?>
<!-- End success msg -->




<!-- Start danger msg -->
<?php
if (isset($_SESSION['w_msg'])) 
{ ?>
<div class="col-lg-12">
    <div class="card alert border mt-4 mt-lg-0 p-0 mb-0">
        <div class="card-header bg-soft-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h5 class="font-size-16 text-danger my-1">Danger!<?php echo $_SESSION['w_msg'];?> </h5>
        </div>
        
    </div>
</div>
<?php
unset($_SESSION['w_msg']);
}
?>
<br>




<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Reference</h4>
                <hr>  
                

                 <form  action="#" method="post">
                   <label for="validationCustom02"></label>
                    <input type="text" name="ref_name" class="form-control" onkeydown="buttondown()" id="search_ref" placeholder="Enter Reference Name" required><br>
                    <button class="btn btn-info">Search Reference User List</button>
                </form>

            </div>
        </div>
    </div>
                            
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Reference List
                 <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#exampleModalCenter">
                          Update Ref Name
                        </button>
                </h4>
                  <!-- Button trigger modal -->

                  
                    <div class="text-right"> 
                       
                    </div>
                </div>
                <div class="table-responsive" style="overflow:scroll; height:200px;">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Reference</th>
                                
                            </tr>
                        </thead>
                        <?php 
                          $query="SELECT ref FROM short_form_of_reg_gra GROUP BY ref ORDER BY MAX(ref)";
                          $run_query=mysqli_query($db_connection,$query);
                          $i=1;
                        ?>
                        <tbody>
                         <?php foreach ($run_query as $ref_show) { ?>
                             <tr>
                                <th scope="row"><?php echo $i++; ?></th>
                                <td><?php echo $ref_show['ref']; ?></td>
                            </tr>
                      <?php   } ?>
                            
                           
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>




<br>



<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="print_pages/print_out_by_ref.php" class="btn btn-primary float-right"><i class="fa fa-print" aria-hidden="true"></i></a><br><br>
                   
                  
                    <table  id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>

                        <tr>
                            <th>id</th>
                            <th>Reference</th>
                            <th>Register Type</th>
                            <th>Name</th>
                            <th>Mother Name</th>
                            <th>Father Name</th>
                            <th>Present Address</th>
                            <th>Present Thana</th>
                            <th>Present District</th>
                            <th>Nid No</th>
                            <th>Mobile No</th>
                        </tr>
                        </thead>


                        <tbody>

               <?php 

               

               if($_SERVER['REQUEST_METHOD']=='POST')
                {
                    $ref_name=validation($_POST['ref_name']);
                    $_SESSION['ref_name'] = $ref_name;
                    $query="SELECT * FROM `short_form_of_reg_gra` WHERE `ref` LIKE '$ref_name'";
                    $run_query=mysqli_query($db_connection,$query);
                    $i=1;
                    foreach($run_query as $data_show)
                    { ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $data_show['ref'] ?></td>
                            <td><?php echo $data_show['register_type'] ?></td>
                            <td><?php echo $data_show['name'] ?></td>
                            <td><?php echo $data_show['mother_name'] ?></td>
                            <td><?php echo $data_show['father_name'] ?></td>
                            <td><?php echo $data_show['present_address'] ?></td>
                            <td><?php echo $data_show['present_thana'] ?></td>
                            <td><?php echo $data_show['present_district'] ?></td>
                            <td><?php echo $data_show['nid_no'] ?></td>
                            <td><?php echo $data_show['mobile_no'] ?></td>
                            
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
        <form action="../inc/ref_list/ref_mamber.php" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Current name</label>
            <input type="text" class="form-control" name="current_name" id="current_name"  placeholder="Current Name">
            
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Change Name</label>
            <input type="text" class="form-control" name="change_name" id="change_name" placeholder="Change Name">
          </div>
            
          <button type="submit" class="btn btn-primary" onclick="refupdate()">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!--end  modal -->


<!-- <script type="text/javascript">
     $(document).ready(function () {
        refupdate();
    });

     function refupdate(){
        let current_name = $('#current_name').val();
        let change_name = $('#change_name').val();

        let dataArray = {
            current_name: current_name,
            change_name: change_name,
        };
         $.ajax({
            url: '../inc/ref_list/ref_mamber.php',
            type: 'POST',
            data : dataArray,
            
        });
         showAlert();

     }

     function showAlert(){
        let alertShow=`    
               <div class="col-lg-13">
                    <div class="card alert border mt-6 mt-lg-0 p-2 mb-2">
                        <div class="card-header bg-soft-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <h5 class="font-size-16 text-success my-1">Successfully:) Data Updated Successfully</h5>
                        </div>
                        
                    </div>
                </div>`;
         $("#alert-show").html(alertShow)

     }
</script> -->

<?php include 'footer.php'; ?>        