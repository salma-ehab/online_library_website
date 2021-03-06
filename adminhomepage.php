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

$s = "select * from borrowed where actualReturnDate ='0000-00-00' && CAST(CURRENT_TIMESTAMP AS DATE) > expectedReturnDate order by expectedReturnDate";
$result = mysqli_query($connect,$s);

$s1 = "select * from bookstable where total = 0 order by title";
$result1 = mysqli_query($connect,$s1);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Homepage</title>
  <link href="CSS/Styling.css?v=<?php echo time();?>" type="text/CSS" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<div class="adminHomepage">
<body>
      <h1>
        <form class="homepage" action="searchResult.php"  method="post">
            <input type="text" placeholder="Search." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>

          <div class="adminTopnav">
            <a class="active" href="#home">Home</a>
            <a href="profile.php">Profile</a>
            <a href="addBook.php">Add Books</a>
            <a href="addUser.php">Add Users</a>
            <a href="userList.php">Userlist</a>
            <a href="bookList.php">Booklist</a>
            <a href="Login.php">Logout</a>
          </div>
      </h1>

      <div class="adminTable1">
      <table>
            <?php
                 if  (mysqli_num_rows($result)>0)
                 {
                  echo '
                  <label id="warningLate">Late Users</label>
                  <tr>
                  <th class="userHeader" id="username">Username</th>
                  <th class="userHeader" id="bookTitle">Book Title</th>
                  <th class="userHeader id="returnDate">Return Deadline</th>
                  </tr>'; 
                 }
            ?>

            <?php
                while($rows=mysqli_fetch_assoc($result))
                {
            ?>
            <tr>
                <td class="userInfo"><?php echo $rows['uname'];?></td>   
                <td class="userInfo"><?php echo $rows['bookTitle'];?></td>
                <td class="userInfo"><?php echo "<label id='warning'>".$rows['expectedReturnDate']."</label>";?></td>                               
            </tr>
            <?php
                }
            ?>
      </table>
      </div>

      <div class="adminTable2">
      <table>
            <?php
                 if  (mysqli_num_rows($result1)>0)
                 {
                  echo '
                  <label id="warningStock">Out of Stock Books</label>
                  <tr>
                  <th class="userHeader" id="bookTitle">Book Title</th>
                  <th class="userHeader id="returnDate">Stock</th>
                  </tr>'; 
                 }
            ?>

            <?php
                while($rows1=mysqli_fetch_assoc($result1))
                {
            ?>
            <tr>
                <td class="userInfo"><?php echo $rows1['title'];?></td>   
                <td class="userInfo"><?php echo "<label id='warning'>Out of Stock</label>";?></td>                               
            </tr>
            <?php
                }
            ?>
      </table>
      </div>
  
</body>
</div>
</html>