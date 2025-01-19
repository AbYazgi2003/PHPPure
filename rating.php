<?php session_start();

if( !isset($_SESSION['email'])){
    header("location:login.php");   

}


if(isset($_POST['logout'])){
    session_unset();  
    header("location:login.php");   
}


include "db_connection.php"; ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rating Page</title>

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

            <?php
            if(isset($_POST['logout'])){
            session_unset();  
            header("location:login.php");   
            } ?>
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
                    <h1 style="color: black; ">Rating </h1>

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
    
    <!-- ////////////////////////////////////////////////////////////////////////////// -->
    <?php
    $perPage = 3; // Number of items per page
    $page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number		
    // Query to fetch total number of items
	
	$totalQuery = "SELECT COUNT(*) AS total FROM rate group by store_id";		

	
    $totalResult = $conn->query($totalQuery);
    $totalRows = $totalResult->fetch_assoc()['total'];
    
    // Calculate offset
    $offset = ($page - 1) * $perPage;
    
    
	// Query to fetch items for the current page

    $storeinfo = "select    (select name from stores where id = store_id) as storename
    ,(select image from stores where id = store_id) as image ,store_id as id,count(value) as count,
    AVG(value) as avg ,sum(value) as sum  from rate group by store_id LIMIT $offset,$perPage ";

    $storeresult = $conn->query($storeinfo);
            if($storeresult-> num_rows >0){ ?>
                <table class="table" style="width: 90%; margin-left: 20px;">
                
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Store name</th>
                        <th scope="col">Total Rating</th>
                        <th scope="col">Number of Rating</th>
                        <th scope="col">Store Rating </th>
                        
                    </tr>
                
                    <?php while($row = $storeresult->fetch_assoc()){ ?>
            <?php    $store_id = $row['id'];
                    $storename = $row['storename'];    
                    $count= $row['count'];
                    $avg = $row['avg'];
                    $sum = $row['sum']; 
                    ?>    
                    
                    <tr>
                    <th scope="row"><?php echo $store_id ?></th>
                    
                    <td><img src="uploads/<?=$row['image'] ;?>" width=50px ,height=50px> </td>
                    <td><?php echo $storename ?></td>
                    <td><?php echo $sum ?></td>
                    <td><?php echo $count?></td>
                    <td><?php echo $avg ?></td>
                    
                    </tr>     
                    <?php } } ?>    
                    
                </table>           
                
                
                <?php                         
    
    $totalPages = ceil($totalRows / $perPage);

    echo "<br>";
    if($totalPages>0){
    echo "<div style='margin:10px 400px;';>";
    echo "Pages: ";
    }
    for ($i = 1; $i <= $totalPages; $i++) {
        if ($i == $page) {
            ?>
    
        <strong class='btn btn-primary' style=' height:50px; background-color: green;'><?php  echo $i ?> </strong>
    <?php   } else {
    

        
        if( !empty($_GET['id']) ){
        
        // $st_id = $row0['id'];
        echo "<a href=rating.php?page=$i&num=1' class='btn btn-primary' 
                style='width:10px; height:40px;' >$i</a> ";			
    
            }else{
            echo "<a href='rating.php?page=$i' class='btn btn-primary' 
            style='width:10px; height:40px;' >$i</a> ";
            }
            
        }
       
        

    }		
			?>     
                



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
