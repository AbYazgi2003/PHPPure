<?php  
if(isset($_POST['login'])) if(isset($_POST['RememberMe'])){session_set_cookie_params(3600);}  
session_start();
include "db_connection.php";


if(isset($_SESSION['email'])){
echo "if block";
header("Location:HomePage.php");

}else{

    if(isset($_POST['login'])){



$sql1 = "select * from admin";
$result1 = $conn->query($sql1); 
$row =mysqli_fetch_assoc($result1); 

$username = $_POST['email'];
$password = $_POST['password'];


if($row['password']== $password){
$_SESSION['email'] =  $row['email'];
$_SESSION['password'] = $row['password'];
header("Location:HomePage.php");
}else{
    ?>
    <script> window.alert("in Correct Password"); 
    header("Location:login.php");
    </script>
    <?php
    }


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

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class=" bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center" >

        <div class="col-xl-10 col-lg-12 col-md-9" >
            
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class=""><img src="img/logo.png" width="400px" height="400px" style="position: relative;left: 40px; bottom: -65px;" 
                            
                            ></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>
                                <form class="user" method="post" action="">
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user"
                                            id="exampleInputEmail" aria-describedby="emailHelp"
                                            placeholder="Enter Email Address..." name="email">
                                    
                                </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" name="password">
                            
                            
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            
                                    
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                            
                                        
                                        <input type="checkbox" class="custom-control-input" name="RememberMe">
                                    
                                        <label class="custom-control-label" for="customCheck">RememberMe</label>
                                        </div>
                                    </div>
                                    

                                    
                                    <input type="submit" class="btn btn-primary btn-user btn-block" 
                                    name="login" value="login">
                                    
                                    <hr>
                                    <a href="login.php" class="btn btn-google btn-user btn-block">
                                        <i class="fab fa-google fa-fw"></i> Login with Google
                                    </a>
                                    <a href="login.php" class="btn btn-facebook btn-user btn-block">
                                        <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                    </a>
                                </form>


                                
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <?php }?>
    
</body>

</html>