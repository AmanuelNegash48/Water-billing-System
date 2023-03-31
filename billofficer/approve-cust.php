<?php
include('includes/config.php');

    $CustomerId = $_GET['ci'];
    $status = ($_GET['status']);
    $status = $status ==0 ? 1 : 0;
    
    $con = mysqli_connect("localhost", "root", "", "water");
    $sql2 = "update customer set status='$status' where CustomerId='$CustomerId'";
    mysqli_query($con, $sql2) or die("Error....");

    
    $sql = "update account set status='$status' where id='$CustomerId'";
    mysqli_query($con, $sql) or die("Error....");

    

    echo "<script> window.history.back(); location.reload(); </script>";
    // echo "<script> alert('Account Updated Successfully');</scritp>";
?>
<!-- alert('Account Updated Successfully') -->