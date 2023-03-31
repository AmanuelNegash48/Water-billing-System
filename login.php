<?php
   session_start();

   if(!empty($_POST['userName']) && !empty($_POST['password'])){
       $userName = trim($_POST["userName"]);
       // Hash password
       $hashed_password = md5($_POST['password']);
           include("dbcon.php");
        
           $sql = "select * from account where username='$userName' and userpassword='$hashed_password'"; //  union select * from account where username='$userName' and userpassword='$password'
           $res = mysqli_query($con, $sql);
           if(mysqli_num_rows($res) > 0){
               $data = mysqli_fetch_array($res); // fetch and store the result
               $_SESSION['USERNAME'] = $data['username']; // declare global variable 'USERNAME'
               $_SESSION['ID'] = $data['id']; // declare global variable 'ID'
               $type = trim($data["usertype"]); 
               
               if($data['status'] == 0){
                $variable = "Your Account is diasabled...";
                // echo "<script>alert('$variable');</script>";
                $err = $variable;
                // header("location:login.php");
               }else{
                    // goto home
                    if($type == "administrator"){
                        header("location:admin/dashboard.php");
                    } else if($type == "billofficer"){
                        header("location:billofficer/dashboard.php");     
                    } else if($type == "customer"){
                        header("location:customer/dashboard.php");
                    } else if($type == "meterreader"){
                    header("location:meterreader/dashboard.php");
                    }
                    else if($type == "banker"){
                    header("location:bank/dashboard.php");
                    }
               }
           } 
           else{
             $variable = "incorrect Password or username.";
            // echo "<script>alert('$variable');</script>";
            $err = $variable;

         
           }
          
   }
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
            height: 44vh !important;
        }
    }

    @media (min-width: 769px) {
        .gradient-custom-2 {
            border-top-right-radius: .3rem;
            border-bottom-right-radius: .3rem;
        }
    }
    
    .errorWrap {
        padding: 10px;
        margin: 0 0 20px 0;
        background: #fff;
        border-left: 4px solid #dd3d36;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
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
<?php include('includes/header.php');?>

<body style="padding-right: 10% ;padding-left: 10%; background-color: white;">

<br><br><br>
   
    <?php if(isset($err)){?><div class="errorWrap"><strong>ERROR</strong>: <?php echo htmlentities($err); ?> </div>
    <?php }?>
    <section  class="h-0 gradient-form" style="background-color: white;">
        <div class="container py-1 h-10">
            <div class="row d-flex justify-content-center align-items-center h-20">
                <div class="col-xl-6">
                    <div class="card rounded-3 text-black">
                        <div class="col-lg-10">
                            <div class="card-body p-md-3 mx-md-2">
                                
                                <!-- FORM START -->
                                <form method="POST">

                                    <b>
                                        <p id="error" class="text-danger"> </p>
                                        <div class="form-outline mb-2" style="padding-right: 30% ;padding-left: 30%; ">
                                            <label class="form-label" for="form2Example11">
                                            <?php echo htmlspecialchars($lang['User name']);?>

                                            </label>
                                            <center>
                                                <input type="text" name="userName" id="form2Example11"
                                                    class="form-control" placeholder="Enter Username" />
                                            </center>
                                        </div><br>
                                        <br>
                                        <div class="form-outline mb-2" style="padding-right: 30% ;padding-left: 30%;">
                                            <label class="form-label" for="form2Example22">
                                            <?php echo htmlspecialchars($lang['Password']);?>
                                            </label>
                                            <input type="password" name="password" placeholder="Enter password"
                                                id="form2Example22" class="form-control" />
                                        </div>
                                        <br>
                                        <br>
                                        <!-- LOGIN BTN -->
                                        <div class="text-center pt-1 mb-3 pb-1"
                                            style="padding-right: 30% ;padding-left: 30%;">
                                            <button name=" loginBtn" onsubmit="return false"
                                                class="btn btn-primary btn-block fa-lg gradient-custom-0 mb-3"
                                                type="submit"><?php echo htmlspecialchars($lang['Login']);?>
                                            </button>

                                        </div>
                                        <br>

                                        <center>
                                            <a href="forgot.php">
                                                <?php echo htmlspecialchars($lang['Forgot password?']);?></a>
                                            <div class="d-flex align-items-center justify-content-center pb-0">

                                                <p class="mb-0 me-2">Don't have an account?</p> <a href="signup.php">
                                                    <button type="button" class="btn btn-outline-danger">
                                                        <?php echo htmlspecialchars($lang['To register']);?></button>
                                            </div>

                                        </center>
                                </form>

                                <!-- FORM END -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include('includes/footer.php');?>
