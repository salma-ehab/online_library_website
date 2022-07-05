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

$title = $_POST['title'];
$author = $_POST['author'];
$price = $_POST['price'];
$totalBooks = $_POST['totalBooks'];
$description = $_POST['description'];
$genre = $_POST['genre'];
$stars = $_POST['stars'];

$titleQuery = "select * from bookstable where title = '$title'";
$resultTitle = mysqli_query($connect,$titleQuery);
$numTitle = mysqli_num_rows($resultTitle);

if ($numTitle== 0)
{
   $sign = "insert into bookstable (title,author,price,total,description,genre,stars) values ('$title','$author','$price','$totalBooks','$description','$genre','$stars')";
   mysqli_query($connect,$sign);
   header('location:addBook.php');
}

else
{
   echo("<script >alert('The book already exists')</script>");
   echo("<script>window.location.href = 'addBook.php';</script>");
}
?>
