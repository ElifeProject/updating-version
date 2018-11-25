<?php
include_once "config/core.php";
include_once "config/database.php";
include_once "object/user.php";

$page_title = "login";
//include login cheker
$require_login =false;
include_once "login_checker.php";
//default  to false
$access_denied=false;

//if the login form is submitted
if($_POST){
    //email check
    $database = new Database();
    $db = $database->getConnection();

    //initializing object
    $user = new User($db);
    //check email $ password exist in database

    $user->email =$_POST['email'];
    $email_exists = $user->emailExists();

    //login validations
    if($email_exists && password_verify($_POST['password'] , $user->password) && $user->status==1 ){
        //if than set session
        $_SESSION['logged_in'] = true ;
        $_SESSION['user_id'] = $user->id ;
        $_SESSION['access_level'] = $user->access_level;
        $_SESSION['lastname'] = htmlspecialchars($user->firstname, ENT_QUOTES,'UTF-08');
        $_SESSION['lastname'] = $user->lastname;

        //if access-level ==admin than redirest to admin
        if($user->access_level =='Admin'){
            header("Location : {$home_url}admin/index.php?action = login_success");
        }
        //redirect to user section
        else{
             header("Location : {$home_url}index.php?action = login_success");
        }
    }
    //if username doesnot exist or password is wrong
    else{
        $access_denied =true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>E-Life</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        

        <!-- ***** Navbar Area ***** -->
        <div class="alazea-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="alazeaNav">

                        <!-- Nav Brand -->
                        <a href="index.php" class="nav-brand"><img src="img/logo.png" style="width: 100px;"></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>
                            
                            <!-- Navbar Start -->
                            <div class="classynav font-cursive">
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <!--<li><a href="index.php">About Us</a></li>-->
                                    <li><a href="#">Catalogue</a>
                                        <ul class="dropdown">
                                            <li><a href="E-Life_Computer_Accessories.php">Computer Peripherals</a></li>   
                                            <li><a href="Project_Accessories.php">Project Accessories</a></li>
                                            <li><a href="E-Life_Book_Store.php">Book Store</a></li>
                                            <li><a href="Stationary_Store.php">Stationary Store</a></li>
                                            <li><a href="E-Life_Grocery_Store.php">Grocery Store</a></li>           
                                            <li><a href="Men's_Fashion.php">Men's Fashion</a></li>
                                            <li><a href="Women's_Fashion.php">Women's Fashion</a></li> 
                                            <li><a href="E-Life_Special.php">E-Life Special</a></li>
                                        </ul>
                                    </li>
                                    
                                </ul>
                            </div>
                            <!-- Navbar End -->
                        </div>
                    </nav>
                    

                    <!-- Search Form -->
                    <div class="search-form">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type keywords &amp; press enter...">
                            <button type="submit" class="d-none"></button>
                        </form>
                        <!-- Close Icon -->
                        <div class="closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!--Add Alert message-->
    <!--when user tries to access a page where login is required ,it will generate a "please login" action that will used to show "please login to access this page" message-->
   
 <?php 
 //get ction value in url parameter to display corresponding prompt messages
$action =isset($_GET['action']) ? $_GET['action'] : "";

 //tell the user he is not yet logged in
if($action == 'not_yet_logged_in'){
    echo "<div class='alert alert_danger margin-top-40' role='alert'>Please Login.</div>";
}

//tell user to be login
else if($action =='please_login'){
    echo "<div class='alert alert-info'>
        <strong>Please login to access that page.</strong>
    </div>";
}

//tell the user if denied
if($access_denied){
     echo "<div class='alert alert_danger margin-top-40' role='alert'>
          Access Denied.<br/><br/>
          Your username or password maybe incorrect
    </div>";
}

 ?>
    
    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <div class="hero-post-slides owl-carousel">

            <!-- Single Hero Post -->
            <div class="single-hero-post bg-overlay">
                <!-- Post Image -->
                <div class="slide-img bg-img" style="background-image: url(img/bgsignup.jpg);"></div>
                <div class="container">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <!-- Post Content -->
                            <div class="hero-slides-content font-cursive">
                                <div class="row mt-30">
                                    <div class="col-md-8 col-sm-12">
                                        <form action='".htmlspecialchars($_SERVER["PHP_SELF"] ."' method="post" >
                                            <div class="form-group">
                                                <label for="name"><div class="font-clr">Email:</div></label>
                                                <input type="" class="form-control" id="" placeholder="Enter email" name="email" required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <label for="password"><div class="font-clr">Password:</div></label>
                                                <input type="password" class="form-control" id="" placeholder="Enter Password" name="password" required>
                                            </div>
                                            <br>
                                            <button name="submit" type="submit" class="btn btn-default">Log In</button>
                                            <!--<span><?php echo $error; ?></span>-->
                                        </form><br>
                                       <h4 class="font-clr">Don't have an account yet. <a href="SignUp.php"><h4 class="font-clr">Sign Up!</h4></a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->


    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area bg-img font-cursive" style="background-image: url(img/footer.jpg);">
        <!-- Main Footer Area -->
        <div class="main-footer-area">
            <div class="container">
                <div class="row">

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget">
                            <div class="widget-title">
                                <h5>E-Life</h5>
                            </div>
                            <p>Join Us</p>
                            <div class="social-info">
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget">
                            <div class="widget-title">
                                <h5>CONTACT</h5>
                            </div>

                            <div class="contact-information">
                                <p><span>Address:</span> UET, Lahore</p>
                                <p><span>Phone:</span> +92 322 4375787</p>
                                <p><span>Email:</span> elife@gmail.com</p>
                                <p><span>Open hours:</span> 24/7</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom Area -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="border-line"></div>
                    </div>
                    <!-- Copywrite Text -->
                    <div class="col-12 col-md-6">
                        <div class="copywrite-text">
                            <p>&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### All Javascript Files ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>

</html>