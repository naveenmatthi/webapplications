<?php
  include("config.php");
  session_start();
  $data=$_SESSION["user"];
	$query=mysqli_query($db,"SELECT degree FROM studentdata WHERE regdno = '$data'");
	$query2=mysqli_query($db,"SELECT joiningdate FROM studentdata WHERE regdno = '$data'");
	while ($row = mysqli_fetch_array($query))
	{
		$cou=$row['degree'];//degree
	}
	while ($row1 = mysqli_fetch_array($query2))
	{
		$cou1=$row1['joiningdate'];//joiningdate
	}
	$year = strtok($cou1, '-');
	$str1='Btech';
	$str2='Mtech';
	$cc=strcasecmp($str1,$cou);
	$cc1=strcasecmp($str2,$cou);
	$inte = (int)$year;
	$t=gettype($year);
	$t1=$year;
	if($cc == 0)
	{
		$t1=$year+4;
		
	}
	else if($cc1 == 0){
		$t1=$year+2;
  }
  $query3=mysqli_query($db,"SELECT * FROM studentdata WHERE regdno = '$data'");
  while ($row3 = mysqli_fetch_array($query3))
	{
    $regdno=$row3['regdno'];
    $surnmae=$row3['surname'];
    $firstname=$row3['firstname'];
    $lastname=$row3['lastname'];
    $dateofbirth=$row3['dob'];
    $gender=$row3['gender'];
    //$regdno=$row3['regdno'];
    $department=$row3['department'];
    $address=$row3['address'];
  }
  $age=date_diff(date_create($dateofbirth), date_create('today'))->y;
  echo $age;
  echo $regdno;
  echo $surnmae;
  echo $firstname;
  echo $lastname;
  echo $gender;
  echo $department;
  echo $address;
  echo $cou1;
  echo $cou;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!--used to show image icon-->
  <link rel="shortcut icon" href="ascets/dist/img/header.jpg" type="image/x-icon">
  <title>KLU | LMS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="ascets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="ascets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="ascets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="ascets/dist/css/al.min.css">
  <!--  Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="ascets/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="ascets/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="ascets/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="ascets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="ascets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="ascets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">lms</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>KLU</b> || lms</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="ascets/dist/img/avatar.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION["user"]; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="ascets/dist/img/avatar.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION["user"]; ?> - Student
                  <small><?php echo $cou?>(<?php echo $year?> - <?php echo $t1?>)</small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="ascets/dist/img/avatar.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION["user"]; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"> NAVIGATION</li>
		<li>
          <a href="home.php">
            <i class="fa fa-book"></i> <span>Home</span>
            <!--<span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>-->
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Account</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="profile.php"><i class="fa fa-circle-o"></i> profile</a></li>
            <li><a href="editprofile.php"><i class="fa fa-circle-o"></i> Edit Profile</a></li>
			<li><a href="changepassword.php"><i class="fa fa-circle-o"></i> Change Password</a></li>
          </ul>
        </li>
       
        <li>
          <a href="attendance.php">
            <i class="fa fa-share"></i> <span>Attendance Register</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i>
            <span>Academic Fee Details</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="feehistory.php"><i class="fa fa-circle-o"></i> Fee payment hsitory</a></li>
            <li><a href="payfee.php"><i class="fa fa-circle-o"></i> Pay Fee</a></li>
          </ul>
        </li>
        <li>
          <a href="registeredcourses.php">
            <i class="fa fa-share"></i> <span>Registered Courses</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li>
          <a href="marks.php">
            <i class="fa fa-folder"></i> <span>Marks</span>
            
          </a>
          
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        PROFILE
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    
    <hr>

<div class="col-sm-9">
      <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
          <li><a data-toggle="tab" href="#courses">course</a></li>
          <!---<li><a data-toggle="tab" href="#settings">Menu 2</a></li>-->
        </ul>

        
    <div class="tab-content">
      <div class="tab-pane active" id="home">
          <hr>
            <form class="form" action="##" method="post" id="registrationForm">
                <div class="form-group">
                    
                    <div class="col-xs-6">
                        <label for="first_name"><h4>First name</h4></label>
                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
                    </div>
                </div>
                <div class="form-group">
                    
                    <div class="col-xs-6">
                      <label for="last_name"><h4>Last name</h4></label>
                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
                    </div>
                </div>
    
                <div class="form-group">
                    
                    <div class="col-xs-6">
                        <label for="phone"><h4>Phone</h4></label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                    </div>
                </div>
    
                <div class="form-group">
                    <div class="col-xs-6">
                       <label for="mobile"><h4>Mobile</h4></label>
                        <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
                    </div>
                </div>
                <div class="form-group">
                    
                    <div class="col-xs-6">
                        <label for="email"><h4>Email</h4></label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                    </div>
                </div>
                <div class="form-group">
                    
                    <div class="col-xs-6">
                        <label for="email"><h4>Location</h4></label>
                        <input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location">
                    </div>
                </div>
                <div class="form-group">
                    
                    <div class="col-xs-6">
                        <label for="password"><h4>Password</h4></label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                    </div>
                </div>
                <div class="form-group">
                    
                    <div class="col-xs-6">
                      <label for="password2"><h4>Verify</h4></label>
                        <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                    </div>
                </div>
                <div class="form-group">
                     <div class="col-xs-12">
                          <br>
                          <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                           <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                      </div>
                </div>
          </form>
        
        <hr>
        
       </div><!--/tab-pane-->
       <div class="tab-pane" id="courses">
         
         <h2></h2>
         
         <hr>
            <form class="form" action="##" method="post" id="registrationForm">
                <div class="form-group">
                    
                    <div class="col-xs-6">
                        <label for="first_name"><h4>First name</h4></label>
                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
                    </div>
                </div>
                <div class="form-group">
                    
                    <div class="col-xs-6">
                      <label for="last_name"><h4>Last name</h4></label>
                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
                    </div>
                </div>
    
                <div class="form-group">
                    
                    <div class="col-xs-6">
                        <label for="phone"><h4>Phone</h4></label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                    </div>
                </div>
    
                <div class="form-group">
                    <div class="col-xs-6">
                       <label for="mobile"><h4>Mobile</h4></label>
                        <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
                    </div>
                </div>
                <div class="form-group">
                    
                    <div class="col-xs-6">
                        <label for="email"><h4>Email</h4></label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                    </div>
                </div>
                <div class="form-group">
                    
                    <div class="col-xs-6">
                        <label for="email"><h4>Location</h4></label>
                        <input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location">
                    </div>
                </div>
                <div class="form-group">
                    
                    <div class="col-xs-6">
                        <label for="password"><h4>Password</h4></label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                    </div>
                </div>
                <div class="form-group">
                    
                    <div class="col-xs-6">
                      <label for="password2"><h4>Verify</h4></label>
                        <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                    </div>
                </div>
                <div class="form-group">
                     <div class="col-xs-12">
                          <br>
                          <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                           <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                      </div>
                </div>
          </form>
         
       </div><!--/tab-pane-->
       <div class="tab-pane" id="settings">
          
           
            <hr>
            <form class="form" action="##" method="post" id="registrationForm">
                <div class="form-group">
                    
                    <div class="col-xs-6">
                        <label for="first_name"><h4>First name</h4></label>
                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
                    </div>
                </div>
                <div class="form-group">
                    
                    <div class="col-xs-6">
                      <label for="last_name"><h4>Last name</h4></label>
                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
                    </div>
                </div>
    
                <div class="form-group">
                    
                    <div class="col-xs-6">
                        <label for="phone"><h4>Phone</h4></label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                    </div>
                </div>
    
                <div class="form-group">
                    <div class="col-xs-6">
                       <label for="mobile"><h4>Mobile</h4></label>
                        <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
                    </div>
                </div>
                <div class="form-group">
                    
                    <div class="col-xs-6">
                        <label for="email"><h4>Email</h4></label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                    </div>
                </div>
                <div class="form-group">
                    
                    <div class="col-xs-6">
                        <label for="email"><h4>Location</h4></label>
                        <input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location">
                    </div>
                </div>
                <div class="form-group">
                    
                    <div class="col-xs-6">
                        <label for="password"><h4>Password</h4></label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                    </div>
                </div>
                <div class="form-group">
                    
                    <div class="col-xs-6">
                      <label for="password2"><h4>Verify</h4></label>
                        <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                    </div>
                </div>
                <div class="form-group">
                     <div class="col-xs-12">
                          <br>
                          <button class="btn btn-lg btn-success pull-right" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                           <!--<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>-->
                      </div>
                </div>
          </form>
        </div>
         
        </div><!--/tab-pane-->
    </div><!--/tab-content-->

  </div><!--/col-9-->
</div><!--/row-->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    
    <strong>Copyright &copy; 2019<a href="#"></a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="ascets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="ascets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="ascets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="ascets/bower_components/raphael/raphael.min.js"></script>
<script src="ascets/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="ascets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="ascets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="ascets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="ascets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="ascets/bower_components/moment/min/moment.min.js"></script>
<script src="ascets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="ascets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="ascets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="ascets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="ascets/bower_components/fastclick/lib/fastclick.js"></script>
<!--  App -->
<script src="ascets/dist/js/al.min.js"></script>
<!--  dashboard demo (This is only for demo purposes) -->
<script src="ascets/dist/js/pages/dashboard.js"></script>
<!--  for demo purposes -->
<script src="ascets/dist/js/demo.js"></script>
</body>
</html>
