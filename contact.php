<?php
session_start();
error_reporting(0);
include('includes/config.php');

?>
<!DOCTYPE HTML>
<html>

<head>
    <title>BWSSSE | Water Billing System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <script type="applijewelleryion/x-javascript">
        addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
    </script>

    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.css" rel="stylesheet">
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
<center>

    <body style="padding-right: 10% ;padding-left: 10%; background-color: white;">
        <?php include('includes/header.php');?>

        <table align="center" width="600" height="350" id="aa">
            <div>
                <tr>
                    <th>
                        <center><b>
                                <h2 id="aaa">
                                    <?php echo htmlspecialchars($lang['Water Billing System For Burayu Water Supply and Sewage Service Enterprise']);?></strong>
                                </h2>
                                </b>
                        </center>
                        <hr />
                        P.O.B 61
                        <p>Burayu, Oromia, Ethiopia.</p>
                        <p>Tel: 04644430036/550<br />
                        <p>Email:-------@gmail.com</p>
                    </th>
                </tr>
            </div>
        </table>

        <!--- footer ---->
        <?php include('includes/footer.php');?>

    </body>


</html>