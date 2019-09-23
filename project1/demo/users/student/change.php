<?php
session_start();
include("config.php");

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['change'])) {

    $name = $_POST['user'];
    $confirm = $_POST['cp'];
    $confirm1 = $_POST['cp1'];
    if (!$error) {
        if(mysqli_query($db, "UPDATE login SET password='$confirm' WHERE username='$name'")) {
            //$successmsg = "Successfully Registered!" <a href='index.php'>Click here to Login</a>;
            $message = "password changed sucessfully";
            echo "<script type='text/javascript'>alert('$message'); window.location.href = 'changepassword.php' </script>";

        } else {
            echo("k uejrgh vjudfb");
            $message = "Username not found";
            echo "<script type='text/javascript'>alert('$message'); window.location.href = 'changepassword.php' </script>";
           // header("location: /project/index.php");
        }
    }
    /*if (!$error) {
        if(mysqli_query($db, "UPDATE login SET email='null' WHERE user='$name' AND email='$email'")) {
            //$successmsg = "Successfully Registered!" <a href='index.php'>Click here to Login</a>;
            $message = "SUCESSFULLY UN SUBSCRIBE";
            echo "<script type='text/javascript'>alert('$message'); window.location.href = '/project/user/suscribe.php' </script>";

        } else {
           // header("location: /project/index.php");
        }
    }*/
}
?>