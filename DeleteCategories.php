<?php   session_start();
include "db_connection.php";

if( !isset($_SESSION['email'])){
header("location:login.php");   
}else{

    try{
    $id = $_GET['id'];
    $delete = "delete  from categories where id =$id";
    $deleteQuery = $conn->query($delete);
    if($deleteQuery){
    header("location: ShowCategories.php");    
    }else{
    echo "error";    
    }

    }catch(Exception $e){
        
    ?>
    
    <script>window.alert("يوجد عناصر في هذا التصفيف يرجع وضع تصنيف جديد لهم ثم قم بالحذف")</script> 
    <?php  
    echo "<a href='ShowCategories.php' style='border:2px solid green;
    color:green;
    position:relative;
    top:350px;  
    left:600px;
    '><h5>Go To Categories Page</h5></a>";
    }

    // header("location:ShowCategories.php"); 
    // في مشكلة بتصير لما تدخل جافا سكريبت مع الهيدر            
    }
    ?>