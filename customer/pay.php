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
    $CustomerId = $_GET['CustomerId'];
    $con=mysqli_connect("localhost","root","","water");

 $res2 = mysqli_query($con, "select * from bill where CustomerId='$CustomerId' and status='NO'");
 if($res2){


    if(isset($_POST['submit'])){

        $CustomerId = $_GET['CustomerId'];
        //1 userbal = get userbalance to float]
        $res = mysqli_query($con, "select * from bankaccount where CustomerId='$CustomerId'");
        $row = mysqli_fetch_array($res);
        $userbal = floatval($row['balance']);

        $res1 = mysqli_query($con, "select * from bankaccount where accounttype='Organization' ");
        $rows = mysqli_fetch_array($res1);
        $orbal = floatval($rows['balance']);
        // echo "<script>alert('$CustomerId')</script>";
        
      
        $price = floatval($_POST['price']);
        // $userbal = floatval($_POST['balance']);
        $res2 = mysqli_query($con, "select * from bill where CustomerId='$CustomerId'");
        $paid = intval($row['paid']);
        $thisMonth = intval(date('m'));
        $rows = mysqli_fetch_array($res2);
        if ($thisMonth > $paid){
            if ($userbal < $price) {
                echo "<script>alert('insuffient balance')</script>";
            } else {
                

$newuserbal = $userbal - $price; 
$neworbal = $orbal +  $price; 
$sql  =  "update bankaccount set balance ='$newuserbal' where Customerid='$CustomerId'";
$suc2 = mysqli_query($con, $sql);
$sql  =  "update bankaccount set balance ='$neworbal' where accounttype='Organization' ";
$suc = mysqli_query($con, $sql);
$sql  =  "update bill set status ='Yes', paid='$thisMonth' where CustomerId='$CustomerId'";
$suc3 = mysqli_query($con, $sql);
if($suc and $suc2)
{
$msg  =  "Paid Successfully";
// echo "<script>alert('$msg ')</script>";
}
else 
{
$msg  =  "You paid this mothly bills. thank you, ready for pay next month payment.";

}
}
} else {
    
    echo $error;
}

}
 } else {
    header('location:./dashboard.php');

 }
?>
<?php
 $user = $_SESSION['USERNAME'];
 $current= $_SESSION['ID'];
$conn = mysqli_connect("localhost", "root", "", "water");
$result = mysqli_query($conn,"SELECT * FROM bill WHERE CustomerId  = '$current'");

$test = mysqli_fetch_array($result);
if (!$result) 
    {
    die("Error: Data not found..");
    }
    $id=$test['id'] ;
    $CustomerId=$test['CustomerId'] ;
    $fname= $test['firstname'] ;					
    $middlename= $test['middlename'] ;					
    $lname=$test['lastname'] ;
    $pres=$test['pres'] ;
    $prev=$test['prev'] ;
    $price=$test['price'];
    $date=$test['date'];
?>

<?php
 $user = $_SESSION['USERNAME'];
 $current= $_SESSION['ID'];
$conn = mysqli_connect("localhost", "root", "", "water");
$result = mysqli_query($conn,"SELECT * FROM customer WHERE CustomerId  = '$current'");

$test = mysqli_fetch_array($result);
if (!$result) 
    {
    die("Error: Data not found..");
    }
    $phoneNumber=$test['phoneNumber'] ;
  
?>
<?php 
 $user = $_SESSION['USERNAME'];
 $current= $_SESSION['ID'];
$conn = mysqli_connect("localhost", "root", "", "water");
$result = mysqli_query($conn,"SELECT * FROM bankaccount WHERE CustomerId  = '$current'");
$test = mysqli_fetch_array($result);
if (!$result) 
    {
    die("Error: Data not found..");
    }
    $CustomerId=$test['CustomerId'] ;
 
    $bankname=$test['bankname'] ;
    $accno=$test['accno'] ;
    $balance=$test['balance'] ;

?>

<html>


<head>
    <title>Water Billing System</title>
    <meta name="viewport" content="width = device-width, initial-scale = 1">
    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);
    </script>
    <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />

    <link href="css/table-style.css" rel='stylesheet' type='text/css' />

    <link href="css/style.css" rel='stylesheet' type='text/css' />

    <link href="css/font-awesome.css" rel="stylesheet">
    <script src="js/jquery-2.1.4.min.js"></script>
    <link href='//fonts.googleapis.com/css?family = Roboto:700,500,300,100,400' rel='stylesheet' type='text/css' />
    <link href='//fonts.googleapis.com/css?family = Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />

    <style>
    .errorWrap {
        padding: 10px;
        margin: 0 0 20px 0;
        background: #fff;
        border-left: 2px solid #dd3d36;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
    }

    .succWrap {
        padding: 10px;
        margin: 0 0 20px 0;
        background: #fff;
        border-left: 4px solid #5cb85c;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
    }
    </style>
    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>

</head>

<body style=" background-size:cover; font-family:'Courier New', Courier;">

    <style type="text/css">
    #data {
        margin: 0 auto;
        width: 350px;
        padding: 5px;
        border: #066 thin ridge;
        height: 870px;
    }
    </style>
    <div class="container">
        <!--/content-inner-->
        <!-- <div class="left-content"> -->
        <div class="mother-grid-inner">
            <!--header start here-->

            <?php include('includes/header.php');?>
            <div class="clearfix"> </div>
        </div>
        <!--heder end here-->
        <div class="agile-grids">
            <div class="agile-grids">
                <!--grid-->
                <div class="grid-form">
                    <?php if(isset($error)){?><div class="errorWrap">
                        <strong>ERROR</strong>:<?php echo htmlentities($error); ?>
                    </div><?php } 
                        else if(isset($msg)){?><div class="succWrap">
                        <strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?>
                    </div><?php }?>
                    <!---->
                    <div class="grid-form1">
                        <h3><?php echo htmlspecialchars($lang['Payment']);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="">
                                <span class="fa fa-info-circle">

                                </span>
                            </a>
                        </h3>



                        <div style="background:white;" id="contentarea">
                            <form action="" method="POST">

                                <h2
                                    style="color: blue;font-style: italic;font-family: times new roman;font-weight: bold;text-align: center;">
                                    <?php echo htmlspecialchars($lang['Monthly Billing']);?> </h2>
                                <table>
                                    <tr>
                                        <td><?php echo htmlspecialchars($lang['Customer Id']);?></td>
                                        <td><input type="text" name="tin" value="<?php  echo $CustomerId ?>"></td>
                                    </tr>

                                    <tr>
                                        <td><?php echo htmlspecialchars($lang['First name']);?></td>
                                        <td><input type="text" name="fname" value="<?php echo $fname;?>">
                                        </td>
                                    </tr>
                                    <tr>
                                    <tr>
                                        <td><?php echo htmlspecialchars($lang['Middle name']);?></td>
                                        <td><input type="text" name="middlename" value="<?php echo $middlename;?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo htmlspecialchars($lang['Last name']);?></td>
                                        <td><input type="text" name="lname" value="<?php echo $lname;?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo htmlspecialchars($lang['Bank Name']);?></td>
                                        <td><input type="text" name="bname" value="<?php echo $bankname;?>"></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo htmlspecialchars($lang['Account Number']);?></td>
                                        <td><input type="text" name="accountno" value="<?php echo $accno;?>" required>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><?php echo htmlspecialchars($lang['Present Reading']);?></td>
                                        <td><input type="text" name="price" value="<?php echo $pres;?>" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo htmlspecialchars($lang['Price']);?></td>
                                        <td><input type="text" name="price" value="<?php echo $price;?>" required>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><?php echo htmlspecialchars($lang['Phone Number']);?></td>
                                        <td><input type="text" name="phone" value="<?php echo $phoneNumber;?>"></td>
                                    </tr>




                                    <tr>
                                        <td><?php echo htmlspecialchars($lang['Payment date']);?></td>
                                        <td><input type="date" name="paydate" value="<?php echo $date;?>" readonly></td>
                                    </tr>


                                </table>
                                <CENTER><br>
                                    <button type="submit" name="submit"
                                        class="btn btn-info glyphicon glyphicon-usd"><?php echo htmlspecialchars($lang['Pay Now']);?></button>

                                    <button class="btn btn-danger2"><span class="glyphicon glyphicon-arrow-left"><a
                                                href="viewpayment.php"></span>&nbsp;
                                        <?php echo htmlspecialchars($lang['Go back']);?>
                                    </button></button>&nbsp;

                                </CENTER>
                            </form>
                        </div>

                    </div>

                </div>

            </div>

            <br>


        </div>
        <!-- </div> -->
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

        <script src="js/bootstrap.min.js"></script>
        <?php include('includes/footer.php');?>

</body>

</html>
<?php } ?>