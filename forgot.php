<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['submit']))
{
$dbc=mysqli_connect("localhost","root","","water");
$username=$_POST['username'];
$id=$_POST['id'];
$hashed_newpassword=md5($_POST['newpassword']); 


$sql = "select * from customer where customerid='$id' and username='$username'";
$res = mysqli_query($dbc, $sql);

$sql1 = "select * from account where id='$id' and username='$username'";
$res2 = mysqli_query($dbc, $sql1);

if (mysqli_num_rows($res) > 0 or mysqli_num_rows($res2) > 0){
    $query="UPDATE account SET  userpassword = '".$hashed_newpassword."' WHERE username='".$username."' AND id='".$id."'";
    $result=mysqli_query($dbc,$query);
   
   $query2="UPDATE customer SET  userpassword = '".$hashed_newpassword."' WHERE username='".$username."' AND CustomerId='".$id."'";
   $result=mysqli_query($dbc,$query2);
}


 if($result){
     
$msg="Your Password is Changed";
	
 }
 else{$error="Your Id and Username are not match";
	
 }
 }
        ?>

</script>
<!DOCTYPE HTML>
<html>

<head>
    <title>BHWSSE | Water Billing System</title>
    <link href="css/style.css" rel='stylesheet' type='text/css' />

    <script type="applijewelleryion/x-javascript">
        addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
    </script>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.css" rel="stylesheet">


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
    .gradient-custom-2 {
        /* fallback for old browsers */
        background: #fccb90;
        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
    }

    @media (min-width: 768px) {
        .gradient-form {
            height: 100vh !important;
        }
    }

    @media (min-width: 769px) {
        .gradient-custom-2 {
            border-top-right-radius: .3rem;
            border-bottom-right-radius: .3rem;
        }
    }
    .changebtn{
        width: 300px;
        background: red
    }
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
    <!-- Custom Theme files -->
    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!--animate-->

    <link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
    <script src="js/wow.min.js"></script>
    <script>
    new WOW().init();
    </script>
    <!--//end-animate-->
</head>
<?php include('includes/header.php');?>

<body style="padding-right: 10% ;padding-left: 10%; background-color: white;">

    <div class="page-container">
        <!--/content-inner-->
        <div class="left-content">
            <div class="mother-grid-inner">


                <div class="clearfix"> </div>
            </div>
            <!--heder end here-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right">
                </i>Profile <i class="fa fa-angle-right"></i> Change Password</li>
            </ol>
            <!--grid-->
            <div class="grid-form">

                <div class="grid-form1">

                    <?php if($error){?><div class="errorWrap">
                        <strong>ERROR</strong>:<?php echo htmlentities($error); ?>
                    </div><?php } 
                        else if($msg){?><div class="succWrap">
                        <strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?>
                    </div><?php }?>

                    <div class="panel-body">
                        <form name="chngpwd" method="post" class="form-horizontal" onSubmit="return valid();">
                            <div class="form-group">
                                <label
                                    class="col-md-2 control-label"><?php echo htmlspecialchars($lang['Id']);?>:</label>
                                <div class="col-md-8">
                                    <div class="input-group">

                                        <input type="text" name="id" class="form-control1" id="exampleInputPassword1"
                                            placeholder="id" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label
                                    class="col-md-2 control-label"><?php echo htmlspecialchars($lang['User name']);?>:</label>
                                <div class="col-md-8">
                                    <div class="input-group">

                                        <input type="text" name="username" class="form-control1" id="username"
                                            placeholder="username" required="">
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label
                                    class="col-md-2 control-label"><?php echo htmlspecialchars($lang['New Password']);?>:</label>
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
                                <label
                                    class="col-md-2 control-label"><?php echo htmlspecialchars($lang['Confirm Password']);?>:</label>
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
                            <br>


                            <div class=" col-sm-offset-2 " >
                                <button  type="submit" name="submit" class="btn-primary btn ">
                                    <i class="fa fa-lock" ></i><?php echo htmlspecialchars($lang['Change']);?></button>
                                <button type="reset"
                                    class="btn-inverse btn"><?php echo htmlspecialchars($lang['Reset']);?></button>
                            </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

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

    <div class="inner-block">

    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <br>
    <br>
    <br>
    <br>
    <?php include('includes/footer.php');?>
    </div>
    </div>


    <div class="clearfix"></div>
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
<?php  ?>