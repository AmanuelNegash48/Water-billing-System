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
    
$name = $_POST['name'];	
$bankname = $_POST['bankname'];	
$accountno = $_POST['accountno'];
$balance = $_POST['balance'];	

$sql1  =  "INSERT INTO `organizationaccount`(`name`, `bankname`, `accountno`, `balance`) VALUES(:name, :bankname, :accountno, :balance);";

$dbcon->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
$query  =  $dbcon->prepare($sql1);

$query->bindValue(':name', $name, PDO::PARAM_STR);
$query->bindValue(':bankname', $bankname, PDO::PARAM_STR);
$query->bindValue(':accountno', $accountno, PDO::PARAM_STR);
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
        var firstName = document.getElementById('firstName');
        var lastName = document.getElementById('lastName');
        var type = document.getElementById('type');

        var userType = type.selectedOptions[0].value;

        if (userType == "0") {
            alert("Please Select user type!");
            return false;
        }
        if (isAlphabet(firstName, "Please fill your First Name in letters only")) {
            if (lengthRestriction(firstName, 3, 30, "for your first name")) {
                if (isAlphabet(lastName, "Please fill your last Name in letters only")) {
                    if (lengthRestriction(lastName, 3, 30, "for your last name")) {
                        // evt.preventDefault();
                        // window.history.back();
                        return true;
                    }
                }
            }
        }
        return false;
    }


    function isAlphabet(elem, helperMsg) {
        var alphaExp = /^[a-zA-Z\/]+$/;
        if (elem.value.match(alphaExp)) {
            return true;
        } else {
            alert(helperMsg);
            elem.focus();
            return false;
        }
    }


    function lengthRestriction(elem, min, max, helperMsg) {
        var uInput = elem.value;
        if (uInput.length >= min && uInput.length <= max) {
            return true;
        } else {
            alert("Please enter between " + min + " and " + max + " characters" + helperMsg);
            elem.focus();
            return false;
        }
    }


    function AllowAlphabet() {
        if (!register.firstName.value.match(/^[a-zA-Z]+$/) && register.firstName.value != "") {
            register.firstName.value = "";
            register.firstName.focus();
            alert("Please Enter only alphabets for First Name");
        }
        if (!register.lastName.value.match(/^[a-zA-Z]+$/) && register.lastName.value != "") {
            register.lastName.value = "";
            register.lastName.focus();
            alert("Please Enter only alphabets for Last Name");
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
    <div class="page-container">
        <!--/content-inner-->
        <div class="left-content">
            <div class="mother-grid-inner">
                <!--header start here-->
                <?php include('includes/header.php');?>

                <div class="clearfix"> </div>
            </div>
            <!--heder end here-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php"><?php echo htmlspecialchars($lang['Home']);?></a><i
                        class="fa fa-angle-right"></i><?php echo htmlspecialchars($lang['Create Account']);?>
                </li>
            </ol>
            <!--grid-->
            <div class="grid-form">

                <!---->
                <div class="grid-form1">
                    <h3><?php echo htmlspecialchars($lang['Create Account']);?></h3>
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
                                    <label for="focusedinput"
                                        class="col-sm-2 control-label"><?php echo htmlspecialchars($lang['Name']);?>
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control1" name="name" id="name"
                                            placeholder=" organization name" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="focusedinput"
                                        class="col-sm-2 control-label"><?php echo htmlspecialchars($lang['Bank name']);?>
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="text" onKeyUp="AllowAlphabet()" class="form-control1" minlength=3
                                            maxlength=40 name="bankname" id="bankname" placeholder="  bank Name"
                                            required>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="focusedinput"
                                        class="col-sm-2 control-label"><?php echo htmlspecialchars($lang['Account Number']);?>
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="bigint" class="form-control1" minlength=5 maxlength=13
                                            name="accountno" id="accountno" placeholder=" account number" required>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="focusedinput"
                                        class="col-sm-2 control-label"><?php echo htmlspecialchars($lang['Balance']);?>
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control1" name="balance" id="balance"
                                            placeholder="Amount" required>
                                    </div>
                                </div>




                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-2">
                                <button type="submit" name="submit"
                                    class="btn-primary btn"><?php echo htmlspecialchars($lang['Create']);?></button>

                                <button type="reset"
                                    class="btn-inverse btn"><?php echo htmlspecialchars($lang['Reset']);?></button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <!-- </table> -->


            </div>
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
                .table - responsive {
                    max - height: 300 px;
                }

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
        </div>
    </div>
    <!--//content-inner-->
    <!--/sidebar-menu-->
    <?php include('includes/sidebarmenu.php');?>
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
    <!--js -->
    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/scripts.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- /Bootstrap Core JavaScript -->
</body>

</html>
<script src="js/jquery.js"></script>
<script type="text/javascript">
</script>

</html>
<?php } ?>