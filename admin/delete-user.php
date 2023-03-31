<?php
    session_start();
    // error_reporting(0);
    include('includes/config.php');
    
    if(strlen($_SESSION['USERNAME']) == 0){	
        header('location:../login.php');
    }
    else{
        $id=$_GET['id'];	
        	
        $sql="delete from account where id=:id;";
        $query = $dbcon->prepare($sql);
        $query->bindParam(':id', $id,PDO::PARAM_STR);
        $query->execute();
        echo "<script> window.history.back(); location.reload(); </script>";
        $msg="Account Deleted Successfully";
    }
     
    
?>