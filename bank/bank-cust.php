<?php
session_start();
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
$accounttype = $_POST['accounttype'];
$balance = $_POST['balance'];




$sql1  =  "INSERT INTO bankaccount (CustomerId, username, bankname, accno, accounttype, balance) VALUES(:CustomerId, :username, :bankname, :accno, :accounttype, :balance);";

$dbcon->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
$query  =  $dbcon->prepare($sql1);

$query->bindValue(':CustomerId', $CustomerId, PDO::PARAM_STR);
$query->bindValue(':username', $username, PDO::PARAM_STR);
$query->bindValue(':bankname', $bankname, PDO::PARAM_STR);
$query->bindValue(':accno', $accno, PDO::PARAM_STR);
$query->bindValue(':accounttype', $accounttype, PDO::PARAM_STR);
$query->bindValue(':balance', $balance, PDO::PARAM_STR);
$query->execute();

$err = $query->errorInfo();
$err = print_r($err, true);

$lastInsertId  =  $dbcon->lastInsertId();
if($lastInsertId)
{
    $msg  =  "Account is Created Successfully";  
}
else 
{
    $error  =  "Something went wrong. Please try again";
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


    function checkvalidation() {
        var userType = document.getElementById('accounttype');
        if (userType.value == "0") {
            alert("Please Select user type!");
            return false;
        }
        
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
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i>Bank
                </li>
            </ol>
            <!--grid-->
            <div class="grid-form">

                <!---->
                <div class="grid-form1">
                    <h3>Bank</h3>
                    <?php if(isset($error)){?><div class="errorWrap">
                        <strong>ERROR</strong>:<?php echo htmlentities($error); ?>
                    </div><?php } 
				        else if(isset($msg)){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div>
                    <?php }?>
                    <div class="tab-content">
                        <div class="tab-pane active" id="horizontal-form">
                            <form class="form-horizontal" name="register" method="post"
                                onSubmit="return checkvalidation();" enctype="multipart/form-data">
                                <div class="form-group">
                                    <center>
                                        <table>

                                            <div class="form-group">
                                                <label for="focusedinput" class="col-sm-2 control-label">Customer Id:
                                                </label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control1" name="CustomerId"
                                                        id="CustomerId" maxlength=7 minlength=7
                                                        placeholder="  Customer id"
                                                        title="Please Insert Customer id here with format like BH0000"
                                                        required>
                                                </div>
                                            </div>
                                </div>
                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">User name

                                    </label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control1" name="username" id="username"
                                            maxlength=20 minlength=3 placeholder="  User name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">Branch name
                                    </label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control1" name="bankname" id="bankname"
                                            minlength=3 maxlength=40 placeholder="Enter Bank Name" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">Account
                                        Number</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control1" name="accno" id="accno"
                                            pattern="1000+[0-9]*" maxlength=13 minlength=13 placeholder="  Customer id"
                                            title="Please Insert Account Number here with format like 1000..." required>
                                    </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="type" class="col-sm-2 control-label">Account Type:
                            </label>
                            <div class="col-sm-3">
                                <select id="accounttype" class="form-select" name="accounttype">
                                    <option selected value="0">
                                        select </option>
                                    <option value="Customer">Customer</option>
                                    <option value="Organization">Organization</option>


                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-2 control-label">Balance</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control1" name="balance" id="balance"
                                    placeholder="Enter Account Number" required>
                            </div>
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
        <!-- </div> -->
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
        
        
        
    </div>
    <?php include('includes/footer.php');?>
        <!--COPY rights end here-->
  
    
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
<?php  ?>