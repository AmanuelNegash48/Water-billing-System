<?php

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "water";
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['USERNAME'])==0)
	{	
header('location:../login.php');
}
else{ 
    if(isset($_POST['submit']))
   
	?>
<?php
 $user = $_SESSION['USERNAME'];
 $current= $_SESSION['ID'];
$conn = mysqli_connect("localhost", "root", "", "water");
$result = mysqli_query($conn,"SELECT * FROM bill WHERE CustomerId  = '$current' and status = 'NO'");

$test1 = mysqli_fetch_array($result);
// echo "Bill results..  ".$test1['status'];
$status=$test1['status'] ;

$res = mysqli_query($conn,"SELECT * FROM bill WHERE CustomerId  = '$current'");
$test2 = mysqli_fetch_array($res);

if(!$test2){
    die("Wait. The bill is on progress");
} else if (!$test1) 
{
    die("You have paid this month. wait till next available monthly payment...");
} else if($status === 'NO'){
    $id=$test1['id'] ;
    $CustomerId=$test1['CustomerId'] ;
    $fname= $test1['firstname'] ;					
    $mname= $test1['middlename'] ;					
    $lname=$test1['lastname'] ;
    $pres=$test1['pres'] ;
    $prev=$test1['prev'] ;
    $price=$test1['price'];
    $date=$test1['date'];
}
?>
<?php
    $user = $_SESSION['USERNAME'];
    $current= $_SESSION['ID'];
    $conn = mysqli_connect("localhost", "root", "", "water");
    $result = mysqli_query($conn,"SELECT * FROM customer WHERE CustomerId  = '$current'");
    $test = mysqli_fetch_array($result);
    if (!$test) 
    {
        die("Error: Customer Data not found..");
    } else {
        $CustomerId=$test['CustomerId'] ;

        $mname= $test['middlename'] ;					
        $fname= $test['firstname'] ;					
        $lname=$test['lastname'] ;
        $meterNumber=$test['meterNumber'] ;
        $kebele=$test['kebele'] ;
        $phoneNumber=$test['phoneNumber'] ;
    }

?>
<html>



<div class="container">
    <!--/content-inner-->
    <!-- <div class="left-content"> -->
    <div class="mother-grid-inner">
        <!--header start here-->

        <?php include('includes/header.php');?>
        <div class="clearfix"> </div>
    </div>
    <!--heder end here-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard.php"><?php echo htmlspecialchars($lang['Home']);?></a>
        </li>
    </ol>
    <div class="agile-grids">
        <div class="agile-grids">
            <!--grid-->
            <div class="grid-form">

                <!---->
                <div class="grid-form1">
                    <h3><?php echo htmlspecialchars($lang['Payment']);?>
                        <a href="#">
                            <span class="fa fa-info-circle">

                            </span>
                        </a>
                    </h3>



                    <div id="data">
                        <div style="background:  #FFA">
                            <img src="../Images/wbb.jpg" width="140" height="90" />
                            <center>
                                <h4>
                                    <center><b>Dha.Taj.Bis.Dhu.fi Dhangala'a Magaalaa Bulee Horaa <br><b>Bule
                                                Hora
                                                Water
                                                Supply Service Enterprise<b></center>
                                </h4>
                                <p><strong>Waraqaa Kaffaltii<br>Bill Invoice<br>የቢል ኢንቮይስ</strong></p>
                                <p>Phone: 04644430036/550</p>

                            </center>

                        </div>

                        <div id="context">
                            <table class="table table-striped table-bordered">

                                <tr>

                                    <td bordercolor="#000"> <b>Lakk.Biilii : </b><br> <b>Bill Number
                                        </b><br>
                                        <b>ቢል ቁጥር </b>
                                    </td>
                                    <?php if($id){ ?>
                                    <td>

                                        <h4><i><?php echo"<strong>  B00$id </strong>" ?></h4>

                                    </td>
                                    <?php } else{ ?>
                                    <td>
                                        <h4></h4>
                                    </td>
                                    <?php } ?>

                                    <td> <b>Id.Maamila: </b> <br> <b>Customer Id </b> <br> <b>ደንበኛ ቁጥር </b>
                                    </td>
                                    <br>
                                    <?php if($CustomerId){ ?>
                                    <td>
                                        <h4>
                                            <?php  echo "<strong> $CustomerId  </strong>" ?></h4>
                                    </td>
                                    <?php } else{ ?>
                                    <td>
                                        <h4></h4>
                                    </td>
                                    <?php } ?>
                                </tr>
                                </tr>
                                <tr>
                                    <td> <b>Maqaa Maamila: </b> <br> <b>Customer Name </b> <br> <b>ደንበኛ ስም
                                        </b>
                                    </td>
                                    <td>
                                        <h4><?php echo "<strong> $fname </strong>"?>

                                    </td>
                                    <td>
                                        <h4><?php echo "<strong> $mname </strong>"?>

                                    </td>
                                    <td>
                                        <h4><?php echo "<b> $lname </b>"?>
                                    <td>
                                    </td>
                                    </td>

                                </tr>
                                <tr>
                                    <td bordercolor="#000000"> <b>Lakk.Lakkooftu : </b><br> <b>Meter Number
                                        </b><br> <b>ሜትር ቁጥር </b> </td>
                                    <td>
                                        <h4><?php echo"<strong>  $meterNumber </strong>" ?>
                                    </td>
                                    <td> <b>Ganda : <br> <b>Kebele <br> <b>ቀበሌ
                                    <td>
                                        <h4><?php echo "<strong> $kebele</strong>" ?> </h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td bordercolor="#000000"> <b>Lakk.Bilbila:<br> <b>phone Number<br>
                                                <b>ስልክ
                                                    ቁጥር
                                    </td>
                                    <td>
                                        <h4><?php echo "<strong> $phoneNumber</strong>" ?>
                                    </td>
                                    <td> <b>Guyyaa/ Date /ቀን:</b>
                                    <?php $now = date('d/m/y'); ?>
                                    <td>
                                        <h5><?php echo "<strong> $now</strong>" ?></h5><br>
                                    </td>
                                    </td>



                                </tr>
                                <tr>
                                    <td bordercolor="#000000"><b>Dubbii Duraanii :<br> <b>Previous Reading
                                                <br><b>ያለፈ ንባብ
                                    </td>
                                    <td>
                                        <h4><?php echo "<strong> $prev</strong>"?>
                                    </td>
                                    <td bordercolor="#000000"><b>Dubbii Ammaa :</b><br>
                                        <b> Previous
                                            Reading <br><b>የአሁን ንባብ
                                    </td>
                                    <td bordercolor="#000000">
                                        <h4><?php echo "<strong> $pres</strong>" ?>

                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="4">
                                        <center>
                                            <h2> Mallaqaa/Price/ዋጋ :<b> <?php echo $price; ?><b> Birr</h2>
                                        </center>
                                    </td>
                                </tr>

                            </table>



                        </div>
                    </div>
                    <CENTER><br>
                        <button type="button" class="btn btn-default ">

                            
                            <a href="pay.php?CustomerId=<?php echo $CustomerId; ?>">
                                <span class=" glyphicon glyphicon-usd"></span>
                                &nbsp;<?php echo htmlspecialchars($lang['Pay']);?></button>&nbsp;

                            <a href="dashboard.php"><button
                                    class="btn btn- hBack"><?php echo htmlspecialchars($lang['Go back']);?>
                                </button></a>

                    </CENTER>



                </div>
            </div>

            <!-- <?php include('includes/sidebarmenu.php');?> -->
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- </div> -->
</div>
<script>
var toggle = true;

$(".sidebar-icon").click(function() {
    if (toggle) {
        $(".page-container").addClass("sidebar-collapsed").removeClass(
            "sidebar-collapsed-back");
        $("#menu span").css({
            "position": "absolute"
        });
    } else {
        $(".page-container").removeClass("sidebar-collapsed").addClass(
            "sidebar-collapsed-back");
        setTimeout(function() {
            $("#menu span").css({
                "position": "relative"
            });
        }, 400);
    }

    toggle = !toggle;
});
</script>
<script>
$(document).ready(function() {
    var navoffeset = $(".header-main").offset().top;
    $(window).scroll(function() {
        var scrollpos = $(window).scrollTop();
        if (scrollpos >= navoffeset) {
            $(".header-main").addClass("fixed");
        } else {
            $(".header-main").removeClass("fixed");
        }
    });
    .table - responsive {
        max - height: 300 px;
    }
});
</script>
<script type="application/x-javascript">
addEventListener("load", function() {
    setTimeout(hideURLbar, 0);
}, false);

function hideURLbar() {
    window.scrollTo(0, 1);
}
</script>
<script src="js/bootstrap.min.js"></script>
<?php include('includes/footer.php');?>
</body>

</html>
<?php } ?>