<?php

session_start();

$connect = mysqli_connect('localhost','root','');
mysqli_select_db($connect,'librarydb');

$username = $_POST['uname'];
$_SESSION["uname"] = $username;
$password = $_POST['password'];

$s = "select * from usertable where username = '$username' && password = '$password'";
$result = mysqli_query($connect,$s);
$row =  mysqli_fetch_row($result);
$num = mysqli_num_rows($result);

if ($num == 1 && $row[6] =="user")
{
    header('location:userhomepage.php');
}

else if ($num == 1 && $row[6] =="admin") 
{
    header('location:adminhomepage.php');
}

else
{   echo("<script >alert('Something went wrong. Check that the username and password entered are correct')</script>");
    echo("<script>window.location.href = 'Login.php';</script>");
}
?>
