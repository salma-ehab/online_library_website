<?php

session_start();


$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
$connect = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
mysqli_select_db($connect,'heroku_1d9bb2bfffaebd9');

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
