<?php
session_start();
include_once 'dbconnect.php';

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['signup'])) {
    $name = mysqli_real_escape_string($db, $_POST['user']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $pass = mysqli_real_escape_string($db, $_POST['pass']);
    $type = mysqli_real_escape_string($db, $_POST['type']);
    echo $name;
    
    if (!$error) {
        if(mysqli_query($db, "INSERT INTO login(user,pass,email,type) VALUES('" . $name . "', '" .$pass . "', '" . $email . "', '" . $type . "')")) {
            $message = "NEW USER ADDED SUCESSFULLY";
            echo "<script type='text/javascript'>alert('$message'); window.location.href = '/project/admin/adduser.php' </script>";
            //$successmsg = "Successfully Registered!" <a href='index.php'>Click here to Login</a>;
			// header("location: /project/admin/adduser.php");
        } else {
           // header("location: /project/index.php");
        }
    }
}
?>