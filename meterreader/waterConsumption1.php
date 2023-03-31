<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['USERNAME']) == 0)
	{	
header('location:../login.php');
}
else{
if(isset($_POST['submit']))
{   


$CustomerId = $_GET['CustomerId'];

$presentNew = floatval($_POST['pres']);
$previousFromDB = floatval($_POST['prev']);
$present = $presentNew - $previousFromDB; ///                       



$con = mysqli_connect("localhost", "root", "", "water") or die("Error connecting to the database ...");
$sql= "SELECT * FROM sentrecorded where CustomerId='$CustomerId'";

$res = mysqli_query($con, $sql);

if($res) {
    $sql  =  "UPDATE sentrecorded set previous ='$previousFromDB', present='$present' where Customerid='$CustomerId'";
    $suc = mysqli_query($con, $sql);

    if($suc)
    {
    $msg  =  "Recorded Successfully";
    }
    else 
    {
    $error  =  "Something went wrong. $err";

    }
   
} else{
        
    $error  =  "No customer record on setrecorded tbl";

}



}
	?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Water Billing System</title>
    <meta name="viewport" content="width = device-width, initial-scale = 1">
    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/morris.css" type="text/css" />
    <link href="css/font-awesome.css" rel="stylesheet">
    <script src="js/jquery-2.1.4.min.js"></script>
    <link href='//fonts.googleapis.com/css?family = Roboto:700,500,300,100italic,100,400' rel='stylesheet'
        type='text/css' />
    <link href='//fonts.googleapis.com/css?family = Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
    <style>
    .errorWrap {
        padding: 10px;
        margin: 0;
        background: #fff;
        border-left: 4px solid #dd3d36;
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

</head>

<body>
    <div class="container">


        <!-- <div class="left-content"> -->
        <div class="mother-grid-inner">

            <?php include('includes/header.php');?>

            <div class="clearfix"> </div>
        </div>

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php">
                <?php echo htmlspecialchars($lang['Home']);?>
            </a><i class="fa fa-angle-right"></i>

            </li>
            <li class="breadcrumb-item"><a href="meterr.php"> 
                
                    <?php echo htmlspecialchars($lang['Record Water Consumption']);?>
                </a><i class="fa fa-angle-right"></i>

            </li>


        </ol>

        <div class="grid-form">

            <div class="grid-form1">
                <h3><?php echo htmlspecialchars($lang['Record Water Consumption']);?></h3>
                <?php if($error){?><div class="errorWrap">
                    <strong>ERROR</strong>:<?php echo htmlentities($error); ?>
                </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                <div class="tab-content">
                    <div class="tab-pane active" id="horizontal-form">
                        <form class="form-horizontal" name="register" method="post" onSubmit="return checkvalidation();"
                            enctype="multipart/form-data">

                            <?php


                                    $CustomerId = $_GET['CustomerId'];
                                    $con = mysqli_connect("localhost", "root", "", "water") or die("Error connecting to the database ...");
                                    $sql= "SELECT * FROM sentrecorded where CustomerId='$CustomerId'";

                                    $res = mysqli_query($con, $sql);
                                    $result = mysqli_fetch_array($res);

                                    $presentFromDB = intval($result['present']); 
                                    $previousFromDB = intval($result['previous']); 

                                ?>

                            <div class="form-group">

                                <td>
                                    <label for="focusedinput" class="col-sm-2 control-label"> 
                                        <?php echo htmlspecialchars($lang['Previous Reading Value']);?>:

                                    </label>
                                </td>

                                <td>M<sup>3</sup></td>
                                <div class="col-sm-2">


                                    <input type="number" class="form-control1" name="prev"
                                        value="<?php echo $presentFromDB +$previousFromDB ;?>" id=" consumption">
                                </div>
                                <div class="tab-pane active" id="horizontal-form">
                                    <form class="form-horizontal" name="register" method="post"
                                        onSubmit="return checkvalidation();" enctype="multipart/form-data">
                                </div>

                                <div class="form-group">
                                    <br>
                                    <br>
                                    <td>
                                        <label for="focusedinput" class="col-sm-2 control-label"> 
                                            <?php echo htmlspecialchars($lang['Present Reading Value']);?>:
                                        </label>
                                    </td>

                                    <td>M<sup>3</sup></td>
                                    <div class="col-sm-3">
                                        <input type="number" class="form-control1" name="pres" id="consumption"
                                            placeholder="monthly water consumption value" required>
                                    </div>

                                </div>


                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-2">

                                        <button type="submit" name="submit"
                                            class="btn btn-info glyphicon glyphicon-send">
                                            <?php echo htmlspecialchars($lang['Send']);?>
                                        </button>

                                        <button type="reset" class="btn-inverse btn">
                                            <?php echo htmlspecialchars($lang['Reset']);?>
                                        </button>
                                    </div>
                                </div> <br>
                                
                            </div>
                        </form>
             
                    </div>
                </div>

                <script>
                $(document).ready(function() {
                    var navoffeset = $(".header-main").offset().top;
                    $(window).scroll(function() {
                        var scrollpos = $(window).scrollTop();
                        if (scrollpos > = navoffeset) {
                            $(".header-main").addClass("fixed");
                        } else {
                            $(".header-main").removeClass("fixed");
                        }
                    });

                });
                </script>


                

                <?php include('includes/footer.php');?>

            </div>
        </div>

        <!-- </div> -->
    </div>
    <script>
    var toggle = true;

    $(".sidebar-icon").click(function() {
        if (toggle) {
            $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
            $("#menu span").css({
                "position": "absolute"
            });
        } else {
            $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
            setTimeout(function() {
                $("#menu span").css({
                    "position": "relative"
                });
            }, 400);
        }

        toggle = !toggle;
    });
    </script>

    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/scripts.js"></script>

    <script src="js/bootstrap.min.js"></script>


</body>

</html>
<?php } ?>