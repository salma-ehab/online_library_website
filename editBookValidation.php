<?php
session_start();

$connect = mysqli_connect('localhost','root','');
mysqli_select_db($connect,'librarydb');

$title = $_POST['title'];
$author = $_POST['author'];
$price = $_POST['price'];
$stock = $_POST['totalBooks'];
$description= $_POST['description'];
$genre = $_POST['genre'];
$stars= $_POST['stars'];
$prevBookTitle=$_GET['prevBookTitle'];


$bookQuery = "select * from bookstable where title = '$prevBookTitle'";
$resultBook = mysqli_query($connect,$bookQuery);
$row =  mysqli_fetch_row($resultBook);

if ($title != $prevBookTitle)
{
    $newBookQuery = "select * from bookstable where title = '$title'";
    $resultNewBook = mysqli_query($connect,$newBookQuery);
    $numNewBook = mysqli_num_rows($resultNewBook);

    if ($numNewBook != 0)
    {
        echo("<script >alert('The title of the book already exists')</script>");
        echo("<script>window.location.href = 'editBook.php?selectedBookTitle=$prevBookTitle';</script>");
    }
}

$sign = "UPDATE bookstable SET title='$title', author='$author', price='$price', total = '$stock', description ='$description',genre ='$genre',stars ='$stars' WHERE title='$prevBookTitle'";
mysqli_query($connect,$sign);
header('location:bookList.php');
?>
