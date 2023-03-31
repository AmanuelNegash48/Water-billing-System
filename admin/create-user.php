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
    
$userId = $_POST['userId'];	
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];	
$lastname = $_POST['lastname'];
$username = $_POST['username'];	
$phoneNumber = $_POST['phoneNumber'];
$hashed_password = md5($_POST['userpassword']);
$usertype = $_POST['usertype'];	
$userImage  =  $_FILES["userImage"]["name"];

$sql="Select * from account where id='$userId' or username='$username'";
$query  =  $dbcon->prepare($sql);
$query->execute();
if($query->rowCount() > 0)
{
    $error ="User is already exists";
   
}
else {


    move_uploaded_file($_FILES["userImage"]["tmp_name"],"../Images/".$_FILES["userImage"]["name"]);

    $sql  =  "INSERT INTO account (id, firstname, middlename, lastname, username,phoneNumber, userpassword, usertype, userimage, status) 
    VALUES(:id, :firstname, :middlename, :lastname, :username, :phoneNumber, :userpassword,  :usertype, :userImage, 1);";
$query  =  $dbcon->prepare($sql);

$query->bindValue(':id', $userId, PDO::PARAM_STR);
$query->bindValue(':firstname', $firstname, PDO::PARAM_STR);
$query->bindValue(':middlename', $middlename, PDO::PARAM_STR);
$query->bindValue(':lastname', $lastname, PDO::PARAM_STR);
$query->bindValue(':username', $username, PDO::PARAM_STR);
$query->bindValue(':phoneNumber', $phoneNumber, PDO::PARAM_STR);
$query->bindValue(':userpassword', $hashed_password, PDO::PARAM_STR);
$query->bindValue(':usertype', $usertype, PDO::PARAM_STR);
$query->bindValue(':userImage', $userImage, PDO::PARAM_STR);

$query->execute();

$err = $query->errorInfo();
$err = print_r($err, true);

$lastInsertId  =  $dbcon->lastInsertId();
if($lastInsertId)
{
  
    $error  =  "Something went wrong. Please try again ";   
}
else 
{
    $msg  =  "Account is Created Successfully"; 
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
        var firstname = document.getElementById('firstname');
        var middlename = document.getElementById('middlename');
        var lastname = document.getElementById('lastname');
        var phoneNumber = document.getElementById('phoneNumber');
        var type = document.getElementById('type');

        var userType = type.selectedOptions[0].value;

        if (userType == "0") {
            alert("Please Select user type!");
            return false;
        }

        if (isAlphabet(firstname, "Please fill your First Name in letters only")) {
            if (lengthRestriction(firstname, 3, 30, "for your first name")) {
                if (isAlphabet(middlename, "Please fill your last Name in letters only")) {
                    if (lengthRestriction(middlename, 3, 30, "for your last name")) {
                        if (isAlphabet(lastname, "Please fill your last Name in letters only")) {
                            if (lengthRestriction(lastname, 3, 30, "for your last name")) {
                                // if (isPHONNumeric(phoneNumber, 13,
                                //         "please fill a number phone  only")) // evt.preventDefault();
                                // window.history.back();
                                return true;
                            }
                        }

                    }
                }
            }
        }

        return false;
    }

    function isPHONNumeric(elem, helperMsg) {
        var numericExpression = /^9[+0-9]+$/;

        if (elem.value.match(numericExpression)) {
            return true;
        } else {
            alert(helperMsg);
            elem.focus();
            return false;
        }
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
        if (!register.firstname.value.match(/^[a-zA-Z]+$/) && register.firstname.value != "") {
            register.firstname.value = "";
            register.firstname.focus();
            alert("Please Enter only alphabets for First Name");
        }
        if (!register.middlename.value.match(/^[a-zA-Z]+$/) && register.middlename.value != "") {
            register.middlename.value = "";
            register.middlename.focus();
            alert("Please Enter only alphabets for Middle Name");
        }

        if (!register.lastname.value.match(/^[a-zA-Z]+$/) && register.lastname.value != "") {
            register.lastname.value = "";
            register.lastname.focus();
            alert("Please Enter only alphabets for Last Name");
        }

        if (!register.phoneNumber.value.match(/^[+251 0-9]+$/) && register.phoneNumber.value != "") {
            register.phoneNumber.value = "";
            register.phoneNumber.focus();
            alert("Please Enter only Number for phone Number");
        }
    }
    </script>
    <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <link href="../billofficer/css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/morris.css" type="text/css" />
    <link href="../billofficer/css/font-awesome.css" rel="stylesheet">
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
                                        class="col-sm-2 control-label"><?php echo htmlspecialchars($lang['User id']);?>
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control1" name="userId" id="userId"
                                            pattern="[Emp]+[0-9]*" placeholder="  Employer id"
                                            title="Please Insert userid here with format like Emp0000" maxlength=7
                                            minlength=7 required>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="focusedinput"
                                        class="col-sm-2 control-label"><?php echo htmlspecialchars($lang['First name']);?>
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="text" onKeyUp="AllowAlphabet()" class="form-control1" minlength=3
                                            maxlength=30 name="firstname" id="firstname" placeholder="  First Name"
                                            required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="focusedinput"
                                        class="col-sm-2 control-label"><?php echo htmlspecialchars($lang['Middle name']);?>
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="text" onKeyUp="AllowAlphabet()" class="form-control1" minlength=3
                                            maxlength=30 name="middlename" id="middlename" placeholder="  Middle Name"
                                            required>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="focusedinput"
                                        class="col-sm-2 control-label"><?php echo htmlspecialchars($lang['Last name']);?>
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="text" onKeyUp="AllowAlphabet()" class="form-control1" minlength=3
                                            maxlength=30 name="lastname" id="lastname" placeholder="  Last Name"
                                            required>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="type"
                                        class="col-sm-2 control-label"><?php echo htmlspecialchars($lang['User Type']);?>

                                    </label>
                                    <div class="col-sm-4">
                                        <select id="type" class="form-select" name="usertype">
                                            <option selected value="0" disabled>
                                                <?php echo htmlspecialchars($lang['User Type']);?>
                                            </option>
                                            <option value="administrator">
                                                <?php echo htmlspecialchars($lang['Admin']);?>
                                            </option>
                                            <option value="billofficer">
                                                <?php echo htmlspecialchars($lang['Bill Officer']);?>
                                            </option>
                                            <option value="meterreader">
                                                <?php echo htmlspecialchars($lang['Meter Reader']);?>

                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="focusedinput"
                                        class="col-sm-2 control-label"><?php echo htmlspecialchars($lang['User name']);?>
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control1" name="username" 
                                            minlength=5 maxlength=30 placeholder="User name" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="focusedinput"
                                        class="col-sm-2 control-label"><?php echo htmlspecialchars($lang['Phone Number']);?>:</label>
                                    <div class="col-sm-3">
                                        <input type="text" onKeyUp="AllowAlphabet()" class="form-control1"
                                            name="phoneNumber" id="phoneNumber" placeholder="  phone Number"
                                            pattern="[0][9].{8,}" maxlength=10 minlength=10
                                            title="Please Insert Phone Number here with format like 09..." required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="focusedinput"
                                        class="col-sm-2 control-label"><?php echo htmlspecialchars($lang['Password']);?></label>
                                    <div class="col-sm-4">
                                        <input type="Password" class="form-control1" name="userpassword" id="Password"
                                            minlength=6 maxlength=40 placeholder="Password" required>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="focusedinput"
                                        class="col-sm-2 control-label"><?php echo htmlspecialchars($lang['User Image']);?>
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="file" accept="image/*" name="userImage" id="userImage" required>
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
                    </table>


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
                <!--COPY rights end here-->
            </div>
        <!-- </div> -->
    
    </div>


    <?php include('includes/footer.php');?>

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