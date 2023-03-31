<?php

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "water";
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['USERNAME'])==0)
	{	
header('location:../login.php');
}
else{ 
	?>
<!DOCTYPE HTML>
<html>

<head>
    <title>BWSSSE | View Customers</title>
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
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/morris.css" type="text/css" />
    <!-- Graph CSS -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="js/jquery-2.1.4.min.js"></script>
    <!-- //jQuery -->
    <!-- tables -->
    <link rel="stylesheet" type="text/css" href="css/table-style.css" />
    <link rel="stylesheet" type="text/css" href="css/basictable.css" />
    <script type="text/javascript" src="js/jquery.basictable.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#table').basictable();

        $('#table-breakpoint').basictable({
            breakpoint: 768
        });

        $('#table-swap-axis').basictable({
            swapAxis: true
        });

        $('#table-force-off').basictable({
            forceResponsive: false
        });

        $('#table-no-resize').basictable({
            noResize: true
        });

        $('#table-two-axis').basictable();

        $('#table-max-height').basictable({
            tableWrapper: true
        });
    });
    </script>
    <!-- //tables -->
    <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet'
        type='text/css' />
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- lined-icons -->
    <link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
    <!-- //lined-icons -->
    <!-- <style>
		.table-responsive {
			max-height: 300px;
		}
    </style> -->
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
                <li class="breadcrumb-item"><a href="dashboard.php">
                 <?php echo htmlspecialchars($lang['Home']);?>

                </a><i class="fa fa-angle-right"></i>
                    <?php echo htmlspecialchars($lang['Customers']);?>
                
            </li>
            </ol>
            <div class="agile-grids">
                <!-- tables -->

                <div class="agile-tables">
                    <div class="w3l-table-info">
                        <h2>
                    <?php echo htmlspecialchars($lang['View Customer']);?>
                            
                        </h2>
                        <table id="table">
                            <thead>
                                <tr>
                                    <th><?php echo htmlspecialchars($lang['Customer Id']);?></th>
                                    <th><?php echo htmlspecialchars($lang['First name']);?></th>
                                    <th><?php echo htmlspecialchars($lang['Middle name']);?></th>
                                    <th><?php echo htmlspecialchars($lang['Last name']);?></th>

                                    <th><?php echo htmlspecialchars($lang['Meter Number']);?></th>
                                    <th><?php echo htmlspecialchars($lang['Kebele']);?></th>
                                    <th><?php echo htmlspecialchars($lang['House Number']);?></th>
                                    <th><?php echo htmlspecialchars($lang['Phone Number']);?></th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $user = $_SESSION['USERNAME'];
                                $sql = "SELECT * from customer ";
									$query = $dbcon -> prepare($sql);
									//$query -> bindParam(':city', $city, PDO::PARAM_STR);
									$query->execute();
									$results=$query->fetchAll(PDO::FETCH_OBJ);
									$cnt=1;
									if($query->rowCount() > 0)
									{
									foreach($results as $result)
									{				
								?>
                                <tr>
                                    <!-- <td><?php echo htmlentities($cnt);?></td> -->

                                    <td><?php echo htmlentities($result->CustomerId);?></td>
                                    <td><?php echo htmlentities($result->firstname);?></td>
                                    <td><?php echo htmlentities($result->middlename);?></td>
                                    <td><?php echo htmlentities($result->lastname);?></td>
                                    <td><?php echo htmlentities($result->meterNumber);?></td>

                                    <td><?php echo htmlentities($result->kebele);?></td>
                                    <td><?php echo htmlentities($result->houseNumber);?></td>
                                    <td><?php echo htmlentities($result->phoneNumber);?></td>
                                    <?php echo htmlentities($result->userimage);?></td>

                                </tr>
                                <?php $cnt=$cnt+1;} }?>
                            </tbody>
                        </table>
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
<script src="js/jquery.js"></script>
<script type="text/javascript">

</script>
<?php } ?>