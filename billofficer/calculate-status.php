<?php
include('includes/config.php');

    $CustomerId = $_GET['CustomerId'];
    $status = intval($_GET['status']);
    $status = $status == 0 ? 1 : 0 ;
    
    $sql = "SELECT * from bill where CustomerId='$CustomerId' and pres='$ress->present' and prev='$ress->previous' ";
    $query = $dbcon -> prepare($sql);
    $query->execute();
    $ress=$query->fetchAll(PDO::FETCH_OBJ);
    $res = $ress->rowCount();

if($res == 0){
?>
<a rel="facebox"
    href="calculate.php?CustomerId=<?php echo htmlentities($result->CustomerId);?>&status=<?php echo htmlentities($result->status);?>">
    <span class="btn btn-danger btn-xs glyphicon glyphicon-usd"
        <?php  echo $result->status == '0' ? htmlentities('primary') :  htmlentities('danger') ;?>>
        <?php  echo $result->status == '0' ? htmlentities('   calculate') :  htmlentities('   calculated') ;?>
    </span>
</a>
<?php

} else{
?>
Calculated
<?php
}
?>
<!-- alert('Account Updated Successfully') -->