<?php 
session_start();
if(!isset($_SESSION['login_email']))
{
  header('location:login.php');
}
// require_once '../database/db_connect.php'; 

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
        <link rel="shortcut icon" href="../uploads/logo/university-of-dhaka.jpg">

        <!-- slick css -->
        <link href="../assets/libs/slick-slider/slick/slick.css" rel="stylesheet" type="text/css" />
        <link href="../assets/libs/slick-slider/slick/slick-theme.css" rel="stylesheet" type="text/css" />     
        <!-- DataTables -->
        <link href="../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

         <!-- Responsive datatable examples -->
        <link href="../assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
         


        <!-- Datatable CSS -->
        <link href='DataTables/datatables.min.css' rel='stylesheet' type='text/css'>

        <!-- jQuery Library -->
        <script src="jquery-3.3.1.min.js"></script>
        
        <!-- Datatable JS -->
        <script src="DataTables/datatables.min.js"></script>

        <!-- jvectormap -->
        <link href="../assets/libs/jqvmap/jqvmap.min.css" rel="stylesheet" />
        <!-- Profile Css -->
        <link href="../assets/css/profile.min.css" rel="stylesheet" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Icons Css -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <!-- ====Fontawesome link start===== -->
        <link rel="stylesheet" href="../assets/css/all.min.css">
        <!-- ====bootstrap css start==== -->
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <!-- Summernote css -->
        <link href="../assets/libs/summernote/summernote-bs4.css" rel="stylesheet" type="text/css" />
        <!-- alertifyjs Css -->
        <link href="../assets/libs/alertifyjs/build/css/alertify.min.css" rel="stylesheet" type="text/css" />

        <!-- alertifyjs default themes  Css -->
        <link href="../assets/libs/alertifyjs/build/css/themes/default.min.css" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        


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
                                     <li class="search_bar"><a href="../datatable/index.php" class=" waves-effect"><i class="mdi mdi-web"></i>
                                       <span>List view</span>
                                          </a>
                                    </li>
                                    <li class="search_bar"><a href="short_form_of_reg_gra_list_v2.php" class=" waves-effect"><i class="mdi mdi-web"></i>
                                       <span>Graduate Edit/print</span>
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
                            <li class="search_bar"><a href="export_excel_book.php"  class=" waves-effect"><i class="mdi mdi-book"></i><span>Export Excel/Book</span></a>
                            </li>

                        <li class="search_bar">
                          <a href="insert_data_from_excel.php"  class=" waves-effect">
                            <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                            <span>Insert Data From excel</span>
                          </a>
                        </li>

                         
                    

                        
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








    


