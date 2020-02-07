<?php
   include("config.php");
   error_reporting(E_ERROR | E_PARSE);
   if($_SERVER["REQUEST_METHOD"] == "POST") 
   {
      
      $myusername = mysqli_real_escape_string($db,$_POST['user']);
      $mypassword = mysqli_real_escape_string($db,$_POST['pass']);
      echo $myusername;
      $query=mysqli_query($db,"SELECT * FROM login");
      $a1=0;
      $a2=0; 
      $a3=0;
      /*if($row=mysqli_fetch_array($query)==0){
        header( "refresh:0.001;index.html" );
        //echo("Invalid Username or password ");
        echo '<script language="javascript">';
        echo 'alert("Invalid Username or password");';
        echo '</script>';
        die();
      }*/
	  while($row=mysqli_fetch_array($query))
	  {
		$db_user=$row["username"];
		$db_pass=$row["password"];
		$db_type=$row["type"];
        if($myusername==$db_user && $mypassword==$db_pass)
        {
            session_start();
			$_SESSION["user"]=$db_user;
			$_SESSION["type"]=$db_type;
            if($_SESSION["type"]=='admin')
            {
                $a1++;
				header("Location:users/admin/index.html");
			}
            else if($_SESSION["type"]=='student')
            {
                $a2++;
                header("Location:users/student/index.php");
            }
            else if($_SESSION["type"]=='faculty')
            {
                $a3++;
                header("Location:users/faculty/index.php");
            }
        }
      }
      if($a1==0 && $a2==0 && $a3==0)
      {
        echo '<script language="javascript">';
        echo 'alert("Username or Password is Worng")';
        echo '</script>';
      }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="loginasects/assets/images/header.png" type="image/x-icon">
    <meta name="description" content="Contact us page">
    <title>login</title>
    <link rel="stylesheet" href="loginasects/assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="loginasects/assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="loginasects/assets/theme/css/style.css">
    <link rel="stylesheet" href="loginasects/assets/mobirise/css/mbr-additional.css" type="text/css">
    <link rel="icon" type="image/png" href="loginasects/images/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="loginasects/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="loginasects/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="loginasects/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="loginasects/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="loginasects/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="loginasects/css/util.css">
    <link rel="stylesheet" type="text/css" href="loginasects/css/main.css">
</head>

<body>
    <section class="menu cid-ruOMQmoi9r" once="menu" id="menu1-z">
        <nav
            class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="menu-logo">
                <div class="navbar-brand">
                    <span class="navbar-caption-wrap"><a class="navbar-caption text-black display-5" href="login.php">
                            KLUNIVERSITY</a></span>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                    <li class="nav-item"><a class="nav-link link text-black display-4" href="index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link link text-black display-4" href="login.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link link text-black display-4" href="#">contact</a></li>
                </ul>
            </div>
        </nav>
    </section>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="loginasects/images/img-01.png" alt="IMG">
                </div>
                <form class="login100-form validate-form" action=" " method="post">
                    <span class="login100-form-title">
                        Login
                    </span>
                    <div class="wrap-input100 validate-input" data-validate="Valid username is required">
                        <input class="input100" type="text" name="user" id="user" placeholder="Username">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="pass" id="pass" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                    <div class="text-center p-t-12">
                        <span class="txt1">
                            Forgot
                        </span>
                        <a class="txt2" href="#">
                            Username / Password?
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <section class="cid-ruOT0L6rL9" id="footer5-14">
        <div class="container">
            <div class="media-container-row">
                <div class="col-md-3">
                    <div class="media-wrap">
                        <a href="#">
                        </a>
                        <h2><a href="#"></a><a href="#">KLUNIVERSITY</a></h2>
                    </div>
                </div>
                <div class="col-md-9">
                    <p class="mbr-text align-right links mbr-fonts-style display-7">
                        <a href="#" class="text-black">ABOUT</a> &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="#" class="text-black">TERMS</a> &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="login.php" class="text-black">LOGIN</a> &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="#" class="text-black">CONTACT</a>
                    </p>
                </div>
            </div>
            <div class="footer-lower">
                <div class="media-container-row">
                    <div class="col-md-12">
                        <hr>
                    </div>
                </div>
                <div class="media-container-row mbr-white">
                    <div class="col-md-6 copyright">
                        <p class="mbr-text mbr-fonts-style display-7">
                            © Copyright 2019 All Rights Reserved.
                        </p>
                    </div>
                    <div class="col-md-6">
                        <div class="social-list align-right">
                            <div class="soc-item">
                                <a href="#/" target="_blank">
                                    <span class="mbr-iconfont mbr-iconfont-social socicon-twitter socicon"></span>
                                </a>
                            </div>
                            <div class="soc-item">
                                <a href="#/" target="_blank">
                                    <span class="mbr-iconfont mbr-iconfont-social socicon-facebook socicon"></span>
                                </a>
                            </div>
                            <div class="soc-item">
                                <a href="#/" target="_blank">
                                    <span class="mbr-iconfont mbr-iconfont-social socicon-youtube socicon"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="loginasects/assets/web/assets/jquery/jquery.min.js"></script>
    <script src="loginasects/assets/popper/popper.min.js"></script>
    <script src="loginasects/assets/tether/tether.min.js"></script>
    <script src="loginasects/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="loginasects/assets/smoothscroll/smooth-scroll.js"></script>
    <script src="loginasects/assets/parallax/jarallax.min.js"></script>
    <script src="loginasects/assets/dropdown/js/nav-dropdown.js"></script>
    <script src="loginasects/assets/dropdown/js/navbar-dropdown.js"></script>
    <script src="loginasects/assets/touchswipe/jquery.touch-swipe.min.js"></script>
    <script src="loginasects/assets/theme/js/script.js"></script>
    <script src="loginasects/assets/formoid/formoid.min.js"></script>
    <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i
                class="mbr-arrow-up-icon mbr-arrow-up-icon-cm cm-icon cm-icon-smallarrow-up"></i></a></div>
</body>

</html>