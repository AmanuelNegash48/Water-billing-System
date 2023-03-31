<?php
    session_start();
    error_reporting(0);
    include('includes/config.php');
    
    if(strlen($_SESSION['USERNAME']) == 0){	
        header('location:../login.php');
    }
    else{
        $id=$_GET['CustomerId'];	
        	
        $sql="delete from customer where CustomerId=:CustomerId;";
        $query = $dbcon->prepare($sql);
        $query->bindParam(':CustomerId', $id,PDO::PARAM_STR);
        $query->execute();
        echo "<script> window.history.back(); location.reload(); </script>";
        $msg=" Deleted Successfully";
    }
    {
        $id=$_GET['CustomerId'];	
        	
        $sql2="delete from account where id=:CustomerId;";
        $query = $dbcon->prepare($sql2);
        $query->bindParam(':CustomerId', $id,PDO::PARAM_STR);
        $query->execute();
        echo "<script> window.history.back(); location.reload(); </script>";
        $msg=" Deleted Successfully";
    }
   {
        $id=$_GET['CustomerId'];	
        	
        $sql3="delete from sentrecorded where CustomerId=:CustomerId;";
        $query = $dbcon->prepare($sql3);
        $query->bindParam(':CustomerId', $id,PDO::PARAM_STR);
        $query->execute();
        echo "<script> window.history.back(); location.reload(); </script>";
        $msg=" Deleted Successfully";
    }
    {
        $id=$_GET['CustomerId'];	
        	
        $sql4="delete from bill where CustomerId=:CustomerId;";
        $query = $dbcon->prepare($sql4);
        $query->bindParam(':CustomerId', $id,PDO::PARAM_STR);
        $query->execute();
        echo "<script> window.history.back(); location.reload(); </script>";
        $msg=" Deleted Successfully";
    }
    
?>