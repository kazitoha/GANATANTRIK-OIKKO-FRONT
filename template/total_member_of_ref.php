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
                <h4 class="mb-0 font-size-18">Total Ref Graduate</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="index.php">Du</a></li>
                        <li class="breadcrumb-item active">Total Ref Graduate</li>
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

            
    
<!-- Start footer -->
<?php include 'footer.php'; ?>        