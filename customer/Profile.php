<?php

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "water";
session_start();
// error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['USERNAME'])==0)
	{	
header('location:../login.php');
include('lang.php');
}
else{ 
	?>

<div class="container">
    <!--/content-inner-->
    <!-- <div class="left-content"> -->
    <div class="mother-grid-inner">
        <!--header start here-->
        <?php include('includes/header.php');?>
        <div class="clearfix"> </div>
    </div>
    <!--heder end here-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard.php"><?php echo htmlspecialchars($lang['Home']);?></a>
        </li>
        <li class="breadcrumb-item"><?php echo htmlspecialchars($lang['Profile']);?>
        </li>

    </ol>
    <div class="agile-grids">
        <!-- tables -->


        <div class="agile-tables">
            <div class="w3l-table-info">
                <a href="change-image.php?imgid=<?php echo htmlentities($result->id);?>">
                    <img alt="" src="../Images/<?php echo htmlentities($result->userimage);?>" width="100" height="100"
                        style="border-radius: 100%">
                </a>
               

                <br>

                <table id="table">
                    <thead>

                    </thead>
                    <tbody>
                        <?php 
                                $user = $_SESSION['USERNAME'];
                                $current= $_SESSION['ID'];
                                $sql = "SELECT * from customer where CustomerId='$current' ";
									$query = $dbcon -> prepare($sql);
									//$query -> bindParam(':city', $city, PDO::PARAM_STR);
									$query->execute();
									$results=$query->fetchAll(PDO::FETCH_OBJ);
									$cnt=1;
									if($query->rowCount() > 0)
									{
									foreach($results as $result)
									{				
								?>

                        <tr>
                            <td>
                                <?php echo htmlspecialchars($lang['Id']);?>
                            </td>
                            <td><?php echo htmlentities($result->CustomerId);?></td>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo htmlspecialchars($lang['Full name']);?>
                            </td>
                            <td>
                                <?php echo htmlentities($result->firstname); echo " "?>
                                <?php echo htmlentities($result->middlename); echo " "?>
                                <?php echo htmlentities($result->middlename);?>

                            </td>
                        </tr>
                        <!-- <tr>
                                    <td>
                                        <?php echo htmlspecialchars($lang['Middle name']);?>
                                    </td>
                                    <td><?php echo htmlentities($result->middlename);?></td>
                                    </td>
                                </tr> -->
                        <!-- <tr>
                                    <td>
                                        <?php echo htmlspecialchars($lang['Last name']);?>
                                    </td>
                                    <td><?php echo htmlentities($result->lastname);?></td>
                                    </td>
                                </tr> -->
                        <tr>
                            <td>
                                <?php echo htmlspecialchars($lang['User name']);?>
                            </td>
                            <td><?php echo htmlentities($result->username);?></td>
                            </td>
                        </tr>
                        <!-- <tr>
                                    <td>
                                        <?php echo htmlspecialchars($lang['Password']);?>
                                    </td>
                                    <td><?php echo htmlentities($result->userpassword);?></td>
                                    </td>
                                </tr> -->
                        <tr>
                            <td>
                                <?php echo htmlspecialchars($lang['Meter Number']);?>
                            </td>
                            <td><?php echo htmlentities($result->meterNumber);?></td>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo htmlspecialchars($lang['Kebele']);?>
                            </td>
                            <td><?php echo htmlentities($result->kebele);?></td>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo htmlspecialchars($lang['House Number']);?>
                            </td>
                            <td><?php echo htmlentities($result->houseNumber);?></td>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo htmlspecialchars($lang['Phone Number']);?>
                            </td>
                            <td><?php echo htmlentities($result->phoneNumber);?></td>
                            </td>
                        </tr>
                        <?php 
                                    $user = $_SESSION['USERNAME'];
                                $data= $_SESSION['ID'];
                                $sql = "SELECT * from account where id='$data' ";
                                    $query = $dbcon -> prepare($sql);
                                
                                    $query->execute();
                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt=1;
                                    if($query->rowCount() > 0)
                                    {
                                    foreach($results as $result)
                                    {				
                                ?>

                        <!-- <tr>
                                     <td>
                                        <d><?php echo htmlspecialchars($lang['Images']);?>:
                                    </td> -->

                        <td>

                            <!-- <img alt="" src="../images/<?php echo htmlentities($result->userimage);?>"
                                            width="50" height="50"> 

                                        <?php $cnt=$cnt+1;?>
                                    </td>

                                </tr>


                                </tr> -->

                            <?php $cnt=$cnt+1;} }?>
                    </tbody>
                </table>
            </div>
            <!-- </table> -->

        </div>
        <!-- script-for sticky-nav -->
        <script>
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
        <!-- /script-for sticky-nav -->
        <!--inner block start here-->
        <!-- <div class="inner-block">

                </div> -->
        <!--inner block end here-->
        <!--copy rights start here-->
        <!--COPY rights end here-->
    </div>
    <!-- </div> -->

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
</body>

</html>
<script src="js/jquery.js"></script>
<script type="text/javascript">

</script>

<script type="text/javascript" src="js/jquery.basictable.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#table').basictable();

    $('#table-breakpoint').basictable({
        breakpoint: 768
    });

    $('#table-swap-axis').basictable({
        swapAxis: true
    });

    $('#table-force-off').basictable({
        forceResponsive: false
    });

    $('#table-no-resize').basictable({
        noResize: true
    });

    $('#table-two-axis').basictable();

    $('#table-max-height').basictable({
        tableWrapper: true
    });
});
</script>
<!-- //tables -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<!-- <style>
		.table-responsive {
			max-height: 300px;
		}
    </style> -->
<?php } }}?>