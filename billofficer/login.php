<?php
   session_start();

   if(!empty($_POST['userName']) && !empty($_POST['password'])){
    
       $userName = trim($_POST["userName"]);
       $password = trim($_POST["password"]);
       $type = trim($_POST["type"]);
           include("dbcon.php");
           $sql = "select * from account where username='$userName' and password='$password' and type='$type'";
           $res = mysqli_query($con, $sql);
           if(mysqli_num_rows($res) > 0){
               $data = mysqli_fetch_array($res);
               $_SESSION['USERNAME'] = $data['username'];
               // goto home
               if($type == "administrator"){
                   header("location:admin/dashboard.php");
               } else if($type == "billofficer"){
                   header("location:billofficerpage.php");
               } else if($type == "customer"){
                   header("location:customerpage.php");
               } else if($type == "meterreader"){
                  header("location:meterreaderpage.php");
               }
           } 
           else{
             $variable = "incorrect Password or username.";
            echo "<script>alert('$variable');</script>";
            // echo "<script>document.getElementsById('
            
            // ').textContent = 'incorrect Password or username.';</script>";
           }
          
   }
   
   ?>
<html>

<head>
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
            height: 100vh !important;
        }
    }

    @media (min-width: 769px) {
        .gradient-custom-2 {
            border-top-right-radius: .3rem;
            border-bottom-right-radius: .3rem;
        }
    }
    </style>
</head>

<body>
    <?php include('includes/header.php');?>
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-6">
                    <div class="card rounded-3 text-black">
                        <div class="col-lg-10">
                            <div class="card-body p-md-5 mx-md-4">
                                <div class="text-center">
                                    <img src="images/ulg.png" width="200" height="180" alt="">
                                    <h4 class="mt-1 mb-5 pb-1">Login</h4>
                                </div>
                                <!-- FORM START -->
                                <form method="POST">
                                    <p id="error" class="text-danger"> </p>
                                    <div class="form-outline mb-4">
                                        <select class="form-select" name="type"></center>
                                            <option selected value="0">Select User Type </option>
                                            <option value="administrator">Admin</option>
                                            <option value="billofficer">Bill Officer</option>
                                            <option value="meterreader">meter reader</option>
                                            <option value="customer">Customer</option>
                                        </select>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example11">Username</label>
                                        <input type="text" name="userName" id="form2Example11" class="form-control"
                                            placeholder="Phone number or email address" />
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example22">Password</label>
                                        <input type="password" name="password" placeholder="Your password"
                                            id="form2Example22" class="form-control" />
                                    </div>
                                    <!-- LOGIN BTN -->
                                    <div class="text-center pt-1 mb-5 pb-1">
                                        <button name="loginBtn" onsubmit="return false"
                                            class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3"
                                            type="submit">Log in</button>
                                        <br> <a class="text-muted" href="#!">Forgot password?</a>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center pb-4">
                                        <!-- <p class="mb-0 me-2">Don't have an account?</p>
                                        <button type="button" class="btn btn-outline-danger">Create new</button> -->
                                    </div>
                                </form>
                                <!-- FORM END -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--- rupes ---->
    <?php include('includes/footer.php');?>
    <!-- signup -->
    <?php include('includes/signup.php');?>
    <!-- //signu -->
    <!-- signin -->
    <?php include('includes/signin.php');?>
    <!-- //signin -->
    <!-- write us -->
    <?php include('includes/write-us.php');?>
    <!-- //write us -->
</body>


</html>