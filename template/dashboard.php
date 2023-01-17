<?php
include'nav_header.php'; 
require_once '../database/db_connect.php'; 
?>
           

            <!-- ============================================================== -->
            <!-- Start right Content here -->
     
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Dashboard</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="dashboard.php">Du</a></li>
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->
                       
                        

<div class="row">

 <div class="card text-white bg-info col-sm-6 col-xl-3">
        <div class="card-body">
            <blockquote class="card-bodyquote mb-0">
                <p><span><h5>Hello <?php echo $_SESSION['login_username'];?></h5>
                    <?php echo $_SESSION['login_email']; ?></span></p>
                <footer class="blockquote-footer text-white">
                    Welcome to admin control 
                </footer>
            </blockquote>
        </div>
    </div>



    <div class="col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="media-body">
                        <a href="register_graduate_list.php">
                        <h5 class="font-size-14">Total registered graduate</h5>
                    </div>
                    <div class="avatar-xs">
                        <span class="avatar-title rounded-circle bg-success">
                            <i class="mdi mdi-notebook-multiple"></i>
                        </span>
                    </div>
                </div>
                <h4 class="m-0 align-self-center"> 
                  
                   <?php
                       $query="SELECT * FROM registered_graduates ORDER by id DESC";
                       $run_query=mysqli_query($db_connection,$query);
                       $data_fetch=mysqli_fetch_assoc($run_query);
                       print_r($data_fetch['id']);
                       
                      ?>
                       
                    </h4>
                      <p class="mb-0 mt-3 text-muted"> Total registered graduate.</p>
                
            </div>
            </a>
        </div>
    </div>
    

 

    

</div>
<!-- end row -->



  <!--footer  -->

  <?php require_once 'footer.php'; ?>