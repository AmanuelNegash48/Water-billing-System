<?php
include('includes/config.php');

    $id = $_GET['CustomerId'];
    $status = intval($_GET['status']);
    $status = $status == 0 ? 1 : 0 ;


    $con = mysqli_connect("localhost", "root", "", "water");

    $sql2 = "update bill set status='$status' where id='$CustomerId'";
    mysqli_query($con, $sql2) or die("Error....");
    

    echo "<script> window.history.back(); location.reload(); </script>";
    // echo "<script> alert('Account Updated Successfully');</scritp>";


?>
<!-- alert('Account Updated Successfully') -->