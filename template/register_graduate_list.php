<?php include'nav_header.php'; ?>
<?php
if(isset($_SESSION['register_edit_id']))
{
    unset($_SESSION['register_edit_id']);
}
require_once '../database/db_connect.php';
 ?>

           


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Register Graduate page</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="index.php">Du</a></li>
                        <li class="breadcrumb-item active">Register Graduate</li>
                    </ol>
                </div>
                
            </div>
        </div>
    </div>     
    <!-- end page title -->

    


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
<!-- End danger msg -->
           





                                        
                                            
                     
                                                    
                                                        
                                                    
                                
                                                    
                                      



<!--------------------NOTICE TABLE--------------------------- -->
    <div class="col-12">

        <div class="card">
            <div class="card-body">

                <h4 class="header-title">Register Graduate page</h4>
                <p class="card-title-desc">This is the list of  <code>Register:</code>.
                </p>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 1; width: 100%;">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Reg No.</th>
                        <th>Father Name</th>
                        <th>Dept./Institute</th>
                        <th>Action</th>
                        
                    </tr>
                    </thead>


                    <tbody>
                        <!-- show notice data from database -->
                         <?php
                           $query="SELECT * FROM registered_graduates ORDER by id DESC";
                           $run_query=mysqli_query($db_connection,$query);
                           $i=1;
                           foreach ($run_query as $data_show)
                           {
                          ?>

                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $data_show['name']; ?></td>
                        <td><?php echo $data_show['reg_no']; ?></td>
                        <td><?php echo $data_show['father_name']; ?></td>
                        <td><?php echo $data_show['dept_name_institute']; ?></td>
                        <td>

                       

                       <a class="btn btn-outline-secondary" href="../inc/fpdf/fpdf_query.php?reg_id=<?php echo $data_show['id'];?>" target="_blank"><i class="fa-solid fa-file-pdf"></i></a>


                       <a class="btn btn-outline-danger " href="../inc/fpdf/fpdf_query.php?reg_id=<?php echo $data_show['id'];?>" download="../inc/fpdf/fpdf_query.php?reg_id=<?php echo $data_show['id'];?>"><i class="fa-solid fa-download"></i></a>

                        
                       <a class="btn btn-outline-success" href="edit_register_graduate.php?reg_id=<?php echo $data_show['id'];?>"><i class="far fa-edit"></i></a>

                    </td>

                        
                    </tr>
                    <?php
                       }
                    ?>
                   
                    </tbody>
                </table>

            </div>
        </div>
    </div>
     <!-- end col -->


<!-- Start footer -->
<?php require_once 'footer.php'; ?>        