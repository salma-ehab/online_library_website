<?php
session_start();

$connect = mysqli_connect('localhost','root','');
mysqli_select_db($connect,'librarydb');

$username = $_SESSION['uname'];
$bookTitle= $_GET["viewedBookTitle"];
$actualDate=date("Y-m-d");

$bookQuery = "select * from bookstable where title = '$bookTitle'";
$bookResult = mysqli_query($connect,$bookQuery);
$bookRow =  mysqli_fetch_row($bookResult);
$newTotal = $bookRow[3] + 1;


$sign = "UPDATE borrowed SET actualReturnDate='$actualDate' WHERE uname = '$username' && bookTitle='$bookTitle' && actualReturnDate ='0000-00-00' ";
mysqli_query($connect,$sign);
$sign2 = "UPDATE bookstable SET total='$newTotal' WHERE title='$bookTitle'";
mysqli_query($connect,$sign2);
echo("<script >alert('The return operation was successfull')</script>");
echo("<script>window.location.href= 'userhomepage.php';</script>");
?>
