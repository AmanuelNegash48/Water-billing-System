<?php
session_start();
// error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['USERNAME'])==0)
	{	
header('location:../login.php');
}
else{
	$imgid=($_GET['imgid']);
if(isset($_POST['submit']))
{

    $pimage = $_FILES["userImage"]["name"];
    $imgType = $_FILES["userImage"]["type"];
        move_uploaded_file($_FILES["userImage"]["tmp_name"], "../Images/".$_FILES["userImage"]["name"]);
        $sql="UPDATE account set userimage=:pimage where id=:imgid";
        $query = $dbcon->prepare($sql);
    
        $query->bindParam(':imgid',$imgid,PDO::PARAM_STR);
        $query->bindParam(':pimage',$pimage,PDO::PARAM_STR);
        $query->execute();
    
        $sql="UPDATE customer set userImages=:pimage where CustomerId=:imgid";
        $query = $dbcon->prepare($sql);
    
        $query->bindParam(':imgid',$imgid,PDO::PARAM_STR);
        $query->bindParam(':pimage',$pimage,PDO::PARAM_STR);
        $query->execute();
    
    
        $msg="images is changed";

}

	?>
<!DOCTYPE HTML>
<html>

<head>
    <title>BWSSSE | change image</title>
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
                        ></i><?php echo htmlspecialchars($lang['Profile']);?>

                </li>
            </ol>
            <!--grid-->
            <div class="grid-form">

                <!---->
                <div class="grid-form1">
                    <h3><?php echo htmlspecialchars($lang['Update Image']);?></h3>
                    <?php if(isset($error)){?><div class="errorWrap">
                        <strong>ERROR</strong>:<?php echo htmlentities($error); ?>
                    </div><?php } 
				else if(isset($msg)){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div>
                    <?php }?>
                    <div class="tab-content">
                        <div class="tab-pane active" id="horizontal-form">
                            <form class="form-horizontal" name="package" method="post" enctype="multipart/form-data">
                                <?php 
									$imgid=($_GET['imgid']);
									$sql = "SELECT userimage from account where id=:imgid";
									$query = $dbcon -> prepare($sql);
									$query -> bindParam(':imgid', $imgid, PDO::PARAM_STR);
									$query->execute();
									$results=$query->fetchAll(PDO::FETCH_OBJ);
									$cnt=1;
									if($query->rowCount() > 0)
									{
									foreach($results as $result)
									{	?>
                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">
                                        <?php echo htmlspecialchars($lang['Customer Image']);?> </label>
                                    <div class="col-sm-8">
                                        <img src="../Images/<?php echo htmlentities($result->userimage);?>" width="200">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="focusedinput"
                                        class="col-sm-2 control-label"><?php echo htmlspecialchars($lang['New Image']);?>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="file" accept="image/*" name="userImage" id="userImage" required>
                                    </div>
                                </div>
                                <?php }} ?>

                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-2">
                                        <button type="submit" name="submit"
                                            class="btn-primary btn"><?php echo htmlspecialchars($lang['Change']);?>
                                        </button>
                                        <button onclick="history.back();"
                                            class="btn btn-back"><?php echo htmlspecialchars($lang['Go back']);?>
                                        </button>
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
        <!--//content-inner-->
        
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