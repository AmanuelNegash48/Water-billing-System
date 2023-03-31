<?php

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "water";
session_start();
include('includes/config.php');
if(strlen($_SESSION['USERNAME'])==0)
	{	
header('location:../login.php');
}
else{ 
    if(isset($_POST['submit']))
   
	?>
<?php

$current =$_REQUEST['CustomerId'];

$conn = mysqli_connect("localhost", "root", "", "water");
$result = mysqli_query($conn,"SELECT * FROM bill WHERE CustomerId  = '$current'");

$test = mysqli_fetch_array($result);
if (!$result) 
    {
    die("Error: Data not found..");
    }
    $id=$test['id'] ;
    $CustomerId=$test['CustomerId'] ;
    $fname= $test['firstname'] ;					
    $mname= $test['middlename'] ;					
    $lname=$test['lastname'] ;
    $pres=$test['pres'] ;
    $prev=$test['prev'] ;
    $price=$test['price'];
    $date=$test['date'];
?>

<?php

$current =$_REQUEST['CustomerId'];
$conn = mysqli_connect("localhost", "root", "", "water");
$result = mysqli_query($conn,"SELECT * FROM customer WHERE CustomerId  = '$current'");
$test = mysqli_fetch_array($result);
if (!$result) 
    {
    die("Error: Data not found..");
    }
    $CustomerId=$test['CustomerId'] ;

    $fname= $test['firstname'] ;					
    $mname= $test['middlename'] ;					
    $lname=$test['lastname'] ;
    $meterNumber=$test['meterNumber'] ;
    $kebele=$test['kebele'] ;
    $phoneNumber=$test['phoneNumber'] ;

?>
<html>


<head>
    <title>Water Billing System</title>
    <meta name="viewport" content="width = device-width, initial-scale = 1">
    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);
    </script>
    <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/morris.css" type="text/css" />
    <link href="css/font-awesome.css" rel="stylesheet">
    <script src="js/jquery-2.1.4.min.js"></script>
    <link href='//fonts.googleapis.com/css?family = Roboto:700,500,300,100italic,100,400' rel='stylesheet'
        type='text/css' />
    <link href='//fonts.googleapis.com/css?family = Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
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
        margin: 05 auto;
        width: 800px;
        padding: 05px;
        border: #066 thin ridge;
        height: 1000px;
    }
    </style>
    <script>
    function printDiv(data) {
        var printContents = document.getElementById('data').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
    </script>
    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
</head>

<body style=" background-size:cover; font-family:'Courier New', Courier;">

    <div class="container">
        <!--/content-inner-->
        <!-- <div class="left-content"> -->
        <div class="mother-grid-inner">
            <!--header start here-->

            <?php include('includes/header.php');?>
            <div class="clearfix"> </div>
        </div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="dashboard.php">
                    <i class="fa fa-home"></i>
                    <?php echo htmlspecialchars($lang['Home']);?>
                </a>
            </li>
            <li class="breadcrumb-item">
                <i class="fa fa-angle-right"></i>
                    <?php echo htmlspecialchars($lang['Print Bill']);?>
            </li>

        </ol>
        <!--heder end here-->
        <div class="agile-grids">
            <!--grid-->
            <div class="grid-form">

                <!---->
                <div class="grid-form1">
                    <h3><?php echo htmlspecialchars($lang['Print Bill']);?></h3>
                    <div id="data">
                        <img src="../Images/wbb.jpg" width="140" height="90" />
                        <center>
                            <h4>
                                <center><b>Dha.Taj.Bis.Dhu.fi Dhangala'a Magaalaa Bulee Horaa <br><b>Bule Hora
                                            Water
                                            Supply Service Enterprise<b></center>
                            </h4>
                            <p><strong>Waraqaa Kaffaltii<br>Bill Invoice<br>የቢል ኢንቮይስ</strong></p>
                            <p>Phone: 04644430036/550</p>

                        </center>
                        <div id="context">
                            <table class="table table-striped table-bordered">

                                <tr>

                                    <td bordercolor="#000000"> <b>Lakk.Biilii : </b><br> <b>Bill Number </b><br>
                                        <b>ቢል ቁጥር </b>
                                    </td>
                                    <td>

                                        <h4><i><?php echo"<strong>  B000$id </strong>" ?></h4>

                                    </td>

                                    <td> <b>Id.Maamila: </b> <br> <b>Customer Id </b> <br> <b>ደንበኛ ቁጥር </b></td>
                                    <br>
                                    <td>
                                        <h4>
                                            <?php  echo "<strong> $CustomerId</strong>" ?></h4>
                                    </td>
                                </tr>
                                </tr>
                                <tr>
                                    <td> <b>Maqaa Maamila: </b> <br> <b>Customer Name </b> <br> <b>ደንበኛ ስም </b></td>
                                    <td>
                                        <h4><?php echo "<strong> $fname </strong>"?>

                                    </td>
                                    <td>
                                        <h4><?php echo "<strong> $mname </strong>"?>

                                    </td>
                                    <td>
                                        <h4><?php echo "<b> $lname </b>"?>
                                    <td>
                                    </td>
                                    </td>

                                </tr>
                                <tr>
                                    <td bordercolor="#000000"> <b>Lakk.Lakkooftu : </b><br> <b>Meter Number
                                        </b><br> <b>ሜትር ቁጥር </b> </td>
                                    <td>
                                        <h4><?php echo"<strong>  $meterNumber </strong>" ?>
                                    </td>
                                    <td> <b>Ganda : <br> <b>Kebele <br> <b>ቀበሌ
                                    <td>
                                        <h4><?php echo "<strong> $kebele</strong>" ?> </h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td bordercolor="#000000"> <b>Lakk.Bilbila:<br> <b>phone Number<br> <b>ስልክ ቁጥር
                                    </td>
                                    <td>
                                        <h4><?php echo "<strong> $phoneNumber</strong>" ?>
                                    </td>
                                    <td> <b>Guyyaa/ Date /ቀን:</b>
                                    <td>
                                        <h5><?php echo "<strong> $date</strong>" ?></h5><br>
                                    </td>
                                    </td>



                                </tr>
                                <tr>
                                    <td bordercolor="#000000"><b>Dubbii Duraanii :<br> <b>Previous Reading
                                                <br><b>ያለፈ ንባብ
                                    </td>
                                    <td>
                                        <h4><?php echo "<strong> $prev</strong>"?>
                                    </td>
                                    <td bordercolor="#000000"><b>Dubbii Ammaa :</b><br>
                                        <b> Previous
                                            Reading <br><b>የአሁን ንባብ
                                    </td>
                                    <td bordercolor="#000000">
                                        <h4><?php echo "<strong> $pres</strong>" ?>

                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="4">
                                        <center>
                                            <h2> Mallaqaa/Price/ዋጋ :<b> <?php echo $price; ?><b> Birr</h2>
                                        </center>
                                    </td>
                                </tr>
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
                                <tr>
                                    <td> <b>Sasaabdu/ <b>Collector/ ሰብሳቢ:
                                            </b>
                                    <td>
                                        <b><?php echo htmlentities($result->username);?></b>
                                    </td>
                                    </td>
                                    <td><b>Mallatto/ Signature/ ፊርማ _______<b> <b> </td>
                                </tr>
                            </table>



                        </div>
                    </div>
                    <CENTER><br>

                        <button type="button" class="btn btn-default " onclick="printDiv(data)">

                            <span
                                class=" glyphicon glyphicon-print"></span>&nbsp;<?php echo htmlspecialchars($lang['Print']);?></button>&nbsp;<a
                            href="billing.php">

                            <button class="btn btn-danger2"><span
                                    class="glyphicon glyphicon-arrow-left"></span>&nbsp;<?php echo htmlspecialchars($lang['Go back']);?>
                            </button></a>
                    </CENTER>




                </div>
            </div>
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
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
<?php }}} ?>