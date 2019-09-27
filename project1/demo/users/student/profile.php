<?php
  include("config.php");
  session_start();
  $data=$_SESSION["user"];
	$query=mysqli_query($db,"SELECT degree FROM studentdata WHERE regdno = '$data'");
  $query2=mysqli_query($db,"SELECT joiningdate FROM studentdata WHERE regdno = '$data'");
  $query3=mysqli_query($db,"SELECT * FROM studentdata WHERE regdno = '$data'");
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
  while ($row3 = mysqli_fetch_array($query3))
	{
    $regdno=$row3['regdno'];
    $surnmae=$row3['surname'];
    $firstname=$row3['firstname'];
    $lastname=$row3['lastname'];
    $dateofbirth=$row3['dob'];
    $gender=$row3['gender'];
    $department=$row3['department'];
    $address=$row3['address'];
    $email=$row3['email'];
    $newdate = date("m/d/Y", strtotime($dateofbirth));
  }
  $age=date_diff(date_create($dateofbirth), date_create('today'))->y;
  
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="ascets/dist/img/header.jpg" type="image/x-icon">
  <title>KLU | LMS</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="ascets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="ascets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="ascets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="ascets/dist/css/al.min.css">
  <link rel="stylesheet" href="ascets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="ascets/bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="ascets/bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="ascets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="ascets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="ascets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <a href="#" class="logo">
      <span class="logo-mini">lms</span>
      <span class="logo-lg"><b>KLU</b> || lms</span>
    </a>
    <nav class="navbar navbar-static-top">
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
              <li class="user-header">
                <img src="ascets/dist/img/avatar.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION["user"]; ?> - Student
                  <small><?php echo $cou?>(<?php echo $year?> - <?php echo $t1?>)</small>
                </p>
              </li>
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
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
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
  </aside>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        PROFILE
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profile</li>
      </ol>
    </section>
    <section class="content">
<div class="box">
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover" >
                <tr>
                  <td>Register number</td>
                  <td><?php echo $regdno; ?></td>
                </tr>
                <tr>
                  <td>Name</td>
                  <td><?php echo $surnmae; ?><?php echo $firstname; ?></td>
                </tr>
                <tr>
                  <td>Email address</td>
                  <td><?php echo $email; ?></td>
                </tr>
                <tr>
                  <td>Date Of Birth</td>
                  <td><?php echo $dateofbirth; ?></td>
                </tr>
                <tr>
                  <td>Degree</td>
                  <td><?php echo $cou; ?></td>
                </tr>
                <tr>
                  <td>Department</td>
                  <td><?php echo $department; ?></td>
                </tr>
                <tr>
                  <td>Age</td>
                  <td><?php echo $age; ?></td>
                </tr>
                <tr>
                  <td>Adderss</td>
                  <td><?php echo $address; ?></td>
                </tr>
                <tr>
                  <td>Joining date</td>
                  <td><?php echo $cou1; ?></td>
                </tr>
               
              </table>
            </div>
          </div>
    </section>
  </div>
  <footer class="main-footer">
    <strong>Copyright &copy; 2019<a href="#"></a>.</strong> All rights reserved.
  </footer>
<script src="ascets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="ascets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="ascets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="ascets/bower_components/raphael/raphael.min.js"></script>
<script src="ascets/bower_components/morris.js/morris.min.js"></script>
<script src="ascets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="ascets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="ascets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="ascets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<script src="ascets/bower_components/moment/min/moment.min.js"></script>
<script src="ascets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="ascets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="ascets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="ascets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="ascets/bower_components/fastclick/lib/fastclick.js"></script>
<script src="ascets/dist/js/al.min.js"></script>
<script src="ascets/dist/js/pages/dashboard.js"></script>
<script src="ascets/dist/js/demo.js"></script>
</body>
</html>
