<?php 
session_start();
if(!isset($_SESSION['login_email']))
{
  header('location:login.php');
}
require_once '../database/db_connect.php'; 

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
        
         


        <!-- Datatable CSS -->
        <link href='DataTables/datatables.min.css' rel='stylesheet' type='text/css'>

        <!-- jQuery Library -->
        <script src="jquery-3.3.1.min.js"></script>
        
        <!-- Datatable JS -->
        <script src="DataTables/datatables.min.js"></script>

        
        <!-- Icons Css -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <!-- ====Fontawesome link start===== -->
        <link rel="stylesheet" href="../assets/css/all.min.css">
        <!-- ====bootstrap css start==== -->
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    
     


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
                                    <li class="search_bar"><a href="../template/short_form_of_reg_gra.php" class=" waves-effect"><i class="mdi mdi-web"></i>
                                       <span>Add Register Graduate</span>
                                          </a>
                                    </li>
                                     <li class="search_bar"><a href="index.php" class=" waves-effect"><i class="mdi mdi-web"></i>
                                       <span>List view</span>
                                          </a>
                                    </li>
                                    <li class="search_bar"><a href="../template/short_form_of_reg_gra_list_v2.php" class=" waves-effect"><i class="mdi mdi-web"></i>
                                       <span>Graduate Edit/print</span>
                                          </a>
                                    </li>

                                    <li class="search_bar"><a href="../template/export_excel_book.php" class=" waves-effect"><i class="mdi mdi-book"></i>
                                       <span>Export Excel/Book</span>
                                          </a>
                                    </li>
                                    <li class="search_bar"><a href="../template/ref_list.php" class=" waves-effect"><i class="mdi mdi-book"></i>
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
                                <a href="../template/register_graduate.php" class=" waves-effect">
                                    <i class="mdi mdi-note-text"></i>
                                    <span>Add Register Graduate</span>
                                </a>
                             </li>
                            <li class="search_bar search_bar">
                                <a href="../template/register_graduate_list.php" class=" waves-effect">
                                    <i class="mdi mdi-clipboard-list-outline"></i>
                                    <span>Register Graduate List</span>
                                </a>
                             </li>
                                </ul>
                            </li>
                             
                             <li class="menu-title search_bar">News</li>
                              <li class="search_bar">
                                <a href="../template/add_news.php" class=" waves-effect">
                                    <i class="mdi mdi-file-document-box-plus-outline"></i>
                                    <span>Add News</span>
                                </a>
                             </li>
                             <li class="search_bar search_bar">
                                <a href="../template/news_list.php" class=" waves-effect">
                                    <i class="mdi mdi-clipboard-list-outline"></i>
                                    <span>News List</span>
                                </a>
                             </li>
                             <li class="menu-title search_bar">About</li>
                             <li class="search_bar">
                                <a href="../template/add_about_us.php" class=" waves-effect">
                                    <i class="fas fa-address-card"></i>
                                    <span>Add About</span>
                                </a>
                             </li>
                             <li class="search_bar">
                                <a href="../template/about_list.php" class=" waves-effect">
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








    





        <div  style="display: block;
    overflow-x: auto;
    white-space: nowrap;">
            <!-- Table -->
            <table id='empTable' class='display dataTable'>
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>mother_name </th>
                    <th>father_name </th>
                    <th>present_address </th>
                    <th>present_thana </th>
                    <th>present_district </th>
                    <th>nid_no </th>
                    <th>mobile_no </th>
                    <th>ref </th>
                    <th>register_type </th>
                </tr>
                </thead>

                
                
            </table>
        </div>
        
        <!-- Script -->
        <script>
        $(document).ready(function(){
            $('#empTable').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'ajax': {
                    'url':'ajaxfile.php'
                },

                'columns': [
                    { data: 'id' },
                    { data: 'name' },
                    { data: 'mother_name'},
                    { data: 'father_name'},
                    { data: 'present_address'},
                    { data: 'present_thana'},
                    { data: 'present_district'},
                    { data: 'nid_no'},
                    { data: 'mobile_no'},
                    { data: 'ref'},
                    { data: 'register_type'},
                ]

                

            });

        });
        </script>
   <!-- Start footer -->
<?php require_once '../template/footer.php'; ?>        