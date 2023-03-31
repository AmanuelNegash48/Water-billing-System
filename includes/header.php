<?php include('./lang.php')?>
<style>
.contain {
    display: flex;
    padding: 5px 0;
    margin-top: 10px;
    justify-content: space-between;
}

.login-btn {
    padding: 7px 30px;
    border-radius: 20px;
    background: #ffe;
    color: black;
    font-weight: 900;
}

.signup-btn {
    padding: 7px 30px;
    border-radius: 20px;
    background: blue;
    color: white;
    font-weight: 900
}
.image {
  height: 10vmin;
  pointer-events: none;
}

@media (prefers-reduced-motion: no-preference) {
  .image {
    animation: App-logo-spin infinite 1s linear;
  }
}
@keyframes App-logo-spin {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(7deg);
  }
}

<?php include('css/style.css');
?>
</style>

<div class="contain">
    <img  class="image" src="Images/download.jpg" alt="" width="100" height="100" style="margin-right: 100px; border-radius:100%;">

    <!-- <nav class="navigation">
            <ul class="navbar navbar-default"> -->
    <b><a href="index.php"><?php echo htmlspecialchars($lang['Home']);?></a></b>
    <a style="color: black;" href="contact.php"><?php echo htmlspecialchars($lang['Contact']);?></a>
    <a style="color: black;" href="about.php"><?php echo htmlspecialchars($lang['About Us']);?></a>

    <a href="login.php"><button class="login-btn"><?php echo htmlspecialchars($lang['Login']);?></button></a>

    <a href="signup.php"><button class="signup-btn"><?php echo htmlspecialchars($lang['Register']);?></button></a>


    <div class="dropdown ">
        <!-- <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"> -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">

            <?php echo htmlspecialchars($lang['Language']);?>
        </a>
        <ul class="dropdown-menu drp-mnu">
            <li>
                <a href="index.php?lang=li" style="color:DodgerBlue; font-size:20px; font-weight:300"
                    class="dropdown-item">English </a>
            </li>
            <li>
                <a href="index.php?lang=it" style="color:DodgerBlue; font-size:20px; font-weight:300"
                    class="dropdown-item">አማርኛ</a>
            </li>
            <li>
                <a href="index.php?lang=en" style="color:DodgerBlue; font-size:20px; font-weight:300"
                    class="dropdown-item">Afaan Oromoo</a>
            </li>
        </ul>
       
    </div>
</div>


<br>