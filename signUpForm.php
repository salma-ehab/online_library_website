<?php
session_start();

$connect = mysqli_connect('localhost','root','');
mysqli_select_db($connect,'librarydb');

$name = $_POST['name'];
$username = $_POST['uname'];
$email = $_POST['email'];
$address = $_POST['address'];
$telephone = $_POST['Tnumber'];
$password = $_POST['password'];

$usernameQuery = "select * from usertable where username = '$username'";
$resultUsername = mysqli_query($connect,$usernameQuery);
$numUsername = mysqli_num_rows($resultUsername);

$emailQuery = "select * from usertable where email = '$email'";
$resultEmail = mysqli_query($connect,$emailQuery);
$numEmail = mysqli_num_rows($resultEmail);

if ($numUsername == 0 && $numEmail == 0)
{
   $sign = "insert into usertable (name,username,email,address,telephone,password,type) values ('$name','$username','$email','$address','$telephone','$password','user')";
   mysqli_query($connect,$sign);
   header('location:Login.php');
}

else if ($numUsername != 0)
{
   echo("<script >alert('The username already exists')</script>");
   echo("<script>window.location.href = 'SignUp.php';</script>");
}

else if ($numEmail != 0)
{
  echo("<script >alert('The email already exists')</script>");
  echo("<script>window.location.href = 'SignUp.php';</script>");
}
?>
