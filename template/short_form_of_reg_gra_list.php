<?php 
session_start();
if(!isset($_SESSION['login_email']))
{
  header('location:login.php');
}
?>
<?php
if(isset($_SESSION['register_edit_id']))
{
    unset($_SESSION['register_edit_id']);
}
if(isset($_SESSION['short_register_edit_id'])){
    unset($_SESSION['short_register_edit_id']);
}
if(isset($_SESSION['nid_no'])){
    unset($_SESSION['nid_no']);
}
require_once '../database/db_connect.php';

$user_id= $_SESSION['id'];

   ?>         



<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Dashboard | Univesity</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="register graduate" name="description" />
        <meta content="du register graduate" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="../assets/images/favicon.ico">

        <!-- DataTables -->
        <link href="../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="../assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />     

        <!-- Bootstrap Css -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" />

        


    </head>

    <body data-sidebar="dark">

        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="dashboard.php" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="../uploads/logo/university-of-dhaka.jpg" alt=""width="30" height="60">
                                </span>
                                <span class="logo-lg">
                                    <img src="../uploads/logo/university-of-dhaka.jpg" alt="" height="50">
                                </span>
                            </a>

                            <a href="dashboard.php" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="../uploads/logo/university-of-dhaka.jpg" alt="" width="30" height="40">
                                </span>
                                <span class="logo-lg">
                                    <img src="../uploads/logo/university-of-dhaka.jpg" height="60">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="mdi mdi-backburger"></i>
                        </button>

                        <!-- App Search-->
                        <form class="app-search d-none d-lg-block">
                            <div class="position-relative">
                                <input class="form-control"  id="searchbar" onkeyup="search_animal()" type="text" name="search"  placeholder="Search...">
                                <span class="mdi mdi-magnify"></span>
                            </div>
                        </form>
                    </div>


                    <div class="d-flex">
                         <div class="dropdown d-inline-block d-lg-none ml-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                                aria-labelledby="page-header-search-dropdown">
                    
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        
    
                        <div class="dropdown d-none d-lg-inline-block ml-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                <i class="mdi mdi-fullscreen"></i>
                            </button>
                        </div>

                        <!-- notification -->

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-bell-outline"></i>
                                <span class="badge badge-danger badge-pill">3</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                                aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0 font-weight-medium text-uppercase"> Notifications </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="badge badge-pill badge-danger">New 3</span>
                                        </div>
                                    </div>
                                </div>
                                <div data-simplebar style="max-height: 230px;">
                                    <a href="" class="text-reset notification-item">
                                        <div class="media">
                                            <div class="avatar-xs mr-3">
                                                <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                    <i class="mdi mdi-cart"></i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mt-0 mb-1">Your order is placed</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1">If several languages coalesce the grammar</p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                
                            </div>
                        </div>


                        
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="../uploads/admin_profile/<?php echo $_SESSION['login_image'];?>"
                                    alt="Header Avatar">

                                <span class="d-none d-sm-inline-block ml-1"><?php echo $_SESSION['login_username'];?></span>
                                <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a class="dropdown-item" href="profile.php"><i class="mdi mdi-face-profile font-size-16 align-middle mr-1"></i> Profile</a>
                                
                                <a class="dropdown-item" href="../inc/login/logout_query.php"><i class="mdi mdi-logout font-size-16 align-middle mr-1"></i> Logout</a>
                            </div>
                        </div>
            
                    </div>
                </div>
            </header>



             <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title search_bar">Menu</li>

                            <li class="search_bar">
                                <a href="dashboard.php" class="waves-effect">
                                    <i class="mdi mdi-view-dashboard "></i><span class="badge badge-pill badge-success float-right">2</span>
                                    <span>Dashboard</span>
                                </a>
                            </li>


                            <li class="search_bar">
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="fas fa-tools"></i>
                                    <span>Tool</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li class="search_bar"><a href="../pages_maintenance.php" target="_blank" class=" waves-effect"><i class="mdi mdi-web"></i>
                                       <span>Visit website</span>
                                          </a>
                                    </li>
                                    <!-- <li class="search_bar"><a href="email-inbox.html">Inbox</a></li> -->
                                </ul>
                            </li>

                            <li class="menu-title search_bar">Register Graduate</li>

                            <li class="search_bar">
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="mdi mdi-note-text"></i>
                                    <span>Short Form </span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li class="search_bar"><a href="short_form_of_reg_gra.php" class=" waves-effect"><i class="mdi mdi-web"></i>
                                       <span>Add Register Graduate</span>
                                          </a>
                                    </li>
                                    <li class="search_bar"><a href="short_form_of_reg_gra_list.php" class=" waves-effect"><i class="mdi mdi-web"></i>
                                       <span>Register Graduate list</span>
                                          </a>
                                    </li>

                                    <li class="search_bar"><a href="export_excel_book.php" class=" waves-effect"><i class="mdi mdi-book"></i>
                                       <span>Export Excel/Book</span>
                                          </a>
                                    </li>
                                    <li class="search_bar"><a href="ref_list.php" class=" waves-effect"><i class="mdi mdi-book"></i>
                                       <span>Reference List</span>
                                          </a>
                                    </li>
                                    
                                </ul>
                            </li>

                             <li class="search_bar">
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                     <i class="mdi mdi-clipboard-list-outline"></i>
                                    <span>Full Form </span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                   <li class="search_bar">
                                <a href="register_graduate.php" class=" waves-effect">
                                    <i class="mdi mdi-note-text"></i>
                                    <span>Add Register Graduate</span>
                                </a>
                             </li>
                            <li class="search_bar search_bar">
                                <a href="register_graduate_list.php" class=" waves-effect">
                                    <i class="mdi mdi-clipboard-list-outline"></i>
                                    <span>Register Graduate List</span>
                                </a>
                             </li>
                                </ul>
                            </li>
                             
                             <li class="menu-title search_bar">News</li>
                              <li class="search_bar">
                                <a href="add_news.php" class=" waves-effect">
                                    <i class="mdi mdi-file-document-box-plus-outline"></i>
                                    <span>Add News</span>
                                </a>
                             </li>
                             <li class="search_bar search_bar">
                                <a href="news_list.php" class=" waves-effect">
                                    <i class="mdi mdi-clipboard-list-outline"></i>
                                    <span>News List</span>
                                </a>
                             </li>
                             <li class="menu-title search_bar">About</li>
                             <li class="search_bar">
                                <a href="add_about_us.php" class=" waves-effect">
                                    <i class="fas fa-address-card"></i>
                                    <span>Add About</span>
                                </a>
                             </li>
                             <li class="search_bar">
                                <a href="about_list.php" class=" waves-effect">
                                    <i class="mdi mdi-clipboard-list-outline"></i>
                                    <span>About List</span>
                                </a>
                             </li>

                             <!-- <li class="search_bar">
                                <a href="?page=add_user" class=" waves-effect">
                                    <i class="mdi mdi-clipboard-list-outline"></i>
                                    <span>About List</span>
                                </a>
                             </li> -->
  

                         
                             




                        <div class="sidebar-section mt-5 mb-3">
                            <h6 class="text-reset font-weight-medium">
                                Project Completed
                                <span class="float-right">88%</span>
                            </h6>
                            <div class="progress mt-3" style="height: 15px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 88%" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">




                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="header-title">Default Datatable</h4>
                                        <p class="card-title-desc">DataTables has most features enabled by
                                            default, so all you need to do to use it with your own tables is to call
                                            the construction function: <code>$().DataTable();</code>.
                                        </p>
        
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            
                                    <tr>
                                        <th>print</th>
                                        <th>id</th>
                                        <th>Name</th>
                                        <th>Mother Name</th>
                                        <th>Father Name</th>
                                        <th>Nid No</th>
                                        <th>Present Address</th>
                                        <th>Present Thana</th>
                                        <th>Present District</th>
                                        <th>Mobile No</th>
                                        <th>Reference</th>
                                        <th>Register Type</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
        
        
                                             <tbody>
                        <!-- show notice data from database -->
                        <?php
                          $query="SELECT * FROM short_form_of_reg_gra ORDER by ref DESC";
                          $run_query=mysqli_query($db_connection,$query);
                          $i=1;
                          foreach ($run_query as $data_show)
                          {
                         ?>

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
                               <td><?php echo $data_show['id']; ?></td>
                               <td><?php echo $data_show['name']; ?></td>
                               <td><?php echo $data_show['mother_name']; ?></td>
                               <td><?php echo $data_show['father_name']; ?></td>
                               <td><?php echo $data_show['nid_no']; ?></td>
                               <td><?php echo $data_show['present_address']; ?></td>
                               <td><?php echo $data_show['present_thana']; ?></td>
                               <td><?php echo $data_show['present_district']; ?></td>
                               <td><?php echo $data_show['mobile_no']; ?></td>
                               <td><?php echo $data_show['ref']; ?></td>
                               <td><?php echo $data_show['register_type']; ?></td>
                             
                               <td>

                              
                             <div class="btn-group" role="group" aria-label="Basic example">

                               
                                <a class="btn btn-outline-success" href="edit_short_form_of_reg_gra.php?short_edit_id=<?php echo $data_show['id'];?>"><i class="far fa-edit"></i></a>
                              </div>

                           </td>

                               
                           </tr>
                           <?php
                              }
                           ?>
                          
                            </tbody>


                                        </table>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>




    

     <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="../assets/libs/jquery/jquery.min.js"></script>
        <script src="../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="../assets/libs/simplebar/simplebar.min.js"></script>
        <script src="../assets/libs/node-waves/waves.min.js"></script>

        <!-- Required datatable js -->
        <script src="../assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="../assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="../assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="../assets/libs/jszip/jszip.min.js"></script>
        <script src="../assets/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="../assets/libs/pdfmake/build/vfs_fonts.js"></script>
        <script src="../assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="../assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="../assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="../assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="../assets/js/pages/datatables.init.js"></script>

        <script src="../assets/js/app.js"></script>



