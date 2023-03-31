<?php
session_start();
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
    <title>BWSSSE | Admin Dashboard</title>
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
    <link href="../billofficer/css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/morris.css" type="text/css" />
    <!-- Graph CSS -->
    <link href="../billofficer/css/font-awesome.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="js/jquery-2.1.4.min.js"></script>
    <!-- //jQuery -->
    <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet'
        type='text/css' />
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- lined-icons -->
    <link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
    <!-- //lined-icons -->

    <style>
    <?php include('../billofficer/css/style.css');

    ?>.main-content {
        width: 1000px;
        height: 350px;
        overflow-y: scroll;
        display: block;
        align-items: center;
        justify-content: center;
    }
    </style>
</head>

<body>
    <!-- <div class="banner">
         <div class="container">
            <h1 class="wow zoomIn animated animated" data-wow-delay=".5s"
                style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> </h1>
        </div> 
    </div> -->
    <div class="container">
        <!--/content-inner-->
        <!-- <div class="left-content"> -->
        <div class="mother-grid-inner">
            <!--header start here-->
            <?php include('includes/header.php'); ?>

            <!--header end here-->

            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="dashboard.php">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <?php echo  htmlspecialchars($lang['Home']);?>
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="create-user.php">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        <span>
                            <?php echo htmlspecialchars($lang['Create Account']);?>
                        </span>
                        <div class="clearfix"></div>
                    </a>
                </li>

                <li class="breadcrumb-item">
                    <a href="index.php">
                        <i class="fa fa-tasks" aria-hidden="true"></i>
                        <?php echo htmlspecialchars($lang['Manage Account']);?>
                    </a>
                </li>

                <li id="menu-academico" class="breadcrumb-item">
                    <a href="dashboard.php">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <?php echo htmlspecialchars($lang['Activate/Diactivate']);?>

                    </a>
                    <ul id="menu-academico-sub">
                        <li id="menu-academico-avaliacoes"><a href="status cust.php">
                                <?php echo htmlspecialchars($lang['Customer']);?></a></li>
                        <li id="menu-academico-avaliacoes"><a href="status.php">
                                <?php echo htmlspecialchars($lang['Employee']);?> </a></li>
                    </ul>
                </li>
            </ol>


            <div class="main-content">
                <!-- All Users -->
                <div class="four-grids">
                    <div class="col-md-2 four-grid">
                        <div class="four-agileits">
                            <div class="icon">
                                <i class="glyphicon glyphicon-user" aria-hidden="true"></i>
                            </div>
                            <div class="four-text">
                                <h3> <?php echo htmlspecialchars($lang['All Users']);?> </h3>
                            </div>
                            <?php $sql = "SELECT id from account where usertype != 'banker' ";
                                $query = $dbcon -> prepare($sql);
                                $query->execute();
                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                $cnt=$query->rowCount();
                            ?> <h4> <?php echo htmlentities($cnt);?> </h4>

                            <a href="view users.php">
                                <div class="panel-footer"><span class="glyphicon glyphicon-circle-arrow-down"></span>
                                    <?php echo htmlspecialchars($lang['View']);?></div>
                            </a>
                        </div>


                    </div>
                </div>
                <!-- Admins -->
                <div class="four-grids">
                    <div class="col-md-2 four-grid">
                        <div class="four-agileinfo">
                            <div class="icon">
                                <i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
                            </div>
                            <div class="four-text">
                                <h3>
                                    <?php echo htmlspecialchars($lang['Admins']);?></h3>
                                <?php $sql1 = "SELECT id from account where usertype='administrator'";
                                    $query1 = $dbcon -> prepare($sql1);
                                    $query1->execute();
                                    $results1=$query1->fetchAll(PDO::FETCH_OBJ);
                                    $cnt1=$query1->rowCount();
					            ?>
                                <h4><?php echo htmlentities($cnt1);?></h4>
                                <a href="view admins.php">
                                    <div class="panel-footer"><span
                                            class="glyphicon glyphicon-circle-arrow-down"></span>

                                        <?php echo htmlspecialchars($lang['View']);?></div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Bill Officers -->
                <div class="four-grids">
                    <div class="col-md-2 four-grid">
                        <div class="four-w3ls">
                            <div class="icon">
                                <i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i>
                            </div>
                            <div class="four-text">
                                <h3> <?php echo htmlspecialchars($lang['Bill Officers']);?></h3>
                                <?php $sql5 = "SELECT id from account where usertype='billofficer'";
                                    $query5= $dbcon -> prepare($sql5);
                                    $query5->execute();
                                    $results5=$query5->fetchAll(PDO::FETCH_OBJ);
                                    $cnt5=$query5->rowCount();
					            ?>
                                <h4><?php echo htmlentities($cnt5);?></h4>
                                <a href="view billofficer.php">
                                    <div class="panel-footer"><span
                                            class="glyphicon glyphicon-circle-arrow-down"></span>
                                        <?php echo htmlspecialchars($lang['View']);?></div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Meter reader -->
                <div class="four-grids">
                    <div class="col-md-2 four-grid">
                        <div class="four-wthree">
                            <div class="icon">
                                <i class="glyphicon glyphicon-briefcase" aria-hidden="true"></i>
                            </div>
                            <div class="four-text">
                                <h3> <?php echo htmlspecialchars($lang['Meter Readers']);?></h3>
                                <?php $sql3 = "SELECT id from account where usertype='meterreader'";
                                    $query3= $dbcon -> prepare($sql3);
                                    $query3->execute();
                                    $results3=$query3->fetchAll(PDO::FETCH_OBJ);
                                    $cnt3=$query3->rowCount();
					            ?>
                                <h4><?php echo htmlentities($cnt3);?></h4>
                                <a href="view meterreader.php">
                                    <div class="panel-footer"><span
                                            class="glyphicon glyphicon-circle-arrow-down"></span>
                                        <?php echo htmlspecialchars($lang['View']);?></div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Customers -->
                <div class="four-grids">
                    <div class="col-md-2 four-grid">
                        <div class="four-w3ls2">
                            <div class="icon">
                                <i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i>
                            </div>
                            <div class="four-text">
                                <h3> <?php echo htmlspecialchars($lang['Customers']);?></h3>
                                <?php $sql2 = "SELECT id from account where usertype='customer'";
                                    $query2= $dbcon -> prepare($sql2);
                                    $query2->execute();
                                    $results2=$query2->fetchAll(PDO::FETCH_OBJ);
                                    $cnt2=$query2->rowCount();
					            ?>
                                <h4><?php echo htmlentities($cnt2);?></h4>
                                <a href="view customer.php">
                                    <div class="panel-footer"><span
                                            class="glyphicon glyphicon-circle-arrow-down"></span>
                                        <?php echo htmlspecialchars($lang['View']);?></div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>


            <!--//four-grids here-->
        </div>
    </div>
    <br>

    <!--inner block end here-->
    <!--copy rights start here-->
    <?php include('includes/footer.php');?>
    <!-- </div> -->
    </div>

    <!-- /sidebar-menu
    <?php include('includes/sidebarmenu.php');?>
    <div class="clearfix"></div> -->
    </div>
    <script>
    var toggle = true;

    $(".sidebar-icon").click(function() {
        if (toggle) {
            $(".page-container").addClass("sidebar-collapsed").removeClass(
                "sidebar-collapsed-back");
            $("#menu span").css({
                "position": "absolute"
            });
        } else {
            $(".page-container").removeClass("sidebar-collapsed").addClass(
                "sidebar-collapsed-back");
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
    <!-- morris JavaScript -->
    <script src="js/raphael-min.js"></script>
    <script src="js/morris.js"></script>
    <script>
    $(document).ready(function() {
        //BOX BUTTON SHOW AND CLOSE
        jQuery('.small-graph-box').hover(function() {
            jQuery(this).find('.box-button').fadeIn('fast');
        }, function() {
            jQuery(this).find('.box-button').fadeOut('fast');
        });
        jQuery('.small-graph-box .box-close').click(function() {
            jQuery(this).closest('.small-graph-box').fadeOut(200);
            return false;
        });

        //CHARTS
        function gd(year, day, month) {
            return new Date(year, month - 1, day).getTime();
        }

        graphArea2 = Morris.Area({
            element: 'hero-area',
            padding: 10,
            behaveLikeLine: true,
            gridEnabled: false,
            gridLineColor: '#dddddd',
            axes: true,
            resize: true,
            smooth: true,
            pointSize: 0,
            lineWidth: 0,
            fillOpacity: 0.85,
            data: [{
                    period: '2014 Q1',
                    iphone: 2668,
                    ipad: null,
                    itouch: 2649
                },
                {
                    period: '2014 Q2',
                    iphone: 15780,
                    ipad: 13799,
                    itouch: 12051
                },
                {
                    period: '2014 Q3',
                    iphone: 12920,
                    ipad: 10975,
                    itouch: 9910
                },
                {
                    period: '2014 Q4',
                    iphone: 8770,
                    ipad: 6600,
                    itouch: 6695
                },
                {
                    period: '2015 Q1',
                    iphone: 10820,
                    ipad: 10924,
                    itouch: 12300
                },
                {
                    period: '2015 Q2',
                    iphone: 9680,
                    ipad: 9010,
                    itouch: 7891
                },
                {
                    period: '2015 Q3',
                    iphone: 4830,
                    ipad: 3805,
                    itouch: 1598
                },
                {
                    period: '2015 Q4',
                    iphone: 15083,
                    ipad: 8977,
                    itouch: 5185
                },
                {
                    period: '2016 Q1',
                    iphone: 10697,
                    ipad: 4470,
                    itouch: 2038
                },
                {
                    period: '2016 Q2',
                    iphone: 8442,
                    ipad: 5723,
                    itouch: 1801
                }
            ],
            lineColors: ['#ff4a43', '#a2d200', '#22beef'],
            xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
            pointSize: 2,
            hideHover: 'auto',
            resize: true
        });


    });
    </script>
</body>

</html>
<?php } ?>