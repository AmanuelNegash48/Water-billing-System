<div class="header-main">
    <div class="logo-w3-agile">
        <h1><a href="dashboard.php">Water Billing System</a></h1>
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
                            <img alt="" src="images/<?php echo htmlentities($result->userimage);?>">
                            <?php $cnt=$cnt+1;} }?>

                        </span>
                        <div class="user-name">
                            <p>Welcome</p>
                            <span>Bill Officer</span>
                        </div>
                        <i class="fa fa-angle-down"></i>
                        <i class="fa fa-angle-up"></i>
                        <div class="clearfix"></div>
                    </div>
                </a>
                <ul class="dropdown-menu drp-mnu">
                    <li> <a href="change-password.php"><i class="fa fa-user"></i> Change Password</a> </li>
                    <li> <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="clearfix"> </div>
</div>