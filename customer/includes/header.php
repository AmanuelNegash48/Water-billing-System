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
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="../meterreader/css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/morris.css" type="text/css" />
    <!-- Graph CSS -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="js/jquery-2.1.4.min.js"></script>
    <!-- //jQuery -->
    <!-- tables -->
    <link rel="stylesheet" type="text/css" href="css/table-style.css" />
    <link rel="stylesheet" type="text/css" href="css/basictable.css" />

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

    #data {
        margin: 0 auto;
        width: 850px;
        padding: 5px;
        border: #066 thin ridge;
        height: 870px;
    }

    .menu-outer {
        width: 1000px;
        height: 350px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .menu-inner {
        width: 400px;
        height: 50px;
        background: linear-gradient(to right, #fff, #ADD8F6, #e2f);
        margin: 1rem;
        text-align: center;
        padding-top: .6rem;
        font-size: 1.5rem;

    }

    span:hover {
        font-size: 1rem;
        color: black;

    }
    </style>


    <div class="header-main">
        <?php include('lang.php')?>
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
                                <?php if($result->userimage){ ?>
                                    <img alt="" src="../Images/<?php echo htmlentities($result->userimage);?>">
                                <?php }else { ?>
                                    <img alt="" src="../Images/default.png">
                                <?php }?>
                                
                                <?php $cnt=$cnt+1;?>

                            </span>
                            <div class="user-name">
                                <p><?php echo htmlentities($result->username);?> <?php $cnt=$cnt+1;}} ?></p>
                                <span><?php echo htmlspecialchars($lang['Customer']);?></span>
                            </div>
                            <i class="fa fa-angle-down"></i>
                            <i class="fa fa-angle-up"></i>
                        </div>
                    </a>
                    <ul class="dropdown-menu drp-mnu">
                        <li> <a href="change-password.php"></i>
                                <?php echo htmlspecialchars($lang['Change Password']);?></a>
                        </li>
                        <li> <a href="logout.php"><i class="fa fa-sign-out"></i>
                                <?php echo htmlspecialchars($lang['Logout']);?></a> </li>
                    </ul>
                </li>
            </ul>

        </div>

        <div class="clearfix"> </div>
    </div>