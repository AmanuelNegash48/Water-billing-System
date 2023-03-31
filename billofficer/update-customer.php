<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['USERNAME']) == 0)
	{	
header('location:../login.php');
}
else{

    $CustomerId=($_GET['CustomerId']);	

    $firstname=$_POST['firstname'];
    $middlename=$_POST['middlename'];
    $lastname=$_POST['lastname'];		
    $phoneNumber=$_POST['phoneNumber'];
    
    
    if(isset($_POST['submit']))
    {
        // Update Customer
        $sql="UPDATE customer set firstname=:firstname, middlename=:middlename, lastname=:lastname,  phoneNumber=:phoneNumber where CustomerId=:CustomerId";
        $dbcon->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
        $query = $dbcon->prepare($sql);
        $query->bindParam(':firstname', $firstname,PDO::PARAM_STR);
        $query->bindParam(':middlename', $middlename,PDO::PARAM_STR);
        $query->bindParam(':lastname', $lastname,PDO::PARAM_STR);
        $query->bindParam(':phoneNumber', $phoneNumber,PDO::PARAM_STR);
        $query->bindParam(':CustomerId', $CustomerId,PDO::PARAM_STR);
        $query->execute();

        
        // Update SentRecoreded
        $sql3="UPDATE sentrecorded set firstname=:firstname, middlename=:middlename, lastname=:lastname  where CustomerId=:CustomerId";
        $dbcon->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
        $query = $dbcon->prepare($sql3);
        $query->bindParam(':firstname', $firstname,PDO::PARAM_STR);
        $query->bindParam(':middlename', $middlename,PDO::PARAM_STR);
        $query->bindParam(':lastname', $lastname,PDO::PARAM_STR);
        $query->bindParam(':CustomerId', $CustomerId,PDO::PARAM_STR);
        $query->execute();

        // Update Account
        $sql2="UPDATE account set firstname=:firstname, middlename:=middlename, lastname=:lastname, phoneNumber=:phoneNumber  where id=:CustomerId";
        $dbcon->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
        $query = $dbcon->prepare($sql2);
        $query->bindParam(':firstname', $firstname,PDO::PARAM_STR);
        $query->bindParam(':middlename', $middlename,PDO::PARAM_STR);
        $query->bindParam(':lastname', $lastname,PDO::PARAM_STR);
        $query->bindParam(':phoneNumber', $phoneNumber,PDO::PARAM_STR);
        $query->bindParam(':CustomerId', $CustomerId,PDO::PARAM_STR);
        $query->execute();
        
        
        $err = $query->errorInfo();
        $err = print_r($err, true);
        // echo "<script> alert('Account Updated Successfully') </script>";
        // $lastInsertId  =  $dbcon->lastInsertId();
        if($query){
            $msg="Account is Updated Successfully";
        }
        else 
        {
            $error  =  $err;
        }
    }

//////////////////////////

	?>
<!DOCTYPE HTML>
<html>

<head>
    <title>WBSSE| Update Customer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
                    class="fa fa-angle-right"></i>
                <?php echo htmlspecialchars($lang['Update Customer']);?>
            </li>
        </ol>
        <!--grid-->
        <div class="grid-form">
            <!---->
            <div class="grid-form1">
                <h3> <?php echo htmlspecialchars($lang['Update Customer']);?></h3>
                <?php  
				 if(isset($msg)){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div>
                <?php }?>
                <?php  
				 if(isset($error)){?><div class="succWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div>
                <?php }?>
                <div class="tab-content">
                    <div class="tab-pane active" id="horizontal-form">
                        <?php 
								$CustomerId = ($_GET['CustomerId']);
								$sql = "SELECT * from customer where CustomerId=:CustomerId";
								$query = $dbcon -> prepare($sql);
								$query -> bindParam(':CustomerId', $CustomerId, PDO::PARAM_STR);
								$query->execute();
								$results = $query->fetchAll(PDO::FETCH_OBJ);
								$cnt=1;
								if($query->rowCount() > 0)
								{
								foreach($results as $result)
								{	?>

                        <form class="form-horizontal" name="user" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="focusedinput"
                                    class="col-sm-2 control-label"><?php echo htmlspecialchars($lang['First name']);?>
                                </label>
                                <div class="col-sm-3">
                                    <input type="text" onKeyUp="AllowAlphabet()" class="form-control1" name="firstname"
                                        id="firstname" value="<?php echo htmlentities($result->firstname);?>"
                                        placeholder=" First Name " required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="focusedinput"
                                    class="col-sm-2 control-label"><?php echo htmlspecialchars($lang['Middle name']);?>
                                </label>
                                <div class="col-sm-3">
                                    <input type="text" onKeyUp="AllowAlphabet()" class="form-control1" name="middlename"
                                        id="middlename" value="<?php echo htmlentities($result->middlename);?>"
                                        placeholder=" Middle Name " required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="focusedinput"
                                    class="col-sm-2 control-label"><?php echo htmlspecialchars($lang['Last name']);?>
                                </label>
                                <div class="col-sm-3">
                                    <input type="text" value="<?php echo htmlentities($result->lastname);?>"
                                        onKeyUp="AllowAlphabet()" class="form-control1" name="lastname" id="lastname"
                                        placeholder=" Last Name" required>
                                </div>
                            </div>


                            <!-- type -->
                            <!-- <div class="form-group">
                                <label for="type"
                                    class="col-sm-2 control-label"><?php echo htmlspecialchars($lang['Kebele']);?>
                                </label>
                                <div class="col-sm-10">
                                    <select id="kebele" class="form-select" name="kebele">
                                        <option selected>Select Kebele</option> 
                                        <option value="Ejersa Fora"
                                            <?php if($result->kebele == "Ejersa Fora"){echo 'selected="selected"';};?>>
                                            Ejersa Fora</option>
                                        <option value="Burqa Midhagdi"
                                            <?php if($result->kebele == "Burqa Midhagdi"){echo 'selected="selected"';};?>>
                                            Burqa Midhagdi</option>
                                        <option value="Arda Biyya"
                                            <?php if($result->kebele == "Arda Biyya"){echo 'selected="selected"';};?>>
                                            Arda Biyya</option>
                                        <option value="Qacha Ya'a"
                                            <?php if($result->kebele == "Qacha Ya'a"){echo 'selected="selected"';};?>>
                                            Qacha Ya'a</option>
                                        <option value="Goroo Abayyii"
                                            <?php if($result->kebele == "Goroo Abayyii"){echo 'selected="selected"';};?>>
                                            Goroo Abayyii</option>
                                        <option value="Bule Qilxa"
                                            <?php if($result->kebele == "Bule Qilxa"){echo 'selected="selected"';};?>>
                                            Bule Qilxa</option>
                                        <option value="Bule Qanya"
                                            <?php if($result->kebele == "Bule Qanya"){echo 'selected="selected"';};?>>
                                            Bule Qanya
                                        </option>
                                        <option value="Goroo Gudina"
                                            <?php if($result->kebele == "Goroo Gudina"){echo 'selected="selected"';};?>>
                                            Goroo Gudina</option>


                                    </select>
                                </div>
                            </div> -->
                            <!-- type -->
                            <!-- <div class="form-group">
                                <label for="focusedinput"
                                    class="col-sm-2 control-label"><?php echo htmlspecialchars($lang['House Number']);?>
                                </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control1" name="houseNumber" id="houseNumber"
                                        placeholder=" houseNumber"
                                        value="<?php echo htmlentities($result->houseNumber);?>" required>
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label for="focusedinput"
                                    class="col-sm-2 control-label"><?php echo htmlspecialchars($lang['Phone Number']);?>
                                </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control1" name="phoneNumber" id="phoneNumber"
                                        placeholder="phoneNumber"
                                        value="<?php echo htmlentities($result->phoneNumber);?>" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="focusedinput"
                                    class="col-sm-2 control-label"><?php echo htmlspecialchars($lang['User Image']);?>
                                </label>
                                <div class="col-sm-3">
                                    <img src="../Images/<?php echo htmlentities($result->userImages);?>" width="200">
                                    <a href="change-image.php?imgid=<?php echo htmlentities($result->CustomerId);?>"><?php echo htmlspecialchars($lang['Change Image']);?>

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