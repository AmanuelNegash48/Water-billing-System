<div class="header-main">
    <?php include('./lang.php')?>
   
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
                            <p><?php echo htmlentities($result->username);?> <?php }} ?></p>
                            <span><?php echo htmlspecialchars($lang['Admin']);?></span>
                        </div>
                        <i class="fa fa-angle-down"></i>
                        <i class="fa fa-angle-up"></i>
                    </div>
                </a>
                <ul class="dropdown-menu drp-mnu">
                    <li> <a href="change-password.php"><i class=""></i>
                            <?php echo htmlspecialchars($lang['Change Password']);?></a> </li>
                    <li> <a href="logout.php"><i class="fa fa-sign-out"></i>
                            <?php echo htmlspecialchars($lang['Logout']);?></a> </li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="clearfix"> </div>
</div>