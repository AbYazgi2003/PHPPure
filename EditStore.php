<?php session_start();
include "db_connection.php";

if( !isset($_SESSION['email'])){
    header("location:login.php");   

}

$sql_select_query = "select * from stores where id =".$_GET['id'].";";

$select_result = $conn->query($sql_select_query);

$row = mysqli_fetch_assoc($select_result);

$id = $row['id'];
$category;
if(isset($_POST['update'])){
try{    
$name = $_POST['name'];  
$phone = $_POST['phone'];
$adress = $_POST['adress'];
$category = $_POST['category'];

$nested = "select id from categories where id = $category ";

$nested_result = $conn->query($nested);

$catrow = mysqli_fetch_assoc($nested_result);
$cat_id = $catrow['id'];

$updatesql = "UPDATE stores SET name ='$name' , phone = $phone , adress ='$adress', cat_id =$cat_id where id  = $id ";

$updateresult = $conn->query($updatesql);

header("location: ShowStore.php");  

} 

catch(Exception $e){?>
<script> window.alert("error of alter this store"); </script>
<?php header("location: ShowStore.php");     }}?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>update Store </title>

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
                    <h1 style="color: black; ">Edit Store </h1>

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

        <?php        
        $sql_select_query = "select * from stores where id =".$_GET['id'].";";
        
        $select_result = $conn->query($sql_select_query);
        
        $row1 = mysqli_fetch_assoc($select_result);        
        $id = $row1['id'];   
        $name = $row1['name'];  
        $phone = $row1['phone'];
        $adress = $row1['adress'];
        $category = $row1['cat_id'];

        ?>


        <form style="margin-left: 40px ; width: 80%;" action="" method="post">
            <!-- name  -->
            <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value = <?php echo $name; ?>  >
            </div>
            <!-- phone  -->
            <div class="form-group">
            <label for="phone">Phone</label>
            <input type="number" class="form-control" id="phone" name="phone" value = <?php echo $phone; ?> >
            </div>
            <!-- adress  -->
            <div class="form-group">
            <label for="adress">Adress</label>
            <input type="text" class="form-control" id="adress" name="adress" value = <?php echo $adress; ?>>
            </div>
            <!-- category -->
            <div class="form-group">
            <label for="category">Category</label>
            
            <?php 
            $Categories = "select * from categories order by id asc;";
            $result = $conn->query($Categories); 
            if($result-> num_rows >0){ ?>
            
            <select class="form-control" id="category" name="category">
                <?php 
                while($row = $result->fetch_assoc()){

                if($category === $row['id']){
                echo "<option value =".$row['id']." selected> ".$row['name']."</option>";    
                }else{   
            
                echo "<option value =".$row['id']."> ".$row['name']."</option>";
                }
            
                }
                ?>
                
            </select> <?php } ?>
            </div>
    
            

            <input class="btn btn-primary" type="submit" value="update" name="update">
        </form>
        
        



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
