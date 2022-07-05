<?php
session_start();

$connect = mysqli_connect('localhost','root','');
mysqli_select_db($connect,'librarydb');

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
