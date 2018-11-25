<?php
include_once "config/core.php";

$page_title = "index";
//include login_checker
$require_login=true;
include_once "login_checker.php";

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
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="img/core-img/leaf.png" alt="">
        </div>
    </div>

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
                                    <?php
                                    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true  && $_SESSION['access_level'] == 'Customer'){
                                    ?>
                                        <ul>
                                           <li <?php echo $page_title=="Edit Profile" ? "class='active'" : "";?>>
                                               <a href ="#" class="dropdown-toggle" data-toggle=="dropdown" role="button" aria-expanded="false">
                                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span> 
                                                &nbsp;&nbsp;<?php echo $_SESSION['firstname']; ?>
                                                &nbsp;&nbsp;<span class="caret"></span>
                                                </a>
                                                <ul class = "dropdown-menu" role="menu">
                                                    <li><a href="<?php echo $home-url; ?> logout.php">Logout</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    }
                                    <li><a href="SignUp.php">Sign Up</a></li>
                                    <li><a href="login.php">Log In</a></li>
                                    <li><a href="">Cart</a></li>
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
<?php
$action=isset($_GET['action']) ? $_GET['action'] : "";
//if login was successfull
if($action=='login_success'){
    echo"<div class='alert alert-info'>";
        echo"<strong>Hello" . $_SESSION['firstname'] . ", Welcome back!</strong>";
    echo "<div>";
}
//if already logged in
else if($action=='already_logged_in'){
    echo"<div class='alert alert-info'>";
        echo"<strong>You are already logged in .</strong>";
    echo "<div>";
}

//content when logged in
 echo"<div class='alert alert-info'>";
        echo"<strong>Content when logged in will be here  .</strong>";
    echo "<div>";

echo "</div>";
?>

    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <div class="hero-post-slides owl-carousel">

            <!-- Single Hero Post -->
            <div class="single-hero-post bg-overlay">
                <!-- Post Image -->
                <div class="slide-img bg-img" style="background-image: url(img/3.jpg);"></div>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <!-- Post Content -->
                            <div class="hero-slides-content text-center font-cursive">
                                <h2>E-Life</h2>
                                <p>E-Life will provide best shipping facilities to the university students so that they can complete their semester projects with comfort and ease. E-Life will provide home spun to the students.</p>
                                <!-- <div class="welcome-btn-group">
                                    <a href="SignUp.php" class="btn alazea-btn mr-30">SIGN UP</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Hero Post -->
            <div class="single-hero-post bg-overlay">
                <!-- Post Image -->
                <div class="slide-img bg-img" style="background-image: url(img/2.jpg);"></div>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <!-- Post Content -->
                            <div class="hero-slides-content text-center font-cursive">
                                <h2>E-Life</h2>
                                <p>E-Life will provide best shipping facilities to the university students so that they can complete their semester projects with comfort and ease. E-Life will provide home spun to the students.</p>
                                <!-- <div class="welcome-btn-group">
                                    <a href="SignUp.php" class="btn alazea-btn mr-30">SIGN UP</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Hero Post -->
            <div class="single-hero-post bg-overlay">
                <!-- Post Image -->
                <div class="slide-img bg-img" style="background-image: url(img/7.jpg);"></div>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <!-- Post Content -->
                            <div class="hero-slides-content text-center font-cursive">
                                <h2>E-Life</h2>
                                <p>E-Life will provide best shipping facilities to the university students so that they can complete their semester projects with comfort and ease. E-Life will provide home spun to the students.</p>
                                <!-- <div class="welcome-btn-group">
                                    <a href="SignUp.php" class="btn alazea-btn mr-30">SIGN UP</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Hero Post -->
            <div class="single-hero-post bg-overlay">
                <!-- Post Image -->
                <div class="slide-img bg-img" style="background-image: url(img/4.jpg);"></div>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <!-- Post Content -->
                            <div class="hero-slides-content text-center font-cursive">
                                <h2>E-Life</h2>
                                <p>E-Life will provide best shipping facilities to the university students so that they can complete their semester projects with comfort and ease. E-Life will provide home spun to the students.</p>
                                <!-- <div class="welcome-btn-group">
                                    <a href="SignUp.php" class="btn alazea-btn mr-30">SIGN UP</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Hero Post -->
            <div class="single-hero-post bg-overlay">
                <!-- Post Image -->
                <div class="slide-img bg-img" style="background-image: url(img/5.jpg);"></div>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <!-- Post Content -->
                            <div class="hero-slides-content text-center font-cursive">
                                <h2>E-Life</h2>
                                <p>E-Life will provide best shipping facilities to the university students so that they can complete their semester projects with comfort and ease. E-Life will provide home spun to the students.</p>
                                <!-- <div class="welcome-btn-group">
                                    <a href="SignUp.php" class="btn alazea-btn mr-30">SIGN UP</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Hero Post -->
            <div class="single-hero-post bg-overlay">
                <!-- Post Image -->
                <div class="slide-img bg-img" style="background-image: url(img/6.jpg);"></div>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <!-- Post Content -->
                            <div class="hero-slides-content text-center font-cursive">
                                <h2>E-Life</h2>
                                <p>E-Life will provide best shipping facilities to the university students so that they can complete their semester projects with comfort and ease. E-Life will provide home spun to the students.</p>
                                <!-- <div class="welcome-btn-group">
                                    <a href="SignUp.php" class="btn alazea-btn mr-30">SIGN UP</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Hero Post -->
            <div class="single-hero-post bg-overlay">
                <!-- Post Image -->
                <div class="slide-img bg-img" style="background-image: url(img/1.jpg);"></div>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <!-- Post Content -->
                            <div class="hero-slides-content text-center font-cursive">
                                <h2>E-Life</h2>
                                <p>E-Life will provide best shipping facilities to the university students so that they can complete their semester projects with comfort and ease. E-Life will provide home spun to the students.</p>
                                <!-- <div class="welcome-btn-group">
                                    <a href="SignUp.php" class="btn alazea-btn mr-30">SIGN UP</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### About Us Area Start ##### -->
    <section class="our-services-area bg-gray section-padding-100" id="AboutUs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center font-cursive">
                        <h2>ABOUT US</h2>
                        <h5 class="font-cursive justify-content-between">
                            Being engineering students, we have to rush towards the market when we have to submit out projects and deadline is just around the corner. The purpose of the project is to provide best shipping facilities specifically in engineering domain. With zero delay time, E-Life will deliver all the equipment you desire on your doorstep. E-Life will cater home spun to the students as this is the major goal behind the development of the project. 
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### About Us Area End ##### -->

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