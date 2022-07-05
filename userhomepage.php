<?php
session_start();
$connect = mysqli_connect('localhost','root','');
mysqli_select_db($connect,'librarydb');

$username = $_SESSION['uname'];
$s = "select * from borrowed  where uname='$username' && actualReturnDate ='0000-00-00' order by expectedReturnDate";
$result = mysqli_query($connect,$s);
?>

<!DOCTYPE html>
<html>
<head>
  <title>User Homepage</title>
  <link href="CSS/Styling.css?v=<?php echo time();?>" type="text/CSS" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<div class="userHomepage">
<body>
      <h1>
        <form class="homepage" action="searchResult.php"  method="post">
            <input type="text" name="search" placeholder="Search for a book title">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>

          <div class="userTopnav">
            <a class="active" href="#home">Home</a>
            <a href="profile.php">Profile</a>
            <a href="history.php">History</a>
            <div class="dropdown">
               <a href="">Categories</a>
               <div class="dropdown-content">
                 <a href='userBookList.php?viewedGenre=Fantasy'>Fantasy</a>
                 <a href='userBookList.php?viewedGenre=Thriller'>Thriller</a>
                 <a href='userBookList.php?viewedGenre=Children'>Children</a>
                 <a href='userBookList.php?viewedGenre=Horror'>Horror</a>
                 <a href='userBookList.php?viewedGenre=Comics'>Comics</a>
               </div>
            </div>   
            <a href="index.php">Logout</a>
          </div>
      </h1>
      
      <table>
            <?php
                 if  (mysqli_num_rows($result)>0)
                 {
                  echo '<tr>
                  <th class="userHeader" id="bookTitle">Book Title</th>
                  <th class="userHeader"  id="returnDate">Return Deadline</th>
                  <th class="userHeader">Return</th>
                  </tr>'; 
                 }
            ?>

            <?php
                while($rows=mysqli_fetch_assoc($result))
                {
            ?>
            <tr>
                <td class="userInfo"><?php echo $rows['bookTitle'];?></td>
                <td class="userInfo"><?php echo $rows['expectedReturnDate'];?></td>
                <td><?php if ($rows['actualReturnDate'] =='0000-00-00'&& date("Y-m-d")>$rows['expectedReturnDate']) {echo "<label id='lateLabel'>LATE!</label>"; echo "<button id='lateButton'>Return </button>";}
                    else if ($rows['actualReturnDate'] =='0000-00-00') echo "<button id='returnButton' onclick='location.href=\"returnBooks.php?viewedBookTitle=".$rows['bookTitle']."\"'>Return </button>";?></td>                               
            </tr>
            <?php
                }
            ?>
      </table>
</body>
</div>
</html>