<!DOCTYPE HTML>
<html>

<head>
    <title>BWSSSE | Billofficer </title>
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
    <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet'
        type='text/css' />
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- lined-icons -->
    <link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
    <!-- //lined-icons -->
    <style>
    .breadcrumb {
        color: black
    }
    </style>
</head>

<body>
    <?php include('lang.php')?>

    <div class="header-main">
        <div class="logo-w3-agile" style="background: linear-gradient(to right, #FFA, #ADD8F6); ">
            <h1><a style="color: black;"
                    href="dashboard.php"><?php echo htmlspecialchars($lang['Water Billing System']);?></a></h1>
        </div>
        <div class="profile_details w3l">
            <ul>
                <li class="dropdown profile_details_drop">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <div class="profile_img">
                            <?php 
                     
                            $user = $_SESSION['USERNAME'];
                            $current= $_SESSION['ID'];
                            $sql = "SELECT * from account where id='$current' ";
                                $query = $dbcon -> prepare($sql);
                            
                                $query->execute();
                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                $cnt=1;
                                if($query->rowCount() > 0)
                                {
                                foreach($results as $result)
                                {				
                            ?>
                            <span class="prfil-img">
                            <?php if($result->userimage != null){ ?>
                            <img alt="" src="../Images/<?php echo htmlentities($result->userimage);?>">
                            <?php }else{ ?>
                                <img alt="" src="../Images/default.png">
                            <?php } ?>
                                <?php $cnt=$cnt+1;?>

                            </span>
                            <div class="user-name">
                                <p><?php echo htmlentities($result->username);?>
                                    <?php $cnt=$cnt+1;}} ?></p>
                                <span><?php echo htmlspecialchars($lang['Bill Officer']);?></span>
                            </div>
                            <i class="fa fa-angle-down"></i>
                            <i class="fa fa-angle-up"></i>
                        </div>
                    </a>
                    <ul class="dropdown-menu drp-mnu">
                        <li> <a href="change-password.php"></i
                                    width=100;><?php echo htmlspecialchars($lang['Change Password']);?></a> </li>
                        <li> <a href="logout.php"><i
                                    class="fa fa-sign-out"></i><?php echo htmlspecialchars($lang['Logout']);?> </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="clearfix"> </div>
    </div>