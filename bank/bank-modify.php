<?php
session_start();
// error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['USERNAME']) == 0)
	{	
header('location:../login.php');
}
else{
if(isset($_POST['submit']))
{
    
$CustomerId = $_POST['CustomerId'];	
$username = $_POST['username'];
$bankname = $_POST['bankname'];	
$accno = $_POST['accno'];
$newbalance = $_POST['balance'];
$currentbalance = $_POST['currentbalance'];

$balance = $newbalance + $currentbalance;

    $sql="update bankaccount set CustomerId=:CustomerId,username=:username, bankname=:bankname, accno=:accno, balance=:balance where CustomerId=:CustomerId";
    $query = $dbcon->prepare($sql);
    $query->bindParam(':CustomerId', $CustomerId,PDO::PARAM_STR);
    $query->bindParam(':username', $username,PDO::PARAM_STR);
    $query->bindParam(':bankname', $bankname,PDO::PARAM_STR);
    $query->bindParam(':accno', $accno,PDO::PARAM_STR);
    $query->bindParam(':balance', $balance,PDO::PARAM_STR);
     
$query->execute();

$err = $query->errorInfo();
$err = print_r($err, true);

$lastInsertId  =  $dbcon->lastInsertId();
if($lastInsertId)
{
    $error  =  "Something went wrong. Please try again"; 
}
else 
{
    $msg  =  "Balance is deposited  Successfully";    
// $error  =  $err;
}
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
        margin: 0 0 20px 0;
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
        <!--/content-inner-->
        <!-- <div class="left-content"> -->
            <div class="mother-grid-inner">
                <!--header start here-->
                <?php include('includes/header.php');?>

                <div class="clearfix"> </div>
            </div>
            <!--heder end here-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i>Manage
                    Account
                </li>
            </ol>
            <!--grid-->
            <div class="grid-form">

                <!---->
                <div class="grid-form1">
                    <h3>Manage Account</h3>
                    <?php if(isset($error)){?><div class="errorWrap">
                        <strong>ERROR</strong>:<?php echo htmlentities($error); ?>
                    </div><?php } 
				else if(isset($msg)){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div>
                    <?php }?>
                    <div class="tab-content">
                        <div class="tab-pane active" id="horizontal-form">
                            <?php 
								$CustomerId = ($_GET['CustomerId']);
								$sql = "SELECT * from bankaccount where CustomerId=:CustomerId";
								$query = $dbcon -> prepare($sql);
								$query -> bindParam(':CustomerId', $CustomerId, PDO::PARAM_STR);
								$query->execute();
								$results = $query->fetchAll(PDO::FETCH_OBJ);
								$cnt=1;
								if($query->rowCount() > 0)
								{
								foreach($results as $result)
								{	?>


                            <form class="form-horizontal" name="register" method="post"
                                onSubmit="return checkvalidation();" enctype="multipart/form-data">
                                <div class="form-group">
                                    <center>
                                        <table>

                                            <div class="form-group">
                                                <label for="focusedinput" class="col-sm-2 control-label">Customer Id
                                                </label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control1" name="CustomerId"
                                                        value="<?php echo htmlentities($result->CustomerId);?>"
                                                        id="CustomerId" pattern="[BH]+[0-9]*" maxlength=6 minlength=6
                                                        placeholder="  Customer id"
                                                        title="Please Insert Customer id here with format like BH/0000"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="focusedinput" class="col-sm-2 control-label">User name

                                                </label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control1" name="username"
                                                        value="<?php echo htmlentities($result->username);?>"
                                                        id="username" maxlength=20 minlength=3 placeholder="  User name"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="focusedinput" class="col-sm-2 control-label">Bank name
                                                </label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control1" name="bankname"
                                                        value="<?php echo htmlentities($result->bankname);?>"
                                                        id="bankname" minlength=3 maxlength=40
                                                        placeholder="Enter Bank Name" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="focusedinput" class="col-sm-2 control-label">Account
                                                    Number</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control1" name="accno" id="accno"
                                                        value="<?php echo htmlentities($result->accno);?>" maxlength=13
                                                        minlength=5 placeholder="Enter Account Number" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="focusedinput" class="col-sm-2 control-label">Balance</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control1" name="balance" id="balance"
                                                        placeholder="Recharge balance" required>
                                                </div>
                                            </div>
                                            <input type="hidden"  name="currentbalance" value="<?php echo htmlentities($result->balance);?>" >

                                </div>
                                <br>


                                <br>

                                </table>
                                <center>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-2">
                                <button type="submit" name="submit" class="btn-primary btn">Save</button>

                                <button type="reset" class="btn-inverse btn">Reset</button>
                            </div>
                        </div>
                    </div>
                    </form>
                    <div class="panel-footer">

                    </div>
                    </form>
                </div>
            </div>
            <!--//grid-->

            <!-- script-for sticky-nav -->
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
            <!-- /script-for sticky-nav -->
            <!--inner block start here-->
            <div class="inner-block">

            </div>
            <!--inner block end here-->
            <!--copy rights start here-->
            <?php include('includes/footer.php');?>
            <!--COPY rights end here-->
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

    // $('#register').submit(function(evt) {
    //     evt.preventDefault();
    //     window.history.back();
    // });
    </script>
    <!--js -->
    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/scripts.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- /Bootstrap Core JavaScript -->

</body>

</html>
<?php }} ?>