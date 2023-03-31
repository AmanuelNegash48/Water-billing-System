<?php
session_start();


error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['USERNAME']) == 0)
	{	
header('location:../login.php');
}
else{
// Code for change password	
if(isset($_POST['submit']))
	{
// $password = md5($_POST['password']);
// $newpassword=md5($_POST['newpassword']);


$hashed_password = md5($_POST['password']);
$hashed_newpassword = md5($_POST['newpassword']);

$username = $_SESSION['USERNAME']; // use global variable named 'USERNAME'

$sql ="SELECT userpassword FROM account WHERE username=:username and userpassword=:password";
$query= $dbcon -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> bindParam(':password', $hashed_password, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ); 
if($query -> rowCount() > 0)
{
$con="UPDATE account set userpassword=:newpassword where username=:username";
$chngpwd1 = $dbcon->prepare($con);
$chngpwd1-> bindParam(':username', $username, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $hashed_newpassword, PDO::PARAM_STR);
$chngpwd1->execute();

$msg="Your Password succesfully changed";
}
else {
$error="Your current password is wrong";	
}
}
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>BWSSSE| Customer Change Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <script type="text/javascript">
    function valid() {
        if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
            alert("New Password and Confirm Password Field do not match  !!");
            document.chngpwd.confirmpassword.focus();
            return false;
        }
        return true;
    }
    </script>
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
                <li class="breadcrumb-item"><a href="dashboard.php"><?php echo htmlspecialchars($lang['Home']);?></a><i
                        class="fa fa-angle-right"></i><?php echo htmlspecialchars($lang['Profile']);?>
                </li>
            </ol>
            <!--grid-->
            <div class="grid-form">

                <div class="grid-form1">

                    <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?>
                    </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

                    <div class="panel-body">
                        <form name="chngpwd" method="post" class="form-horizontal" onSubmit="return valid();">

                            <div class="form-group">
                                <label class="col-md-2 control-label">
                                    <?php echo htmlspecialchars($lang['Current Password']);?></label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </span>
                                        <input type="password" name="password" class="form-control1"
                                            id="exampleInputPassword1" placeholder="Current Password" required="">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">
                                    <?php echo htmlspecialchars($lang['New Password']);?></label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </span>
                                        <input type="password" class="form-control1" name="newpassword" id="newpassword"
                                            placeholder="New Password" required="">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">
                                    <?php echo htmlspecialchars($lang['Confirm Password']);?></label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </span>
                                        <input type="password" class="form-control1" name="confirmpassword"
                                            id="confirmpassword" placeholder="Confrim Password" required="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-8 col-sm-offset-2">
                                <button type="submit" name="submit"
                                    class="btn-primary btn"><?php echo htmlspecialchars($lang['Change']);?></button>
                                <button type="reset"
                                    class="btn-inverse btn"><?php echo htmlspecialchars($lang['Reset']);?></button>
                            </div>
                    </div>

                    </form>
                </div>
            </div>
        <!-- </div> -->
    </div>
    <!--//grid-->

    <!-- script-for sticky-nav -->
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

    });
    </script>
    
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
    </script>
    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
<?php } ?>