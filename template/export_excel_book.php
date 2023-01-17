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
                <h4 class="mb-0 font-size-18">Export Book Or Excel</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="index.php">Du</a></li>
                        <li class="breadcrumb-item active">Export Book Or Excel</li>
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

    <!-- start excel  -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title " style="text-align: center;">Export Excel</h4>
                    
                    <form class="needs-validation" action="excel_output.php" method="post" >
                        <div class="row">
                          
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">Start ID</label>
                                <input type="number" class="form-control"  name="start_id" required>
                                
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">End ID</label>
                                <input type="number" class="form-control"  name="end_id" required>
                                
                            </div>
                          
                        
                        <button class="btn btn-info" type="submit">Export Excel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </form>
    </div><br>
    <!-- end excel  -->



   <!-- start book  -->
    <div class="row">
        <div class="col-lg-12 form-group">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title " style="text-align: center;">Export Book</h4>
                          
                        <a href="book.php" class="btn btn-info btn-lg btn-block" target="_blank">Create Book</a>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- end book -->

   


           







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