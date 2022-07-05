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
              <a href= 'Login.php'>Logout</a>
      </div>
</body>
</div>
</html>