<?php   session_start();
include "db_connection.php";

if( !isset($_SESSION['email'])){
header("location:login.php");   
}


    $id = $_GET['id'];
    $delete = "delete  from stores where id =$id";
    $deleteQuery = $conn->query($delete);
    if($deleteQuery){
    header("location: ShowStore.php");    
    }else{
    echo "error";    
    }
    
    ?>