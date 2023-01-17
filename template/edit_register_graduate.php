<?php include'nav_header.php'; ?>
           


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
                        <li class="breadcrumb-item active">Edit Registered Graduate</li>
                    </ol>
                </div>
                
            </div>
        </div>
    </div>     
    <!-- end page title -->




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


<!-- End danger msg -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Edit Registered Graduate</h4>
                    <p class="card-title-desc">This is, you’ll need to add the <code>Edit Registered Graduate page.</code></p>


                    <?php
                        require_once '../database/db_connect.php';
                        if(!isset($_SESSION['register_edit_id']))
                        {
                          $catch_id=$_GET['reg_id'];
                        }else{
                           $catch_id=$_SESSION['register_edit_id']; 
                        }
                        
                       
                        $query="SELECT * FROM registered_graduates WHERE id=$catch_id";
                        $run_query=mysqli_query($db_connection,$query);
                        $data_fetch=mysqli_fetch_assoc($run_query);

                        

                    ?>
                    
                    <form class="needs-validation" action="../inc/register_graduate/edit_registered_graduate.php" method="post" enctype="multipart/form-data" novalidate>
                        <!-- edit id  -->
                         <?php $_SESSION['register_edit_id']=$data_fetch['id'];?>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Name</label>
                                <input type="text"  class="form-control" id="validationCustom01"  name="name"   value="<?php echo $data_fetch['name']; ?>" required>
                                
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Mother's Name</label>
                                <input type="text" class="form-control" id="validationCustom01"  name="mother_name" value="<?php echo $data_fetch['mother_name']; ?>" required>
                                
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Father's Name</label>
                                <input type="text" class="form-control" id="validationCustom01"  name="father_name" value="<?php echo $data_fetch['father_name']; ?>" required>
                                
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom02">Present Address</label>
                                <input type="text" class="form-control" id="validationCustom02" name="present_address" value="<?php echo $data_fetch['present_address']; ?>" required>
                                
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom02">Present Thana</label>
                                <input type="text" class="form-control" id="validationCustom02" name="present_thana" value="<?php echo $data_fetch['present_thana']; ?>" required>
                                
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom02">Permanent District</label>
                                <input type="text" class="form-control" id="validationCustom02" name="present_district" value="<?php echo $data_fetch['present_district']; ?>" required>
                                
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom02">Permanent Address</label>
                                <input type="text" class="form-control" id="validationCustom02" name="permanent_address" value="<?php echo $data_fetch['permanent_address']; ?>" required>
                                
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom02">Permanent Thana</label>
                                <input type="text" class="form-control" id="validationCustom02" name="permanent_thana" value="<?php echo $data_fetch['permanent_thana']; ?>" required>
                                
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom02">Present District</label>
                                <input type="text" class="form-control" id="validationCustom02" name="permanent_district" value="<?php echo $data_fetch['permanent_district']; ?>" required>
                                
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">Nid No.</label>
                                <input type="text" class="form-control" id="validationCustom02" name="nid_no" value="<?php echo $data_fetch['nid_no']; ?>" required>
                                
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">Date of Birth</label>
                                <input type="date" class="form-control" id="validationCustom02" name="date_of_birth" value="<?php echo $data_fetch['date_of_birth']; ?>" required>
                                
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">Gender</label>
                                <input type="text" class="form-control" id="validationCustom02" name="gender" value="<?php echo $data_fetch['gender']; ?>" required>
                                
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">Mobile No.</label>
                                <input type="text" class="form-control" id="validationCustom02"  name="mobile_no" value="<?php echo $data_fetch['mobile_no']; ?>" required>
                                
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom02">Qualifying degree from the University of Dhaka(Hons./Masters/Degree/Diploma)</label>
                                <input type="text" class="form-control" id="validationCustom02" name="qualifying_degree" value="<?php echo $data_fetch['qualifying_degree']; ?>" required>
                                
                            </div>
                             <div class="col-md-12 mb-3">
                                <label for="validationCustom02">Dept,/Institute/College</label>
                                <input type="text" class="form-control" id="validationCustom02" name="dept_name_institute" value="<?php echo $data_fetch['dept_name_institute']; ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">Registration NO.</label>
                                <input type="text" class="form-control" id="validationCustom02"name="reg_no" value="<?php echo $data_fetch['reg_no']; ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">Session</label>
                                <input type="text" class="form-control" id="validationCustom02" name="session" value="<?php echo $data_fetch['session']; ?>" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom02">Occupation(with designation)</label>
                                <input type="text" class="form-control" id="validationCustom02"  name="occupation" value="<?php echo $data_fetch['occupation']; ?>" required>
                            </div>

                           <!-- old image id -->
                           <?php $_SESSION['register_old_image'] =$data_fetch['image'];?>

                           

                            <div class="col-md-12 mb-3">
                                <label for="validationCustom02">Image</label>
                                <input type="file" class="form-control" id="validationCustom02"  name="image" onchange="readURL(this);" />
                                </br>
                                <img id="blah" type="file"  src="../uploads/register_graduate/<?php echo $data_fetch['image']; ?>" alt="your image" height="120px" width="120px" name="image"  />
                                
                            </div>
                           
                           <!--  <div class="col-md-12 mb-3" style="color: #F98280;">
                            <h5>Registration fee:</h5>
                                <p>(a)Taka 500.00 for Three academic years.<br>(b)Taka 1200.00 for life.</p>
                                

                                <h5>I do hereby declare that the statements:</h5>
                                <p>The statements made above are correct. In case of detection of any wrong entries my registration will be liable to cancellation without any reference.</p>
                            <div class="col-md-12 mb-3">
                            
                        </div>
 -->                       
                        <button class="btn btn-info" type="submit">Update form</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->




           





                                        
                                            
                     
                                                    
                                                        
                                                    
                                
    
<!-- Start footer -->
<?php include 'footer.php'; ?>        