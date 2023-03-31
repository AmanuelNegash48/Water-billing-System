<?php
session_start();
// error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['USERNAME']) == 0)
	{	
header('location:../login.php');
}
else{
$id=($_GET['id']);	
if(isset($_POST['submit']))
{
    $firstname=$_POST['firstname'];
    $middlename=$_POST['middlename'];

    $lastname=$_POST['lastname'];	
    $phoneNumber=$_POST['phoneNumber'];
    $userpassword=$_POST['userpassword'];	
    $usertype=$_POST['usertype'];
    	 $usertype=$_POST['usertype'];
    $sql="UPDATE account set firstname=:firstname, middlename=:middlename, lastname=:lastname, phoneNumber=:phoneNumber, usertype=:usertype where id=:id";
    $query = $dbcon->prepare($sql);
    $query->bindParam(':firstname', $firstname,PDO::PARAM_STR);
    $query->bindParam(':middlename', $middlename,PDO::PARAM_STR);
    $query->bindParam(':lastname', $lastname,PDO::PARAM_STR);
    $query->bindParam(':phoneNumber', $phoneNumber,PDO::PARAM_STR);
    $query->bindParam(':usertype', $usertype,PDO::PARAM_STR);
    $query->bindParam(':id', $id,PDO::PARAM_STR);
    $query->execute();
    // echo "<script> alert('Account Updated Successfully') </script>";
    $msg="Account is Updated Successfully";
}
	?>
<!DOCTYPE HTML>
<html>

<head>
    <title>WBSSE| Update account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        var usertype = document.getElementById('type');

       if(usertype.value == "0"){
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
    <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet'
        type='text/css' />
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
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
                        class="fa fa-angle-right"><a
                            href="manage-user.php"></i><?php echo htmlspecialchars($lang['Manage Account']);?></a><i
                        class="fa fa-angle-right"></i><?php echo htmlspecialchars($lang['Update account']);?>
                </li>
            </ol>
            <!--grid-->
            <div class="grid-form">
                <!---->
                <div class="grid-form1">
                    <h3>
                        <?php echo htmlspecialchars($lang['Update User']) ?>
                    </h3>
                    <?php if(isset($error)){?><div class="errorWrap">
                        <strong>ERROR</strong>:<?php echo htmlentities($error); ?>
                    </div><?php } 
				else if(isset($msg)){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div>
                    <?php }?>
                    <div class="tab-content">
                        <div class="tab-pane active" id="horizontal-form">

                            <?php 
								$id = ($_GET['id']);
								$sql = "SELECT * from account where id=:id";
								$query = $dbcon -> prepare($sql);
								$query -> bindParam(':id', $id, PDO::PARAM_STR);
								$query->execute();
								$results = $query->fetchAll(PDO::FETCH_OBJ);
								$cnt=1;
								if($query->rowCount() > 0)
								{
								foreach($results as $result)
								{	?>

                            <form class="form-horizontal" onSubmit="return checkvalidation();" name="user" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="focusedinput"
                                        class="col-sm-2 control-label"><?php echo htmlspecialchars($lang['First name']);?></label>
                                    <div class="col-sm-3">
                                        <input type="text" onKeyUp="AllowAlphabet()" class="form-control1"
                                            name="firstname" id="firstname" maxlenth=30 minlength=3
                                            value="<?php echo htmlentities($result->firstname);?>"
                                            placeholder=" First Name " required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="focusedinput"
                                        class="col-sm-2 control-label"><?php echo htmlspecialchars($lang['Middle name']);?></label>
                                    <div class="col-sm-3">
                                        <input type="text" value="<?php echo htmlentities($result->middlename);?>"
                                            maxlenth=30 minlength=3 onKeyUp="AllowAlphabet()" class="form-control1"
                                            name="middlename" id="middlename" placeholder=" Middle Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="focusedinput"
                                        class="col-sm-2 control-label"><?php echo htmlspecialchars($lang['Last name']);?></label>
                                    <div class="col-sm-3">
                                        <input type="text" value="<?php echo htmlentities($result->lastname);?>"
                                            maxlenth=30 minlength=3 onKeyUp="AllowAlphabet()" class="form-control1"
                                            name="lastname" id="lastname" placeholder=" Last Name" required>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="type"
                                        class="col-sm-2 control-label"><?php echo htmlspecialchars($lang['User Type']);?>
                                    </label>
                                    <div class="col-sm-8">
                                        <select id="type" class="form-select" name="usertype">
                                            <option value= "0">
                                            </option>
                                            <option value="administrator"
                                                <?php if($result->usertype == "administrator"){echo 'selected="selected"';};?>>
                                                Administrator</option>
                                            <option value="billofficer"
                                                <?php if($result->usertype == "billofficer"){echo 'selected="selected"';};?>>
                                                Bill Officer</option>
                                            <option value="meterreader"
                                                <?php if($result->usertype == "meterreader"){echo 'selected="selected"';};?>>
                                                Meter Reader</option>
                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="focusedinput"
                                        class="col-sm-2 control-label"><?php echo htmlspecialchars($lang['Phone Number']);?>
                                    </label>
                                    <div class="col-sm-3">
                                        <input type="text" value="<?php echo htmlentities($result->phoneNumber);?>"
                                            onKeyUp="
                                            AllowAlphabet()" class="form-control1" name="phoneNumber" id="phoneNumber"
                                            placeholder="  phone Number"
                                            x-moz-errormessage="input must contain 10 digit Number from 0-9 "
                                            pattern="[0-9][0-9].{8,}" minlength=10 minlength=10
                                            title="Please Insert Phone Number here with format like 09..." required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">User
                                        Image</label>
                                    <div class="col-sm-3">
                                        <img src="../Images/<?php echo htmlentities($result->userimage);?>"
                                            width="200">&nbsp;&nbsp;&nbsp;
                                        <a href="change-image.php?imgid=<?php echo htmlentities($result->id);?>"
                                            <?php echo htmlspecialchars($lang['Change']);?>>
                                            Image
                                        </a>
                                    </div>
                                </div>

                                <?php }} ?>

                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-2">
                                        <button type="submit" name="submit"
                                            class="btn-primary btn"><?php echo htmlspecialchars($lang['Update']);?></button>
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
                        if (scrollpos >= navoffeset) {
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
    <!--js -->
    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/scripts.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- /Bootstrap Core JavaScript -->

</body>

</html>
<?php } ?>