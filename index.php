<?php
    session_start();
    error_reporting(0);
    include('includes/config.php');

?>
<!DOCTYPE HTML>
<html>

<head>
    <title>BWSSSE | Water Billing System </title>
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
    <style>
        .holder {
            display: flex;
            flex direction: column;
            margin-top: 6rem;
            gap: 200px;
            justify-content: space-between;
            align-items: end;

        }


        .holder .subtitle {
            font-size: 30px;
            font-weight: 400;
            color: blue;
            width: 40%;
            justify-content: end;


        }

        .holder .detail {
            flex: 2;
            font-size: 15px;
            width: 35%;
            align-items: right;
            justify-content: end;


        }

        h1 {
            align-items: center;
            justify-content: center;
            margin-top: 15px;
            padding: 20px;
            color: #000;
            background: #ff9;
        }
   
    </style>
</head>


<body style="padding-right: 10% ;padding-left: 6%; background: white;">
    <?php include('./includes/header.php');?>


    <br>
    <section id="home">
        <div class="holder">
            <div class="subtitle">
                <b
                    width="50%"><?php echo htmlspecialchars($lang['Water Billing System For Burayu Water Supply and Sewage Service Enterprise']);?></b>
            </div>

            <div class="detail" >
                <img src="Images/waterpipe.png" alt="" width="70%" height="200" />
            </div>

        </div>
    </section>
    <br>
    <br>

  

    <?php include('includes/footer.php');?>
</body>

</html>