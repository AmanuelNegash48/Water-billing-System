<?php
    session_start();
    error_reporting(0);
    include('includes/config.php');

?>
<!DOCTYPE HTML>
<html>

<head>
    <title>BWSSSE | Water Billing System</title>
    <link href="css/style.css" rel='stylesheet' type='text/css' />

    <script type="applijewelleryion/x-javascript">
        addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
    </script>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.css" rel="stylesheet">

    <style>
    .gradient-custom-2 {
        /* fallback for old browsers */
        background: #fccb90;
        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
    }

    @media (min-width: 768px) {
        .gradient-form {
            height: 100vh !important;
        }
    }

    @media (min-width: 769px) {
        .gradient-custom-2 {
            border-top-right-radius: .3rem;
            border-bottom-right-radius: .3rem;
        }
    }

    .holder {
        display: flex;
        flex direction: column;
        margin-top: 35px;
        padding: 20px;
        gap: 150px;
        justify-content: space-between;
        align-items: center;

    }


    .holder .subtitle {
        font-size: 30px;
        font-weight: 400;
        flex: 1;
    }

    .holder .detail {
        flex: 2;
        font-size: 15px;
        width="100%";
        align-items: right;
        justify-content: end;


    }
    </style>
    <!-- Custom Theme files -->
    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!--animate-->
    <link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
    <script src="js/wow.min.js"></script>
    <script>
    new WOW().init();
    </script>
    <!--//end-animate-->
</head>


<body style="padding-right: 10% ;padding-left: 10%; background-color: white;" #data { margin: 0 auto; width: 850px;
    padding: 30px; border: #00 thin ridge; height: 650px; }>
    </style>

    <?php include('./includes/header.php');?>

    <section id="aboutus">


        <!-- Background  -->
        <div class="holder">
            <div class="subtitle">
                <b><?php echo htmlspecialchars($lang['Background']);?><b>
            </div>
            <div class="detail">
                <p style=" background-size:cover; font-family:'Courier New', Courier; ">
                    &nbsp; &nbsp;
                    <?php echo htmlspecialchars($lang["A water billing system is a software application that helps manage the billing and invoicing process for water utilities or organizations that provide water services to customers. The system typically includes features such as meter reading, customer billing, payment processing, and reporting. The purpose of a water billing system is to streamline the billing process, reduce errors, and improve accuracy and efficiency. With a water billing system, water utilities can manage customer accounts, track water usage, and generate bills based on actual meter readings. Customers can also view their bills online, make payments electronically, and receive alerts about their account status. The Burayu Water Supply and Sewage Service Enterprise (BWSSSE) is responsible for providing water services to the city's residents. The organization uses a water billing system to manage customer accounts, meter readings, billing, and payment processing. The system helps BWSSSE to 1efficiently manage water services and to ensure that customers receive accurate bills for their water usage."]);?>
                </p>
            </div>
        </div>
        <!-- Vision  -->
        <div class="holder">
            <div class="subtitle">
                <b><?php echo htmlspecialchars($lang['Vision']);?><b>
            </div>
            <div class="detail">
                <p style=" background-size:cover; font-family:'Courier New', Courier;">
                    &nbsp; &nbsp;
                    <?php echo htmlspecialchars($lang['The vision of an organization is to become a leader in the water billing industry, providing innovative solutions that improve the management and delivery of water services. This includes developing advanced technologies and systems that enable water utilities to better manage their operations, reduce waste, and improve customer satisfaction.']);?>
                </p>
            </div>

        </div>
        <!-- Mission  -->
        <div class="holder">
            <div class="subtitle">
                <b><?php echo htmlspecialchars($lang['Mission']);?><b>
            </div>
            <div class="detail">
                <p style=" background-size:cover; font-family:'Courier New', Courier;">
                    &nbsp; &nbsp;
                    <?php echo htmlspecialchars($lang["The mission of an organization is to deliver accurate, timely, and efficient billing services to their clients. This includes ensuring that customers receive bills that accurately reflect their water usage, as well as providing customer support and assistance with billing issues."]);?>
                </p>
            </div>
        </div>

    </section>
    <br><br>

    <?php include('includes/footer.php');?>


    <?php

            $current =$_REQUEST['CustomerId'];

            $conn = mysqli_connect("localhost", "root", "", "water");
            $result = mysqli_query($conn,"SELECT * FROM account ");
            $test = mysqli_fetch_array($result);
            while($row = mysqli_fetch_array($result))
            {
            $sessionname=$row['username'];

            }
        ?>

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

</body>

</html>