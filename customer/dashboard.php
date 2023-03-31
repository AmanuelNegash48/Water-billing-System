<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['USERNAME'])==0)
	{	
header('location:../login.php');


}
else{
?>


<div class="container">
    <!--/content-inner-->
    <!-- <div class="left-content"> -->
    <div class="mother-grid-inner">
        <!--header start here-->
        <?php include('includes/header.php');?>
        <!--header end here-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php"><?php echo htmlspecialchars($lang['Home']);?></a>
            </li>
        </ol>
        <!--four-grids here-->

        <div class="menu-outer">
            <!-- <ul class="menu" style="background: white"> -->
            <!-- <div class="menu-inner"><a href="dashboard.php"><i class="fa fa-home"></i>
                            <span><?php echo htmlspecialchars($lang['Home']);?></span>
                             <div class="clearfix"></div> 
                        </a></div> -->
            <div class="menu">
                <div class="menu-inner"><a href="viewpayment.php"><i class="fa fa-usd" aria-hidden="true"></i>
                        <span><?php echo htmlspecialchars($lang['Payment']);?></span>
                        <!-- <div class="clearfix"></div> -->
                </div>

                <div class="menu-inner"><a href="Profile.php"><i class="fa fa-user"
                            aria-hidden="true"></i><span><?php echo htmlspecialchars($lang['Profile']);?></span>
                        <!-- <div class="clearfix"></div> -->
                    </a></div>

                <div class="menu-inner"><a href="Comment.php"><i class="fa fa-comment-o"
                            aria-hidden="true"></i><span><?php echo htmlspecialchars($lang['Comment']);?></span>
                        <!-- <div class="clearfix"></div> -->
                </div>
            </div>

            <!-- </ul> -->

            <!-- <center> <img src="images/customer.jpg" alt="" width="1000" height="400"> -->
        </div>
    </div>

</div>

<!--inner block end here-->
<!--copy rights start here-->
<?php include('includes/footer.php');?>


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

<?php } ?>