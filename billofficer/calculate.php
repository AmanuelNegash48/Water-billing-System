<?php session_start();
 error_reporting(0);?>


<?php
include('includes/config.php');
$CustomerId =$_REQUEST['CustomerId'];

$conn = mysqli_connect("localhost", "root", "", "water");


$sql = "SELECT * from sentrecorded where CustomerId = '$CustomerId'";
$result = mysqli_query($conn, $sql);
$results = mysqli_fetch_array($result);

if (!$results) 
{
    die("Error: Customer Data not found..");
} else {

    $CustomerId = $results['CustomerId'];
    $fname = $results['firstname'];
    $middlename = $results['middlename'];
    $lname = $results['lastname'];
    $mi=$results['meterNumber'] ;
    $previous = $results['previous'];
    $present = $results['present'];


    $totalPrice = 0;

    if($present >= 21) {
        $totalPrice = 20.64;
    }  
    else if($present >= 16 and $present <= 20) {
        $totalPrice = 17.26;
    }
    else  if($present >= 11 and $present <= 15) {
        $totalPrice = 14.4;
    }
    else  if($present >= 7 and $present <= 10) {
        $totalPrice = 12;
    }
    else if($present >= 4 and $present <= 6) {
        $totalPrice = 10.08;
    } else {
        $totalPrice = 8.4;
    }



    $totalcun = $present;
	$price = $_POST['price'];
	$pricetotal = $totalcun * $price;
	$date=$_POST['date'] ;


// ADD to BILL
if(isset($_POST['submit']))
{
    $sql = "SELECT * from bill  where CustomerId='$current' and status = 'NO'";
    $res = mysqli_query($conn, $sql);
    if ($res) 
    {
        $sql = "INSERT INTO bill(CustomerId, firstname, middlename, lastname, prev, pres, price, date, status, paid) 
        VALUES (:CustomerId,:fname,:middlename,:lname,:previous,:present, :pricetotal, :date,:status, :paid)";

        $dbcon->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
        $query  =  $dbcon->prepare($sql);

        $thisMonth = intval(date('m'));


        // $query->bindValue(':id', $lastInsertId, PDO::PARAM_STR);
        $query->bindValue(':CustomerId', $CustomerId, PDO::PARAM_STR);
        $query->bindValue(':fname', $fname, PDO::PARAM_STR);
        $query->bindValue(':middlename', $middlename, PDO::PARAM_STR);
        $query->bindValue(':lname', $lname, PDO::PARAM_STR);
        $query->bindValue(':previous', $previous, PDO::PARAM_STR);
        $query->bindValue(':present', $present, PDO::PARAM_STR);
        $query->bindValue(':pricetotal', $pricetotal, PDO::PARAM_STR);
        $query->bindValue(':date', $date, PDO::PARAM_STR);
        $query->bindValue(':status', "NO", PDO::PARAM_STR);
        $query->bindValue(':paid', $thisMonth, PDO::PARAM_STR);
        $query->execute();

        $err = $query->errorInfo();
        $err = print_r($err, true);

        $lastInsertId  =  $dbcon->lastInsertId();

        // $suc = mysqli_query($con, $sql); 

        if($lastInsertId)
        {
            $msg="Successfully calculated";
        }
        else 
        {
            $error=$err ;

        }
        
    } else {
        $error="Already Calculated" ;

    }
}
   


}


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
    </style>

</head>



<body>
    <div class="container">
        <!--/content-inner-->
        <?php include('includes/header.php');?>
        <!-- <div class="left-content"> -->
        <div class="mother-grid-inner">
            <!--header start here-->


            <div class="clearfix"> </div>
        </div>
        <!--heder end here-->
        <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="dashboard.php"><?php echo htmlspecialchars($lang['Home']);?></a><i
                    class="fa fa-angle-right"><a
                        href="billing.php"></i><?php echo htmlspecialchars($lang['Billing']);?></a><i
                    class="fa fa-angle-right"></i><?php echo htmlspecialchars($lang['Calculate']);?>
            </li>
        </ol>

        <!--grid-->
        <div class="grid-form">

            <p>
                <?php if(isset($error)){?>
            <div class="errorWrap">
                <strong>ERROR</strong>:<?php echo htmlentities($error); ?>
            </div><?php } 
				else if(isset($msg)){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div>
            <?php }?>

            <!-- <h1>Calculate Bill</h1> -->
            </p>
            <!---->
            <div class="grid-form1">
                <h3>Calculate Bill</h3>



                <h1> Name: <?php echo $fname.'&nbsp;' .$middlename.'&nbsp;'.$lname.'&nbsp;'?></h1>
                <h1>Meter Number: <?php echo $mi;?></h1>
                <p>
                    <?php $date= date('y/m/d');
                         echo $date;?>
                <form method="post" enctype="multipart/form-data">
                    <table width="400" border="1">
                        <tr>
                            <!-- <input type="hidden" name="CustomerId" value="<?php echo $CustomerId; ?>" />
                                <input type="hidden" value="<?php echo $fname; ?>" name="fname" />
                                <input type="hidden" value="<?php echo $middlename; ?>" name="middlename" />
                                <input type="hidden" value="<?php echo $lname; ?>" name="lname" /> -->
                            <input type="hidden" name="date" value="<?php echo $date; ?>" />
                            <td width="250">Previous Reading:</td>
                            <td width="30"><input readonly type="text" name="prev" value="<?php echo $previous; ?>" />
                            <td width="30">M<sup>3</sup> </td>
                        </tr>
                        <tr>
                            <td>Present Reading:</td>
                            <td><input type="text" value="<?php echo $present; ?>" readonly name="pres" />
                            </td>
                            <td>M<sup>3</sup></td>
                        </tr>
                        <tr>
                            <td>Price/M<sup>3</sup></td>
                            <td><input type="number" name="price" step="0.01" value="<?php echo $totalPrice; ?>" />
                            </td>
                            <td>Birr</td>
                        </tr>
                        <tr>
                        </tr>
                    </table>
                    <br>
                    <br>
                    <td><button type="submit" name="submit"
                            class="btn btn-primary btn"><?php echo htmlspecialchars($lang['Calculate']);?></button>
                    </td>
                </form>
            </div>
            <script>
            $(document).ready(function() {
                var navoffeset = $(".header-main").offset().top;
                $(window).scroll(function() {
                    var scrollpos = $(window).scrollTop();
                    if (scrollpos > = navoffeset) {
                        $(".header-main").addClass("fixed");
                    } else {
                        $(".header-main").removeClass("fixed");
                    }
                });

            });
            </script>
            <!-- /script-for sticky-nav -->
            <!--inner block start here-->
            <div class="inner-block">

            </div>
            <!--inner block end here-->
            <!--copy rights start here-->
            <?php include('includes/footer.php');?>
            <!--COPY rights end here-->
        </div>
        <!-- </div> -->

    </div>
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

    // $('#register').submit(function(evt) {
    //     evt.preventDefault();
    //     window.history.back();
    // });
    </script>
    <!--js -->
    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/scripts.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- /Bootstrap Core JavaScript -->

</body>

</html>