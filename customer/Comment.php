<?php
session_start();
include('includes/config.php');

if(strlen($_SESSION['USERNAME']) == 0)
	{	
header('location:../login.php');
}
else{

    $useId = $_SESSION['ID'];


if(isset($_POST['submit']))
{   
$comments = $_POST['comments'];	
	
$db = mysqli_connect("localhost", "root", "", "water") or die("Error connecting to the database..");
$res = mysqli_query($db, "SELECT * FROM customer where CustomerId='$useId'");
$row  = mysqli_fetch_array($res);

$firstname = $row['firstname'];
$lastname = $row['lastname'];


$sql  =  "INSERT INTO comment (UserId, firstname,lastname, comments) VALUES(:UserId, :fn, :ln, :comments);";
$dbcon->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
$query  =  $dbcon->prepare($sql);
$query->bindValue(':UserId', $useId, PDO::PARAM_STR);
$query->bindValue(':fn', $firstname, PDO::PARAM_STR);
$query->bindValue(':ln', $lastname, PDO::PARAM_STR);
$query->bindValue(':comments', $comments, PDO::PARAM_STR);
$query->execute();
$err = $query->errorInfo();
$err = print_r($err, true);
$lastInsertId  =  $dbcon->lastInsertId();
if($lastInsertId)
{
$msg  =  "Sent successfully";
}
else 
{
 $msg  =  "Failed";

}
}
}?>
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
        var lastname = document.getElementById('lastname');
        var type = document.getElementById('type');
        var userType = type.selectedOptions[0].value;
        if (userType == "0") {
            alert("Please Select user type!");
            return false;
        }
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
    .comm{
        margin: 3rem;
        margin-top: 5rem;
        display: flex;
        gap: 2rem;
        margin-bottom: 10rem

    }
    </style>

</head>

<body style="padding-left: 5%; padding-right: 5%">
    <!-- <div class="page-container"> -->
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
                class="fa fa-angle-right"></i><?php echo htmlspecialchars($lang['Comment']);?>
        </li>
    </ol>
    <!--grid-->
    <!-- </div> -->
    <!--- /banner-1 ---->
    <!--- privacy ---->
    <div class="privacy">
        <!-- <div class="container"> -->
        <!-- <h3 class="wow fadeInDown animated animated" data-wow-delay=".5s"
                style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
                <?php echo htmlspecialchars($lang['Comment']);?></h3> -->
        <form name="description" method="post">
            <?php if(isset($error)){?><div class="errorWrap">
                <strong>ERROR</strong>:<?php echo htmlentities($error); ?>
            </div>
            <?php } 
				else if(isset($msg)){?><div class="succWrap"><strong></strong><?php echo htmlentities($msg); ?> </div><?php }?>

            <div class="comm">
                <div>
                    <h3 class="wow fadeInDown animated animated" data-wow-delay=".5s"
                        style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
                        <?php echo htmlspecialchars($lang['Comment']);?></h3>
                </div>
                <div style="width:600px">
                    <p >

                        <input type="text" name="comments" class="form-control" id="comments"
                            style="height: 150px;" required>

                    </p>

                    <p>
                        <button style="width: 150px;" type="submit" name="submit"
                            class="btn-primary1 btn1"><?php echo htmlspecialchars($lang['Send']);?></button>
                    </p>
                </div>
            </div>

        </form>
        <!-- </div> -->
    </div>
    <!-- </div> -->

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
    <?php include('includes/footer.php');?>
</body>


</html>