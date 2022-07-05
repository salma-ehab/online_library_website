<?php

session_start();

$connect = mysqli_connect('localhost','root','');
mysqli_select_db($connect,'librarydb');

$email = $_POST['email'];
$password = $_POST['password'];

$sEmail = "select * from usertable where email = '$email'";
$resultEmail = mysqli_query($connect,$sEmail);
$numEmail = mysqli_num_rows($resultEmail);


if ($numEmail == 1)
{
    $sign = "UPDATE usertable SET password='$password' WHERE email='$email'";
    mysqli_query($connect,$sign);
    header('location:Login.php');
}

else
{   echo("<script >alert('Something went wrong. Check that the email is correct')</script>");
    echo("<script>window.location.href = 'forgetPassword.php';</script>");
}
?>
