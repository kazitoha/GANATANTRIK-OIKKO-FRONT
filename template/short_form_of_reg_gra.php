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


 <?php
    if (isset($_SESSION['s_msg'])) 
    { ?>
<div class="col-lg-13">
    <div class="card alert border mt-6 mt-lg-0 p-2 mb-2">
        <div class="card-header bg-soft-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h5 class="font-size-16 text-success my-1">Successfully:)<?php echo$_SESSION['s_msg'];?></h5>
        </div>
        
    </div>
</div>
<?php
unset($_SESSION['s_msg']);
}
?>

    <!-- Start danger msg -->
 <?php
    if (isset($_SESSION['w_msg'])) 
    { ?>
<div class="col-lg-13">
    <div class="card alert border mt-6 mt-lg-0 p-2 mb-2">
        <div class="card-header bg-soft-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h5 class="font-size-16 text-danger my-1">Danger!<?php echo$_SESSION['w_msg'];?></h5>
        </div>
        
    </div>
</div>
<?php
unset($_SESSION['w_msg']);
}
?>

<!-- End danger msg -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Registered Graduate</h4>
                    <p class="card-title-desc">This is, you’ll need to add the <code>Registered Graduate page.</code></p>
                    
                    <form class="needs-validation" action="../inc/short_form_of_reg_gra/short_form_of_reg_gra.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                          <div class="col-md-12 mb-3">
                                <label for="validationCustom02">Register Type</label>
                                <select class="form-control" name="register_type" required>
                                    <option>Select....</option>
                                    <option value="Onetime"> Onetime</option>
                                    <option value="Lifetime">Lifetime</option>
                                </select>
                            </div>
                           <div class="col-md-12 mb-3">
                                <label for="validationCustom02">Ref</label>
                                <input type="text" class="form-control" id="validationCustom02"  name="ref" required>
                                
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Name</label>
                                <input type="text"  class="form-control" id="validationCustom01"  name="name" required>
                                
                            </div>
                          

                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Mother's Name</label>
                                <input type="text" class="form-control" id="validationCustom01"  name="mother_name" required>
                                
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Father's Name</label>
                                <input type="text" class="form-control" id="validationCustom01"  name="father_name" required>
                                
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom02">Present Address</label>
                                <input type="text" class="form-control" id="validationCustom02" name="present_address" required>
                                
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom02">Present Thana</label>
                                <input type="text" class="form-control" id="validationCustom02" name="present_thana" required>
                                
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom02">Present District</label>
                                <input type="text" class="form-control" id="validationCustom02" name="present_district" required>
                                
                            </div>
                            
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom02">Nid No.</label>
                                <input type="number" class="form-control" id="validationCustom02" name="nid_no" required>
                                
                            </div>
                           
                             
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom02">Mobile No.</label>
                                <input type="number" class="form-control" id="validationCustom02"  name="mobile_no" required>
                                
                            </div>

                              

                            
                           
    
                            
                          
                        
                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->




           







    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>



  <script type="text/javascript">

      $('.date-own').datepicker({

         minViewMode: 2,

         format: 'yyyy'

       });

  </script>                                   
                                                        
                                                    
                                
    
<!-- Start footer -->
<?php include 'footer.php'; ?>        