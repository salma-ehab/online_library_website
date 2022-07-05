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

$name = $_POST['name'];
$username = $_POST['uname'];
$email = $_POST['email'];
$address = $_POST['address'];
$telephone = $_POST['Tnumber'];
$password = $_POST['password'];
$userType = $_POST['userType'];

$usernameQuery = "select * from usertable where username = '$username'";
$resultUsername = mysqli_query($connect,$usernameQuery);
$numUsername = mysqli_num_rows($resultUsername);

$emailQuery = "select * from usertable where email = '$email'";
$resultEmail = mysqli_query($connect,$emailQuery);
$numEmail = mysqli_num_rows($resultEmail);

if ($numUsername == 0 && $numEmail == 0)
{
   $sign = "insert into usertable (name,username,email,address,telephone,password,type) values ('$name','$username','$email','$address','$telephone','$password','$userType')";
   mysqli_query($connect,$sign);
   header('location:addUser.php');
}

else if ($numUsername != 0)
{
   echo("<script >alert('The username already exists')</script>");
   echo("<script>window.location.href = 'addUser.php';</script>");
}

else if ($numEmail != 0)
{
  echo("<script >alert('The email already exists')</script>");
  echo("<script>window.location.href = 'addUser.php';</script>");
}
?>
