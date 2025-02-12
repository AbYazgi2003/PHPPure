<?php session_start();

if( !isset($_SESSION['email'])){
    header("location:login.php");   

}


if(isset($_POST['logout'])){
    session_unset();  
    header("location:login.php");   
}

// ما زبطو معي ب الcount 
include "db_connection.php";
$sql1 = "select id from categories";
$result1 = $conn->query($sql1);
static $numOfCategories = 0;
while(mysqli_fetch_assoc($result1)){
    $numOfCategories++;  
}

$sql2 = "select id from stores";
$result2 = $conn->query($sql2);
static $numOfStores = 0;
while(mysqli_fetch_assoc($result2)){
    $numOfStores++;  
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <!-- wraperrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr -->
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="HomePage.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Abdallah Bay </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="HomePage.php">
                    
                    <i class="fas fa-home"></i>
                    <span>Home </span></a>
            </li>

        
            <div class="sidebar-heading">
            </div>

            <!-- Nav Item - Pages Categories Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    
                    <span>Categories</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                        <a class="collapse-item" href="ShowCategories.php">Show Categories</a>
                        <a class="collapse-item" href="CreateCategories.php">Create Categories</a>
                    </div>
                </div>
            </li>

            <!--  Store  Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                
                    <span>Store</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                        <a class="collapse-item" href="ShowStore.php">Show Store</a>
                        <a class="collapse-item" href="CreateStore.php">Create Store</a>
                        
                    </div>
                </div>
            </li>

            
            <div class="sidebar-heading">
            </div>

            <!-- Nav Item - rating -->
            <li class="nav-item">
                <a class="nav-link" href="rating.php">
                    <i class="fas fa-star"></i>
                    <span>Rating</span></a>
            </li>

            <!-- Nav Item - logout -->
            <li class="nav-item">
            
            <form action="" method="post">
            <i class='fas fa-sign-out-alt' style="margin-left: 10px;"></i>   
            <input type="submit" class="btn btn-danger" style="height: 40px;" name="logout" value="logout" >   
            </form>
            </li>



            <!-- Nav Item - Tables -->
            

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
            <!-- navvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv -->
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <h1 style="color: black; ">Home </h1>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Welcome : <?= $_SESSION['email']?></span>
                <img class="img-profile rounded-circle"
                src="img/2022_07_10_17_00_IMG_1375.JPG">
                </a>
                <!-- Dropdown - User Information -->
                        
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <!-- contentttttttttttttttttttttttttttttttt -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
        
                    <!-- Content Row -->
                    <div class="row" style="margin-left: 150px;">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Categories</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php echo $numOfCategories; ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-list-alt"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Store</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php echo $numOfStores; ?>   
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-store"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="row" style="margin-left: 50px;">
                    

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>