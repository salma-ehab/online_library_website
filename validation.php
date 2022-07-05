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
