<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['USERNAME'])==0)
	{	
header('location:../login.php');
}
else{
?>
<style>
    .main-content{
        width: 1000px;
        height: 300px;
        overflow-y: scroll;
        display: inline;
        align-items: center;
        justify-content: center;
    }
</style>

<div class="container">
    <!--/content-inner-->
    <!-- <div class="left-content"> -->
    <div class="mother-grid-inner">
        <!--header start here-->
        <?php include('includes/header.php');?>
        <!--header end here-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="dashboard.php">
                    <i class="fa fa-home"></i>
                    <?php echo htmlspecialchars($lang['Home']);?>
                </a>
                <i class="fa fa-vertical-line"></i>
            </li>
            <li class="breadcrumb-item">
                <a href="registerCustomer.php">
                    <i class="fa fa-registered"></i>
                    </i><?php echo htmlspecialchars($lang['Register Customer']);?>
                </a>
                <i class="fa fa-vertical-line"></i>
                <i class="fa fa-vertical-line"></i>
            </li>
            <li class="breadcrumb-item">
                <a href="manage-customer.php">
                    <i class="fa fa-tasks"></i>
                    </i><?php echo htmlspecialchars($lang['Manage Customer']);?>
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="billing.php">
                    <i class="fa fa-dollar"></i>
                    </i><?php echo htmlspecialchars($lang['Billing']);?>
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="registerrequest.php">
                    <i class="fa fa-question"></i>
                    </i><?php echo htmlspecialchars($lang['View Register Request']);?>
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="viewcomment.php">
                    <i class="fa fa-comments"></i>
                    </i><?php echo htmlspecialchars($lang['Comment']);?>
                </a>
            </li>

        </ol>
        <!--four-grids here-->
        <div class="main-content">
            <div class="four-grids">
                <div class="col-md-3 four-grid">
                    <div class="four-agileits">
                        
                        <div class="icon">
                            <i class="glyphicon glyphicon-user" aria-hidden="true"></i>
                        </div>
                        <div class="four-text">
                            <h3></i><?php echo htmlspecialchars($lang['Customers']);?></h3>

                            <?php $sql = "SELECT CustomerId from customer";
                                $query = $dbcon -> prepare($sql);
                                $query->execute();
                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                $cnt=$query->rowCount();
                                ?> <h4> <?php echo htmlentities($cnt);?> </h4>
                            <a href="viewCust.php">
                                <div class="panel-footer"><span
                                        class="glyphicon glyphicon-circle-arrow-right"></span></i><?php echo htmlspecialchars($lang['View']);?>
                                </div>
                            </a>

                        </div>

                    </div>
                </div>


                <!-- <div class="col-md-3 four-grid">


                    <center> <img src="images/download.jpg" alt="Girl in a jacket" width="1000" height="230">
                </div> -->
            </div>


            <div class="four-grids">
                <div class="col-md-3 four-grid">
                    <div class="four-w3ls">
                        <div class="icon">
                            <i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i>
                        </div>
                        <div class="four-text">
                            <h3></i><?php echo htmlspecialchars($lang['Comment']);?></h3>
                            <?php $sql = "SELECT * from comment ";
                                $query = $dbcon -> prepare($sql);
                                $query->execute();
                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                $cnt=$query->rowCount();
					        ?> <h4> <?php echo htmlentities($cnt);?> </h4>
                            <a href="viewcomment.php">
                                <div class="panel-footer"><span
                                        class="glyphicon glyphicon-circle-arrow-right"></span></i><?php echo htmlspecialchars($lang['View']);?>
                                </div>
                            </a>


                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-md-3 four-grid">
            <center> <img src="images/water-bill-.png.png" alt="Girl in a jacket" width="1000" height="230">
        </div> -->
    </div>

    <div class="clearfix"></div>
    <!-- </div> -->
    <!--//four-grids here-->


    <div class="inner-block">

    </div>
    <!--inner block end here-->
    <!--copy rights start here-->
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