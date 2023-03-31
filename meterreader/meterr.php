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
    <!-- <title>BHWSSE | admin manage packages</title> -->
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
    <script type="text/javascript" src="js/jquery.basictable.min.js"></script>
    <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
    <script src="src/facebox.js" type="text/javascript"></script>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        $('a[rel*=facebox]').facebox({
            loadingImage: 'src/loading.gif',
            closeImage: 'src/closelabel.png'
        });
    });

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
            </a>
                <i class="fa fa-angle-right"></i> 
                <?php echo htmlspecialchars($lang['Record Value']);?>
            </li>
        </ol>

        <div class="agile-grids">
            <!-- tables -->
            <main>
                <form method="POST" action="">
                    <div class="form-inline">
                        <input type="search" class="form-control" name="keyword"
                            value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>"
                            placeholder="Search by ID/ Meter Number" required="" />
                        <button class="btn btn-success" name="search">
                            <?php echo htmlspecialchars($lang['Search']);?>
                        </button>
                        <a href="meterr.php" class="btn btn-info">
                            <?php echo htmlspecialchars($lang['Reload']);?>
                        </a>
                    </div>
                </form>
            </main>
            <div class="agile-tables">
                <div class="w3l-table-info">
                    <h2> 
                        <?php echo htmlspecialchars($lang['Record Value']);?>
                    </h2>
                    <table id="table">
                        <thead>
                            <tr>
                                <th><?php echo htmlspecialchars($lang['Id']);?></th>
                                <th><?php echo htmlspecialchars($lang['First name']);?></th>
                                <th><?php echo htmlspecialchars($lang['Middle name']);?></th>
                                <th><?php echo htmlspecialchars($lang['Last name']);?></th>
                                <th><?php echo htmlspecialchars($lang['Meter Number']);?></th>
                                <th><?php echo htmlspecialchars($lang['Kebele']);?></th>
                                <th><?php echo htmlspecialchars($lang['House Number']);?></th>
                                <th><?php echo htmlspecialchars($lang['Record']);?></th>
                            </tr>
                        </thead>
                        <tbody>


                            <form method="post">
                                <?php 
                                        $user = $_SESSION['USERNAME'];
                                        $keyword = $_POST['keyword'];

                                        $sql = "SELECT * FROM `customer` where `CustomerId` LIKE '%$keyword%' or `meterNumber` LIKE '%$keyword%' ";
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

                                    <td><?php echo htmlentities($result->CustomerId);?></td>
                                    <input name="CustomerId" type="hidden"
                                        value="<?php echo htmlentities($result->CustomerId);?>" />

                                    <td><?php echo htmlentities($result->firstname);?></td>
                                    <input name="firstname" type="hidden"
                                        value="<?php echo htmlentities($result->firstname);?>" />

                                    <td><?php echo htmlentities($result->middlename);?></td>
                                    <input name="middlename" type="hidden"
                                        value="<?php echo htmlentities($result->middlename);?>" />

                                    <td><?php echo htmlentities($result->lastname);?></td>
                                    <input name="lastname" type="hidden"
                                        value="<?php echo htmlentities($result->lastname);?>" />

                                    <td><?php echo htmlentities($result->meterNumber);?></td>
                                    <input name="meterNumber" type="hidden"
                                        value="<?php echo htmlentities($result->meterNumber);?>" />
                                    <td><?php echo htmlentities($result->kebele);?></td>
                                    <input name="kebele" type="hidden"
                                        value="<?php echo htmlentities($result->kebele);?>" />

                                    <td>
                                        <?php echo htmlentities($result->houseNumber);?>
                                        <input name="consumption" type="hidden"
                                            value="<?php echo htmlentities($result->houseNumber);?>" />
                                    </td>
                                    <td><a
                                            href="waterConsumption1.php?CustomerId=<?php echo htmlentities($result->CustomerId);?>">
                                            <button type="button" class="btn btn-info glyphicon glyphicon-record ">
                                                <?php echo htmlspecialchars($lang['Record']);?>
                                            </button></a></td>
                                    <td>

                                    <td>


                                </tr>
                            </form>
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


            <!--copy rights start here-->
            <?php include('includes/footer.php');?>
            <!--COPY rights end here-->
        </div>


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