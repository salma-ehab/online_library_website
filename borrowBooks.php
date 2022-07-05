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
$bookTitle= $_GET["selectedBookTitle"];
$borrowDate=date("Y-m-d");
$expectedReturnDate=date("Y-m-d", strtotime($borrowDate."+2 month"));

$bookQuery = "select * from bookstable where title = '$bookTitle'";
$bookResult = mysqli_query($connect,$bookQuery);
$bookRow =  mysqli_fetch_row($bookResult);
$currentGenre=$bookRow[5];
$prevTotal = $bookRow[3];

$borrowedQuery = "select * from borrowed where uname = '$username' && bookTitle='$bookTitle' && actualReturnDate = '0000-00-00' ";
$borrowedResult = mysqli_query($connect,$borrowedQuery);
$numBorrowed = mysqli_num_rows($borrowedResult);


if ($numBorrowed == 1)
{
    echo("<script >alert('You already borrowed the book')</script>");
    echo ("<script>window.location.href='userBookList.php?viewedGenre=$currentGenre';</script>");
}

else if ($prevTotal > 0)
{
    $newTotal = $prevTotal -1;
    $sign = "insert into borrowed (uname,bookTitle,borrowDate,expectedReturnDate) values ('$username','$bookTitle','$borrowDate','$expectedReturnDate')";
    mysqli_query($connect,$sign);

    $sign2 = "UPDATE bookstable SET total='$newTotal' WHERE title='$bookTitle'";
    mysqli_query($connect,$sign2);
    echo("<script >alert('The borrowing operation was successful')</script>");
    echo ("<script>window.location.href='userBookList.php?viewedGenre=$currentGenre';</script>");
}

else if ($prevTotal == 0)
{
    echo("<script >alert('The book is out of stock')</script>");
    echo("<script>window.location.href= 'userBookList.php?viewedGenre=$currentGenre';</script>");
}
?>
