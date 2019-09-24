<?php
session_start();
include_once 'dbconnect.php';

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['signup'])) {
    $name = mysqli_real_escape_string($db, $_POST['user']);
    $email = mysqli_real_escape_string($db, $_POST['email']);

    if (!$error) {
        if(mysqli_query($db, "UPDATE login SET email='$email' WHERE user='$name' AND email='$email'")) {
            //$successmsg = "Successfully Registered!" <a href='index.php'>Click here to Login</a>;
            $message = "SUCESSFULLY  SUBSCRIBE";
            echo "<script type='text/javascript'>alert('$message'); window.location.href = '/project/user/suscribe.php' </script>";

           
        } 
        //header("location: /project/user/suscribe.php");
        }
    }

?>