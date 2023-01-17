<?php
session_start();

?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Register | Dhaka University</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="bg-primary bg-pattern">
        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-5">
                            <a href="register.php" class="logo"><img src="../uploads/logo/university-of-dhaka.jpg" height="100" alt="logo"></a>
                            <h5 class="font-size-20 text-white-55 mb-10">Dhaka University</h5>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="p-2">
                                    <h5 class="mb-5 text-center">Register Account to Apaxy.</h5>
                    
                    <?php 
                          if(isset($_SESSION['w_msg']))
                          { 
                    ?>
                    <div class="alert alert-danger" role="alert"><?php echo $_SESSION['w_msg']; ?></div>

                    <?php } 

                          unset($_SESSION['w_msg']);
                     ?>
                                    <form class="form-horizontal" method="post" action="../inc/register_user/register_query.php">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mb-4">
                                                    <label for="username">Username</label>
                                                    <input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="useremail">Email</label>
                                                    <input type="email" name="email" class="form-control" id="useremail" placeholder="Enter email">        
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="userpassword">Password</label>
                                                    <input type="password" name="password" class="form-control" id="userpassword" placeholder="Enter password">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="userpassword">Confirm password</label>
                                                    <input type="password" name="confirm_pass" class="form-control" id="userpassword" placeholder="Enter password">
                                                </div>
                                                
                                                <div class="mt-4">
                                                    <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Register</button>
                                                </div>
                                                <div class="mt-4 text-center">
                                                    <a href="login.php" class="text-muted"><i class="mdi mdi-account-circle mr-1"></i> Already have account?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end Account pages -->

        <!-- JAVASCRIPT -->
        <script src="../assets/libs/jquery/jquery.min.js"></script>
        <script src="../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="../assets/libs/simplebar/simplebar.min.js"></script>
        <script src="../assets/libs/node-waves/waves.min.js"></script>

        <script src="assets/js/app.js"></script>

    </body>
</html>
