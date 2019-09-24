<?php
session_start();
include_once 'dbconnect.php';

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['signup'])) {
    $name = mysqli_real_escape_string($db, $_POST['user']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $type = mysqli_real_escape_string($db, $_POST['type']);
    echo $name;
    echo $email;
    echo $type;
    if (!$error) {
        if(mysqli_query($db, "DELETE FROM login WHERE user='$name' AND email='$email'")) {
            $message = " USER DELETED SUCESSFULLY";
            echo "<script type='text/javascript'>alert('$message'); window.location.href = '/project/admin/deleteuser.php' </script>";
            //$successmsg = "Successfully Registered!" <a href='index.php'>Click here to Login</a>;
			 //header("location: /project/admin/deleteuser.php");
        } else {
            header("location: /project/index.php");
        }
    }
}
?>