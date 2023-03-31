<?php
session_start();
error_reporting(0);
include('includes/config.php');

$CustomerId = $_POST['CustomerId'];	
$firstname = $_POST['firstname'];	
$middlename = $_POST['middlename'];	
$lastname = $_POST['lastname'];
$username = $_POST['username'];	
// $userpassword = $_POST['userpassword'];
$meterNumber = $_POST['meterNumber'];	
$kebele = $_POST['kebele'];	
$houseNumber = $_POST['houseNumber'];
$phoneNumber = $_POST['phoneNumber'];
$userImages  =  $_FILES["userImages"]["name"];
$userImage  =  $_FILES["userImages"]["name"];
$usertype = "customer";

if(isset($_POST['submit']))
{
    // Hash Password
    $hashed_password = md5($_POST['userpassword']);
    // Check whether Customer Exist or not
    $sql5="Select * from customer where CustomerId='$CustomerId'";
    $query  =  $dbcon->prepare($sql5);
    $query->execute();
    if($query->rowCount() > 0)
    {
        $error ="Customer is already exists";
    }
    else{
  
    move_uploaded_file($_FILES["userImage"]["tmp_name"],"./".$_FILES["userImages"]["name"]);
    $sql  =  "INSERT INTO account (id, firstname, middlename, lastname, username,  userpassword, phoneNumber, usertype, userimage, status) 
    VALUES(:CustomerId, :firstname, :middlename, :lastname, :username, :userpassword, :phoneNumber, :usertype, :userImage, 0);";
    
    
    $dbcon->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
    $query  =  $dbcon->prepare($sql);
    $query->bindValue(':CustomerId', $CustomerId, PDO::PARAM_STR);
    $query->bindValue(':firstname', $firstname, PDO::PARAM_STR);
    $query->bindValue(':middlename', $middlename, PDO::PARAM_STR);
    $query->bindValue(':lastname', $lastname, PDO::PARAM_STR);
    $query->bindValue(':username', $username, PDO::PARAM_STR);
    $query->bindValue(':userpassword', $hashed_password, PDO::PARAM_STR);
    $query->bindValue(':phoneNumber', $phoneNumber, PDO::PARAM_STR);
    $query->bindValue(':usertype', $usertype, PDO::PARAM_STR);
    $query->bindValue(':userImage', $userImage, PDO::PARAM_STR);
    $query->execute();
  
    
    $sql2  =  "INSERT INTO customer (CustomerId, firstname, middlename, lastname, username, userpassword, meterNumber, kebele, houseNumber, phoneNumber, userImages, status) 
    VALUES(:CustomerId, :firstname,  :middlename, :lastname, :username, :userpassword, :meterNumber, :kebele, :houseNumber, :phoneNumber, :userImages, 0);";


    $dbcon->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
    $query  =  $dbcon->prepare($sql2);
    $query->bindValue(':CustomerId', $CustomerId, PDO::PARAM_STR);
    $query->bindValue(':firstname', $firstname, PDO::PARAM_STR);
    $query->bindValue(':middlename', $middlename, PDO::PARAM_STR);
    $query->bindValue(':lastname', $lastname, PDO::PARAM_STR);
    $query->bindValue(':username', $username, PDO::PARAM_STR);
    $query->bindValue(':userpassword', $hashed_password, PDO::PARAM_STR);
    $query->bindValue(':meterNumber', $meterNumber, PDO::PARAM_STR);
    $query->bindValue(':kebele', $kebele, PDO::PARAM_STR);
    $query->bindValue(':houseNumber', $houseNumber, PDO::PARAM_STR);
    $query->bindValue(':phoneNumber', $phoneNumber, PDO::PARAM_STR);
    $query->bindValue(':userImages', $userImages, PDO::PARAM_STR);
    $query->execute();
  
    $sql3  =  "INSERT INTO sentrecorded (Customerid, firstname, middlename, lastname, kebele, meterNumber, previous, present, status) 
    VALUES(:Customerid, :firstname, :middlename, :lastname, :kebele, :meterNumber, 0, 0, 0);";

    $dbcon->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
    $query  =  $dbcon->prepare($sql3);
    $query->bindValue(':Customerid', $CustomerId, PDO::PARAM_STR);
    $query->bindValue(':firstname', $firstname, PDO::PARAM_STR);
    $query->bindValue(':middlename', $middlename, PDO::PARAM_STR);
    $query->bindValue(':lastname', $lastname, PDO::PARAM_STR);
    $query->bindValue(':kebele', $kebele, PDO::PARAM_STR);
    $query->bindValue(':meterNumber', $meterNumber, PDO::PARAM_STR);
    $query->execute();


    $err = $query->errorInfo();
    $err = print_r($err, true);
    $lastInsertId  =  $dbcon->lastInsertId();
    if($query)
    {
        $msg="Customer Created Successfully. wait till Approved!";
        // header("location:login.php");


    }
    else 
    {
        $error= $err;

    }

    }
}

	?>

<html>


<head>
    <title>BWSSSE | Register Customer</title>
    <meta name="viewport" content="width = device-width, initial-scale = 1">
    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);
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
    <script>
    function printDiv(data) {
        var printContents = document.getElementById('data').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
    </script>
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
        var meterNumber = document.getElementById('meterNumber');

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
                                if (isPHONNumeric(phoneNumber, 10, 10, "please fill a number phone  only"))
                                    if (isPHONNumeric(meterNumber, 10, 10, "please fill a number phone  only"))
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
        if (!register.meterNumber.value.match(/^[+251 0-9]+$/) && register.meterNumber.value != "") {
            register.meterNumber.value = "";
            register.meterNumber.focus();
            alert("Please Enter only Number for phone Number");
        }
    }
    </script>
</head>

<body>
    <div class="container">
        <!--/content-inner-->
        <!-- <div class="left-content"> -->
        <div class="mother-grid-inner">

            <?php include('includes/header.php');?>

            <div class="clearfix"> </div>
        </div>
        <!--heder end here-->

        <!--grid-->
        <div class="grid-form">

            <!---->
            <div class="grid-form1">
                <h3><?php echo htmlspecialchars($lang['customer register']);?> </h3>
                <hr><br>
                <?php if(isset($error)){?><div class="errorWrap">
                    <strong>ERROR</strong>:<?php echo htmlentities($error); ?>
                </div><?php } 
				else if(isset($msg)){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div>
                <?php }?>
                <div class="tab-content">
                    <div class="tab-pane active" id="horizontal-form">
                        <form class="form-horizontal" name="register" method="post" onSubmit="return checkvalidation();"
                            enctype="multipart/form-data">

                            <table class="table-striped mt-5 text-center" width="750px">
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label
                                                for="focusedinput"><?php echo htmlspecialchars($lang['Customer Id']);?>:</label>
                                            <input type="text" name="CustomerId" id="CustomerId" pattern="[B]+[0-9]*"
                                                maxlength=7 minlength=7 placeholder="  Customer id"
                                                title="Please Insert Customer id here with format like B00000" required>
                                        </div>

                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <label
                                                for="focusedinput"><?php echo htmlspecialchars($lang['Meter Number']);?>:
                                            </label>
                                            <input type="number" name="meterNumber" id="meterNumber"
                                                title="Please Insert Meter Number here with format like 6005004915"
                                                pattern="[0-9]*" maxlength=9 minlength=9 placeholder=" meter Number"
                                                required>
                                        </div>

                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label
                                                for="focusedinput"><?php echo htmlspecialchars($lang['First name']);?>:</label>
                                            <input type="text" onKeyUp="AllowAlphabet()" maxlength=40 minlength=3
                                                name="firstname" id="firstname" placeholder=" First name  "
                                                title="Please Insert First name Only alphabet" required>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-group">
                                            <label for="type"><?php echo htmlspecialchars($lang['Kebele']);?>: </label>
                                            <select id="kebele" name="kebele">
                                                <option selected value="0" disabled>
                                                    <?php echo htmlspecialchars($lang['Kebele']);?></option>
                                                <option value="Ejersa Fora">Ejersa Fora</option>
                                                <option value="Burqa Midhagdi">Burqa Midhagdi</option>
                                                <option value="Arda Biyya">Arda Biyya</option>
                                                <option value="Qacha Ya'a">Qacha Ya'a</option>
                                                <option value="Goroo Abayyii">Goroo Abayyii</option>
                                                <option value="Bule Qilxa">Bule Qilxa</option>
                                                <option value="Bule Qanya">Bule Qanya</option>
                                                <option value="Goroo Gudina">Goroo Gudina</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label
                                                for="focusedinput"><?php echo htmlspecialchars($lang['Middle name']);?>:</label>
                                            <input type="text" onKeyUp="AllowAlphabet()" maxlength=40 minlength=3
                                                name="middlename" id="middlename" placeholder=" Middle name  "
                                                title="Please Insert Middle name Only alphabet" required>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-group">
                                            <label
                                                for="focusedinput"><?php echo htmlspecialchars($lang['House Number']);?>:</label>
                                            <input type="number" name="houseNumber" id="houseNumber" maxlength=6
                                                minlength=4 placeholder="  house Number" required>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label
                                                for="focusedinput"><?php echo htmlspecialchars($lang['Last name']);?>:</label>
                                            <input type="text" onKeyUp="AllowAlphabet()" maxlength=40
                                                title="Please Insert Last name Only alphabet" minlength=3
                                                name="lastname" id="lastname" placeholder=" Last name" required>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-group">
                                            <label
                                                for="focusedinput"><?php echo htmlspecialchars($lang['Phone Number']);?>:</label>
                                            <input type="text" onKeyUp="AllowAlphabet()" name="phoneNumber"
                                                id="phoneNumber" placeholder="  phone Number" pattern="[0][9].{8,}"
                                                maxlength=10 minlength=10
                                                title="Please Insert Phone Number here with format like 09..." required>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label
                                                for="focusedinput"><?php echo htmlspecialchars($lang['User name']);?>:
                                            </label>
                                            <input type="text" name="username" id="username" maxlength=20 minlength=3
                                                placeholder="  User name" required>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-group">
                                            <label
                                                for="focusedinput"><?php echo htmlspecialchars($lang['Password']);?>:</label>
                                            <input type="Password" name="userpassword" maxlength=20 minlength=6
                                                id="userpassword" placeholder="  Password" required>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="form-group">

                                            <label for="focusedinput" class="col-sm-2 control-label"></label>
                                            <div class="col-sm-4">
                                                <input type="file" class="glyphicon glyphicon-" accept="image/*"
                                                    name="userImages" id="userImages" required>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            </table>


                            <div class="row">
                                <div class="col-md-12 text-center mt-4 ">
                                    <button type="submit" name="submit"
                                        class="btn btn-primary glyphicon-plus btn"><?php echo htmlspecialchars($lang['Register']);?></button>

                                    <button type="reset" class="btn-inverse btn"><?php echo htmlspecialchars($lang['Reset']);?></button>
                                </div>
                            </div>





                        </form>
                    </div>


                </div>
                <div class="inner-block">

                </div>


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