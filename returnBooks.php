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
