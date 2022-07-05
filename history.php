<?php
session_start();
$connect = mysqli_connect('localhost','root','');
mysqli_select_db($connect,'librarydb');

$username = $_SESSION['uname'];
$s = "select * from borrowed  where uname='$username' && actualReturnDate > '0000-00-00' ORDER BY actualReturnDate";
$result = mysqli_query($connect,$s);
?>

<!DOCTYPE html>
<html>
<head>
  <title>User History</title>
  <link href="CSS/Styling.css?v=<?php echo time();?>" type="text/CSS" rel="stylesheet">
</head>

<div class="userHistory">
<body>
      <table>
           <?php
                 if  (mysqli_num_rows($result))
                 {
                  echo '<tr>
                  <th class="userHeader" id="bookTitle">Book Title</th>
                  <th class="userHeader"  id="returnDate">Return Date</th>
                  </tr>'; 
                 }
            ?>
 

            <?php
                while($rows=mysqli_fetch_assoc($result))
                {
            ?>
            <tr>
                <td class="userInfo"><?php echo $rows['bookTitle'];?></td>
                <td class="userInfo"><?php echo $rows['actualReturnDate'];?></td>                               
            </tr>
            <?php
                }
            ?>
      </table>

      <div class="navigationBar"  id="commonNavigationBar">
              <a href="userhomepage.php">Homepage</a>
              <a href= 'index.php'>Logout</a>
      </div>
</body>
</div>
</html>