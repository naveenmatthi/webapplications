<?php
  include("config.php");
  session_start();
  $data=$_SESSION["user"];
	$query=mysqli_query($db,"SELECT degree FROM studentdata WHERE regdno = '$data'");
	$query2=mysqli_query($db,"SELECT joiningdate FROM studentdata WHERE regdno = '$data'");  
	while ($row = mysqli_fetch_array($query))
	{
		$cou=$row['degree'];
	}
	while ($row1 = mysqli_fetch_array($query2))
	{
		$cou1=$row1['joiningdate'];
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
    $email=$row3['email'];
  }
  /*$age=date_diff(date_create($dateofbirth), date_create('today'))->y;
  echo $age;
  echo $regdno;
  echo $surnmae;
  echo $firstname;
  echo $lastname;
  echo $gender;
  echo $department;
  echo $address;
  echo $cou1;
  echo $cou;*/
  $error = false;
  if (isset($_POST['submit'])) 
  {
    if (($_FILES['profile']['name']!="")){
      // Where the file is going to be stored
       $target_dir = "uploads/";
       $file = $_FILES['profile']['name'];
       $path = pathinfo($file);
       $filename = $path['filename'];
       $ext = $path['extension'];
       $temp_name = $_FILES['profile']['tmp_name'];
       $path_filename_ext = $target_dir.$filename.".".$ext;
       
      // Check if file already exists
     
       move_uploaded_file($temp_name,$path_filename_ext);
       
    }
    $regdno1 = $_POST['reg'];
    $surname1 = $_POST['sur'];
    $firstname1 = $_POST['nam'];
    $department1 = $_POST['dep'];;
    $gender1 = $_POST['gen'];
    $dateofbirth1 = $_POST['dob'];
    $degree1 = $_POST['de'];
    $address1 = $_POST['add'];
    $joiningdate = $_POST['join'];
    echo $regdno1;
    $email1=$_POST['email'];
    if(mysqli_query($db, "UPDATE studentdata SET surname='$surname1',firstname='$firstname1',dob='$dateofbirth1',email='$email1',gender='$gender1',degree='$degree1',department='$department1',address='$address1',joiningdate='$joiningdate' WHERE regdno='$regdno1'")) 
    {
      //$successmsg = "Successfully Registered!" <a href='index.php'>Click here to Login</a>;
      $message = "data  changed sucessfully";
      echo "<script type='text/javascript'>alert('$message'); window.location.href = 'editprofile.php' </script>";
    }
    else 
    {
      echo("k uejrgh vjudfb");
      $message = "Username not found";
      echo "<script type='text/javascript'>alert('$message'); window.location.href = 'editprofile.php' </script>";
           // header("location: /project/index.php");
    }
  }
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
  <link rel="stylesheet" href="ascets/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="ascets/dist/css/al.min.css">
  <!--  Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
       <!-- daterange picker -->
  <link rel="stylesheet" href="ascets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="ascets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
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
        EDIT PROFILE
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
<!-- Default box -->
      <form name="form" method="post" action =" " enctype="multipart/form-data">
        <div class="box">
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="register number">Register Number</label>
                    <input type="text" class="form-control" name="reg" id="exampleInputEmail1" value="<?php echo $regdno;?>">
                </div>
              <!-- /.form-group -->
              <div class="form-group">
                
                <label for="surname" >SurName</label>
                  <input type="text" class="form-control"  name="sur" id="exampleInputEmail1" value="<?php echo $surnmae;?>">
              </div>
              <div class="form-group">
              <label for="name">Name</label>
                  <input type="text" class="form-control" name="nam" id="exampleInputEmail1" value="<?php echo $firstname;?>">
              </div>
              
              <div class="form-group">
              <label for="department">Department</label>
                  <input type="text" class="form-control" name="dep" id="exampleInputEmail1" value="<?php echo $department;?>">
              </div>
              <div class="form-group">
              <label for="department">Email</label>
                  <input type="text" class="form-control" name="email" id="exampleInputEmail1" value="<?php echo $email;?>">
              </div>
              <div class="form-group">
                  <label for="profilepicture">Profile Picture</label>
                  <input type="file" id="profilepicture" name="profile">

                  <p class="help-block">Example block-level help text here.</p>
                </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
              <label for="gender">Gender</label>
                  <input type="text" class="form-control" name="gen" id="exampleInputEmail1" value="<?php echo $gender;?>">
              </div>
              <div class="form-group">
                <label for="dateofbirth">Date Of Birth</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="datepicker" >
                  </div>   
              <!--<input type="text" class="form-control" name="dob" id="exampleInputEmail1"  value="" -->
              </div>
              <!-- /.form-group -->
              <div class="form-group">
              <label for="degree">Degree</label>
                  <input type="text" class="form-control" name="de" id="exampleInputEmail1" readonly value="<?php echo $cou;?>">
              </div>
              <!-- /.form-group -->
              
              <div class="form-group">
                  <label>Address</label>
                  <textarea class="form-control" name="add" rows="2" ><?php echo $address;?></textarea>
                </div>
              <div class="form-group">
              <label for="joining date">Joining date</label>
                  <input type="text" name="join" class="form-control" readonly id="exampleInputEmail1" value="<?php echo $cou1;?>">
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          </div>
          <div class="box-footer">
              <button type="submit" class="btn btn-default">Reset</button>
            <button type="submit" name="submit" class="btn btn-info pull-right" id="submit">submit</button>
          </div>
  
        </div>

      </form>
    </section>
  </div>
    <!-- /.content -->
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



<script src="ascets/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="ascets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="ascets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="ascets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="ascets/bower_components/moment/min/moment.min.js"></script>
<script src="ascets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="ascets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="ascets/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="ascets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="ascets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="ascets/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="ascets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="ascets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="ascets/dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY hh:mm A' }})
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
</body>
</html>
